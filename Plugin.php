<?php

/**
 * 支持VAPTCHA的插件
 *
 * @package VAPTCHA
 * @author Frank
 * @version 1.0.0
 * @link https://www.4leaf.top
 */
class VAPTCHA_Plugin implements Typecho_Plugin_Interface{

    /* 激活插件方法 */
    public static function activate(){
        // 添加VAPTCHA所需css
        Typecho_Plugin::factory('Widget_Archive')->header = array('VAPTCHA_Plugin', 'header');

        // 添加VAPTCHA所需js
        Typecho_Plugin::factory('Widget_Archive')->footer = array('VAPTCHA_Plugin', 'footer');
        return _t('插件已启用');
    }

    /* 禁用插件方法 */
    public static function deactivate(){
        return _t('插件已禁用');
    }

    /* 插件配置方法 */
    public static function config(Typecho_Widget_Helper_Form $form){
        $vid = new Typecho_Widget_Helper_Form_Element_Text('vid', NULL, '****', _t('VID'), _t("验证单元id"));
        $form->addInput($vid);
        $button_id = new Typecho_Widget_Helper_Form_Element_Text('button_id', NULL, 'check', _t("按钮"), _t("请填入按钮ID，无需带#，验证前将禁止点击该按钮，验证成功后将允许点击该按钮"));
        $form->addInput($button_id);
    }

    /* 个人用户的配置面板 */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){
    }

    /* 头部插入css */
    public static function header(){
        $VAPTCHA_style = "
            <style>
                .vaptcha-container {
                    width: 100%;
                    height: 36px;
                    line-height: 36px;
                    text-align: center;
                }

                .vaptcha-init-main {
                    display: table;
                    width: 100%;
                    height: 100%;
                    background-color: #EEEEEE;
                }

        ​       .vaptcha-init-loading {
                    display: table-cell;
                    vertical-align: middle;
                    text-align: center
                }

        ​       .vaptcha-init-loading>a {
                    display: inline-block;
                    width: 18px;
                    height: 18px;
                    border: none;
                }

        ​       .vaptcha-init-loading>a img {
                    vertical-align: middle
                }

        ​       .vaptcha-init-loading .vaptcha-text {
                    font-family: sans-serif;
                    font-size: 12px;
                    color: #CCCCCC;
                    vertical-align: middle
                }

            </style>
        ";
        echo $VAPTCHA_style;
    }

    /*  尾部加入js */
    public static function footer(){
        $options = Typecho_Widget::widget('Widget_Options')->plugin('VAPTCHA');
        $vaptcha_js = "
            <script src=\"https://cdn.vaptcha.com/v2.js\"></script>
            <script>
                document.getElementById(".$options->button_id.").setAttribute(\"disabled\", true);
                vaptcha({
                    vid: '".$options->vid."', // 验证单元id
                    type: 'click', // 显示类型 点击式
                    container: '.vaptcha-container', // 按钮容器，可为Element 或者 selector
                }).then(function (vaptchaObj) {
                    vaptchaObj.listen('pass', function() {
                        document.getElementById(".$options->button_id.").removeAttribute(\"disabled\");
                    })
                    vaptchaObj.render()
                })
            </script>
        ";
        echo $vaptcha_js;
    }
}
