<?php 
/*
 * Users Class
 * Handels register and login
 */
class Users extends Controller
{
	
	function __construct()
	{
		$this->userModel = $this->model('User');	
	}
	public function register() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			//process form
			//sanitize post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			//init data
			$data = [
				'name' => trim($_POST['name']),
				'email' => trim($_POST['email']),
				'password' => trim($_POST['password']),
				'confirm_password' => trim($_POST['confirm_password']),
				'name_err' => '',
				'email_err' => '',
				'password_err' => '',
				'confirm_password_err' => ''
				];

				// Validate email
				if(empty($data['email'])){
					$data['email_err'] = "Please, enter email address";
				} else {
					//check email
					if($this->userModel->findUserByEmail($data['email'])){
						$data['email_err'] = "Email is taken";
					}
				}
				//validate name
				if(empty($data['name'])) {
					$data['name_err'] = "Please, enter name";
				}
				//validate password and check password length
				if(empty($data['password'])) {
					$data['password_err'] = "Please, enter password";
				} elseif(strlen($data['password'] < 6)) {
					$data['password_err'] = "Password shouldn't be less than 6 characters";
				}
				//validate confirm password
				if(empty($data['confirm_password'])) {
					$data['confirm_password_err'] = "Please, confirm password";
				} else {
					if($data['password'] != $data['confirm_password']) {
						$data['confirm_password_err'] = "Passwords do not match";
					}
				}
				//Make sure errors are empty
				if(empty($data['email_err']) && empty($data['password_err'])
				&& empty($data['name_err'])	&& empty($data['confirm_password_err'])){
					//Validated
					//hash password
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
					//register user
				if($this->userModel->register($data)){
					flash('register_success', 'You are registered and can log in!');
					redirect('users/login');
				} else {
					die("Something went wrong");
				}

				} else {
					//load view with errors
					$this->view('users/register', $data);
				}

		} else {
			
			//init data
			$data = [
				'name' => '',
				'email' => '',
				'password' => '',
				'confirm_password' => '',
				'name_err' => '',
				'email_err' => '',
				'password_err' => '',
				'confirm_password_err' => ''
				];
			//load view
				$this->view('users/register', $data);
		}

		}
		public function login() {
		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			//process form
			//sanitize post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			//init data
			$data = [
				'email' => trim($_POST['email']),
				'password' => trim($_POST['password']),
				'password_err' => '',
				'email_err' => ''
			];

			// Validate email
				if(empty($data['email'])){
					$data['email_err'] = "Please, enter email address";
				}
				if(empty($data['password'])) {
					$data['password_err'] = "Please, enter password";
				}
				//check for user/email
				if($this->userModel->findUserByEmail($data['email'])){
					//user found
				}else{
					//user not found
					$data['email_err'] = 'No user found';
				}

				if(empty($data['email_err'] && $data['password_err'])){
					//Validated
			    //check and set loggeed in user
					$loggedInUser = $this->userModel->login($data['email'], $data['password']);
					if($loggedInUser){
						///create session variables
						$this->createUserSession($loggedInUser);
					} else {
						$data['password_err'] = "Password incorrect";
						$this->view('users/login' , $data);
					}

				} else {
				//load view with errors
				$this->view('users/login', $data);
				}
		} else {
			//init data
			$data = [
				'email' => '',
				'password' => '',
				'password_err' => '',
				'email_err' => ''
				];
			//load view
				$this->view('users/login', $data);
		}

		}

		public function createUserSession($user){
			$_SESSION['user_id'] = $user->id;
			$_SESSION['user_email'] = $user->email;
			$_SESSION['user_name'] = $user->name;
			redirect('posts');
		}

		public function logout(){
			unset($_SESSION['user_id']);
			unset($_SESSION['user_email']);
			unset($_SESSION['user_name']);
			session_destroy();
			redirect('users/login');
		}

	
	}









 ?>