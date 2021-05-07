<?php

namespace app\controllers;

use Yii;
use app\models\TradermoniOutgoing;
use app\models\TradermoniOutgoingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii2tech\csvgrid\CsvGrid;
use yii\data\ActiveDataProvider;

/**
 * TradermoniOutgoingController implements the CRUD actions for TradermoniOutgoing model.
 */
class TradermoniOutgoingController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all TradermoniOutgoing models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TradermoniOutgoingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TradermoniOutgoing model.
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

    /**
     * Creates a new TradermoniOutgoing model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TradermoniOutgoing();

        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
        Yii::$app->session->setFlash('success','Info Logged Successfully');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TradermoniOutgoing model.
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
          $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

//exports to excel
public function actionExcel()
{

  if (isset($_POST['submit'])){

            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $mydata = new Query;
            $mydata
               ->select('a.id, customer_name, phone_no,
                        b.comments, other_comment, c.username, entry_date')
               ->from('ecrm_conversations a')
               ->innerJoin('user c','a.user_id=c.id')
               ->innerJoin('ecrm_comment b','a.comment_id=b.id')
               ->where("(DATE(entry_date) BETWEEN '{$start_date}' AND '{$end_date}')
               AND a.category_id = 6")
               ->all();
            $exporter = new CsvGrid([
                'dataProvider' => new ActiveDataProvider([
                    'query' => $mydata,
                ]),
            ]);
            $file_name = 'TraderMoni_outgoing_Report_' . date('Y-m-d') . '.csv';
            return $exporter->export()->send($file_name);
      }
      if (isset($_POST['today_report'])){
            $mydata = new Query;
            $mydata
            ->select('a.id, customer_name, phone_no,
                     b.comments, other_comment, c.username, entry_date')
            ->from('ecrm_conversations a')
            ->innerJoin('user c','a.user_id=c.id')
            ->innerJoin('ecrm_comment b','a.comment_id=b.id')
           ->where("DATE(entry_date) = CURDATE()
               AND a.category_id = 6")
               ->all();
            $exporter = new CsvGrid([
                'dataProvider' => new ActiveDataProvider([
                    'query' => $mydata,
                ]),
            ]);
            $file_name = 'TraderMoni_outgoing_Report_' . date('Y-m-d') . '.csv';
            return $exporter->export()->send($file_name);
      }
}



    /**
     * Deletes an existing TradermoniOutgoing model.
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
     * Finds the TradermoniOutgoing model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TradermoniOutgoing the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TradermoniOutgoing::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
