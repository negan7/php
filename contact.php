<?php

define("TITLE", "Contact us!");

include('includes/header.php');
?>

<div id="contact">
    
    <hr>
    
    <h1>Get in touch with us</h1>
    
    <?php
    
    // check for header injections
    
    function has_header_injection($str) {
        return preg_match("/[\r\n]", $str);
    }
    
    if (isset ($_POST['contact_submit'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $msg = $_POST['message'];
    
        // check to see header injection
        if (has_header_injection($name) || has_header_injection($email)) {
            die(); // if true kill the script
        }
        
        if (!$name || !$email || !$msg) {
            echo '<h4 class="error">All fields are required</h4><a href="contact.php" class="button block">Go back and try again</a>';
            exit();
            
        }
        // add the recipient email
        $to = "myemail@mail.ru";
        
        //create a subject
        $subject = "$name sent you a message via your contact form";
        
        //construct the message
        $message = "Name: $name\r\n";
        $message .= "Email: $email\r\n";
        $message .= "Message:\r\n$msg";
        
        //if the subscribe box was checked
        
        if (isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe') {
            // add a nea line to the $message
            
            $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
        
        }
        
        $message = wordwrap($message, 72);
        
        // Set the mail headers to a var
        
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: $name <$email>\r\n";
        $headers .= "X-priority: 1\r\n";
        $headers .= "X-MSMail-Priority: HIgh\r\n\r\n";
        
        
        // Send email
        
        mail($to, $subject, $message, $headers);
    
           
    
    ?>
    
    <!--- Show success message after email was sent -->
    <h5>Thanks for contacting!</h5>
    <p>Please allow 24 hours for the response</p>
    <p><a href="index.php" class="button block">&laquo; Go to home page</a></p>
    
    <?php } else { ?>
    
    <form method="post" action="" id="contact-form">
        
        <label for="name">Your name</label>
        <input type="text" id="name" name="name">
        
        <label for="email">Your email</label>
        <input type="email" id="email" name="email">
        
        <label for="message">Your message for us</label>
        <textarea id="message" name="message"></textarea>>
        
        <input type="checkbox" id="subscribe" name="subscribe" value="Subscribe">   
        <label for="subscribe">Subscribe to our newsletter</label>
             
        <input type="submit" class="button next" name="contact_submit" value="Send Message">
        
    </form>>
    
    <?php } ?>
        
    <hr>
    
</div>

<?php include('includes/footer.php'); ?>

