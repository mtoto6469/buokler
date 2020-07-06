
<?php use yii\helpers\Html;
use yii\widgets\ActiveForm;
$url=Yii::$app->urlManager;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="container">
    <h2>Basic Table</h2>

    <table class="table">
        <thead>
        <tr style="text-align: right">
            <td >نوع</td>
            <td >الویت</td>

        </tr>
        </thead>

        <?php
        if($mainapp!=null){
            foreach ($mainapp as $ma){

                ?>
                <tbody>
                <tr>

                    <td><?=$ma->type?></td>
                    <td><input type="text" class="form-controller" name="<?=$ma->id?>" >
                        <?php
                        if(isset($_SESSION[$ma->id])){
                            if($_SESSION[$ma->id]!=null){
                                echo '<span style="color: darkred">'.$_SESSION[$ma->id].'</span>';
                            }$_SESSION[$ma->id]=null;
                        }

                        ?>

                    </td>



                </tr>

                </tbody>
                <?php
            }
        }

        ?>



    </table>

<button class="btn btn-success">ثبت</button>
    <?php ActiveForm::end(); ?>

</div>