<?php

namespace frontend\controllers;
use common\models\Categs;

class CategsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionList()
    {
    	//Array -> List of main categs 
    	// id -> categ_name
    	$categs = Categs::FullCategListContent();
    	return $this->render('list', ['data'=>$categs]);
    }

}
