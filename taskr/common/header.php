<!DOCTYPE html>
<html>
<head>
    <title>Taskr</title>

    <!-- TODO tommy - zjistit, jak se tohle da parametrizovat v inclidovanych souborech, anebo zda se da pouzit absolutni cesta -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<header>
    <nav>
        <div class="main-wrapper">
            <ul>
<!--                TODO tommy - tady to same-->
                <li><a href="index.php">Home</a></li>
            </ul>
            <div class="nav-login">
                <form>
                    <input type="text" name="uid" placeholder="Username/e-mail">
                    <input type="password" name="pwd" placeholder="password">
                    <button type="submit" name="submit">Login</button>
                </form>

<!--                TODO tommy - tady to same-->
                <a href="register.php">Sign up</a>
            </div>
        </div>
    </nav>
</header>
