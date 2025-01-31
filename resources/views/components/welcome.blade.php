<style>
    * {
        box-sizing: border-box;
    }

    /* Button Styles */
    .button {
        background-color: #0075ff;
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .button:hover {
        background-color: #0075ff;
    }

    .button.cancel {
        background-color: #d32f2f;
    }

    .button.cancel:hover {
        background-color: #c62828;
    }

    .button.save {
        background-color: #0075ff;
    }

    .button.save:hover {
        background-color: #0075ff;
    }

    /* Modal Overlay */
    .modal {
        display: none;
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        box-sizing: border-box;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    /* Modal Content */
    .modal-content {
        background-color: white;
        border-radius: 10px;
        width: 100%;
        max-width: 700px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        overflow: hidden;
        animation: fadeIn 0.3s ease-in-out;
    }

    /* Modal Header */
    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background-color: #0075ff;
        color: white;
    }

    .modal-header h2 {
        margin: 0;
    }

    .close {
        font-size: 20px;
        width: 30px;
        text-align: center;
        /* display: flex
; */
        height: 30px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
        align-content: center;
    }

    .close:hover {
        background: #d32f2f;
    }

    /* Modal Body */
    .modal-body {
        padding: 20px;
    }

    /* Form Styles */
    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .input {
        width: 100%;
        padding: 10px;

        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }

    .input:focus {
        outline: none;
        border-color: #0075ff;
    }

    /* Modal Footer */
    .modal-footer {
        padding: 15px;
        text-align: right;
        background-color: #f1f1f1;
    }

    /* Keyframe Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
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
<script>
    const modal = document.getElementById('modal');
    const openModalBtns = document.querySelectorAll('.openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const closeModalFooterBtn = document.getElementById('closeModalFooterBtn');
    const saveChangesBtn = document.getElementById('saveChangesBtn');
    // Function to open modal
    function openModal() {
        modal.style.display = 'flex';
    }

    // Function to close modal
    function closeModal() {
        modal.style.display = 'none';
    }

    // Event listeners
    openModalBtns.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            openModal();
        });
    });

    // openModalBtn.addEventListener('click', openModal);

    closeModalBtn.addEventListener('click', closeModal);
    closeModalFooterBtn.addEventListener('click', closeModal);
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
</script>
