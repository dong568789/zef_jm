<?php
namespace App\Tools;

use GuzzleHttp\Client;

class Sms{

    private $apikey;

    public function __construct()
    {
        $this->apikey = 'ad1c843fd4dda8dd11a325c5704792bb';
    }

    /**
     * 发送短信
     * @param $phone 手机号
     * @param $content 短信内容
     * @param $data 附加信息(用于反馈记录)
     * @return array
     */
    function sendSms($phone, $content)
    {
        $url = 'https://sms.yunpian.com/v2/sms/single_send.json';
        $param = array(
            'apikey' => $this->apikey,
            'mobile' => $phone,
            'text' => "【佐尔发】" . $content,
        );

        $client = new Client();
        $response = $client->request('POST', $url, ['form_params' => $param]);

        $body = (string)$response->getBody();
        $result = json_decode($body, true);

        logger()->info("短信发送:" . print_r($result, 1));
        if(isset($result['code']) && $result['code'] == 0)
        {
            return ['Code' => 'ok'];
        }else{
            return ['Code' => 'fail'];
        }
    }
}
