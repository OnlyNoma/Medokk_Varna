<?php

namespace App\Controller;

class Administrator extends \App\Page {

    public function action_index() {
        $this->view->subview = 'auth';

        if($this->request->method == 'POST'){
            $email = $this->request->post('mail');
            $password = $this->request->post('pass');

            $logged = $this->pixie->auth
                ->provider('password')
                ->login($email, $password);
            if ($logged)
                $this->redirect('/welcome');
        }
    }

}
