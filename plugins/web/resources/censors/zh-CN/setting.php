<?php

return [
    'store' => [
        'name' => [
            'name' => '网站名称',
            'rules' => 'required'
        ],
        'title' => [
            'name' => '标题',
            'rules' => 'required'
        ],
        'keyword' => [
            'name' => '关键字',
            'rules' => 'nullable'
        ],
        'description' => [
            'name' => '描述',
            'rules' => 'nullable'
        ],
        'icp' => [
            'name' => '备案号',
            'rules' => 'nullable'
        ],
        'qq' => [
            'name' => 'QQ',
            'rules' => 'nullable'
        ],
        'wechat' => [
            'name' => '微信号',
            'rules' => 'nullable'
        ],
        'wechat_qr' => [
            'name' => '二维码',
            'rules' => 'nullable|numeric'
        ],
        'phone' => [
            'name' => '手机号',
            'rules' => 'nullable'
        ],
        'tel' => [
            'name' => '座机',
            'rules' => 'nullable'
        ],
        'address' => [
            'name' => '地址',
            'rules' => 'nullable'
        ],
        'logo' => [
            'name' => 'logo',
            'rules' => 'nullable|numeric'
        ],
    ],
];


