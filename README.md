# UKZ - Chema Association

#### Setup CPanel

php artisan db:seed --class=ApplicantTableSeeder

set NODE_OPTIONS=--openssl-legacy-provider

# Run scheduled tasks
php artisan schedule:work

# Run jobs
php artisan queue:work

Donations table 
-- make member_id not null
-- Add desription not null
-- Amount not null
-- Description not null
-- Add Invoice id not null 
-- Add payment ref not null

Invoices table
-- Add invoice description not null and display on bread
-- Invoice type not null -- Obituary or Deposit
-- Invoice member id not null
-- Invoice to be related to obituary

Obituary bread
-- Make member id required

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
