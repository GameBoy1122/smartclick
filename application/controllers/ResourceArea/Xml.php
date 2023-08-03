<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xml extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function test()
	{
        $database = $this->load->database("master_modify", true);

        $request = $this->input->post("request");
        $date = date("Y-m-d H:i:s");

        $sql = "INSERT INTO node_receiver(request, date) VALUE ('$request', '$date');";

        $database->query($sql);

        echo "SUCCESS";
	}

    public function get()
    {
        $database = $this->load->database("master_query", true);

        $sql = "SELECT * FROM node_receiver";

        $results = $database->query($sql)->result();

        foreach($results as $result)
        {
            
        }
    }
}