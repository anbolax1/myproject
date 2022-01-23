<?php
class Controller_Project extends Controller
{

    function __construct()
    {
        $this->model = new Model_Project();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->render('project_view.php', 'template_view.php', $data);
    }
}