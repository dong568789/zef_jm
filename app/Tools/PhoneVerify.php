<?php

namespace App\Tools;

use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;

class PhoneVerify {

	protected $phone;
	protected $session_name;
	protected $reGenerator = 1; // 多少秒内只能获取一次
	protected $expired = 120; // 验证码过期秒数
	protected $length = 6; // 验证码长度
	protected $maxTimes = 10; //获取新的验证码之前, 只能重试10次错误

	public function __construct($phone, $session_name = 'phone_code')
	{
		$this->phone = $phone;
		$this->session_name = $session_name;
	}

	public function verify($code)
	{
		$session = session($this->session_name, ['time' => 0, 'code' => '', 'phone' => '', 'times' => 0]);

		$session['times'] ++;
		session([$this->session_name => $session]);

		if ($session['times'] > $this->maxTimes)
			return false;

		$result = time() - $session['time'] <= $this->expired && strcmp($session['phone'], $this->phone) === 0 && strcmp
	($session['code'], $code) === 0; // 不相等 或者 超过$this->expired秒则已经失效
		if ($result) {
			$session['code'] = '';
			session([$this->session_name => $session]);
		}
		return $result;
	}

	public function generator()
	{
		if (time() - session($this->session_name.'.time', 0) < $this->reGenerator) // $this->reGenerator秒内不允许再次提交
			return false;

		$result = [
			'code' => rand(10 ** ($this->length - 1), 10 ** $this->length - 1),
			'phone' => $this->phone,
			'time' => time(),
			'times' => 0,
		];
		session([$this->session_name => $result]);
		return $result;
	}
}
