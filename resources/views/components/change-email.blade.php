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