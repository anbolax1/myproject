<?php
class Controller_Department extends \Controller
{

    function __construct()
    {
        $this->model = new \Model_Department();
        $this->view = new \View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->render('department_view.php', 'template_view.php', $data);
    }

    public function get_list()
    {
    }

    public function get_form()
    {

    }

    public function edit($item_id)
    {
        echo 'erferf';
        if(!empty($item_id)){
            echo $item_id;
        }
    }
}