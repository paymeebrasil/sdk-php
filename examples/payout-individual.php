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

use Paymee\Payout\Bank;
use Paymee\Payout\Beneficiary;
use Paymee\Payout\Payment;
use Paymee\Payout\Payout;

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

$bankDetails = new Bank();
$bankDetails->setType("CHECKING");
$bankDetails->setBankCode("077");
$bankDetails->setBranch("0001");
$bankDetails->setAccount("000001-5");

$beneficiary = new Beneficiary();
$beneficiary->setDocType("CPF");
$beneficiary->setDocNumber("793.557.390-52");
$beneficiary->setBank($bankDetails);

$payoutPayment = new Payment();
$payoutPayment->setAmount("1000.00");
$payoutPayment->setReferenceCode("1000123");
$payoutPayment->setEmail("comoquepode@gmail.com");
$payoutPayment->setBeneficiary($beneficiary);
$payoutPayment->setScheduledDate("2019-11-29 15:00:00");
$payoutPayment->setNotes("example-01");

print_r($payoutPayment->getData());

$payout = new Payout();
$payout->setPayments($payoutPayment->getData());
$payout->createIndividual();