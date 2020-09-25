<{if $_permissionTable->checkUserPermission('web-manager.update', false)}>

	<li class="dropdown">
		<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">网站管理 <i
					class="fa fa-angle-down"></i></a>
		<ul class="dropdown-menu">

			<li><a href="<{'admin/web/article'|url}>" name="web/article/list"><i class="fa
			fa-binoculars
		pull-right"></i> 新闻管理</a></li>
			<li><a href="<{'admin/web/category/1'|url}>" name="web/category/list"><i class="fa fa-binoculars
		pull-right"></i> 分类管理</a></li>
			<li><a href="<{'admin/web/setting/1/edit'|url}>" name="web/setting/list"><i class="fa fa-binoculars
		pull-right"></i> 网站设置</a></li>
		</ul>
	</li>
<{/if}>
