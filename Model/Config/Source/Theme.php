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
 * Class Theme
 *
 * @package Mageplaza\TwitterWidget\Model\Config\Source
 */
class Theme implements ArrayInterface
{
    const LIGHT = 'light';
    const DARK  = 'dark';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::LIGHT,
                'label' => __('Light')
            ],
            [
                'value' => self::DARK,
                'label' => __('Dark')
            ]
        ];

        return $options;
    }
}
