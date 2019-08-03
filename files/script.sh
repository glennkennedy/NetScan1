#!/usr/bin/bash
cd /var/www/html/files/
sudo chmod 664 *
sudo chown :ec2-user $1.xml
sudo php test.php $1
