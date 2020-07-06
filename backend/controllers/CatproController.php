<?php

namespace backend\controllers;

use backend\models\Tblcategory;
use backend\models\TblcategoryProduct;
use backend\models\Tblproduct;
use Yii;
use backend\models\CatPro;
use backend\models\CatProSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatproController implements the CRUD actions for CatPro model.
 */
class CatproController extends Controller
{
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;
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
     * Lists all CatPro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatProSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CatPro model.
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
     * Creates a new CatPro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatPro();
        $cat=ArrayHelper::map(TblcategoryProduct::find()->where(['enabel_view'=>1])->all(),'id','name');
        $pro=ArrayHelper::map(Tblproduct::find()->where(['enabel_view'=>1])->all(),'id','name');

        if ($model->load(Yii::$app->request->post()) ) {
            $count=CatPro::find()->count();
            if($count>=4){
                $_SESSION['error33']='شما امکان درج بیشتر از 4 محصول را ندارید';
                return $this->render('create', [
                    'model' => $model,
                    'cat'=>$cat,
                    'pro'=>$pro,
                ]);
            }
           else{
               $model->id_pro=$_POST['CatPro']['name1'].','.$_POST['CatPro']['name2'].','.$_POST['CatPro']['name3'].','.$_POST['CatPro']['name4'];

               $model->save();
           }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'cat'=>$cat,
                'pro'=>$pro,
            ]);
        }
    }




    public function actionSend(){
        $model = new  Tblproduct();


        $query = $model->find()->where(['id_category'=>$_GET['search']])->andWhere(['enabel_view'=>1])->all();
        $count = $model->find()->where(['id_category'=>$_GET['search']])->andWhere(['enabel_view'=>1])->count();
        $find = '';
        if ($count>=1){

            $find .= ' <div class="form-group field-catpro-name1 has-success">';
            $find .= '<label class="control-label" for="catpro-name1">محصول1</label>';
            $find .= '<select id="catpro-name1" class="form-control" name="CatPro[name1]" aria-invalid="false">';
            for ($i = 0; $i < $count; $i = $i + 1) {
                $find .= '<option value="';
                $find .= $query[$i]->id;
                $find .= '">';
                $find .= $query[$i]->name;
                $find .= '</option>';
            }
            $find .= '</select><div class="help-block"></div></div>';




            $find .= ' <div class="form-group field-catpro-name2 has-success">';
            $find .= '<label class="control-label" for="catpro-name2">محصول2</label>';
            $find .= '<select id="catpro-name2" class="form-control" name="CatPro[name2]" aria-invalid="false">';
            for ($i = 0; $i < $count; $i = $i + 1) {
                $find .= '<option value="';
                $find .= $query[$i]->id;
                $find .= '">';
                $find .= $query[$i]->name;
                $find .= '</option>';
            }
            $find .= '</select><div class="help-block"></div></div>';






            $find .= ' <div class="form-group field-catpro-name3 has-success">';
            $find .= '<label class="control-label" for="catpro-name3">محصول3</label>';
            $find .= '<select id="catpro-name3" class="form-control" name="CatPro[name3]" aria-invalid="false">';
            for ($i = 0; $i < $count; $i = $i + 1) {
                $find .= '<option value="';
                $find .= $query[$i]->id;
                $find .= '">';
                $find .= $query[$i]->name;
                $find .= '</option>';
            }
            $find .= '</select><div class="help-block"></div></div>';






            $find .= ' <div class="form-group field-catpro-name4 has-success">';
            $find .= '<label class="control-label" for="catpro-name4">محصول4</label>';
            $find .= '<select id="catpro-name4" class="form-control" name="CatPro[name4]" aria-invalid="false">';
            for ($i = 0; $i < $count; $i = $i + 1) {
                $find .= '<option value="';
                $find .= $query[$i]->id;
                $find .= '">';
                $find .= $query[$i]->name;
                $find .= '</option>';
            }
            $find .= '</select><div class="help-block"></div></div>';
        }

        return ($find);
    }



    /**
     * Updates an existing CatPro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $cat=ArrayHelper::map(TblcategoryProduct::find()->where(['enabel_view'=>1])->all(),'id','name');
        $pro=ArrayHelper::map(Tblproduct::find()->where(['enabel_view'=>1])->all(),'id','name');

        if ($model->load(Yii::$app->request->post())) {
            $model->id_pro=$_POST['CatPro']['name1'].','.$_POST['CatPro']['name2'].','.$_POST['CatPro']['name3'].','.$_POST['CatPro']['name4'];

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'cat'=>$cat,
                'pro'=>$pro,
            ]);
        }
    }

    /**
     * Deletes an existing CatPro model.
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
     * Finds the CatPro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatPro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatPro::findOne($id)) !== null) {
            return $model;
        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
