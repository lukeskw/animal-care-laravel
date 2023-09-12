# animal-care-laravel
_A simple laravel based system to help with animal care_

## Technologies used
- MVC architecture
- Front-end based on HTML, CSS, Bootstrap, JS, jQuery
- TailwindCSS on the homepage
- Back-end based on PHP, using the famous Laravel 8 framework
- Authentication based on Laravel Breeze scafolding
- MySQL Database
- DomPDF to generate PDF reports.

## Services Used
- Github
- Material Icons
- Tailwind Gradient Generator
- Laravel Docs

## System Features
- Management of Clients, Animals and Procedures
- Management of the stock
- Autocomplete features on search bars
- Reports of the procedures, and products in stock
- Listing of the procedures done with every registered animal

## Getting Started
- First, clone the repo.
- Start your local server and create a MySQL Database.
- Rename .env.example to .env and change DB_DATABASE, DB_USERNAME and DB_PASSWORD with the DB info that you've just created.
- Then simply run
```
php artisan migrate
php artisan db:seed
php artisan serve
```

Then open your [localhost](http://localhost:8000/) with your browser and voilà. You'll have an authenticated user with the following email and password
```
admin@app.com
password
```

## How to use

### Here's the homepage, to access the dashboard, click in "Área Restrita"
![Screenshot of the homepage](/public/readme/homepage.png)

### Login in the system
![Screenshot of the login area](/public/readme/login.png)

### This is the dashboard home, with the cool pictures (told ya!)
![Screenshot of the dashboard area](/public/readme/dashboard.png)

### Create a client on this page
![Screenshot of the client area](/public/readme/clients.png)

### Then link an animal to it
![Screenshot of the animal area](/public/readme/animals.png)

### Register a product on this page
![Screenshot of the products area](/public/readme/products.png)

### Enter with a new procedure on this page
![Screenshot of the procedures area](/public/readme/procedure.png)

### Then generate a new procedure
![Screenshot of the generate procedures area](/public/readme/generate_procedure.png)

### Now go check the reports!!!
![Screenshot of the procedure report](/public/readme/procedure_report.png)
![Screenshot of the product report](/public/readme/products_report.png)

## Features
- Homepage built with tailwind
- Create new user
- Complete Authentication
- Register new clients
- Register new animals
- Register new products
- Register new procedures
- Make a procedure linking the procedure to the products and animal
- Two monthly reports: products available report and all procedures done ordered by clients
- And the most important of all: cute random pictures on the dashboard screen 😁

## Authors
Lucas Porfirio: @lukeskw (https://github.com/lukeskw)
Please follow my github and join us! Thanks to visiting me and good coding!

Ps: This was my very first laravel project, and it does plays a huge part on my history as a developer. And I'm very proud of it!
