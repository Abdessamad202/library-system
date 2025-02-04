@props(['books','categories'])
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
