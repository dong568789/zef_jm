<?php

namespace App\Http\Controllers;

use App\Repositories\ConsultRepository;
use App\Tools\Sms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tools\PhoneVerify;

class HomeController extends Controller
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
		$keys = ['exp', 'product', 'time', 'nickname', 'mobile', 'code'];
		$data = $this->censor($request, 'form.store', $keys);

		$phoneVerify = new PhoneVerify($data['mobile']);
		$result = $phoneVerify->verify($data['code']);
       // $result = true;
		if(!$result) return $this->error('验证码错误!');

        $cRepo = new ConsultRepository();

        $infoKey = ['exp', 'product', 'time'];
        $infoData = array_only($data, $infoKey);

        array_push($infoKey, 'code');

        $data = array_except($data, $infoKey);
        $data['info'] = json_encode($infoData);
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
