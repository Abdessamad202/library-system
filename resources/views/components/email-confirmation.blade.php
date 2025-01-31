<div class="card">
    <div class="card-header">
        <h2>Email Confirmation</h2>
    </div>
    <div class="card-body">
        @if (auth()->user()->email_verified_at !== null)
            <p class="info-message">Your email address is already verified.</p>
        @else
            <form action="{{ route('mail.confirm') }}" method="POST">
                <p class="info-text">
                    Please click the button below to confirm your email address.
                </p>
                @csrf
                <!-- Submit Button -->
                <div class="form-actions">
                    <button type="submit" class="btn">Send Confirmation Link</button>
                </div>
            </form>
        @endif
    </div>
</div>