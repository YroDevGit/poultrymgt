<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Admin Dashboard
  </title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  
  <link href="../../assets/css/nucleo-icons.css" rel="stylesheet" />

  <link href="../../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />

  <link href="../../assets/demo/demo.css" rel="stylesheet" />
</head>


<?php
include '../../../includes/database.php';
include '../includes/head.php';
$db6 = new Database();

if(isset($_POST['editprice'])){
	$fid = $_POST['fid'];
	$frice = $_POST['fprice'];
	$sql = "update prices set prices = $frice where id = $fid";
	if(mysqli_query($db6->connect(),$sql)){
		header("refresh:3;url=../prices.php");
		?>
			
			<div align="center" class="maincon">
				<div class="card card-user">
              <div class="card-body">
                <p class="card-text">
                  <div class="author">
                    <div class="block block-one"></div>
                    <div class="block block-two"></div>
                    <div class="block block-three"></div>
                    <div class="block block-four"></div>
                    <a href="javascript:void(0)">
                      <img class="avatar" src="../img/check-mark-icon-transparent-3.png" alt="..." height="200" width="200">
                      <h5 class="title">Price Updated</h5>
                    </a>
                    <p class="description">
                      
                    </p>
                  </div>
                </p>
                <div class="card-description">
                  Page will automatically refresh, please wait...
                </div>
              </div>
              <div class="card-footer">
                <div class="button-container">
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                    <i class="fab fa-facebook"></i>
                  </button>
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                    <i class="fab fa-twitter"></i>
                  </button>
                  <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                    <i class="fab fa-google-plus"></i>
                  </button>
                </div>
              </div>
            </div>
			</div>

			<style type="text/css">
				.maincon{padding-top: 200px;padding-left: 500px;padding-right: 500px;}
				@media screen and (max-width: 800px) {
				.maincon{padding-top: 100px;padding-bottom: 0px; padding-left: 5px; padding-right: 5px;}
				}
			</style>


		<?php
	}
}


 ?>

 

 