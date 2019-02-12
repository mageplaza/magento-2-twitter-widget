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

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\HTTP\Adapter\CurlFactory;
use Mageplaza\TwitterWidget\Helper\Data;
use Psr\Log\LoggerInterface;

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
     * Index constructor.
     *
     * @param Context $context
     * @param CurlFactory $curlFactory
     * @param Data $helperData
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        CurlFactory $curlFactory,
        Data $helperData,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->curlFactory = $curlFactory;
        $this->_helperData = $helperData;
        $this->logger      = $logger;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
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
        } catch (\Exception $e) {
            $result['content'] = $e->getMessage();
            $this->logger->critical($e);
        }

        return $this->getResponse()->representJson($this->_helperData->getJsonEncode($result));
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

        /** @var \Magento\Framework\HTTP\Adapter\Curl $curl */
        $curl = $this->curlFactory->create();
        $curl->write(\Zend_Http_Client::GET, $url, '1.1', [], '');

        try {
            $resultCurl = $curl->read();
            if (!empty($resultCurl)) {
                $responseBody = $this->_helperData->getHttpResponse($resultCurl);
                $result       += $this->_helperData->getJsonDecode($responseBody);
                if (!count($result)) {
                    $result['message'] = __('Sorry, that twitter page doesn\'t exist!');
                }
            }
        } catch (\Exception $e) {
            $result['message'] = $e->getMessage();
        }

        $curl->close();

        return $result;
    }
}
