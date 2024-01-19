<?php
        include_once "functions.php";
?>
<div class="col-md-3 ">
    <ul class="list-group" id="menu">
        
        <li href="#" class="list-group-item menu1 active">
            Danh sách thể loại
        </li>
        <?php
            $theloais = getAllTheLoai();
            while($rowTheLoai = mysqli_fetch_assoc($theloais)) {
                $loaiTinByTheLoai = getLoaiTinByTheLoai($rowTheLoai["id"]);
                if(mysqli_num_rows($loaiTinByTheLoai) > 0) {                
        ?>
        <li href="#" class="list-group-item menu1">
            <?php echo $rowTheLoai["Ten"]; ?>
        </li>
        <ul>
            <?php
                while($rowLoaiTin = mysqli_fetch_assoc($loaiTinByTheLoai)) {
                    
            ?>
            <li class="list-group-item">
                <a href="loaitin.php?idlt=<?php echo $rowLoaiTin["id"]; ?>"><?php echo $rowLoaiTin["Ten"];  ?></a>
            </li>
            <?php
                }
            ?>
        </ul>
        <?php
            }}
        ?>
        
    </ul>
</div>

            