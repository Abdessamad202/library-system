@props(['categories'])
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
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close:hover {
        color: #d32f2f;
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
<div class="projects p-20 bg-white rad-10 m-20 " style="position:relative;">
    <button type="button" style="position: absolute;right: 20px; top:10px;font-size: 16px;padding: 10px;" class="add button openModalBtn" data-action='{{route("admin.categories.store")}}'>Add A Category</button>
    <h2 class="mt-0 mb-20">categories List</h2>
    <div class="responsive-table">
        <table class="fs-15 w-full">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @if (count($categories) == 0)
                    <tr>
                        <td colspan="5" class="text-center">No Categories</td>
                    </tr>
                @else
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td class="text-center d-flex gap-10 ">
                                <button class="label btn-shape bg-blue update c-white openModalBtn" data-name='{{$category->name}}' data-description='{{$category->description}}' data-action='{{route("admin.categories.update",$category->id)}}'><i class="fa-solid fa-pen"></i></button>
                                <form action='{{route('admin.categories.destroy',$category->id)}}' method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="label btn-red btn-shape bg-red c-white pointer" >
                                        <i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
<div id="modal" class="modal">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h2>Modify Category</h2>
            <span id="closeModalBtn" class="close">&times;</span>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            <form id="categoryForm" method='post'>
                @csrf
                <!-- Name Field -->
                <div class="form-group">
                    <label for="categoryName">Name</label>
                    <input type="text" id="categoryName" name="name" class="input" rows="4"
                        placeholder="Enter category name" required>
                </div>
                <!-- Description Field -->
                <div class="form-group">
                    <label for="categoryDescription">Description</label>
                    <textarea id="categoryDescription" name="description" class="input" placeholder="Enter category description"
                        rows="4" required></textarea>
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
            if (btn.classList.contains("update")) {
                modal.querySelector('#categoryName').value = btn.getAttribute('data-name');
                modal.querySelector('#categoryDescription').value = btn.getAttribute('data-description');
            }else{
                modal.querySelector('#categoryName').value = ""
                modal.querySelector('#categoryDescription').value = ""
            }
            modal.querySelector('form').setAttribute('action',btn.getAttribute('data-action'))
            // console.log(e.target.getAttribute('data-id'), modal.querySelector('#categoryName'));

        });
    });
    // openModalBtn.addEventListener('click', openModal);
    closeModalBtn.addEventListener('click', closeModal);
    closeModalFooterBtn.addEventListener('click', closeModal);

    // Save button event
    // saveChangesBtn.addEventListener('click', () => {
    //     const name = document.getElementById('categoryName').value;
    //     const description = document.getElementById('categoryDescription').value;

    //     if (name && description) {
    //         console.log('Category Updated:', {
    //             name,
    //             description
    //         });
    //         alert('Category updated successfully!');
    //         closeModal();
    //     } else {
    //         alert('Please fill in all fields.');
    //     }
    // });

    // Close modal when clicking outside the content
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
</script>
