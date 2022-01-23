<h1>Сотрудники</h1>
<p>
<table>
    <tr><td>Имя</td><td>Фамилия</td><td>Пол</td><td>Дата рождения</td><td>Зарплата</td><td>Дата создания</td><td>Дата редактирования</td></tr>
    <?php

    foreach($data as $row)
    {
        echo '<tr><td>'.$row['name'].'</td><td>'.$row['surname'].'</td><td>'.$row['gender'].'</td><td>'.$row['birth_date'].'</td><td>'.$row['salary'].'</td><td>'.$row['create_date'].'</td><td>'.$row['edit_date'].'</td></tr>';
    }

    ?>
</table>
</p>