<{extends file="web/extends/main.block.tpl"}>
<{include file="web/common/title.inc.tpl"}>
<{block "head-styles-plus"}>
<link rel="stylesheet" href="<{'web/css/news.css'|static}>">
    <{/block}>
<{block "body-container"}>
    <{include file="web/common/header.inc.tpl"}>

    <div class="news_banner">
        <img src="<{null|attachment}>/<{$_category->cover_id}>" alt="">
    </div>
    <div class="breadcrumb">
        <a href="<{url('/')}>">首页</a> > <a href="<{url('news/center')}>.html">新闻中心 </a>
    </div>
    <div class="news_content">
        <div class="news_content_box">
            <h2 class="title"><{$_article->title}></h2>
            <p class="date">发布时间：<{substr($_article->created_at,0,10)}></p>
            <div class="detail">
                <{$_article->description}>
            </div>
            <div class="content">
                <{$_article->extra->content nofilter}>
            </div>
        </div>
    </div>
    <{include file="web/common/footer.inc.tpl"}>
<{/block}>
