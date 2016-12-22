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
    public $adminRoles = ['admin', 'superadmin'];
    public $thanksUrl = '/main/spasibo-za-zakaz';
    public $failUrl = '/main/problema-s-oplatoy';
    public $currency = 'RUB';
    public $secret = '';
    public $merchantId = '';
    public function init()
    {
        parent::init();
    }
}