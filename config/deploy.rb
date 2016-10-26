# config valid only for Capistrano 3.1
lock '3.5.0'

set :application, 'yii'
#set :repo_url, 'git@example.com:me/my_repo.git'
set :scm, :copy
set :exclude_dir, "{.svn,.git,vendor,lib,Gemfile,Gemfile.*,Capfile,Uploads,runtime,tests}"


# Default branch is :master
# ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }.call

# Default deploy_to directory is /var/www/my_app
set :deploy_to, '/data/website/beidema/'

# Default value for :scm is :git
# set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
# set :log_level, :debug

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# set :linked_files, %w{config/database.yml}

# Default value for linked_dirs is []
# set :linked_dirs, %w{bin log tmp/pids tmp/cache tmp/sockets vendor/bundle public/system}

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5

set :format, :pretty
set :log_level, :debug
set :keep_releases, 5



namespace :deploy do
  httpd_user = "apache"
  httpd_group = "apache"

  task :update_source do
    on roles(:all) do
	  puts "\n\n=== Svn update ===\n\n"
	  system "svn update"
	end
  end
  desc 'Restart application'
  task :restart do
    on roles(:all) do
      puts "restart app"
      execute :chmod, "-R", "0744", current_path
      execute :chown, "-RH", "--dereference", "#{httpd_user}:#{httpd_group}", current_path
    end
  end



  before :started, :update_source
  after :publishing, :restart

  after :restart, :clear_cache do
    on roles(:web), in: :groups, limit: 3, wait: 10 do
      # Here we can do anything such as:
      # within release_path do
      #   execute :rake, 'cache:clear'
      # end
    end
  end

end
