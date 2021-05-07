<?php

namespace app\controllers;

use Yii;
use app\models\Hgsf;
use app\models\HgsfSearch;
use app\models\Paylogs;
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
 * HgsfController implements the CRUD actions for Hgsf model.
 */
class HgsfController extends Controller
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
              // 'rules'=>[
              // [
              //           'actions' => ['index','view'],
              //           'allow'=>true,
              //           'roles'=>['@']
              //     ],
              // [
              //           'actions' => ['delete','create','update'],
              //           'allow'=> User::hasRole('supervisor') || User::hasRole('admin'),
              //           'roles'=>['@']
              //     ],
              //   ]
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
     * Lists all Hgsf models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HgsfSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
      return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
          $mydata = new Query;
          $mydata
             ->select('a.id, ticket_number, ticket_status, phone_no,
                      member_id, entry_category, association, amount_paid, date_paid, b.comments,
                      other_comment, fraud_status, c.username, d.source_name, agent_name, e.product_name,entry_date')
             ->from('hgsf_conversations a')
             ->innerJoin('user c','a.user_id=c.id')
             ->innerJoin('hgsf_product e','a.product_id=e.id')
             ->innerJoin('hgsf_comment b','a.comment_id=b.id')
             ->innerJoin('hgsf_entry_source d','a.entry_source_id=d.id')
             ->where("(DATE(entry_date) BETWEEN '{$start_date}' AND '{$end_date}')
             AND a.category_id = 1")
             ->all();
          $exporter = new CsvGrid([
              'dataProvider' => new ActiveDataProvider([
                  'query' => $mydata,
              ]),
          ]);
          $file_name = 'LoanRecon_Report_' . date('Y-m-d') . '.csv';
          return $exporter->export()->send($file_name);
    }
    if (isset($_POST['today_report'])){
          $mydata = new Query;
          $mydata
          ->select('a.id, ticket_number, ticket_status, phone_no,
                   member_id, entry_category, association, amount_paid, date_paid, b.comments,
                   other_comment, fraud_status, c.username, d.source_name, agent_name, e.product_name,entry_date')
           ->from('hgsf_conversations a')
             ->innerJoin('user c','a.user_id=c.id')
             ->innerJoin('hgsf_product e','a.product_id=e.id')
             ->innerJoin('hgsf_comment b','a.comment_id=b.id')
             ->innerJoin('hgsf_entry_source d','a.entry_source_id=d.id')
         ->where("DATE(entry_date) = CURDATE()
             AND a.category_id = 1")
             ->all();
          $exporter = new CsvGrid([
              'dataProvider' => new ActiveDataProvider([
                  'query' => $mydata,
              ]),
          ]);
          $file_name = 'LoanRecon_Report_' . date('Y-m-d') . '.csv';
          return $exporter->export()->send($file_name);
    }
  }
    /**
     * Displays a single Hgsf model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // This creates a model for conversations form to show under boi/view
        $calllogs = new Paylogs();
        if ($calllogs->load(Yii::$app->request->post())) {
            $calllogs->category_id = 4;
            $calllogs->user_id = Yii::$app->user->id;
            $calllogs->save(false);
            Yii::$app->session->setFlash('success','Info Logged Successfully');
            return $this->redirect(['view', 'id' => $id]);

        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'calllogs' => $calllogs,
        ]);
    }

    /**
     * Creates a new Hgsf model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hgsf();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Hgsf model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Hgsf model.
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
     * Finds the Hgsf model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hgsf the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hgsf::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

     //client/agent chat
     public function actionChat()
     {
         return $this->render('chat');
     }
     public function actionStatchat()
     {
         $this->layout = false;
         return $this->render('statchat');
     }
     public function actionUpdatechat()
     {
         $this->layout = false;
         return $this->render('updatechat');
     }
     public function actionChatchecker()
     {
         $this->layout = false;
         return $this->render('chatchecker');
     }
     public function actionChatcheckerhist()
     {
         $this->layout = false;
         return $this->render('chatcheckhist');
     }
     public function actionNotify()
    {
        $this->layout = false;
        return $this->render('notify');
    }
}
