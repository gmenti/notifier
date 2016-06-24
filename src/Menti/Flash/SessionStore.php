<?php 

namespace Menti\Flash;

interface SessionStore {

    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($data);

    /**
     * Get all flash notifications in session.
     *
     * @return array
     */
    public function getAll();

    /**
     * Check if exist flash notifications in session.
     *
     * @return string
     */
    public function hasNotification();

} 