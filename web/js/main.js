// used in the homepage
function showMenu() {
  $('.mymenu a').css('color','white');
  console.log('connected!');

  $('.jumbo').fadeOut(500, function(){$('.mymenu').fadeIn(500);  });
}
//used for enquiry modal
$('#enquiryModal').click(function () {
  $('#modal').modal('show').find('#modalContent').load($(this).attr('value'),true);
});
//used for Dta/Aggregator modal
$('#dtaModal').click(function () {
  $('#modal2').modal('show').find('#modalContent2').load($(this).attr('value'),true);
});

//function for showing total call count
function todayCount(){
  var pid = 1;
  $.get( "index.php?r=site/stats", { pid: pid })
      .done(function( data ) {
    $("#counter").html(data);
    });
}
//function for showing total call count
function todayCount2(){
  var pid = 1.1;
  $.get( "index.php?r=site/stats", { pid: pid })
      .done(function( data ) {
    $("#counter").html(data);
    });
}



function agentCount(){
  var pid = 2;
  $.get( "index.php?r=site/stats", { pid: pid })
      .done(function( data ) {
    $("#counter-agent").html(data);
    });
}
function agentCount2(){
  var pid = 2.1;
  $.get( "index.php?r=site/stats", { pid: pid })
      .done(function( data ) {
    $("#counter-agent").html(data);
    });
}
// setInterval('agentCount()', 30000);
