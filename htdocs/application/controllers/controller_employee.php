<?php
class Controller_Employee extends Controller
{

    function __construct()
    {
        $this->model = new Model_Employee();
        $this->view = new View();
    }

    function action_index()
    {
        $data = $this->model->get_data();
        $this->view->render('employee_view.php', 'template_view.php', $data);
    }
}