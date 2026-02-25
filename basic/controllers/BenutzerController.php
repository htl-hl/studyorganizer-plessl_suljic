<?php

namespace app\controllers;

use app\models\Benutzer;
use app\models\Benutzersearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BenutzerController implements the CRUD actions for Benutzer model.
 */
class BenutzerController extends Controller
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
     * Lists all Benutzer models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new Benutzersearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Benutzer model.
     * @param int $benutzerkennung Benutzerkennung
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($benutzerkennung)
    {
        return $this->render('view', [
            'model' => $this->findModel($benutzerkennung),
        ]);
    }

    /**
     * Creates a new Benutzer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Benutzer();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'benutzerkennung' => $model->benutzerkennung]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Benutzer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $benutzerkennung Benutzerkennung
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($benutzerkennung)
    {
        $model = $this->findModel($benutzerkennung);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'benutzerkennung' => $model->benutzerkennung]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Benutzer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $benutzerkennung Benutzerkennung
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($benutzerkennung)
    {
        $this->findModel($benutzerkennung)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Benutzer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $benutzerkennung Benutzerkennung
     * @return Benutzer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($benutzerkennung)
    {
        if (($model = Benutzer::findOne(['benutzerkennung' => $benutzerkennung])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
