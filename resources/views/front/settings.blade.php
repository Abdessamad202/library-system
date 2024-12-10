@extends('../layout.layout')
@section('title', 'Search')
@section('links')
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/components/scroll.js', 'resources/css/components/profile.css'])
@endsection
@section('content')
    <x-navbar />
    <x-sidebar>
        <div class="row  w-100 padding-100   mt-5 mb-5 ">
            <div class="card shadow-sm my-5 mb-5 p-0 ">
                <div class="card-header bg-primary text-white">
                    <h2 class="h2">Change Password</h2>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Current Password Input -->
                        <div class="form-floating mt-3">
                            <input class="form-control" type="password" name="current_password" id="current_password"
                                placeholder="Enter your current password" required />
                            <label for="current_password">Current Password</label>
                        </div>

                        <!-- New Password Input -->
                        <div class="form-floating mt-4">
                            <input class="form-control" type="password" name="new_password" id="new_password"
                                placeholder="Enter your new password" required />
                            <label for="new_password">New Password</label>
                        </div>

                        <!-- Confirm New Password Input -->
                        <div class="form-floating mt-4">
                            <input class="form-control" type="password" name="new_password_confirmation"
                                id="new_password_confirmation" placeholder="Confirm your new password" required />
                            <label for="new_password_confirmation">Confirm New Password</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Email Confirmation Card -->
            <div class="card shadow-sm mb-5 p-0">
                <div class="card-header bg-primary text-white">
                    <h2 class="h2">Email Confirmation</h2>
                </div>
                <div class="card-body">
                    <p>Please enter your email address to receive a confirmation mail.</p>
                    <form>
                        <!-- Email Input -->
                        <div class="form-floating mt-3">
                            <input class="form-control" type="email" name="email" id="email_confirmation"
                                placeholder="Enter your email" required />
                            <label for="email_confirmation">Email Address</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-primary">Send Confirmation Link</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Change Email Address Card -->
            <div class="card shadow-sm mb-5 p-0">
                <div class="card-header bg-primary text-white">
                    <h2 class="h2">Change Email Address</h2>
                </div>
                <div class="card-body">
                    <form>
                        <!-- New Email Input -->
                        <div class="form-floating mt-3">
                            <input class="form-control" type="email" name="new_email" id="new_email"
                                placeholder="Enter your new email" required />
                            <label for="new_email">New Email Address</label>
                        </div>

                        <!-- Password Input -->
                        <div class="form-floating mt-4">
                            <input class="form-control" type="password" name="password" id="password_confirmation"
                                placeholder="Enter your password" required />
                            <label for="password_confirmation">Password</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-primary">Change Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-sidebar>
    <x-footer />
@endsection
