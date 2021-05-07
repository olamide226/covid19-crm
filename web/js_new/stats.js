console.log('welcome to the jungle');

//**************************** LIVE SIDEBAR COUNTERS **********************************
//show realtime summary for the day Note that function names that start with a 'v' are used for verification
function rtSummary(){
  const pid = 1.5;
  $.get( "index.php?r=site/stats", { pid: pid })
	    .done(function( data ) {
		$("#rtSummary").html(data);
	  });
}
function vrtSummary(){
  const pid = 1.6;
  $.get( "index.php?r=site/stats", { pid: pid })
	    .done(function( data ) {
		$("#vrtSummary").html(data);
	  });
}
//daily Summary for the day showing agent count, product type count and source count
function dailySummary(){
  const pid = 2.5;
  $.get( "index.php?r=site/stats", { pid: pid })
	    .done(function( data ) {
		$("#dailySum").html(data);
	  });
}
function vdailySummary(){
  const pid = 2.9;
  $.get( "index.php?r=site/stats", { pid: pid })
	    .done(function( data ) {
		$("#vdailySum").html(data);
	  });
}

function pad(val) {
	var valString = val + "";
	if (valString.length < 2) {
		return "0" + valString;
	} else {
		return valString;
	}
}

//fetch data using ajax call from the url below
function fetch_data(pid) {
  var stime = new Date(); // start time

  var sdate = document.getElementById('w0').value;
  var edate = document.getElementById('w1').value;


    //call the url using jquery's ajax
      $.ajax({
       url: 'index.php?r=site/stats&pid=' + pid,
       type: 'get',
       data: { sdate:sdate, edate:edate},
       beforeSend: function(){
        // Show image container
        $("#loader").show();
       },
       fail: function(xhr, textStatus, errorThrown){
           alert('request failed ' + xhr.responseText);
         },
       success: function(response){
         //populate with data
         $("#result").html(response);
          var etime = new Date();
          console.log('stime is ' + stime);
          console.log('etime is ' + etime);
          var interval = (etime-stime); // Difference in milliseconds.
          console.log(interval);
          var totalSeconds = (interval/1000);
          console.log(totalSeconds);
          if (totalSeconds < 60 ) {
            $("#time").html('Query took '+pad(totalSeconds)+' seconds');
          }else {
            $("#time").html('Query took : '+pad(parseInt(totalSeconds / 60))+' minutes : '+pad(parseInt(totalSeconds % 60))+' seconds');
          }
       },
       complete:function(){
        // Hide image container
        $("#loader").hide();
       }
  });
}

//Set the title and change button id
function change_title(title, button_id) {
    return function () {
    $('#dashboard').find('h3').text(title);
    $('#run_report').html("<button class= 'btn-save' id = '" + button_id + "' >Run Report</button>");
    $("#minutes, #time, #result").html('');
    }
}
//this changes the header of each report title and button id
$('#perDay').click(change_title('Call Count Per Day', 'perDayList'));

$('#perCategory').click(change_title('Call per Category','perCategoryList'));

$('#perAsso').on('click',change_title('Count Per Association', 'perAssoList'));

$('#perSubA').on('click',change_title('Call Count Per Sub-Aggregators', 'perSubAList'));

$('#perSource').on('click',change_title('Call Count Per Source', 'perSourceList'));

$('#perAgent').on('click',change_title('Call Count Per Agent', 'perAgentList'));

$('#perLoanRec').on('click',change_title('Loan Record Issue', 'perLoanRecList'));

$('#perComplain').on('click',change_title('Issues Per Category', 'perComplainList'));

$('#perGComp').on('click',change_title('General Complaints', 'perGCompList'));

$('#perFraud').on('click',change_title('Suspected Fraud List', 'perFraudList'));

$('#outbound').on('click',change_title('Outbound Call Report', 'outboundList'));

//changes the header for the verification report
$('#vperDay').click(change_title('Outgoing Daily Report', 'vperDayList'));
$('#vperMonth').click(change_title('Outgoing Monthly Report', 'vperMonthList'));
$('#vperAgent').click(change_title('Calls and Agent Report', 'vperAgentList'));

//for recovery analysis
$('#cPerDay').click(change_title('Call Count', 'callPerDay'));
$('#amtRecovery').click(change_title('Amount Recovered', 'amtrecover'));
$('#paid').click(change_title('Total Count of Paid', 'amtpaid'));
$('#paidState').click(change_title('Count of Paid per State', 'amtpaidState'));
$('#paidReg').click(change_title('Count of Paid per Region', 'amtpaidReg'));
$('#paidLoc').click(change_title('Count of Paid per Location', 'amtpaidLoc'));
$('#paidPayType').click(change_title('Count of Paid per PaymentType', 'amtpaidPayType'));
$('#paidGen').click(change_title('Count of Paid per Gender', 'amtpaidGen'));
$('#paidTT').click(change_title('Count of Paid per TradeType', 'amtpaidTT'));
$('#paidBackll').click(change_title('Count of Beneficiaries Payback', 'paidBackwill'));



/**************************** REPORT LIST FUNCTIONS **********************************/


//displaying fetched result
$('#run_report').click(function (event) {
  switch ($('#run_report').children().attr('id')) {
    //each case represents a unique button_id
    case 'perDayList':
      fetch_data(pid=4);
      break;
    case 'vperDayList':
      fetch_data(pid=4.5);
      break;
    case 'vperMonthList':
      fetch_data(pid=4.6);
      break;

    case 'amtrecover':
    fetch_data(pid=16);
    break;
    case 'amtpaid':
    fetch_data(pid=17);
    break;
    case 'amtpaidState':
    fetch_data(pid=18);
    break;
    case 'amtpaidReg':
    fetch_data(pid=19);
    break;
    case 'amtpaidLoc':
    fetch_data(pid=20);
    break;
    case 'amtpaidPayType':
    fetch_data(pid=21);
    break;
    case 'amtpaidGen':
    fetch_data(pid=22);
    break;
    case 'amtpaidTT':
    fetch_data(pid=23);
    break;
    case 'paidBackwill':
    fetch_data(pid=24);
    break;
    case 'callPerDay':
    fetch_data(pid=25);
    break;


    case 'perCategoryList':
      fetch_data(pid=5);
      break;


    case 'perAssoList':
      fetch_data(pid=6);
      break;


    case 'perSubAList':
      fetch_data(pid=7);
      break;


    case 'perSourceList':
      fetch_data(pid=8);
      break;


    case 'perAgentList':
      fetch_data(pid=9);
      break;
    case 'vperAgentList':
      fetch_data(pid=9.5);
      break;


    case 'perLoanRecList':
      fetch_data(pid=10);
      break;


    case 'perComplainList':
      fetch_data(pid=11);//issues per category
      break;


    case 'perGCompList':
      fetch_data(pid=12);//general complaints
      break;


    case 'perFraudList':
      fetch_data(pid=13);
      break;


    case 'outboundList':
      fetch_data(pid=14);
      break;


    default:
    alert('oops! No id was set on the button');
  }
});

console.log('end of the jungle');
