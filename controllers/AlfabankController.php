<?php
namespace sibds\payment\alfabank\controllers;

use yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class AlfabankController extends Controller
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    function actionResult($order)
    {
        $pmOrderId = (int)$order;
        $orderModel = yii::$app->orderModel;
        $orderModel = $orderModel::findOne($pmOrderId);
        if (!$orderModel) {
            throw new NotFoundHttpException('The requested order does not exist.');
        }


        $orderModel->setPaymentStatus('yes');
        $orderModel->save(false);

        return 'YES';
    }
}