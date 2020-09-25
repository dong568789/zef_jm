<div class="tab-content">
	<div class="tab-pane active" id="form-1">
		<div class="form-group">
			<label class="col-md-3 control-label" for="title">标题</label>
			<div class="col-md-9">
				<input type="text" name="title" value="<{$_data.title}>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="cid">分类</label>
			<div class="col-md-9">
				<select type="text" id="cid" name="cid" class="form-control tree-model"
						data-model="admin/web/category" data-text="{{title}}" data-placeholder="请输入关键词..."
						value="<{$_data.cid}>"></select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="order">排序</label>
			<div class="col-md-9">
				<input type="text" name="order" value="<{if empty($_data.order)}>0<{else}><{$_data.order}><{/if}>" class="form-control" />

			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="jump">跳转地址</label>
			<div class="col-md-9">
				<input type="text" name="jump" value="<{$_data.jump}>" class="form-control" />
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
			<label class="col-md-3 control-label" for="cover_id">封面</label>
			<div class="col-md-9">
				<input type="hidden" id="cover_id" name="cover_id" class="form-control" value="<{$_data.cover_id|default:0}>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="seo_description">描述</label>
			<div class="col-md-9">
				<textarea name="seo_description" id="seo_description" class="form-control"  rows="10"><{$_data.seo_description}></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label" for="content">内容</label>
			<div class="col-md-9">
				<textarea name="content" id="content" ><{$_data.extra.content}></textarea>
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
