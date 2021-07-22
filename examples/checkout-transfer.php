<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
use Paymee\Customer\Shopper;
use Paymee\Helper\PaymentData;
use Paymee\Checkout\Payment;

/* Create a new shopper */
$shopper = new Shopper();
$shopper->setId(1);
$shopper->setName("Junior Maia");
$shopper->setEmail("comoquepode@gmail.com");
$shopper->setDocType("CPF"); //CPF or CPNJ
$shopper->setDocNumber("793.557.390-52");
$shopper->setBranch("1234");
$shopper->setAccount("1234-5");
$shopper->setPhoneType("MOBILE");
$shopper->setPhoneNumber("41988062315");

print_r($shopper->getData(false));

$paymentData = new PaymentData();
$paymentData->setCurrency("BRL");
$paymentData->setAmount("99.00");
$paymentData->setReferenceCode("10000098");
$paymentData->setMaxAge(2880);
$paymentData->setPaymentMethod("CEF_TRANSFER");
$paymentData->setCallbackURL("yourstore.com/foo/bar");
$paymentData->setShopper($shopper);

print_r($paymentData->getData(false));

/* Create payment transfer on API */
$payment = new Payment();
$responseTransfer = $payment->createTransfer($paymentData);
print_r($responseTransfer);

