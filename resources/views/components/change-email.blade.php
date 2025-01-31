<div class="card">
    <div class="card-header">
        <h2>Change Email Address</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('email.change') }}" method="POST">
            @csrf
            <!-- New Email Input -->
            <div class="form-group">
                <label for="new_email">New Email Address</label>
                <input
                    type="email"
                    name="email"
                    id="new_email"
                    placeholder="Enter your new email"
                    required
                />
            </div>

            <!-- Password Input -->
            <div class="form-group">
                <label for="password_confirmation">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password_confirmation"
                    placeholder="Enter your password"
                    required
                />
            </div>

            <!-- Error Message -->
            @session('error')
            <div class="error-message">{{ session('error') }}</div>
            @endsession

            <!-- Submit Button -->
            <div class="form-actions">
                <button type="submit" class="btn">Change Email</button>
            </div>
        </form>
    </div>
</div>

<style>
    .card {
        /* max-width: 400px; */
        margin: 15px auto;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        font-family: Arial, sans-serif;
    }

    .card-header {
        background-color: #007bff;
        color: white;
        padding: 15px;
        /* text-align: center; */
    }

    .card-header h2 {
        margin: 0;
        font-size: 25px;
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .form-group input:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
    }

    .error-message {
        color: #d9534f;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .form-actions {
        text-align: right;
    }

    .btn {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 14px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
