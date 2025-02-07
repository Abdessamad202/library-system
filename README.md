# Library System Project

## Overview
The Library System is a comprehensive application designed to manage library operations efficiently. It provides features for users, administrators, and library staff, facilitating seamless interactions between them. This project implements core functionalities such as authentication, book reservations, user management, book search, and administrative controls. Additionally, the system includes robust email notification features to enhance communication.

## Features

### User Features
1. **Authentication System**:
   - User registration and login functionality.
   - Email verification for new accounts.

2. **Reservation System**:
   - Users can reserve books online.
   - Email notifications for reservation confirmation, reminders, and overdue books.

3. **User Data Management**:
   - Update profile information.
   - Change passwords.
   - Change Email.

4. **Book Search**:
   - Search for books by title, author, or category.
   <!-- - Filter and sort results. -->

5. **Comments and Likes**:
   - Users can leave comments on books ,edit it and also delete it .
   - Users can like books to show appreciation.

### Admin Features
1. **Role Management**:
   - Promote users to administrators.
   - switch role himself without losing permissions
   - Manage user roles and permissions.

2. **Reservation Management**:
   - Approve or reject book reservations.
   - Send confirmation emails for approved reservations.

3. **Book and Category Management**:
   - Add, edit, and delete books.
   - Manage book categories.

4. **Email Notifications**:
   - Verification emails for new users.
   - Notifications for reservation confirmation, overdue reminders, and return confirmations.

## Technology Stack
- **Backend**: Laravel Framework
- **Frontend**: Blade templates
- **Database**: MySQL
- **Styling**: Tailwind CSS,Bootstrap , Vanila CSS.
- **Email Services**: Laravel Mail (integrated with SMTP services)

## Installation and Setup

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- Node.js and npm

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/Abdessamad202/laravel-project.git
   ```

2. Navigate to the project directory:
   ```bash
   cd library-system
   ```

3. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```

4. Run migrations and seed the database:
   ```bash
   php artisan migrate --seed
   ```

5. Start the development server:
   ```bash
   php artisan serve
   ```

6. Access the application at `http://localhost:8000`.

## Usage

### User Side
- Register or log in to the system.
- Search for books and make reservations.
- Interact with books through comments and likes.
- Manage your profile and view reservation history.

### Admin Side
- Log in as an admin.
- Manage user roles and permissions.
- Approve or reject book reservations.
- Add and categorize books.
- Monitor and manage overdue books and reservations.

## Email Notifications
The system sends automated emails for the following events:
1. Account verification upon registration.
2. Reservation confirmation and reminders.
3. Notifications for overdue or returned books.
