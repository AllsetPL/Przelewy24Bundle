<?php
/*
 * This file is part of the AllsetPrzelewy24Bundle package.
 *
 * (c) Allset <https://allset.pl/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Allset\Przelewy24Bundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Allset\Przelewy24Bundle\Model\ModelInterface;

class PaymentRecivedEvent extends Event implements PaymentEventInterfce
{
    private $payment;

    public function getPayment()
    {
        return $this->payment;
    }

    public function setPayment(ModelInterface $payment)
    {
        $this->payment = $payment;

    }

}
