<?php

namespace backend\controllers;

use backend\models\Sliderapp;
use backend\models\TblcategoryProduct;
use backend\models\Tblproduct;
use backend\models\Upload;
use backend\models\Uploadimg;
use frontend\models\gallery;
use Yii;
use backend\models\MainApp;
use backend\models\MainAppSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MainappController implements the CRUD actions for MainApp model.
 */
class MainappController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MainApp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MainAppSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MainApp model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionMain(){
        return $this->render('main');
    }


    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),

        ]);
    }

    /**
     * Creates a new MainApp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($type)
    {
        $model = new MainApp();
        $cat1=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['enabel'=>1])->all();
        $cat2=Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['enabel'=>1])->all();
        $modelf = new Upload();
        $modelf2= new Uploadimg();
        if ($model->load(Yii::$app->request->post()) || $modelf->load(Yii::$app->request->post()) || $modelf2->load(Yii::$app->request->post())) {

            if($type=='oneImage' || $type=='oneText' || $type=='towText') {

                $modelf->image = UploadedFile::getInstance($modelf, 'image');
                if ($modelf->image != null) {
                if ($modelf->validate()) {
                    $modelf->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension);

                    $model->urlimg = Yii::$app->request->hostInfo . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension;


                        if ($model->m_d_f =='m') {

                            $model->id_m_d_f = $_POST['cat2'];
                        } else {
                            $model->id_m_d_f = $_POST['cat1'];
                        }
                        $model->type = 'oneImage';
                    $model->save();





                } else {

                    $_SESSION['imgtype1'] = 'عکس را اپلود کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }

                } else {

                    $_SESSION['imgtype1'] = 'عکسس اپلود کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);

                }
            }if($type=='oneText' || $type=='towText'|| $type=='fourImage'|| $type=='treeImage'){

                if($model->headrtype == null){

                    $_SESSION['header'] = 'متن هدر نمی تواند خالی باشد';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }else{
                    $model->type = 'oneText';
                    $model->save();

                }
            }if($type=='towText'|| $type=='fourImage'|| $type=='treeImage'){
                if($model->footertype==null){
                    $_SESSION['fotter'] = 'متن fotter نمی تواند خالی باشد';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }else{
                    $model->type ='towText';
                    $model->save();

                }
            }



            if($type=='fourImage'){

                $modelf2->image1 = UploadedFile::getInstance($modelf2,'image1');
                if($modelf2->image1!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image1->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image1->baseName . '.' . $modelf2->image1->extension);
                        $model->img1 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image1->baseName . '.' . $modelf2->image1->extension;
                        $model->id1=$_POST['id1'];

                    } else {

                        $_SESSION['img1type2'] = 'عکسس1 اپلود کنید';
                        return $this->render('create', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{
                    $_SESSION['img1type2'] = 'عکسس1 اپلود کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }

                $modelf2->image2 = UploadedFile::getInstance($modelf2,'image2');
                if($modelf2->image2!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image2->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image2->baseName . '.' . $modelf2->image2->extension);
                        $model->img2 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image2->baseName . '.' . $modelf2->image2->extension;
                        $model->id2=$_POST['id2'];

                    } else {

                        $_SESSION['img2type2'] = 'عکسس2 اپلود کنید';
                        return $this->render('create', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{

                    $_SESSION['img2type2'] = 'عکسس2 اپلود کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }



                $modelf2->image3 = UploadedFile::getInstance($modelf2,'image3');
                if($modelf2->image3!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image3->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image3->baseName . '.' . $modelf2->image3->extension);
                        $model->img3 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image3->baseName . '.' . $modelf2->image3->extension;
                        $model->id3=$_POST['id3'];

                    } else {

                        $_SESSION['img3type2'] = 'عکسس3 اپلود کنید';
                        return $this->render('create', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{

                    $_SESSION['img3type2'] = 'عکسس3 اپلود کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }



                $modelf2->image4 = UploadedFile::getInstance($modelf2,'image4');
                if($modelf2->image4!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image4->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image4->baseName . '.' . $modelf2->image4->extension);
                        $model->img4 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image4->baseName . '.' . $modelf2->image4->extension;
                        $model->id4=$_POST['id4'];

                    } else {

                        $_SESSION['img4type2'] = 'عکسس4 اپلود کنید';
                        return $this->render('create', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{

                    $_SESSION['img4type2'] = 'عکسس4 اپلود کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }
                $model->type='fourImage';
                $model->save();

            }

            if($type=='treeImage'){

                $modelf2->image1 = UploadedFile::getInstance($modelf2,'image1');
                if($modelf2->image1!=null && $model->text1!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image1->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image1->baseName . '.' . $modelf2->image1->extension);
                        $model->img1 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image1->baseName . '.' . $modelf2->image1->extension;
                        $model->id1=$_POST['id1'];


                    } else {

                        $_SESSION['img1type2'] = 'عکسس1 اپلود کنید';
                        return $this->render('create', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{
                    $_SESSION['img1type2'] = 'عکسس1 اپلود کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }

                $modelf2->image2 = UploadedFile::getInstance($modelf2,'image2');
                if($modelf2->image2!=null && $model->text2!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image2->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image2->baseName . '.' . $modelf2->image2->extension);
                        $model->img2 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image2->baseName . '.' . $modelf2->image2->extension;
                        $model->id2=$_POST['id2'];

                    } else {

                        $_SESSION['img2type2'] = 'عکسس2 اپلود کنید';
                        return $this->render('create', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{

                    $_SESSION['img2type2'] = 'عکسس2 اپلود کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }



                $modelf2->image3 = UploadedFile::getInstance($modelf2,'image3');
                if($modelf2->image3!=null && $model->text3!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image3->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image3->baseName . '.' . $modelf2->image3->extension);
                        $model->img3 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image3->baseName . '.' . $modelf2->image3->extension;
                        $model->id3=$_POST['id3'];

                    } else {

                        $_SESSION['img3type2'] = 'عکسس3 اپلود کنید';
                        return $this->render('create', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{

                    $_SESSION['img3type2'] = 'عکسس3 اپلود کنید';
                    return $this->render('create', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }

                $model->type='treeImage';
                $model->save();

            }


            

            return $this->redirect(['view', 'id' => $model->id,'type'=>$type]);
        }

        if($type=='sllider'){
            $model->type='sllider';
            $model->save();
            $this->redirect(['slider','id'=>$model->id,'cat_id'=>0]);
        }


        return $this->render('create', [
            'model' => $model,
            'type'=>$type,
            'cat1'=>$cat1,
            'cat2'=>$cat2,
            'modelf'=>$modelf,
            'modelf2' => $modelf2,
        ]);
    }

    /**
     * Updates an existing MainApp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $type=$model->type;
        $cat1=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['enabel'=>1])->all();
        $cat2=Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['enabel'=>1])->all();
        $modelf = new Upload();
        $modelf2= new Uploadimg();
        if ($model->load(Yii::$app->request->post()) || $modelf->load(Yii::$app->request->post()) || $modelf2->load(Yii::$app->request->post())) {
            if($type=='oneImage' || $type=='oneText' || $type=='towText') {

                $modelf->image = UploadedFile::getInstance($modelf, 'image');
                if ($modelf->image != null) {
                    if ($modelf->validate()) {
                        $modelf->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension);

                        $model->urlimg = Yii::$app->request->hostInfo . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension;


                        if ($model->m_d_f =='m') {

                            $model->id_m_d_f = $_POST['cat2'];
                        } else {
                            $model->id_m_d_f = $_POST['cat1'];
                        }
                        $model->type ='oneImage';





                    } else {

                        $_SESSION['imgtype1'] = 'عکس را اپلود کنید';
                        return $this->render('update', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);
                    }

                } else {

                    if ($model->m_d_f == 'm') {
                        $model->id_m_d_f = $_POST['cat2'];
                    } else {
                        $model->id_m_d_f = $_POST['cat1'];
                    }
                    $model->type = 'oneImage';
                    $model->save();


                }
            }if($type=='oneText' || $type=='towText'|| $type=='fourImage'|| $type=='treeImage'){

                if($model->headrtype == null){

                    $_SESSION['header'] = 'متن هدر نمی تواند خالی باشد';
                    return $this->render('update', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }else{
                    $model->type = 'oneText';
                    $model->save();

                }
            }if($type=='towText'|| $type=='fourImage'|| $type=='treeImage'){
                if($model->footertype==null){
                    $_SESSION['fotter'] = 'متن fotter نمی تواند خالی باشد';
                    return $this->render('update', [
                        'model' => $model,
                        'type' => $type,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,
                        'modelf2' => $modelf2,
                    ]);
                }else{
                    $model->type ='towText';
                    $model->save();

                }
            }



            if($type=='fourImage'){

                $modelf2->image1 = UploadedFile::getInstance($modelf2,'image1');
                if($modelf2->image1!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image1->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image1->baseName . '.' . $modelf2->image1->extension);
                        $model->img1 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image1->baseName . '.' . $modelf2->image1->extension;
                        $model->id1=$_POST['id1'];

                    } else {

                        $_SESSION['img1type2'] = 'عکسس1 اپلود کنید';
                        return $this->render('update', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{
                    $model->id1=$_POST['id1'];
                }

                $modelf2->image2 = UploadedFile::getInstance($modelf2,'image2');
                if($modelf2->image2!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image2->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image2->baseName . '.' . $modelf2->image2->extension);
                        $model->img2 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image2->baseName . '.' . $modelf2->image2->extension;
                        $model->id2=$_POST['id2'];

                    } else {

                        $_SESSION['img2type2'] = 'عکسس2 اپلود کنید';
                        return $this->render('update', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{
                    $model->id2=$_POST['id2'];
                }



                $modelf2->image3 = UploadedFile::getInstance($modelf2,'image3');
                if($modelf2->image3!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image3->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image3->baseName . '.' . $modelf2->image3->extension);
                        $model->img3 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image3->baseName . '.' . $modelf2->image3->extension;
                        $model->id3=$_POST['id3'];

                    } else {

                        $_SESSION['img3type2'] = 'عکسس3 اپلود کنید';
                        return $this->render('update', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{
                    $model->id3=$_POST['id3'];
                }



                $modelf2->image4 = UploadedFile::getInstance($modelf2,'image4');
                if($modelf2->image4!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image4->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image4->baseName . '.' . $modelf2->image4->extension);
                        $model->img4 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image4->baseName . '.' . $modelf2->image4->extension;
                        $model->id4=$_POST['id4'];

                    } else {

                        $_SESSION['img4type2'] = 'عکسس4 اپلود کنید';
                        return $this->render('update', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{

                    $model->id4=$_POST['id4'];
                }
                $model->type='fourImage';
                $model->save();

            }
            if($type=='treeImage'){

                $modelf2->image1 = UploadedFile::getInstance($modelf2,'image1');
                if($modelf2->image1!=null && $model->text1!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image1->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image1->baseName . '.' . $modelf2->image1->extension);
                        $model->img1 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image1->baseName . '.' . $modelf2->image1->extension;
                        $model->id1=$_POST['id1'];


                    } else {

                        $_SESSION['img1type2'] = 'عکسس1 اپلود کنید';
                        return $this->render('update', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{
                    $model->id1=$_POST['id1'];
                }

                $modelf2->image2 = UploadedFile::getInstance($modelf2,'image2');
                if($modelf2->image2!=null && $model->text2!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image2->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image2->baseName . '.' . $modelf2->image2->extension);
                        $model->img2 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image2->baseName . '.' . $modelf2->image2->extension;
                        $model->id2=$_POST['id2'];

                    } else {

                        $_SESSION['img2type2'] = 'عکسس2 اپلود کنید';
                        return $this->render('update', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{

                    $model->id1=$_POST['id1'];
                }



                $modelf2->image3 = UploadedFile::getInstance($modelf2,'image3');
                if($modelf2->image3!=null && $model->text3!=null){
                    if ($modelf2->validate()) {
                        $modelf2->image3->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf2->image3->baseName . '.' . $modelf2->image3->extension);
                        $model->img3 = Yii::$app->request->hostInfo . '/upload/' . $modelf2->image3->baseName . '.' . $modelf2->image3->extension;
                        $model->id3=$_POST['id3'];

                    } else {

                        $_SESSION['img3type2'] = 'عکسس3 اپلود کنید';
                        return $this->render('update', [
                            'model' => $model,
                            'type' => $type,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'modelf2' => $modelf2,
                        ]);

                    }
                }else{

                    $model->id1=$_POST['id1'];
                }

                $model->type='treeImage';
                $model->save();

            }


            return $this->redirect(['view', 'id' => $model->id,'type'=>$type]);
        }

        if($type=='sllider'){

            $model->type='sllider';
            $model->save();
            $slider=Sliderapp::find()->where(['id_main'=>$model->id])->andWhere(['id_cat'=>0])->one();
            $this->redirect(['sliderup','id'=>$slider->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'type'=>$type,
            'cat1'=>$cat1,
            'cat2'=>$cat2,
            'modelf'=>$modelf,
            'modelf2' => $modelf2,
        ]);
    }

    
    
    
    public function actionSlider($id,$cat_id){

         $model=new Sliderapp();
        $modelf= new Upload();
        $cat1=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['enabel'=>1])->all();
        $cat2=Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['enabel'=>1])->all();
        if ($model->load(Yii::$app->request->post()) || $modelf->load(Yii::$app->request->post()) ) {

            $modelf->image = UploadedFile::getInstance($modelf, 'image');
            if ($modelf->image != null ) {
                if ($modelf->validate()) {
                    $modelf->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension);

                    $model->img = Yii::$app->request->hostInfo . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension;

                $model->id_m_d_f=$_POST['id1'];

                } else {

                    $_SESSION['imgtype1'] = 'عکس  را اپلود کنید';
                    return $this->render('slider', [
                        'model' => $model,
                        'cat1' => $cat1,
                        'cat2' => $cat2,
                        'modelf' => $modelf,

                    ]);
                }

            } else {

                $_SESSION['imgtype1'] = 'عکس را اپلود کنید ';
                return $this->render('slider', [
                    'model' => $model,
                    'cat1' => $cat1,
                    'cat2' => $cat2,
                    'modelf' => $modelf,

                ]);


            }

            if($_POST['next']==1){
                $model->id_cat=$cat_id;
                $model->id_main=$id;
                $model->save();
                return $this->redirect(['view','id'=>$id]);
            }else{
                $model->id_cat=$cat_id;
                $model->id_main=$id;
                $model->save();
                return $this->redirect(['slider','id'=>$id,'cat_id'=>$model->id]);

            }
            
        }
      
            
            return $this->render('slider',[
                'model'=>$model,
                'modelf'=>$modelf,
                'cat1'=>$cat1,
                'cat2'=>$cat2,
            ]);
            


        }
    
    
    
    
    public function actionSliderup($id)
    {

        $modelf= new Upload();
        $cat1=TblcategoryProduct::find()->where(['enabel_view'=>1])->andWhere(['enabel'=>1])->all();
        $cat2=Tblproduct::find()->where(['enabel_view'=>1])->andWhere(['enabel'=>1])->all();
      $model=Sliderapp::findOne($id);
        $sub=Sliderapp::find()->where(['id_cat'=>$model->id])->all();
        if ($model->load(Yii::$app->request->post()) || $modelf->load(Yii::$app->request->post()) ) {

            if($_POST['next']==1){

                $modelf->image = UploadedFile::getInstance($modelf, 'image');
                if ($modelf->image != null ) {
                    if ($modelf->validate()) {
                        $modelf->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension);

                        $model->img = Yii::$app->request->hostInfo . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension;

                        $model->id_m_d_f=$_POST['id1'];

                    } else {

                        $_SESSION['imgtype1'] = 'عکس  را اپلود کنید';
                        return $this->render('sliderup', [
                            'model' => $model,
                            'cat1' => $cat1,
                            'cat2' => $cat2,
                            'modelf' => $modelf,
                            'sub'=>$sub,

                        ]);
                    }

                } else {

                    $model->id_m_d_f=$_POST['id1'];


                }
                $model->save();
                if($model->id_cat==0){

                    return $this->redirect(['view','id'=>$model->id_main]);

                }else{
                    return $this->redirect(['sliderup','id'=>$model->id_cat]);
                }

            }else{

                return $this->redirect(['slider','id'=>$model->id_main,'cat_id'=>$id]);
            }
            
        }

        return $this->render('sliderup',[
            'model'=>$model,
            'modelf'=>$modelf,
            'cat1'=>$cat1,
            'cat2'=>$cat2,
            'sub'=>$sub,

        ]);

        }

    /**
     * Deletes an existing MainApp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDeletslider($id){

        $model=Sliderapp::findOne($id);
        $id_cat=$model->id_cat;
        $model->delete();
        return $this->redirect(['sliderup','id'=>$id_cat]);


    }

    public function actionDelete($id)
    {
        $model=MainApp::findOne($id);
        if($model->type=='sllider'){
            $slider=Sliderapp::find()->where(['id_main'=>$id])->all();
            foreach ($slider as $s){
                $s->delete();
            }
        
        }
        $model->delete();

        return $this->redirect(['index']);
    }
    
    
    
    public function actionPosition()
    {
        $Mainapp=MainApp::find()->all();
        foreach ($Mainapp as $ma){
            $ma->position=null;
            $ma->save();
        }
        if (Yii::$app->request->post()) {
            foreach ($Mainapp as $ma){
                if(isset($_POST[$ma->id])){
                    $check=MainApp::find()->where(['position'=>$_POST[$ma->id]])->count();

                    if($check==0){

                        $ma->position=$_POST[$ma->id];
                        $ma->save();

                    }else{

                        $_SESSION[$ma->id]='این الویت قبلا استفاده شده است';
                        foreach ($Mainapp as $ma){
                            $ma->position=null;
                            $ma->save();
                        }
                        return $this->render('position',[
                            'mainapp'=>$Mainapp,
                        ]);


                    }
                }
               
            }
            return $this->render('main');

        }

            return $this->render('position',[
            'mainapp'=>$Mainapp,
        ]);
    }

    /**
     * Finds the MainApp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MainApp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MainApp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
