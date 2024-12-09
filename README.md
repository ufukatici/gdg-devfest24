# Devfest2024 Website Project

Welcome to the Devfest2024 Website Project! This is the official web platform developed for the Devfest 2024 event, organized by the GDG Kütahya community.


## Features
- **Countdown Timer**: Displays the remaining time until the event.  
- **Dynamic Forms**: Forms that activate at specific dates and times.  
- **Raffle Page**: A dedicated page for event raffles.  
- **Admin Panel**: Manage and view participant data through a user-friendly interface.  
- **Certificate Automation**: Automatically generates certificates for participants and delivers them via email.
## Technologies Used
- **Frontend**: HTML, CSS, SCSS, JavaScript  
- **Backend**: PHP 
## How to Use
1. Clone the repository:
    
```bash
  git clone https://github.com/ufukatici/gdg-devfest24.git
```
    
2. Navigate to the project directory:
    

```bash
    cd gdg-devfest24
```

3. Create the database:
- Create the database:
```bash
CREATE DATABASE YourDbName;
```
- Use the database:
```bash
USE YourDbName;
```
- Table for admin users:
```bash
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
```


- Table for employee:
```bash
CREATE TABLE employee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    gsm VARCHAR(20),
    status VARCHAR(50),
    success VARCHAR(50)
);
```
- Table for linqi:
```bash
CREATE TABLE linqi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    gsm VARCHAR(20)
);
```
- Table for participant:
```bash
CREATE TABLE participant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    gsm VARCHAR(20)
);
```

4. Edit the .env file with your own information: it is available in the root directory and the admin directory.

5. Start the project using your preferred server (e.g., XAMPP, WAMP, or PHP built-in server):
    
```bash
    php -S localhost:8000
```
## Screenshots

![App Screenshot](https://docs.ufukatici.online/gdg-devfest-24/1.png)

![App Screenshot](https://docs.ufukatici.online/gdg-devfest-24/2.png)

![App Screenshot](https://docs.ufukatici.online/gdg-devfest-24/3.png)

![App Screenshot](https://docs.ufukatici.online/gdg-devfest-24/4.png)

![App Screenshot](https://docs.ufukatici.online/gdg-devfest-24/5.jpg)

![App Screenshot](https://docs.ufukatici.online/gdg-devfest-24/6.jpg)



## Contact
Feel free to reach out to me with any questions:  
📧 **Email**: contact@ufukatici.online  
🌐 **Website**: [ufukatici.online](https://ufukatici.online)
