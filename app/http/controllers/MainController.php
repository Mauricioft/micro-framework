<?php

class MainController
{
	public function index()
	{
		$params = ['greeting' => 'Hola Mundo Mauricio'];
		Response::render('home', $params);
	}

	public function about()
	{
		echo "Hola desde about";
	}
}