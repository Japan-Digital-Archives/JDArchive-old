Vagrant::Config.run do |config|
  config.vm.box = "natty-server"

  config.vm.network "10.7.7.2"

  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = "manifests"
    puppet.manifest_file  = "base.pp"
  end

  # config.vm.boot_mode = :gui

  # config.vm.forward_port "http", 80, 8080
  # config.vm.share_folder "v-data", "/vagrant_data", "../data"
end
