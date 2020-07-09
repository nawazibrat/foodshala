<?php

class MY_Controller extends CI_Controller{

    public function _construct()
    {
        if(! $this->isAuthorized())
        {
            return redirect('home');
        }
    }
}