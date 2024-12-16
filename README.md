# Event Ticketing Application

This project is an event ticketing application built with Laravel and MySQL. It allows users to view, add to cart, and purchase tickets for various events. The application includes user-facing features as well as an admin interface for managing events.

## Features

### User Features
- **Dashboard**: Lists all events users can attend.
- **Event Details**: 
  - View Partners & Sponsors (separate page button).
  - View Event Agenda (button).
  - Add event to cart (button).
- **Cart**:
  - When adding an event to the cart, the cart will update to include the event.
  - Clicking on the cart button will open a small window on the same page, showing the cart contents and a button to view the full cart.
  - In the cart page, the total price is calculated. Users can modify the quantity of tickets, update prices, or remove items from the cart.
- **Checkout**:
  - Once the user decides to purchase, they can click the "Buy Now" button, which will redirect them to a Stripe-integrated page to enter card details and complete the payment.
- **Contact Page**: Users can submit their name, email, and message for support or feedback.

### Admin Features
- **Event Management**:
  - View all events in a tabular format with their details.
  - Edit or delete events.
  - Each event has links to sponsors, partners, speakers, and the event agenda.
- **Invitation System**: 
  - A button to send invites to all users for a specific event, implemented with SendGrid.
- **Add New Event**: Option to add new events into the system.

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript, Blade Syntax
- **Backend**: Laravel
- **Database**: MySQL
- **Payment Gateway**: Stripe
- **Email Service**: SendGrid

## Setup Instructions
1. **Clone the repository**:
    ```bash
    git clone <repository-url>
    cd <repository-directory>
    ```

2. **Install dependencies**:
    ```bash
    composer install
    npm install
    ```

3. **Import the Database**:
    - On your server, access phpMyAdmin.
    - Create a new database and import the .sql file you saved earlier.

4. **Set up environment variables**:
    - Create a `.env` file in the root directory and add the necessary environment variables for database connection, Stripe, and SendGrid.
    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database_name
    DB_USERNAME=username
    DB_PASSWORD=password
    ```

5. **Run the migrations**:
    ```bash
    php artisan migrate
    ```

6. **Run the application**:
    ```bash
    php artisan serve
    ```

7. **Open in browser**:
    - Navigate to `http://localhost:8000` to view the application.
