@extends('../layouts.user-layout')
@section('title', 'Search')
@section('links')
    @vite([ 'resources/css/user/profile.css'])
@endsection
@section('content')
    <x-navbar />
    <x-sidebar>
        @session('success')
            <x-notification message="{{ session('success') }}" />
        @endsession
        <div class="row  w-100 padding-100   mt-5 mb-5 ">
            <div class="card shadow-sm my-5 mb-5 p-0 ">
                <div class="card-header bg-primary text-white">
                    <h2 class="h2">Change Password</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
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
                    @if (auth()->user()->email_verified_at !== null)
                        <p>Your email address is already verified.</p>
                    @else
                        <form action="{{ route('mail.confirm') }}" method="POST">
                            <p>Please click the button below to confirm your email address</p>
                            @csrf
                            <!-- Email Input -->
                            <!-- Submit Button -->
                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-primary">Send Confirmation Link</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>

            <!-- Change Email Address Card -->
            <div class="card shadow-sm mb-5 p-0">
                <div class="card-header bg-primary text-white">
                    <h2 class="h2">Change Email Address</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('email.change') }}" method="POST">
                        @csrf
                        <!-- New Email Input -->
                        <div class="form-floating mt-3">
                            <input class="form-control" type="email" name="email" id="new_email"
                                placeholder="Enter your new email" required />
                            <label for="new_email">New Email Address</label>
                        </div>

                        <!-- Password Input -->
                        <div class="form-floating mt-4">
                            <input class="form-control" type="password" name="password" id="password_confirmation"
                                placeholder="Enter your password" required />
                            <label for="password_confirmation">Password</label>
                        </div>
                        @session('error')
                            <div class="text-danger">{{ session('error') }}</div>
                        @endsession
                        <!-- Submit Button -->
                        <div class="mt-3 text-end">
                            <button type="submit" class="btn btn-primary">Change Email</button>
                        </div>
                    </form>
                </div>
            </div>
            @if (auth()->user()->isAdmin)
                <div class="card shadow-sm mb-5 p-0">
                    <div class="card-header bg-primary text-white">
                        <h2 class="h2">Change Role</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('role.change') }}" id="website-control-form" method="POST">
                            @csrf
                            <div class="mb-15 d-flex justify-content-between">
                                <div>
                                    <span class="fs-4">Admin Role</span>
                                </div>
                                <div>
                                    <label>
                                        <input class="toggle-checkbox" type="checkbox"
                                            onchange="document.getElementById('website-control-form').submit();"
                                            {{ auth()->user()->role === 'admin' ? 'checked' : '' }} />
                                        <div class="toggle-switch"></div>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </x-sidebar>
    <x-footer />
@endsection
