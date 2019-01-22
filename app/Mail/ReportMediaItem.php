<?php
/**
 * Created by PhpStorm.
 * User: angelformica
 * Date: 2019-01-17
 * Time: 17:07
 */

namespace App\Mail;

use App;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ReportMediaItem extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * @var string
	 */
	public $displayName;

	/**
	 * @var string
	 */
	public $subject;

	/**
	 * @var string
	 */
	public $emailMessage;

	/**
	 * @var string
	 */
	private $emails;

	/**
	 * @var string
	 */
	public $link;

	/**
	 * @var string
	 */
	public $itemName;

	/**
	 * Create a new message instance.
	 * @param string $subject
	 * @param string $displayName
	 * @param array $adminsEmails
	 * @param string $emailMessage
	 * @param string $link
	 * @param string $itemName
	 */
	public function __construct($displayName, $subject ,$emailMessage, $adminsEmails, $link, $itemName)
	{
		$this->link = $link;
		$this->emails = $adminsEmails;
		$this->itemName = $itemName;
		$this->displayName = $displayName;
		switch ($subject){
			case 1:
				$this->subject = 'Playback issues';
				break;
			case 2:
				$this->subject = 'Needs update';
				break;
			case 3:
				$this->subject = 'Account issues';
				break;
		}
		$this->emailMessage = $emailMessage;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->to($this->emails)
		            ->subject($this->subject)
		            ->view('emails.default.report.report')
		            ->text('emails.default.report.report-plain');
	}
}