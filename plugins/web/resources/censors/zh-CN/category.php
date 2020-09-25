<?php

return [
    'store' => [
        'title' => [
            'name' => '分类名称',
            'rules' => 'required'
        ],
        'name' => [
            'name' => '别名',
            'rules' => 'required'
        ],
        'pid' => [
            'name' => '别名',
            'rules' => 'nullable'
        ],
        'order_index' => [
            'name' => '排序',
            'rules' => 'nullable|numeric'
        ],
        'cover_id' => [
            'name' => '封面',
            'rules' => 'nullable|numeric'
        ],
        'seo_title' => [
            'name' => 'SEO标题',
            'rules' => 'nullable'
        ],
        'seo_description' => [
            'name' => 'SEO描述',
            'rules' => 'nullable'
        ],
        'seo_keyword' => [
            'name' => 'SEO关键字',
            'rules' => 'nullable'
        ],
    ],
    'move' => [
        'original_id' => [
            'name' => '选定的ID',
            'rules' => 'required|numeric',
        ],
        'target_id' => [
            'name' => '待插入ID',
            'rules' => 'required|numeric',
        ],
        'move_type' => [
            'name' => '排序方式',
            'rules' => 'required|in:prev,next,inner',
        ],
    ],
];
