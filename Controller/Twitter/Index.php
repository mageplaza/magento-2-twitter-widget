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
 * @category  Mageplaza
 * @package   Mageplaza_TwitterWidget
 * @copyright Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license   https://www.mageplaza.com/LICENSE.txt
 */

namespace Mageplaza\TwitterWidget\Controller\Twitter;

use Exception;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\HTTP\Adapter\Curl;
use Magento\Framework\HTTP\Adapter\CurlFactory;
use Mageplaza\TwitterWidget\Helper\Data;
use Psr\Log\LoggerInterface;
use Zend_Http_Client;

/**
 * Class Twitter
 *
 * @package Mageplaza\TwitterWidget\Controller
 */
class Index extends Action
{
    /**
     * @var CurlFactory
     */
    protected $curlFactory;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var Data
     */
    protected $_helperData;

    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param CurlFactory $curlFactory
     * @param Data $helperData
     * @param JsonFactory $jsonFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        CurlFactory $curlFactory,
        Data $helperData,
        JsonFactory $jsonFactory,
        LoggerInterface $logger
    ) {
        $this->curlFactory       = $curlFactory;
        $this->_helperData       = $helperData;
        $this->resultJsonFactory = $jsonFactory;
        $this->logger            = $logger;

        parent::__construct($context);
    }

    /**
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $result = ['status' => false];
        try {
            $params   = $this->getRequest()->getParams();
            $response = $this->getEmbedResponse($params);
            if (array_key_exists('html', $response)) {
                $result = [
                    'status'  => true,
                    'content' => $response['html']
                ];
            } else {
                $result = [
                    'status'  => false,
                    'content' => $response['message']
                ];
            }
        } catch (Exception $e) {
            $result['content'] = $e->getMessage();
            $this->logger->critical($e);
        }

        /** @var Json $resultJson */
        $resultJson = $this->resultJsonFactory->create();

        return $resultJson->setData($result);
    }

    /**
     * @param $params
     *
     * @return array
     */
    public function getEmbedResponse($params)
    {
        $result                = [];
        $params['omit_script'] = '1';
        $url                   = 'https://publish.twitter.com/oembed?' . http_build_query($params, null, '&');

        /** @var Curl $curl */
        $curl = $this->curlFactory->create();
        $curl->write(Zend_Http_Client::GET, $url, '1.1', [], '');

        try {
            $resultCurl = $curl->read();
            if (!empty($resultCurl)) {
                $responseBody = $this->_helperData->getHttpResponse($resultCurl);
                $result       += $this->_helperData->getJsonDecode($responseBody);
                if (empty($result)) {
                    $result['message'] = __('Sorry, that twitter page doesn\'t exist!');
                }
            }
        } catch (Exception $e) {
            $result['message'] = $e->getMessage();
        }

        $curl->close();

        return $result;
    }
}
