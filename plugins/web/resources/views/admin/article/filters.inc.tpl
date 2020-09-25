<!-- Form Content -->
<form action="<{'admin'|url nofilter}>/<{block "name"}><{/block}>/" method="GET" class="form-bordered form-horizontal">
	<div class="form-group col-sm-4">
		<label class="col-md-3 control-label" for="title">标题</label>
		<div class="col-md-9">
			<input type="text" id="title" name="f[title][lk]" class="form-control" placeholder="请输入关键词..."
				   value="<{$_filters.title.lk}>">
		</div>
	</div>
	<div class="form-group col-sm-4">
		<label class="col-md-3 control-label" for="cid">分类</label>
		<div class="col-md-9">
			<select type="text" id="cid" name="f[cid]" class="form-control tree-model"
					data-model="admin/web/category" data-text="{{title}}" data-placeholder="请输入关键词..."
					value="<{$_filters.cid.eq}>"></select>

		</div>
	</div>
	<div class="form-group col-sm-4">
		<label class="col-md-3 control-label" for="created_at-min">发布时间</label>
		<div class="col-md-9">
			<div class="input-group input-daterange">
				<input type="text" id="created_at-min" name="f[created_at][min]" class="form-control text-center" placeholder="开始时间" value="<{$_filters.created_at.min}>">
				<span class="input-group-addon">～</span>
				<input type="text" id="created_at-max" name="f[created_at][max]" class="form-control text-center" placeholder="结束时间" value="<{$_filters.created_at.max}>">
				<span class="input-group-btn" data-at-selector="created_at"></span>
			</div>
		</div>
	</div>

	<div class="form-group col-sm-4 pull-right text-right">
		<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> 检索</button> &nbsp; &nbsp;
	</div>
	<div class="clearfix"></div>
</form>

<!-- END Form Content -->
<script>
	(function($){
		$().ready(function(){
			$('#created_at-min').on('focus',function(){
				WdatePicker({
					skin: 'twoer',
					isShowClear:true,
					readOnly:true,
					dateFmt:'yyyy-MM-dd',
					isShowOthers:false,
					maxDate: '#F{$dp.$D(\'created_at-max\')}'
							});
				});
				$('#created_at-max').on('focus',function(){
					WdatePicker({
						skin: 'twoer',
						isShowClear:true,
						readOnly:true,
						dateFmt:'yyyy-MM-dd 23:59:59',
						isShowOthers:false,
						minDate: '#F{$dp.$D(\'created_at-min\')}'
								});
					});
				});
			})(jQuery);
</script>

