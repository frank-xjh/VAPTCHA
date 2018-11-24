# VAPTCHA 插件

## 介绍

众所周知，现在随着技术的提高，各种 bot 层出不穷，恶意破解密码，刷页，灌水，而验证码就很好的解决了这个问题。然而传统的人机验证解决方案，极易被自动化程序破解，所以在此采用 VAPTCHA （手势验证码）有效解决这个问题。

## 部署

### 注册账户

进入 [VAPTCHA 注册页面](https://www.vaptcha.com/register)注册账户（可以使用Google、Facebook、Twitter、微信、QQ第三方登录）

![VAPTCHA 注册界面](https://github.com/frank-xjh/VAPTCHA/raw/master/VAPTCHA%E6%B3%A8%E5%86%8C%E7%95%8C%E9%9D%A2.jpg)

### 创建验证单元

登录完毕后，会看到如下界面（由于我已经注册并使用，所以界面会略有不同）

![VAPTCHA 管理页面](https://github.com/frank-xjh/VAPTCHA/raw/master/VAPTCHA%E7%AE%A1%E7%90%86%E9%A1%B5%E9%9D%A2.png)

点击**创建验证单元**，按照下图配置

![VAPTCHA 验证单元配置界面](https://github.com/frank-xjh/VAPTCHA/raw/master/VAPTCHA%E5%88%9B%E5%BB%BA%E5%8D%95%E5%85%83%E7%95%8C%E9%9D%A2.jpg)

会看到下面有一个VID（详见下图），点击复制，后面会用到

![VAPTCHA 验证单元界面](https://github.com/frank-xjh/VAPTCHA/raw/master/VAPTCHA%E5%8D%95%E5%85%83%E7%95%8C%E9%9D%A2.jpg)

### 安装插件

在 [VAPTCHA 插件](https://github.com/frank-xjh/VAPTCHA)下载插件，解压后复制到 `/博客根目录/usr/plugins` 下，并重命名为 `VAPTCHA`。

然后在 Typecho 后台启用插件。

### 配置插件

按照说明配置插件即可。

此外请将如下代码拷贝到要显示验证的地方，即可完成部署

```html
<div class="vaptcha-container" style="width: 300px;height: 36px;">
    <div class="vaptcha-init-main">
        <div class="vaptcha-init-loading">
            <a href="/" target="_blank">
                <img src="https://cdn.vaptcha.com/vaptcha-loading.gif" />
            </a>
            <span class="vaptcha-text">Loading...</span>
        </div>
    </div>
</div>
```

## 打赏

微信：

![微信收款](https://cdn1.4leaf.top/pay1.png)
