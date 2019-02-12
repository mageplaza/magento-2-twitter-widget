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

namespace Mageplaza\TwitterWidget\Block\Adminhtml\System;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Class Snippet
 *
 * @package Mageplaza\TwitterWidget\Block\Adminhtml\System
 */
class Snippet extends Field
{
    /**
     * @param  AbstractElement $element
     *
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $html = '<div class="control-value" style="padding-top: 8px; font-size: 11px;"><p>';
        $html .= __('Use the following code to show Twitter widget in any places which you want.');
        $html .= '</p><strong>';

        $html .= __('CMS Page/Static Block');
        $html .= '</strong><br /><pre style="background-color: #f5f5dc;"><code>{{block class="Mageplaza\TwitterWidget\Block\Widget" title="Twitter timeline" description="" design="0" twitter_type="0" timeline_url="https://twitter.com/TwitterDev" limit="10"}}</code></pre><strong>';

        $html .= __('Template .phtml file');
        $html .= '</strong><br /><pre style="background-color: #f5f5dc;"><code>' . $this->_escaper->escapeHtml(
                '<?php echo $block->getLayout()->createBlock(\Mageplaza\TwitterWidget\Block\Widget::class)->setData([
        "title" => "Twitter timeline",
        "description" => "",
        "design" => "0",
        "twitter_type" => "0",
        "timeline_url" => "https://twitter.com/TwitterDev",
        "limit" => "10"
        ])
    ->toHtml();?>'
            ) . '</code></pre><strong>';

        $html .= __('Layout file');
        $html .= '</strong><br /><pre style="background-color: #f5f5dc;"><code>' . $this->_escaper->escapeHtml(
                '<block class="Mageplaza\TwitterWidget\Block\Widget" name="mp_twitter_widget" >
<arguments>
    <argument name="title" xsi:type="string">Twitter timeline</argument>
    <argument name="description" xsi:type="string"></argument>
    <argument name="design" xsi:type="string">0</argument>
    <argument name="twitter_type" xsi:type="string">0</argument>
    <argument name="timeline_url" xsi:type="string">https://twitter.com/TwitterDev</argument>
    <argument name="limit" xsi:type="string">10</argument>
</arguments>
</block>'
            ) . '</code></pre>';

        $html .= '</div>';

        return $html;
    }
}
