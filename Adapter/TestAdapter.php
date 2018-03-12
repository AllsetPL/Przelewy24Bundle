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

class TestAdapter extends Przelewy24AbstractAdapter implements AdapterInterface
{
    /**
     * @return string
     */
    public function getContents()
    {
        $client = new Client();
        $response = $client->request('POST', $this->merchant->getBaseUri() . $this->testPath, [
            'form_params' => [
                'p24_merchant_id' => $this->merchant->getMerchantId(),
                'p24_pos_id' => $this->merchant->getMerchantId(),
                'p24_sign' => md5(
                    $this->merchant->getMerchantId() . '|' .
                    $this->merchant->getCrc()
                )
            ]
        ]);
        return $response->getBody()->getContents();
    }
}