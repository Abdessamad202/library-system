<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/guest/style.css', 'resources/js/guest/script.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Library Login & Registration</title>
</head>
<body>

    <div class="container" id="container">
        {{-- Registration Form --}}
        <div class="form-container sign-up">
            <form id="registerForm">
                <h1>Join the Library</h1>
                <p class="text-center">Discover thousands of books and resources at your fingertips.</p>
                <input type="text" name="name" id="registerName" placeholder="Your Name" required>
                <div id="name" class="error"></div>
                <input type="email" name="email" id="registerEmail" placeholder="Your Email" required>
                <div id="email" class="error"></div>
                <div class="password-container">
                    <i class="fa-solid fa-eye" id="registerEyeIcon"></i>
                    <input type="password" name="password" id="registerPassword" placeholder="Create Password" required>
                </div>
                <div id="password" class="error"></div>
                <div class="password-container">
                    <i class="fa-solid fa-eye" id="registerConfirmEyeIcon"></i>
                    <input type="password" name="password_confirmation" id="registerPasswordConfirmation" placeholder="Confirm Password" required>
                </div>
                <button type="button" id="registerButton">
                    <span>Sign Up</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>

        {{-- Login Form --}}
        <div class="form-container sign-in">
            <form id="loginForm">
                <h1>Library Login</h1>
                <p class="text-center">Access your account to borrow books and explore the collection.</p>
                <input type="email" name="email" id="loginEmail" placeholder="Your Email" required>
                <div id="loginEmailError" class="error"></div>
                <div class="password-container">
                    <i class="fa-solid fa-eye" id="loginEyeIcon"></i>
                    <input type="password" name="password" id="loginPassword" placeholder="Your Password" required>
                </div>
                <a href="#">Forgot Your Password?</a>
                <button type="button" id="loginButton">
                    <span>Sign In</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>

        {{-- Toggle Panels --}}
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p class="text-center">Log in to continue borrowing books and exploring new arrivals.</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>New to the Library?</h1>
                    <p>Create an account to access books, e-resources, and events.</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/script.js'])
</body>

</html>
