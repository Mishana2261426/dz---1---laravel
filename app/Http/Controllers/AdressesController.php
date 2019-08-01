<?php

namespace App\Http\Controllers;

class AdressesController extends Controller {

	public function index() {
		$is_auth = session() -> get('is_auth');

		if (!$is_auth) {
			return redirect('/login');
		}

		return view('adresses');
	}

	public function add() {
		$list = array($_POST['number'], $_POST['place_name'], $_POST['street'], $_POST['home'], $_POST['apartament']);

		$fp = fopen('file.csv', 'a');
		fputcsv($fp, $list, ';');
		fclose($fp);

		return redirect('/adresses_book');
	}
}