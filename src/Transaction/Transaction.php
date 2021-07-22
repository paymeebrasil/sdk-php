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

namespace Paymee\Transaction;

use Paymee\Api\Request;

/**
 * Class Transaction
 * @package Paymee\Transaction
 */
class Transaction {

    /**
     * @param $data
     * @return bool|string
     * @throws \Exception
     */
    public function query($data) {
        /* Create a new request */
        $uuid   = $data["uuid"];
        $params = "v1.1/transactions/".$uuid;

        $request    = new Request();
        $response   = $request->send(null, $params, 'GET');

        print_r($response);

        return $response;
    }

    /**
     * @param $data
     * @return bool|string
     * @throws \Exception
     */
    public function queryFilter($data) {
        /* Create a new request */
        $initialDate    = $data["initialDate"];
        $finalDate       = $data["finalDate"];

        $params = "v1.1/transactions?initialDate=".$initialDate."&finalDate=".$finalDate;

        $request    = new Request();
        $response   = $request->send(null, $params, 'GET');

        print_r($response);

        return $response;
    }

    /**
     * @return bool|string
     * @throws \Exception
     */
    public function balance() {
        $params = "v1.1/balance";

        $request    = new Request();
        $response   = $request->send(null, $params, 'GET');

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
        $saleUuid   = $data["saleUUID"];
        $params = "v1.1/transactions/".$saleUuid."/void";

        $request    = new Request();
        $response   = $request->send(null, $params, 'GET');

        print_r($response);

        return $response;
    }

    /**
     * @param $data
     * @return bool|string
     * @throws \Exception
     */
    public function refund($data) {
        /* Create a new request */
        $saleUuid   = $data["saleUUID"];
        $params     = "v1.1/transactions/".$saleUuid."/refund";

        $_data["amount"] = $data["amount"];
        $_data["reason"] = $data["reason"];

        $request    = new Request();
        $response   = $request->send($_data, $params, 'PUT');

        print_r($response);

        return $response;
    }

    /**
     * @param $data
     * @return bool|string
     * @throws \Exception
     */
    public function registerCallback($data) {
        /* Create a new request */
        $url    = $data["callbackURL"];
        $params = "v1/sandbox?callbackURL=".$url."/postback.php'";

        $request    = new Request();
        $response   = $request->send(null, $params, 'PUT');

        print_r($response);

        return $response;
    }

    /**
     * @param $data
     * @return bool|string
     * @throws \Exception
     */
    public function webhookRedeliver($data) {
        /* Create a new request */
        $uuid   = $data["uuid"];
        $params = "v1.1/transactions/".$uuid."/webhook/redeliver";

        $request    = new Request();
        $response   = $request->send(null, $params, 'GET');

        print_r($response);

        return $response;
    }

    /**
     * @param $data
     * @return bool|string
     * @throws \Exception
     */
    public function webhookRequest($data) {
        /* Create a new request */
        $uuid   = $data["uuid"];
        $params = "v1.1/transactions/".$uuid."/webhook";

        $request    = new Request();
        $response   = $request->send(null, $params, 'GET');

        print_r($response);

        return $response;
    }

    /**
     * @param $data
     * @return bool|string
     * @throws \Exception
     */
    public function creditTransfer($data) {
        /* Create a new request */
        $params = "v1.1/transactions/creditTransfer";

        $request    = new Request();
        $response   = $request->send($data, $params);

        print_r($response);

        return $response;
    }
}