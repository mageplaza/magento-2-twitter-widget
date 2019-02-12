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
 * Class Chrome
 *
 * @package Mageplaza\TwitterWidget\Model\Config\Source
 */
class Chrome implements ArrayInterface
{
    const NOHEADER    = 'noheader';
    const NOFOOTER    = 'nofooter';
    const NOBORDERS   = 'noborders';
    const TRANSPARENT = 'transparent';
    const NOSCROLLBAR = 'noscrollbar';

    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            [
                'value' => self::NOHEADER,
                'label' => __('No Header')
            ],
            [
                'value' => self::NOFOOTER,
                'label' => __('No Footer')
            ],
            [
                'value' => self::NOBORDERS,
                'label' => __('No Borders')
            ],
            [
                'value' => self::TRANSPARENT,
                'label' => __('Transparent')
            ],
            [
                'value' => self::NOSCROLLBAR,
                'label' => __('No Scrollbar')
            ]
        ];

        return $options;
    }
}
