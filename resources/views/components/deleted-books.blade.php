@props(['deletedBooks'])
<div class="projects p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">Deleted Books</h2>
    <div class="responsive-table">
        <table class="fs-15 w-full">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Cover</td>
                    <td>Author</td>
                    <td>Deleting Date</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @if (count($deletedBooks) == 0)
                <tr>
                    <td colspan="5" class="text-center">No Deleted Books</td>
                </tr>
                @else
                    @foreach ($deletedBooks as $deletedBook )
                    <tr>
                        <td>{{$deletedBook->title}}</td>
                        <td><img class='cover' src="{{asset($deletedBook->image)}}" alt=""></td>
                        <td>{{$deletedBook->author}}</td>
                        <td>{{$deletedBook->deleted_at->diffForHumans()}}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.books.restore', $deletedBook->id) }}" method="post">
                                @csrf
                                {{-- @method('PUT') --}}
                                <button class="label btn-green btn-shape bg-green c-white pointer"><i class="fa-solid fa-trash-arrow-up"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
