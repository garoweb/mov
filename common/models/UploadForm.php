<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $categ_img;

    public $date; 

    public function rules()
    {
        return [
            [['categ_img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, zip', 'maxFiles' => 4],
            [['date'], 'required', 'message'=>'Please fill it']
        ];
    }

    public function upload()
    {
        if ($this->validate()) { 
            $filename = "";
            foreach ($this->categ_img as $file) {
                $filename .= $file->baseName . '.' . $file->extension."@";
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return $filename;
        } else {
            return false;
        }
    }
}