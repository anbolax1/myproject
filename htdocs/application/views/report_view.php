<h1>Отделы</h1>
<p>
<table>
    <tr><td>id проекта</td><td>Название проекта</td><td>Бюджет</td></tr>
    <?php

    foreach($data as $row)
    {
        echo '<tr><td>'.$row['project_id'].'</td><td>'.$row['project_name'].'</td><td>'.$row['budget'].'</td></tr>';
    }

    ?>
</table>
</p>