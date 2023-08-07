<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	/** ------------------------------------------------------- **
	 **           MANDATORY SCRIPT
    /** ------------------------------------------------------- **/
	public function index()
	{
		$this->load->model("Solution_category_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->order_by = 'id ASC';
		$Solution_category = $this->Solution_category_model->search($model_filter);
		

		$this->load->view('header');
		$this->load->view('index',compact('Solution_category'));
		$this->load->view('footer');
	}
}
