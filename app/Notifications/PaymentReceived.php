<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentReceived extends Notification
{
	use Queueable;

	/**
	 * Create a new notification instance.
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @return string[] array
	 */
	public function via(): array
	{
		return ['mail', 'database'];
	}

	/**
	 * Get the mail representation of the notification.
	 */
	public function toMail(): MailMessage
	{
		return (new MailMessage())
			->subject('Your Laracasts Payment Was Received')
			->greeting('Dear Customer!')
			->line('The introduction to the notification.')
			->line('Lorem ipsum dolor ist amet, consectetur adipiscing elit')
			->action('Sign Up', url('/'))
			->line('Thank you for using our application!');
	}

	/**
	 * Get the array representation of the notification.
	 */
	public function toArray(mixed $notifiable): array
	{
		return [
			//
		];
	}
}
