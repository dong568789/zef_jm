<?php

return [
	'store' => [
		'sex' => [
			'name' => '性别',
			'rules' => 'nullable',
		],
		'email' => [
			'name' => '邮箱',
			'rules' => 'email|nullable',
		],
		'area' => [
			'name' => '地区',
			'rules' => 'required',
		],
		'realname' => [
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