@props(['categories'])

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
