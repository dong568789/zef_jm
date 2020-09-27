<{extends file="admin/extends/edit.block.tpl"}>

<{block "head-plus"}>
    <{include file="common/uploader.inc.tpl"}>
<{/block}>

<{block "inline-script-plus"}>
    $('#logo').uploader();
    $('#wechat').uploader();
<{/block}>

<{block "title"}>网站设置<{/block}>

<{block "name"}>site<{/block}>

<{block "block-title-title"}>
<{include file="admin/site/fields-nav.inc.tpl"}>
<{/block}>

<{block "fields"}>
<{include file="admin/site/fields.inc.tpl"}>
<{/block}>
