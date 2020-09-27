<!-- Form Content -->
<form action="<{'admin'|url nofilter}>/<{block "name"}><{/block}>/" method="GET" class="form-bordered form-horizontal">
	<div class="form-group col-sm-4">
		<label class="col-md-3 control-label" for="title">标题</label>
		<div class="col-md-9">
			<div class="input-group">
				<input type="text" id="title" name="f[title][lk]" class="form-control" placeholder="请输入关键词..." value="<{$_filters.title.lk}>">
			</div>
		</div>

	</div>
	<div class="form-group col-sm-4">
		<label class="col-md-3 control-label" for="site">栏目</label>
		<div class="col-md-9">
			<select type="text" id="site" name="f[site][eq]" class="form-control select-model" data-model="admin/catalog/data?f[pid][eq]=3" data-text="{{title}}" data-placeholder="请输入关键词..." value="<{$_filters.site.eq}>"></select>
		</div>
	</div>
	<div class="form-group col-sm-4 pull-right text-right">
		<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> 检索</button>
		<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> 重置</button>
	</div>
	<div class="clearfix"></div>
</form>
<!-- END Form Content -->
