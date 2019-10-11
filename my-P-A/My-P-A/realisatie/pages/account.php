
<?php
$id = $_SESSION['vnaam'];
$id = $_SESSION['anaam'];
$mail = $_SESSION['E_mail'];
$id = $_SESSION['id'];

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

$sql = "SELECT First_name, Last_name, E_mail, user_ID FROM user";
$vnaam = $_SESSION ['vnaam'];
$anaam = $_SESSION ['anaam'];
$id = $_SESSION['E_mail'];
$id = $_SESSION['id'];
?>

<div id="account">
	<div class="col-lg-6 col-sm-6">
			<div class="card hovercard">
					<div class="card-background">

					</div>
					<div class="useravatar">

					</div>
					<!-- <div class="card-info"> <span class="card-title"><?php echo $naam; ?></span>



					</div> -->
			</div>

			<div class="well">
				<div class="tab-content">
					<div class="tab-pane fade in active" id="tab1">
							<img src="../realisatie/css/Images/ggebruiker.png" id="ggebruiker">
									<div id="profiel"><br><br>
										<div id="vnaam">
								<h1>First name:
								<?php echo $vnaam; ?></h1>
										</div>
									<br>
									<div id="anaam">
								<h1>Last name:
								<?php echo $anaam; ?></h1>
									</div>

								<br><br>
									<div id="email">
								<h1>Email:
								<?php echo $mail; ?></h1>
									</div>

								<br><br>
									<div id="user">
								<h1>User ID:
								<?php echo $id; ?></h1>
									</div>	
								</div>

					</div>
				</div>
			</div>
  </div>
</div> 

