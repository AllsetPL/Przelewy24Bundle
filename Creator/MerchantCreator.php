<?php
/*
 * This file is part of the AllsetPrzelewy24Bundle package.
 *
 * (c) Allset <https://allset.pl/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Allset\Przelewy24Bundle\Creator;

use Allset\Przelewy24Bundle\Model\Merchant;

class MerchantCreator implements CreatorInterface
{

    /**
     * @var string
     */
    protected $merchantId;

    /**
     * @var string
     */
    protected $posId;

    /**
     * @var string
     */
    protected $crc;

    /**
     * @var string
     */
    protected $baseUri;


    /**
     * MerchantCreator constructor.
     * @param $sandbox
     * @param $merchantId
     * @param $crc
     */
    public function __construct($sandbox, $merchantId, $crc)
    {
        if ($sandbox) {
            $this->baseUri = 'https://sandbox.przelewy24.pl/';
        } else {
            $this->baseUri = 'https://secure.przelewy24.pl/';
        }

        $this->merchantId = $merchantId;
        $this->posId = $merchantId;
        $this->crc = $crc;
    }

    /**
     * @return Merchant
     */
    public function create()
    {
       $merchant = new Merchant();
       $merchant->setMerchantId($this->merchantId);
       $merchant->setPosId($this->posId);
       $merchant->setCrc($this->crc);
       $merchant->setBaseUri($this->baseUri);
       return $merchant;
    }

}