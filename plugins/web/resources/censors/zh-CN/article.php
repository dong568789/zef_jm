<?php

return [
    'store' => [
        'title' => [
            'name' => '标题',
            'rules' => 'required'
        ],
        'cid' => [
            'name' => '分类',
            'rules' => 'required'
        ],
        'order' => [
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
        'jump' => [
            'name' => '外部中转地址',
            'rules' => 'nullable'
        ],
        'content' => [
            'name' => '正文',
            'rules' => 'required'
        ],
        'article_status' => [
            'name' => '状态',
            'rules' => 'required'
        ],
    ],
];
