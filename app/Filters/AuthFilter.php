<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
	public function before(RequestInterface $request)
	{
		$session = session();
		
		if (md5($session->user_login.$session->user_id.session_id()) != $session->user_secret) {
			return redirect()->to('/login/auth');
		}
	}
	
	//--------------------------------------------------------------------
	
	public function after(RequestInterface $request, ResponseInterface $response)
	{
		// Do something here
	}
}