<?php

namespace backend\controllers;

use Yii;
use common\models\Categs;
use backend\models\CategsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * CategsController implements the CRUD actions for Categs model.
 */
class CategsController extends Controller
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
     * Lists all Categs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categs model.
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
     * Creates a new Categs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categs();
        
        if ($model->load( Yii::$app->request->post() ) ) {
            $posts = Yii::$app->request->post(); 
             $model->file = UploadedFile::getInstances($model, 'file');
            
            $file_name = "";
            $time = time();
            
            foreach ($model->file as $file) {
             
                $file_name = $file->name . '_'.$time.'.' . $file->extension; 
               
                $path = $_SERVER['DOCUMENT_ROOT'].'/frontend/web/uploads/' . $file_name; 
               
                $file->saveAs( $path );
               
            }
            
            $posts['Categs']['categ_img'] =$file_name;  
            $model->file = $file_name;  
            $model->load($posts);

            $model->save();
          
             
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Categs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {


              $posts = Yii::$app->request->post(); 
              $model->file = UploadedFile::getInstances($model, 'file');
              $time = time();
              $file_name = "";
            
            foreach ($model->file as $file) {
             
                $file_name = $file->name . '_'.$time.'.' . $file->extension; 
               
                $path = $_SERVER['DOCUMENT_ROOT'].'/frontend/web/uploads/' . $file_name; 
               
                $file->saveAs( $path );
               
            }
            
            $posts['Categs']['categ_img'] =$file_name;  
            $model->file = $file_name;  
            $model->load($posts);

             $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Categs model.
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
     * Finds the Categs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
