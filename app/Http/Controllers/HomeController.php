<?php 

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\Models\Status;

class HomeController extends Controller
{
	public function index()
	{
		//IF THE USER IS LOGGED IN, IT WILL SHOW A DIFFERENT LAYOUT THAN THE RETURN VIEW
		if(Auth::check()) {
			$statuses = Status::notReply()->where(function($query){
				return $query->where('user_id', Auth::user()->id)
					->orWhereIn('user_id', Auth::user()->friends()->lists('id')
						);
			})
			->orderBy('created_at', 'desc')
			->paginate(2);

			return view('timeline.index')
				->with('statuses', $statuses);
		}

		return view('home');
	}
}