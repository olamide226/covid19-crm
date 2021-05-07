<?php

namespace app\controllers;

use Yii;
use app\models\Caterer;
use app\models\CatererSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
// use yii\filters\AccessControl;
use webvimark\modules\UserManagement\components\GhostAccessControl as AccessControl;
use yii2tech\csvgrid\CsvGrid;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * CatererController implements the CRUD actions for Caterer model.
 */
class CatererController extends Controller
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
            'access'=>[
              'class'=> AccessControl::classname(),
              'only'=>['delete','create','update','index','view'],
              // 'rules'=>[
              // [
              //           'actions' => ['index','update','view','create'],
              //           'allow'=>true,
              //           'roles'=>['@']
              //     ],
              // [
              //           'actions' => ['delete'],
              //           'allow'=>true,
              //           'roles'=>['admin']
              //     ],
              //   ]
            ],
        ];
    }

    /**
     * Lists all Caterer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatererSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Caterer model.
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
    public function actionCallRecords()
    {
      $myvar = $_REQUEST['q'];
      $conn = \Yii::$app->getDb();
      $sql = sprintf("SELECT a.ticket_number,a.entry_date, concat(b.first_name, ' ', b.last_name) usernam, c.comments,a.other_comment, a.cc_agent_response, a.sub_category
      	 FROM ecrm_conversations a
      	 join user b on (a.user_id = b.id)
      	 join ecrm_comment c	on (a.comment_id = c.id)
      	 WHERE a.phone_no = '%s' AND a.category_id = 3

      	 ORDER BY entry_date desc LIMIT 5", $myvar);
      //send query to database
      $rows = $conn->createCommand($sql)->queryAll();

      return $this->renderAjax('call-records', [
             'data' => $rows,
         ]);
    }

    /**
     * Creates a new Caterer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Caterer();

        if ($model->load(Yii::$app->request->post()) ) {
          $model->category_id = 3;
          $model->user_id = Yii::$app->user->id;
          $model->save();
          Yii::$app->session->setFlash('success','Info Logged Successfully');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if (!Yii::$app->request->isAjax){
        return $this->render('create', [
            'model' => $model,
        ]);}
        if (Yii::$app->request->isAjax){
        return $this->renderAjax('create', [
            'model' => $model,
        ]);}
    }

    /**
     * Updates an existing Caterer model.
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
          $model->save();
          Yii::$app->session->setFlash('success','Info Logged Successfully');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

// export reports to excel
public function actionExcel()
{

        if (isset($_POST['submit'])){

            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $mydata = new Query;
            $mydata
               ->select('customer_name, phone_no,
                         association, b.comments,
                        other_comment, cc_agent_response, c.username, e.category_name, d.source_name, f.product_name,entry_date')
               ->from('ecrm_conversations a')
               ->innerJoin('user c','a.user_id=c.id')
               ->innerJoin('ecrm_comment b','a.comment_id=b.id')
               ->innerJoin('ecrm_entry_source d','a.entry_source_id=d.id')
               ->innerJoin('ecrm_category e','a.category_id=e.id')
               ->innerJoin('ecrm_product f','a.product_id=f.id')
               ->where("(DATE(entry_date) BETWEEN '{$start_date}' AND '{$end_date}')
               AND a.category_id = 3")
               ->all();
            $exporter = new CsvGrid([
                'dataProvider' => new ActiveDataProvider([
                    'query' => $mydata,
                ]),
            ]);
            $file_name = 'Caterer_Report_' . date('Y-m-d') . '.csv';
            return $exporter->export()->send($file_name);
      }
}
    /**
     * Deletes an existing Caterer model.
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
     * Finds the Caterer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Caterer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Caterer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
