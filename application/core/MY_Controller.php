<?php 
//prevent access to non-users
class Auth_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('user_id'))
        { 
            redirect('/welcome');
        }
    }
} ?>