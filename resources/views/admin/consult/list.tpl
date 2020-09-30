<{extends file="admin/extends/list.block.tpl"}>

<{block "title"}>客户咨询<{/block}>

<{block "name"}>consult<{/block}>

<{block "filter"}>
<{include file="admin/consult/filters.inc.tpl"}>
<{/block}>

<{block "table-th-plus"}>
<th>姓名</th>
<th>电话</th>
<th>性别</th>
<th>邮箱</th>
<th>地址</th>
<{/block}>

<!-- DataTable的Block -->
<{block "table-td-plus"}>
<td data-from="realname">{{data}}</td>
<td data-from="mobile">{{data}}</td>
<td data-from="sex">{{data}}</td>
<td data-from="email">{{data}}</td>
<td data-from="area">{{data}}</td>
<{/block}>
<{block "table-th-options"}><{/block}>
<{block "table-td-options"}><{/block}>
<{block "table-tools-create"}><{/block}>

<{block "table-td-options-delete-confirm"}>您确定删除这项：{{full.nickname}}吗？<{/block}>
