<h1>Проекты</h1>
<p>
<table>
    <tr><td>Название</td><td>Дата создания</td><td>Дата редактирования</td></tr>
    <?php

    foreach($data as $row)
    {
        echo '<tr><td>'.$row['name'].'</td><td>'.$row['create_date'].'</td><td>'.$row['edit_date'].'</td></tr>';
    }

    ?>
</table>
</p>