<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Clase para mostrar tabla Clientes de la base Libreria
 * @author : Leonardo Di Primo
 * @version : 1.0
 * @since : 01/12/21
 */

class Cliente extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function index() {
		$this->global['pageTitle'] = 'Clientes';

		$this->cargarClientes();
	}

	public function cargarClientes() {
		$crud = new grocery_CRUD();

		$crud->set_table('cliente');

		//Título de asunto para todas las operaciones CRUD
		$crud->set_subject('Cliente');

		//Modifico nombre de columnas
		$crud->display_as('direccion','Dirección');
		$crud->display_as('telefono','Teléfono');

		$output = $crud->render();

		$this->load->View("cliente",$output);
	}

}
