<?php

class product extends controller
{
    public function __construct()
    {
    }

    public function index($id)
    {
        $productinfo = $this->model->product_info($id);
        $onlyclicksite = $this->model->onlyclicksite();
        $data = ['productinfo'=>$productinfo,'onlyclicksite'=>$onlyclicksite];
        $this->view("product/index",$data);
    }
    function tab($id,$id_category)//با ایجکس ایدی محصول را فرستاد
    {
        $number = $_POST['number'];
        if($number==0){
            $naghd = $this->model->naghd($id);
            $data = [$naghd];
            $this->view('product/tab1',$data,1,1);
        }
        if($number==1){
            $fani = $this->model->fani($id_category);
            $data = [$fani];
            $this->view('product/tab2',$data,1,1);
        }
        if($number==2){
        $this->view('product/tab3',[],1,1);
        }
        if($number==3){
        $this->view('product/tab4',[],1,1);
        }
    }
}