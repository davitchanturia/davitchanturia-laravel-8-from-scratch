<?php

namespace App\services;

use Exception;
use MailchimpMarketing\ApiClient;
use Illuminate\Validation\ValidationException;

// ამ კლასშI მოქცეულია api სთან დაკავშირებული ლოგიკა თუ რა კონფიგებია საჭირო და მეთოდი როგორც ვაგზავნით
class newsletter
{
	public function subscribe(string $email)
	{
		$client = new ApiClient();

		$client->setConfig([
			'apiKey' => config('services.mailchimp.key'),
			'server' => config('services.mailchimp.server'),
		]);

		try
		{
			$client->lists->addListMember(config('services.mailchimp.list.subscribers'), [
				'email_address' => $email,
				'status'        => 'subscribed',
			]);
		}
		catch (Exception $e)
		{
			throw ValidationException::withMessages([
				'email' => 'this email could not be added',
			]);
		}
	}
}
