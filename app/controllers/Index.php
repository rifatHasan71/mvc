<?php

class Index extends MController{
    public function __construct(){
        parent::__construct();
       
    }
    public function home($page="1"){
        // this method will use some other controller models
        // because this is a home controller.c
        $postModel=$this->load->model("PostModel");
        $total_post=$postModel->rowCount();
        
        $page=(int)$page;
       
        $page=$page ?? 1;
        $page=empty($page) ? 1: $page;
        $per_page=5;
        
        $total_page=ceil($total_post/$per_page);
        $page= $total_page<$page ? $total_page : $page;
        $page=$page<1 ? 1 : $page;
        $from=($page-1)*$per_page;
        $pagination_per_page=3;
        $pagination_page=ceil($page/$pagination_per_page);
        $pagi_start= ceil($page/$pagination_per_page)*$pagination_per_page-$pagination_per_page+1;
        $pagi_end=$pagi_start+$pagination_per_page;
        $pagi_end=$total_page < $pagi_end ? $total_page : $pagi_end;
       
        $prev=$pagi_start !=1 ? $pagi_start-$pagination_per_page : NULL;
        $end=$pagi_end == $total_page ? NULL : $total_page;
        $data['end']=$end;
        $data['prev']=$prev;
        $data['pagi_start']=$pagi_start;
        $data['pagi_end']=$pagi_end;
        $data['pagination_page']=$pagination_page;
        $data['total_page']=$total_page;
        $data['active_page']="home";
        $data['active_page_number']=$page;
        
        
        $limit=$from.','.$per_page;
        $catModel=$this->load->model("CatModel");   //for accessing category table
        
        $data['catList']=$catModel->catList('category');  //accesiing all data from category table
        $data['postList']=$postModel->joinSelectAll($limit);
        $this->load->view(PUBLIC_VIEWS."home",$data);  //simply access home view and pass data which we fetch from category
    }

    //default method
    //if there need

    public function noMethod($page="1"){
        $this->home($page);
    }


    
}

