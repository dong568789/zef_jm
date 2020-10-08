<div class="tab-content">
	<div class="tab-pane active" id="form-1">
		<div class="form-group">
			<label class="col-md-3 control-label" for="title">标题</label>
			<div class="col-md-9">
				<input type="text" id="title" name="title" class="form-control" placeholder="请输入标题" value="<{$_data.title}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="price">栏目</label>
			<div class="col-md-9">
				<select type="text" id="site" name="site" class="form-control select-model" data-model="admin/catalog/data?f[pid][eq]=3" data-text="{{title}}" data-placeholder="请输入关键词..." value="<{$_data.site.id}>"></select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3 control-label" for="avatar_aid">封面图</label>
			<div class="col-md-9">
				<input type="hidden" id="avatar_aid" name="avatar_aid" class="form-control" value="<{$_data.avatar_aid|default:0}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">推荐</label>
			<div class="col-md-9">

				<label class="radio-inline">
					<input type="radio" name="recommend" value="1" <{if $_data.recommend == '1'}>checked="checked"<{/if}> > 是
				</label>
				<label class="radio-inline">
					<input type="radio" name="recommend" value="0" <{if $_data.recommend == '0'}>checked="checked"<{/if}> > 否
				</label>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="sort">排序</label>
			<div class="col-md-9">
				<input type="text" id="sort" name="sort" class="form-control" placeholder="请输入排序" value="<{$_data.sort}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="banned_status">状态</label>
			<div class="col-md-9">
				<{foreach catalog_search('status.article_status', 'children') as $v}>
				<label class="radio-inline">
					<input type="radio" name="article_status" value="<{$v.id}>" <{if (!empty($_data.article_status)&&$_data.article_status.id == $v.id)}>checked="checked"<{/if}> > <{$v.title}>
				</label>
				<{/foreach}>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="click">点击量</label>
			<div class="col-md-9">
				<input type="text" id="click" name="click" class="form-control" placeholder="请输入点击量" value="<{$_data.click}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="source">来源</label>
			<div class="col-md-9">
				<input type="text" id="source" name="source" class="form-control" placeholder="请输入来源" value="<{$_data.source}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="created_at">时间</label>
			<div class="col-md-9">
				<input type="text" id="created_at" name="created_at" class="form-control" placeholder="请选择..." value="<{$_data.created_at}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="description">描述</label>
			<div class="col-md-9">
				<textarea id="description" name="description" rows="9" class="form-control" placeholder="描述"><{$_data.description}></textarea>

			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="content">内容</label>
			<div class="col-md-9">
				<textarea id="content" name="content" placeholder="内容"><{$_data.extra.content}></textarea>
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
