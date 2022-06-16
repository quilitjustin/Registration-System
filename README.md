# Registration System

System for EASTWOODS Professional College of Science and Technology focusing their student registration process. 

## Requirements

[Google Drive](https://docs.google.com/document/d/1TURozxqh4XzDLhO8uXPN7iFNt7uWYM-o/edit?usp=sharing&ouid=114996150707301677972&rtpof=true&sd=true).

## Build Using
1. HTML5
2. CSS [Tailwind](https://tailwindcss.com/docs/installation/play-cdn)
3. PHP [Laravel](https://laravel.com/docs/9.x)

## Requirements 

1. [Composer](https://getcomposer.org/download/).
2. [Xampp](https://www.apachefriends.org/download.html).
3. Internet Connection.
4. Working pc.
5. Download a zip file, or make a pull request of the system. 
6. Download sql file [here](https://drive.google.com/drive/folders/1805PdlzkjnXLdty7SSAFr7sWVXFrdsMD?usp=sharing).

## How to install

After completing the requirements above. 

1. Move the system into htdocs folder inside xampp ex. path>xampp>htdocs.

2. Run your xampp control panel to start Apache and MySQL.

3. Open your terminal (cmd, bash, powershell, etc.) then cd to registration-system. ex cd ~/path/xampp/htdocs/registration-system.

4. After cd in registration-system folder, run composer update in your terminal.

5. When composer update is done, go to registration-system folder to rename .env.example to .env

6. Then in your terminal. Run php artisan key:generate

7. Run php artisan cache:clear 

8. Run php artisan config:clear

9. Open and check your .env file in registration folder if the details of database you are using are the same and other information such as app name (Note: you can't use space for app name, so use _ instead (ex. Registration_System), etc. 

10. Open your browser and open phpmyadmin (alternative is to click admin beside MySQL in xampp control panel).

11. Create database named registration_system.

12. Import registration_system.sql to registration_system.

13. Go back into your terminal and run: php artisan serve. Copy the link (ex. http://url:8000/) and paste it to your browser.

14. Enjoy~

Default login: email = "admin@mail.com" password: "password"<br/>
If you run into problems, please contact the developer: quilitjustin8@gmail.com
