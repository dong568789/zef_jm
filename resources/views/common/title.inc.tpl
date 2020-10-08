<{block "head-title"}><title><{if !empty($_SEO['title'])}><{$_SEO['title']}><{else}><{$_seo->title}><{/if}>-<{$_seo->title}></title><{/block}>
<{block "head-meta-seo"}>
<meta name="Keywords" content="<{if !empty($_SEO['keyword'])}><{$_SEO['keyword']}><{else}><{$_seo->keyword}><{/if}>,<{$_seo->title}>" />
<meta name="Description" content="<{if !empty($_SEO['description'])}><{$_SEO['description']}><{else}><{$_seo->description}><{/if}>" />
    <{/block}>
