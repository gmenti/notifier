<?php 

namespace Menti\Flash;

class FlashNotifier
{
    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * Flash an information message.
     *
     * @param string $title
     * @param string $message
     * @return $this
     */
    public function info($title, $message)
    {
        $this->message($title, $message, 'info');

        return $this;
    }

    /**
     * Flash a success message.
     *
     * @param  string $title
     * @param  string $message
     * @return $this
     */
    public function success($title, $message)
    {
        $this->message($title, $message, 'success');

        return $this;
    }

    /**
     * Flash an error message.
     *
     * @param  string $title
     * @param  string $message
     * @return $this
     */
    public function error($title, $message)
    {
        $this->message($title, $message, 'error');

        return $this;
    }

    /**
     * Flash an danger message.
     *
     * @param  string $title
     * @param  string $message
     * @return $this
     */
    public function danger($title, $message)
    {
        $this->message($title, $message, 'danger');

        return $this;
    }

    /**
     * Flash an warning message.
     *
     * @param  string $title
     * @param  string $message
     * @return $this
     */
    public function warning($title, $message)
    {
        $this->message($title, $message, 'warning');

        return $this;
    }

    /**
     * Flash a general message.
     *
     * @param  string $title
     * @param  string $message
     * @param  string $level
     * @return $this
     */
    private function message($title, $message, $level)
    {
        $this->session->flash([
            'type' => $level,
            'content' => [
                'title' => $title,
                'message' => $message,
            ],
        ]);

        return $this;
    }

    /**
     * Get all flash notifications in session.
     *
     * @return array
     */
    public function getAll()
    {
        return $this->session->getAll();
    }

    /**
     * Get all flash notifications in json format.
     *
     * @return string
     */
    public function getAllJson()
    {
        return json_encode($this->getAll());
    }

    /**
     * Check if exist flash notifications in session.
     *
     * @return string
     */
    public function hasNotification()
    {
        return $this->session->hasNotification();
    }
}
