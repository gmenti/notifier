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
    public function it_displays_multiple_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash_notifications', [
            'type' => 'success',
            'content' => [
                'title' => 'Success',
                'message' => 'This is a success message!',
            ],
        ]);

        $this->flash->success('Success', 'This is a success message!');
    }

    /** @test */
    public function it_displays_info_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash.type', 'info');
        $this->session->shouldReceive('flash')->with('flash.content.title', 'title');
        $this->session->shouldReceive('flash')->with('flash.content.message', 'message');

        $this->flash->info('message', 'title');
    }

	/** @test */
	public function it_displays_success_flash_notifications()
	{
        $this->session->shouldReceive('flash')->with('flash.type', 'success');
        $this->session->shouldReceive('flash')->with('flash.content.title', 'title');
        $this->session->shouldReceive('flash')->with('flash.content.message', 'message');

        $this->flash->success('message', 'title');
	}

	/** @test */
	public function it_displays_error_flash_notifications()
	{
        $this->session->shouldReceive('flash')->with('flash.type', 'error');
        $this->session->shouldReceive('flash')->with('flash.content.title', 'title');
        $this->session->shouldReceive('flash')->with('flash.content.message', 'message');

        $this->flash->error('message', 'title');
	}

    /** @test */
    public function it_displays_danger_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash.type', 'danger');
        $this->session->shouldReceive('flash')->with('flash.content.title', 'title');
        $this->session->shouldReceive('flash')->with('flash.content.message', 'message');

        $this->flash->danger('message', 'title');
    }

    /** @test */
    public function it_displays_warning_flash_notifications()
    {
        $this->session->shouldReceive('flash')->with('flash.type', 'warning');
        $this->session->shouldReceive('flash')->with('flash.content.title', 'title');
        $this->session->shouldReceive('flash')->with('flash.content.message', 'message');

        $this->flash->warning('message', 'title');
    }

}
