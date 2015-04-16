<?php

namespace App\Controller;

class News extends \App\Page {

    public function action_index() {

        $this->view->username = 'kostia';
        $this->view->userlastname = 'stefanovitch';
        $this->view->subview = 'news';
        $this->view->alertMessage = null;

        $this->view->vr_count = $this->pixie->orm->get('news')->count_all();
        $this->view->news = $this->pixie->orm->get('news')->find_all();
    }

    public function action_add()
    {
        $this->view->username = 'kostia';
        $this->view->userlastname = 'stefanovitch';

        $this->view->subview = 'news_add';
        $this->view->alertMessage = null;

        if ($this->request->method == 'POST') {
            $v = $this->pixie->orm->get('news');
            $v->title = $this->request->post('title');
            $v->text = $this->request->post('text');
            $v->save();

            $this->view->alertMessage = null;
        } else {
            //$this->view->alertMessage = "Не можливо додати";
        }
    }

    public function action_edit()
    {
        $this->view->username = 'kostia';
        $this->view->userlastname = 'stefanovitch';

        $id = $this->request->param('id');

        $this->view->subview = 'news_edit';
        $this->view->alertMessage = null;
        $this->view->_id = $id;
        $this->view->news = $this->pixie->orm->get('news')->where('id','=',$id)->find();

        if($this->request->method == "POST") {
            $news = $this->pixie->orm->get('news')->where('id', '=', $id)->find();
            if ($news->loaded()) {
                $news->title = $this->request->post('title');
                $news->text = $this->request->post('text');

                $news->save();
                $this->view->alertMessage = null;

                $this->redirect('/news');
            }
        }
    }

    public function action_delete()
    {
        if ($this->pixie->auth->user() != null) {
            $this->view->username = $this->pixie->auth->user()->name;
            $this->view->userlastname = $this->pixie->auth->user()->lastname;
        } else {
            $this->redirect('/');
        }

        $id = $this->request->param('id');
        if ($id) {
            $d = $this->pixie->orm->get('news')->where('id','=',$id)->find();
            $d->delete();
        }else{
            $_dell = $this->request->post('dell');

            foreach($_dell as $dell){
                $d = $this->pixie->orm->get('news')->where('id','=',$dell)->find();
                $d->delete();
            }
        }

        $this->redirect('/recall');
    }

}