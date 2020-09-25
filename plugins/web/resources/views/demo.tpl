<{extends file="extends/main.block.tpl"}>
<{include file="[web]common/title.inc.tpl"}>
<{block "head-styles"}>
    <{include file="[web]common/styles.inc.tpl"}>
    <{/block}>
<{block "head-styles-plus"}><link rel="stylesheet" href="<{'web/css/news.css'|static}>"><{/block}>
<{block "head-plus"}>
<style>
    .onlin_test{
        position: static;
        margin: 0 auto;
    }
</style>
<{/block}>
<{block "body-container"}>
    <{include file="[web]common/header.inc.tpl"}>
    <div class="news_banner">
        <img src="<{null|attachment}>/<{$_category->cover_id}>" alt="">
    </div>
    <div class="breadcrumb">
        <a href="<{url('/')}>">首页</a> > <a href="<{url('demo')}>.html">在线DEMO </a> >
    </div>
    <div class="news_content">
        <div class="news_content_box">
            <div class="content">
                <div class="onlin_test" id="online_demo">
                    <div class="title">
                        <h2>广告识别在线测试</h2>
                        <a href="javascript:void(0)" id="addRandom">添加随机文本</a>
                    </div>
                    <div class="hint">
                        <span>(请尽量输入与网友聊天类似的语名)</span>
                        <span class="key">(快捷键:shift+a)</span>
                    </div>

                    <div class="text">
                        <span class="icon"></span>
                        <textarea name="content" id="content" cols="30" rows="10"
                                  placeholder="在此输入或者复制您测试的内容，建议不少于10个字"></textarea>
                    </div>
                    <p class="text_help"><span>*</span>在线检测仅作为部分效果体验，加强版效果请联系游戏天眼商务。</p>
                    <p class="show_result">检测结果:<span id="show_result"></span></p>
                    <div class="btn_box">
                        <a href="javascript:void(0)" class="btn" id="audit_btn">立即识别</a>
                        <p>(快捷键：shift+Enter)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <{include file="[web]common/footer.inc.tpl"}>
    <{include file="[web]common/right_nav.inc.tpl"}>
    <{/block}>
