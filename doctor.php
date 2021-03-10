
<?php
class Doctor{

    public $id;
    public $name;
    public $email;
    public $phone;
    public $salaire;
    
    public function getDoctors($link){
        $sql="select id, name from doctor";
        $res=mysqli_query($link, $sql);
        return $res;
    }
    public function getDoctor($id, $link){ 
        $sql="Select id, name, email, phone, salaire from doctor where id='$id'";
        $res = mysqli_query($link, $sql);
        if(mysqli_num_rows($res) == 1){
            $row = mysqli_fetch_row($res);
            $this->id = $row[0];
            $this->name = $row[1];
            $this->email = $row[2];
            $this->phone = $row[3];
            $this->salaire = $row[4];
            return true;
        }
        else
            return false;
    }
    public function getDoctorSalaire($salaire, $operation, $link){
        if($operation == "1")
            $sql="select * from doctor where salaire<'$salaire'";
        else
            if($operation == "2")
                $sql="select * from doctor where salaire='$salaire'";
            else
                $sql="select * from doctor where salaire>'$salaire'";
        $res = mysqli_query($link, $sql);
        return $res;
    }
}
?>

