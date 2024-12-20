
document.addEventListener('DOMContentLoaded', function () {
    const emailForm = document.getElementById('email-form');
    const verificationForm = document.getElementById('verification-form');
    const resetPasswordForm = document.getElementById('reset-password-form');
    
    const stepEmail = document.getElementById('step-email');
    const stepVerification = document.getElementById('step-verification');
    const stepResetPassword = document.getElementById('step-reset-password');

    const togglePasswordIcons = document.querySelectorAll('.toggle-password');


    togglePasswordIcons.forEach(icon => {
        icon.addEventListener('click', function () {
            const passwordField = this.previousElementSibling;
            const icon = this.querySelector('i');
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    });
    /*

    emailForm.addEventListener('submit', function (event) {
        event.preventDefault();
        stepEmail.classList.remove('active');
        stepVerification.classList.add('active');
    });


    verificationForm.addEventListener('submit', function (event) {
        event.preventDefault();
        stepVerification.classList.remove('active');
        stepResetPassword.classList.add('active');
    });


    resetPasswordForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const newPassword = document.getElementById('new-password').value;
        const confirmPassword = document.getElementById('confirm-password').value;
        
        if (newPassword === confirmPassword) {
            alert("Password successfully reset!");
        } else {
            alert("Passwords do not match.");
        }
    });
    */
});
function validateForm() {
    var pass = document.forms["myForm"]["password"].value;
    var confirm_pass = document.forms["myForm"]["cPassword"].value;
    if ( pass != confirm_pass) {
        alert("Please enter 2 matching passwords!");
        return false;
    } else if ( pass.length<6) {
        alert("Please enter 2 passwords with length greater than 5!");
        return false;
    }
}
