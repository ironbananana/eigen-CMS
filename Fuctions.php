<?php

function send_welcome_email_to_new_user($user_id) {
    $user = get_userdata($user_id);
    $user_email = $user->user_email;

    $user_full_name = $user->user_firstname . $user->user_lastname;

    $to = $user_email;
    $subject = "Welcome" . $user_full_name . ", to our site!";
    $body = '
              <h1>Dear ' . $user_full_name . ',</h1></br>
              <p>Thank you for joining our site. Your account is now active.</p>
              <p>have fun looking at the messages.</p>
              <p>Let us know if you have further questions, we am here to help.</p>
              <p>Enjoy the rest of your day!</p>
              <p>Kind Regards,</p>
              <p>NCTQ mangement ;/p>
    ';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    if (wp_mail($to, $subject, $body, $headers)) {
      error_log("email has been successfully sent to user whose email is " . $user_email);
    }else{
      error_log("email failed to sent to user whose email is " . $user_email);
    }
  }

  ?>