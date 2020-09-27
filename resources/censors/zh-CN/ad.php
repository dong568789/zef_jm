<?php
return [
    'store' => [
        'title' => [
            'realname' => '标题',
            'rules' => 'required',
        ],
        'pid' => [
            'name' => '父类',
            'rules' => 'numeric'
        ],
        'avatar_aid' => [
            'name' => '图片',
            'rules' => 'nullable|numeric',
        ],
        'url' => [
            'name' => '链接',
            'rules' => '',
        ],
        'sort' => [
            'name' => '排序',
            'rules' => 'nullable|numeric',
        ],
        'status' => [
            'name' => '是否打开',
            'rules' => 'numeric',
        ],
        'value' => [
            'name' => '标识',
            'rules' => '',
        ],
    ],

];