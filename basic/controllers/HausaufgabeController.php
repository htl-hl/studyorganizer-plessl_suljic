<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\Hausaufgabe;
use app\models\HausaufgabeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

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
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
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
        $user = Yii::$app->user->identity;
        
        if ($user->rolle === 'admin' || $user->rolle === 'lehrer') {
             $models = Hausaufgabe::find()->all();
        } else {
             $models = Hausaufgabe::find()->where(['benutzerkennung' => $user->benutzerkennung])->all();
        }

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
        $model = $this->findModel($hausaufgabenkennung);
        $this->checkAccess($model);
        return $this->render('view', [
            'model' => $model,
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
            if ($model->load($this->request->post())) {
                $model->benutzerkennung = Yii::$app->user->id;
                if ($model->save()) {
                    return $this->redirect(['view', 'hausaufgabenkennung' => $model->hausaufgabenkennung]);
                }
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
        $this->checkAccess($model);

        if ($model->erledigt) {
             \Yii::$app->getSession()->setFlash('error', "You can't change this anymore!");
             return $this->redirect(['index']);
        }

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
             return $this->redirect(['view', 'hausaufgabenkennung' => $model->hausaufgabenkennung]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
        $model = $this->findModel($hausaufgabenkennung);
        $this->checkAccess($model);
        $model->delete();

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

    protected function checkAccess($model)
    {
        $user = Yii::$app->user->identity;
        if ($user->rolle === 'admin' || $user->rolle === 'lehrer') {
            return true;
        }
        if ($model->benutzerkennung == $user->benutzerkennung) {
            return true;
        }
        throw new ForbiddenHttpException('You are not allowed to perform this action.');
    }
}
