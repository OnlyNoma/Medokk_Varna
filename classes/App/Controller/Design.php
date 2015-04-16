<?php

namespace App\Controller;

class Design extends \App\Page {

    public function action_index() {
        $this->view->subview = 'design';
    }

}
