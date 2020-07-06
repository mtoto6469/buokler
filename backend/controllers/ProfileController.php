<?php

namespace backend\controllers;

use common\components\jdf;
use common\models\User;
use Yii;
use backend\models\Tblprofile;
use backend\models\TblprofileSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Tblprofile model.
 */
class ProfileController extends Controller
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
     * Lists all Tblprofile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblprofileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblprofile model.
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
     * Creates a new Tblprofile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblprofile();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tblprofile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

//        $user=User::find()->where(['id'=>Yii::$app->user->getId()])->one();
        if ($model->load(Yii::$app->request->post()) ) {

            $model->mande=$model->mande+$model->credit;
            $data = new jdf();
            if($_POST['time']!=null) {
                $time = explode("/", $_POST['time']);
                $d = $time[0];
                $m = $time[1];
                $y = $time[2];

                $time2 = $data->jalaliToGregorian($y, $m, $d);

                $Y = $time2[0] . '/';
                $M = $time2[1] . '/';
                $D = $time2[2];
                $g = $Y . $M . $D;

                $model->date_credit = date($g);
            }
//            $user->username=$model->username;
//            if($model->password!=null){
//                $user->setPassword($model->password);
//            }

            $model->save();


            return $this->redirect(['view', 'id' => $model->id]);
        }
            $date= new jdf();
            if($model->date_credit!=null){
            $time=explode('-',$model->date_credit);

             $y=$time[0];
             $m=$time[1];
             $d=$time[2];
            $ir=$date->gregorianToJalali($y,$m,$d,$mod='');
            $date_ir=implode('-',$ir);
        }
            $date_ir=null;
           
            return $this->render('update', [
                'model' => $model,
                'date_ir'=>$date_ir,
               
            ]);

    }

    /**
     * Deletes an existing Tblprofile model.
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
     * Finds the Tblprofile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblprofile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblprofile::findOne($id)) !== null) {
            return $model;
        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
