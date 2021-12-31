<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\services\Newsletter;

class NewsletterController extends Controller
{
	public function check(NewsletterRequest $request, newsletter $newsletter)
	{
		$attributes = $request->validated();

		$newsletter = new Newsletter();

		$newsletter->subscribe($attributes['email']);

		return redirect(route('home'))->with('success', 'now you are signed up for our newsletter');
	}
}
