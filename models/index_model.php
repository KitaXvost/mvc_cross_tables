<?php
class Index_Model extends Model
{
    public function index($id, $users_name, $email, $sort, $roles_name)
    {
        $db = new Database();

        if (isset($_GET['page']))
        {
            $page = $_GET['page'];
        }
        else $page = 1;

        $kol = 10; //количество записей для вывода
        $art = ($page * $kol) - $kol; //с какой записи выводить
        $str_pag = ceil($total / $kol); // Количество страниц для пагинации
        $stm = $db->prepare('SELECT users.id, users.name AS users_name, users.email, roles.name AS roles_name
                             FROM `users`
                             LEFT JOIN roles ON users.role_id = roles.id
                             ORDER BY ' . $sort . ' ASC LIMIT ?,?');
        $stm->bindValue(1, $art, PDO::PARAM_INT);
        $stm->bindValue(2, $kol, PDO::PARAM_INT);
        $stm->execute();

        $task = array();
        $i = 0;
        while ($row = $stm->fetch())
        {
            $task[$i]['id'] = $row['id'];
            $task[$i]['users_name'] = $row['users_name'];
            $task[$i]['email'] = $row['email'];
            $task[$i]['roles_name'] = $row['roles_name'];
            $i++;
        }
        return $task;
    }

    public function getCount()
    {
        $db = new Database();
        $sql = 'SELECT count(id) AS count FROM users';
        $result = $db->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }



}
