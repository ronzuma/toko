<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notfound extends MY_Controller {
	public function index(){
		$this->output->set_status_header('404');
		$this->template->render('notfoundview', array());
	}

}