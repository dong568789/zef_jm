<{extends file="admin/extends/list.block.tpl"}>

<{block "title"}>文章列表<{/block}>

<{block "name"}>web/article<{/block}>

<{block "filter"}>
<{include file="[web]admin/article/filters.inc.tpl"}>
<{/block}>

<{block "table-th-plus"}>
<th>标题</th>
<th>分类</th>
<th>排序</th>
<th>访问量</th>
<th>状态</th>
<{/block}>

<!-- DataTable的Block -->
<{block "table-td-plus"}>
<td data-from="title">{{data}}</td>
<td data-from="category">{{if data}}{{data.title}}{{/if}}</td>
<td data-from="order">{{data}}</td>
<td data-from="click">{{data}}</td>
<td data-from="article_status">{{data.title}}</td>
<{/block}>

<{block "table-td-options-delete-confirm"}>您确定删除这项：{{full.id}}吗？<{/block}>
