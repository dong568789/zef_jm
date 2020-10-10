<!DOCTYPE html>
<html lang="en"<{block "html-plus"}><{/block}>>
<head>
<{block "head"}>
	<{block "head-before"}><{/block}>
	<meta charset="UTF-8">
	<{block "head-title"}><{include file="web/common/title.inc.tpl"}><{/block}>
	<meta name="csrf-token" content="<{csrf_token()}>">
	<{block "head-meta-responsive"}>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<{/block}>
	<{block "head-meta-seo"}>
	<meta name="Keywords" content="<{$_seo.keywords}>" />
	<meta name="Description" content="<{$_seo.description}>" />
	<{/block}>
	<{block "head-icons"}>
	<{include file="web/common/icons.inc.tpl"}>
	<{/block}>
	<{block "head-styles"}>
		<{block "head-styles-before"}><{/block}>
		<{include file="web/common/styles.inc.tpl"}>
		<{block "head-styles-plus"}><{/block}>
		<{block "head-styles-after"}><link rel="stylesheet" href="<{'web/css/mobile.css'|static}>"><{/block}>
	<{/block}>
	<{block "head-scripts"}>
		<{block "head-scripts-before"}><{/block}>
		<{include file="web/common/scripts.inc.tpl"}>
		<{block "head-scripts-validate"}><{include file="web/common/validate.inc.tpl"}><{/block}>
		<{block "head-scripts-plus"}><{/block}>
		<{block "head-scripts-after"}><{/block}>
	<{/block}>
	<{block "head-plus"}><{/block}>
	<{block "head-after"}><{/block}>
<{/block}>
</head>
<body>
<{block "body-before"}><{/block}>
<{block "body-container"}>
<div class="container">
	
</div>
<{/block}>
<{block "body-scripts"}>
<{block "body-scripts-before"}><{/block}>
<script>
<{block "body-scripts-jquery"}>
	(function($){

	})(jQuery);
<{/block}>
</script>
<{block "body-scripts-plus"}><{/block}>
<{block "body-scripts-after"}><{/block}>
<{/block}>
<{block "body-plus"}><{/block}>
<{block "body-after"}><{/block}>
</body>
</html>