# Renta de Inmuebles - Laravel Project

## Overview

This Laravel project is a web application designed for managing and renting properties (inmuebles). It allows users to create, update, and delete property listings, as well as manage user roles and permissions. The application also includes features like email notifications, PayPal integration for payments, and GitHub authentication.

## Features

- **User Authentication**: Users can register, log in, and log out. Passwords are hashed for security.
- **Property Listings**: Users can create, update, and delete property listings. Each listing includes details like title, description, price, location, and contact information.
- **Role Management**: Users can be assigned roles such as "creador", "contribuidor", and "administrador".
- **Email Notifications**: Users can send personalized emails through the application.
- **PayPal Integration**: Users can make payments through PayPal for property reservations.
- **GitHub Authentication**: Users can log in using their GitHub accounts.
- **Search Functionality**: Users can search for properties based on tags or keywords.
- **Responsive Design**: The application is designed to be responsive and works well on both desktop and mobile devices.

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/renta-de-inmuebles.git
   cd renta-de-inmuebles

2. **Install dependencies**:
   ```bash
    composer install
    npm install

3. **Set up the environment**:
    - Copy `.env.example` to `.env` and update the database credentials.
    - Generate the application key:
       ```bash
        php artisan key:generate
        
4. **Run migrations and seed the database**:
   ```bash
    php artisan migrate --seed

5. **Link storage**:
   ```bash
    php artisan storage:link

6. **Run the development server**:
   ```bash
    php artisan serve

7. **Access the application**:
   Open your browser and navigate to `http://localhost:8000`.
