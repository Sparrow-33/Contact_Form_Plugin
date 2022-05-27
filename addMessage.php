<?php

global $wpdb;
if(isset($_POST['submit'])){

  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $tablename = $wpdb->prefix."plugin";

  if($email != '' && $subject != '' && $message != ''){
     $data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE email='".$email."' ");
     if(count($data) == 0){
       $insert = "INSERT INTO ".$tablename."(email,subject,message) values('".$email."','".$subject."','".$message."') ";
       $wpdb->query($insert);
       echo "Sent sucessfully.";
     }
   }
}

?>
<h1 style="text-align:center;">Add New Message</h1>
<div class="" style="display:flex; justify-content:center;">
<form method='post' action=''>
  
    <input type='email' id="email" name='email' style="padding:1em 2em ; border:solid 1px black; border-radius:5px;  " placeholder="Email .."> <br><br>
    <input type='text' id="subject" name='subject' style="padding:1em 2em ; border:solid 1px black; border-radius:5px;  " placeholder="Subject .."><br><br>
 
    <input type='text' id="mssg" name='message' style="padding:1em 2em ; border:solid 1px black; border-radius:5px; " placeholder="Message .."><br><br>
    <span>&nbsp;</span>
    <input type='submit' style="padding: 0.5em 2em; background:#0EA5E9; border:none; border-radius:100vh; color:aliceblue; font:500; border-radius:5px; " name='submit' value='Send'>
 
</form>
</div>

<script >
  // first name
  var email = document.getElementById('email');
  // var input_fname = document.getElementById('input_fname');
  const email_display = localStorage['email'];
  email.style.display = email_display;
  // input_fname.removeAttribute('required');
  var subject = document.getElementById('subject');
  // var input_fname = document.getElementById('input_fname');
  const sub_display = localStorage['subject'];
  subject.style.display = sub_display;
  var mssg = document.getElementById('mssg');
  // var input_fname = document.getElementById('input_fname');
  const mssg_display = localStorage['message'];
  mssg.style.display = mssg_display;
</script>