Vagrant.configure(2) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.ssh.forward_agent = true
  config.vm.hostname = "mbb"
  config.vm.provision "shell", privileged:false, inline: $script
end


$script = <<SCRIPT
# Install Git Node (required for Jekyll) and ZSH
sudo apt-get install -y git-core nodejs zsh

# Set Git configurations
git config --global user.name "Michael Bender"
git config --global user.email "michaelbenbender@gmail.com"

# Install RVM, latest ruby, and Jekyll
gpg --keyserver hkp://keys.gnupg.net --recv-keys 409B6B1796C275462A1703113804BB82D39DC0E3
cd ~
\\curl -sSL https://get.rvm.io | bash -s stable --ruby
source /home/vagrant/.rvm/scripts/rvm
gem install jekyll --no-ri --no-rdoc

# Configure Oh My ZSH
wget https://github.com/robbyrussell/oh-my-zsh/raw/master/tools/install.sh -O - | zsh
chsh -s `which zsh`

SCRIPT