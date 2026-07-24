<?php

Class Product extends Controller
{
    function __construct()
    {
    }

    function index($id)
    {
        $product_info = $this->objectModel->get_product_info($id);
        $gallery=$this->objectModel->get_gallery($id);
        $data = ['product_info' => $product_info[0], 'offer' => $product_info[1], 'date' => $product_info[2], 'colors' => $product_info[3], 'guarantees' => $product_info[4], 'likes' => $product_info['5'],'gallery'=>$gallery];
        $this->view('product/','index', $data);

    }

    function tab($id,$cat)
    {
        $data='';
        $selected_tab = $_POST['index'] + 1;
        switch ($selected_tab) {
            case 1:
                $data=$this->objectModel->get_analysis($id);
                $this->view('product/tabs/first_tab','',$data,true);
                break;
            case 2:
                $data=$this->objectModel->get_properties($cat,$id);
                $this->view('product/tabs/second_tab','',$data,true);
                break;
            case 3:
                $params=$this->objectModel->get_comment_params($cat,$id);
                $comments=$this->objectModel->get_comments($id);
                $data=[$params,$comments];
                $this->view('product/tabs/third_tab','',$data,true);

                break;
            case 4:
                $data=$this->objectModel->get_questions_and_answers($id);
                $this->view('product/tabs/fourth_tab','',$data,true);
                break;
        }
    }
    function add_to_basket($product_id)
    {

       $insert= $this->objectModel->add_to_basket($product_id,$_POST['color_name'],$_POST['guarantee_name']);
       echo $insert;
    }
}