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

namespace Mageplaza\TwitterWidget\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Module\Manager;
use Magento\Widget\Block\BlockInterface;
use Mageplaza\TwitterWidget\Helper\Data;
use Mageplaza\TwitterWidget\Model\Config\Source\Design;

/**
 * Class Widget
 *
 * @package Mageplaza\TwitterWidget\Block
 */
class Widget extends Template implements BlockInterface
{
    /**
     * @var string
     */
    protected $_template = "twitter.phtml";

    /**
     * @var Manager
     */
    protected $moduleManager;

    /**
     * @var Data
     */
    protected $helperData;

    /**
     * Widget constructor.
     *
     * @param Template\Context $context
     * @param Data $helperData
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Manager $moduleManager,
        Data $helperData,
        array $data = []
    ) {
        $this->moduleManager = $moduleManager;
        $this->helperData = $helperData;

        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function isEnable()
    {
        return $this->helperData->isEnabled() && $this->moduleManager->isOutputEnabled('Mageplaza_TwitterWidget');
    }

    /**
     * Retrieve all options for Instagram feed
     *
     * @return mixed
     */
    public function getAllOptions()
    {
        $option = $this->getData('design');
        if ($option == Design::CONFIG) {
            $this->setData(array_merge($this->helperData->getDisplayConfig(), $this->getData()));
        }

        if ($this->getData('chrome')) {
            $this->setData('chrome', str_replace(",", " ", $this->getData('chrome')));
        }

        $this->setData('follow_btn', $this->helperData->showFollowBtn());
        $this->setData('username', $this->helperData->getUsername());

        return Data::jsonEncode($this->getData());
    }

    /**
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->_urlBuilder->getUrl('mptwitterwidget/twitter/');
    }
}
