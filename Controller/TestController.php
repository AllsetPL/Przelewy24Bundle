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

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Allset\Przelewy24Bundle\Factory\TestFactory;
use Allset\Przelewy24Bundle\Processor\VerifyProcessor;

class TestController extends Controller
{
    /**
     * @param TestFactory $testFactory
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function testAction(TestFactory $testFactory)
    {
        $result = $testFactory->create();

        return $this->render('@AllsetPrzelewy24/testResult.html.twig', [
            'result' => $result
        ]);
    }

    /**
     * @param VerifyProcessor $verifyProcessor
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function fakeSuccessAction(VerifyProcessor $verifyProcessor, $sessionId)
    {
        $verifyProcessor->setSessionId($sessionId);
        $verifyProcessor->setString('error=0');
        $verifyProcessor->process();

        $result = 'AllsetPrzelewy24Bundle:Test:fakeSuccess';

        return $this->render('@AllsetPrzelewy24/testResult.html.twig', [
            'result' => $result
        ]);
    }
}
