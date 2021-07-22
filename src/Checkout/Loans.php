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

use Paymee\Api\Request;
use Paymee\Customer\Customer;

/**
 * Class Loans
 * @package Paymee\Checkout
 */
class Loans {
    private $proposal_id;
    private $reference_code;
    private $terms;
    private $max_age;
    private $discriminator;
    private $customer;
    private $amount;

    /**
     * @return mixed
     */
    public function getProposalId()
    {
        return $this->proposal_id;
    }

    /**
     * @param mixed $proposal_id
     */
    public function setProposalId($proposal_id)
    {
        $this->proposal_id = $proposal_id;
    }

    /**
     * @return mixed
     */
    public function getReferenceCode()
    {
        return $this->reference_code;
    }

    /**
     * @param mixed $reference_code
     */
    public function setReferenceCode($reference_code)
    {
        $this->reference_code = $reference_code;
    }

    /**
     * @return mixed
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * @param mixed $terms
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;
    }

    /**
     * @return mixed
     */
    public function getMaxAge()
    {
        return $this->max_age;
    }

    /**
     * @param mixed $max_age
     */
    public function setMaxAge($max_age)
    {
        $this->max_age = $max_age;
    }

    /**
     * @return mixed
     */
    public function getDiscriminator()
    {
        return $this->discriminator;
    }

    /**
     * @param mixed $discriminator
     */
    public function setDiscriminator($discriminator)
    {
        $this->discriminator = $discriminator;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
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
     * @return bool|string
     * @throws \Exception
     */
    public function create() {

        $data = array(
            "proposal_id"       => $this->getProposalId(),
            "reference_code"    => $this->getReferenceCode(),
            "terms"             => $this->getTerms(),
            "max_age"           => $this->getMaxAge(),
            "discriminator"     => $this->getDiscriminator(),
            "customer"          => $this->getCustomer()->getData()
        );

        $params     = "v1.1/loans/create";
        $request    = new Request();
        $response   = $request->send($data, $params, "PUT");

        print_r($response);

        return $response;
    }

    /**
     * @return bool|string
     * @throws \Exception
     */
    public function simulation() {

        $data = array(
            "customer" => array(
                "document" => array(
                    "type"      => $this->getCustomer()->getDocType(),
                    "number"    => $this->getCustomer()->getDocNumber()
                )
            ),
            "amount" => $this->getAmount()
        );

        $params     = "v1.1/loans/simulation";
        $request    = new Request();
        $response   = $request->send($data, $params);

        print_r($response);

        return $response;
    }
}