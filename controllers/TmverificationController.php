<?php
namespace app\controllers;

use Yii;
use app\models\Tmverification;
use app\models\TmverificationSearch;
use app\models\TmVerificationHistory;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\filters\AccessControl;

/**
 * TmverificationController implements the CRUD actions for Tmverification model.
 */
class TmverificationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login','error'],
			'allow' => true,
                    ],
                    [
                        'actions' => ['logout','verification' ,'chart','leaflet', 'index'],
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
        ];
    }

    /**
     * Lists all Tmverification models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TmverificationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tmverification model.
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
     * Creates a new Tmverification model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tmverification();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->candidateid]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

     public function actionChart()
    {
        return $this->render('chart');
    }

    public function actionVerification(){

        //search for agent phone number
        if (isset($_POST['agent_submit'])) {

            // throw new NotFoundHttpException('The requested page does not exist.');
            if (empty($_POST['candidate_phone'])){

                echo "<small>Please enter a phone no</small>";
                } else{
                $db = Yii::$app->db;
                $candidate_phone = $_POST['candidate_phone'];
                $id = $db->createCommand("SELECT id FROM tm_verification WHERE correct_phone = '{$candidate_phone}'")->queryOne();
                $id = $id['id'];
                $not_found = $id ? "" : 'Candidate not found!';
            }

        }

        //confirm if id returns an agent
        if (!isset($id) || !isset($not_found)) {
                $id = "";
                // $not_found = "";
            }


            //to update database
        if (isset($_POST['accept'])) {

            $idd = $_COOKIE["id"];
	    $conn = \Yii::$app->getDb();
            $user_id = yii::$app->user->id;

            if (isset($_POST['tm_reasons'])){
            $reason = empty($_POST['tm_reasons']) ? 0 : $_POST['tm_reasons'];
            } else {
            $reason = 0;
            }

            if (isset($_POST['valid'])) {
            $validator = implode(" ",$_POST['valid']);
            } else {
            $validator = "";
            }

	    //check if a candidate record has a status of 1 or 0
            $sql = ("SELECT id, status FROM tm_verification where id = {$idd}");
            $row = $conn->createCommand($sql)->queryAll();
            if ($row) {
            foreach ($row as $row) {
                $status = $row['status'];

                if($status == 1 || $status == 0){
                
		    $model = new TmverificationHistory();
                    $model->status = 1;
                    $model->user_id = yii::$app->user->id;
                    $model->save();
                    Yii::$app->session->setFlash('success','verified added');
                    return $this->redirect(['verification']);

                }else{
                    //save to db
                    $id = $conn->createCommand("UPDATE tm_verification SET status = 1, reason = $reason, valid_rating ='{$validator}', user_id = {$user_id} WHERE id = {$idd} ")->execute();

                    if(!$id){
                        Yii::$app->session->setFlash('danger','Not Saved');
                    } else{
                        Yii::$app->session->setFlash('success','Verified Successfully');
                        return $this->redirect(['verification']);
                    }
                }
            }}
        }

        if (isset($_POST['reject'])) {
          
            $idd = $_COOKIE["id"];
            $conn = \Yii::$app->getDb();
            $user_id = yii::$app->user->id;

            if (isset($_POST['tm_reasons'])){
            $reason = empty($_POST['tm_reasons']) ? 0 : $_POST['tm_reasons'];
            } else {
            $reason = 0;
            }

            if (isset($_POST['valid'])) {
            $validator = implode(" ",$_POST['valid']);
            } else {
            $validator = "";
            }

		//check if a candidate record has a status of 1 or 0
            $sql = ("SELECT status FROM tm_verification where id = {$idd}");
            $row = $conn->createCommand($sql)->queryAll();
            if ($row) {
            foreach ($row as $row) {
                $status = $row['status'];

                if($status == 1 || $status == 0){
                $model = new TmverificationHistory();

                //if ($model->load(Yii::$app->request->post())) {

                    $model->status = 0;
                    $model->user_id = yii::$app->user->id;
                    $model->save();
                    Yii::$app->session->setFlash('success','rejected added');
                    return $this->redirect(['verification']);
               // }
                }else{
                    //save to db
                    $id = $conn->createCommand("UPDATE tm_verification SET status = 0, reason = $reason, valid_rating ='{$validator}', user_id = {$user_id} WHERE id = {$idd} ")->execute();

                    if(!$id){
                        Yii::$app->session->setFlash('danger','Not Saved');
                    } else{
                        Yii::$app->session->setFlash('success','Rejected Successfully');
                        return $this->redirect(['verification']);
                    }
                }
            }}
        }

        if (isset($_POST['inconclusive'])) {
                $idd = $_COOKIE["id"];
                $conn = \Yii::$app->getDb();
                $date = date("Y-m-d h:i:sa");
                $user_id = yii::$app->user->id;
                if (isset($_POST['tm_reasons'])){
                $reason = empty($_POST['tm_reasons']) ? 0 : $_POST['tm_reasons']; 
                } else {
                $reason = 0;
                }
                if (isset($_POST['valid'])) {
                $validator = implode(" ",$_POST['valid']);
                } else {
                $validator = "";
                }
              
		$sql = ("SELECT status FROM tm_verification where id = {$idd}");
            	//send query to database
            	$row = $conn->createCommand($sql)->queryAll();
            	if ($row) {
            	foreach ($row as $row) {
                $status = $row['status'];

                if($status == 1 || $status == 0){
                $model = new TmverificationHistory();

                //if ($model->load(Yii::$app->request->post())) {

                    $model->status = 2;
                    $model->user_id = yii::$app->user->id;
                    $model->save();
                    Yii::$app->session->setFlash('success','Ongoing added');
                    return $this->redirect(['verification']);
               	// }
                }else{
                    //save to db
                   $id = $conn->createCommand("UPDATE tm_verification SET status = 2, reason = $reason, valid_rating ='{$validator}', user_id = {$user_id} WHERE id = {$idd} ")->execute();

                    if(!$id){
                        Yii::$app->session->setFlash('danger','Not Saved');
                    } else{
                        Yii::$app->session->setFlash('success','saved Successfully');
                        return $this->redirect(['verification']);
                    }
                }
            	}}
            }

		if (isset($_POST['voicemail'])) {

                $idd = $_COOKIE["id"];
                $conn = \Yii::$app->getDb();
                $user_id = yii::$app->user->id;
                if (isset($_POST['tm_reasons'])){
                $reason = empty($_POST['tm_reasons']) ? 0 : $_POST['tm_reasons'];
                } else {
                $reason = 0;
                }
                if (isset($_POST['valid'])) {
                $validator = implode(" ",$_POST['valid']);
                } else {
                $validator = "";
                }
		
		$sql = ("SELECT status FROM tm_verification where id = {$idd}");
                //send query to database
                $row = $conn->createCommand($sql)->queryAll();
                if ($row) {
                foreach ($row as $row) {
                $status = $row['status'];

                if($status == 1 || $status == 0){
                $model = new TmverificationHistory();

                //if ($model->load(Yii::$app->request->post())) {

                    $model->status = 3;
                    $model->user_id = yii::$app->user->id;
                    $model->save();
                    Yii::$app->session->setFlash('success','voicemail added');
                    return $this->redirect(['verification']);
                // }
                }else{
                    //save to db
                   $id = $conn->createCommand("UPDATE tm_verification SET status = 3, reason = $reason, valid_rating ='{$validator}', user_id = {$user_id} WHERE id = {$idd} ")->execute();

                    if(!$id){
                        Yii::$app->session->setFlash('danger','Not Saved');
                    } else{
                        Yii::$app->session->setFlash('success','saved Successfully');
                        return $this->redirect(['verification']);
                    }
                }
                }}


            }

	//flashcall
        if (isset($_POST['flashcall'])) {

            $idd = $_COOKIE["id"];
            $conn = \Yii::$app->getDb();
            $user_id = yii::$app->user->id;
            if (isset($_POST['tm_reasons'])){
            $reason = empty($_POST['tm_reasons']) ? 0 : $_POST['tm_reasons'];
            } else {
            $reason = 0;
            }
            if (isset($_POST['valid'])) {
            $validator = implode(" ",$_POST['valid']);
            } else {
            $validator = "";
            }
            

		$sql = ("SELECT status FROM tm_verification where id = {$idd}");
                //send query to database
                $row = $conn->createCommand($sql)->queryAll();
                if ($row) {
                foreach ($row as $row) {
                $status = $row['status'];

                if($status == 1 || $status == 0){
                $model = new TmverificationHistory();

                //if ($model->load(Yii::$app->request->post())) {

                    $model->status = 4;
                    $model->user_id = yii::$app->user->id;
                    $model->save();
                    Yii::$app->session->setFlash('success','flashcall added');
                    return $this->redirect(['verification']);
                // }
                }else{
                    //save to db
                   $id = $conn->createCommand("UPDATE tm_verification SET status = 4, reason = $reason, valid_rating ='{$validator}', user_id = {$user_id} WHERE id = {$idd} ")->execute();

                    if(!$id){
                        Yii::$app->session->setFlash('danger','Not Saved');
                    } else{
                        Yii::$app->session->setFlash('success','saved Successfully');
                        return $this->redirect(['verification']);
                    }
                }
                }}
	}
	return $this->render('verification', [
            'model' => !empty($id) ? $this->findModel($id) : "" ,
            // 'verify' => $verify,
            'not_found' => isset($not_found) ? $not_found : "",
        ]);

        return $this->render('verification');
    }



    /**
     * Updates an existing Tmverification model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->candidateid]);
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
               ->leftJoin('user c','a.user_id=c.id')
               ->leftJoin('ecrm_comment b','a.comment_id=b.id')
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
            ->leftJoin('user c','a.user_id=c.id')
            ->leftJoin('ecrm_comment b','a.comment_id=b.id')
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
     * Deletes an existing Tmverification model.
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
     * Finds the Tmverification model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tmverification the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tmverification::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
