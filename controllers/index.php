<?php

class Index extends Controller
{
    function __construct()
    {

    }

    public function index()
    {
        $top_slider = $this->objectModel->get_top_slider();
        $modern_slider = $this->objectModel->get_modern_slider();
        $just_here=$this->objectModel->get_just_here();
        $most_viewed=$this->objectModel->get_most_viewed();
        $data = [$top_slider, $modern_slider[0], $modern_slider[1],$just_here,$most_viewed];

        $this->view('index/','index', $data);
    }

    public function hello()
    {


    }
}

?>