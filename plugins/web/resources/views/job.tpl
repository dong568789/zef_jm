<{extends file="extends/main.block.tpl"}>
<{include file="[web]common/title.inc.tpl"}>
<{block "head-styles"}>
    <{include file="[web]common/styles.inc.tpl"}>
    <{/block}>
<{block "head-styles-plus"}><link rel="stylesheet" href="<{'web/css/news.css'|static}>"><{/block}>
<{block "body-container"}>
    <{include file="[web]common/header.inc.tpl"}>

    <div class="news_banner">
        <img src="<{null|attachment}>/<{$_category->cover_id}>" alt="">
    </div>
    <div class="breadcrumb">
        <a href="<{url('/')}>">首页</a> > <a href="<{url('job')}>.html">加入我们 </a> >
    </div>
    <div class="news_content">
        <div class="news_content_box">
            <div class="content">
                <{$_article->extra->content nofilter}>
            </div>
        </div>
    </div>
    <{include file="[web]common/footer.inc.tpl"}>
    <{include file="[web]common/right_nav.inc.tpl"}>
    <{/block}>
