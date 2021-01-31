<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Mail\Markdown\ContactMe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Routing\Redirector;
use Illuminate\View\Factory;

class ContactController extends Controller
{
	/** @var Factory */
	private Factory $viewFactory;

	/** @var Request */
	private Request $request;

	/** @var Mailer */
	private Mailer $mailer;

	/** @var Redirector */
	private Redirector $redirector;

	public function __construct(
		Factory $viewFactory,
		Request $request,
		Mailer $mailer,
		Redirector $redirector
	) {
		$this->viewFactory = $viewFactory;
		$this->request = $request;
		$this->mailer = $mailer;
		$this->redirector = $redirector;
	}

	public function index(): View
	{
		return $this->viewFactory->make('contacts.index');
	}

	public function store(): RedirectResponse
	{
		/** @noinspection StaticInvocationViaThisInspection */
		$this->request->validate(['email' => 'required|email']);

		$this->mailer
			->to($this->request->get('email'))
			->send(new ContactMe('laravel'));

		return $this->redirector
			->to('/contact')
			->with('message', 'Email sent!');
	}
}
