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

namespace Mageplaza\TwitterWidget\Helper;

use Mageplaza\Core\Helper\AbstractData;

/**
 * Class Data
 *
 * @package Mageplaza\TwitterWidget\Helper
 */
class Data extends AbstractData
{
    const CONFIG_MODULE_PATH = 'mptwitterwidget';

    /**
     * @param string $code
     * @param null $store
     *
     * @return array|mixed
     */
    public function getDisplayConfig($code = '', $store = null)
    {
        $code = ($code !== '') ? '/' . $code : '';

        return $this->getModuleConfig('display' . $code, $store);
    }

    /**
     * @param null $store
     *
     * @return mixed
     */
    public function getTheme($store = null)
    {
        return $this->getDisplayConfig('theme', $store);
    }

    /**
     * @param null $store
     *
     * @return array|mixed|null
     */
    public function getWidth($store = null)
    {
        return ($this->getDisplayConfig('width', $store) != 0) ? $this->getDisplayConfig('width', $store) : null;
    }

    /**
     * @param null $store
     *
     * @return int
     */
    public function getHeight($store = null)
    {
        return $this->getDisplayConfig('height', $store) ?: 600;
    }

    /**
     * @param null $store
     *
     * @return mixed
     */
    public function showFollowBtn($store = null)
    {
        return $this->getConfigGeneral('follow_btn', $store);
    }

    /**
     * @param null $store
     *
     * @return array|mixed
     */
    public function getUsername($store = null)
    {
        return $this->getConfigGeneral('username', $store);
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function getJsonDecode($data)
    {
        return Data::jsonDecode($data);
    }

    /**
     * @param $data
     *
     * @return string
     */
    public function getHttpResponse($data)
    {
        return $this->extractBody($data);
    }

    /**
     * Extract the body from a response string
     *
     * @param string $response_str
     *
     * @return string
     */
    public static function extractBody($response_str)
    {
        $parts = preg_split('|(?:\r\n){2}|m', $response_str, 2);
        if (isset($parts[1])) {
            return $parts[1];
        }

        return '';
    }
}
