<?php
require_once "pdo.php";

function sanpham_get_all_home()
{
    $sql = "SELECT * FROM sanpham ORDER BY ID DESC LIMIT 0,9";
    return pdo_query($sql);
}

function sanpham_get_all_home_top10()
{
    $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT 0,10";
    return pdo_query($sql);
}
function sanpham_get_all()
{
    $sql = "SELECT * FROM sanpham";
    return pdo_query($sql);
}

function insert_sp($ten, $gia, $img, $mota, $iddm)
{
    $sql = "INSERT INTO sanpham (`name`,`price`,`img`,`mota`,`iddm`) VALUES ('$ten','$gia','$img','$mota','$iddm')";
    pdo_execute($sql);
}

function delete_sp($id)
{
    $sql = "DELETE FROM sanpham WHERE id = '$id'";
    pdo_execute($sql);
}

function sanpham_get_by_id($id)
{
    $sql = "SELECT * FROM sanpham WHERE id = " . $id;
    return pdo_query_one($sql);
}

function load_sanpham_cungloai($id, $iddm)
{
    $sql = "SELECT * FROM sanpham WHERE iddm = " . $iddm . " AND id <> " . $id;
    return pdo_query($sql);
}


function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "SELECT * FROM danhmuc where id = " . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}

function update_sp($ten, $gia, $img, $mota, $iddm, $id)
{
    if ($img != "") {
        $sql = "UPDATE sanpham SET `name`= '$ten',`price`= '$gia',`img`='$img',`mota`='$mota', `iddm`='$iddm' where `id` = '$id'";
    } else {
        $sql = "UPDATE sanpham SET `name`= '$ten',`price`= '$gia',`mota`='$mota', `iddm`='$iddm' where `id` = '$id'";
    }
    pdo_execute($sql);
}

function loadall_sanpham($kyw ="", $iddm = 0)
{
    $sql = "SELECT sanpham.*, danhmuc.name as danhmuc_name FROM sanpham INNER JOIN danhmuc ON danhmuc.id=sanpham.iddm where 1";
    if ($kyw != "") {
        $sql .= " and sanpham.name like '%".$kyw."%'";
    }
    if ($iddm > 0) {
        $sql .= " and sanpham.iddm = '" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $data = pdo_query($sql);
    return $data;
}
