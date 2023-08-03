<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Product extends CI_Controller

{

    function __construct()

    {

        parent::__construct();
        $this->load->model("bannermain_model");
        $this->load->model("Product_model");
        $this->load->model("Type_model");
    }



    /** ------------------------------------------------------- **

     **           MANDATORY SCRIPT

    /** ------------------------------------------------------- **/

    public function index()

    {

        $page = new stdClass();

        $page->get_first = true;

        $page = $this->Product_model->search($page);



        $this->load->view("AdministratorArea/Product/Index", compact("page"));
    }

    public function edit($product_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

		/** ------------------------------------------------------- **/
        // $this->load->model("type_model");
        $this->load->model("bannermain_model");
        $this->load->library("encryption_library");
        $this->load->library("response_library");
        $this->load->library("guid_library");

        $products = $this->Product_model->search();


        /** ------------------------------------------------------- **

         **           POST PHASE

		/** ------------------------------------------------------- **/

        if ($this->input->post()) {

            if ($product_id != null) {

                $product = $this->Product_model->find($product_id);
            } else {

                $product = new stdClass();
            }

            $product->name_th = $this->input->post("name_th");

            $product->name_en = $this->input->post("name_en");

            $product->price = $this->input->post("price");

            $product->type_id = $this->input->post("type_id");

            $product->description_th = $this->input->post("description_th");

            $product->description_en = $this->input->post("description_en");

            $product->detail_th = $this->input->post("detail_th");

            $product->detail_en = $this->input->post("detail_en");

            $product->guide_th = $this->input->post("guide_th");

            $product->guide_en = $this->input->post("guide_en");

            $product->status = $this->input->post("status");

            if ($_FILES['img']['size']['th'] > 0) {
                $_FILES['upload_file']['name'] = $_FILES['img']['name']['th'];

                $_FILES['upload_file']['type'] = $_FILES['img']['type']['th'];

                $_FILES['upload_file']['tmp_name'] = $_FILES['img']['tmp_name']['th'];

                $_FILES['upload_file']['error'] = $_FILES['img']['error']['th'];

                $_FILES['upload_file']['size'] = $_FILES['img']['size']['th'];

                $fileName1 = date("YmdHis") . "_" . $this->guid_library->generate();

                $config1['file_name'] = $fileName1;

                $config1['upload_path'] = FCPATH . '/assets/uploads/product/';

                $config1['allowed_types'] = 'gif|jpg|png|jpeg';

                $config1['max_size'] = '0';

                $this->load->library('upload', $config1);

                $this->upload->initialize($config1);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data1 = $this->upload->data();

                $file_name1 = $upload_data1['file_name'];



                $product->img = $file_name1;
            }

            if ($_FILES['hover_img']['size']['th'] > 0) {
                $_FILES['upload_file']['name'] = $_FILES['hover_img']['name']['th'];

                $_FILES['upload_file']['type'] = $_FILES['hover_img']['type']['th'];

                $_FILES['upload_file']['tmp_name'] = $_FILES['hover_img']['tmp_name']['th'];

                $_FILES['upload_file']['error'] = $_FILES['hover_img']['error']['th'];

                $_FILES['upload_file']['size'] = $_FILES['hover_img']['size']['th'];

                $fileName2 = date("YmdHis") . "_" . $this->guid_library->generate();

                $config2['file_name'] = $fileName2;

                $config2['upload_path'] = FCPATH . '/assets/uploads/product/';

                $config2['allowed_types'] = 'gif|jpg|png|jpeg';

                $config2['max_size'] = '0';

                $this->load->library('upload', $config2);

                $this->upload->initialize($config2);

                $uploadCheck = $this->upload->do_upload("upload_file");

                $upload_data2 = $this->upload->data();

                $file_name2 = $upload_data2['file_name'];



                $product->hover_img = $file_name2;
            }

            $product_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

            if ($product_validated["code"] == "0x0000-00000") {

                $product_id = $this->Product_model->save($product);
                $this->response_library->responseJSON($product_validated["code"], $product_validated["message"]);
            } else {

                $this->response_library->responseJSON($product_validated["code"], $product_validated["message"]);
            }
        }



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

		/** ------------------------------------------------------- **/

        $product = $this->Product_model->find($product_id);


        $model_filter = new stdClass();

        $type = $this->Type_model->search($model_filter);


        /** ------------------------------------------------------- **

         **           RENDER VIEW PHASE

		/** ------------------------------------------------------- **/

        $data = array(

            "product" => $product,
            "type" => $type

        );

        $this->load->view("AdministratorArea/Product/Edit", $data);
    }



    public function delete($product_id = null)

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("bannermain_model");



        $this->load->library("response_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $product = $this->Product_model->find($product_id);

        $product->status = "REMOVED";



        $product_validated = array("code" => "0x0000-00000", "message" => "Server response success. Request process complete with no error.");

        if ($product_validated["code"] == "0x0000-00000") {

            $this->Product_model->save($product);



            $this->response_library->responseJSON($product_validated["code"], $product_validated["message"]);
        } else {

            $this->response_library->responseJSON($product_validated["code"], $product_validated["message"]);
        }
    }



    /** ------------------------------------------------------- **

     **           ADDITIONAL SCRIPT

    /** ------------------------------------------------------- **/

    public function datatables()

    {



        $this->load->library("datatables_library");


        $model_filter = new stdClass();

        // $model_filter->custom_where = "status IN ('ACTIVATE','SUSPEND')";
        $model_filter->join = array("type" => "type_id");

        $product = $this->Product_model->search($model_filter);



        print_r(json_encode($product));
    }



    public function sort()

    {

        /** ------------------------------------------------------- **

         **           CONSTRUCT PHASE

        /** ------------------------------------------------------- **/

        $this->load->model("banner_model");



        $this->load->library("response_library");

        $this->load->library("guid_library");



        /** ------------------------------------------------------- **

         **           PROCESS PHASE

        /** ------------------------------------------------------- **/

        $slide_orders = $this->input->post("sort_row");



        foreach ($slide_orders as $order => $banner_id) {

            $sortable = $this->banner_model->find($banner_id);

            $sortable->sort = $order + 1;

            $sortable->status = "ACTIVATE";

            $sortable->modified_date = date("Y-m-d H:i:s");

            $sortable->modified_by = $this->session->userdata("__administrator::administrator_id");



            $this->banner_model->save($sortable);
        }



        $this->response_library->responseJSON("0x0000-00000", "Process request Complete.");
    }
}
