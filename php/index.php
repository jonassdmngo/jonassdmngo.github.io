<?php
$result= "";
error_reporting(E_ALL);

ini_set('display_errors', 1);
ini_set('log_errors', 1);

if (isset($_POST['submit'])) {
  require'PHPMailerAutoload.php';

  $mail = new PHPMailer(true);
  $mail->Host='smtp.gmail.com';
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  // $mail->Port=465;
  $mail->Port=587;

  $mail->SMTPAuth=true;
  $mail->SMTPSecure='TLS';
   $mail->IsSMTP();
  $mail->Username='jonassdmngo@gmail.com';
  $mail->Password='xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';

  $mail->setFrom($_POST['email'],$_POST['name']);
  // $mail->addAddress('jonassdmngo@gmail.com');
  $mail->addAddress('jonassdmngo@gmail.com');

  $mail->addReplyTo($_POST['email'],$_POST['name']);

  $mail->isHTML(true);
  $mail->Subject='Form Submission: ' .$_POST['subject'];
  $mail->Body='<h1 align=center>Name :'.$_POST['name'].'<br>Email: ' .$_POST['email'].'<br>Message: '.$_POST['msg'].'</h1>';

  if(!$mail->send()){
    $result="OOPS";
  }
  else{
    $result="OKAY!SENT".$_POST['name']." for messeging ";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>ContactUs</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary">we can hear from you</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"> <?=$result; ?> </h5>
        <form action="" method="post" id="form-box" class="p-2">
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
            </div>
            <textarea name="msg" id="msg" class="form-control" placeholder="Write your message" cols="30" rows="4" required></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Send">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>