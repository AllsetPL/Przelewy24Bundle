<?php
/*
 * This file is part of the AllsetPrzelewy24Bundle package.
 *
 * (c) Allset <https://allset.pl/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Allset\Przelewy24Bundle\Model;


class Merchant
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
     * @var
     */
    protected $baseUri;

    /**
     * @return mixed
     */
    public function getPosId()
    {
        return $this->posId;
    }

    /**
     * @param $posId
     * @return $this
     */
    public function setPosId($posId)
    {
        $this->posId = $posId;
        return $this;

    }

    /**
     * @return mixed
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @param $merchantId
     * @return $this
     */
    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
        return $this;

    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * @param $baseUri
     * @return $this
     */
    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
        return $this;

    }

    /**
     * @return mixed
     */
    public function getCrc()
    {
        return $this->crc;
    }

    /**
     * @param $crc
     * @return $this
     */
    public function setCrc($crc)
    {
        $this->crc = $crc;
        return $this;

    }


}