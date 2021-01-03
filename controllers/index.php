<?php
class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->view->render('index/index');
        require 'views/header.php';
        require 'models/index_model.php';

    }

    public function index($sort = 'id')
    {
        $tasks = Index_Model::index($id, $users_name, $email, $sort, $roles_name);
        $total = Index_Model::getCount(); //всего записей
        $kol = 10; //количество записей для вывода
        $art = ($page * $kol) - $kol; //с какой записи выводить
        $str_pag = ceil($total / $kol); // Количество страниц для пагинации
        require 'views/index/index.php';
        require 'views/footer.php';
    }



}
