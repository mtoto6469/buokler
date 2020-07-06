<?php
//
$url=\yii::$app->urlManager;
////آدرس برگشت
//$address=$url->createAbsoluteUrl(['/bag/call']);
//
//// گرفتن آی دی قیمت نهایی
//
//$id_get= new Yii::$app->request;
//$id_get=$id_get->get('id');
//// استخراج قیمت نهایی
//$id=new \frontend\models\TblSodorFactor();
//$fac=$id->find()->where(['id'=>$id_get])->one();
////آدرس سایت پذیرنده
//$client = new SoapClient("http://pardano.com/p/webservice/?wsdl");
////کد دریافتی از سایت پذیرنده
//$api = "1M7LX" ;
//// قیمت نهایی
//$amount = 100 ; //Tooman
////تعریف آدرس برگشت
//$callbackUrl = $address;
//$orderId = $fac->id;
//
////توضیحات
//$txt = urlencode('jkjk');
///** @var TYPE_NAME $callbackUrl */
//$res = $client->requestpayment($api , $amount , $callbackUrl , $orderId , $txt);
//
//Yii::$app->getResponse()->Redirect("http://pardano.com/p/payment/{$res}");







$MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX'; //Required
$Amount = 1000; //Amount will be based on Toman - Required
$Description = 'توضیحات تراکنش تستی'; // Required
$Email = 'UserEmail@Mail.Com'; // Optional
$Mobile = '09123456789'; // Optional
$address=$url->createAbsoluteUrl(['/bag/call']);
$CallbackURL = 'http://localhost/bag/call'; // Required


$client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

$result = $client->PaymentRequest(
    [
        'MerchantID' => $MerchantID,
        'Amount' => $Amount,
        'Description' => $Description,
        'Email' => $Email,
        'Mobile' => $Mobile,
        'CallbackURL' => $CallbackURL,
    ]
);

//Redirect to URL You can do it also by creating a form
if ($result->Status == 100) {

    Header('https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
//برای استفاده از زرین گیت باید ادرس به صورت زیر تغییر کند:
//Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate');
} else {

    echo'ERR: '.$result->Status;
    exit;
}