<?php
/*
 * This file is part of the AllsetPrzelewy24Bundle package.
 *
 * (c) Allset <https://allset.pl/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Allset\Przelewy24Bundle\Factory;

use Allset\Przelewy24Bundle\Adapter\VerifyAdapter;
use Allset\Przelewy24Bundle\Creator\StatusCreator;
use Allset\Przelewy24Bundle\Creator\MerchantCreator;
use Allset\Przelewy24Bundle\Processor\VerifyProcessor;

class VerifyFactory
{
    /**
     * @var VerifyAdapter
     */
    private $verifyAdapter;

    /**
     * @var StatusCreator
     */
    private $statusCreator;

    /**
     * @var MerchantCreator
     */
    private $merchantCreator;

    /**
     * @var VerifyProcessor
     */
    private $verifyProcessor;

    /**
     * VerifyFactory constructor.
     * @param VerifyAdapter $verifyAdapter
     * @param StatusCreator $statusCreator
     * @param MerchantCreator $merchantCreator
     */
    public function __construct(VerifyAdapter $verifyAdapter, StatusCreator $statusCreator, MerchantCreator $merchantCreator, VerifyProcessor $verifyProcessor)
    {
        $this->verifyAdapter = $verifyAdapter;
        $this->statusCreator = $statusCreator;
        $this->merchantCreator = $merchantCreator;
        $this->verifyProcessor = $verifyProcessor;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function create()
    {
        $status = $this->statusCreator->create();

        $this->verifyAdapter->setStatus($status);

        $merchant = $this->merchantCreator->create();
        $this->verifyAdapter->setMerchant($merchant);

        $result = $this->verifyAdapter->getContents();

        $this->verifyProcessor->setSessionId($status->getSessionId());
        $this->verifyProcessor->setString($result);

        return $this->verifyProcessor->process();
    }
}