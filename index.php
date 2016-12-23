<?php 

require_once('class-shoutbox-homepage.php');
$homepage = new Homepage;


?>

<!DOCTYPE html>
<html>
<head>
	<title>Shout it!</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>

	<div id="container">
		<header>
			<h1>Shout it! Shoutbox</h1>
		</header>
		<div id="shouts">
			<ul>
			
				<?php if ( !empty( $homepage->errors) ) { ?>

					<?php foreach ($homepage->errors as $error) { ?>
					
						<li class="shout" style="color:red!important"><span>Error</span> - <?php echo $error; ?></li>

					<?php } ?>

				<?php } ?>

				<?php foreach ($homepage->shouts as $shout) : ?>

					<li class="shout"><span><?php echo $shout->time; ?></span> - <?php echo $shout->user; ?> : <?php echo $shout->message; ?></li>

				<?php endforeach ?>


			</ul>
		</div>

		<div id="input">
			<form method="post" action="#">
				<input type="text" name="username" placeholder="Your Username" <?php if ( isset( $_POST['username'] ) ) echo "value=\"{$_POST['username']}\"" ?> >
				<input type="text" name="message" placeholder="Your Message" <?php if ( isset( $_POST['username'] ) ) echo "autofocus" ?> >
				<input class="shout-btn button" type="submit" name="submit" value="Shout!">
			</form>
			
		</div>
	</div>
</body>
</html>