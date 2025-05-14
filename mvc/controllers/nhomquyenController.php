<?php
class nhomquyenController extends Controller
{
    private $nhomquyenModel;
    private $ctietquyenModel;
    function __construct()
    {
        $this->nhomquyenModel = $this->model("NhomQuyenModel");
        $this->ctietquyenModel = $this->model("ctiet_quyenModel");
    }
    function addQuyen()
    {
        $name = $_POST['name'];
        $quyen = $_POST['ids'];
        $result =  $this->nhomquyenModel->add($name);
        $maquyen = $this->nhomquyenModel->getMaQuyenbyName($name)[0];
        if (!$result) {
            echo json_encode($result);
            return;
        }
        for ($i = 0; $i < count($quyen); $i++) {
            $result = $this->ctietquyenModel->add($quyen[$i], $maquyen);
            if (!$result) {
                echo json_encode($result);
                return;
            }
        }
        echo json_encode($result);
    }
    function getQuyen()
    {
        $id = $_POST['id'];
        $tenquyen = $this->nhomquyenModel->getNamebyId($id)[0];
        $ctquyen = $this->ctietquyenModel->getById($id);
        $quyen = array('tenquyen' => $tenquyen, 'hanhdong' => []);
        foreach ($ctquyen as $ct) {
            $quyen['hanhdong'][] = $ct['hanhdong'];
        }
        echo json_encode($quyen);
    }
    function UpdateQuyen()
    {
        $name = $_POST['name'];
        $quyen = $_POST['ids'];
        $id = $_POST['id'];
        $result = $this->nhomquyenModel->update($id, $name);
        if (!$result) {
            echo json_encode($result);
            return;
        }
        $result = $this->ctietquyenModel->delete($id);
        if (!$result) {
            echo json_encode($result);
            return;
        }
        for ($i = 0; $i < count($quyen); $i++) {
            $result = $this->ctietquyenModel->add($quyen[$i], $id);
            if (!$result) {
                echo json_encode($result);
                return;
            }
        }
        echo json_encode($result);
    }
    function deleteQuyen()
    {
        $id = $_POST['id'];
        $result = $this->ctietquyenModel->delete($id);
        if (!$result) {
            echo json_encode($result);
            return;
        }
        $result = $this->nhomquyenModel->remove($id);
        if (!$result) {
            echo json_encode($result);
            return;
        }
        echo json_encode($result);
    }
}
