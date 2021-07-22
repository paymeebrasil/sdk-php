<?php
/**
 * 2021-2021 [PayMee Brasil Serviços de Pagamentos SA]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PayMee Brasil Serviços de Pagamentos SA.
 * @copyright 2021-2021 PayMee Brasil Serviços de Pagamentos SA.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Paymee\Customer\Shopper;
use Paymee\Helper\Data;
use Paymee\Api\Request;

/* Create a new shopper */
$shopper = new Shopper();
$shopper->setId(1);
$shopper->setName("Junior Maia");
$shopper->setEmail("comoquepode@gmail.com");
$shopper->setDocType("CPF"); //CPF or CPNJ
$shopper->setDocNumber("793.557.390-52");
$shopper->setPhoneType("MOBILE");
$shopper->setPhoneNumber("41988062315");

print_r($shopper->getData(true));

$checkoutData = new Data();
$checkoutData->setCurrency("BRL");
$checkoutData->setAmount("99.00");
$checkoutData->setReferenceCode("10000098");
$checkoutData->setMaxAge(2880);
$checkoutData->setPaymentMethod("PIX");
$checkoutData->setCallbackURL("yourstore.com/foo/bar");
$checkoutData->setShopper($shopper);

print_r($checkoutData->getData());

/* Create a new request */
$data   = $checkoutData->getData();
$params = "v1.1/checkout/transparent/";

$request = new Request();
$response = $request->send($data, $params);
print_r($response);

