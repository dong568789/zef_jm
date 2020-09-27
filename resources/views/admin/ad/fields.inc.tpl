<div class="tab-content">
	<div class="tab-pane active" id="form-1">
		<div class="form-group">
			<label class="col-md-3 control-label" for="title">广告名称</label>
			<div class="col-md-9">
				<input type="text" id="title" name="title" class="form-control" placeholder="请输入标题" value="<{$_data.title}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="cata_id">父级</label>
			<div class="col-md-9">
				<select class="form-control" name="pid" id="pid">
					<option value="0">顶级分类</option>
					<{foreach $_adList as $v}>
					<option value="<{$v.id}>" <{if $v.id == $_data.pid}>selected="selected"<{/if}>><{$v.title}></option>
					<{/foreach}>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="sort">链接</label>
			<div class="col-md-9">
				<input type="text" id="url" name="url" class="form-control" placeholder="链接" value="<{$_data.url}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="sort">排序</label>
			<div class="col-md-9">
				<input type="text" id="sort" name="sort" class="form-control" placeholder="排序" value="<{$_data.sort}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="status">状态</label>
			<div class="col-md-9">
				<label class="radio-inline">
					<input type="radio" name="status" value="1" <{if $_data.status == '1'}>checked="checked"<{/if}> > 开启
				</label>
				<label class="radio-inline">
					<input type="radio" name="status" value="0" <{if $_data.status == '0'}>checked="checked"<{/if}> > 关闭
				</label>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="avatar_aid">封面图</label>
			<div class="col-md-9">
				<input type="hidden" id="avatar_aid" name="avatar_aid" class="form-control" value="<{$_data.avatar_aid|default:0}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="value">标识</label>
			<div class="col-md-9">
				<input type="text" id="value" name="value" class="form-control" value="<{$_data.value}>">
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