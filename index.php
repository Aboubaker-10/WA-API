<!DOCTYPE html>
<html lang="en">
<head>
  <title>WA-API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>My First Bootstrap 4 Page</h1>
  <p>Resize this responsive page to see the effect!</p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">WA API Integration</a>
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
      <h5>Send Transactinal Messages through whatsapp</h5>
<form action="index.php" method="post">
  <div class="form-group">
    <label for="number">WA Number:</label>
    <input type="number" class="form-control" placeholder="Enter Number" id="number">
  </div>
  <div class="form-group">
    <label for="message">Message:</label>
    <input type="text" class="form-control" placeholder="Enter Message" id="message">
  </div>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Send</button>
</form>
    </div>
  </div>
</div>

<div class="text-center" style="margin-bottom:0;background:black;color:white;">
  <p>Design & Developed By : Aboubaker IT Solutions</p>
</div>

</body>
</html>

<?php

if (isset($_POST['submit'])){

  $phone = $_POST['number'];
  $message = $_POST['message'];
  $data = [
      'phone' => $phone, // Receivers phone
      'body' => $message, // Message
  ];
  $json = json_encode($data); // Encode data to JSON
  // URL for request POST /message
  $token = 'lcoko6c0rzr99br7';
  $instanceId = 'instance131200';
  $url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
  // Make a POST request
  $options = stream_context_create(['http' => [
          'method'  => 'POST',
          'header'  => 'Content-type: application/json',
          'content' => $json
      ]
  ]);
  // Send a request
  $result = file_get_contents($url, false, $options);
  print_r($result);

}

 ?>
