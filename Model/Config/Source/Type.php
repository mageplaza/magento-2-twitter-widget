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

namespace Mageplaza\TwitterWidget\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

/**
 * Class Type
 *
 * @package Mageplaza\TwitterWidget\Model\Config\Source
 */
class Type implements ArrayInterface
{
    const TIMELINE = 0;
    const TWEET = 1;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::TIMELINE,
                'label' => __('Timeline')
            ],
            [
                'value' => self::TWEET,
                'label' => __('Tweet')
            ]
        ];

        return $options;
    }
}
