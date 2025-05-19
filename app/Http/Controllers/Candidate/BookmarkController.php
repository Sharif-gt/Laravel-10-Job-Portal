<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Services\Notify;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BookmarkController extends Controller
{
    public function bookmarked($id)
    {
        // Logic to handle bookmarking a job
        if (!auth()->check()) {
            throw ValidationException::withMessages(['Please login to bookmark a job.']);
        }

        if (auth()->check() && auth()->user()->role !== 'candidate') {
            throw ValidationException::withMessages(['You are not authorized to bookmark jobs.']);
        }
        // Save the job ID to the user's bookmarks in the database
        $saveBookmark = new Bookmark;
        $saveBookmark->user_id = auth()->user()->candidateProfile->id;
        $saveBookmark->job_id = $id;
        $saveBookmark->save();

        // Return a success response
        return response(['message' => 'Job bookmarked successfully.', 'id' => $id], 200);
    }

    public function bookmarkDelete($id)
    {
        Bookmark::findOrFail($id)->delete();

        Notify::deletedNotification();
        // Return a success response
        return to_route('candidate.bookmark-job');
    }
}
