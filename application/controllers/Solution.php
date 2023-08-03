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

	public function details()
	{
		$this->load->view('header');
		$this->load->view('solution_details');
		$this->load->view('footer');
	}
	
}
