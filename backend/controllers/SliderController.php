<?php

namespace backend\controllers;

use backend\models\Upload;
use Yii;
use backend\models\Slider;
use backend\models\SliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
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
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slider();

        $modelf = new Upload();

        if ($model->load(Yii::$app->request->post())) {

            $modelf->image = UploadedFile::getInstance($modelf, 'image');

            if ($modelf->validate()) {
                $modelf->image->saveAs(Yii::getAlias('@upload') . '/upload/' . $modelf->image->baseName . '.' . $modelf->image->extension);
                $model->img = $modelf->image->baseName . '.' . $modelf->image->extension;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'modelf' => $modelf,
                ]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
                'modelf' => $modelf,
            ]);
        }
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelf = new Upload();

        if ($model->load(Yii::$app->request->post())) {

            $modelf->image = UploadedFile::getInstance($modelf,'image');
            if($modelf->image==null){
                $model->save();
            }else{
                if ($modelf->validate()) {
                    $modelf->image->saveAs(Yii::getAlias('@upload').'/upload/'. $modelf->image->baseName . '.' . $modelf->image->extension);
                    $model->img=$modelf->image->baseName.'.'.$modelf->image->extension;
                    $model->save();
                    return $this->redirect(['view','id'=>$model->id]);
                } else {
                    return $this->render('create', [
                        'model' => $model,
                        'modelf'=>$modelf,
                    ]);
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelf'=> $modelf,
            ]);
        }
    }

    /**
     * Deletes an existing Slider model.
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
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
