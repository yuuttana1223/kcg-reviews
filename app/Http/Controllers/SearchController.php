<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;

class SearchController extends Controller
{
    public function index(Request $request) {
    	
    	$keyword = $request->input('keyword');
    	$query = Review::query();
    	
    	if (!empty($keyword)) {
    		$query->where('lesson', 'like', '%' . $keyword . '%')->orWhere('teacher', 'like', '%' . $keyword . '%');
    	}
    	
    	$data = $query->orderBy('created_at', 'desc')->paginate(20);
    	return view('reviews.search', [
    		'reviews' => $data,	
    		'keyword' => $keyword,
    	]);
    }
}
