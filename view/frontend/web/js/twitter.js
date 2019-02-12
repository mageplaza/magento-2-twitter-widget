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
define(
    [
    "jquery",
    'mage/storage'
    ], function ($, storage) {
        "use strict";
        $.widget(
            "mageplaza.twitter", {
                options: {
                    id: "",
                    url: "",
                    url_controller: "",
                    params: {}
                },
                _create: function () {
                    this._ajaxSubmit();
                },

                _ajaxSubmit: function () {
                    var id             = "#mptwitterwidget-block-" + this.options.id,
                        element        = $(id)[0],
                        url_controller = this.options.url_controller,
                        follow_btn     = this.options.params.follow_btn,
                        element_btn    = $("#mptwitterwidget-follow-btn-" + this.options.id)[0],
                        id_load        = "#mptwitterwidget-load-" + this.options.id,
                        username       = this.options.params.username,
                        params_tweet   = {
                            url: this.options.url,
                            theme: this.options.params.theme,
                            link_color: this.options.params.link_color,
                            border_color: this.options.params.border_color,
                            maxwidth: this.options.params.width,
                            maxheight: this.options.params.height,
                            hide_thread: this.options.params.hide_thread,
                            hide_media: this.options.params.hide_media
                        },
                        param_timeline = {
                            url: this.options.url,
                            theme: this.options.params.theme,
                            link_color: this.options.params.link_color,
                            border_color: this.options.params.border_color,
                            maxwidth: this.options.params.width,
                            maxheight: this.options.params.height,
                            chrome: this.options.params.chrome,
                            limit: this.options.params.limit
                        };
                    $.ajax(
                        {
                            url: url_controller,
                            data: this.options.params.twitter_type === '0' ? param_timeline : params_tweet,
                            type: "POST",
                            success: function ($result) {
                                $(id).append($result.content);
                                twttr.widgets.load(element);
                                if (follow_btn === '1') {
                                    twttr.widgets.createFollowButton(
                                        username,
                                        element_btn,
                                        {
                                            showCount: false
                                        }
                                    );
                                }
                                twttr.events.bind(
                                    'loaded',
                                    function (event) {
                                        event.widgets.forEach(
                                            function (widget) {
                                                $(id_load).hide();
                                            }
                                        );
                                    }
                                );
                            },
                            error: function ($result) {
                                console.log($result.content);
                            }
                        }
                    );
                }
            }
        );

        return $.mageplaza.twitter;
    }
);
