# DomainMS | Domain Management System

## Choose Language
[Bahasa Indonesia](README-ID.md) | [English](README.md)

DomainMS is a domain management application system built using Laravel. This application provides features to facilitate the management of user, unit, server, domain, notification of domain, and solution of notification.

## 🌟 Features

- **Login**: Login feature that allows admins and pic units to log into the system.
- **Logout**: Logout feature that allows admins and pic units to log out of the system.
- **User Management**: Feature for admins to add new user data, edit existing user data, and delete unwanted user data.
- **Unit Management**: Feature for admins to add new unit data, edit existing unit data, and delete unwanted unit data.
- **Server Management**: Feature for pic units to add new server data, edit existing server data, and delete unwanted server data.
- **Domain Management**: Feature for pic units to add new domain data, edit existing domain data, and delete unwanted domain data.
- **Notification Management**: Feature for admins to add new notification data, edit existing notification data, and delete unwanted notification data.
- **Solution of Notification Management**: Feature for pic units to add new solution (notification's response) data, edit existing solution (notification's response) data, and delete unwanted solution (notification's response) data.
- **Report Domain**: Feature for admins and pic units to view the reports of all domains based on their http status.
- **Profile Editing**: Feature that allows admins and pic units to view and modify profile information such as name, username, email, and password.

## ⚙️ Installation

Here are the steps to install DomainMS on your local environment:

1. Clone this repository to your local directory:

```
git clone https://github.com/alscheift/pemweb-domain-management-system.git
```
or download this repository as a zip file.

2. Navigate to the project directory:

```
cd pemweb-domain-management-system
```

3. Copy the `.env.example` file to `.env`:

```
cp .env.example .env
```

4. Set up the database configuration in the `.env` file according to your environment.

5. Run the following command to install PHP dependencies:

```
composer install
```

6. Generate the application key:

```
php artisan key:generate
```

7. Activate GD and Fileinfo Extensions:
- Open your `php.ini` file in your php directory.
- Uncomment the lines for the GD extension and the Fileinfo extension by removing the semicolon (;) at the beginning of the lines.
    ```ini
    extension=gd
    extension=fileinfo
    ```
- Save the changes to the `php.ini` file.
- This step is used to enable base64 in print-approval pdf.
- Restart your web server to apply the changes.Run migrations and seed data:

8. Run migrations and seed data:

```
php artisan migrate --seed
```

9. Start the Laravel development server:

```
php artisan serve
```

10. Start the project development in `package.json`:

```
npm run dev
```
11. Open your browser and access `http://localhost:8000` to see the DomainMS application.

## 🙌 Credits

DomainMS is built using several resources and libraries, including:

- [Laravel](https://laravel.com)
- [Faker](https://fakerphp.github.io)
- [Laravel Excel](https://laravel-excel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Flowbite](https://flowbite.com/)

## 👨‍💻 Developer Team

- [Arya Surya Baskara](https://github.com/Aryaaw)
- [Afif Nur Fauzi](https://github.com/alscheift)
- [Dafina Nazhifah](https://github.com/dafinanz)
- [Hafidh Muhammad Akbar](https://github.com/hafidhmuhammadakbar)