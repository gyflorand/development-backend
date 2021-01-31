<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Factory;

class UserNotificationController extends Controller
{
	/** @var Factory */
	private Factory $viewFactory;

	/**
	 * UserNotificationController constructor.
	 */
	public function __construct(Factory $viewFactory)
	{
		$this->viewFactory = $viewFactory;
	}

	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request): View
	{
		$notifications = tap($request->user()->unreadNotifications)->markAsRead();

		return $this->viewFactory->make(
			'notifications.index',
			[
				'notifications' => $notifications,
			]
		);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($id)
	{
		//
	}
}
