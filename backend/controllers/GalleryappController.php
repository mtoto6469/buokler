<?php

namespace backend\controllers;

use backend\models\gallery;
use backend\models\Upload;
use frontend\models\UploadForm;
use Psr\Http\Message\UploadedFileInterface;
use Yii;
use backend\models\GalleryApp;
use backend\models\GalleryAppSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GalleryappController implements the CRUD actions for GalleryApp model.
 */
class GalleryappController extends Controller
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
     * Lists all GalleryApp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GalleryAppSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GalleryApp model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GalleryApp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GalleryApp();
        $modelf = new Upload();

        if ($model->load(Yii::$app->request->post())) {

            $modelf->image = UploadedFile::getInstance($modelf,'image');

            if ($modelf->image!=null && $modelf->validate()) {
                $modelf->image->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf->image->baseName . '.' . $modelf->image->extension);

                    $model->img=$modelf->image->baseName . '.' . $modelf->image->extension;
                $model->save();

                return $this->redirect(['view','id'=>$model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'modelf'=>$modelf,
                ]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
                'modelf'=> $modelf,
            ]);
        }
    }

    /**
     * Updates an existing GalleryApp model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelf = new Upload();
        if ($model->load(Yii::$app->request->post()) ) {


            $modelf->image = UploadedFile::getInstance($modelf,'image');
            if($modelf->image==null){
                $model->save();
            }else{
                if ($modelf->validate()) {
                    $modelf->image->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf->image->baseName . '.' . $modelf->image->extension);
                    $model->img=$modelf->image->baseName . '.' . $modelf->image->extension;
                    $model->save();

                } else {
                    return $this->render('update', [
                        'model' => $model,
                        'modelf'=>$modelf,

                    ]);
                }
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelf'=>$modelf,

            ]);
        }
    }

    /**
     * Deletes an existing GalleryApp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GalleryApp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GalleryApp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GalleryApp::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
