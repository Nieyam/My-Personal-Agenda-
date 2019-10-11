
<?php
	session_start();

	require("includes/connection.php");

	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
	}

	if (isset($id)) {
		$_head = 'pages/userHeader';
	} else {
		$_head = 'pages/header'; 
	}

	require($_head.".php");

	if(isset($_GET['page'])){

		$pages=array("home","agenda","dashboard","login","account","register","logout");

		if(in_array($_GET['page'], $pages)) {

			$_page=$_GET['page'];

		}else{

			$_page="home";

		}
	}
?>
<div class="content">
    <?php 
			require("pages/".$_page.".php");
    ?>
    
</div>

<?php include 'pages/footer.php';?>