// jquery
import $ from 'jquery';

const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});
const loginButton = document.querySelectorAll('.container button');

// Add mouseover event
loginButton.forEach((el) => {
    el.addEventListener('mouseover', () => {
      // Add the "change" class to both <i> and <span> elements
      el.querySelector("i").classList.add("change");
      el.querySelector("span").classList.add("change");
    });
    el.addEventListener('mouseout', () => {
      // Remove the "change" class from both <i> and <span> elements
      el.querySelector("i").classList.remove("change");
      el.querySelector("span").classList.remove("change");
    });
})
let icons = document.querySelectorAll(".password-container i");

icons.forEach((el) => {
    const passwordField = el.parentElement.querySelector("input");

    // Check if input has value and toggle the 'show' class
    passwordField.addEventListener("input", () => {
        if (passwordField.value.trim().length > 0) {
            el.classList.add("show");
        } else {
            el.classList.remove("show");
        }
    });

    el.addEventListener("click", () => {
        if (passwordField.type === "password") {
            passwordField.type = "text";
            el.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            passwordField.type = "password";
            el.classList.replace("fa-eye-slash", "fa-eye");
        }
        passwordField.focus();
    });
});
let hiddenBtn = document.querySelectorAll(".hidden")
hiddenBtn.forEach((el) => {
    el.addEventListener("click",() => {
        document.querySelectorAll("input").forEach((el) => {
            el.value = ""

        })
        document.querySelectorAll(".fa-eye").forEach(el=>el.classList.remove("show"))
    })
})
$(document).ready(function () {
    // CSRF Token for AJAX requests
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Registration AJAX
    $('#registerButton').click(function () {
        const data = {
            name: $('#registerName').val(),
            email: $('#registerEmail').val(),
            password: $('#registerPassword').val(),
            password_confirmation: $('#registerPasswordConfirmation').val(),
        };

        $.ajax({
            url: '/register', // Laravel register route
            type: 'POST',
            data: data,
            headers: { 'X-CSRF-TOKEN': csrfToken },
            success: function (response) {
                // alert('Registration successful!');
                window.location.href = '/home'; // Redirect to home on success
            },
            error: function (xhr) {
                const errors = xhr.responseJSON.errors;
                $('#name').html(errors.name[0]);
                $('#email').html(errors.email[0]);
                $('#password').html(errors.password[0]);
            },
        });
    });

    // Login AJAX
    $('#loginButton').click(function () {
        const data = {
            email: $('#loginEmail').val(),
            password: $('#loginPassword').val(),
        };

        $.ajax({
            url: '/login', // Laravel login route
            type: 'POST',
            data: data,
            headers: { 'X-CSRF-TOKEN': csrfToken },
            success: function (response) {
                // alert('Login successful!');
                // console.log(response)
                window.location.href = response.route; // Redirect to home on success
            },
            error: function (xhr) {
                const errors = xhr.responseJSON.errors;
                $('#loginEmailError').html(errors.email[0]);
            },
        });
    });
});