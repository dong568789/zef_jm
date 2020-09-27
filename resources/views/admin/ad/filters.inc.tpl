<!-- Form Content -->
<form action="<{'admin'|url nofilter}>/<{block "name"}><{/block}>/" method="GET" class="form-bordered form-horizontal">
	<div class="form-group col-sm-4">
		<label class="col-md-3 control-label" for="realname">广告名称</label>
		<div class="col-md-9">
			<div class="input-group">
				<input type="text" id="title" name="f[title][lk]" class="form-control" placeholder="请输入关键词..." value="<{$_filters.title.lk}>">
			</div>
		</div>
	</div>
	<!--<div class="form-group col-sm-4">
		<label class="col-md-3 control-label" for="h_id">所属分类</label>
		<div class="col-md-9">
			<div class="input-group">
				<select class="form-control" name="f[cata_id][eq]" id="cata_id">
					<{foreach $_articleCata.children as $v}>
					<option value="<{$v.id}>"><{$v.title}></option>

					<{/foreach}>
				</select>
			</div>
		</div>
	</div>-->
	<div class="form-group col-sm-4 pull-right text-right">
		<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> 检索</button>
		<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> 重置</button>
	</div>
	<div class="clearfix"></div>
</form>
<!-- END Form Content -->