Deployment process

To start the application in local windows system

1. Install php on windows system
2. Install XAMPP , which is an open source web server solution stack package
3. Start the module Apache in XAMPP
4. Start the module MySQL in XAMPP
5. Using the admin link in XAMPP for MySQL, go to admin panel of MySQL
6. Import the file, "house_rental.sql" file using the admin panel, all the required database creation and table creation is in the script
7. Place the folder that has all the project files at this location "C:\xampp\htdocs"
8. Launch the index file, using the php and application will be launced at  - http://localhost/HouseRentalManagement/


Deploying the application to AWS

1. Launch an ubuntu EC2 instance and associate elastic IP to the instance
2. In the security groups settings, add HTTP inbound rule
3. Connect to EC2 instance
4. update instance using command 
	sudo apt-get update and switch to root using "sudo su"
5. Install Apache in the instance
	apt-get install apache2
	once installed status can be checked using
	systemctl status apache2
6. Install other necessary packages for the application
	sudo apt-get install php php-mysql mysql-server
	Username and password need to be given and stored for the future
7. Status of mysql can be verified using
	systemctl status mysql
8. Enter mysql comman line and set up the username and pwd:
	mysql -u root -p
	Once the mysql console shows up, you will need to configure a little bit like this:
	mysql> ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'your password'
	exit
9.	Install phpmyadmin and restart apache server
	sudo apt-get install phpmyadmin
	/etc/init.d/apache2 restart
10. copy all the application files to the location
	/var/www/html
11. Application will now be available at the IP address
12. Local MySQL data can be migrated, Export sql file from Local MySQL Admin
13. Login to phpmyadmin on EC2 and import the sql file.
14. Make changes to the file 'dbconnection.php' with the server address and database name.