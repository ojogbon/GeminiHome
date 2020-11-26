<?php include "./controllers/Central.php";
include "./controllers/Staff.php";
include "./controllers/Category.php";
$staff_id = $_SESSION["staff_Online_id"];
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hotab | Category</title>

	<!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

	<!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/lib/themify-icons/themify-icons.css">
    <link href="assets/css/lib/mmc-chat.css" rel="stylesheet" />
    <link href="assets/css/lib/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
<!-- ico font -->
     <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
</head>

<style media="screen">
.gop , .inn{
width: 70%;
float: left;
margin-right: 10px;
}
.col-md-6{
width: 65%;
margin-left: 23%;}
.list , .lists  {
margin: 5px;
padding-left: 5px;
}
.list {
border: 1px dashed;
padding-top: 10px;
}
.lists {
border: 1px solid;
padding-top: 9px;
}
.p1 {
  float: left;
  width: auto;
  font-size: 18px;
  font-family: fantasy;
  border: 1px solid;
  padding: 4px;
  margin-right: 4px;
  margin-bottom: 5px;
  margin-top: 4px;
      border-radius: 3px;
}
.list input {
float: left;
  width: 10%;
  font-size: 13px;
  font-family: fantasy;
  height: 30px;
  margin-right: 5px;
  border-radius: 5px;
}
.lists input {
float: left;
  width: 80%;
  font-size: 13px;
  font-family: fantasy;
  height: 30px;
  margin-right: 5px;
  border-radius: 5px;
}
.lists label {
font-size: 20px;
font-family: fantasy;
}
.p{
padding: 4px;
font-size: 13px;
font-family: fantasy;
border: 1px solid lightblue;
border-radius: 5px;
width: 20%;
}
.pros {
width: 100%;
height: 30px;
margin: 10px;
cursor: pointer;
font-family: fantasy;
font-size: 20px;
background-color: #097b09;
color: white;
width: 93%;
border-radius: 10px;
}
label{
font-family: fantasy;
font-weight: bolder;
}
input,select{    font-family: fantasy;}
.film{    margin-left: 15%;}
</style>
<body>

<?php include 'nav.php';
include 'header.php';?>

    <!-- END chat Sidebar-->

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Category</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 p-0">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="staff.php">Category</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Gallery </h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                      <div class="card-block">
                                                  <form method="post" enctype="multipart/form-data">

                                                      <div class="form-group row">
                                                            <label for="Amount" style="    font-family: inherit;" class="col-sm-2 col-form-label">New category</label>
                                                          <div class="col-sm-10">
                                                            <input type="text" name="categoryTitle" class="form-control input-default " required>
                                                          </div>
                                                      </div>


                                                        <div class="form-group">
                                                          <button class="btn btn-default"  type="submit" name="save" style="    font-family: inherit;" >Process
                                                            <i class="icofont icofont-refresh"></i>
                                                          </button>
                                                        </div>
                                                      <!--Generate Staff ID and Password-->
                                                  </form>
                                                  <?php
                                                                     if(isset($_POST["save"])){

                                                                              $categoryTitle =$_POST["categoryTitle"];

                                                                              $key = "1234567opiuyt";
                                                                              insertCategory($category,$key,$categoryTitle,$staff_id);
                                                                              }
                                                              ?>
                                              </div>

                                    </div>


                                              </div>
                                </div>
                            </div>
                        </div><!-- /# column -->
                    </div>
				</div><!-- /# main content -->
            </div><!-- /# container-fluid -->
        </div><!-- /# main -->
    </div><!-- /# content wrap -->







    <script src="assets/js/lib/jquery.min.js"></script><!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->
    <script src="assets/js/lib/sidebar.js"></script><!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script><!-- bootstrap -->
    <script src="assets/js/lib/mmc-common.js"></script>
    <script src="assets/js/lib/mmc-chat.js"></script>
    <script src="assets/js/scripts.js"></script><!-- scripit init-->


    <!-- <script type="text/javascript" src="./assets/js/Set_Price.js">  </script>s -->


</body>

</html>
