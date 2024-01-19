<?php
    include_once "functions.php";
    
    $tuKhoa = $_GET["tuKhoa"];
    $p = isset($_GET["p"]) ? $_GET["p"] : 1;
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Loai tin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <?php
        include_once "nav.php";
    ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <?php
                include_once "leftmenu.php";
            ?>
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Danh sách tin tìm thấy</b></h4>
                    </div>
                    <?php
                        $st1t = 3;
                        $from = ($p - 1) * $st1t;
                        $tinTheoTuKhoaPhanTrang = getSoTinTheoTuKhoaPhanTrang($from,$st1t,$tuKhoa);
                        while($rowTinTheoTuKhoaPhanTrang = mysqli_fetch_assoc($tinTheoTuKhoaPhanTrang)) {
                    ?>
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="chitiet.php">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="img/tintuc/<?php echo $rowTinTheoTuKhoaPhanTrang["Hinh"]; ?>" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3><?php echo $rowTinTheoTuKhoaPhanTrang["TieuDe"]; ?></h3>
                            <p><?php echo $rowTinTheoTuKhoaPhanTrang["TomTat"]; ?></p>
                            <a class="btn btn-primary" href="chitiet.php">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <?php
                        }
                    ?>
                    
                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                <?php
                                    $TinTheoTuKhoa = getAllTinByTuKhoa($tuKhoa);
                                    $tongSoTin = mysqli_num_rows($TinTheoTuKhoa);
                                    $tongSoTrang = ceil($tongSoTin/$st1t);
                                ?>
                                <li>
                                    <a href="timkiem.php?tuKhoa=<?php echo $tuKhoa;?>&p=1">&laquo;</a>
                                </li>
                                
                                <?php
                                    // Thực hiện phân trang theo nhóm trước và sau trang hiện hành có 3 trang
                                    $offset = 3;
                                    $tuTrang = max(1,$p - $offset);
                                    $denTrang = min($tongSoTrang,$p + $offset);
                                    for($i = $tuTrang; $i <= $denTrang; $i++) {
                                        $active = $p == $i ? "class='active'" : "";
                                ?>
                                
                                <li <?php echo $active; ?> >
                                    <a href="timkiem.php?tuKhoa=<?php echo $tuKhoa;?>&p=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php
                                    }
                                ?>
                                
                                <li>
                                    <a href="timkiem.php?tuKhoa=<?php echo $tuKhoa;?>&p=<?php echo $tongSoTrang; ?>">&raquo;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
        </div> 

    </div>

    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <?php
        include_once "footer.php";
    ?>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>

</body>

</html>
