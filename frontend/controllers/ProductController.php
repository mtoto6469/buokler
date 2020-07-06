<?php

namespace frontend\controllers;

use frontend\models\Facesize;
use frontend\models\Tblbrand;
use frontend\models\TblcategoryProduct;
use frontend\models\Tblsize;
use frontend\models\TbltypeProduct;
use Yii;
use frontend\models\Tblproduct;
use frontend\models\TblproductSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Tblproduct model.
 */
class ProductController extends Controller
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
                'only' => ['logout', 'signup', 'details', 'pack_details'],
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
//                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tblproduct models.
     * @return mixed
     */


    public function actionIndex()
    {
        $searchModel = new TblproductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblproduct model.
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
     * Creates a new Tblproduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblproduct();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tblproduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionCategory($id)
    {
        $cat_pro = TblcategoryProduct::find()->where(['enabel_view' => 1])->andWhere(['id_parent' => 0])->all();
        $brand = \frontend\models\Tblbrand::find()->where(['enabel_view' => 1])->all();
        $type = \frontend\models\TbltypeProduct::find()->where(['enabel_view' => 1])->andWhere(['id_parent' => 0])->all();
        $cat_pro2 = TblcategoryProduct::find()->where(['enabel_view' => 1])->all();
        $type2 = \frontend\models\TbltypeProduct::find()->where(['enabel_view' => 1])->all();
        $size2 = Tblsize::find()->all();

        foreach ($size2 as $s) {
            $check = Facesize::find()->where(['size' => $s->size])->count();
            if ($check == 0) {
                $size3 = new Facesize();
                $size3->size = $s->size;
                $size3->id_size = $s->id;
                $size3->save();
            }

        }
        $size = Facesize::find()->all();
        $category = TblcategoryProduct::find()->where(['id' => $id])->one();
        
        
        
        
    $url =Yii::$app->urlManager;
    if ($category == null) {
      throw new NotFoundHttpException();
    }
    if ($category->description != null){
      \Yii::$app->view->registerMetaTag([
          'name' => 'description',
          'content' => $category->description,
      ]);
    }
      \Yii::$app->view->registerMetaTag([
          'name' =>'keyword',
          
          'content' =>$category->name.'-لوازم خانگی بوکلر' ,
      ]);
    \Yii::$app->view->registerMetaTag([
        'property' => 'og:title',
        'content' => $category->name,
    ]);
    
    \Yii::$app->view->registerMetaTag([
        'property' => 'og:url',
        'content' => $url->hostInfo.'/product/category?id='.$id,
    ]);
    \Yii::$app->view->registerMetaTag([
        'property' => 'og:site_name',
        'content' => '',
    ]);
    \Yii::$app->view->registerMetaTag([
        'property' => 'og:local',
        'content' => 'fa-IR',
    ]);

    \Yii::$app->view->registerMetaTag([
        'property' => ' DC.date.issued',
        'content' => \date('Y-m-d'),
    ]);
        
        return $this->render('category', [
            'category' => $id,
            'cat_pro' => $cat_pro,
            'type' => $type,
            'cat_pro2' => $cat_pro2,
            'type2' => $type2,
            'brand' => $brand,
            'category' => $category,
            'size' => $size,


        ]);
    }


    public function actionType($id)
    {
        $cat_pro = TblcategoryProduct::find()->where(['enabel_view' => 1])->andWhere(['id_parent' => 0])->all();
        $brand = \frontend\models\Tblbrand::find()->where(['enabel_view' => 1])->all();
        $type = \frontend\models\TbltypeProduct::find()->where(['enabel_view' => 1])->andWhere(['id_parent' => 0])->all();
        $cat_pro2 = TblcategoryProduct::find()->where(['enabel_view' => 1])->all();
        $type2 = \frontend\models\TbltypeProduct::find()->where(['enabel_view' => 1])->all();
        $type_pro = TbltypeProduct::find()->where(['id' => $id])->one();
        $size2 = Tblsize::find()->all();

        foreach ($size2 as $s) {
            $check = Facesize::find()->where(['size' => $s->size])->count();
            if ($check == 0) {
                $size3 = new Facesize();
                $size3->size = $s->size;
                $size3->id_size = $s->id;
                $size3->save();
            }

        }
        $size = Facesize::find()->all();
        return $this->render('type', [
            'category' => $id,
            'cat_pro' => $cat_pro,
            'type' => $type,
            'cat_pro2' => $cat_pro2,
            'type2' => $type2,
            'brand' => $brand,
            'type_pro' => $type_pro,
            'size' => $size,


        ]);
    }


    public function actionBrand($id)
    {
        $cat_pro = TblcategoryProduct::find()->where(['enabel_view' => 1])->andWhere(['id_parent' => 0])->all();
        $brand = \frontend\models\Tblbrand::find()->where(['enabel_view' => 1])->all();
        $type = \frontend\models\TbltypeProduct::find()->where(['enabel_view' => 1])->andWhere(['id_parent' => 0])->all();
        $cat_pro2 = TblcategoryProduct::find()->where(['enabel_view' => 1])->all();
        $type2 = \frontend\models\TbltypeProduct::find()->where(['enabel_view' => 1])->all();
        $brand_pro = Tblbrand::find()->where(['id' => $id])->one();
 

    $url =Yii::$app->urlManager;
    if ($brand_pro == null) {
      throw new NotFoundHttpException();
    }
    if ($brand_pro->description != null){
      \Yii::$app->view->registerMetaTag([
          'name' => 'description',
          'content' => $brand_pro->description,
      ]);
    }
      \Yii::$app->view->registerMetaTag([
          'name' => 'keyword',
          'content' => $brand_pro->brand.'-بهترین برند لوازم خانگی'
          ,
      ]);
    \Yii::$app->view->registerMetaTag([
        'property' => 'og:title',
        'content' => '',
    ]);
    \Yii::$app->view->registerMetaTag([
        'property' => 'og:url',
        'content' => $url->hostInfo.'/product/brand?id='.$id,
    ]);
    \Yii::$app->view->registerMetaTag([
        'property' => 'og:site_name',
        'content' => '',
    ]);
    \Yii::$app->view->registerMetaTag([
        'property' => 'og:local',
        'content' => 'fa-IR',
    ]);

    \Yii::$app->view->registerMetaTag([
        'property' => ' DC.date.issued',
        'content' => \date('Y-m-d'),
    ]);
        
        
        $size2 = Tblsize::find()->all();

        foreach ($size2 as $s) {
            $check = Facesize::find()->where(['size' => $s->size])->count();
            if ($check == 0) {
                $size3 = new Facesize();
                $size3->size = $s->size;
                $size3->id_size = $s->id;
                $size3->save();
            }

        }
        $size = Facesize::find()->all();
        return $this->render('brand', [
            'category' => $id,
            'cat_pro' => $cat_pro,
            'type' => $type,
            'cat_pro2' => $cat_pro2,
            'type2' => $type2,
            'brand' => $brand,
            'brand_pro' => $brand_pro,
            'size' => $size,


        ]);
    }


    /**
     * Deletes an existing Tblproduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSearch()
    {

        $cat_pro = TblcategoryProduct::find()->where(['enabel_view' => 1])->andWhere(['id_parent' => 0])->all();
        $brand = \frontend\models\Tblbrand::find()->where(['enabel_view' => 1])->all();
        $type = \frontend\models\TbltypeProduct::find()->where(['enabel_view' => 1])->andWhere(['id_parent' => 0])->all();
        $cat_pro2 = TblcategoryProduct::find()->where(['enabel_view' => 1])->all();
        $type2 = \frontend\models\TbltypeProduct::find()->where(['enabel_view' => 1])->all();


        if (isset($_POST['cat']) && isset($_POST['brand'])) {
            if ($_POST['cat'] != 0 && $_POST['brand'] != 0 ) {

                $category=TblcategoryProduct::findOne($_POST['cat']);
                $product = Tblproduct::find()->where(['id_category' => $_POST['cat']])->andWhere(['id_brand' => $_POST['brand']])->andWhere(['enabel_view' => 1])->all();
                return $this->render('search', [
                    'cat_pro' => $cat_pro,
                    'type' => $type,
                    'cat_pro2' => $cat_pro2,
                    'type2' => $type2,
                    'brand' => $brand,
                    'product' => $product,
                    'category' => $category,


                ]);

            }elseif ($_POST['cat'] == 0 && $_POST['brand'] != 0 ){

                $product = Tblproduct::find()->where(['id_brand' => $_POST['brand']])->andWhere(['enabel_view' => 1])->all();
                return $this->render('search', [
                    'cat_pro' => $cat_pro,
                    'type' => $type,
                    'cat_pro2' => $cat_pro2,
                    'type2' => $type2,
                    'brand' => $brand,
                    'product' => $product,
                    'category' => null,


                ]);
            } elseif ($_POST['cat'] != 0 && $_POST['brand'] == 0 ){
                $category=TblcategoryProduct::findOne($_POST['cat']);
                $product = Tblproduct::find()->where(['id_category' => $_POST['cat']])->andWhere(['enabel_view' => 1])->all();
                return $this->render('search', [
                    'cat_pro' => $cat_pro,
                    'type' => $type,
                    'cat_pro2' => $cat_pro2,
                    'type2' => $type2,
                    'brand' => $brand,
                    'product' => $product,
                    'category' => $category,

                ]);
            }elseif ($_POST['cat'] == 0 && $_POST['brand'] == 0 ){
                $product = Tblproduct::find()->where(['enabel_view' => 1])->all();
                $category = null;
                $type_pro = null;
                return $this->render('search', [
                    'cat_pro' => $cat_pro,
                    'type' => $type,
                    'cat_pro2' => $cat_pro2,
                    'type2' => $type2,
                    'brand' => $brand,
                    'product' => $product,
                    'category' => $category,


                ]);
            }
            
            
            
            
        } else {
            $product = Tblproduct::find()->where(['enabel_view' => 1])->all();
            $category = null;
            $type_pro = null;
            return $this->render('search', [
                'cat_pro' => $cat_pro,
                'type' => $type,
                'cat_pro2' => $cat_pro2,
                'type2' => $type2,
                'brand' => $brand,
                'product' => $product,
                'category' => $category,


            ]);
        }

    }


    protected function add($product,$cat)
    {

        $url = Yii::$app->urlManager;
        $f = '';
        $f.=' <h2 class="title text-center">محصولات</h2>';

        if ($product != null) {


            foreach ($product as $p) {

                $cat2 = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one();
//                $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one();
                $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one();
                $f .= '<div class="col-sm-3">';

                if ($p->takhfif != null) {

                    $f .= '<div
                                        style="position: absolute;height:50px;width: 50px;background:#cc006a;top:2px;z-index: 1000;border-radius:25px 25px 25px 25px;text-align: center;color:white;padding-top:15px">
                               <span style="">
                                
                                       
                                       <span>' . $p->takhfif. '%off</span>
                                  
                                  </span>
                                    </div>';

                }


                $f .= '<div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center" style="height:350px!important;">
                                            <img src="' . Yii::$app->request->hostInfo . '/upload/' . $p->img . '"
                                                 width="60%" height="55%" alt="">

                                            <p>' . $cat2->name . '</p>';

//                if ($ty != null) {
//                    $f .= '<span>' . $ty->type . '</span>';
//
//                }

                if ($br != null) {
                    $f .= '<span>' . $br->brand . '</span><br>';

                } else {
                    $f .= '';
                }
                $f .= '<br>
                                            
                                            <a href="' . $url->createAbsoluteUrl(['bag/datalis', 'id' => $p->id]) . '"
                                               class="btn btn-default add-to-cart"><i class="fa fa-user"></i>جزئیات
                                               </a>
                                        </div>
                                        <div class="product-overlay">
       <div class="overlay-content">
                    <p>' . $cat2->name . '</p>';

//                if ($ty != null) {
//                    $f .= '<span>' . $ty->type . '</span>';
//
//                }

                if ($br != null) {
                    $f .= '<span>' . $br->brand . '</span>';

                } else {
                    $f .= '';
                }

                $f .= ' <a href="' . $url->createAbsoluteUrl(['bag/datalis', 'id' => $p->id]) . '"
                                               class="btn btn-default add-to-cart"><i class="fa fa-user"></i>جزئیات
                                               </a>
 </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';


            }
            if ($cat != 0) {

               $f.= $this->subcat($cat);
            }
//
//            if ($type != null) {
//                $f.=$this->subtype($type);
//
//            }

        } else {

            $f.= ' <div class="text-center">
                            <img src="<?=Yii::$app->request->hostInfo?>/upload/sory2.jpg" style="width: 400px;height: 300px">
                            <h4 style="color:rgba(0,0,0,0.7);margin-top: 20px">محصولی یافت نشد</h4>
                        </div>
';
        }
        return $f;
    }

    protected function subcat($cat){
$url = Yii::$app->urlManager;
$f='';

$all_category = \backend\models\TblcategoryProduct::find()->where(['id_parent' => $cat])->all();

foreach ($all_category as $category) {

 $product = \frontend\models\Tblproduct::find()->where(['id_category' => $category->id])->all();

if ($product != null) {



                            foreach ($product as $p) {

                                $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one();
                                $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one();
                                $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one();
                                $f.='<div class="col-sm-3">';



                                $f.='<div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center"
                                                 style="height:350px!important;">
                                                <img
                                                    src="'.Yii::$app->request->hostInfo .'/upload/'. $p->img .'"
                                                    width="60%" height="55%" alt="">

                                                <p>'. $cat->name .'</p>';

                                if ($ty != null) {
                                    $f.= '<span>' . $ty->type . '</span>';

                                }

                                if ($br != null) {
                                    $f.= ' ' . '<span>' . $br->brand . '</span>';

                                } else {
                                    $f.='';
                                }
                                $f.='<br>';

                                $f.='<a href="'.$url->createAbsoluteUrl(['bag/datalis', 'id' => $p->id]) .'"
                                                   class="btn btn-default add-to-cart"><i
                                                      class="fa fa-user"></i>چزئیات
                                                   </a>
                                           </div>
                                           <div class="product-overlay">
                                                <div class="overlay-content">

                                <p>'. $cat->name .'</p>';

                                if ($ty != null) {
                                    $f.= '<span>' . $ty->type . '</span>';

                                }

                                if ($br != null) {
                                    $f.= ' ' . '<span>' . $br->brand . '</span>';

                                } else {
                                    $f.='';
                                }
                                $f.='<br>';

                                $f.='<a href="'.$url->createAbsoluteUrl(['bag/datalis', 'id' => $p->id]) .'"
                                                   class="btn btn-default add-to-cart"><i
                                                      class="fa fa-user"></i>چزئیات
                                                   </a>


                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';


                            }



                if ($category != null) {

                    $this->subcat($category->id);

                }

            }



        }
        return $f;

    }

    protected  function subtype($parent){
        $url = Yii::$app->urlManager;
$f='';
        $all_type = \backend\models\TbltypeProduct::find()->where(['id_parent' => $parent])->all();
        foreach ($all_type as $type_pro){


            $product = \frontend\models\Tblproduct::find()->where(['id_type' => $type_pro->id])->all() ;
            if ($product != null) {


                            foreach ($product as $p) {

                                 $cat = \frontend\models\TblcategoryProduct::find()->where(['id' => $p->id_category])->one();
                                 $ty = \frontend\models\TbltypeProduct::find()->where(['id' => $p->id_type])->one();
                                $br = \frontend\models\Tblbrand::find()->where(['id' => $p->id_brand])->one();
                                $f.='<div class="col-sm-3">';





                                    $f.='<div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center"
                                                 style="height:350px!important;">
                                                <img
                                                    src="'.Yii::$app->request->hostInfo .'/upload/'. $p->img .'"
                                                    width="60%" height="55%" alt="">

                                                <p>'. $cat->name .'</p>';

                                                if ($ty != null) {
                                                    $f.= '<span>' . $ty->type . '</span>';

                                                }

                                                if ($br != null) {
                                                    $f.= ' ' . '<span>' . $br->brand . '</span>';

                                                } else {
                                                    $f.='';
                                                }
                                                $f.='<br>';

                                                $f.='<a href="'.$url->createAbsoluteUrl(['bag/datalis', 'id' => $p->id]) .'"
                                                   class="btn btn-default add-to-cart"><i
                                                        class="fa fa-user"></i>چزئیات
                                                   </a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">

                                <p>'. $cat->name .'</p>';

                                                if ($ty != null) {
                                                    $f.= '<span>' . $ty->type . '</span>';

                                                }

                                                if ($br != null) {
                                                    $f.= ' ' . '<span>' . $br->brand . '</span>';

                                                } else {
                                                    $f.='';
                                                }
                                                $f.='<br>';

                                                $f.='<a href="'.$url->createAbsoluteUrl(['bag/datalis', 'id' => $p->id]) .'"
                                                   class="btn btn-default add-to-cart"><i
                                                        class="fa fa-user"></i>چزئیات
                                                   </a>';


                                               $f.=' </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';


                            }

                if ($type_pro != null) {

                    $f.=$this->subtype($type_pro->id);
                }
            }


    }
        return $f;

    }




    public function actionFind()
    {
        $cat = $_POST['cate'];
        $brand = $_POST['brand'];



        $f = '';

if ($cat != 0  && $brand != 0 ) {

            $product = Tblproduct::find()->where(['id_category' => $cat])->andWhere(['id_brand' => $brand])->andWhere(['enabel_view' => 1])->all();
            $f .= $this->add($product,$cat);
        }elseif ($cat == 0  && $brand != 0 ) {

            $product = Tblproduct::find()->where(['id_brand' => $brand])->andWhere(['enabel_view' => 1])->all();
            $f .= $this->add($product,$cat);
        } elseif ($cat != 0 && $brand == 0 ) {

            $product = Tblproduct::find()->where(['id_category' => $cat])->andWhere(['enabel_view' => 1])->all();
            $f .= $this->add($product,$cat);
        }  elseif ($cat == 0  && $brand == 0 ) {

            $product = Tblproduct::find()->where(['enabel_view' => 1])->all();
            $f .= $this->add($product,$cat);
        }

        return $f;

    }




    protected function findModel($id)
    {
        if (($model = Tblproduct::findOne($id)) !== null) {
            return $model;
        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
