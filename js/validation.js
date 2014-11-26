// When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#contactForm").validate({
    
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