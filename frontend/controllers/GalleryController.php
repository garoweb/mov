<?php

namespace frontend\controllers;
use common\models\Gallery;


class GalleryController extends \yii\web\Controller
{
    public function actionIndex()
    {
       return $this->render('index');
    }

    public function actionCurrentItems($id = "")
    {
    	
    	if(empty($id))
    		$data =  array('error'=>'No Data is avalibale');
    	else
    		$data = Gallery::GetCurrentItems($id); 
    	return $this->render('items', ['data'=>$data]);
    	 
       

    }

    

}
