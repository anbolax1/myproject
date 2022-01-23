<?php
class Model_Employee extends Model
{
    public function get_data()
    {
        return array(

            array(
                'name' => 'Андрей',
                'surname' => 'Боков',
                'gender' => 'Мужской',
                'birth_date' => '31.12.1996',
                'salary' => '110000',
                'create_date' => '15.01.2022',
                'edit_date' => '15.01.2022'
            ),
            // todo
        );
    }
}
