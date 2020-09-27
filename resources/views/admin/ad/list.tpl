<{extends file="admin/extends/list.block.tpl"}>

<{block "title"}>广告<{/block}>

<{block "name"}>ad<{/block}>

<{block "filter"}>
<{include file="admin/ad/filters.inc.tpl"}>
<{/block}>

<{block "table-th-plus"}>
<th>广告名称</th>
<th>父级</th>
<th>链接</th>
<th>排序</th>
<th>状态</th>
<th>标识</th>
<{/block}>

<!-- DataTable的Block -->
<{block "table-td-plus"}>
<td data-from="title">{{data}}</td>
<td data-from="parents" data-orderable="false">
    <span class="label label-info">{{if data}}{{data.title}}{{/if}}</span>
</td><td data-from="url">{{data}}</td>
<td data-from="sort">{{data}}</td>
<td data-from="status" data-orderable="false">
    {{if data == '1'}}
    <span class="label label-info">开启</span>
    {{else}}
    <span class="label label-info">关闭</span>

    {{/if}}
</td>
<td data-from="value">{{data}}</td>

<{/block}>

<{block "table-td-options-delete-confirm"}>您确定删除这项：{{full.username}}吗？<{/block}>
