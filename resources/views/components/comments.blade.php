@props(['comments', 'book'])
<div class="container-fluid container-lg">
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Comments</h2>
        </div>
        <div class="card-body">
            @if ($comments->isEmpty())
                <p class="text-muted">No comments yet. Be the first to comment!</p>
            @else
                <ul class="list-group">
                    @foreach ($comments as $comment)
                        <li class="list-group-item d-flex align-items-start">
                            <!-- Profile Picture -->
                            <div class="img-c {{$comment->user->isAdmin ? 'a' : 'u'}}"
                            role={{ $comment->user->isAdmin ? "A":"U"}}>
                                <img src="{{ Storage::url($comment->user->image) }}" alt="Profile Picture"
                                    class="rounded-circle me-3 profile-picture-c">
                            </div>

                            <!-- Comment Details -->
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <strong>{{ $comment->user->name }}
                                        {{ $comment->user->id == auth()->user()->id ? '(You)' : '' }}</strong>
                                    <div class="dropdown">
                                        @if (auth()->user()->id == $comment->user_id)
                                            <button class="btn m-0 btn-link text-muted p-0 " type="button"
                                                id="dropdownMenuButton{{ $comment->id }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i> <!-- Font Awesome Icon -->
                                            </button>
                                            <ul class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton{{ $comment->id }}">
                                                <li>
                                                    <button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#editCommentModal"data-action="{{ route('comments.update', $comment->id) }}"
                                                        data-comment="{{ $comment->comment }}">Edit</button>
                                                </li>
                                                <li>
                                                    <form action="{{ route('comments.destroy', $comment->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item text-danger"
                                                            type="submit">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        @endIf
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <!-- Comment Time -->
                                    <p class="mb-0">{{ $comment->comment }}</p>
                                    <small class="text-muted comment-time">{{ $comment->created_at->diffForHumans() }}
                                        {{ $comment->updated_at != $comment->created_at ? ' (edited)' : '' }}</small>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <x-comment-modal />
            @endif
        </div>
        <div class="card-footer">
            <x-comment-input :book="$book" />
        </div>
    </div>
</div>
