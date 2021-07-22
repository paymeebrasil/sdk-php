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

namespace Paymee\Payout;

use Paymee\Api\Request;

/**
 * Class Payout
 * @package Paymee\Payout
 */
class Payout {

    private $payments;

    /**
     * @return mixed
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param mixed $payments
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;
    }

    /**
     * @return bool|string
     * @throws \Exception
     */
    public function createBatch() {
        /* Create a new request */
        $params = "v1.1/payout/create/batch";

        $payments   = $this->getPayments();
        $request    = new Request();
        $response   = $request->send($payments, $params);

        print_r($response);

        return $response;
    }

    /**
     * @return bool|string
     * @throws \Exception
     */
    public function createIndividual() {
        /* Create a new request */
        $params = "v1.1/payout/create";

        $payments   = $this->getPayments();
        $request    = new Request();
        $response   = $request->send($payments, $params);

        print_r($response);

        return $response;
    }

    /**
     * @param $data
     * @return bool|string
     * @throws \Exception
     */
    public function cancel($data) {
        /* Create a new request */
        $params = "v1.1/payout";

        $request    = new Request();
        $response   = $request->send($data, $params, "DELETE");

        print_r($response);

        return $response;
    }

    /**
     * @param $data
     * @return bool|string
     * @throws \Exception
     */
    public function authorize($data) {
        /* Create a new request */
        $tid                = $data["tid"];
        $authorizationCode  = $data["authorizationCode"];
        $params             = "v1.1/payout/authorize/".$tid."/".$authorizationCode;

        $request    = new Request();
        $response   = $request->send(null, $params);

        print_r($response);

        return $response;
    }
}