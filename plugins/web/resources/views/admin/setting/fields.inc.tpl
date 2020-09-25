<div class="tab-content">
	<div class="tab-pane active" id="form-1">

		<div class="form-group">
			<label class="col-md-3 control-label" for="name">网站名称</label>
			<div class="col-md-9">
				<input type="text" name="name" value="<{$_data.name}>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="logo">logo</label>
			<div class="col-md-9">
				<input type="hidden" id="logo" name="logo" class="form-control" value="<{$_data.logo|default:0}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="qq">QQ</label>
			<div class="col-md-9">
				<input type="text" name="qq" value="<{$_data.qq}>" class="form-control" />

			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="wechat">微信号</label>
			<div class="col-md-9">
				<input type="text" name="wechat" value="<{$_data.wechat}>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="wechat_qr">微信二维码</label>
			<div class="col-md-9">
				<input type="hidden" id="wechat_qr" name="wechat_qr" class="form-control" value="<{$_data.wechat_qr|default:0}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="phone">手机号</label>
			<div class="col-md-9">
				<input type="text" name="phone" value="<{$_data.phone}>" class="form-control" />

			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="tel">座机</label>
			<div class="col-md-9">
				<input type="text" name="tel" value="<{$_data.tel}>" class="form-control" />

			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="address">地址</label>
			<div class="col-md-9">
				<input type="text" name="address" value="<{$_data.address}>" class="form-control" />

			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="icp">备案号</label>
			<div class="col-md-9">
				<input type="text" name="icp" value="<{$_data.icp}>" class="form-control" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label" for="title">seo标题</label>
			<div class="col-md-9">
				<input type="text" name="title" value="<{$_data.title}>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="keyword">seo关键字</label>
			<div class="col-md-9">
				<input type="text" name="keyword" value="<{$_data.keyword}>" class="form-control" />

			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="description">seo描述</label>
			<div class="col-md-9">
				<textarea type="text" name="description" class="form-control" rows="5"><{$_data.description}></textarea>
			</div>
		</div>
	</div>
</div>
<div class="form-group form-actions">
	<div class="col-md-9 col-md-offset-3">
		<div class="form-group">
			<button type="submit" class="btn btn-primary"><i class="fa fa-angle-right"></i> 提交</button>
		</div>
	</div>
</div>
