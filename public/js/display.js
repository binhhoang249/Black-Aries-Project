// document.getElementById("toggle-password").addEventListener("click", function() {
//     const passwordInput = document.getElementById("password");
//     const icon = this;

//     if (passwordInput.type === "password") {
//         passwordInput.type = "text";
//         icon.classList.remove("fa-eye");
//         icon.classList.add("fa-eye-slash");
//     } else {
//         passwordInput.type = "password";
//         icon.classList.remove("fa-eye-slash");
//         icon.classList.add("fa-eye");
//     }
// });
// document.getElementById("toggle-confirm-password").addEventListener("click", function() {
//     const passwordInput = document.getElementById("confirm-password");
//     const icon = this;

//     if (passwordInput.type === "password") {
//         passwordInput.type = "text";
//         icon.classList.remove("fa-eye");
//         icon.classList.add("fa-eye-slash");
//     } else {
//         passwordInput.type = "password";
//         icon.classList.remove("fa-eye-slash");
//         icon.classList.add("fa-eye");
//     }
// });
// document.querySelectorAll(".toggle-password").forEach(icon => {
//     icon.addEventListener("click", function() {
//         const passwordInput = this.previousElementSibling; // Lấy trường mật khẩu liền trước biểu tượng mắt
//         const icon = this; // Lấy chính biểu tượng mắt

//         // Kiểm tra và thay đổi kiểu mật khẩu
//         if (passwordInput.type === "password") {
//             passwordInput.type = "text"; // Hiển thị mật khẩu
//             icon.classList.remove("fa-eye");
//             icon.classList.add("fa-eye-slash"); // Thay đổi biểu tượng mắt
//         } else {
//             passwordInput.type = "password"; // Ẩn mật khẩu
//             icon.classList.remove("fa-eye-slash");
//             icon.classList.add("fa-eye"); // Thay đổi biểu tượng mắt bị gạch
//         }
//     });
// });

document.getElementById("toggle-password").addEventListener("click", function() {
    togglePasswordVisibility("password", this);
});

function togglePasswordVisibility(inputId, icon) {
    const passwordInput = document.getElementById(inputId);

    if (passwordInput.type === "password") {
        passwordInput.type = "text"; // Hiển thị mật khẩu
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash"); // Thay đổi biểu tượng
    } else {
        passwordInput.type = "password"; // Ẩn mật khẩu
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye"); // Thay đổi biểu tượng
    }
}

// Lắng nghe sự kiện click trên tất cả các biểu tượng mắt
document.querySelectorAll(".toggle-password").forEach(icon => {
    icon.addEventListener("click", function() {
        // Lấy trường mật khẩu tương ứng với biểu tượng mắt
        const passwordInput = this.previousElementSibling;  // Trường mật khẩu là phần tử ngay trước biểu tượng mắt
        const icon = this;

        // Kiểm tra và thay đổi kiểu mật khẩu
        if (passwordInput.type === "password") {
            passwordInput.type = "text"; // Hiển thị mật khẩu
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash"); // Thay đổi biểu tượng mắt
        } else {
            passwordInput.type = "password"; // Ẩn mật khẩu
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye"); // Thay đổi biểu tượng mắt bị gạch
        }
    });
});


