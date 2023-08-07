<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Solution extends CI_Controller
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
		$this->load->view('header');
		$this->load->view('solution');
		$this->load->view('footer');
	}

	public function detail($seo)
	{
		$this->load->model("Solution_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["seo_slug"] = $seo;
		$model_filter->get_first = true;
		$solution = $this->Solution_model->search($model_filter);

		$this->load->model("Solution_category_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["id"] = $solution->solution_category_id;
		$model_filter->order_by = 'id ASC';
		$model_filter->get_first = true;
		$solution_category = $this->Solution_category_model->search($model_filter);

		// echo '<pre>';
		// print_r($solution_category);
		// exit();

		$this->load->view('header');
		$this->load->view('solution_details', compact('solution','solution_category'));
		$this->load->view('footer');
	}

	public function enterprise()
	{
		$this->load->model("Solution_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["solution_category_id"] = "1";
		$model_filter->order_by = 'id ASC';
		$solution = $this->Solution_model->search($model_filter);

		$this->load->model("Solution_category_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["id"] = "1";
		$model_filter->order_by = 'id ASC';
		$model_filter->get_first = true;
		$solution_category = $this->Solution_category_model->search($model_filter);

		// echo '<pre>';
		// print_r($solution_category);
		// exit();

		$this->load->view('header');
		$this->load->view('enterprise', compact('solution', 'solution_category'));
		$this->load->view('footer');
	}

	public function digital()
	{
		$this->load->model("Solution_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["solution_category_id"] = "3";
		$model_filter->order_by = 'id ASC';
		$solution = $this->Solution_model->search($model_filter);

		$this->load->model("Solution_category_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["id"] = "3";
		$model_filter->order_by = 'id ASC';
		$model_filter->get_first = true;
		$solution_category = $this->Solution_category_model->search($model_filter);

		// echo '<pre>';
		// print_r($solution);
		// exit();

		$this->load->view('header');
		$this->load->view('digital', compact('solution', 'solution_category'));
		$this->load->view('footer');
	}

	public function streaming()
	{
		$this->load->model("Solution_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["solution_category_id"] = "4";
		$model_filter->order_by = 'id ASC';
		$solution = $this->Solution_model->search($model_filter);

		$this->load->model("Solution_category_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["id"] = "4";
		$model_filter->order_by = 'id ASC';
		$model_filter->get_first = true;
		$solution_category = $this->Solution_category_model->search($model_filter);

		$this->load->view('header');
		$this->load->view('streaming', compact('solution', 'solution_category'));
		$this->load->view('footer');
	}

	public function datacenter()
	{
		$this->load->model("Solution_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["solution_category_id"] = "2";
		$model_filter->order_by = 'id ASC';
		$solution = $this->Solution_model->search($model_filter);

		$this->load->model("Solution_category_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["id"] = "2";
		$model_filter->order_by = 'id ASC';
		$model_filter->get_first = true;
		$solution_category = $this->Solution_category_model->search($model_filter);

		$this->load->view('header');
		$this->load->view('datacenter', compact('solution', 'solution_category'));
		$this->load->view('footer');
	}

	public function support()
	{
		$this->load->model("Solution_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["solution_category_id"] = "5";
		$model_filter->order_by = 'id ASC';
		$solution = $this->Solution_model->search($model_filter);

		$this->load->model("Solution_category_model");
		$model_filter = new stdClass();
		$model_filter->where["status"] = "ACTIVATE";
		$model_filter->where["id"] = "5";
		$model_filter->order_by = 'id ASC';
		$model_filter->get_first = true;
		$solution_category = $this->Solution_category_model->search($model_filter);

		$this->load->view('header');
		$this->load->view('support', compact('solution', 'solution_category'));
		$this->load->view('footer');
	}
}
