<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\Hausaufgabe;
use app\models\HausaufgabeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HausaufgabeController implements the CRUD actions for Hausaufgabe model.
 */
class HausaufgabeController extends Controller
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
     * Lists all Hausaufgabe models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $userId = Yii::$app->user->id;
        $models = Hausaufgabe::find()->where(['benutzerkennung' => $userId])->all();

        return $this->render('index', [
            'models' => $models,
        ]);
    }

    /**
     * Displays a single Hausaufgabe model.
     * @param int $hausaufgabenkennung Hausaufgabenkennung
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($hausaufgabenkennung)
    {
        return $this->render('view', [
            'model' => $this->findModel($hausaufgabenkennung),
        ]);
    }

    /**
     * Creates a new Hausaufgabe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Hausaufgabe();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'hausaufgabenkennung' => $model->hausaufgabenkennung]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Hausaufgabe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $hausaufgabenkennung Hausaufgabenkennung
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($hausaufgabenkennung)
    {
        $model = $this->findModel($hausaufgabenkennung);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save() && $model->erledigt == false) {
            return $this->redirect(['view', 'hausaufgabenkennung' => $model->hausaufgabenkennung]);
        }
        if ($model->erledigt == false) {
            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            \Yii::$app->getSession()->setFlash('error', "You can't change this anymore!");
            return $this->redirect(['index']);
        }

    }

    /**
     * Deletes an existing Hausaufgabe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $hausaufgabenkennung Hausaufgabenkennung
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($hausaufgabenkennung)
    {
        $this->findModel($hausaufgabenkennung)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Hausaufgabe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $hausaufgabenkennung Hausaufgabenkennung
     * @return Hausaufgabe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($hausaufgabenkennung)
    {
        if (($model = Hausaufgabe::findOne(['hausaufgabenkennung' => $hausaufgabenkennung])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
