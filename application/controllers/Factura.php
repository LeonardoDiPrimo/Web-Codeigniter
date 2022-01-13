<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Clase para mostrar tabla Factura de la base Libreria
 * @author : Leonardo Di Primo
 * @version : 1.0
 * @since : 01/12/21
 */

class Factura extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function index() {
		$this->global['pageTitle'] = 'Facturas';

		$this->cargarFacturas();
	}

	public function cargarFacturas() {
		$crud = new grocery_CRUD();

		$crud->set_table('factura');

		//Título de asunto para todas las operaciones CRUD
		$crud->set_subject('Factura');

		//Relaciones de tablas
		$crud->set_relation('idCliente','cliente','{nombre} {apellido}');
		$crud->set_relation('idLibro','libro','{titulo}');

		//Modifico nombre de columnas
		$crud->display_as('idCliente','Cliente');
		$crud->display_as('idLibro','Libro');
		$crud->display_as('fecha','Fecha de Compra');

		//No permitir la eliminación de registros.
		$crud->unset_delete();

		$output = $crud->render();

		$this->load->View("factura",$output);
	}

}
