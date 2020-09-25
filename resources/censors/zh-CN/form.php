<?php

return [
	'store' => [
		'exp' => [
			'name' => '是否有电商运营经验',
			'rules' => 'required',
		],
		'product' => [
			'name' => '是否有货源',
			'rules' => 'required',
		],
		'time' => [
			'name' => '每天空闲时间',
			'rules' => 'required',
		],
		'nickname' => [
			'name' => '姓名',
			'rules' => 'required',
		],
		'mobile' => [
			'name' => '电话',
			'rules' => 'required|phone',
		],
		'code' => [
			'name' => '验证码',
			'rules' => 'required',
		],
	],
];