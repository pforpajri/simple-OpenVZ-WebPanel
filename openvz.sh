if (( $EUID != 0 )); then
	echo "Masuk ke mode root untuk menjalankan program ini"
	exit
fi

read -p "Apakah repositori debian sudah ditambahkan? (y/n) " input_repo

if [[ ${input_repo} == "y" ]]; then
	echo "repo sudah ada..."

elif [[ ${input_repo} == "n" ]]; then
	echo "deb http://ftp.debian.org/debian/ jessie main contrib non-free" | tee /etc/apt/sources.list.d/deb_distro.list
	echo "deb-src http://ftp.debian.org/debian/ jessie main contrib non-free" | tee /etc/apt/sources.list.d/deb_distro.list
	echo "repo berhasil ditambahkan"

else
	echo "masukkan input dengan benar! (y atau n) "
	exit
fi


echo "Menambahkan repo openvz..."
echo "deb http://download.openvz.org/debian jessie main" | tee /etc/apt/sources.list.d/openvz.list
echo "deb http://download.openvz.org/debian wheezy main" | tee /etc/apt/sources.list.d/openvz.list
wget -qO - http://ftp.openvz.org/debian/archive.key | apt-key add -

echo "update repo..."
apt-get update

echo "menginstall openvz..."
apt-get install linux-image-openvz-amd64 vzctl vzquota vzdump -y

echo "membuat link simbolik openvz..."
ln -s /var/lib/vz /vz

echo "setting os as router..."
cp /etc/sysctl.conf /etc/sysctl.conf.default  #for saving default conf file

tee -a /etc/sysctl.conf > /dev/null <<EOT

#config openVZ start here
net.ipv4.conf.all.rp_filter=1
net.ipv4.icmp_echo_ignore_broadcasts=1
net.ipv4.conf.default.forwarding=1
net.ipv4.conf.default.proxy_arp=0
net.ipv4.ip_forward=1
kernel.sysrq=1
net.ipv4.conf.default.send_redirects=1
net.ipv4.conf.all.send_redirects=0
net.ipv4.conf.eth0.proxy_arp=1

EOT

echo "Saving configuration ..."
sysctl -p

echo "Installing systemV ..."
sudo apt-get install sysvinit-core sysvinit-utils -y

echo " INGAT !! Pilih kernel OpenVZ (versi 2.x) pada GRUB untuk menjalankan openVZ!" 

read -p "Press any key to continue ..." ugh

echo "Restarting OS..."
init 6
