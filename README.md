# Registration System

System for EASTWOODS Professional College of Science and Technology focusing their student registration process. 

## Requirements

[Google Drive](https://docs.google.com/document/d/1TURozxqh4XzDLhO8uXPN7iFNt7uWYM-o/edit?usp=sharing&ouid=114996150707301677972&rtpof=true&sd=true).

## Requirements 

1. [Composer](https://getcomposer.org/download/).
2. [Xampp](https://www.apachefriends.org/download.html).
3. Internet Connection.
4. Working pc.
5. Download a zip file, or make a pull request of the system. [Link]().
6. Download sql file [here](https://drive.google.com/drive/folders/1805PdlzkjnXLdty7SSAFr7sWVXFrdsMD?usp=sharing).

## How to install

After completing the requirements above. 

1. Move the system into htdocs folder inside xampp ex. path>xampp>htdocs.

2. Run your xampp control panel to start Apache and MySQL.

3. Open your terminal (cmd, bash, powershell, etc.) then cd to registration-system. ex cd ~/path/xampp/htdocs/registration-system.

4. Then cd to registration-system then run composer update

5. Rename .env.example to .env

6. Run php artisan key:generate

7. Run php artisan cache:clear 

8. Run php artisan config:clear

9. Check your .env file if the details of database you are using are the same.

10. Open your browser and open phpmyadmin (alternative is to click admin beside MySQL in xampp control panel).

11. Create database named registration_system.

12. Import registration_system.sql to registration_system.

13. Go back into your terminal and run: php artisan serve. Copy the link ex. http://url:8000/ and paste it to your browser.

14. Enjoy~

If you want to import dummy data provided from our google drive, please read the readme.txt<br/>
Default login: email = "admin@mail.com" password: "password"<br/>
If you run into problems, please contact the developer: quilitjustin8@gmail.com
