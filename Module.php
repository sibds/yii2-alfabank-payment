<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 22.12.16
 * Time: 17:48
 */

namespace sibds\payment\alfabank;

use yii;

class Module extends \yii\base\Module
{
    //const GATEWAY_URL = 'https://3dsec.sberbank.ru/payment/rest/';
    const GATEWAY_URL = 'https://test.paymentgate.ru/testpayment/rest/';

    public $adminRoles = ['admin', 'superadmin'];
    public $thanksUrl = '/main/spasibo-za-zakaz';
    public $failUrl = '/main/problema-s-oplatoy';
    public $currency = 'RUB';
    public $username = '';
    public $password = '';

    public function init()
    {
        parent::init();
    }

    public function gateway($method, $data) {
        $curl = curl_init(); // Инициализируем запрос
        curl_setopt_array($curl, array(
            CURLOPT_URL => self::GATEWAY_URL.$method, // Полный адрес метода
            CURLOPT_RETURNTRANSFER => true, // Возвращать ответ
            CURLOPT_POST => true, // Метод POST
            CURLOPT_POSTFIELDS => http_build_query($data) // Данные в запросе
        ));
        $response = curl_exec($curl); // Выполненяем запрос

        $response = json_decode($response, true); // Декодируем из JSON в массив
        curl_close($curl); // Закрываем соединение
        return $response; // Возвращаем ответ
    }
}