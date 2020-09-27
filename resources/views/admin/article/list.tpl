<{extends file="admin/extends/list.block.tpl"}>

<{block "title"}>文章<{/block}>

<{block "name"}>article<{/block}>


<{block "filter"}>
<{include file="admin/article/filters.inc.tpl"}>
<{/block}>

<{block "table-th-plus"}>
<th>标题</th>
<th>栏目</th>
<th>推荐</th>
<th>点击量</th>
<th>排序</th>
<{/block}>

<!-- DataTable的Block -->
<{block "table-td-plus"}>
<td data-from="title">{{data}}</td>
<td data-from="site"><span class="label label-primary">{{data.title || '未知'}}</span></td>
<td data-from="str_recommend">{{data}}</td>
<td data-from="click">{{data}}</td>
<td data-from="sort">{{data}}</td>
<{/block}>

<{block "table-td-options-delete-confirm"}>您确定删除这项：{{full.username}}吗？<{/block}>
