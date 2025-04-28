# Laravel Product & Cart Management System

A complete backend system for managing **Products** (with multiple images) and **Cart** operations, built using **Laravel 10**, **PHP 8+**, and **MySQL 8+**.

This project includes APIs for product management, cart operations, and a simple Admin Panel UI with clean UX/UI practices.

---

## Project Details

**Task Description:**

✅ Phase 1:
- Create MySQL database with Products (Name, Price, Multiple Images).
- Build backend in MVC framework (Laravel) for Product CRUD with multiple images.
- Develop a **GET API** to fetch all products with images.

✅ Phase 2:
- Create **POST API** to add products to the cart (User ID hardcoded as `1`).
- Display all cart items in Admin Panel using a **GET API**.
- Checkout API with payment gateway integration.
  
**Minimum Requirements:**
- PHP 8+
- MySQL 8+
- Laravel framework
- Postman Collection
- Proper exception handling, UI/UX focus, clean code and folder structure.

---

## Tech Stack

- **PHP 8+**
- **Laravel 10**
- **MySQL 8+**
- **Bootstrap** (for Admin Panel UI)
- **Postman** (for API documentation)

---

## Installation & Setup Instructions

Follow the steps below to run the project locally:

### 1. Clone the Repository

```bash
git clone https://github.com/SandeepSDE-eng/Sandeep-task.git
cd Sandeep-task
```

---

### 2. Install Dependencies

Make sure Composer is installed: [Install Composer](https://getcomposer.org/)

```bash
composer install
```

---

### 3. Database Setup

- Create a new database in your MySQL server (e.g., `sandeep_task`).
- Import the provided **`database.sql`** file located in the root directory into your newly created database.

---

### 4. Environment Configuration

- Copy `.env.example` to `.env`:

```bash
cp .env.example .env
```

- Update the following database credentials in your `.env` file:

```dotenv
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

---

### 5. Migrate the Database (Optional)

Since the tables are already included via SQL file, migration is optional.

To re-run migrations:

```bash
php artisan migrate
```

---

### 6. Run the Application

Start the Laravel server:

```bash
php artisan serve
```

The application will be accessible at:

> **http://127.0.0.1:8000**

---

## Admin Panel Access

Login Credentials:

- **Email:** `admin@example.com`
- **Password:** `admin1234`

You can log into the Admin Panel to manage Products and view Cart details.

---

## API List

### Product APIs
- **GET**: `/api/products` – Get all products with multiple images.
- **POST**: `/api/products` – Add a new product with images.
- **PUT**: `/api/products/{id}` – Update a product.
- **DELETE**: `/api/products/{id}` – Delete a product.

### Cart APIs
- **POST**: `/api/cart/add` – Add product to cart.
- **PUT**: `/api/cart/update/{id}` – Update cart item.
- **DELETE**: `/api/cart/delete/{id}` – Delete cart item.
- **GET**: `/api/cart/list` – List cart items with total.
- **POST**: `/api/cart/checkout` – Checkout cart items (Payment integration).

---

## Postman Collection

The **Postman Collection** for all APIs is included inside the project under the `postman_collection.json` file.

You can directly import it into Postman to test all the available APIs.

---

## Important Notes

- Exception handling and request validation are properly managed in APIs.
- Admin Panel UI is kept clean, user-friendly, and responsive.
- Code follows clean coding standards and best practices.
- Folder structure is well organized and easy to navigate.

---

## Project Submission

✅ GitHub repository submitted  
✅ Database backup file (`database.sql`) included  
✅ API documentation via Postman provided  
✅ Exception handling properly implemented  
✅ Clear setup documentation provided (this README)

---

## Thank You!

> **All the best! Feel free to reach out if you face any issues.**

