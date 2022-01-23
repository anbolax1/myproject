<p>
<div>
            <h1>Отделы</h1>
            <div class="pull-right">
                <button type="button" class="btn btn-success" id="new-item-add">
                    <i class="fa fa-fw fa-plus"></i> Добавить
                </button>
            </div>
    <div class="container-fluid">
        <div id="list"></div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <tr><td>Название</td><td>Дата создания</td><td>Дата редактирования</td><td>Действие</td></tr>
        </thead>
        <tbody>
        <?php

        foreach($data as $key => $value)
        {
            echo '<tr name="id" id="'.$value['id'].'"><td>'.$value['name'].'</td><td>'.$value['create_date'].'</td><td>'.$value['edit_date'].'</td><td>
                <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <button name="edit" class="btn btn-outline-warning btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                        </li>
                        <li class="list-inline-item">
                            <button name="delete" class="btn btn-outline-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                        </li>
                </ul></td></tr>';
        }

        ?>
        </tbody>
    </table>
</div>
</p>

<!-- Modal -->
<div class="modal" tabindex="-1" id="add-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 product_content">
                        <form action= "#" method= "POST">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="text" id="name" class="floatLabel" name="name">
                                    <label for="name">Название</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="save">Сохранить</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

</div>
<script>

    $('document').ready(function() {

        $('#new-item-add').click(function() {
            $('#add-modal').modal('show');
        });

        var table = document.querySelectorAll('.table tbody tr ul li button');
        table.forEach(function(ele) {
            ele.addEventListener('click', function (e) {
                let action_name = this.name;
                let item_id = this.closest('tr').id;

                switch(action_name){
                    case 'edit':
                        edit(item_id);
                        break;
                    case 'delete':
                        break;
                }
        })
        });

    });

    function edit(item_id) {
        this.item_id = item_id

        let object = {
            'item_id':item_id
        }
        $.ajax({
            type:'POST',
            url:'/application/core/ajax.php',
            data:{
                action:'edit',
                item_id:item_id,
            },
            dataType:'json',
            success:function() {
            }
        });
    }


</script>
