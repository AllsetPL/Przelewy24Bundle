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
use Symfony\Component\Routing\RouterInterface;


class RegisterAdapter extends Przelewy24AbstractAdapter implements AdapterInterface
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * RegisterAdapter constructor.
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @return string
     */
    public function getContents()
    {

        $client = new Client();
        $response = $client->request('POST', $this->merchant->getBaseUri() . $this->registerPath, [
            'form_params' => [
                'p24_merchant_id' => $this->merchant->getMerchantId(),
                'p24_pos_id' => $this->merchant->getMerchantId(),
                'p24_api_version' => $this->apiVer,
                'p24_session_id' => $this->payment->getSessionId(),
                'p24_amount' => $this->payment->getAmount(),
                'p24_currency' => $this->payment->getCurrency(),
                'p24_description' => $this->payment->getDescription(),
                'p24_email' => $this->payment->getEmail(),
                'p24_url_return' => $this->payment->getReturnUrl(),
                'p24_url_status' => $this->router->generate('allset_przelewy24_status', [], 0),
                'p24_sign' =>
                    md5(
                        $this->payment->getSessionId() . '|' .
                        $this->merchant->getMerchantId() . '|' .
                        $this->payment->getAmount() . '|' .
                        $this->payment->getCurrency() . '|' .
                        $this->merchant->getCrc()
                    ),
            ]
        ]);
        return $response->getBody()->getContents();
    }

}