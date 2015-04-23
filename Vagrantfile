Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.ssh.forward_agent = true
  config.vm.hostname = "mbb"
  config.vm.network :forwarded_port, guest:8080, host: 8081
  config.vm.provision "shell", privileged:false, inline: $script
end


$script = <<SCRIPT
sudo apt-get install -y git-core nodejs zsh

# Added zsh shell.
wget --no-check-certificate https://github.com/robbyrussell/oh-my-zsh/raw/master/tools/install.sh -O - | sh
sudo chsh -s /bin/zsh vagrant
zsh
# Change the oh my zsh default theme.
sed -i 's/ZSH_THEME="robbyrussell"/ZSH_THEME="3den"/g' ~/.zshrc

# Set Git configurations
git config --global user.name "Michael Bender"
git config --global user.email "michaelbenbender@gmail.com"

# Install RVM, latest ruby, and Jekyll
gpg --keyserver hkp://keys.gnupg.net --recv-keys 409B6B1796C275462A1703113804BB82D39DC0E3
cd ~
\\curl -sSL https://get.rvm.io | bash -s stable --ruby
source /home/vagrant/.rvm/scripts/rvm
gem install github-pages --no-ri --no-rdoc
gem install bourbon --no-ri --no-rdoc
gem install celluloid-io --no-ri --no-rdoc

cd /vagrant
jekyll serve --detach

SCRIPT