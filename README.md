Database
name:jongeren_kansrijk

before first use run these commands:
php artisan migrate --seed

to run application:
php artisan serve
npm run dev

function are in the controller files:
app/http/contollers/JongerenController.php
app/http/contollers/ActiviteitenController.php
app/http/contollers/KoppelController.php

database structure is in:
database/migrations

routing is in web.php

views are in:
resources/views/jongeren
resources/views/activiteiten
resources/views/koppel

user login:
user@user.com
12345678

