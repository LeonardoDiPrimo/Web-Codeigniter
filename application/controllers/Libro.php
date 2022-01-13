<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Clase para mostrar tabla Libro de la base Libreria
 * @author : Leonardo Di Primo
 * @version : 1.0
 * @since : 01/12/21
 */

class Libro extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function index() {
		$this->global['pageTitle'] = 'Libros';

		$this->cargarLibros();
	}

	public function cargarLibros() {
		$crud = new grocery_CRUD();

		$crud->set_table('libro');

		//Título de asunto para todas las operaciones CRUD
		$crud->set_subject('Libro');

		//Relaciones de tablas
		$crud->set_relation('idAutor','autor','{nombre} {apellido}');
		$crud->set_relation('idEditorial','editorial','nombre');
		$crud->set_relation('idCategoria','categoria','nombre');

		//Modifico nombre de columnas
		$crud->display_as('idAutor','Autor');
		$crud->display_as('idEditorial','Editorial');
		$crud->display_as('idCategoria','Categoría');
		$crud->display_as('titulo','Título');
		$crud->display_as('descripcion','Descripción');

		//Establece los campos obligatorios de agregar y editar campos.
		//$crud->required_fields('titulo');

		$output = $crud->render();

		$this->load->View("libro",$output);
	}

}
