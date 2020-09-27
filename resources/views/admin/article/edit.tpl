<{extends file="admin/extends/edit.block.tpl"}>

<{block "head-plus"}>
    <{include file="common/uploader.inc.tpl"}>
    <{include file="common/editor.inc.tpl"}>

    <{/block}>

<{block "inline-script-plus"}>
    $('#avatar_aid').uploader();
    var $editor_content = UE.getEditor('content',$.ueditor_default_setting.simple);

    <{/block}>

<{block "title"}>文章<{/block}>

<{block "name"}>article<{/block}>

<{block "block-title-title"}>
<{include file="admin/article/fields-nav.inc.tpl"}>
<{/block}>

<{block "fields"}>
<{include file="admin/article/fields.inc.tpl"}>
<{/block}>
