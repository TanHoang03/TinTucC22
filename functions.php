<?php
    function ketNoiDB() {
        return mysqli_connect("localhost","root","","tintuc_c22");    
    }

    function dongKetNoi($conn) {
        mysqli_close($conn);
    }

    // Lấy danh sách các slider trong CSDL
    function getSliders() {
        $conn = ketNoiDB();
        $sql = "SELECT * FROM slide";
        $rs = mysqli_query($conn,$sql);
        dongKetNoi($conn);
        return $rs;
    }

    // Lấy danh sách các thể loại
    function getAllTheLoai() {
        $conn = ketNoiDB();
        $sql = "SELECT * FROM theloai";
        $rs = mysqli_query($conn,$sql);
        dongKetNoi($conn);
        return $rs;
    }
    
     // Lấy danh sách các loại tin theo id thể loại truyền vào
     function getLoaiTinByTheLoai($idtl) {
        $conn = ketNoiDB();
        $sql = "SELECT * FROM loaitin WHERE idTheLoai = $idtl";
        $rs = mysqli_query($conn,$sql);
        dongKetNoi($conn);
        return $rs;
    }

    // Lấy 1 tin nỗi bật thuộc thể loại với idTL truyền vào
    function getTinNoiBatByTheLoai($idtl) {
        $conn = ketNoiDB();
        $sql = "SELECT tintuc.* FROM loaitin INNER JOIN tintuc on loaitin.id = tintuc.idLoaiTin
        WHERE idTheLoai = $idtl AND NoiBat = 1  LIMIT 0,1";
        $rs = mysqli_query($conn,$sql);
        dongKetNoi($conn);
        return $rs;
    }

    // Lấy danh sách tin theo trang, truyền vào $from(mẫu tin bắt đầu), $st1t (Số tin 1 trang)
    function getSoTinTheoTrang($from, $st1t,$idlt) {
        $conn = ketNoiDB();
        $sql = "SELECT * FROM tintuc WHERE idLoaiTin = $idlt LIMIT $from, $st1t";
        $rs = mysqli_query($conn,$sql);
        dongKetNoi($conn);
        return $rs;
    }

    // Lấy danh sách tin theo từ khoá cần tìm, truyền vào $from(mẫu tin bắt đầu), $st1t (Số tin 1 trang) và $tuKhoa
    function getSoTinTheoTuKhoaPhanTrang($from, $st1t,$tuKhoa) {
        $conn = ketNoiDB();
        $sql = "SELECT * FROM tintuc WHERE TieuDe LIKE '%$tuKhoa%' LIMIT $from, $st1t";
        $rs = mysqli_query($conn,$sql);
        dongKetNoi($conn);
        return $rs;
    }

    // Lấy tổng số mẫu tin theo loại tin ($idlt) trong table tintuc
    function getAllTinByLoaiTin($idlt) {
        $conn = ketNoiDB();
        $sql = "SELECT * FROM tintuc WHERE idLoaiTin = $idlt";
        $rs = mysqli_query($conn,$sql);
        dongKetNoi($conn);
        return $rs;
    }

    // Lấy tổng số mẫu tin theo loại tin ($idlt) trong table tintuc
    function getAllTinByTuKhoa($tuKhoa) {
        $conn = ketNoiDB();
        $sql = "SELECT * FROM tintuc WHERE TieuDe LIKE '%$tuKhoa%'";
        $rs = mysqli_query($conn,$sql);
        dongKetNoi($conn);
        return $rs;
    }

    function getThongTinDangNhap($email,$password){
        $conn = ketNoiDB();
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $rs = mysqli_query($conn,$sql);
        dongKetNoi($conn);
        return $rs;
    }

?>

