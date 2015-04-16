<?php

namespace App\Controller;

class Welcome extends \App\Page {

    public function action_index() {
        if ($this->pixie->auth->user() != null) {
            $this->view->mail = $this->pixie->auth->user()->mail;
        } else {
            $this->redirect('/administrator');
        }
        $this->view->subview = '@welcome';
    }
}
