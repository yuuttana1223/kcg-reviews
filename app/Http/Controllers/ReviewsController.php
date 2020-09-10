<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Review;

class ReviewsController extends Controller
{
	public function index()
	{
		$data = [];
		if (Auth::check()) {
			$user = \Auth::user();
			$reviews = Review::orderBy('created_at', 'desc')->paginate(10);
			
			$data = [
				'user' => $user,
				'reviews' => $reviews,
			];
		}
		return view('welcome', $data);
	}
	
	public function create()
	{
			$review = new Review;
	
			return view('reviews.create', [
				'review' => $review,
			]);
			
		return redirect('/');
	}
	
	public function store(Request $request)
	{
		$request->validate([
			'lesson' => 'required|max:20',
			'teacher' => 'required|max:15',
			'department' => 'required|max:15',
			'format' => 'required',
			'exists_test' => 'required',
			'content_fulfilling'  => 'required',
			'has_taken_unit' => 'required',
			'good_point' => 'required|max:255',
			'bad_point' => 'required|max:255',
		]);
		
		$request->user()->reviews()->create([
			'lesson' => $request->lesson,
			'teacher' => $request->teacher,
			'department' => $request->department,
			'format' => $request->format,
			'exists_test' => $request->exists_test,
			'content_fulfilling'  => $request->content_fulfilling,
			'has_taken_unit' => $request->has_taken_unit,
			'good_point' => $request->good_point,
			'bad_point' => $request->bad_point,
		]);

		return redirect('/');
	}
	
	public function edit($id)
	{
		$review = Review::findOrFail($id);
		
		if (\Auth::id() === $review->user_id) {
			return view('reviews.edit', [
				'review' => $review,
			]);            
		}
		
		return redirect('/');
	}
	
	public function update(Request $request, $id)
	{
		$request->validate([
			'lesson' => 'required|max:20',
			'teacher' => 'required|max:15',
			'department' => 'required|max:15',
			'format' => 'required',
			'exists_test' => 'required',
			'content_fulfilling'  => 'required',
			'has_taken_unit' => 'required',
			'good_point' => 'required|max:255',
			'bad_point' => 'required|max:255',
		]);
		
		$review = Review::findOrFail($id);
		$review->lesson = $request->lesson;
		$review->teacher = $request->teacher;
		$review->department = $request->department;
		$review->format = $request->format;
		$review->exists_test = $request->exists_test;
		$review->content_fulfilling  = $request->content_fulfilling;
		$review->has_taken_unit = $request->has_taken_unit;
		$review->good_point = $request->good_point;
		$review->bad_point = $request->bad_point;
		
		$review->save();

		return redirect('/');
	}
	public function destroy($id)
	{
		$review = Review::findOrFail($id);
		if (\Auth::id() === $review->user_id) {
			$review->delete();
		}

		return redirect('/');
	}
	
}
