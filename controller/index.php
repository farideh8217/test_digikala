<?php
class index extends controller {
   public function index(){
       //require $this->model("index"); بجای نوشتن این خط در همه ی فایل ها در  مای اپ آن را اضافه کردیم
          $slider1 = $this->model->get_slider1();
          $slider2 = $this->model->get_slider2();
          $slider2_item = $slider2[0];
          $slider2_date = $slider2[1];

          $data = [$slider1,$slider2_item,$slider2_date];
          $this->view("index/index",$data);
    }
}