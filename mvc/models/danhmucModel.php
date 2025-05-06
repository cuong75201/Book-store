<?php
class DanhMucModel extends dbconnect
{
    public function getNamebyId($id)
    {
        $sql = "SELECT `Ten_The_Loai` from `danh_muc` WHERE `ID_The_Loai`='$id'";
        $result = mysqli_query($this->con, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row["Ten_The_Loai"];
            }
            return $rows;
        }
    }
}
