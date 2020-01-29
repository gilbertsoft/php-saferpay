<?php

/*
 * This file is part of the gilbertsoft/saferpay-json-api.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Gilbertsoft\SaferpayJsonApi\Tests\SecureAliasStore;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Gilbertsoft\SaferpayJsonApi\SecureAliasStore\InsertDirectRequest;
use JMS\Serializer\SerializerBuilder;

class InsertDirectRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testErrorResponse()
    {
        $initializer = new InsertDirectRequest();
        $initializer->setBrowser($this->getBrowserMock(false));
        $response = $initializer->execute();

        $this->assertInstanceOf('Gilbertsoft\SaferpayJsonApi\Message\ErrorResponse', $response);
    }

    public function testSuccessfulResponse()
    {
        $initializer = new InsertDirectRequest();
        $initializer->setBrowser($this->getBrowserMock(true));
        $response = $initializer->execute();

        $this->assertInstanceOf('Gilbertsoft\SaferpayJsonApi\SecureAliasStore\InsertDirectResponse', $response);
    }

    public function getBrowserMock($successful)
    {
        $browser = $this->getMockBuilder('Buzz\Browser')
            ->disableOriginalConstructor()
            ->setMethods(['post'])
            ->getMock();

        $browser->expects($this->once())
            ->method('post')
            ->will($this->returnValue($this->getResponseMock($successful)));

        return $browser;
    }

    public function getResponseMock($successful)
    {
        $response = $this->getMockBuilder('Buzz\Message\Response')
            ->disableOriginalConstructor()
            ->setMethods(['getStatusCode', 'isClientError', 'getContent'])
            ->getMock();

        $response->expects($this->any())
            ->method('isClientError')
            ->will($this->returnValue(!$successful));

        $response->expects($this->any())
            ->method('getStatusCode')
            ->will($this->returnValue(200));

        if ($successful) {
            $content = $this->getFakedApiResponse('Gilbertsoft\SaferpayJsonApi\SecureAliasStore\InsertDirectResponse');
        } else {
            $content = $this->getFakedApiResponse('Gilbertsoft\SaferpayJsonApi\Message\ErrorResponse');
        }

        $response->expects($this->any())
            ->method('getContent')
            ->will($this->returnValue($content));

        return $response;
    }

    public function getFakedApiResponse($class)
    {
        AnnotationRegistry::registerLoader('class_exists');
        $serializer = SerializerBuilder::create()->build();

        $response = new $class();

        return $serializer->serialize($response, 'json');
    }
}
