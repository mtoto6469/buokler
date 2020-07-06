<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Uploadimages extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
   

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'extensions' => 'png, jpg', 'maxFiles' =>2],
           
        ];
    }

    public function upload()
    {
        $id=null;
        if($this->imageFiles!=null){
            if ($this->validate()) {
                foreach ($this->imageFiles as $file) {

                    $file->saveAs(Yii::getAlias('@upload') . '/upload/'  . $file->baseName . '.' . $file->extension);

                    $id.=$file->baseName . '.' . $file->extension.'*';
                }
                return $id;
            } else {
                return $id;
            }
        }else{
            return $id;
        }

    }
}