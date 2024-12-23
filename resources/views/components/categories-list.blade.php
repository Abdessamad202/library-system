@props(['categories'])
<div class="projects p-20 bg-white rad-10 m-20">
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
                    @foreach ($categories as $category )
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td class="text-center d-flex gap-10 ">
                            <button class="label btn-shape bg-blue c-white"><i class="fa-solid fa-pen"></i></button>
                            <form action='' method="post">
                                @csrf
                                @method('DELETE')
                                <button class="label btn-red btn-shape bg-red c-white pointer"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
