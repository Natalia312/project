<?php

namespace common\modules\news\controllers;

use Yii;
use common\modules\news\models\News;
use common\modules\news\models\searches\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use common\modules\roles\models\ACLRole;

use yii\web\UploadedFile;
use common\components\helpers\Upload;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{

    /**
     * Lists all News models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single News model.
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
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new News();

        if ($model->load(Yii::$app->request->post()) ) {
            if(($fileInstanse = UploadedFile::getInstance($model, 'img')))
            {   
                $model->img = Upload::file($fileInstanse, 'news', true);
                  }
                   if($model->save()){
                     return $this->redirect(['view', 'id' => $model->ID]);
                }              
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

      if ($model->load(Yii::$app->request->post()) ) {
            if(($fileInstanse = UploadedFile::getInstance($model, 'img')))
            {   
                $model->img = Upload::file($fileInstanse, 'news', true);
                  }
                   if($model->save()){
                     return $this->redirect(['view', 'id' => $model->ID]);
                }              
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
          
            ]);
        }
  }

    /**
     * Deletes an existing News model.
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
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
