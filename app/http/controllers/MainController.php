<?php

class MainController
{
	public function index()
	{
		$user = User::find(1);
		$params = ['name' => $user->name, 'email' => $user->email];
		Response::render('home', $params);
	}

	public function about()
	{
		echo "Hola desde about";
	}
}