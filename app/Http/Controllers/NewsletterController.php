<?php

namespace App\Http\Controllers;

use App\services\newsletter;

class NewsletterController extends Controller
{
	public function check(newsletter $newsletter)
	{
		request()->validate(['email' => 'required|email']);

		$newsletter = new newsletter();

		$newsletter->subscribe(request('email'));

		return redirect(route('home'))->with('success', 'now you are signed up for our newsletter');
	}
}
