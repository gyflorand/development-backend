<?php

namespace App\Mail\Markdown;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable
{
	use Queueable;
	use SerializesModels;

	public string $topic;

	public function __construct(string $topic)
	{
		$this->topic = $topic;
	}

	public function build(): self
	{
		return $this
			->markdown('emails.markdown.contact-me')
			->subject('More information about ' . $this->topic);
	}
}
