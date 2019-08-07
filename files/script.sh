#!/usr/bin/bash
cd /var/www/html/files/
sudo chmod 664 *
sudo chown :ec2-user $1.xml
sudo php runXML.php $1 $2 $3 $4
