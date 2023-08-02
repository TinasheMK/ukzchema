# UKZ - Chema Association

#### Setup CPanel

php artisan db:seed --class=ApplicantTableSeeder



## Section 3: Scheduling, Reminders and Payments:

3.	Automatically detect unpaid invoices and send periodical reminders.
4.	Send account suspension notification before suspending account.

set NODE_OPTIONS=--openssl-legacy-provider

# Run scheduled tasks
php artisan schedule:work
