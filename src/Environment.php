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

namespace Paymee;

/**
 * Class Environment
 * @package Paymee
 */
class Environment
{
    /*
     * Get your sandbox credential on
     * https://apisandbox.paymee.com.br/register
     */
    const URL_SANDBOX   = "https://apisandbox.paymee.com.br/";
    const URL_LIVE      = "https://api.paymee.com.br/";
    const X_API_KEY     = "305148c0-fa9f-3898-8866-8604e7f2ab55";
    const X_API_TOKEN   = "2db5812c-ea29-3c11-bc2a-23a3b60544ea";
    const IS_SANDBOX    = true;
}