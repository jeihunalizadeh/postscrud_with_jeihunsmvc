<?php 
class Pages extends Controller {
	public function __construct() {
	}
	public function index(){
		$data = [
			'title' => 'Posts Crud Application',
			'description' => 'Simple social network with JeihunsMVC Framework'
		];
		$this->view('pages/index', $data);
	}
	public function about() {
		$data = [
			'title' => 'About Page'
		];
		$this->view('pages/about');
	}
}


 ?>