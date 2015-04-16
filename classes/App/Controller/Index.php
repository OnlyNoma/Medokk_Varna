<?php

namespace App\Controller;

class Index extends \App\Page {

    public function action_index() {
        if ($this->pixie->auth->user() != null) {
            $this->view->username = $this->pixie->auth->user()->name;
            $this->view->userlastname = $this->pixie->auth->user()->lastname;
        } else {
            $this->redirect('/administrator');
        }
        $this->view->alertMessage = null;

        $this->view->vr_count = $this->pixie->orm->get('recall')->count_all();
        $this->view->recall = $this->pixie->orm->get('recall')->find_all();
    }

}
