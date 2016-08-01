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
    const NOTIFICATIONS_NAME = 'mentito_notifications';

    /**
     * Flash an information message.
     *
     * @param string $title
     * @param string $message
     * @return $this
     */
    public static function info($title, $message)
    {
        self::message($title, $message, 'info');
    }

    /**
     * Flash a success message.
     *
     * @param  string $title
     * @param  string $message
     * @return $this
     */
    public static function success($title, $message)
    {
        self::message($title, $message, 'success');
    }

    /**
     * Flash an error message.
     *
     * @param  string $title
     * @param  string $message
     * @return $this
     */
    public static function error($title, $message)
    {
        self::message($title, $message, 'error');
    }

    /**
     * Flash an danger message.
     *
     * @param  string $title
     * @param  string $message
     * @return $this
     */
    public static function danger($title, $message)
    {
        self::message($title, $message, 'danger');
    }

    /**
     * Flash an warning message.
     *
     * @param  string $title
     * @param  string $message
     * @return $this
     */
    public static function warning($title, $message)
    {
        self::message($title, $message, 'warning');
    }

    /**
     * Flash a general message.
     *
     * @param  string $title
     * @param  string $message
     * @param  string $level
     * @return $this
     */
    private static function message($title, $message, $level)
    {
        self::flash([
            'type' => $level,
            'content' => [
                'title' => $title,
                'message' => $message,
            ],
        ]);
    }

    /**
     * Get all notifications of session.
     *
     * @return array
     */
    public static function getAll()
    {
        return Session::get(static::NOTIFICATIONS_NAME);
    }

    /**
     * Get all notifications of session in json format.
     *
     * @return string
     */
    public static function getAllJson()
    {
        return json_encode(self::getAll());
    }

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    private static function flash($data)
    {   
        $dataInSession = Session::get(static::NOTIFICATIONS_NAME);

        $dataInSession[] = $data;

        Session::flash(static::NOTIFICATIONS_NAME, $dataInSession);
    }

    /**
     * Check if exist notifications in session.
     *
     * @return boolean
     */
    public static function hasNotification()
    {
        return Session::has(static::NOTIFICATIONS_NAME);
    }
}
