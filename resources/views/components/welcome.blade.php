<div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
    <div class="intro p-20 d-flex space-between bg-eee">
        <div>
            <h2 class="m-0">Welcome</h2>
            <p class="c-grey mt-5">{{ auth()->user()->name }}</p>
        </div>
        <img class="hide-mobile" src="../imgs/welcome.png" alt="" />
    </div>
    <img src="{{Storage::url(auth()->user()->image)}}"  alt="" class="avatar" />
    <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
        <div>{{ auth()->user()->name }}<span class="d-block c-grey fs-14 mt-10">{{ auth()->user()->role }}</span></div>
    </div>
    <button style="border: none ; cursor: pointer;"
        class="openModalBtn visit d-block fs-14 bg-blue c-white w-fit btn-shape">Profile</button>
</div>
<div id="modal" class="modal">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h2>Update Profile</h2>
            <span id="closeModalBtn" class="close">&times;</span>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST">
                @csrf
                <!-- Name Field -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}"
                        class="input" rows="4" placeholder="Enter the new name" required>
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" id="name" name="phone" value="{{ auth()->user()->phone }}"
                        class="input" rows="4" placeholder="Enter the new name" required>
                </div>
                <div class="form-group">
                    <label for="name">Adresse</label>
                    <input type="text" id="name" name="adresse" value="{{ auth()->user()->adresse }}"
                        class="input" rows="4" placeholder="Enter the new name" required>
                </div>
                <!-- Description Field -->
                <div class="form-group">
                    <label for="profile">Profile</label>
                    <input type="file" name="image" id="profile">
                </div>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button id="closeModalFooterBtn" class="button cancel">Cancel</button>
            <button id="saveChangesBtn" type='submit' class="button save">Save Changes</button>
        </div>
        </form>
    </div>
</div>
