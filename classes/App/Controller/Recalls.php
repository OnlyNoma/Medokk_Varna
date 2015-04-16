<?php

namespace App\Controller;

class Recalls extends \App\Page {

    public function action_index() {

        $this->view->username = 'kostia';
        $this->view->userlastname = 'stefanovitch';
        $this->view->subview = 'recalls';
        $this->view->alertMessage = null;

        $this->view->vr_count = $this->pixie->orm->get('recalls')->count_all();
        $this->view->recalls = $this->pixie->orm->get('recalls')->find_all();
    }

    public function action_delete()
    {

        $id = $this->request->param('id');
        if ($id) {
            $d = $this->pixie->orm->get('recalls')->where('id','=',$id)->find();
            $d->delete();
        }else{
            $_dell = $this->request->post('dell');

            foreach($_dell as $dell){
                $d = $this->pixie->orm->get('recalls')->where('id','=',$dell)->find();
                $d->delete();
            }
        }

        $this->redirect('/recalls');
    }

}