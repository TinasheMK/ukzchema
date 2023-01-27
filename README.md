# UKZ - Chema Association

#### Setup CPanel

php artisan db:seed --class=ApplicantTableSeeder


## Personal wallet for each user
## Show balance on the dashboard
## Request contributions from all members and indicate a negative balance until payment is made
## Generate an invoice for each user when payment is requested
## Send email notifications with payment requests and payments
## Add funds directly to wallet through PayPal
## Admin to view all user invoices and download invoice for printing
Allow manual addition of funds when payment is made to bank account or physically delivered

## Section 3: Scheduling, Reminders and Payments:

## 1.	Send request for payment notifications to all members when subscription payments are required.
## 2.	Generate invoices to members when request for subscriptions is created.
3.	Automatically detect unpaid invoices and send periodical reminders.
4.	Send account suspension notification before suspending account.



## Update Details
php upgrade
db: create bread for invoice & ascociate invoice items
change invoice item to items then add soft deletes
export wallets
change maber_number to memberid in invoice db
invoice_ref to invoice id
