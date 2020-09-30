<?php

namespace App\Http\Controllers;

use App\Tools\Sms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Tools\PhoneVerify;

use App\Repositories\ConsultRepository;

class HomeController extends CoreController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		return $this->view('index');
	}

	public function query(Request $request)
	{
		$keys = ['realname', 'sex', 'area', 'email', 'mobile', 'code'];
		$data = $this->censor($request, 'form.store', $keys);

		$phoneVerify = new PhoneVerify($data['mobile']);
		$result = $phoneVerify->verify($data['code']);
       // $result = true;
		//if(!$result) return $this->error('验证码错误!');

        $cRepo = new ConsultRepository();

        $data = array_except($data, ['code']);
        $cRepo->store($data);
		logger()->info(print_r($data, 1));

		return $this->success('发送成功');

	}

	public function sendSms(Request $request)
	{
		$mobile = $request->input('mobile');

		$phoneVerify = new PhoneVerify($mobile);
		$code = $phoneVerify->generator();

		if ($code === false) // 太频繁的请求
			$this->error('太频繁的请求');

		$content = "验证码：".$code['code']."，有效时间2分钟。";
		
		$sms = new Sms();
		$result = $sms->sendSms($mobile, $content);
		if($result['Code'] != 'ok'){
			$this->error('发送失败');
		}

		return $this->success('发送成功');
	}
}
