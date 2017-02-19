<?php

class MainController
{
	public function actionIndex()
	{
		$user = User::find(1);
		$params = ['name' => $user->name, 'email' => $user->email];
		Response::render('home', $params);
	}

	public function actionAbout()
	{
		echo "Hola desde about";
	}
}