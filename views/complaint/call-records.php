
<div class="table">
    <hr><div class="header"><h4>Call Logs For Current Customer</h4></div>

    <table class='table table-striped' cellspacing="0">
       <tr>
          <th width="100">Date Called</th>
          <th>User</th>
          <th width="250"> Comments</th>
          <th width="250">Other Comment</th>
          <th>Response</th>
       </tr>

  <?php
  //while($row) {
   if ($data) {
     foreach ($data as $row) {
       // code...
  ?>
       <tr>
      <td><?php $mytime = $row['entry_date']; echo date("M jS, Y", strtotime($mytime)); ?></td>
          <td><?php echo $row['usernam']; ?></td>
          <td><?php echo $row['comments']; ?></td>
          <td><?php echo $row['other_comment']; ?></td>
          <td><?php echo $row['cc_agent_response']; ?></td>
       </tr>


  <?php }} else{ echo "<h3 style='color:red;'>No Previous Record Found!!</h3>"; } ?>
    </table>
