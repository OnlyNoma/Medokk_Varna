<?php

namespace App\Controller;

class Index extends \App\Page {

    public function action_index() {
        $this->view->subview = 'news';
        $this->view->username = 'kostia';
        $this->view->userlastname = 'stefanovitch';
        $this->view->alertMessage = null;

        $this->view->vr_count = $this->pixie->orm->get('recall')->count_all();
        $this->view->recall = $this->pixie->orm->get('recall')->find_all();
    }

}
