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

namespace Paymee\Checkout;

use Paymee\Helper\PaymentData;
use Paymee\Api\Request;

/**
 * Class Payment
 * @package Paymee\Checkout
 */
class Payment
{
    /**
     * @param PaymentData $paymentData
     * @return bool|string
     * @throws \Exception
     */
    public function createPix(PaymentData $paymentData) {
        $data   = $paymentData->getData(true);
        $params = "v1.1/checkout/transparent/";

        $request    = new Request();
        $response   = $request->send($data, $params);

        return $response;
    }

    /**
     * @param PaymentData $paymentData
     * @return bool|string
     * @throws \Exception
     */
    public function createTransfer(PaymentData $paymentData) {
        $data   = $paymentData->getData(false);
        $params = "v1.1/checkout/transparent/";

        $request    = new Request();
        $response   = $request->send($data, $params);

        return $response;
    }

    /**
     * @param PaymentData $paymentData
     * @return bool|string
     * @throws \Exception
     */
    public function createRedirect(PaymentData $paymentData) {
        $data   = $paymentData->getData(false);
        $params = "v1.1/checkout/";

        $request    = new Request();
        $response   = $request->send($data, $params);

        return $response;
    }
}