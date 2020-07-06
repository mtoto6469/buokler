<?php

namespace frontend\controllers;

use backend\models\CodeOff;
use backend\models\Tbldeliverprice;
use backend\models\Tbldiscount;
use backend\models\TbldisPro;
use backend\models\Tblexist;
use common\components\jdf;
use frontend\models\Faceexist;
use frontend\models\Facesize;
use frontend\models\Tblallpost;
use frontend\models\TblbagReplace;
use frontend\models\TblcategoryProduct;
use frontend\models\Tblcolor;
use frontend\models\Tblproduct;
use frontend\models\Tblprofile;
use frontend\models\Tblreplace;
use frontend\models\Tblsize;
use frontend\models\TblSodorFactor;
use frontend\models\Tblsubbag;
use Yii;
use frontend\models\Tblbag;
use frontend\models\TblbagSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BagController implements the CRUD actions for Tblbag model.
 */
class BagController extends Controller
{

    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [


            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','details','pack_details'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['details'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['pack_details'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],



                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tblbag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblbagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblbag model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Tblbag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    /**
     * Deletes an existing Tblbag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->delete();
        return $this->redirect(['product']);
    }


    public function actionPro_color($id,$size_asli)
    {
        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $cat_pro2=TblcategoryProduct::find()->where(['enabel_view'=>1])->all();
        $type2=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->all();
        $color=Tblcolor::find()->where(['id_pro'=>$id])->all();
        $product=Tblproduct::find()->where(['id'=>$id])->one();
        $size2=Tblsize::find()->all();

        foreach ($size2 as $s){
            $check=Facesize::find()->where(['size'=>$s->size])->count();
            if($check==0){
                $size3= new Facesize();
                $size3->size=$s->size;
                $size3->id_size=$s->id;
                $size3->save();
            }

        }
        $size=Facesize::find()->all();
        return $this->render('pro_color', [
            'category' => $id,
            'cat_pro'=>$cat_pro,
            'type'=>$type,
            'cat_pro2'=>$cat_pro2,
            'type2'=>$type2,
            'brand'=>$brand,
            'color'=>$color,
            'product'=>$product,
            'size'=>$size,
            'size_asli'=>$size_asli,
        ]);
    }






    public function actionPack_color($id)
    {

        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $cat_pro2=TblcategoryProduct::find()->where(['enabel_view'=>1])->all();
        $type2=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->all();
        $color=Tblcolor::find()->where(['id_pro'=>$id])->all();
        $product=Tblproduct::find()->where(['id'=>$id])->one();
        $size2=Tblsize::find()->all();

        foreach ($size2 as $s){
            $check=Facesize::find()->where(['size'=>$s->size])->count();
            if($check==0){
                $size3= new Facesize();
                $size3->size=$s->size;
                $size3->id_size=$s->id;
                $size3->save();
            }

        }
        $size=Facesize::find()->all();
        return $this->render('pack_color', [
            'category' => $id,
            'cat_pro'=>$cat_pro,
            'type'=>$type,
            'cat_pro2'=>$cat_pro2,
            'type2'=>$type2,
            'brand'=>$brand,
            'color'=>$color,
            'product'=>$product,
            'size'=>$size,
        ]);
    }
    




    public function actionDatalis($id)
    {

        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $product=Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['id'=>$id])->one();
        $cat_pro2=TblcategoryProduct::find()->where(['enabel_view'=>1])->all();
        $model= new Tblbag();
        $fac = TblSodorFactor::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['resive' => 1])->andWhere(['confirm' => 1])->all();


        if($product->exist!=0){

//            ' زمان ارسال'.$date=$product->time_ir.
                $exist= '<span style="color: #00A000">'.'تعداد موجودی'.$product->exist.'</span>';


        }else{
            $exist= '<span style="color: darkred">'.'  موجود نیست'.'</span> ';
            $data=$product->time_ir;

        }
        if(Yii::$app->request->post()) {

            if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);

            } else {
                $model->id_user = Yii::$app->user->getId();
                $model->id_pro = $id;
                $data = new jdf();
                $model->date_ir = $data->date('y/m/d');
                $model->date = date('Y/m/d');
                $model->id_fac = 0;
                $model->down_buy = 0;
                $count_bag = $_POST['model_count'];
                $model->count = $count_bag;


                if ($product->takhfif != null) {
                    $price = ($product->takhfif * $count_bag);
                    
                } else {
                    $price = ($product->price * $count_bag);
                }


                $model->price = '' . $price;


                if ($model->save()) {
                    $_SESSION['message'] = 'به سبد خرید اضافه شود';
                } else {
                    echo $model->size;
                    var_dump($model->getErrors());
                    exit;
                }
            }
            return $this->redirect(['details2', 'id' => $id]);


        }

        return $this->render('details', [
            'model'=>$model,
            'cat_pro'=>$cat_pro,
            'cat_pro2'=>$cat_pro2,
            'type'=>$type,
            'brand'=>$brand,
            'product'=>$product,
            'fac'=>$fac,
            'exist'=>$exist,

        ]);
    }
    public function actionDetails2($id)
    {

        return $this->redirect(['datalis','id'=>$id]);
    }



    public function actionPack_details($id,$color)
    {
//        session_start();
        $cat_pro=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $brand=\frontend\models\Tblbrand::find()->where(['enabel_view'=>1])->all();
        $type=\frontend\models\TbltypeProduct::find()->where(['enabel_view'=>1])->andWhere(['id_parent'=>0])->all();
        $product=Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['id'=>$id])->one();
        $model= new Tblbag();
        $modelc= new TblbagReplace();
        $size=ArrayHelper::map(Tblsize::find()->where(['id_pro'=>$product->id])->andwhere(['enabel_view'=>1])->all(),'size','size');
        $fac = TblSodorFactor::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['resive' => 1])->andWhere(['confirm' => 1])->all();

        if(Yii::$app->request->post() ){
            if(isset($_POST['btn'])){
                if($_POST['btn']=='bag'){

                    $model->id_user=Yii::$app->user->getId();
                    $model->id_pro=$id;
                    if($model->size==null){
                        $model->size=0;
                    }
                    $data = new jdf();
                    $model->date_ir = $data->date('y/m/d');
                    $model->date=date('Y/m/d');
                    $model->id_fac=0;
                    $model->down_buy=0;
                    $model->color=$color;
                    $count_bag=$_POST['model_count'];
                    $model->count=$count_bag;
                    $count=Tblsize::find()->where(['id_pro'=>$product->id])->andwhere(['enabel_view'=>1])->count();
                    if($product->pak!=null){
                        $price=($product->price_namayande * $count)-$product->pak;

                    }else{
                        $price=$product->price_namayande * $count;
                    }

                    $model->price=($price* $count_bag);
                    ;
                    if($model->save()){

                        $_SESSION['message']='به سبد خرید اضافه شد';
                    }
                    return $this->redirect(['pack_details2','id'=>$id,'color'=>$color,]);


                }
            }

        }

        return $this->render('pack_details', [
            'model'=>$model,
            'cat_pro'=>$cat_pro,
            'type'=>$type,
            'brand'=>$brand,
            'product'=>$product,
            'size'=>$size,
            'fac'=>$fac ,
        ]);
    }
    public function actionPack_details2($id,$color)
    {

        return $this->redirect(['pack_details','id'=>$id,'color'=>$color,]);
    }



    public function actionProduct(){

       $deliver=ArrayHelper::map(Tbldeliverprice::find()->all(),'id','name');
        $factor= new TblSodorFactor();
        $bag=Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->all();
        $count=Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->count();
        $pro1=Tblproduct::find()->where(['enabel_view'=>1])->all();

$face=Faceexist::deleteAll();
        foreach ($pro1 as $p1){
            $face=new Faceexist();
            $face->id_pro=$p1->id;
            $face->exist=$p1->exist;
            $check=Faceexist::find()->where(['id_pro'=>$p1->id])->count();
            if($check==0){
                $face->save();
            }
        }


            if ($factor->load(Yii::$app->request->post())) {

                foreach ($bag as $b) {
                    $exist =Faceexist::find()->where(['id_pro'=>$b->id_pro])->one();

                    if ($exist->exist < $b->count) {

                        $b->delete();
                    }else{
                        $exist->exist=$exist->exist-$b->count;
                        $exist->save();
                    }
                }
                $count2 = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->count();

                if ($count != $count2) {

                    $code=CodeOff::findOne($_POST['code_off']);
                    if($code!=null){
                        $code->enabel_view=1;
                        $code->save();
                    }

                    $_SESSION['save'] = 'محصولاتی که موجود نبودند از سبد خرید شما حذف شدند';
                    return $this->redirect(['product'
                    ]);
                } else {

                $factor->id_user = Yii::$app->user->getId();
                $factor->data = date('Y/m/d');
                $date = new jdf();
                $factor->data_ir = $date->date('Y/m/d');
                $factor->code_off = $_POST['code_off'];
                $deliver_price = Tbldeliverprice::findOne($factor->id_type_post);
                $factor->price = $_POST['end_price'] + $deliver_price->price;

                if ($factor->save()) {



                    $this->redirect(['paymentp/index', 'id' => $factor->id]);
                } else {
                    $_SESSION['save'] = 'در ذخیره اطلاعات مشکلی پیش امده لطفا مدیرت را در جریان بزارید';
                    return $this->render('product', [
                        'bag' => $bag,
                        'factor' => $factor,
                        'deliver' => $deliver,

                    ]);
                }
            }
            } else {
                return $this->render('product', [
                    'bag' => $bag,
                    'factor' => $factor,
                    'deliver'=>$deliver,

                ]);
            }
        

    }


public function actionBag(){


    $this->redirect(['product']);
}



    public function actionFindprice()
    {
        $code=CodeOff::find()->where(['code'=>$_GET['code']])->andWhere(['enabel_view'=>1])->one();
       
        $f='';
      if($code==null){
          $f.='کد تخفیف وارد شده اعتبار ندارد';
          $f.='<br><span id="price">'.$_GET['price'] .' : قیمت نهایی  </span><br>
                <input name="end_price" value="'.$_GET['price'] .'" id="endprice" hidden>
                <input type="hidden" name="code_off" id="code_off" value="0">
                <span onclick="takhfif()" class="btn btn-warning">اعمال کد تخفیف</span>
                <input type="text" id="takhfif" placeholder="کد تخفیف خود را وارد کنید">';
      }else{
       
              $code->enabel_view=0;
              $code->save();
              $price=$_GET['price']-($_GET['price']*$code->price/100) ;
              $f.='کد تخفیف وارد شده معتبر می باشد';
              $f.='<br><span id="price">'.$price.' : قیمت نهایی  </span><br>
                <input name="end_price" value="'.$price .'" id="endprice"  type="hidden">
                <input type="hidden" name="code_off" id="code_off" value="'.$code->id.'">
                <span onclick="takhfif()" class="btn btn-warning">اعمال کد تخفیف</span>
                <input type="text" id="takhfif" placeholder="کد تخفیف خود را وارد کنید">';



      }
        return $f;
    }

    public function actionUpdate_addres(){
        
        $model=new TblSodorFactor();
        $allpost=Tblallpost::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->all();
        $bag=Tblbag::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->all();
        $countallpost=Tblallpost::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->count();

        foreach ($allpost as $all){

                if($all->category==null){
                    for ($i=1 ;$i<=$countallpost ; $i++){
                      $check=Tblallpost::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->andWhere(['category'=>$i])->count();
                      if($check==0){
                          $all->category=$i;
                          $all->update();
                          break;
                      }
                }
            }
        }

//        $price_fac=0;
//        foreach ($bag as $b1){
//            $price_fac+=$b1->price;
//        }



        if( Yii::$app->request->post()) {

        


            if($_POST['don']=='پرداخت آنلاین'){

                return $this->redirect(['pardakht',
                    
                ]);

            }elseif($_POST['don']=='پرداخت نقدی'){
                return $this->redirect(['pardakht/create']);

            }elseif($_POST['don']=='پرداخت اعتباری '){

                return $this->redirect(['pardakht/credit']);
            }

        }
        

        return $this->render('addres1',[
            'model'=>$model,
            'bag'=>$bag,
            'allpost'=>$allpost,

        ]);

    }


    public function actionDelete_sub($id)
    {
        $bag=Tblbag::find()->where(['id'=>$id])->one();

//
        $allpost=Tblallpost::find()->where(['id'=>$bag->id_all_post])->one();

        $newsub=Tblbag::find()->where(['id_all_post'=>$allpost->id])->andFilterWhere(['!=','id',$id])->all();
        if($newsub==null){
            $allpost->delete();
            $bag->id_all_post=null;
            $bag->update();
            return $this->redirect(['product']);
        }else{

            $bag->id_all_post=null;
            $bag->update();
            return $this->render('addres',[
                'allpost'=>$allpost,
                'sub'=>$newsub,

            ]);
        }

    }


    public function actionDelete_addres($id){

        $bag=Tblbag::find()->where(['id'=>$id])->one();

        $allpost=Tblallpost::find()->where(['id'=>$bag->id_all_post])->one();
        $price=$bag->price;
        $newsub=Tblbag::find()->where(['id_all_post'=>$allpost->id])->andFilterWhere(['!=','id',$id])->all();
        if($newsub==null){

            $allpost->delete();
            $bag->id_all_post=null;
            $bag->update();
            return $this->redirect(['product']);
        }else{
            if($allpost->name_post=='post') {
                $allpost->price_post= $allpost->price_post-2000;
                $allpost->price=$allpost->price-2000;

            }
            $allpost->price=$allpost->price-$price;
            $allpost->save();

            $bag->id_all_post=null;
            $bag->update();
            return $this->redirect(['product']);
        }

    }








    public function actionPardakht($id)
    {


        $bag = Tblbag::find()->where(['id_user' => Yii::$app->user->getId()])->andWhere(['down_buy' => 0])->all();


            return $this->render('pardakht',[
                'id'=>$id,
                'bag'=>$bag,
            ]);




    }



    public function actionCall()
    {
        exit;
        $request = \Yii::$app->request;
        $orderId = $request->get('order_id');

        $orderId = (int) $_GET['order_id'];

        $api = "1M7LX" ;
        $amount = 100 ; //Tooman
        $client = new SoapClient("http://pardano.com/p/webservice/?wsdl");
        $result = $client->verification($api,$amount,$request->get('au'));

        return $this->render('call',[
            'order_id'=>$orderId,
            'result'=>$result,

        ]);
    }
    
    
    
    public function actionFind()
    {
        $model = new \frontend\models\Tblexist();

        $query = $model->find()->where(['id_pro'=>$_GET['name']])->andWhere(['size'=>$_GET['size']])
            ->andWhere(['color'=>$_GET['color']])->andWhere(['enabel_view'=>1])->one();

        $count =$model->find()->where(['id_pro'=>$_GET['name']])->andWhere(['size'=>$_GET['size']])
            ->andWhere(['enabel_view'=>1])->andWhere(['color'=>$_GET['color']])->count();
            if($count>=1){
                if($query->exist>=1){

                    return '<p style="color:green"> موجود</p>'.$_GET["date"].' تاریخ تحویل ';

                }else{
                    return '<p style="color:red"> موجود نیست</p>';
                }

            }else{
                return '<p style="color:red"> موجود نیست</p>';

            }


    }




    public function actionFindpack()
    {
        $model = new \frontend\models\Tblexist();

        $query = $model->find()->where(['id_pro'=>$_GET['name']])->andWhere(['size'=>0])
            ->andWhere(['color'=>$_GET['color']])->andWhere(['enabel_view'=>1])->one();

        $count =$model->find()->where(['id_pro'=>$_GET['name']])->andWhere(['size'=>0])
            ->andWhere(['enabel_view'=>1])->andWhere(['color'=>$_GET['color']])->count();

        if($count>=1){
            if($query->exist>=1){

                return '<p style="color:green"> موجود</p>'.$_GET["date"].' تاریخ تحویل ';

            }else{
                return '<p style="color:red"> موجود نیست</p>';
            }

        }else{
            return '<p style="color:red"> موجود نیست</p>';

        }


    }




    /**
     * Finds the Tblbag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblbag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblbag::findOne($id)) !== null) {
            return $model;
        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
