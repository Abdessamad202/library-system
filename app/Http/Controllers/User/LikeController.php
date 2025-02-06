<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Toggle like functionality
     */
    public function toggleLike($bookId)
    {
        $userId = Auth::user()->id;
        // Check if the like already exists (including soft-deleted ones)
        $like = Like::withTrashed()
            ->where('user_id', $userId)
            ->where('book_id', $bookId)
            ->first();

        if ($like) {
            if ($like->trashed()) {
                // If it exists but is soft-deleted, restore it
                $like->restore();
                return response()->json(['success' => true, 'count' => Like::where('book_id', $bookId)->count(), 'is_liked' => true]);
            } else {
                // If it exists and is active, delete it
                $like->delete();
                return response()->json(['success' => true, 'count' => Like::where('book_id', $bookId)->count(), 'is_liked' => false]);
            }
        } else {
            // If it doesn't exist, create a new like
            return $this->store($userId, $bookId);
        }
    }

    /**
     * Store a new like
     */
    public function store($userId, $bookId)
    {
        Like::create([
            'user_id' => $userId,
            'book_id' => $bookId,
        ]);

        return response()->json(['success' => true, 'count' => Like::where('book_id', $bookId)->count(), 'is_liked' => true]);
    }
}
