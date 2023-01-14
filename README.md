<p align="center">
  <a href="https://github.com/andrisan/si-obe">
    <img src="si-obe.svg" width="400" alt="Logo" width="80" height="80">
  </a>
  <h1 align="center" style="color: rgb(129, 140, 248">si-OBE</h1>
  <p align="center">
    si-OBE is web-based application for the management of student grades based on the OBE (Outcome Based Education) system.
  </p>
</p>

# Getting Started

## Prerequisites
You will need the following to run si-OBE:
- PHP >= 8.0.2
- Composer
- Node.js
- NPM
- Database server (MySQL, MariaDB, PostgreSQL, or SQLite)
## Installation

The following steps will guide you through the installation process of si-OBE for running in a development environment locally on your machine:
1. Clone the latest version of si-OBE from the repository 
2. Run `composer install` to install the required PHP dependencies
3. Copy the .env.example file to .env and edit the database credentials according to your database server
4. Run `php artisan key:generate` to generate a new application key
5. Run `php artisan migrate` to create the database tables. You can also add the `--seed` flag to seed the database with some dummy data
6. Run `php artisan serve` to start the development server
7. Open another terminal and run `npm install` to install the required node modules
8. Run `npm run dev` to compile the assets for development
9. Open your browser and go to `http://localhost:8000` to view the application

# Contributing

si-OBE is an open-source project and contributions are welcome. If you would like to contribute, please read the [contributing guidelines](CONTRIBUTING.md) first.

# License

si-OBE is open-sourced software licensed under the [MIT license](LICENSE).
