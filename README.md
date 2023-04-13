# College-ERP-System

This is an implementation of the College ERP system of IIT Kharagpur using the LAMP Framework. This ERP System is a fully functional College Management System with features ranging from admin-side functionalities to professor-side functionalities to student-side functionalities as discussed in the report.

## Steps to execute the code and reproduce the project:

1. Clone the repository:
   For this step you need Git installed, but you can just download the zip file instead by clicking the ```Code``` button at the top of this page
```
git clone https://github.com/Anubhab2002/College-ERP-System.git
```

2. Download and install ```Xampp Server``` in your local system from the following download link:
 - [Link for Windows Users](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/8.2.4/xampp-windows-x64-8.2.4-0-VS16-installer.exe)
 - [Link for Linux Users](https://sourceforge.net/projects/xampp/files/XAMPP%20Linux/8.2.4/xampp-linux-x64-8.2.4-0-installer.run)
 
3. Next you need to start the ```Apache Server``` and ```MySQL``` server from Xampp by clicking on the start button. This will get ```PHPMyAdmin``` and ```mysqlid``` started on your local device.

Note: If the servers do not get started, the main reason might be the port on which they will run are blocked by some process running on those ports.

So, for a **linux** user, in such cases, run the following commands on terminal:

```
sudo service mysql stop
```

and

```
sudo service apache2 stop
```

For **windows** users, you can type: 
```
netstat -a
```
to list all the processes and the ports occupied.
You can then go to the Task Manager and ```End Task``` for ```mysqld.exe``` and/or ```apache```.

4. Next copy the project directory ```College-ERP-System``` into ```/root/opt/lampp/htdocs/``` for **linux** systems or ```C:\xampp\htdocs\``` for **windows``` systems.

5. Start the Apache and MySQL servers from the Xampp control panel.

6. Go to the ```./SQL/database.sql``` file in the directory and copy the entire MySQL code

7. Go to your browser and type ```localhost/phpmyadmin``` into the searchbar and click on ```new``` in the left panel and create a new database by the name of ```college-erp-system```. Then from the top navigation bar choose ```import``` followed by ```choose file```. Navigate to the root of the project directory and select ```database.sql``` from ```./SQL/``` in the directory. Finally click on ```Import``` to import the database into your local system.

8. Go to your browser and type ```localhost/College_ERP_System``` into the searchbar to get the website up and running.

9. ENJOY THE NEW ERP!!! THANK YOU!!!

## PROJECT BY: ANUBHAB MANDAL (20MA20080)

All screenshots to all functionalities have been added in ```./img/``` folder.

[Link to report](https://docs.google.com/document/d/157YT7_tUkVqG56KqH3V_rDXVqNdz-fI5GhJTar1DNgE/edit?usp=sharing)

In case of any doubts or problems please reach out at: [anubhab.saie@gmail.com](anubhab.saie@gmail.com)

