# UKZ - Chema Association

#### Setup CPanel

php artisan db:seed --class=ApplicantTableSeeder

set NODE_OPTIONS=--openssl-legacy-provider

# Run scheduled tasks
php artisan schedule:work

# Run jobs
php artisan queue:work

# Depl
member_obituary make meber not unique

//todo
Kernel refactor code get unpaid invoices and reminder not 3
A donation is a payment from straight from paypay to user balance by deposit or obituary payment  
Create donation when invoice / obituary payment is received
Create donation when payment is received as deposit




On deposit{
  Update member and user balance on deposit
  create deposit

  Check if balance enough or above zero to pay for obituaries (invoices) and pay 
}

On Obituary payment{
  Update member and user balance
  Create donation
  Pay invoice
}

Donation to have ->
invoice id
payment ref 
obituary ref
description 


php artisan cache:clear
