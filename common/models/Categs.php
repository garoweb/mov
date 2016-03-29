<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mov_categs".
 *
 * @property integer $id
 * @property string $categ_name
 * @property string $categ_img
 * @property string $categ_status
 * @property string $categ_order
 */
class Categs extends \yii\db\ActiveRecord
{
    
    public $file = "";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mov_categs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categ_name', 'categ_status', 'categ_order'], 'required'],
            [['categ_name', 'categ_img', 'categ_status', 'categ_order'], 'string', 'max' => 255],
            //['file'], 'file'],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categ_name' => 'Categ Name',
            'categ_img' => 'Categ Img',
            'categ_status' => 'Categ Status',
            'categ_order' => 'Categ Order',
            'file'=>'Images',
        ];
    }

    

    public function FullCategList()
    {
        $list = Categs::find()->all();
        $full_list = array();
        foreach ($list as $key => $v) {
            $full_list[$v['id']] = $v['categ_name'];
        }

        return  $full_list; 

    }

    public function FullCategListContent()
    {
        
        $full_conetnt =  Categs::find()->all();
        $deliver_data = array();
        foreach ($full_conetnt  as $key => $v) {
          //Cleaning object 
          $Items = array(
                            'id'=>$v['id'], 
                            'categ_name'=>$v['categ_name'],
                            'categ_img'=>$v['categ_img'], 
                        );
            $deliver_data[] =  $Items;
        }

        return  $deliver_data;
       
    }
    
}
