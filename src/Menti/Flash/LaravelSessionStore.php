<?php 

namespace Menti\Flash;

use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore 
{
    /**
     * @var Store
     */
    private $session;

    /**
     * @var string
     */
    private $name;

    /**
     * @param Store $session
     */
    function __construct(Store $session)
    {
        $this->session = $session;
        $this->name = 'flash_notifications';
    }

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($data)
    {   
        $dataInSession = $this->session->get($this->name);
        $dataInSession[] = $data;

        $this->session->flash($this->name, $dataInSession);
    }

    /**
     * Get all flash notifications in session.
     *
     * @return array
     */
    public function getAll()
    {
        return $this->session->get($this->name);
    }

    /**
     * Check if exist flash notifications in session.
     *
     * @return string
     */
    public function hasNotification()
    {
        return $this->session->has($this->name);
    }
}