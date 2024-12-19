@props(['books'])
<div class="projects p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 mb-20">Books List</h2>
    <div class="responsive-table">
        <table class="fs-15 w-full">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Cover</td>
                    <td>Author</td>
                    <td>Edition Date</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @if (count($books) == 0)
                <tr>
                    <td colspan="5" class="text-center">No Books</td>
                </tr>
                @else
                    @foreach ($books as $book )
                        <tr>
                            <td>{{$book->title}}</td>
                            <td><img class='cover' src="{{asset($book->image)}}" alt=""></td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->date_edition}}</td>
                            <td class="">
                                <div class="d-flex align-items-center gap-10 justify-content-center">
                                    <span class="label btn-shape bg-blue c-white"><i class="fas fa-eye"></i></span>
                                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="label btn-red btn-shape bg-red c-white pointer"><i class="fas fa-trash"></i></button>
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
