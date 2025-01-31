<div class="card">
    <div class="card-header">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        @session('success')
        <x-notification message="{{ session('success') }}" />
        @endsession
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <!-- Current Password Input -->
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input class="form-control" type="password" name="current_password" id="current_password" placeholder="Enter your current password" required />
            </div>

            <!-- New Password Input -->
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input class="form-control" type="password" name="new_password" id="new_password" placeholder="Enter your new password" required />
            </div>

            <!-- Confirm New Password Input -->
            <div class="form-group">
                <label for="new_password_confirmation">Confirm New Password</label>
                <input class="form-control" type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="Confirm your new password" required />
            </div>

            <!-- Submit Button -->
            <div class="form-actions">
                <button type="submit" class="btn">Change Password</button>
            </div>
        </form>
    </div>
</div>