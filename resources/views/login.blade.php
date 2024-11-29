<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @vite(['resources/css/style.css', 'resources/js/script.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Modern Login & Registration Page</title>
</head>

<body>

    <div class="container" id="container">
        {{-- Registration Form --}}
        <div class="form-container sign-up">
            <form id="registerForm">
                <h1>Create Account</h1>
                <input type="text" name="name" id="registerName" placeholder="Name" required>
                <input type="email" name="email" id="registerEmail" placeholder="Email" required>
                <div class="password-container">
                    <i class="fa-solid fa-eye" id="registerEyeIcon"></i>
                    <input type="password" name="password" id="registerPassword" placeholder="Password" required>
                </div>
                <div class="password-container">
                    <i class="fa-solid fa-eye" id="registerConfirmEyeIcon"></i>
                    <input type="password" name="password_confirmation" id="registerPasswordConfirmation" placeholder="Password Confirmation" required>
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
                <h1>Sign In</h1>
                <input type="email" name="email" id="loginEmail" placeholder="Email" required>
                <div class="password-container">
                    <i class="fa-solid fa-eye" id="loginEyeIcon"></i>
                    <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                </div>
                <a href="#">Forget Your Password?</a>
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
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/js/script.js'])
</body>

</html>
