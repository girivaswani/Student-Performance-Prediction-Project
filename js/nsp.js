function validate_student() {
    var gender,class1;
    gender = document.getElementById("gender").value;
    class1 = document.getElementById("class").value;

    if(gender=="selected"){
        swal({
            title: "Please select The Gender!",
        });
        return false;
    }
    else if(class1=="selected"){
        swal({
            title: "Please select The Class!",
        });
        return false;
    }
    else{
        return true;
    }
}
function validate_login() {
    var type1= document.getElementById("type1").value;
    if(type1=="selected"){
        swal({
            title: "Please select Login Type!",
        });
        return false;
    }
    else{
        return true;
    }
}
function validate_changepass() {
    var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    var password1,password2;
    password1 = document.getElementById("typepassword").value;
    password2 = document.getElementById("confirmpassword").value;
    if(!password1.match(decimal)){
        swal({
            title: "Attension",
            text: "Password must contain characters between 8 to 15,at least one lowercase letter, one uppercase letter, one numeric digit, and one special character",
            icon: "info",
             });
             return false;
    }
    if(password1==password2){
        return true;
    }
    else{
        swal({
            title: "Password not Matched!",
            text: "New Password and Confirm Password should be same",
            icon: "error",
             });
             return false;
    }
}
function Validate_marks(){
    console.log("in marks");
    var marks1 = document.getElementsByName("Marks1[]");
    var marks2 = document.getElementsByName("Marks2[]");
    console.log(marks1[0].value);
    for (let i = 0; i < marks1.length; i++) {
        if(marks1[i].value>20 || marks1[i].value<0 ||marks1[i].value==""){
            console.log("inside")
            swal({
                title: "Marks Should Between 0 to 20",
                icon: "warning",
                 });
            return false;
        }
    }
    for (let i = 0; i < marks2.length; i++) {
        if(marks2[i].value>20 || marks2[i].value<0||marks2[i].value==""){
            console.log("inside")
            swal({
                title: "Marks Should Between 0 to 20",
                icon: "warning",
                 });
            return false;
        }
    }
    console.log("Exiritng");
    return true;
}