<?php
  // $servername = "localhost";
  // $username = "u518613657_root";
  // $password = "password";
  // $dbname = "u518613657_root";

  $servername = "localhost";
  $username = "root";
  $password = "password";
  $dbname = "marketgadsubscription"; 

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  function val($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if (isset($_POST["submit"])) {
    $email = val($_POST["email"]);
  }

  if ($email != null) {
    $sql = "INSERT INTO subscription (email)
    VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Thanks for your Time";
    } else {
      $d = 'Duplicate';
      if (preg_match("/{$d}/i", $conn->error)) {
        echo "Already Subscribed Thank You!";
      } else {
        echo "Please give a valid input";
      }

    }
  }
  $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MarketGad</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="tagline">
        <h1><b>Want to take the big leap?</b></h1>
      </div>
      <div class="join" >
        <button 
          id="myBtn"
          style="background: #6f4037;"
          class="btn waves-effect waves-light modal-trigger subscribe"
        >
          <b>Subscribe us</b>
        </button>
        <div id="myModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
           <div>
                <form action="index.php" method="POST" id="submit-form">
                    <input type="email" placeholder="Enter your e-mail id" name="email" required/>
                    <button style="background: green;"class="wave-effect waves-light btn submit" name="submit" type="submit" value="submit" id="submit">Submit Email Id</button>
                </form>
            </div>
          </div>
        </div>
        <div class="logo">
          <img src="F4.png" alt="logo" />
        </div>
        <div class="tag">
          <p>
            <b
              >59% startups fail due to the lack of proper Market research and
              analysis.</b
            >
            <br />
            <b>Gear up to conquer the market with Us!</b> 
          </p>
        </div>
        <div class="coming">
          <p>
            <i>Coming Soon...</i>
          </p>
        </div>
      </div>
      </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
