# Flip Mini Project
Requirements
- Php 7
- SQLITE
- composer

## Or


```sh
$ touch db.sqlite
$ composer dumpautoload
$ php migration.php
$ php -S 0.0.0.0:8000 -t .
```
Open browser to http://localhost:8000/disbursements

## Available Routes
- '/disbursements' for create new transaction
- '/disbursements/:transactionID' for see transaction detail and update status
