# Application
GDCGroup is a Dockerised PHP / Laravel app enabling logged-in users to see affiliates within a given radius.

## Packages
The app uses **Laravel Sail** to quickly and simply enable Dockerisation.
> https://laravel.com/docs/10.x/sail

## User story
As a company we want to be able to see which of our affiliates have offices within 100km of our Dublin HQ so that we can invite them to a party.

## Assumptions
The list of affiliates is confidential and therefore should only be accessable to logged-in users. The txt file containing this data should also not be included in the repo.

## Requirements
Git, Composer and Docker must be installed on the host machine.

## Installation
1. Run the following commands to clone the app, create the authentication tables and create a test user
```bash
$ git clone git@github.com:jamie-ferguson/gdcgroup.git
$ cd gdcgroup
$ composer install
$ cp .env.example .env
$ sail up -d
$ sail artisan key:generate
# note: running the migrations should ask you to create a laravel database; say yes.
$ sail artisan migrate
$ sail artisan db:seed
$ sail npm install
$ sail npm run build

# tests can be run using
$ sail artisan test
# mariadb can be accessed using
$ sail mariadb
```
2. App should be available at\
http://127.0.0.1
3. Login using the following credentials\
username - test.user@gmail.com\
password - testing1
4. Default view is an empty dashboard. The affiliates page is hyperlinked at the top of the page in the nav section.
5. If not already done so, add the affiliates.txt file to the storage/app/public directory.
6. List fo affiliates within 100km of Dublin office should be visible at
http://127.0.0.1/affiliates

## Files altered and added
Files modified from vanilla Laravel app
> .env.example\
> README.md\
> routes/web.php\
> resources/views/layouts/navigation.blade.php\
Files added
> app/Http/Controllers/AffiliatesController.php\
> app/Services/*\
> app/Support/*\
> resources/views/affiliates/*\
> tests/Feature/AffiliatesTest.php\
> tests/Unit/DistanceTest.php