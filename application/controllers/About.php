<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	/** ------------------------------------------------------- **
	 **           MANDATORY SCRIPT
    /** ------------------------------------------------------- **/
	public function company()
	{
		$this->load->view('header');
		$this->load->view('about_us');
		$this->load->view('footer');
	}
	public function message()
	{
		$this->load->view('header');
		$this->load->view('message');
		$this->load->view('footer');
	}
	public function management()
	{
		$this->load->view('header');
		$this->load->view('management');
		$this->load->view('footer');
	}
}
