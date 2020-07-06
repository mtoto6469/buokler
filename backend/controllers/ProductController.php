<?php

namespace backend\controllers;

use backend\models\Gallery;
use backend\models\Tblbrand;
use backend\models\TblcategoryProduct;
use backend\models\Tblcolor;
use backend\models\Tblexist;
use backend\models\Tblgallery;
use backend\models\Tblsize;
use backend\models\TbltypeProduct;
use backend\models\Upload;
use backend\models\Uploadimages;
use backend\models\Uploadimg;
use common\components\jdf;
use Yii;
use backend\models\Tblproduct;
use backend\models\TblproductSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Tblproduct model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'delete', 'update', 'view', 'create', 'error'],
                'rules' => [

                    [
                        'actions' => ['index', 'delete', 'update', 'view', 'create'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],

                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],

            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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


    public function actionFind()
    {
        $model = new  Tblsize();


    }


    public function actionCreate()
    {
        $model = new Tblproduct();
        $ff = TblcategoryProduct::find()->all();
        $name = ArrayHelper::map($ff, 'id', 'name');
        $type = ArrayHelper::map(TbltypeProduct::find()->all(), 'id', 'type');
        $brand = ArrayHelper::map(Tblbrand::find()->all(), 'id', 'brand');
        $img = ArrayHelper::map(Tblgallery::find()->all(), 'id', 'title');
        $modelf = new Upload();
        $modelup=new Uploadimages();

        if ($model->load(Yii::$app->request->post())) {

            $modelf->image = UploadedFile::getInstance($modelf, 'image');
            if ($modelf->image == null) {

                return $this->render('create', [
                    'model' => $model,
                    'name' => $name,
                    'type' => $type,
                    'brand' => $brand,
                    'img' => $img,
                    'modelf' => $modelf,

                ]);

            } else {

            if ($modelf->validate()) {
                $modelf->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension);
                $model->img = $modelf->image->baseName . '.' . $modelf->image->extension;

                $modelup->imageFiles = UploadedFile::getInstances($modelup, 'imageFiles');
                $id_images=$modelup->upload();
              
                
                    $model->imags_id=$id_images;
                    $model->save();


            } else {

                return $this->render('create', [
                    'model' => $model,
                    'name' => $name,
                    'type' => $type,
                    'brand' => $brand,
                    'img' => $img,
                    'modelf' => $modelf,
                    'modelup'=>$modelup,

                ]);
            }
        }






            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('create', [
                'model' => $model,
                'name' => $name,
                'type' => $type,
                'brand' => $brand,
                'img' => $img,
                'modelf' => $modelf,
                'modelup'=>$modelup,

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
        $name = ArrayHelper::map(TblcategoryProduct::find()->all(), 'id', 'name');
        $type = ArrayHelper::map(TbltypeProduct::find()->all(), 'id', 'type');
        $brand = ArrayHelper::map(Tblbrand::find()->all(), 'id', 'brand');
        $img = ArrayHelper::map(Tblgallery::find()->all(), 'id', 'title');
        $modelf = new Upload();
        $modelup=new Uploadimages();
        if ($model->load(Yii::$app->request->post())) {

            $modelf->image = UploadedFile::getInstance($modelf, 'image');
            if ($modelf->image == null) {
                $modelup->imageFiles = UploadedFile::getInstances($modelup, 'imageFiles');
                $id_images=$modelup->upload();
                    if($id_images!=null){
                        $model->imags_id=$id_images;
                    }


                $model->save();
            } else {
                if ($modelf->validate()) {
                    $modelf->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension);
                    $model->img = $modelf->image->baseName . '.' . $modelf->image->extension;
                    $modelup->imageFiles = UploadedFile::getInstances($modelup, 'imageFiles');
                    $id_images=$modelup->upload();

                    if($id_images!=null){
                        $model->imags_id=$id_images;
                    }
                    $model->save();


                } else {
                    return $this->render('update', [
                        'model' => $model,
                        'name' => $name,
                        'type' => $type,
                        'brand' => $brand,
                        'img' => $img,
                        'modelf' => $modelf,
                        'modelup'=>$modelup,
                    ]);
                }
            }



            


            return $this->redirect(['view', 'id' => $model->id]);
        } else {



            return $this->render('update', [
                'model' => $model,
                'name' => $name,
                'type' => $type,
                'brand' => $brand,
                'img' => $img,
                'modelf' => $modelf,
                'modelup'=>$modelup,

            ]);
        }
    }


    public function actionSize()
    {
        $model = Tblsize::find()->where(['id' => $_GET['id']])->one();
        $model->enabel_view = 0;
        $model->save();
        $size = \backend\models\Tblsize::find()->where(['id_pro' => $_GET["id_pro"]])->andWhere(['enabel_view' => 1])->all();
        $f='';
        if ($size != null) {
            $f .= '<div class="row" style="padding: 2%" id="ress">';
            foreach ($size as $s) {
                $f .= '<span> ' . $s->size . ' ' . $s->price . ' ' . $s->price_namayande;
                $f .= '<input id="id" hidden value="' . $_GET["id_pro"]. '">';
                $f .= '<button type="button" class="btn btn-default add-button"   value="' . $s->id . '">
             <i class="fa fa-trash-o" style="color:red" ></i>
            </button>
            <br>';
            }
            $f.='</div>';

        }
        return $f;
    }


    /**
     * Deletes an existing Tblproduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        // $modelsize = Tblsize::find()->where(['id_pro' => $model->id])->all();
        // if ($modelsize != null) {
        //     foreach ($modelsize as $ms) {
        //         $ms->enabel_view = 0;
        //         $ms->update();
        //     }
        // }

        // $modelcolor = Tblcolor::find()->where(['id_pro' => $model->id])->all();
        // if ($modelcolor != null) {
        //     foreach ($modelcolor as $mc) {
        //         $mc->enabel_view = 0;
        //         $mc->update();
        //     }
        // }

        // $modelexist = Tblexist::find()->where(['id_pro' => $model->id])->all();
        // if ($modelcolor != null) {
        //     foreach ($modelexist as $me) {
        //         $me->enabel_view = 0;
        //         $me->update();
        //     }
        // }

        $model->enabel_view = 0;
        $model->update();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblproduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblproduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblproduct::findOne($id)) !== null) {
            return $model;
        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
