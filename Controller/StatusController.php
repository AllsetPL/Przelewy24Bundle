<?php
/*
 * This file is part of the AllsetPrzelewy24Bundle package.
 *
 * (c) Allset <https://allset.pl/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Allset\Przelewy24Bundle\Controller;

use Allset\Przelewy24Bundle\Factory\VerifyFactory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;


class StatusController extends Controller
{
    /**
     * @param VerifyFactory $verifyFactory
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function getStatusAction(VerifyFactory $verifyFactory)
    {
        $result = $verifyFactory->create();


        return $this->render('@AllsetPrzelewy24/testResult.html.twig', [
            'result' => $result
        ]);
    }
}
