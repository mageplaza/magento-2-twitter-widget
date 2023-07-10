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
        "underscore"
    ], function ($, _) {
        "use strict";
        $.widget(
            "mageplaza.twitter", {
                _create: function () {
                    this._ajaxSubmit();
                },

                _ajaxSubmit: function () {
                    var id             = "#mptwitterwidget-block-" + this.options.id,
                        element        = $(id)[0],
                        url_controller = this.options.requestUrl,
                        follow_btn     = this.options.params.follow_btn,
                        element_btn    = $("#mptwitterwidget-follow-btn-" + this.options.id)[0],
                        id_load        = "#mptwitterwidget-load-" + this.options.id,
                        username       = this.options.params.username,
                        default_param  = {
                            url: this.options.url,
                            theme: this.options.params.theme,
                            border_color: this.options.params.border_color,
                            maxWidth: this.options.params.width,
                            maxHeight: this.options.params.height
                        },
                        params_tweet   = {
                            hide_thread: this.options.params.hide_thread,
                            hide_media: this.options.params.hide_media
                        },
                        param_timeline = {
                            chrome: this.options.params.chrome,
                            limit: this.options.params.limit
                        };

                    $.ajax(
                        {
                            url: url_controller,
                            // Check the twitter type to get the parameter (timeline is 0)
                            data: this.options.params.twitter_type === '0' ?
                                _.extend(default_param, param_timeline) :
                                _.extend(default_param, params_tweet),
                            type: "POST",
                            success: function (result) {
                                $(id).append(result.content);
                                $(id).css({
                                    'width' : default_param.maxWidth + 'px',
                                    'height' : default_param.maxHeight + 'px'
                                });
                                if (default_param.maxWidth) {
                                    $('.mptwitterwidget-header').css('width', default_param.maxWidth);
                                } else {
                                    $('.mptwitterwidget-header').css('min-width', '350px');
                                }

                                twttr.widgets.load(element);
                                // create follow button if enable
                                if (follow_btn === '1') {
                                    twttr.widgets.createFollowButton(
                                        username,
                                        element_btn,
                                        {
                                            showCount: false
                                        }
                                    );
                                }
                                // event loaded widget
                                twttr.events.bind(
                                    'loaded',
                                    function (event) {
                                        event.widgets.forEach(
                                            function () {
                                                if (params_tweet.hide_media !== '0' && typeof params_tweet.hide_media !== 'undefined') {
                                                    $(".twitter-timeline").contents().find(".timeline-Tweet-media").css("display", "none");
                                                }
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
