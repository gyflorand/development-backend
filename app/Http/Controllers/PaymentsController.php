<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReceived;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Routing\Redirector;
use Illuminate\View\Factory;

class PaymentsController extends Controller
{
	/** @var Factory */
	private Factory $viewFactory;

	/** @var Redirector */
	private Redirector $redirector;

	/** @var ChannelManager */
	private ChannelManager $channelManager;

	/**
	 * PaymentsController constructor.
	 */
	public function __construct(
		Factory $viewFactory,
		Redirector $redirector,
		ChannelManager $channelManager,

	) {
		$this->viewFactory = $viewFactory;
		$this->redirector = $redirector;
		$this->channelManager = $channelManager;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(): Response
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(): View
	{
		return $this->viewFactory->make('payments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request): RedirectResponse
	{
		$this->channelManager->send($request->user(), new PaymentReceived());

		return $this->redirector->to('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id): Response
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function edit($id): Response
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param int $id
	 *
	 * @return Response
	 */
	public function update(Request $request, $id): Response
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function destroy($id): Response
	{
		//
	}
}
