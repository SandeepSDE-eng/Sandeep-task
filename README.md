Laravel Product & Cart Management System

Project Setup Instructions

This project is built using Laravel, PHP 8+, and MySQL 8+.
It includes a complete backend system with API development for Product and Cart Management.


---

1. Clone the Repository

git clone https://github.com/SandeepSDE-eng/Sandeep-task.git
cd Sandeep-task


---

2. Install Dependencies

composer install

Make sure you have Composer installed on your system.
If not, install it from https://getcomposer.org/.


---

3. Database Setup

Import the database backup file (database.sql) which is provided in the root folder into your MySQL server.

Create a new database if required before importing.



---

4. Environment Configuration

Copy the .env.example file and create a new .env file:


cp .env.example .env

Update the following database credentials in your .env file:


DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password


---

5. Migrate the Database

php artisan migrate

Note: Since database tables are already included via SQL file, migration is optional unless you want to regenerate.


---

6. Run the Application

php artisan serve

The application will be accessible at:
http://127.0.0.1:8000


---

7. Admin Panel Credentials

Login to the Admin Panel using the above credentials.


---

APIs Available

Product APIs:

Get all products with multiple images.

CRUD operations for Products (Admin Panel).


Cart APIs:

Add product to cart (POST).

Update cart item (PUT).

Delete cart item (DELETE).

Get cart items listing with total (GET).

Checkout API (with payment gateway integration).


Postman Collection:

API documentation and collection are included in the project folder.



---

Tech Stack

PHP 8+

Laravel 10

MySQL 8+

Bootstrap (for Admin Panel UI)

Postman (for API documentation)



---

Important Notes

Exception handling and validation are properly managed in APIs.

UI/UX for CMS is kept simple, clean, and user-friendly.

Clear coding standards and folder structure followed.



---

Thank You!
