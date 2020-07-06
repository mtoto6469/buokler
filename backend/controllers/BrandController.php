<?php

namespace backend\controllers;

use backend\models\Upload;
use Yii;
use backend\models\Tblbrand;
use backend\models\TblbrandSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BrandController implements the CRUD actions for Tblbrand model.
 */
class BrandController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'delete','update','view','create','error'],
                'rules' => [

                    [
                        'actions' => ['index', 'delete','update','view','create'],
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
     * Lists all Tblbrand models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblbrandSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblbrand model.
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
     * Creates a new Tblbrand model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblbrand();
        $modelf = new Upload();
        if ($model->load(Yii::$app->request->post()) ) {
            $modelf->image = UploadedFile::getInstance($modelf, 'image');
            if ($modelf->image == null) {

                return $this->render('create', [
                    'model' => $model,
                    'modelf'=>$modelf,
                    
                ]);

            }


            if ($modelf->validate()) {
                $modelf->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension);
                $model->img_brand = $modelf->image->baseName . '.' . $modelf->image->extension;
              
                
            } else {

                return $this->render('create', [
                    'model' => $model,
                    'modelf'=>$modelf,
                  
                ]);
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelf'=>$modelf,
            ]);
        }
    }

    /**
     * Updates an existing Tblbrand model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelf = new Upload();
        if ($model->load(Yii::$app->request->post())) {

            $modelf->image = UploadedFile::getInstance($modelf, 'image');
            if ($modelf->image != null) {

                if ($modelf->validate()) {
                    $modelf->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension);
                    $model->img_brand = $modelf->image->baseName . '.' . $modelf->image->extension;


                    $model->save();


                } else {
                    return $this->render('create', [
                        'model' => $model,
                        'modelf' => $modelf,
                    ]);
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelf' => $modelf,
            ]);
        }
    }

    /**
     * Deletes an existing Tblbrand model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblbrand model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblbrand the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblbrand::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
