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

use Paymee\Checkout\Loans;
use Paymee\Customer\Address;
use Paymee\Customer\Customer;

$address = new Address();
$address->setCity("Curitiba");
$address->setZipcode("80050350");
$address->setStreet("Avenida das flores");
$address->setNumber("728");
$address->setComplement("Sala comercial");
$address->setNeighborhood("Centro");
$address->setState("Paraná");

print_r($address->getData());

$customer = new Customer();
$customer->setEmail("comoquepode@gmail.com");
$customer->setMobileNumber("41988062315");
$customer->setAddress($address);

print_r($customer->getData());

$loans = new Loans();
$loans->setProposalId(1);
$loans->setMaxAge(2880);
$loans->setReferenceCode("123");
$loans->setDiscriminator("teste");
$loans->setTerms("termos");
$loans->setCustomer($customer);
$loans->create();


