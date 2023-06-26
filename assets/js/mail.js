function send_data() {
    console.log('yes');
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var subject = document.getElementById("subject").value;
    var message = document.getElementById("message").value;
    

    //Code for regex validation  
    var letters = /^[a-zA-Z]*$/;
    var email_val = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var num_check = /^[0-9]{1,10}$/;
    // variable create
    var data = {
        'name': name,
        'email': email,
        'subject': subject,
        'message': message
    }

    

    //other validations required code  
    if (name == '' || name == null) {
        swal("Please enter Name...");
    }
    else if (email == '' || email == null) {
        swal("Please enter Email...");
    }
    // else if (phoneno == '' || phoneno == null) {
    //     swal("Please enter Phone no...");
    // }
    else if (!letters.test(name)) {
        swal('Name contain alphabets only...');
    }
    // else if (!num_check.test(phoneno)) {
    //     swal('Phone no. contain digits only...');
    // }
    else if (!email_val.test(email)) {
        swal('Enter valid Email Id...');
    }
    else {
        postData(data);
    }
}

function postData(data) {
    // console.log('in post dta');
    $("#overlay").fadeIn(300);
    $.ajax({
        url: "send_mailer.php",
        type: "POST",
        dataType: "json",
        contentType: "application/json; charset=utf-8",
        data: JSON.stringify(data),
        success: function (response) {
            // when call is sucessfull
            $("#overlay").fadeOut(300);
            if (response.message == 'success') {
                swal("", "Email sent successfully!", "success");
                $("#mail")[0].reset();
            }
            else {
                swal("", "Something went wrong, Please Try again after some time!", "error");
            }
        },
        error: function (response) {
            $("#overlay").fadeOut(300);
            // check the err for error details  
            swal("", "Something went wrong!...", "error");
        }
    }); // ajax call closing
      
}
