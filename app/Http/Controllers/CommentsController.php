<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;

use App\Comment;

use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
	public function store(Request $request)
	{
		$request->validate([
			'content' => 'required|max:255',
		]);
		$message = Message::find($request->message_id);
		$comment = new Comment;
	
		$comment->content = $request->content;
		$comment->user_id = \Auth::id();
		$comment->message_id = $request->message_id;
		$comment->save();

		return redirect()->route('messages.show', ['message' => $message]);
	}
	
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        if (\Auth::id() === $comment->user_id) {
            $comment->delete();
        }

		return back();
	}
}
