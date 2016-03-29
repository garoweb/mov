<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mov_gallery".
 *
 * @property integer $id
 * @property string $item_parent_id
 * @property string $item_name
 * @property string $item_img
 * @property string $item_status
 * @property string $item_order
 */
class Gallery extends \yii\db\ActiveRecord
{
    
    public $file = "";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mov_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_parent_id', 'item_name', 'item_status', 'item_order'], 'required'],
            [['item_parent_id', 'item_name', 'item_img', 'item_status', 'item_order'], 'string', 'max' => 255],
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
            'item_parent_id' => 'Item Parent ID',
            'item_name' => 'Item Name',
            'item_img' => 'Item Img',
            'item_status' => 'Item Status',
            'item_order' => 'Item Order',
            'file'=>'Images',
        ];
    }

    public function GetCurrentItems($id)
    {
         $full_conetnt =  Gallery::find()
                                        ->where(['item_parent_id' => $id, 'item_status' => 1])
                                        ->all();
        $deliver_data = array();
        foreach ($full_conetnt  as $key => $v) {
          //Cleaning object 
          $Items = array(
                            'id'=>$v['id'], 
                            'categ_img'=>$v['item_img'],
                            'categ_name'=>$v['item_name'], 
                        );
            $deliver_data[] =  $Items;
        }
        return $deliver_data;
    }
}
