<?php

namespace backend\controllers;

use Yii;
use backend\models\CodeOff;
use backend\models\CodeOffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CodeoffController implements the CRUD actions for CodeOff model.
 */
class CodeoffController extends Controller
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
     * Lists all CodeOff models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CodeOffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CodeOff model.
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
     * Creates a new CodeOff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CodeOff();
        $new=$model->find()->all();
        if ($model->load(Yii::$app->request->post()) ) {
            $find=CodeOff::find()->where(['price'=>0])->all();
            foreach ($find as $f){
                $f->price=$model->price;
                $f->save();
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'new'=>$new,
        ]);
    }


    public function actionFind(){
        $model=new CodeOff();
        $code=1;
        $check=$model->find()->all();
        if($check!=null){
            foreach ($check as $ch){
                if($ch->code >= $code){
                    $code=$ch->code;
                }
            }
        }

        $model->code = $code+1;
        $model->save();
        $new=$model->find()->all();
        $f='';
        $i=1;
        $f.=' <thead>
        <tr class="text-right">
            <th scope="col">#</th>
            <th scope="col">کد</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>';
        if($new!=null){
            foreach ($new as $n) {
                $f .= '
<tbody>
        <td >
<th scope="row">' . $i . '</th>
            <td>'.$n->code.'</td>
            <td><i class="fa fa-trash" onclick="deletec('.$n->id.')"></i></td>
             </td>

        </tbody>
            ';
                $i++;
            }
        }
        return $f;
    }


    public function actionFindde(){
        $model=CodeOff::findOne($_GET['id']);
        $model->delete();

        $new=CodeOff::find()->all();
        $f='';
        $i=1;
        if($new!=null){
            foreach ($new as $n) {
                $f .= '<th scope="row">' . $i . '</th>
            <td>'.$n->code.'</td>
            <td><i class="fa fa-trash" onclick="deletec('.$n->id.')"></i></td>';
                $i++;
            }
        }
        return $f;
    }

    /**
     * Updates an existing CodeOff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $new=$model->find()->all();
        if ($model->load(Yii::$app->request->post()) ) {
            $find=CodeOff::find()->where(['price'=>0])->all();
            foreach ($find as $f){
                $f->price=$model->price;
                $f->save();
            }
            return $this->redirect(['index']);
        }


        return $this->render('update', [
            'model' => $model,
            'new'=>$new,
        ]);
    }

    /**
     * Deletes an existing CodeOff model.
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
     * Finds the CodeOff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CodeOff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CodeOff::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
