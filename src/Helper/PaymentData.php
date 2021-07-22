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

namespace Paymee\Helper;

use Paymee\Customer\Shopper;

/**
 * Class PaymentData
 * @package Paymee\Helper
 */
class PaymentData
{

    private $currency;
    private $amount;
    private $referenceCode;
    private $maxAge;
    private $paymentMethod;
    private $callbackURL;
    private $shopper;

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getReferenceCode()
    {
        return $this->referenceCode;
    }

    /**
     * @param mixed $referenceCode
     */
    public function setReferenceCode($referenceCode)
    {
        $this->referenceCode = $referenceCode;
    }

    /**
     * @return mixed
     */
    public function getMaxAge()
    {
        return $this->maxAge;
    }

    /**
     * @param mixed $maxAge
     */
    public function setMaxAge($maxAge)
    {
        $this->maxAge = $maxAge;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return mixed
     */
    public function getCallbackURL()
    {
        return $this->callbackURL;
    }

    /**
     * @param mixed $callbackURL
     */
    public function setCallbackURL($callbackURL)
    {
        $this->callbackURL = $callbackURL;
    }

    /**
     * @return mixed
     */
    public function getShopper()
    {
        return $this->shopper;
    }

    /**
     * @param mixed $shopper
     */
    public function setShopper(Shopper $shopper)
    {
        $this->shopper = $shopper;
    }

    /**
     * @param false $pix
     * @return array
     */
    public function getData($pix = false) {
        return array(
            "currency"          => $this->getCurrency(),
            "amount"            => $this->getAmount(),
            "referenceCode"     => $this->getReferenceCode(),
            "maxAge"            => $this->getMaxAge(),
            "paymentMethod"     => $this->getPaymentMethod(),
            "callbackURL"       => $this->getCallbackURL(),
            "shopper"           => $this->getShopper()->getData($pix)
        );
    }
}