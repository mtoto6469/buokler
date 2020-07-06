<?php



namespace frontend\controllers;



use backend\models\CodeOff;
use frontend\models\Exist;

use frontend\models\Factor;

use frontend\models\Tblbag;

use frontend\models\FaceExist;

use frontend\models\SellerPro;

use frontend\models\Tblproduct;
use frontend\models\TblSodorFactor;
use Yii;



class PaymentpController extends \yii\web\Controller

{

    // این اکشن برای پرداخت میفرسته اطلاعات را به زرین پال

    public function actionIndex($id)

    {

        $sesssion = yii::$app->session;

        if (!$sesssion->isActive) {

            $sesssion->open();

        }





        // اینجا میای فقط با ارسال

        // get

        // آی دی فاکتور را بهش میدی قیمت را در میاری میدی به

        // Amount //

        // و یه داده اون پایین هست

        //Authority

        //که این یه مقدار میده به تو که باید تو جدول فاکتورت ذخیره کنی



        $factor =TblSodorFactor::findOne($id);

        if ($factor == null) {

            $_SESSION['error-factor'] = 'در ذخیره اطلاعات مشکلی پیش امده است';

            return $this->redirect(['bag/product']);



        }


                $id_user = Yii::$app->user->getId();


                if($factor->id_user!=$id_user) {


                    $_SESSION['error-factor'] = 'در پرداخت مشکلی پیش آمده است';

                    return $this->redirect(['bag/product']);


                }









                if ($factor->id_ref == null) {





                    $MerchantID = '93208df8-5103-11e8-93fd-005056a205be'; //Required
                    $Amount = $factor->price; //Amount will be based on Toman - Required

                    $Description = 'بابت خرید انلاین از فروشگاه اینترنتی بوکلر'; // Required

                    $Email = 'UserEmail@Mail.Com'; // Optional

                    $Mobile = '09129330297'; // Optional

                    $CallbackURL = 'http://www.boukler.com/paymentp/order'; // Required





                    $client = new \SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);



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

                        $factor->atu = $result->Authority;

                        if ($factor->save()) {





                            //این داده ای مهمهی است Authority را باید تو جدول فاکتوری که میفرستی برای پرداخت باید ذخیره کنی تا در زمان برگشت بفهمی کدوم فاکتور را فرستادی

                            Header('Location: https://www.zarinpal.com/pg/StartPay/' . $result->Authority);

//برای استفاده از زرین گیت باید ادرس به صورت زیر تغییر کند:

//Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate');



                        } else {

                            $_SESSION['error-factor'] = 'در پرداخت مشکلی پیش آمده است';

                            return $this->redirect(['bag/product']);

                        }



                    } else {

                        echo 'ERR: ' . $result->Status;

                    }





                } else {

                    $_SESSION['error-factor'] = 'این فاکتور قبلا پرداخت شده است';

                    return $this->redirect(['bag/product']);

                }







    }





// اینم که برگشته از زرین پال است

    public function actionOrder()

    {

        $sesssion = yii::$app->session;

        if (!$sesssion->isActive) {

            $sesssion->open();

        }

        $MerchantID = '93208df8-5103-11e8-93fd-005056a205be'; //Required

        $Amount = 100; //Amount will be based on Toman

        $Authority = $_GET['Authority'];



        $factor =TblSodorFactor::find()->where(['atu' => $Authority])->one();

        if ($factor != null) {





            if ($_GET['Status'] == 'OK') {



                $client = new \SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);



                $result = $client->PaymentVerification(

                    [

                        'MerchantID' => $MerchantID,

                        'Authority' => $Authority,

                        'Amount' => $Amount,

                    ]

                );



                if ($result->Status == 100) {



                    $_SESSIO['result'] = 'Transaction success. RefID:' . $result->RefID;



                    $factor->id_ref = $result->RefID;


                    if($factor->save()){
                        $bag2= Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();

                        foreach ($bag2 as $b){

                            $pro=Tblproduct::findOne($b->id_pro);
                            $exist =Faceexist::find()->where(['id_pro'=>$pro->id])->one();

                            $pro->exist=$exist->exist;
                            $pro->save();
                            $b->id_fac=$factor->id;
                            $b->save();

                        }
                        return $this->redirect(['bag/product']);
                    }else{

                        $code=CodeOff::findOne($_POST['code_off']);
                        if($code!=null){
                            $code->enabel_view=1;
                            $code->save();
                        }

                        return $this->redirect(['bag/product']);
                    }





                } else {


                    $code=CodeOff::findOne($_POST['code_off']);
                    if($code!=null){
                        $code->enabel_view=1;
                        $code->save();
                    }

                    $_SESSION['result'] = 'Transaction failed. Status:' . $result->Status;


                    return $this->redirect(['bag/product']);



                }

            } else {
                $code=CodeOff::findOne($_POST['code_off']);
                if($code!=null){
                    $code->enabel_view=1;
                    $code->save();
                }


                $_SESSIO['result'] = 'Transaction canceled by user';

                return $this->redirect(['bag/product']);

            }

        } else {
            $code=CodeOff::findOne($_POST['code_off']);
            if($code!=null){
                $code->enabel_view=1;
                $code->save();
            }

            return $this->redirect(['bag/product']);

        }

    }

}