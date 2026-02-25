<?php

namespace app\controllers;

use app\models\Fach;
use app\models\Fachsearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FachController implements the CRUD actions for Fach model.
 */
class FachController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Fach models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new Fachsearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fach model.
     * @param int $fachkennung Fachkennung
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($fachkennung)
    {
        return $this->render('view', [
            'model' => $this->findModel($fachkennung),
        ]);
    }

    /**
     * Creates a new Fach model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Fach();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'fachkennung' => $model->fachkennung]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fach model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $fachkennung Fachkennung
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($fachkennung)
    {
        $model = $this->findModel($fachkennung);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'fachkennung' => $model->fachkennung]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fach model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $fachkennung Fachkennung
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($fachkennung)
    {
        $this->findModel($fachkennung)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fach model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $fachkennung Fachkennung
     * @return Fach the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($fachkennung)
    {
        if (($model = Fach::findOne(['fachkennung' => $fachkennung])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
