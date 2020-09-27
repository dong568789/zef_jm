<div class="tab-content">
	<div class="tab-pane active" id="form-1">
		<div class="form-group">
			<label class="col-md-3 control-label" for="title">网站标题</label>
			<div class="col-md-9">
				<input type="text" id="title" name="title" class="form-control" placeholder="请输入网站标题" value="<{$_data.title}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="keywords">关键字</label>
			<div class="col-md-9">
				<input type="text" id="keywords" name="keywords" class="form-control" placeholder="请输入关键字" value="<{$_data.keywords}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="description">描述</label>
			<div class="col-md-9">
				<input type="text" id="description" name="description" class="form-control" placeholder="请输入描述" value="<{$_data.description}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="qq">QQ</label>
			<div class="col-md-9">
				<input type="text" id="qq" name="qq" class="form-control" placeholder="请输入QQ" value="<{$_data.qq}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="tel">电话</label>
			<div class="col-md-9">
				<input type="text" id="tel" name="tel" class="form-control" placeholder="请输入电话" value="<{$_data.tel}>">

			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="number">备案号</label>
			<div class="col-md-9">
				<input type="text" id="number" name="number" class="form-control" placeholder="请输入备案号" value="<{$_data.number}>">

			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="address">公司地址</label>
			<div class="col-md-9">
				<input type="text" id="address" name="address" class="form-control" placeholder="请输入公司地址" value="<{$_data.address}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="logo">logo</label>
			<div class="col-md-9">
				<input type="hidden" id="logo" name="logo" class="form-control" value="<{$_data.logo|default:0}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="wechat">微信二维码</label>
			<div class="col-md-9">
				<input type="hidden" id="wechat" name="wechat" class="form-control"  value="<{$_data.wechat|default:0}>">
			</div>
		</div>
	</div>
</div>
<div class="form-group form-actions">
	<div class="col-md-9 col-md-offset-3">
		<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> 提交</button>
		<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> 重设</button>
	</div>
</div>
