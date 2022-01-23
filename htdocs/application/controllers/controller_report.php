<?php
class Controller_Report extends Controller
{

    function __construct()
    {
        $this->model = new Model_Report();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->render('report_view.php', 'template_view.php', $data);
    }
}