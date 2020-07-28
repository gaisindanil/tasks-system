<?php namespace App\Controllers;
use CodeIgniter\HTTP\RequestInterface;

class Home extends BaseController
{   

	public function index(){

		$tasksModel = model('App\Models\TasksModel');

		$title = "Система упрвления задачами";
		
		$data = $tasksModel->findAll();
		$session = \Config\Services::session();
		$logged_in = $session->get('logged_in');

		$content = view('home', ['data' => $data, 'logged_in' => $logged_in]);
		echo view("layout", ['content' => $content, 'title' => $title]);
		
	}

	public function createTask(){
		$title = "Добавить новую задачу";
		$tasksModel = model('App\Models\TasksModel');
		$session = \Config\Services::session();
		$logged_in = $session->get('logged_in');

		helper(['form', 'url']);
		
		
		$method = $this->request->getMethod(true);
	
		if($method == 'POST'){

        $val = $this->validate([
	        'name' => 'required',
	        'email' => 'required|valid_email',
	        'text'  => 'required|min_length[5]',
		]);
		}else{
			$val = null;
		}
		
		if(!$val){
			$content = view('create-task');
			echo view("layout", ['content' => $content, 'title' => $title, 'logged_in' => $logged_in]);
		}else{
			$tasksModel->save([
				'user_name' =>  $this->request->getPost('name'),
				'email' =>  $this->request->getPost('email'),
				'text' =>  strip_tags($this->request->getPost('text'))
			]);

			$content = view('success', ['message' => '<b>Спасибо!</b> Ваша задача успешно добавлено!<br/><small>Через 3 секунды вы автоматически будете переадресованы на главную страницу...</small>']);
			echo view("layout", ['content' => $content, 'title' => $title, 'logged_in' => $logged_in]);
		}

		
	}

	public function updateTask($id){
		$title = "Редактирование задачи #".$id;
		$tasksModel = model('App\Models\TasksModel');
		$session = \Config\Services::session();
		$logged_in = $session->get('logged_in');
		if(!$logged_in or !$task = $tasksModel->find($id))  throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

		if($this->request->getMethod(true) == 'POST'){
			$newdata = [
				'text' => $this->request->getPost('text'),
				'status' => $this->request->getPost('status'),
				'admin_update' => 1
			];
			$tasksModel->update($id, $newdata);

			$content = view('success', ['message' => "Задача #$id, успешно отредактирована! <br/><small>Через 3 секунды вы автоматически будете переадресованы на главную страницу...</small>"]);
		echo view("layout", ['content' => $content, 'title' => $title, 'logged_in' => $logged_in]);
		}else{
		$content = view('update-task', ['data' => $task]);
		echo view("layout", ['content' => $content, 'title' => $title, 'logged_in' => $logged_in]);
		}
	}

	public function taskСompleted($id){
		$tasksModel = model('App\Models\TasksModel');
		$session = \Config\Services::session();
		$logged_in = $session->get('logged_in');
		if(!$logged_in or !$task = $tasksModel->find($id))  throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		$newdata = [
			'status' => 1,
			'admin_update' => 1
		];
		$tasksModel->update($id, $newdata);
		if($logged_in) return redirect()->to(site_url('/')); 
	}

	
	public function auth(){
		$session = \Config\Services::session();
		$logged_in = $session->get('logged_in');
		if($logged_in) return redirect()->to(site_url('/')); 

		
		$title = "Авторизация";
		
		//default admin data
		$adminLogin = "admin";
		$adminPassword = "123";


		if($this->request->getMethod(true) == 'POST'){
		$validation = \Config\Services::validation();
		$validationResult = $this->validate([
			'login'  => 'required',
			'password'  => 'required',
		]); 

		if(!$validationResult) {
		$content = view('auth');
		echo view("layout", ['content' => $content, 'title' => $title, 'logged_in' => $logged_in]);
		}else{
			$session = \Config\Services::session();

			$login = $this->request->getVar('login');
			$password = $this->request->getVar('password');
			if($adminLogin === $login && $adminPassword === $password){
				//set session
				$newdata = [
					'login'  => $login,
					'logged_in' => TRUE
				];
			
				$session->set($newdata);

				$content = view('success', ['message' => "<b>Вы успешно авторизовались!</b><br/><small>Через 3 секунды вы автоматически будете переадресованы на главную страницу...</small>"]);
				echo view("layout", ['content' => $content, 'title' => $title, 'logged_in' => $logged_in]);
				
			}else{
				//error from post

				$content = view('auth', ['errorMessage' => "Неправильный логин или пароль, попробуйте еще раз..."]);
				echo view("layout", ['content' => $content, 'title' => $title, 'logged_in' => $logged_in]);
				

			}
		}
		
		
	
		}else{
		$content = view('auth');
		echo view("layout", ['content' => $content, 'title' => $title, 'logged_in' => $logged_in]);
		}
	}

		public function output(){
			$session = \Config\Services::session();
			$session->remove('login');
			$session->remove('logged_in');
			return redirect()->to(site_url('/')); 

		}
	
	

	//--------------------------------------------------------------------

}
