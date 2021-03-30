<?php

$error = "";
$successMessage = "";

if ($_POST) {

    if (!$_POST["email"]) {
        $error .= "An email address is required.<br>";
    }

    if (!$_POST["subject"]) {
        $error .= "An subject is required.<br>";
    }


    if (!$_POST["content"]) {
        $error .= "An content is required.<br>";
    }

    if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
        $error .= "An email address is required.<br>";
    }

    if ($error != "") {
        $error = '<div class="alert alert-danger" role="alert">' . $error . '</div>';
    } else {
        $emailTo = "salvatore.telesco@email.it";
        $subject = $_POST['subject'];
        $content = $_POST['content'];
        $headers = "From: " . $_POST['email'];

        if (mail($emailTo, $subject, $content, $headers)) {
            $successMessage = '<div class="alert alert-success" role="alert">' . "Email sent" . '</div>';
        } else {
            $error = '<div class="alert alert-danger" role="alert">' . "Email not sent" . '</div>';
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit= no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
</head>

<body>



    <div class="container">

        <h1>Form</h1>

        <div id="error">
            <? echo $error.$successMessage; ?>
        </div>

        <form method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('form').submit(function(e) {

            let error = "";

            if ($('#email').val() == "") {
                error += "<p>The email is required</p>"
            }

            if ($('#subject').val() == "") {
                error += "<p>The subject is required</p>"
            }

            if ($('#subject').val() == "") {
                error += "<p>The content is required</p>"
            }

            if (error != "") {
                $('#error').html('<div class="alert alert-danger" role="alert">' + error + '</div>');
                return false;
            } else {
                return true;
            }
        })
    </script>


</body>

</html>