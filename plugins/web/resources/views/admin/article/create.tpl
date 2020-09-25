<{extends file="admin/extends/create.block.tpl"}>

<{block "head-plus"}>
    <{include file="common/uploader.inc.tpl"}>
    <{include file="common/editor.inc.tpl"}>

    <{/block}>

<{block "inline-script-plus"}>
    $('#cover_id').uploader();
    $.ueditor_default_setting.simple.toolbars[2].push('insertvideo');
    var $editor_content = UE.getEditor('content',$.ueditor_default_setting.simple);

    <{/block}>
<{block "title"}>添加文章<{/block}>

<{block "name"}>web/article<{/block}>

<{block "block-title-title"}>
<{include file="[web]admin/article/fields-nav.inc.tpl"}>
<{/block}>

<{block "fields"}>
<{include file="[web]admin/article/fields.inc.tpl"}>
<{/block}>
