<?php 
class Pages extends Controller {
	public function __construct() {
	}
	public function index(){
		if(isLoggedIn()){
			redirect('posts');
		}
		$data = [
			'title' => 'Posts Crud Application',
			'description' => 'Simple social network with JeihunsMVC Framework'
		];
		$this->view('pages/index', $data);
	}
	public function about() {
		$data = [
			'title' => 'About Page',
			'description' => 'This is a simple PHP playground app built with JeihunsMVC',
			'version' => '1.0.0',
			'extra' => 'It is currently on development stage'
		];
		$this->view('pages/about', $data);
	}
	public function products(){
		$data = [
			'title' => 'Products page'
		];
		$this->view('products/index', $data);
	}
}


 ?>