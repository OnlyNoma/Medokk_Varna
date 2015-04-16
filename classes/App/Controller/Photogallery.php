<?php

namespace App\Controller;

class Photogallery extends \App\Page {

    public function action_index() {
        if ($this->pixie->auth->user() != null) {
            $this->view->username = $this->pixie->auth->user()->name;
            $this->view->userlastname = $this->pixie->auth->user()->lastname;
        } else {
            $this->redirect('/administrator');
        }
        $this->view->subview = '@photo_adm';

        $this->view->ph = $this->pixie->orm->get('photogalery')->find_all();
        $this->view->category = $this->pixie->orm->get('category')->find_all();
        $this->view->ph_count = $this->pixie->orm->get('photogalery')->count_all();

    }

    public function action_add() {
        if($this->request->is_ajax()){
            $this->view->subview = 'empty';
            $a = $this->pixie->orm->get('category');
            $a->title = $_POST['cat'];
            $a->save();
            echo "yes";
            return;
        }
        if ($this->pixie->auth->user() != null) {
            $this->view->username = $this->pixie->auth->user()->name;
            $this->view->userlastname = $this->pixie->auth->user()->lastname;
        } else {
            $this->redirect('/administrator');
        }
        $this->view->subview = '@photo_adm_add';

        $this->view->ph = $this->pixie->orm->get('photogalery')->find_all();
        $this->view->category = $this->pixie->orm->get('category')->find_all();
        $this->view->ph_count = $this->pixie->orm->get('photogalery')->count_all();

        if($this->request->method == 'POST'){
            foreach($_FILES['photo']['name'] as $k=>$f) {
                $photo = "";
                if (!$_FILES['photo']['error'][$k]) {
                    if (is_uploaded_file($_FILES['photo']['tmp_name'][$k])) {
                        $new_file_name = (strtolower($_FILES['photo']['name'][$k]));
                        if ($_FILES['photo']['size'][$k] > (8024000)) {
                            $photo = "";
                        }
                        if (!move_uploaded_file($_FILES['photo']['tmp_name'][$k], 'img/photos/' . $new_file_name)) {
                            $photo = "";
                        } else {
                            $photo = $new_file_name;
                        }
                        if ($photo != '') {
                            $a = $this->pixie->orm->get('photogalery');
                            $a->id_categories = $this->request->post('category');
                            $a->path = $new_file_name;
                            $a->save();
                        }
                    }
                }
            }
        }
    }

    public function action_delete() {
        if ($this->pixie->auth->user() != null) {
            $this->view->username = $this->pixie->auth->user()->name;
            $this->view->userlastname = $this->pixie->auth->user()->lastname;
        } else {
            $this->redirect('/administrator');
        }

        $this->view->category_all = $this->pixie->orm->get('category')->find_all();

        //if($this->request->method == 'POST'){
            $id = $this->request->param('id');
            if($id){
                $photo = $this->pixie->orm->get('photogalery')->where('id','=',$id)->find();
                if(file_exists('img/photos/' . $photo->path)) {
                    unlink('img/photos/' . $photo->path);
                    $photo->delete();
                }
            }else{
                $_dell = $this->request->post('dell');
                foreach($_dell as $dell){
                    $photo = $this->pixie->orm->get('photogalery')->where('id','=',$dell)->find();
                    if(file_exists('img/photos/' . $photo->path)) {
                        unlink('img/photos/' . $photo->path);
                    }
                    $photo->delete();
                }
            }
            $this->redirect('/photogallery');
        //}
    }

}
