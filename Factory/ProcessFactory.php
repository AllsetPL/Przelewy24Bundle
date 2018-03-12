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

use Allset\Przelewy24Bundle\Adapter\RegisterAdapter;
use Allset\Przelewy24Bundle\Creator\MerchantCreator;
use Allset\Przelewy24Bundle\Model\Payment;
use Allset\Przelewy24Bundle\Processor\ProcessProcessor;

class ProcessFactory
{
    /**
     * @var Payment
     */
    private $payment;

    /**
     * @var MerchantCreator
     */
    private $merchantCreator;

    /**
     * @var ProcessProcessor
     */
    private $processProcessor;

    /**
     * @var RegisterAdapter
     */
    private $registerAdapter;

    /**
     * ProcessFactory constructor.
     *
     * @param MerchantCreator $merchantCreator
     * @param RegisterAdapter $registerAdapter
     * @param ProcessProcessor $processProcessor
     */
    public function __construct(MerchantCreator $merchantCreator, RegisterAdapter $registerAdapter, ProcessProcessor $processProcessor)
    {
        $this->merchantCreator = $merchantCreator;
        $this->registerAdapter = $registerAdapter;
        $this->processProcessor = $processProcessor;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function createAndGetUrl()
    {
        $merchant = $this->merchantCreator->create();

        $this->registerAdapter->setMerchant($merchant);
        $this->registerAdapter->setPayment($this->payment);

        $result = $this->registerAdapter->getContents();

        $this->processProcessor->setString($result);
        return $this->processProcessor->process();
    }

    /**
     * @param Payment $payment
     */
    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;
    }

}