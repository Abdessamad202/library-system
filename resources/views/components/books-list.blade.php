@props(['books','categories'])
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
        /* overflow-y: scroll; */
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
        /* overflow: hidden; */
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
    .mix{
        gap:10px;
    }
    .mix .form-group {
        width: 50%;

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
<div class="projects p-20 bg-white rad-10 m-20" style="position: relative">
    <button type="button" style="position: absolute;right: 20px; top:10px;font-size: 16px;padding: 10px;"
        class="add button openModalBtn" data-action='{{ route('admin.categories.store') }}'>Add A Book</button>
    <h2 class="mt-0 mb-20"> Books List</h2>
    <div class="responsive-table">
        <table class="fs-15 w-full">
            <thead>
                <tr>
                    <td>Title</td>
                    <td>Cover</td>
                    <td>Description</td>
                    <td>Author</td>
                    <td>Category</td>
                    <td>Edition Date</td>
                    <td>Stock</td>
                    <td>Reserved By</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @if (count($books) == 0)
                    <tr>
                        <td colspan="8" class="text-center">No Books</td>
                    </tr>
                @else
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td><img class='cover' src="{{ asset($book->image) }}" alt=""></td>
                            <td>{{ Str::limit($book->description, 40) }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->date_edition }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>{{ $book->reserved_number }}</td>
                            <td >
                                <div class="d-flex align-items-center gap-10 justify-content-center">

                                    <span class="label btn-shape update openModalBtn bg-blue c-white"
                                        data-title="{{ $book->title }}" data-author="{{ $book->author }}"
                                        data-description="{{ $book->description }}"
                                        data-date-edition="{{ $book->date_edition }}" data-stock="{{ $book->stock }}"
                                        data-category-id="{{ $book->category_id }}"
                                        data-action="{{ route('admin.books.update', $book->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </span>

                                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="label btn-red btn-shape bg-red c-white pointer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
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
            <h2>Modify Book</h2>
            <span id="closeModalBtn" class="close">&times;</span>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            <form id="BookForm" action="{{route("admin.books.store")}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Title Field -->
                <div class="form-group">
                    <label for="BookTitle">Title</label>
                    <input type="text" id="BookTitle" name="title" class="input" placeholder="Enter book title"
                        required>
                </div>

                <!-- Cover Field -->
                <div class="mix d-flex">
                    <div class="form-group">
                        <label for="BookCover">Cover</label>
                        <input type="file" id="BookCover" name="image">
                    </div>
                    <div class="form-group">
                        <label for="CategorySelect">Select Category</label>
                        <select id="CategorySelect" name="category_id" class="input" required>
                            <option value="">-- Select a category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Stock Field -->
                <div class="form-group">
                    <label for="BookAuthor">Author</label>
                    <input type="text" id="BookAuthor" name="author" class="input" placeholder="Enter author name"
                        required>
                </div>


                <div class="d-flex mix">

                    <div class="form-group">
                        <label for="BookStock">Stock</label>
                        <input type="number" id="BookStock" name="stock" min="0" class="input" placeholder="Enter stock quantity" required>
                    </div>
                    <!-- Author Field -->
                    <!-- Edition Date Field -->
                    <div class="form-group">
                        <label for="BookDate">Edition Date</label>
                        <input type="date" id="BookDate" name="date_edition" class="input" required>
                    </div>
                </div>
                <!-- Description Field -->
                <div class="form-group">
                    <label for="BookDescription">Description</label>
                    <textarea id="BookDescription" name="description" class="input" rows="4" placeholder="Enter book description"
                        required></textarea>
                </div>
                <div class="modal-footer">
                    <button id="closeModalFooterBtn" class="button cancel">Cancel</button>
                    <button id="saveChangesBtn" type='submit' class="button save">Save Changes</button>
                </div>
            </form>
        </div>
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

        // Populate form fields if the button has the "update" class
        if (btn.classList.contains("update")) {
            modal.querySelector('#BookTitle').value = btn.getAttribute('data-title');
            modal.querySelector('#BookAuthor').value = btn.getAttribute('data-author');
            modal.querySelector('#BookDescription').value = btn.getAttribute('data-description');
            modal.querySelector('#BookDate').value = btn.getAttribute('data-date-edition');
            modal.querySelector('#BookStock').value = btn.getAttribute('data-stock');
            modal.querySelector('#BookCover').value = ""; // File inputs can't be pre-filled

            // Set the selected category
            const categoryId = btn.getAttribute('data-category-id');
            const categorySelect = modal.querySelector('#CategorySelect');
            if (categorySelect) {
                categorySelect.value = categoryId; // Set the selected option
            }

            // Update the form action
            modal.querySelector('form').setAttribute('action', btn.getAttribute('data-action'));
        } else {
            // Reset form fields for a new book
            modal.querySelector('#BookTitle').value = "";
            modal.querySelector('#BookAuthor').value = "";
            modal.querySelector('#BookDescription').value = "";
            modal.querySelector('#BookDate').value = "";
            modal.querySelector('#BookStock').value = "";
            modal.querySelector('#BookCover').value = "";

            // Reset the category dropdown
            const categorySelect = modal.querySelector('#CategorySelect');
            if (categorySelect) {
                categorySelect.value = ""; // Reset to the default option
            }
        }
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
