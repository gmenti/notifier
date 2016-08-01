<?php 

namespace Mentito\Notifier;

use Illuminate\Support\Facades\Session;

class Notifier
{
    /**
     * Name of variable to set in session.
     * 
     * @var string
     */
    private $name = 'mentito_notifications';

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
        $this->flash([
            'type' => $level,
            'content' => [
                'title' => $title,
                'message' => $message,
            ],
        ]);

        return $this;
    }

    /**
     * Get all notifications of session.
     *
     * @return array
     */
    public function getAll()
    {
        return Session::get($this->name);
    }

    /**
     * Get all notifications of session in json format.
     *
     * @return string
     */
    public function getAllJson()
    {
        return json_encode($this->getAll());
    }

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    private function flash($data)
    {   
        $dataInSession = Session::get($this->name);

        $dataInSession[] = $data;

        Session::flash($this->name, $dataInSession);
    }

    /**
     * Check if exist notifications in session.
     *
     * @return boolean
     */
    public function hasNotification()
    {
        return Session::has($this->name);
    }
}
