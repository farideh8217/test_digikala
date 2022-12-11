<?php
class product extends controller{
    public function __construct()
    {
    }
    public function index($id){
       $product_info = $this->model->product_info($id);
       $data = [$product_info];
       $this->view("product/index",$data);
    }
}