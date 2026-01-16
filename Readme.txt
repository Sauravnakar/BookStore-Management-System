 Book Store Management System

A containerized web application for managing book inventory, developed as part of the Software Engineering Portfolio (Phase 3).

 Features
- 3-Tier Architecture: PHP 8.2 (App), MySQL 8.0 (Data), HTML5/CSS3 (Presentation).
- CRUD Operations: Add new books and view current inventory.
- Data Persistence: Docker volumes ensure data is saved on restart.
- Self-Healing Database: Automatically creates tables if they do not exist.

 Prerequisites
- Docker Desktop installed and running.

Installation & Setup
1. Clone the repository:
   ```bash
   git clone [https://github.com/Sauravnakar/BookStore-Management-System.git]
 
2. Navigate to the directory:

  Bash

  cd BookStore-Management-System
3.Start the containers:

  Bash

  docker-compose up -d
4.Access the application:

  Web App: http://localhost:8080


  phpMyAdmin: http://localhost:8081 (User: root / Password: rootpassword)
