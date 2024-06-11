<?php
    function insert_taikhoan($email, $user, $pass, $address, $tel) {
        $sql= "INSERT INTO taikhoan (email,user,pass,address,tel) VALUES ('$email', '$user', '$pass', '$address', '$tel')";
        pdo_execute($sql);
    }

    function check_user($user,$pass) {
        $sql= "SELECT * FROM taikhoan where user='".$user."' AND pass='".$pass."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function check_email($email) {
        $sql= "SELECT * FROM taikhoan where email='".$email."'";
        $sp=pdo_query_one($sql);
        return $sp;
    }

    function update_taikhoan($id,$user,$pass,$email,$address,$tel){
        $sql= "UPDATE taikhoan SET user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."' WHERE id = ".$id;
        pdo_execute($sql);
    }

    function loadall_taikhoan(){
        $sql = "SELECT * FROM taikhoan ";
        $listtk=pdo_query($sql);
        return $listtk;
    }

    function taikhoan_get_by_id($id){
        $sql= "SELECT * FROM taikhoan WHERE id = ".$id;
        return pdo_query_one($sql);
    }

    function update_taikhoan_ad($id,$user,$pass,$email,$address,$tel,$role){
        $sql= "UPDATE taikhoan SET user='".$user."',pass='".$pass."',email='".$email."',address='".$address."',tel='".$tel."',role='".$role."' WHERE id = ".$id;
        pdo_execute($sql);
    }

    function delete_tk($id){
        $sql= "DELETE FROM taikhoan WHERE id = '$id'";
        pdo_execute($sql); 
    }

    function checkForeignKeyTK($iduser)
    {
        if(empty($iduser)) {
            $iduser = 0;
          }
        $sql = "SELECT * FROM bill WHERE iduser=".$iduser;
        return pdo_query($sql);
    }
?>