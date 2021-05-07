function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmpassword = document.getElementById("confirmPassword").value;
    var radios = document.getElementsByName("gender");
    var birthday = document.getElementById("birthday").value;
    var phone = document.getElementById("phone").value;
    var street = document.getElementById("street").value;
    var post = document.getElementById("post").value;
    var country = document.getElementById("country").value;
    var length = radios.length;
    var flag = true;
    var ex;
    
    for (var i = 0; i < length; i++) {
        if (radios[i].checked) {
            gender = radios[i].value;

            break;
        }
    }

    if (
        name.length === 0 ||
        email.length === 0 ||
        password.length === 0 ||
        confirmpassword.length === 0 ||
        birthday.length === 0 ||
        gender.length === 0  ||
        phone.length === 0 ||
        street.length === 0 ||
        post.length === 0 ||
        country.length === 0
    ) {
        alert("fill all fields");
        flag = false;
    } else {
        
        ex=/^[0-9a-zA-Z_' ]*/;
        if (name.length < 5) {
            alert("name must be five characters or more");
            flag = false;
        } else if (!name.match(ex)) {
            alert("you can only use only a-z, A-Z, -, ', @, #, & and * those characters at name field");
            flag = false;
        }
        
        ex=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if (!email.match(ex)) {
            alert("email must be valid");
            flag = false;
        }

        ex=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        if (password.length < 8) {
            alert("password must contain at least 8 characters");
            flag = false;
        } else if (!password.match(ex)) {
            alert("password must contain at least 8 characters and a digit, upper case and lower case characters");
            flag = false;
        }
        
        if (confirmpassword.length< 8 || !confirmpassword.match(ex)) {
            alert("You entered wrong password");
            flag = false;
        }

        ex=/^\+?[0-9-]{7,15}$/;
        if(!phone.match(ex)){
            alert("at phone number (0-9),'-' can use and + at beginning. Not less than 7 or more than 15 digit");
            flag = false;
        }

        ex=/^([A-Za-z0-9#]+)([\d\w\-#`.\s',]*)$/;
        if(!street.match(ex)){
            alert("you can only use alphanumeric characters and (-#`./,) at street field");
            flag = false;
        }

        ex=/^[0-9a-z\-\s]+$/;
        if(!post.match(ex)){
            alert("Postal/city code can have digit(0-9) and (a-z,'-')");
            flag = false;
        }
    }

    return flag;
}