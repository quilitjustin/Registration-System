# Registration System

System for EASTWOODS Professional College of Science and Technology focusing their student registration process. 

## Documentation

[Google Drive](https://drive.google.com/drive/folders/12YOnvqqusAn6V3209h8FeM3VLGDSakf1?usp=sharing).

## Requirements 

1. [Composer](https://getcomposer.org/download/).
2. [Xampp](https://www.apachefriends.org/download.html).
3. Internet Connection.
4. Working pc.
5. [registration_system.sql](https://drive.google.com/file/d/1noEGQktwrfWwcM01RtsFSio7OKQwMQx7/view?usp=sharing).
6. Download a zip file, or make a pull request of the system using git.

## How to install

After completing the requirements above. 

1. After downloading or doing a pull request. Move the system into htdocs folder inside xampp ex. path>xampp>htdocs.

2. Run your xampp control panel to start Apache and MySQL.

3. Open your terminal (cmd, bash, powershell, etc.) then cd to registration-system. ex cd ~/path/xampp/htdocs/registration-system.

4. Run composer update into your terminal.

5. Check your .env file if the details of database you are using are the same.

6. Open your browser and open phpmyadmin (alternative is to click admin beside MySQL in xampp control panel).

7. Create a table named registration_system.

8. Import registration_system.sql

9. Go back into your terminal and run: php artisan serve. Copy the link ex. http://url:8000/ and paste it to your browser.

10. Enjoy~

If you want to import dummy data provided from our google drive, please read the readme.txt
Default login: email = "admin@mail.com" password: "password"
