<?php
/*
 * This file is part of the AllsetPrzelewy24Bundle package.
 *
 * (c) Allset <https://allset.pl/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Allset\Przelewy24Bundle\Processor;

use Allset\Przelewy24Bundle\Exception\Exception;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Allset\Przelewy24Bundle\Model\Payment;
use Allset\Przelewy24Bundle\Event\PaymentRecivedEvent;

class VerifyProcessor implements ProcessorInterface
{

    /**
     * @var string
     */
    private $string;

    /**
     * @var EventDispatcher
     */
    private $eventDispatcher;

    /**
     * @var
     */
    private $sessionId;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function process()
    {
        Exception::getExceptionsFromString($this->string, 'verify');

        $payment = new Payment();
        $payment->setSessionId($this->sessionId);
        $event = new PaymentRecivedEvent();
        $event->setPayment($payment);
        return $this->eventDispatcher->dispatch('przelewy24.event.payment_success', $event);
    }

    /**
     * @param string $string
     */
    public function setString($string)
    {
        $this->string = $string;
    }

    /**
     * @param $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }
}