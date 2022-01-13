<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Clase para mostrar tabla Categoria de la base Libreria
 * @author : Leonardo Di Primo
 * @version : 1.0
 * @since : 01/12/21
 */

class Categoria extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function index() {
		$this->global['pageTitle'] = 'Categorias';

		$this->cargarCategorias();
	}

	public function cargarCategorias() {
		$crud = new grocery_CRUD();

		$crud->set_table('categoria');

		//Título de asunto para todas las operaciones CRUD
		$crud->set_subject('Categoría');

		//Modifico nombre de columnas
		$crud->display_as('nombre','Género');
		$crud->display_as('descripcion','Descripción');

		$output = $crud->render();

		$this->load->View("editorial",$output);
	}

}
