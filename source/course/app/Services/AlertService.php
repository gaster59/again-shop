<?php

namespace App\Services;

use Session;

class AlertService
{
    private $__typeDanger  = "danger";
    private $__typeSuccess = "success";
    private $__typeWarning = "warning";

    /**
     * @method saveSessionSuccess
     * @param string $message
     * @return Session
     */
    public function saveSessionSuccess($message)
    {
        Session::flash('alertType', $this->__typeSuccess);
        Session::flash('alertMessage', $message);
    }

    /**
     * @method saveSessionDanger
     * @param string $message
     * @return Session
     */
    public function saveSessionDanger($message)
    {
        Session::flash('alertType', $this->__typeDanger);
        Session::flash('alertMessage', $message);
    }

    /**
     * @method saveSessionWarning
     * @param string $message
     * @return Session
     */
    public function saveSessionWarning($message)
    {
        Session::flash('alertType', $this->__typeWarning);
        Session::flash('alertMessage', $message);
    }
}
