<{extends file="extends/main.block.tpl"}>
<{include file="common/title.inc.tpl"}>
<{block "head-styles"}>
    <{include file="common/styles.inc.tpl"}>
    <{/block}>
<{block "head-styles-plus"}><link rel="stylesheet" href="<{'web/css/news.css'|static}>"><{/block}>
<{block "body-container"}>
    <{include file="common/header.inc.tpl"}>
    <div class="news_banner">
        <img src="<{null|attachment}>/<{$_category->cover_id}>" alt="">
    </div>
    <div class="news">
        <div class="news_nav">
            <h2><{$_category->title}></h2>
            <p><{$_category->name|strtoupper}></p>
        </div>
        <div class="news_list">
            <{foreach $_list as $item}>
            <div class="item">
                <a href="<{url('news/show', [$item->id])}>.html" target="_blank" class="img_box fl">
                    <img src="<{null|attachment}>/<{$item->cover_id}>" alt="<{$item->title}>">
                </a>
                <div class="content_box fl">
                    <p class="title"><a href="<{url('news/show', [$item->id])}>.html" target="_blank"><{$item->title}></a></p>
                    <p class="detail"><{$item->seo_description}></p>
                    <p class="date"><{substr($item->created_at, 0, 10)}></p>
                    <a href="<{url('news/show', [$item->id])}>.html" target="_blank" class="btn">详情</a>
                </div>
                <div class="time_box fr">
                    <p class="day"><{substr($item->created_at, 8, 2)}></p>
                    <p class="date"><{substr($item->created_at, 0, 7)}></p>
                </div>
            </div>
            <{/foreach}>
        </div>
        <div class="page">
            <{$_list->links() nofilter}>
            <div class="clear"></div>
        </div>
    </div>
    <{include file="common/footer.inc.tpl"}>
    <{/block}>
