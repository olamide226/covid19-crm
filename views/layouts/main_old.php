<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MainAsset;
use yii\helpers\Url;
use webvimark\modules\UserManagement\models\User;

date_default_timezone_set('Africa/Lagos');

$db = Yii::$app->db;
$current_user = Yii::$app->user->id;
$today = date('Y-m-d');

$agents = $db->createCommand("SELECT * FROM user WHERE id !='{$current_user}' and status = 1 and full_name !='' order by login_status desc")
             ->queryAll();

$chat = $db->createCommand("SELECT b.case_id as caseid, b.from_user as phone, a.customer_name as name, b.chat_message as msg, b.status as stat
FROM customer_chat b
join customer a on (a.customer_phone = b.from_user)
where  date(b.chat_date) = date(now()) and  b.status in (1, 2) order by b.chat_date desc limit 1")
->queryAll();

$chatLog = $db->createCommand("SELECT * FROM `customer` where status = 0 and agent_id = '{$current_user}'order by chat_date desc limit 5")->queryAll();

// for test purpose
$agntId = '';
foreach($agents as $agnt)
{
  $agntId = $agnt['last_name'];
}
// end of test purpose
$agent_output = $agntId ;
$notiffy = $db->createCommand("SELECT b.last_name aname, a.from_user_id sender, count(a.status) stats FROM chat_message a
                              join user b on (b.id = a.from_user_id)
                              where a.status = 1 and a.to_user_id = '{$current_user}' group by 1,2")->queryAll();

$recent_chat = $db->createCommand("SELECT distinct
                                    least(to_user_id, from_user_id) as value1,
                                    greatest(to_user_id, from_user_id) as value2
                                    from chat_message
                                    where to_user_id = '{$current_user}' or from_user_id = '{$current_user}'")
                  ->queryAll();

MainAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="<?= Yii::getAlias('@web')?>/images/ebislogo1.jpg" rel="shortcut icon" type="image/x-icon">
</head>
<body>
<?php $this->beginBody() ?>
<?php include 'style.php'; ?>
<div class="container-scroller" style=" background-color:#32CD32;">
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar  col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color:#228B22; ">
    <div class=" text-center navbar-brand-wrapper" style="background-color:; ">
      <a class="navbar-brand brand-logo" href="<?= Url::home(true) ?>" style="color:#fff; ">C I M S</a>
      <a class="navbar-brand brand-logo-mini" href="<?= Url::home(true) ?>" style="color:#fff; background-color:#228B22; font-size:20px;">CIMS</a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center" style="background-color:#2F4F4F; ">
      <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
        <span class="navbar-toggler-icon" style="color:#fff; "></span>
      </button>

      <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
        <?php if(!Yii::$app->user->isGuest && User::hasRole('Admin') || User::hasRole('supervisor')): ?>
          <li class="nav-item">
            <!-- notification bell -->
            <a href="index.php?r=conversations/sla&sort=sla_due_time" style="color:#ffffff;"  aria-expanded="true">
              <span class="label label-pill label-danger count" style="border-radius:10px; font-size:8px;"></span>
              <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span>
            </a>
          </li>
        <?php endif; ?>

        <li class="nav-item"><?= Html::img('@web/images/grl_wrk.gif', ['alt'=>Yii::$app->user->identity->last_name,'style'=>'height:50px;']) ?></li>

        <li class="nav-item user-icon">
            <?= 'Welcome'.' '.Yii::$app->user->identity->last_name; ?>
            <i class="fas fa-user-circle " style="font-size:20px; padding-left:5px;"></i>
        </li>
      </ul>

      <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon" style="color:#228B22;"></span>
      </button>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-right" style="background-image: linear-gradient(45deg, #32CD32, #32CD32);">
      <!-- partial:partials/_sidebar.html -->

      <?php if (!Yii::$app->user->isGuest && (User::hasRole('supervisor') || User::hasRole('boiBackendTeam'))): ?>
      <?php include 'supervisor-view.php' ?>
      <?php endif; ?>

      <?php if (Yii::$app->user->id > 1 && User::hasRole('basicUserRole')): ?>
      <?php include 'basic-view.php'; ?>
      <?php endif; ?>

      <?php if (!Yii::$app->user->isGuest && User::hasRole('Admin')): ?>
      <?php include 'admin-view.php'; ?>
      <?php endif; ?>

      <div><?php include 'modal.php'; ?></div>

      <div class="content-wrapper">
        <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content; ?>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <p class="pull-left">&copy; EBIS <?= date('Y') ?></p>
        <span>
          <center><a href="<?php echo Yii::$app->request->baseUrl; ?>/../cms" target="_blank" >EBIS NEWS HUB</a></center>
        </span>
    </div>
  </footer>
  <!-- widget starts here -->

  <ul class="btn-list">
  <button class="bttn danger open-btn notification" onclick="openExternal()"><i class="fa fa-comments"></i><br><span id="txt">External</span>
  <div id="extnotify" class="extnotify"></div>
  </button>

  <button class="bttn danger open-button notification" onclick="openInternal()"><i class="fa fa-comments"></i><br><span id="txt">Internal</span>
    <div id="notify" class="notify"></div>
  </button>

  <!-- <button class="open-btn" onclick="openExternal()">External Chat</button> -->
  <!-- <button class="open-button" onclick="openInternal()">Internal Chat</button> -->
  </ul>
  <!-- External chat begins -->
  <div class="chat-popup" id="myClient">
    <div class="row form-container">
      <div class="col-xs-12 col-sm-5" style="background-color:#2F4F4F; padding-right:0">
        <div class="" style="height:480px; margin-right:0px;">
          <ul class="nav nav-tabs">
              <li><a data-toggle="tab" href="#chaLog">Chat Logs</a></li>
              <li class="active"><a data-toggle="tab" href="#mainChat">Chat</a></li>
          </ul>

          <div class="list-group scrollbar scrollbar-primary"  style="height:400px">
            <div class="tab-content">
              <div id="chaLog" class="tab-pane fade  hlist">
                <?php foreach ($chatLog as $chatLogs): ?>
                  <li  class="list-group-item caseidhist" value="<?= $chatLogs['case_id']; ?>" style="background-color:#4285F4; color:#fff">
                    <p><small><?= '<b>Name:</b> '.$chatLogs['customer_name']; ?></small><br>
                    <small><?= '<b>Phone: </b> 0'.$chatLogs['customer_phone']; ?></small><br>
                    <small><em><?= '<b>CaseID:</b>'.' '.$chatLogs['case_id']; ?></em></small></p>
                  </li>
                <?php endforeach; ?>
              </div>

              <div id="mainChat" class="tab-pane fade in active list">
                <?php foreach ($chat as $chats): ?>
                <li  class="list-group-item caseid" value="<?= $chats['caseid']; ?>" style="background-color:#4285F4; color:#fff">
                  <p><small><?= '<b>Name:</b> '.$chats['name']; ?></small><br>
                    <small><?= '<b>Phone: </b> 0'.$chats['phone']; ?></small><br>
                    <small><?= '<b>Message:</b> '.$chats['msg']; ?></small><br>
                    <small><em><?= '<b>CaseID:</b>'.' '.$chats['caseid']; ?></em></small>
                  </p>
                </li>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

        </div>
        <button type="button" class="btn-cancel btn btn-success btn-block" onclick="closeExternal()">close</button>
      </div>

      <div class="col-xs-12 col-sm-7" style="background-color:#DCDCDC; opacity:0.8; padding-left:0;">
        <div id= "extchat"></div>
      </div>
    </div>
  </div>

  <!-- End of External chat -->
  <!-- Internal chat begins-->
  <div class="chat-popup" id="myForm">


      <div class="row form-container">
        <div class="col-xs-12 col-sm-5" style="background-color:#2F4F4F; padding-right:0">
          <div class="" style="height:480px margin-right:0px; border-radius:25px; padding-top:10px;">
          <!-- nav-tab toggle buttons -->
          <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#agents">Agents</a></li>
          </ul>

          <div class="form-group">
              <input type="text" class="form-control" placeholder="Search Name" id="filter" style="background-color:#C0C0C0; opacity:1;">
          </div>
          <div class="" id="list" >
            <div class="list-group scrollbar scrollbar-primary"  style="height:350px;background-color:#2F4F4F; overflow: auto;">
              <!-- nav-tab content -->
              <div class="tab-content">
                <!-- nav-tab content: agent list-->
                <div id="agents" class="tab-pane fade in active">
                  <?php foreach ($agents as $agent): ?>
                    <a href="#" style="color:#228B22; background-color:#2F4F4F;">
                      <li class="list-group-item agents" value="<?=$agent['id']?>" style="color:#fff; background-color:#2F4F4F;">

                        <i class="fa fa-user-circle " style="font-size: 20px;"></i>
                        <?= $agent['last_name'] ?>
                        <?php
                          if($agent['login_status'] == 1)
                          {
                            echo Html::img('@web/images/online.png', ['class'=>'pull-right']);
                          }else{
                            echo Html::img('@web/images/offline.png', ['class'=>'pull-right']);
                          }

                           $output_notice = '';
                            foreach($notiffy as $value)
                            {
                              if($value['aname'] === $agent['last_name'] && $value['stats'] > 0)
                              {
                                $output_notice = '<div class="notify pull-right"></div>';
                              }else{
                               $output_notice = '';
                              }
                            }
                            echo $output_notice;
                        ?>
                      </li>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button type="button" class="btn-cancel btn-block" onclick="closeInternal()">close</button>
      </div>
      <div class="col-xs-12 col-sm-7" style="background-color:#DCDCDC; opacity:0.8; padding-left:0;">
        <div id="chat"><div>
      </div>

  </div>

  </div>
  <!-- End of internal chat -->
  <!-- widget ends here -->

</div>
<script>

  function openInternal(){
    document.getElementById("myForm").style.display="block";
  }
  function closeInternal(){
    document.getElementById("myForm").style.display="none";
  }
  function closeExternal(){
    document.getElementById("myClient").style.display="none";
  }
  function openExternal(){
    document.getElementById("myClient").style.display="block";
  }

</script>
<?php
$script = <<< JS

$(document).ready(function(){

    setInterval(function(){
     update_chat();
     notification();

    // chatcheckerhist();
    // updateChat();
    // listChecker();
    // extnotify_newchat();
	}, 5000);

  // externalchat begin here

  //fetch external chat box
    $('body').on('click', '.caseid', function () {
      var caseid = parseInt($(this).val());
      //var cphone = $('.cphone').val();
      console.log(caseid);
      //alert(caseid);
      $.get( "index.php?r=boi/statchat", {caseId:caseid} ,
      function( data ) {
          $("#extchat").html(data);
      });
    });

    //send agent chat to db
    $('body').on('click', '.extsnd', function () {
      var msg = $('.extmsg').val();
      var msg_to = $('.cphone').val();
      var caseId = parseInt($('.case_id').val());
      console.log(msg+' '+msg_to+' '+caseId);

      $.get( "index.php?r=boi/statchat", {msgto:msg_to,msgg:msg,caseID:caseId},
      function( data ) {
          $(".chatty").html(data);
          // console.log(data);
      });

      $('.extmsg').val('');
    });

    //end chat
    $('body').on('click', '.endChat', function () {

      $(this).prop("disabled",true);
      var caseId = parseInt($('.case_id').val());

      $.get( "index.php?r=boi/statchat&endChat="  + caseId,
      function( data ) {
          // console.log(data);
      });

      $('.jerk').html('');
    });

    //check for new external chat
    function listChecker()
    {
        $.get( "index.php?r=boi/chatchecker",
        function( data ) {
            $(".list").html(data);
        });
    }

    //fetch history external chat box
    $('body').on('click', '.caseidhist', function () {
        var caseidhist = $(this).val();
        //var cphone = $('.cphone').val();

        console.log(caseidhist);
        $.get( "index.php?r=boi/statchat&caseidhist="  + caseidhist ,
        function( data ) {
            $("#extchat").html(data);
        });
    });


    //send key validation
    $('body').on('keyup', '.extmsg', function () {

      if($('.extmsg').val() == '')
      {
          $(".extsnd").prop("disabled",true);
      }else{
          $(".extsnd").prop("disabled",false);
      }

    });

   //updating user chat
   function updateChat()
    {
        var msg_to = $('.cphone').val();
        var caseId = parseInt($('.case_id').val());

        $.get( "index.php?r=boi/updatechat",{toUser:msg_to,caseId:caseId},
        function( data ) {
            $(".chatty").html(data);
        });
    }

    //update chat history list
    function chatcheckerhist()
    {
        $.get( "index.php?r=boi/chatcheckerhist",
        function( data ) {
            $(".hlist").html(data);
        });
    }

    //show is typing
    $('body').on('focus', '.extmsg', function () {

        var is_type = 1;
        $.get( "index.php?r=boi/statchat&isType=" + is_type,
        function( ) {

        });
      });

      //not typing
      $('body').on('blur', '.extmsg', function () {

        var is_type = 0;
        $.get( "index.php?r=boi/statchat&isNotype=" + is_type,
        function(  ) {
        });
      });

       //notification
    function extnotify_newchat()
    {
      var caseId = parseInt($('.case_id').val());
      console.log(caseId);
      // $.get( "index.php?r=boi/notify&caseId=" + caseId,
      $.get( "index.php?r=boi/notify",
      function( data ) {
          $(".extnotify").html(data);
      });
    }
    // function extnotify_ongoingchat()
    // {

    // }
  // external chat ends here


  // internal chat begins here

    //filter agent
    $('#filter').keyup(function(){

        var value = $(this).val();

        $.get( "index.php?r=site/achat&filter="  + value,
        function( data ) {
            $("#list").html(data);
        });
    });


    //fetch agent internal chat box
    $('body').on('click', '.agents', function () {
        var agntId = parseInt($(this).val());

        $.get( "index.php?r=site/achat&agentId="  + agntId,
        function( data ) {
            $("#chat").html(data);
        });
    });

    //key validation
    $('body').on('keyup', '.msg', function () {

      if($('.msg').val() == '')
      {
          $(".snd").prop("disabled",true);
      }else{
          $(".snd").prop("disabled",false);
      }

    });

    //show typing
    $('body').on('focus', '.msg', function () {
      var agntId = parseInt($('.agents').val());
      var is_type = '1';

      console.log(agntId);
        $.get( "index.php?r=site/achat",{is_type:is_type, agtId:agntId},
        function(  ) {
        });
    });

    $('body').on('blur', '.msg', function () {
      var agntId = parseInt($('.agents').val());
      var is_type = '0';
      $.get( "index.php?r=site/achat",{is_type:is_type, agtId:agntId},
      function(  ) {
      });
    });


    //send agent chat to db
    $('body').on('click', '.snd', function () {
      var msg = $('.msg').val();
      var msg_to = $('.agentID').val();
      //console.log(msg+msg_to);

      $.get( "index.php?r=site/achat",{msgto:msg_to, msgg:msg },
      function( data ) {
          $(".chat_area").html(data);
          // console.log(data);
      });

      $('.msg').val('');
    });

    //updating user chat
    function update_chat()
    {
      var msg_to = $('.agentID').val();

      $.get( "index.php?r=site/update-chat&msgto="  +  parseInt(msg_to),
      function( data ) {
          $(".chat_area").html(data);
      });
    }
    //notification
    function notification()
    {
        $.get( "index.php?r=site/notify",
        function( data ) {
            $(".notify").html(data);
        });
    }

    $('body').on('blur', '.chat_area', function () {
        $('html, body').animate({ scrollTop: $('.chat_area').scrollTop()}, 1000);
    });

});

JS;
$this->registerJs($script);
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
