<?php

use Menti\Flash\FlashNotifier;
use Mockery as m;

class FlashTest extends PHPUnit_Framework_TestCase {

    protected $session;

    protected $flash;

	public function setUp()
	{
        $this->session = m::mock('Menti\Flash\SessionStore');
        $this->flash = new FlashNotifier($this->session);
	}

    /** @test */
    public function it_displays_info_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash_notification', [
            'type' => 'info',
            'content' => [
                'title' => 'Info title',
                'message' => 'Info message',
            ],
        ]);

        $this->flash->info('Info message', 'Info title');
    }

	/** @test */
	public function it_displays_success_flash_notifications()
	{
        $this->session->shouldReceive('flash')->with('flash_notification', [
            'type' => 'success',
            'content' => [
                'title' => 'Success title',
                'message' => 'Success message',
            ],
        ]);

        $this->flash->success('Success message', 'Success title');
	}

	/** @test */
	public function it_displays_error_flash_notifications()
	{
        $this->session->shouldReceive('flash')->with('flash_notification', [
            'type' => 'danger',
            'content' => [
                'title' => 'Error title',
                'message' => 'Error message',
            ],
        ]);

        $this->flash->error('Error message', 'Error title');
	}

    /** @test */
    public function it_displays_warning_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash_notification', [
            'type' => 'warning',
            'content' => [
                'title' => 'Warning title',
                'message' => 'Warning message',
            ],
        ]);

        $this->flash->warning('Warning message', 'Warning title');
    }

}
