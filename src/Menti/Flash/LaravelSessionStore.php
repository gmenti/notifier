<?php namespace Menti\Flash;

use Illuminate\Session\Store;

class LaravelSessionStore implements SessionStore {

    /**
     * @var Store
     */
    private $session;

    /**
     * @param Store $session
     */
    function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($data)
    {   
        $dataInSession = $this->session->get('flash_notifications');
        $dataInSession[] = $data;

        $this->session->flash('flash_notifications', $dataInSession);
    }

}