<{extends file="admin/extends/edit.block.tpl"}>

<{block "head-plus"}>
<{include file="common/uploader.inc.tpl"}>
<{/block}>

<{block "inline-script-plus"}>
$('#avatar_aid').uploader();
<{/block}>

<{block "title"}>广告<{/block}>
<{block "subtitle"}><{$_data.name}><{/block}>

<{block "name"}>ad<{/block}>

<{block "block-title-title"}>
<{include file="admin/ad/fields-nav.inc.tpl"}>
<{/block}>

<{block "fields"}>
<{include file="admin/ad/fields.inc.tpl"}>
<{/block}>
