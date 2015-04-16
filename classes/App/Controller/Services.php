<?php

namespace App\Controller;

class Services extends \App\Page {

    public function action_index() {
        if ($this->pixie->auth->user() != null) {
            $this->view->username = $this->pixie->auth->user()->name;
            $this->view->userlastname = $this->pixie->auth->user()->lastname;
        } else {
            $this->redirect('/administrator');
        }
        $this->view->subview = '@services';
        $this->view->alertMessage = null;

        $this->view->vr_count = $this->pixie->orm->get('services')->count_all();
        $this->view->services = $this->pixie->orm->get('services')->find_all();
    }

    public function action_add()
    {
        if ($this->pixie->auth->user() != null) {
            $this->view->username = $this->pixie->auth->user()->name;
            $this->view->userlastname = $this->pixie->auth->user()->lastname;
        } else {
            $this->redirect('/administrator');
        }

        $this->view->subview = '@services_add';
        $this->view->alertMessage = null;

        if ($this->request->method == 'POST') {
            $v = $this->pixie->orm->get('services');
            $v->title = $this->request->post('title');
            $v->description = $this->request->post('description');
            $v->price = $this->request->post('price');
            $v->save();

            $this->view->alertMessage = null;
        } else {
            //$this->view->alertMessage = "Не можливо додати";
        }
    }

    public function action_edit()
    {
        if ($this->pixie->auth->user() != null) {
            $this->view->username = $this->pixie->auth->user()->name;
            $this->view->userlastname = $this->pixie->auth->user()->lastname;
        } else {
            $this->redirect('/administrator');
        }

        $id = $this->request->param('id');

        $this->view->subview = '@services_edit';
        $this->view->alertMessage = null;
        $this->view->_id = $id;
        $this->view->services = $this->pixie->orm->get('services')->where('id','=',$id)->find();

        if($this->request->method == "POST") {
            $services = $this->pixie->orm->get('services')->where('id', '=', $id)->find();
            if ($services->loaded()) {
                $services->title = $this->request->post('title');
                $services->description = $this->request->post('description');
                $services->price = $this->request->post('price');

                $services->save();
                $this->view->alertMessage = null;

                $this->redirect('/services');
            }
        }
    }

    public function action_delete()
    {

        $id = $this->request->param('id');
        if ($id) {
            $d = $this->pixie->orm->get('services')->where('id','=',$id)->find();
            $d->delete();
        }else{
            $_dell = $this->request->post('dell');

            foreach($_dell as $dell){
                $d = $this->pixie->orm->get('services')->where('id','=',$dell)->find();
                $d->delete();
            }
        }

        $this->redirect('/services');
    }

}