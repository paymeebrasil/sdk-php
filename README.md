# PayMee PHP SDK
## Description
The Paymee library in PHP is a set of domain classes that facilitate, for the PHP developer, the use of the functionalities that Paymee offers in the form of APIs. With the library installed and configured, you can easily integrate functionality of our API

##Requirements
- [PHP 5.6+](https://www.php.net)
- [Composer](https://getcomposer.org/)
- [cURL](https://www.php.net/manual/en/book.curl.php)

## Installation

> Note: We recommend installing by ** Composer **. You can also download the repository or clone via Git.
> To download and install Composer visit: https://getcomposer.org/download/

#### Install by Composer

Its possible install via Composer by two ways:

- Executing by composer require (recommended)
  ```
  php composer.phar require paymee/paymee-php
  ```

**Or**

- Creating dependence on file ```composer.json```
  ```composer.json
  {
      "require": {
         "paymee/paymee-php" : "^1.0"
      }
  }
  ```

### Manual Installation
- Download or clone this repository;
- Decompress files on your project;
- Execute ```php composer.phar install``` on paymee SDK project folder.

### Environment Configuration

Choose your credentials like ```API_KEY``` and ```API_TOKEN``` on file ```Environment.php```:

```php
    const X_API_KEY     = "305148c0-fa9f-3898-8866-8604e7f2ab55";
    const X_API_TOKEN   = "2db5812c-ea29-3c11-bc2a-23a3b60544ea";
```

Change ```IS_SANDBOX``` true or false to enable sandbox mode:
```php
    const IS_SANDBOX = true;
```

### Usage

#### Create Shopper
```php
$shopper = new Shopper();
$shopper->setId(1);
$shopper->setName("Fulano de tal");
$shopper->setEmail("fulano@gmail.com");
$shopper->setDocType("CPF"); //CPF or CPNJ
$shopper->setDocNumber("793.557.390-52");
$shopper->setPhoneType("MOBILE");
$shopper->setPhoneNumber("41987042218");
```

#### Create Payment Data
```php
$paymentData = new PaymentData();
$paymentData->setCurrency("BRL");
$paymentData->setAmount("99.00");
$paymentData->setReferenceCode("10000098");
$paymentData->setMaxAge(2880);
$paymentData->setPaymentMethod("PIX");
$paymentData->setCallbackURL("https://yourstore.com/foo/bar");
$paymentData->setShopper($shopper);
```
#### Create Pix Checkout

```php
$payment = new Payment();
$responsePix = $payment->createPix($paymentData);
```

### Examples

> All examples are available on examples folder

To test creation pix:
```php
php examples/checkout-pix.php 
```

To test creation transfer:
```php
php examples/checkout-transfer.php 
```