<?php
/**
 * 主题设置
 */
function themeFields($layout) {
    $picUrl = new Typecho_Widget_Helper_Form_Element_Text('picUrl', NULL, NULL, _t('图片地址'), _t('在这里填入一个图片 URL 地址, 作为文章的头图'));
    $layout->addItem($picUrl);

    $description = new Typecho_Widget_Helper_Form_Element_Text('description', NULL, NULL, _t('描述'), _t('此文章的描述，用于 SEO 优化'));
    $layout->addItem($description);
}
function themeConfig($form) {
    $Render = new Render ($form);
    $Render->panel("main", NULL, NULL,
        $Render->panel("item", "Blur", NULL, '<p style="font-size:14px;">
        <a href="https://inmind.ltd" target="_blank"><img src="https://i.v2ex.co/z4hDRTQ8.jpeg" alt="shenlan" size="20" height="80" width="80" style="border-radius: 90px"></a>
        <a href="https://github.com/shenlanAZ/blur" target="_blank" style="padding-left: 3em"><svg class="octicon octicon-mark-github v-align-middle" height="80" viewBox="0 0 16 16" version="1.1" width="80" aria-hidden="true"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path></svg></a>
        ', true, false). 
        $Render->panel("item", "Settings", "设置",
            $Render->panel("item", "功能开关", NULL, 
                 $Render->checkbox("switch", "功能开关", NULL, 
                 ['ShowPixiv' => '显示 mokeyjay 的 pixiv 卡片',
                 'ShowLoadingLine' => '顶部 loading 加载进度条效果',
                 'atargetblank' => '链接以新标签页形式打开',
                 'Pangu' => '引用 Pangu.js 实现中英文间自动添加空格',
                 'PanguPHP' => '引用 Pangu.PHP 后端实现中英文间自动添加空格',
                 'HighLight' => '引用 highlight.js 实现代码高亮',
                 'Lazyload' => '图片延迟加载（文章内）',
                 'LazyloadIndex' => '图片延迟加载（首页）',
                 'LocalStorage' => 'LocalStorage 强缓存策略（对于部分插件不兼容）'], ['ShowLoadingLine', 'PanguPHP', 'HighLight'])
            ).
            $Render->panel("item", "文章评论", NULL,
                $Render->panel("item", "文章评论类型", NULL,
                    $Render->radio("commentis", "文章评论类型", 'Disqus 评论使用 <a href="https://github.com/SukkaW/DisqusJS">SukkaW/DisqusJS</a> 实现基础模式渲染', [0 => "原生评论", 1 => 'Disqus (disqus.com)'], 0)
                ).
                $Render->panel("item", "评论框行数", NULL,
                    $Render->input("CommentRows", "评论框行数", "默认为 1", 1)
                ).
                $Render->panel("item", "Disqus 设置", NULL,
                    $Render->input("DisqusShortname", "Shortname", "必填，你的 Disqus Forum 的 shortname，你可以在 <a href=\"https://disqus.com/admin/settings/general/\" rel=\"nofollow\">Disqus Admin - Settings - General - Shortname</a> 获取你的 shortnam", null).
                    $Render->input("DisqusSiteName", "siteName", "非必须，你站点的名称，将会显示在「评论基础模式」的 header 中；该配置应该和 <a href=\"https://disqus.com/admin/settings/general/\" rel=\"nofollow\">Disqus Admin - Settings - General - Website Name</a> 一致", null).
                    $Render->input("DisqusApi", "api", "必填，DisqusJS 请求的 API Endpoint，通常情况下你应该配置一个 Disqus API 的反代并填入反代的地址。你也可以直接使用 DISQUS 官方 API 的 Endpoint <code>https://disqus.com/api/</code>，或 Sukka 搭建的 Disqus API 反代 Endpoint <code>https://disqus.skk.moe/disqus/</code>", 'https://disqus.skk.moe/disqus/').
                    $Render->input("DisqusApiKey", "apiKey", "必填，DisqusJS 向 API 发起请求时使用的 API Key，你应该在配置 Disqus Application 时获取了 API Key，参见 <a href='https://github.com/SukkaW/DisqusJS#%E9%85%8D%E7%BD%AE-disqus-application'>https://github.com/SukkaW/DisqusJS#配置-disqus-application</a>", null).
                    $Render->input("DisqusAdmin", "admin", "非必须，你的站点的 Disqus Moderator 的用户名（也就是你的用户名）。你可以在 <a href=\"https://disqus.com/home/settings/account/\" rel=\"nofollow\">Disqus - Settings - Account - Username</a> 获取你的 Username", null).
                    $Render->input("DisqusAdminLabel", "adminLabel", "非必须，你想显示在 Disqus Moderator Badge 中的文字。该配置应和 <a href=\"https://disqus.com/admin/settings/community/\" rel=\"nofollow\">Disqus Admin - Settings - Community - Moderator Badge Text</a> 相同", null)
                ).
                $Render->panel("item", "拓展设置", NULL,
                    $Render->input("SwitchToDisqusSince", "从某篇文章开始切换为 Disqus", "填写文章 cid，为 0 或留空则仅由文章评论类型决定", 0)
                )
            ).
            $Render->panel("item", "搜索设置", NULL,
                $Render->radio("searchis", "搜索设置", NULL, [0 => "Typecho 原生搜索", 1 => "本地搜索（即时搜索）"], 1)
            ).
            $Render->panel("item", "CDN 类型", NULL,
                $Render->radio("CDNType", "CDN 类型", NULL, [0 => '不启用 CDN', 1 => 'jsDelivr (cdn.jsdelivr.net)', 3 => 'ElemeCDN (shadow.elemecdn.com)', 2 => '自定义'], 0) .
                $Render->input("CDNURL", "CDN 地址", "仅在使用自定义 CDN 时需要填写<br>创建一个文件夹，把 <b>css, fonts, img, js</b> 文件夹放进去，上传到到你的 CDN 储存空间根目录下<br />
                填入你的 CDN 地址, 如 <b>https://cdn.example.com/MaterialCDN</b> 或 <b>https://root.example.com</b>")
            ).
            $Render->panel("item", "语言", NULL, 
                 $Render->radio("language", "语言", NULL, 
                 ["en" => "English", 
                 "ja" => "日本語", 
                 "zh-CN" => "简体中文", 
                 "zh-TW" => "繁體中文"], "zh-CN")
            ).
            $Render->panel("item", "文章版权", NULL,
                $Render->panel("item", "文章版权", NULL,
                    $Render->radio("post_license_cc", "CC", NULL, 
                        ["cc4" => "BY-NC-SA 4.0",
                        "cc3" => "BY-NC-SA 3.0",
                        "custom" => "自定义"], "cc4")
                ).
                $Render->panel("item", "自定义", NULL,
                    $Render->input("post_license", "文章版权", "你可以在每篇文章的结尾添加你的版权说明，支持 HTML 标签。License 以粗体显示，默认为空。 比如，你可这样设定 CC License。<br><b>&#84;&#104;&#105;&#115;&#32;&#98;&#108;&#111;&#103;&#32;&#105;&#115;&#32;&#117;&#110;&#100;&#101;&#114;&#32;&#97;&#32;&#60;&#97;&#32;&#104;&#114;&#101;&#102;&#61;&#34;&#47;&#99;&#114;&#101;&#97;&#116;&#105;&#118;&#101;&#99;&#111;&#109;&#109;&#111;&#110;&#115;&#46;&#104;&#116;&#109;&#108;&#34;&#32;&#116;&#97;&#114;&#103;&#101;&#116;&#61;&#34;&#95;&#98;&#108;&#97;&#110;&#107;&#34;&#62;&#67;&#67;&#32;&#66;&#89;&#45;&#78;&#67;&#45;&#83;&#65;&#32;&#51;&#46;&#48;&#32;&#85;&#110;&#112;&#111;&#114;&#116;&#101;&#100;&#32;&#76;&#105;&#99;&#101;&#110;&#115;&#101;&#60;&#47;&#97;&#62;</b>", NULL)
                )
                
            ).
            $Render->panel("item", "Footer 文字", NULL,
                $Render->input("footer_text", "Footer 文字", "你可以在页面的 Footer 指定你想显示的文字，支持 HTML 标签；默认为空。 比如，备案号可以这样设定。<br><b>&#60;&#97;&#32;&#104;&#114;&#101;&#102;&#61;&#34;&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#109;&#105;&#105;&#116;&#98;&#101;&#105;&#97;&#110;&#46;&#103;&#111;&#118;&#46;&#99;&#110;&#34;&#32;&#114;&#101;&#108;&#61;&#34;&#110;&#111;&#102;&#111;&#108;&#108;&#111;&#119;&#34;&#62;&#26576;&#73;&#67;&#80;&#22791;&#120;&#120;&#120;&#120;&#120;&#120;&#120;&#120;&#21495;&#45;&#120;&#60;&#47;&#97;&#62;</b>", NULL)
            ).
            $Render->panel("item", "Roboto 字体使用来源", NULL,
                $Render->radio("RobotoSource", "Roboto 字体使用来源", NULL, 
                [0 => "调用 Google fonts (使用 https://lug.ustc.edu.cn 镜像)",
                1 => "调用 Google fonts (使用 https://fonts.loli.net 镜像)",
                2 => "调用 Google fonts",
                3 => "不调用"]
                , 3)
            ).
            $Render->panel("item", "网站统计代码", NULL,
                $Render->textarea("analysis", "网站统计代码", "填入如 Google Analysis 的第三方统计代码", NULL)
            ).
            $Render->panel("item", "DNS 预加载", NULL,
                $Render->textarea("DNSPrefetch", "DNS 预加载", "一行一个，如 <b>//dns.example.com</b>", NULL)
            )
        ).
        $Render->panel("item", "Color", "色调",
            $Render->panel("item", "Loading 加载进度条颜色", NULL,
                $Render->input("loadingcolor", "Loading 加载进度条颜色", "打开 loading 加载进度条后, 在这里设置进度条的颜色", "#29d")
            ).
            $Render->panel("item", "Loading 加载缓冲时间", NULL,
                $Render->input("loadingbuffer", "Loading 加载缓冲时间", "loading 加载进度条的缓冲时间, 单位为毫秒 ms, 默认为 800ms", 800)
            ).
            $Render->panel("item", "文章内容字体大小", NULL,
                $Render->input("FontSize", "文章内容字体大小", '对应 font-size，单位为 px，各元素将以此为基准计算大小，默认为 15', '15')
            ).
            $Render->panel("item", "搜索框文字颜色", NULL,
                $Render->input("SearchColor", "搜索框文字颜色", "填入颜色代码，用于适配浅色背景", NULL)
            ).
            $Render->panel("item", "背景设置", NULL,
                $Render->panel("item", "背景类型", NULL,
                    $Render->radio("BGtype", "背景类型", NULL, 
                    [0 => '纯色背景',
                    1 => '图片背景',
                    2 => '渐变背景'], 1)
                ).
                $Render->panel("item", "背景颜色 / 图片", NULL,
                    $Render->input("bgcolor", "背景颜色 / 图片", "背景设置如果选择纯色背景, 这里就填写颜色代码; <br />背景设置如果选择图片背景, 这里就填写图片地址;<br />不填写则默认显示 #F5F5F5 或主题文件夹下的 /img/bg.jpg", NULL)
                ).
                $Render->panel("item", "背景渐变", NULL,
                    $Render->radio("GradientType", "背景渐变", NULL, 
                    ['0' => _t('Aerinite'),
                     '1' => _t('Ethereal'),
                     '2' => _t('Patrichor'),
                     '3' => _t('Komorebi'),
                     '4' => _t('Crepuscular'),
                     '5' => _t('Autumn'),
                     '6' => _t('Shore'),
                     '7' => _t('Horizon'),
                     '8' => _t('Green Beach'),
                     '9' => _t('Virgin')], 0)
                )
            ).
            $Render->panel("item", "缩略图显示效果", NULL,
                $Render->panel("item", "缩略图显示效果", NULL,
                    $Render->radio("ThumbnailOption", "缩略图显示效果", NULL, 
                    [1 => "显示文章内第一张图片或指定的图片 (若无图片则显示随机图)",
                    2 => "只显示随机图片"], 1)
                ).
                $Render->panel("item", "缩略图为纯色时的颜色", NULL,
                    $Render->input("TitleColor", "缩略图为纯色时的颜色", "缩略图为纯色时的颜色", "#FFF")
                ).
                $Render->panel("item", "随机缩略图数量", NULL,
                    $Render->input("RandomPicAmnt", "随机缩略图数量", "img/random 图片的数量，以 material- 开头", 19)
                )
            ).
            $Render->panel("item", "主题颜色", NULL,
                $Render->input("ThemeColor", "主题颜色", NULL, '#6A89CC')
            ).
            $Render->panel("item", "超链接颜色", NULL,
                $Render->input("alinkcolor", "超链接颜色", NULL, '#4A69BD')
            ).
            $Render->panel("item", "Android Chrome 地址栏颜色", NULL,
                $Render->input("ChromeThemeColor", "Android Chrome 地址栏颜色", NULL, '#6A89CC')
            ).
            $Render->panel("item", "按钮颜色", NULL,
                $Render->input("ButtonThemeColor", "按钮颜色", NULL, '#6A89CC')
            ).
            $Render->panel("item", "卡片阴影", NULL,
                $Render->input("CardElevation", "卡片阴影", "默认为 8", 8)
            ).
            $Render->panel("item", "个人头像地址", NULL,
                $Render->input("avatarURL", "个人头像地址", "填入头像的地址, 如不填写则使用默认头像")
            ).
            $Render->panel("item", "favicon 地址", NULL,
                $Render->input("favicon", "favicon 地址", "填入博客 favicon 的地址, 默认则不显示")
            ).
            $Render->panel("item", "侧边栏顶部图片", NULL,
                $Render->input("sidebarheader", "侧边栏顶部图片", "填入图片地址, 如不填写则使用默认图片")
            ).
            $Render->panel("item", "首页顶部左边的图片地址", NULL,
                $Render->input("dailypic", "首页顶部左边的图片地址", "填入图片地址, 图片显示在首页顶部左边位置")
            ).
            $Render->panel("item", "首页顶部右边 LOGO 图片地址", NULL,
                $Render->input("logo", "首页顶部右边 LOGO 图片地址", "填入 LOGO 地址, 图片将显示于首页右上角板块")
            ).
            $Render->panel("item", "首页顶部右边 LOGO 图片大小", NULL,
                $Render->radio("logosize", "首页顶部右边 LOGO 图片大小", NULL, 
                [0 => "标准",
                1 => "更大"], 0)
            ).
            $Render->panel("item", "首页顶部左边图片的点击跳转地址", NULL,
                $Render->input("dailypicLink", "首页顶部左边图片的点击跳转地址", "点击图片后, 想要跳转网页的地址", '#')
            ).
            $Render->panel("item", "首页顶部右边 LOGO 的点击跳转地址", NULL,
                $Render->input("logoLink", "首页顶部右边 LOGO 的点击跳转地址", "点击 LOGO 后, 想要跳转网页的地址", '#')
            ).
            $Render->panel("item", "首页顶部左边的标语", NULL,
                $Render->input("slogan", "首页顶部左边的标语", "填入自定义文字, 显示于首页顶部左边的图片上", 'Hi, nice to meet you')
            ).
            $Render->panel("item", "自定义字体", NULL,
                $Render->input("CustomFonts", "自定义字体", "主题的 font-family，通常不建议修改", "Roboto, 'Helvetica Neue', Helvetica, 'PingFang SC', 'Hiragino Sans GB', 'Microsoft YaHei', '微软雅黑', Arial, sans-serif")
            )
        ).
        $Render->panel("item", "Tools", '那点零零碎碎的小工具', '
            <div class="mdui-list">
            <a href="'.Typecho_Widget::widget('Widget_Options')->siteUrl.'?mod=expert&type=comments" class="mdui-list-item mdui-ripple">导出评论（以 WXR 格式）</a>
            </div>
        ')
    );
}