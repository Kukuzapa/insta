<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ContactModel;
use App\Models\FavouriteModel;

class Home extends BaseController
{
	public function login( $action )
	{
		return view('auth',[ 'action' => $action ]);
	}
	
	public function addfavourite()
	{
		$favourites = new FavouriteModel();
		$session = session();
		$builder = $favourites->builder();
		$contacts = new ContactModel();
		
		$favourite = [
			'user_id' => $session->user_id,
			'contact_id' => $_POST['contact_id']
		];
		
		$isFavourite = $builder->getWhere($favourite)->getFirstRow();
		
		if (empty($isFavourite)){
			$favourites->insert($favourite);
			$contact = $contacts->find($_POST['contact_id']);
			
			$data = "
				<div class=\"col-12 mt-1\">
					<div class=\"row\">
						<div class=\"col-12\">{$contact->contact_name}</div>
					</div>
				</div>
			";
			
			echo $data;
		}
	}
	
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to('/login/auth');
	}
	
	public function index()
	{
		$session = session();
		$contacts = new ContactModel();
		$favourites = new FavouriteModel();
		
		$cntList = $contacts->findAll();
		
		$fvrList = $favourites->favouritesList($session->user_id);
		
		return view('main', ['contacts'=>$cntList,'login'=>$session->user_login,'favourites'=>$fvrList] );
	}
	
	public function auth()
	{
		$users   = new UserModel();
		$builder = $users->builder();
		$session = session();
		
		$isAuth = $builder->getWhere(['user_login'=>$_POST['login'],'user_password'=>md5($_POST['password'].$_POST['login'].$_POST['password'])])->getFirstRow();
		
		if (empty($isAuth)) {
			return view('auth', [ 'errA' => 'Неверный логин/пароль.', 'action' => 'auth' ] );
		} else {
			$session->set([
				'user_id' => $isAuth->user_id,
				'user_login' => $isAuth->user_login,
				'user_secret' => md5($isAuth->user_login.$isAuth->user_id.session_id())
			]);
			return redirect()->to('/');
		}
	}
	
	public function reg()
	{
		$login    = null;
		$password = null;
		$repass   = null;
		$users    = new UserModel();
		$builder  = $users->builder();
		
		if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['repass'])){
			return view('auth', [ 'errR' => 'Все поля должны быть заполнены', 'action' => 'reg' ] );
		} else {
			$login = esc($_POST['login']);
			$password = esc($_POST['password']);
			$repass = esc($_POST['repass']);
			
			$isDouble = $builder->getWhere(['user_login'=>$login])->getFirstRow();
			
			if (!empty($isDouble)) {
				return view('auth', [ 'errR' => 'Уже есть пользователь с данным именем', 'action' => 'reg' ] );
			} else if ($password != $repass) {
				return view('auth', [ 'errR' => 'Поля пароль и подтверждение пароля не совпадвют', 'action' => 'reg' ] );
			} else {
				$user = [
					'user_login' => $login,
					'user_password'=> md5($password.$login.$password)
				];
				$users->insert($user);
				return view('auth', [ 'sucR' => 'Пользователь зарегистрирован', 'action' => 'reg' ] );
			}
		}
	}
}
