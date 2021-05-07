<?php
$this->title = 'Chat';
use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
date_default_timezone_set('Africa/Lagos');

$db = Yii::$app->db; 
$current_user = Yii::$app->user->id;
$today = date('Y-m-d');
$chat = $db->createCommand("SELECT b.case_id as caseid, b.from_user as phone, a.customer_name as name, b.chat_message as msg, b.status as stat
                            FROM customer_chat b
                            join customer a on (a.customer_phone = b.from_user) 
                            where  date(b.chat_date) = date(now()) and  b.status in (1, 2) order by b.chat_date desc limit 1")
             ->queryAll();

$chatLog = $db->createCommand("SELECT * FROM `customer` where status = 0 order by chat_date desc limit 5")->queryAll();
    // $last_id = $db->getLastInsertID();
    // echo $last_id;
 ?>
<style>

.scrollbar {
margin-left: 0px;
float: left;
height: 300px;
width: 100%;
background: #fff;
overflow-y: scroll;
margin-bottom: 25px;
padding: 0px;
}

.scrollbar-primary::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-primary::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #4285F4; }
</style>
<div class="row">
    <div class="col-xs-5 col-sm-3">
        <!-- <div class="panel panel-success" style="height:480px">
            <div class="panel-heading">Chat</div> -->
            <!-- <div class="form-group">
                <input type="text" class="form-control" placeholder="Search by name" id="filter">
            </div> -->
            <!-- <div class="panel-body" id="list">
                <div class="list-group scrollbar scrollbar-primary"  style="height:350px">
                    <?php foreach ($chat as $chats): ?>
                        <li  class="list-group-item caseid" value="<?= $chats['caseid']; ?>" style="background-color:#00FF7F">
                            <ul>
                                <li><?= $chats['msg']; ?></li>
                                <li><small><?= '<b>Name:</b> '.$chats['name']; ?></small></li>
                                <li><small><?= '<b>Phone: </b> 0'.$chats['phone']; ?></small></li>
                                <li><small><em><?= '<b>CaseID:</b>'.' '.$chats['caseid']; ?></em></small></li>
                            </ul>
                        </li>
                    <?php endforeach; ?> 
                </div>
            </div>
        </div> -->
        <div class="panel panel-success" style="height:480px">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#chaLog">Chat Logs</a></li>
                <li><a data-toggle="tab" href="#mainChat">Chat</a></li>
            </ul>

            <div class="panel-body" id="list">
                <div class="list-group scrollbar scrollbar-primary"  style="height:400px">
                    <div class="tab-content">
                        <div id="chaLog" class="tab-pane fade in active hlist">
                            <?php foreach ($chatLog as $chatLogs): ?>
                                <li  class="list-group-item caseidhist" value="<?= $chatLogs['case_id']; ?>" style="background-color:#00FF7F">
                                    <ul>
                                        <li><?= '<b>Name:</b> '.$chatLogs['customer_name']; ?></small></li> 
                                        <li><small><?= '<b>Phone: </b> 0'.$chatLogs['customer_phone']; ?></small></li>
                                        <li><small><em><?= '<b>CaseID:</b>'.' '.$chatLogs['case_id']; ?></em></small></li>
                                    </ul>
                                </li>
                            <?php endforeach; ?> 
                        </div>
                        <div id="mainChat" class="tab-pane fade list">
                            <?php foreach ($chat as $chats): ?>
                                <li  class="list-group-item caseid" value="<?= $chats['caseid']; ?>" style="background-color:#00FF7F">
                                    <ul>
                                        <li><?= $chats['msg']; ?></li>
                                        <li><small><?= '<b>Name:</b> '.$chats['name']; ?></small></li>
                                        <li><small><?= '<b>Phone: </b> 0'.$chats['phone']; ?></small></li>
                                        <li><small><em><?= '<b>CaseID:</b>'.' '.$chats['caseid']; ?></em></small></li>
                                    </ul>
                                </li>
                            <?php endforeach; ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-4">
        <div id="chats"><div>

    </div>
</div>


<?php
$script = <<< JS

$(document).ready(function(){

    setInterval(function(){
		updateChat();
        listChecker();
        updateListCheckerHist();
	}, 5000);

    //fetch external chat box
    $('body').on('click', '.caseid', function () {
        var caseid = $(this).val();
        //var cphone = $('.cphone').val();

        console.log(caseid);
        $.get( "index.php?r=boi/statchat&caseId="  + caseid ,
        function( data ) {
            $("#chats").html(data);
        });
    });

    //fetch history external chat box
    $('body').on('click', '.caseidhist', function () {
        var caseidhist = $(this).val();
        //var cphone = $('.cphone').val();

        console.log(caseidhist);
        $.get( "index.php?r=boi/statchat&caseidhist="  + caseidhist ,
        function( data ) {
            $("#chats").html(data);
        });
    });

    //send agent chat to db 
    $('body').on('click', '.snd', function () {
        var msg = $('.msg').val();
        var msg_to = $('.cphone').val();
        var caseId = parseInt($('.case_id').val());
        console.log(msg+' '+msg_to+' '+caseId);

        $.get( "index.php?r=boi/statchat&msgto="  + msg_to + "&msgg=" + msg + "&caseID=" + caseId,
        function( data ) {
            $(".chat_area").html(data);
            // console.log(data);
        });

        $('.msg').val('');
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

    //key validation 
    $('body').on('keyup', '.msg', function () {

        if($('.msg').val() == '')
        {
            $(".snd").prop("disabled",true);
        }else{
            $(".snd").prop("disabled",false);
        }

    });

    //updating user chat
    function updateChat()
    {
        var msg_to = $('.cphone').val();
        var caseId = parseInt($('.case_id').val());

        $.get( "index.php?r=boi/updatechat&toUser="  +  msg_to + "&caseId=" + caseId,
        function( data ) {
            $(".chat_area").html(data);
        });
    }

    //check for new external chat
    function listChecker()
    {
        $.get( "index.php?r=boi/chatchecker",
        function( data ) {
            $(".list").html(data);
        });
    }

    //check for new chat
    function updateListCheckerHist()
    {
        $.get( "index.php?r=boi/chatcheckerhist",
        function( data ) {
            $(".hlist").html(data);
        });
    }

});

JS;
$this->registerJs($script);
?>