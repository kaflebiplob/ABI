# eCommerce Website

An eCommerce platform that allows users to browse, search, and purchase products online. This project includes backend functionalities for user authentication, product management, and order handling, providing a seamless online shopping experience.

## Features

### User Features
- **User Authentication**: Secure login and registration.
- **Product Browsing**: View a catalog of products with details such as name, price, and description.
- **Search and Filter**: Easily search for products and filter based on categories or attributes.
- **Order Management**: Place orders.

### Admin Features
- **Admin Dashboard**: Manage inventory and oversee orders.
- **Product Management**: Add, update, or remove product listings.
- **Order Overview**: View and manage user orders.

## Technologies Used

### Frontend
- **HTML, CSS, JavaScript**: For building the user interface.

### Backend
- **PHP**: PHP.
- **Laravel**:Laravel 11.

### Database
- **MySQL**: For storing user, product, and order data.

### APIs
- **REST APIs**: For communication between the frontend and backend.

## Installation and Setup

1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```
2. Navigate to the project directory:
   ```bash
   cd ecommerce-website
   ```
3. Install dependencies:
   ```bash
   npm install
   ```
   *(or use `pip install` / `composer install` based on your backend)*
4. Configure the database in the `.env` file:
   ```env
   DB_HOST=localhost
   DB_USER=root
   DB_PASSWORD=yourpassword
   DB_NAME=ecommerce
   ```
5. Run the server:
   ```bash
   php artisan serve
   ```
   *(or the equivalent command for your backend framework)*

6. Access the application at `http://localhost:8000` (or the relevant port).

## Future Enhancements
- Add payment gateway integration.
- Implement a review and rating system for products.


## License
This project is licensed under the ABI Trade Link License. See the LICENSE file for details.
