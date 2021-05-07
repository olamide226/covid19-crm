<?php

namespace app\controllers;

use Yii;
use app\models\Conversations;
use app\models\ConversationsSearch;
use app\models\ConversationsSlaSearch;
use app\models\ConversationsAdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// use yii\filters\AccessControl;
use webvimark\modules\UserManagement\components\GhostAccessControl as AccessControl;

/**
 * ConversationsController implements the CRUD actions for Conversations model.
 */
class ConversationsController extends Controller
{
    const ecrm_cat_id = 1; //loan reconciliation = 1 on ecrm_category table
    public $username;
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
            'access'=>[
              'class'=> AccessControl::classname(),
              'only'=>['create','update','view','index','delete','admin'],
              // 'rules'=>[
              // [
              //           'actions' => ['index','update','view','create'],
              //           'allow'=>true,
              //           'roles'=>['@']
              //     ],
              // [
              //           'actions' => ['delete','admin'],
              //           'allow'=>true,
              //           'roles'=>['admin']
              //     ],
              //   ]
            ],
        ];
    }

    /**
     * Lists all Conversations models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConversationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionAdmin()
    {
        $searchModel = new ConversationsAdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionSla()
    {
        $searchModel = new ConversationsSlaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('sla', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionEscalate($id)
    {
      if (!$id) {
        Yii::$app->session->setFlash('warning','Wrong ID');
        return $this->redirect(Yii::$app->request->referrer);
      }
    $esc = Yii::$app->db->createCommand("update ecrm_conversations a JOIN ecrm_sla s ON (a.category_id = s.category_id AND a.product_id = s.product_id AND a.fraud_status = s.is_fraud AND
	a.sla_urgency = s.is_urgent AND (a.sla_level + 1) = s.level)
	SET a.sla_id = s.id,
    a.sla_due_time = date_add(a.sla_due_time, INTERVAL s.duration HOUR),
    a.sla_level = s.level,
    a.cbflag = 'N'

    where a.ticket_status = 'open' AND a.id = $id")->execute();
    if ($esc) {
      Yii::$app->session->setFlash('success','Escalated Successfully');
        return $this->redirect(['sla']);
    }else {
      Yii::$app->session->setFlash('danger','Oops! NO matching SLA rule found. Try defining a new rule for this Case.');
    return $this->redirect(Yii::$app->request->referrer);
    }


    }

    /**
     * Displays a single Conversations model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionViewonly($id)
    {
        return $this->render('viewonly', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionSlaView($id)
    {
        return $this->render('sla-view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Conversations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Conversations();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          Yii::$app->session->setFlash('success','Info Logged Successfully');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Conversations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
          $model->user_id = Yii::$app->user->id;
          $model->cbflag = 'N';
          $model->save();
          Yii::$app->session->setFlash('success','Info Updated Successfully');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionSlaUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
          $model->user_id = Yii::$app->user->id;
          $model->cbflag = 'Y';
          $model->save();
          Yii::$app->session->setFlash('success','Info Updated Successfully');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('sla-update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Conversations model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Conversations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Conversations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Conversations::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
