<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
// use webvimark\modules\UserManagement\components\GhostAccessControl as AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use webvimark\modules\UserManagement\models\User;

class SiteController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','reports','stats','vreports'],
                'rules' => [
                    [
                        'actions' => ['index','stats','reports'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // [
                    //     'actions' => ['reports','recovery-reports'],
                    //     'allow' => User::hasRole('supervisor') || User::hasRole('admin'),
                    //     'roles' => ['@'],
                    // ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
    //   $this->layout = 'front_pageLayout';
      return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
     public function actionLogin()
     {
          $this->layout = 'loginLayout';
         if (!\Yii::$app->user->isGuest) {
             return $this->goHome();
         }

         $model = new LoginForm();
         if ($model->load(Yii::$app->request->post()) && $model->login()) {
             return $this->goBack();
         } else {
             return $this->render('login', [
                 'model' => $model,
             ]);
         }
     }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

  //controller responsible for handling reports
    public function actionStats()
    {
        return $this->renderAjax('stats');
    }
  //controller responsible for handling reports
    public function actionReports()
    {
        return $this->render('reports');
    }

    public function actionVreports()
    {
        return $this->render('vreports');
    }
	  //controller responsible for handling recovery analysis reports
     public function actionRecoveryReports()
     {
        return $this->render('recovery-reports');
     }

     //main chat controllers
    public function actionAchat()
    {
        return $this->renderAjax('achat');
    }
    public function actionUsersChat()
    {
        return $this->render('users-chat');
    }
    public function actionUpdateChat()
    {
        return $this->renderAjax('update-chat');
    }
    public function actionNotify()
    {
        return $this->renderAjax('notify');
    }
    public function actionRecentchat(){
      return $this->renderAjax('recentchat');
    }
    public function actionChatajax()
    {
        return $this->renderAjax('chatajax');
    }
    //index Ajax
    public function actionAjax()
    {
        return $this->renderAjax('ajax');
    }

}
