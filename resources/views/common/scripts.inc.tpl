<{block "head-scripts-laravel"}>
	<script>var Laravel = { csrfToken: '<{csrf_token()}>', baseuri: '<{""|url nofilter}>' };</script>
<{/block}>
<{block "head-scripts-debug"}>
	<script src="<{'js/debug/eruda.debug.js'|static}>"></script>
<{/block}>
<{block "head-scripts-jquery"}>
	<script src="<{'js/jquery-1.11.3.min.js'|static}>"></script>
<{/block}>

<{block "head-scripts-bootstrap"}>

	<{/block}>

<{block "head-scripts-inner"}><{/block}>

<{block "head-scripts-common"}>
	<script src="<{'js/common-2.0.js'|static}>"></script>
<{/block}>
<{block name="head-scripts-lp"}>
	<script src="<{'js/laravel.lp.min.js'|static}>"></script>
<{/block}>