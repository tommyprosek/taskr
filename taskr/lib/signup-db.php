<?php
// TODO tommy - refactoring: zjednodusit tady ty ify
if (isset($_POST['submit'])) {

//    TODO tommy - nejprve otestovat, zda se hodnoty poli vubec prenaseji - vypsat je tady na stranku

    echo $_POST['first'];
    echo "<br>";
    // atd...

    include_once 'connect.php';

//		TODO tommy - od ktere verze PHP jsou tyto funkce depraceted a cim se daji nahradit
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
			header("Location: ../register.php?signup=empty");
			exit();
		} else {
			if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
				header("Location: ../register.php?signup=invalid");
				exit();
			} else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../register.php?signup=email");
					exit();
				} else {
					$sql = "SELECT * FROM users WHERE user_uid='$uid'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if ($resultCheck > 0) {
						header("Location: ../register.php?signup=usertaken");
						exit();
					} else {
						$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
						$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
//						TODO tommy - IDEA rika, ze tady jsou nekompatibilni parametry - nastudovat!
						mysqli_query($conn, $sql);
						header("Location: ../register.php?signup=success");
						exit();
					}
				}
			}
		}

	} else {
		header("Location: ../register.php");
		exit();
}

//TODO tommy - koncovy tag pry neni potreba, rika IDEA - zjistit zda ma pravdu a proc to tak je
?>