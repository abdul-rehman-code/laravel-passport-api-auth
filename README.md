# Laravel Passport API Authentication

A complete REST API authentication system built with **Laravel 11** and **Passport**. This project includes secure user registration, login, and logout functionality with token revocation.

## Features
- **User Registration**: Create new users via API.
- **User Login**: Secure authentication with Personal Access Tokens.
- **User Logout**: Revokes the active token from the database.
- **Middleware Protection**: Secure routes that only authenticated users can access.

## Installation Steps

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/abdul-rehman-code/laravel-passport-api-auth.git](https://github.com/abdul-rehman-code/laravel-passport-api-auth.git)
   Install dependencies:Bashcomposer install
Setup environment file:Copy .env.example to .envConfigure your database settings in .envGenerate App Key:Bashphp artisan key:generate
Run Migrations:Bashphp artisan migrate
Install Passport:Bashphp artisan passport:install
API EndpointsMethodEndpointDescriptionPOST/api/registerRegister a new userPOST/api/loginLogin and get Bearer TokenGET/api/logoutLogout (Revoke Token)
Developed by Abdul Rehman
