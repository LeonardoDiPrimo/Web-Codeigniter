<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Clase para mostrar tabla Editorial de la base Libreria
 * @author : Leonardo Di Primo
 * @version : 1.0
 * @since : 01/12/21
 */

class Editorial extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function index() {
		$this->global['pageTitle'] = 'Editoriales';

		$this->cargarEditoriales();
	}

	public function cargarEditoriales() {
		$crud = new grocery_CRUD();

		$crud->set_table('editorial');

		//Título de asunto para todas las operaciones CRUD
		$crud->set_subject('Editorial');

		//Modifico nombre de columnas
		$crud->display_as('telefono','Teléfono');
		$crud->display_as('direccion','Dirección');

		$output = $crud->render();

		$this->load->View("editorial",$output);
	}

}
