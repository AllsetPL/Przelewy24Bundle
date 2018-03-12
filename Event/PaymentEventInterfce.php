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


use Allset\Przelewy24Bundle\Model\ModelInterface;

interface PaymentEventInterfce
{
    /**
     * @return ModelInterface
     */
    public function getPayment();
}