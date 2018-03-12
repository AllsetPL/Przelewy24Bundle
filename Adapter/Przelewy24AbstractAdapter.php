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

use Allset\Przelewy24Bundle\Model\Payment;
use Allset\Przelewy24Bundle\Model\Status;
use Allset\Przelewy24Bundle\Model\Merchant;

abstract class Przelewy24AbstractAdapter
{
    /**
     * @var Payment
     */
    protected $payment;

    /**
     * @var Status
     */
    protected $status;

    /**
     * @var Merchant
     */
    protected $merchant;


    protected $apiVer = '3.2';
    protected $testPath = 'testConnection';
    protected $verifyPath = 'trnVerify';
    protected $registerPath = 'trnRegister';

    /**
     * @param Payment $payment
     */
    public function setPayment(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * @param Status $status
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;
    }

    /**
     * @param Merchant $merchant
     */
    public function setMerchant(Merchant $merchant)
    {
        $this->merchant = $merchant;
    }
}