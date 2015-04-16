<?php

namespace App\Controller;

class Questions extends \App\Page {

    public function action_index() {

        $this->view->username = 'kostia';
        $this->view->userlastname = 'stefanovitch';
        $this->view->subview = 'questions';
        $this->view->alertMessage = null;

        $this->view->vr_count = $this->pixie->orm->get('questions')->count_all();
        $this->view->questions = $this->pixie->orm->get('questions')->find_all();
    }

    public function action_answer()
    {
        $this->view->username = 'kostia';
        $this->view->userlastname = 'stefanovitch';

        $id = $this->request->param('id');

        $this->view->subview = 'questions_answer';
        $this->view->alertMessage = null;
        $this->view->_id = $id;
        $this->view->questions = $this->pixie->orm->get('questions')->where('id','=',$id)->find();

        if($this->request->method == "POST") {
            $questions = $this->pixie->orm->get('questions')->where('id', '=', $id)->find();
            if ($questions->loaded()) {
                $questions->answer = $this->request->post('answer');
                $questions->save();
                $this->view->alertMessage = null;

                $this->redirect('/questions');
            }
        }
    }

    public function action_delete()
    {

        $id = $this->request->param('id');
        if ($id) {
            $d = $this->pixie->orm->get('questions')->where('id','=',$id)->find();
            $d->delete();
        }else{
            $_dell = $this->request->post('dell');

            foreach($_dell as $dell){
                $d = $this->pixie->orm->get('questions')->where('id','=',$dell)->find();
                $d->delete();
            }
        }

        $this->redirect('/questions');
    }

}