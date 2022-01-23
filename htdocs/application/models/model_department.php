<?php
class Model_Department extends Model
{
    public function get_data()
    {
        $sql = "SELECT * FROM department";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }
}