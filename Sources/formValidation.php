<?php

// If the form was submitted, scrub the input (server-side validation)
// see below in the html for the client-side validation using jQuery

$name = '';
$gender = '';
$address = '';
$email = '';
$username = '';
$password = '';
$output = '';

if($_POST) {
  // collect all input and trim to remove leading and trailing whitespaces
  $fullName = trim($_POST['fullName']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$subject = trim($_POST['subject']);
	$message = trim($_POST['message']);
	$date = date("d/m/Y H:i");
	$msg = "
Full name: {$fullName}

Email: {$email}

Phone: {$phone}

Subject: {$subject}

Message:
{$message}
							
Date: {$date}";
  $errors = array();
  
  // Validate the input
  if (strlen($fullName) == 0)
    array_push($errors);
  
  if (strlen($subject) == 0) 
    array_push($subject);
    
  if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    array_push($errors);
    
  if (strlen($message) == 0)
    array_push($errors);
    
  // If no errors were found, proceed with storing the user input
  if (count($errors) == 0) {
    array_push($errors, "No errors were found. Thanks!");
  }
  
  //Prepare errors for output
  $output = '';
  foreach($errors as $val) {
    $output .= "<p class='output'>$val</p>";
  }
  
}

?>

<html>
<head>
  <style type="text/css">
    .label {width:100px;text-align:right;float:left;padding-right:10px;font-weight:bold;}
    #register-form label.error, .output {color:#FB3A3A;font-weight:bold;}
  </style>
  
  <!-- Load jQuery and the validate plugin -->
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  
  <!-- jQuery Form Validation code -->
  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register-form").validate({
    
        // Specify the validation rules
        rules: {
            fullName: "required",
            subject: "required",
            message: "required",
            email: {
                required: true,
                email: true
            }
        },
        
        // Specify the validation error messages
        messages: {
            fullName: "<img src='images/error.png' />",
            subject: "<img src='images/error.png' />",
            message: "<img src='images/error.png' />",
            email: "<img src='images/error.png' />"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
</head>
<body>
  <?php echo $output; ?>
  <!--  The form that will be parsed by jQuery before submit  -->
  <form action="#register-form" method="post" id="register-form" novalidate="novalidate">
  
    <div class="label">Name</div><input type="text" id="name" name="name" value="<? echo $name; ?>" /><br />
    <div class="label">Gender</div><select id="gender" name="gender" />
                                      <option value="Female">Female</option>
                                      <option value="Male">Male</option>
                                      <option value="Other">Other</option>
                                   </select><br />
    <div class="label">Address</div><input type="text" id="address" name="address" value="<? echo $address; ?>" /><br />
    <div class="label">Email</div><input type="text" id="email" name="email" value="<? echo $email; ?>" /><br />
    <div class="label">Username</div><input type="text" id="username" name="username" value="<? echo $username; ?>" /><br />
    <div class="label">Password</div><input type="password" id="password" name="password" /><br />
    <div style="margin-left:140px;"><input type="submit" name="submit" value="Submit" /></div>
    
  </form>
  
</body>
</html>