<?php namespace App\Master\Controllers;

use App\Master\Models\Usuario;

class UsuarioController
{
	public function list($request = [])
	{
		$list = Usuario::get()->toArray();
		return json_encode($list, JSON_UNESCAPED_UNICODE);
	}
}