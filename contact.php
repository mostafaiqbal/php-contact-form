<?php
    $error = "";
    $success = "";

    if(filter_has_var(INPUT_POST, 'submit')) {
         
        if(!$_POST['name']) {
            $error .= "Name is missing <br>";
          
        }
        if(!$_POST['email']) {
            $error .= "Email is missing <br>";
        }
        if(!$_POST['phone']) {
            $error .= "Phone Number is missing <br>";
        }
        if(!$_POST['message']) {
            $error .= "Message is missing <br>";
        }         
        if($error!="") {
            $error = '<div class="alert alert-danger" role="alert"> <p><strong>Please enter missing detai(s):</strong></p>'. $error.'</div>';
         } else {
            $emailTo = "youremail@yourdomain.com";
            $subject = "Message from Customer";
            $content .= "Customer Name: ". $_POST['name']."\n"."\n";
            $content .= "Phone Number: ". $_POST['phone']."\n"."\n";
            $content .= "Email Address: ". $_POST['email']."\n"."\n";
            $content .= $_POST['message']."\n"."\n";
            $headers = "From: ".$_POST['email'];

            if(mail($emailTo, $subject, $content, $headers)){
                $success = '<div class="alert alert-success" role="alert"> Thank you for contacting us. We have received your email. We will get in touch at soonest possbile time. </div>';
            } else {

                $error .= '<div class="alert alert-danger" role="alert"> <p><strong>Email Failed. Please try again later. </strong></p></div>';
            }

         }

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
       /*h1 {
           margin-top: 100px;
           text-align: center;
       }*/
       #form {
        margin: auto;
        width: 35%;
        margin-top: 15px;
       }
       .form-control {
        border-radius: 8px;
       }
    </style>

    <title>Contact Us</title>
  </head>
  <body>
    <div class="container" id="form"> 
        <div><?php echo $error.$success ?>  </div>       
        <h1> Contact Us</h1> 
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="number" name="phone" class="form-control" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control"  rows="5" placeholder="Your Message"></textarea>
            </div>
                            
            <button type="submit" name="submit" class="btn btn-primary">Send Email</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>