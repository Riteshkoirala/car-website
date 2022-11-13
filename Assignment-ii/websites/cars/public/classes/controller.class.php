<?php

class controller extends model{

    //function is used to set the archive
    public function updateData($num,$name){
        $this->setArchive($num,$name);

    }
    //function is used to remove the archive
    public function removeData($num,$name){
        $this->removeArchive($num,$name);

    }
    // function used for adding staff
    public function addStaffs($username, $password){
        $this->addStaff($username, $password);
    }
// function used for checking the login detail
    public function checkUser($username, $password){
        $result =  $this->checkData($username, $password);
        return $result;
    }
//function used for inserting query
    public function insertMessage($name,$email,$telephone,$enquiry){
        $this->addquery($name,$email,$telephone,$enquiry);
    }
//function used for inserting article
    public function insertArticle($title,$username,$content){
        $this->addArticle($title,$username,$content);
    }
    //function used for checking the enquiry
    public function insertMarked($id,$username){
        $this->checkBy($id,$username);
    }
    //function used for getting id
    public function geti(){
        $res = $this->get();
        return $res;

    }
//function used for adding the new manufacturer
    public function addManufa($name){
        $this->addManu($name);
    }
    //function used for deleting manufacturer
    public function deleteManuf($id){
        $del = $this->deleteManu($id);
        return $del;
    }
//function used for updating manufacturer
    public function updman($name,$id){
        $this->updatemanu($name,$id);
    }
//function used for deleting car
    public function deleteCars($id){
        $del = $this->deleteCar($id);
        return $del;
    }
//function used for adding the car
    public function addCar($model,$description,$price,$manufacturerId,$engine,$user,$previousPrice)
    {
        $this->insertCar($model,$description,$price,$manufacturerId,$engine,$user,$previousPrice);
            }
//function used for updating car
    public function upCar($model,$description,$price,$manufacturerId,$engine,$user,$previousPrice)
    {
        $this->updateCar($model,$description,$price,$manufacturerId,$engine,$user,$previousPrice);
    }
//function used for deleting staff
    public function deleteSta($id){
        $del = $this->deleteStaff($id);
        return $del;
    }
//function used for deleting message
    public function deleteMes($id){
    $del = $this->deleteMesss($id);
    return $del;
}
}


?>