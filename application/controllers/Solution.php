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

	public function enterprise()
	{
		$this->load->view('header');
		$this->load->view('enterprise');
		$this->load->view('footer');
	}

	public function digital()
	{
		$this->load->view('header');
		$this->load->view('digital');
		$this->load->view('footer');
	}

	public function streaming()
	{
		$this->load->view('header');
		$this->load->view('streaming');
		$this->load->view('footer');
	}

	public function datacenter()
	{
		$this->load->view('header');
		$this->load->view('datacenter');
		$this->load->view('footer');
	}

	public function support()
	{
		$this->load->view('header');
		$this->load->view('support');
		$this->load->view('footer');
	}
	
}
