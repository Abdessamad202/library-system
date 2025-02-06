@props(["book"])
<form action="{{ route('comments.store', $book->id) }}" method="POST">
    @csrf
    <div class="my-3">
        <textarea class="form-control" id="new-comment" name="comment" rows="4" placeholder="Write your comment here..." required></textarea>
    </div>
    <div class="d-flex justify-content-end align-items-center mb-3">
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </div>
</form>