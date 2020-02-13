<?php

/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     ${MODULENAME}
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\TwitterWidget\Test\Unit;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\HTTP\Adapter\Curl;
use Magento\Framework\HTTP\Adapter\CurlFactory;
use Mageplaza\TwitterWidget\Controller\Twitter\Index as TwitterIndex;
use Mageplaza\TwitterWidget\Helper\Data;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;
use Psr\Log\LoggerInterface;

/**
 * Class IndexTest
 * @package Mageplaza\TwitterWidget\Test\Unit
 */
class IndexTest extends TestCase
{
    /**
     * @var Context|PHPUnit_Framework_MockObject_MockObject
     */
    private $context;

    /**
     * @var CurlFactory |PHPUnit_Framework_MockObject_MockObject
     */
    protected $curlFactory;

    /**
     * @var LoggerInterface |PHPUnit_Framework_MockObject_MockObject
     */
    protected $logger;

    /**
     * @var Data |PHPUnit_Framework_MockObject_MockObject
     */
    protected $_helperData;

    /**
     * @var RequestInterface |PHPUnit_Framework_MockObject_MockObject
     */
    protected $_request;

    /**
     * @var ResponseInterface |PHPUnit_Framework_MockObject_MockObject
     */
    protected $_response;

    /**
     * @var JsonFactory |PHPUnit_Framework_MockObject_MockObject
     */
    protected $resultJsonFactory;

    /**
     * @var TwitterIndex |PHPUnit_Framework_MockObject_MockObject
     */
    private $_controller;

    protected function setUp()
    {
        $this->context           = $this->getMockBuilder(Context::class)->disableOriginalConstructor()->getMock();
        $this->curlFactory       = $this->getMockBuilder(CurlFactory::class)->disableOriginalConstructor()->setMethods(['create'])->getMock();
        $this->logger            = $this->getMockBuilder(LoggerInterface::class)->getMock();
        $this->_helperData       = $this->getMockBuilder(Data::class)->disableOriginalConstructor()->getMock();
        $this->resultJsonFactory = $this->getMockBuilder(JsonFactory::class)->disableOriginalConstructor()->setMethods(['create'])->getMock();
        $this->_request          = $this->getMockBuilder(RequestInterface::class)->getMock();
        $this->_response         = $this->getMockBuilder(ResponseInterface::class)->setMethods([
            'representJson',
            'sendResponse'
        ])->getMock();
        $this->context->method('getRequest')->willReturn($this->_request);
        $this->context->method('getResponse')->willReturn($this->_response);

        $this->_controller = new TwitterIndex(
            $this->context,
            $this->curlFactory,
            $this->_helperData,
            $this->resultJsonFactory,
            $this->logger
        );
    }

    public function testAdminInstance()
    {
        $this->assertInstanceOf(TwitterIndex::class, $this->_controller);
    }

    public function testExecute()
    {
        $resultArray = [
            'status'  => true,
            'content' => "<a>123123</a>"
        ];
        $result      = '{status:true,content:<a>123123</a>}';
        $params      = [
            'url' => 'https://twitter.com/TwitterDev'
        ];
        $this->_request->method('getParams')->willReturn($params);
        $curl = $this->getMockBuilder(Curl::class)->disableOriginalConstructor()->getMock();
        $this->curlFactory->method('create')->willReturn($curl);
        $curl->method('read')->willReturn('\n {html:<a>123123</a>}');
        $this->_helperData->method('getHttpResponse')->with('\n {html:<a>123123</a>}')->willReturn('{html:<a>123123</a>}');
        $this->_helperData->method('getJsonDecode')->with('{html:<a>123123</a>}')->willReturn(['html' => '<a>123123</a>']);
        $curl->method('close')->willReturnSelf();
        $resultJson = $this->getMockBuilder(Json::class)->disableOriginalConstructor()->getMock();
        $this->resultJsonFactory->method('create')->willReturn($resultJson);
        $resultJson->method('setData')->with($resultArray)->willReturn($result);

        $this->assertEquals($result, $this->_controller->execute());
    }
}
