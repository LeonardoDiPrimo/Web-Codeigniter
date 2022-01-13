<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Clase para mostrar tabla Autor de la base Libreria
 * @author : Leonardo Di Primo
 * @version : 1.0
 * @since : 01/12/21
 */

class Autor extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function index() {
		$this->global['pageTitle'] = 'Autores';

		$this->cargarAutores();
	}

	public function cargarAutores() {
		$crud = new grocery_CRUD();

		$crud->set_table('autor');

		//Título de asunto para todas las operaciones CRUD
		$crud->set_subject('Autor');

		//Modifico nombre de columnas
		$crud->display_as('fechaDeNacimiento','Fecha de Nacimiento');

		$output = $crud->render();
		$this->load->View("autor",$output );
	}

}
