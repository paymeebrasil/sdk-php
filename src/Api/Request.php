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

namespace Paymee\Api;

use Paymee\Environment;

/**
 * Class Request
 * @package Paymee\Api
 */
class Request
{
    /**
     * @param $data
     * @param null $urlParams
     * @param string $request
     * @return bool|string
     * @throws \Exception
     */
    public function send($data, $urlParams = null, $request = 'POST') {
        try {
            $url = Environment::URL_LIVE;
            if (Environment::IS_SANDBOX) {
                $url = Environment::URL_SANDBOX;
            }

            $url            = $url.$urlParams;
            $x_api_key      = Environment::X_API_KEY;
            $x_api_token    = Environment::X_API_TOKEN;

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL             => $url,
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST   => $request,
                CURLOPT_POSTFIELDS      => json_encode($data, true),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "x-api-key: $x_api_key",
                    "x-api-token: $x_api_token"
                ),
            ));

            $response   = curl_exec($curl);
            $err        = curl_error($curl);
            curl_close($curl);

            if ($err) {
                return $err;
            }

            return $response;

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}