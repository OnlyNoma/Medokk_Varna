<?php

namespace App;

/**
 * Base controller
 *
 * @property-read \App\Pixie $pixie Pixie dependency container
 */
class Page extends \PHPixie\Controller {

	protected $view;
	protected $view_admin;

	public function before() {
		$this->view = $this->pixie->view('main');
		//$this->view_admin = $this->pixie->view('main_adm');
	}

	public function after() {
		$this->response->body = $this->view->render();
		//$this->response->body = $this->view_admin->render();
	}

}
