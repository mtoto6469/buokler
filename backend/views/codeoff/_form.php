<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CodeOff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="code-off-form">

    <?php $form = ActiveForm::begin(); ?>

    <span onclick="add()" class="btn btn-warning">افزودن کد تخفیف</span>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <table class="table" id="res">
        <thead>
        <tr class="text-right">
            <th scope="col">#</th>
            <th scope="col">کد</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>

            <?php
            $i=1;
            if($new!=null){
            foreach ($new as $n) {

            echo '
<tbody>
        <td >
<th scope="row">' . $i . '</th>
        <td>'.$n->code.'</td>
        <td><i class="fa fa-trash" onclick="deletec('.$n->id.')"></i></td>
                </td>

        </tbody>';
        $i++;
        }
        }?>

    </table>





    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script>
    function add() {
        $.ajax({
            type: 'POST',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('codeoff/find') ?>',
            success:function (data) {
                $('#res').html(data);
            }
        });
    }
</script>
<script>
    function deletec(id) {
        $.ajax({
            type: 'GET',
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('codeoff/findde') ?>',
            data: {id: id},
            success:function (data) {
                $('#res').html(data);
            }
        }); 
    }
</script>