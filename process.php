<?php


//Email Validation

    $email = htmlspecialchars($_POST['email']);
    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
    {
      die("We're Sorry, but something went wrong please check it over and try again.");
    }

  //Function Check to Eliminate Unwanted Characters, Strips Quotes, and Adds HTMLSpecialCharacters

    function check_input($data, $problem='')
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      if ($problem && strlen($data) == 0)
      {
         die($problem);
      }
      return $data;
    }

  //Spammer Check

    $email = urldecode($email);
    if (eregi("\r",$email) || eregi("\n",$email))
    {
      die("Spammer Detected");
    }

  //Sends Email and Forwards to Thank You Page

    mail( "preshesgirl@yahoo.com", $subject, $message, "From: $name <$email>" );
    header( "Location: thankyou.php" );

?>