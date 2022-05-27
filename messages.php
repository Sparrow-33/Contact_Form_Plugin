
<?php

global $wpdb;
$tablename = $wpdb->prefix."plugin";
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$id);
}
?>
<h1>All Messsages</h1>

<table width='100%' border='1' style='border-collapse: collapse;'>
  <tr>
   <th>Id</th>
   <th>email</th>
   <th>Subject</th>
   <th>Message</th>
   <th>&nbsp;</th>
  </tr>
  <?php

  $messagesLists = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
  if(count($messagesLists) > 0){
    $count = 1;
    foreach($messagesLists as $message){
      $id = $message->id;
      $email = $message->email;
      $subject = $message->subject;
      $message = $message->message;

      echo "<tr>
      <td>".$count."</td>
      <td>".$email."</td>
      <td>".$subject."</td>
      <td>".$message."</td>
     <td><form action='' method='POST'>
        <input type='text' name='id' value='$id' hidden> 
        <button type='submit' class='btn btn-danger' name=''>Delete</button>
      </form></td> 
      </tr>
      ";
      $count++;
   }
 }else{
   echo "<tr><td colspan='5'>No Messages</td></tr>";
 }
?>
</table>