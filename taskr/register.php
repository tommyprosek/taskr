<?php 
	include_once 'common/header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="lib/signup.php" method="POST">
			<input type="text" name="first_name" placeholder="Firstname" value="<?php echo $first_name ?>">
			<input type="text" name="last_name" placeholder="Lastname" value="<?php echo $last_name ?>">
			<input type="text" name="email" placeholder="E-mail" value="<?php echo $email ?>">
			<input type="password" name="password" placeholder="Password">
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>
</section>

<?php 
	include_once 'common/footer.php';
?>