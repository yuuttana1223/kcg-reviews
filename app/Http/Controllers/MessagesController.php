<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Message;

class MessagesController extends Controller
{
	public function index()
	{
		$user = \Auth::user();
		$messages = Message::orderBy('created_at', 'desc')->paginate(10);
		
		$data = [
			'user' => $user,
			'messages' => $messages,
		];
		
		return view('messages.index', $data);
	}
	
	public function create()
	{
		$message = new Message;
		return view('messages.create', [
			'message' => $message,
		]);
	}
	
	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required|max:50',
			'content' => 'required|max:255',
		]);
		
		$request->user()->messages()->create([
			'title' => $request->title,
			'content' => $request->content,
		]);

		return redirect()->route('messages.index');
	}
	
	public function show($id)
	{
		$user = \Auth::user();
		$message = Message::findOrFail($id);
		
		return view('messages.show', [
			'message' => $message,
			'user' => $user,
		]);
	}
	
	public function edit($id)
	{
		$message = Message::findOrFail($id);
		
		if (\Auth::id() === $message->user_id) {
			return view('messages.edit', [
				'message' => $message,
			]);
		}
		
		return redirect()->route('messages.index');
	}
	
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->title = $request->title;
        $message->content = $request->content;
        
        $message->save();

        return redirect()->route('messages.index');
    }
    
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        if (\Auth::id() === $message->user_id) {
            $message->delete();
        }

        return redirect()->route('messages.index');
    }
}
