<?php
/*
 * This file is part of the AllsetPrzelewy24Bundle package.
 *
 * (c) Allset <https://allset.pl/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Allset\Przelewy24Bundle\Adapter;

use GuzzleHttp\Client;

class VerifyAdapter extends Przelewy24AbstractAdapter implements AdapterInterface
{
    /**
     * @return string
     */
    public function getContents()
    {
        $client = new Client();
        $response = $client->request('POST', 'https://secure.przelewy24.pl/trnVerify', [
            'form_params' => [
                'p24_merchant_id' => $this->merchant->getMerchantId(),
                'p24_pos_id' => $this->merchant->getMerchantId(),
                'p24_session_id' => $this->status->getSessionId(),
                'p24_amount' => $this->status->getAmount(),
                'p24_currency' => $this->status->getCurrency(),
                'p24_order_id' => $this->status->getOrderId(),
                'p24_sign' => md5(
                    $this->status->getSessionId() . '|' .
                    $this->merchant->getMerchantId() . '|' .
                    $this->status->getAmount() . '|' .
                    $this->status->getCurrency() . '|' .
                    $this->merchant->getCrc()
                ),
            ]
        ]);
        return $response->getBody()->getContents();
    }
}