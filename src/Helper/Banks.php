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

/**
 * Class Banks
 * @package Paymee\Helper
 */
class Banks {

    /**
     * @return array
     */
    public function getBanks() {
        return array(
            array('code' => '001', 'name' => '001 - Banco do Brasil S.A',               'value' => 'BB_TRANSFER'),
            array('code' => '237', 'name' => '237 - Banco Bradesco S.A',                'value' => 'BRADESCO_TRANSFER'),
            array('code' => '341', 'name' => '341 - Banco Itaú-Unibanco S.A ',          'value' => 'ITAU_TRANSFER_GENERIC'),
            array('code' => '341', 'name' => '341 - Depósito Identificado Itaú',         'value' => 'ITAU_DI'),
            array('code' => '104', 'name' => '104 - Caixa Econômica Federal',           'value' => 'CEF_TRANSFER'),
            array('code' => '202', 'name' => '202 - Banco Original S.A',                'value' => 'ORIGINAL_TRANSFER'),
            array('code' => '033', 'name' => '033 - Banco Santander S.A',               'value' => 'SANTANDER_TRANSFER'),
            array('code' => '033', 'name' => '033 - Banco Santander S.A (Depósito em dinheiro)',        'value' => 'SANTANDER_DI'),
            array('code' => '077', 'name' => '077 - Banco Inter S.A',                   'value' => 'INTER_TRANSFER'),
            array('code' => '077', 'name' => '077 - Banco Inter S.A (BS2)',             'value' => 'BS2_TRANSFER'),
        );
    }
}