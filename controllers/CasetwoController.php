<?php

namespace app\controllers;

use Yii;
use app\models\Casetwo;
use app\models\Boi;
use app\models\EcrmConversations;
use app\models\EcrmConversationsSearch;
use app\models\CasetwoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// use yii\filters\AccessControl;
use webvimark\modules\UserManagement\components\GhostAccessControl as AccessControl;
use yii2tech\csvgrid\CsvGrid;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use webvimark\modules\UserManagement\models\User;
/**
 * CasetwoController implements the CRUD actions for Casetwo model.
 */
class CasetwoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
          'access'=>[
            'class'=> AccessControl::classname(),
            'only'=>['create','update','view','index','delete'],
          //   'rules'=>[
          //   [
          //             'actions' => ['index','update','view','create'],
          //             'allow'=>true,
          //             'roles'=>['@']
          //       ],
          //   [
          //             'actions' => ['delete'],
          //             'allow'=> User::hasRole('Admin'),
          //             'roles'=>['@']
          //       ],
              // ]
          ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

        ];
    }

    /**
     * Lists all Casetwo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CasetwoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Casetwo model.
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
    public function actionSlaView($id)
    {
        return $this->render('sla-view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Casetwo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id=0)
    {
        $get_boi_rec = Boi::findOne($id); //transfer data from boi to dta
        $model = new Casetwo();

        if ($model->load(Yii::$app->request->post() )) {
          $model->user_id = Yii::$app->user->id;
          $model->save(false);
          $model->save();
          Yii::$app->session->setFlash('success','Info Logged Successfully');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if (Yii::$app->request->isAjax){
        return $this->renderAjax('create', [
            'model' => $model,
            'get_boi_rec' => $get_boi_rec,
        ]);}
        if (!Yii::$app->request->isAjax){
        return $this->render('create', [
            'model' => $model,
            'get_boi_rec' => $get_boi_rec,
        ]);}

    }

    /**
     * Updates an existing Casetwo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

            $model->user_id = Yii::$app->user->id;
            $model->cbflag = 'N';
            $model->save();
          Yii::$app->session->setFlash('success','Info Logged Successfully');
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


    // this fetches records from the db and returns it thru ajax
    public function actionDtaRecords(){
      $myvar = $_REQUEST['q'];
      $query = new Query;
      $query
         ->select('a.id, a.ticket_status, a.ticket_number, a.entry_date, c.comments, a.cc_agent_response,b.username, unix_timestamp(a.updated_date) edate')
         ->from('ecrm_conversations a')
         ->innerJoin('user b','user_id = b.id')
         ->innerJoin('ecrm_comment c','a.comment_id = c.id')
         ->where("a.phone_no like '{$myvar}' AND a.category_id in (2,3,7)   ")
         ->orderBy('a.entry_date desc')
         ->limit(5);
         $rows = $query->all();
      return $this->renderAjax('dta-records', [
             'data' => $rows,
         ]);

    }

    /**
     *
     * Report Generator using extension (use yii2tech\csvgrid\CsvGrid)
     * documentation at https://github.com/yii2tech/csv-grid
     */
    public function actionExcel()
    {

      if (isset($_POST['submit'])){

          $start_date = $_POST['start_date'];
          $end_date = $_POST['end_date'];
          $app_source = $_POST['app_source'];
          if ($app_source == 'dta'){
          $file_name = 'Dta_Report_' . date('Y-m-d') . '.csv';
          $cat_id = 2;
        } elseif($app_source == 'aggregator') {
          $file_name = 'Agg_Report_' . date('Y-m-d') . '.csv';
          $cat_id = 3;
        }else {
            $file_name = 'Tm_existing_applcnts_Report_' . date('Y-m-d') . '.csv';
            $cat_id = 7;
        }
          $mydata = new Query;
          $mydata
          ->select('a.id, ticket_status, ticket_number,customer_name, phone_no, c.category_name, association,d.comments,
                   other_comment, cc_agent_response, cc_agent_action, e.source_name, agent_name,
                  agent_phone_no, entry_date, b.username')
          ->from('ecrm_conversations a')
          ->leftJoin('user b','user_id=b.id')
          ->leftJoin('ecrm_category c','a.category_id=c.id')
          ->leftJoin('ecrm_comment d','a.comment_id=d.id')
          ->leftJoin('ecrm_entry_source e','a.entry_source_id=d.id')
             ->where("(DATE(entry_date) BETWEEN '{$start_date}' AND '{$end_date}')
             AND a.category_id = {$cat_id}")
             ->all();
          $exporter = new CsvGrid([
              'dataProvider' => new ActiveDataProvider([
                  'query' => $mydata,
              ]),
          ]);

          return $exporter->export()->send($file_name);
    }
    if (isset($_POST['today_report'])){
          $mydata = new Query;
          $app_source = $_POST['app_source'];
          if ($app_source == 'dta'){
          $file_name = 'Dta_Report_' . date('Y-m-d') . '.csv';
          $cat_id = 2;
        } elseif($app_source == 'aggregator') {
          $file_name = 'Agg_Report_' . date('Y-m-d') . '.csv';
          $cat_id = 3;
        } else {
          $file_name = 'Tm_existing_applcants_Report_' . date('Y-m-d') . '.csv';
          $cat_id = 7;
        }
          $mydata
          ->select('a.id,ticket_number,ticket_status, customer_name, phone_no, c.category_name, association,d.comments,
                   other_comment, cc_agent_response, cc_agent_action, entry_source_id, agent_name,
                  agent_phone_no, entry_date, b.username')
          ->from('ecrm_conversations a')
          ->innerJoin('user b','user_id=b.id')
          ->innerJoin('ecrm_category c','a.category_id=c.id')
          ->innerJoin('ecrm_comment d','a.comment_id=d.id')
             ->where("DATE(entry_date) = CURDATE()
             AND a.category_id = {$cat_id}")
             ->all();
          $exporter = new CsvGrid([
              'dataProvider' => new ActiveDataProvider([
                  'query' => $mydata,
              ]),
          ]);
        //   if ($app_source == 'dta'){
        //   $file_name = 'Dta_Report' . date('Y-m-d') . '.csv';
        // } elseif($app_source == 'agg') {
        //   $file_name = 'Agg_Report' . date('Y-m-d') . '.csv';
        // }else {
        //   // code...
        // }
          return $exporter->export()->send($file_name);
    }
  }

    /**
     * Deletes an existing Casetwo model.
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
     * Finds the Casetwo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Casetwo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Casetwo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Oops! The requested page does not exist.');
    }
}
