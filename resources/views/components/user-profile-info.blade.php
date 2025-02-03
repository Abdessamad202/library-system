<div class="mt-5 card shadow-sm w-100 h-100">
    <div class="card-header bg-primary text-white">
        <h2 class="h2">Profile Information</h2>
    </div>
    <div class="card-body d-flex flex-column align-content-center justify-content-evenly">
        <div class="row mb-3">
            <div class="col-sm-3 text-muted">Full Name</div>
            <div class="col-sm-9">{{ auth()->user()->name }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3 text-muted">Email</div>
            <div class="col-sm-9">{{ auth()->user()->email }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3 text-muted">Phone</div>
            <div class="col-sm-9">{{ auth()->user()->phone === null ? 'Null' : auth()->user()->phone }}
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3 text-muted">Address</div>
            <div class="col-sm-9">{{ auth()->user()->adresse === null ? 'Null' : auth()->user()->adresse }}
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit
            Profile</button>
    </div>
</div>