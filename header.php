<?php
session_start();
?>
<header>
    <div class="">
        <h1 class="logo">Rent-a-car</h1>
        <a href="#" class="hamburger"></a>
        <nav>
            <?php
if ((isset($_SESSION['status'])) == true) {
    ?>
            <ul>
                <li><a href="index.php" class="helink">Početna</a></li>
                <li><a href="rent.php" class="helink">Iznajmite vozilo</a></li>
                <li><a href="status.php" class="helink">Proveri status</a></li>
                <li><a href="message_admin.php" class="helink">Kontaktirajte administratora</a></li>
                <li><a href="admin/logout.php" class="helink">Odjavite se</a></li>
            </ul>
            <?php
} else {
    ?>
            <ul>
                <li><a href="index.php" class="helink">Početna</a></li>
                <li><a href="rent.php" class="helink">Iznajmite vozilo</a></li>
                <li><a href="contact.php" class="helink">Kontakt</a></li>
                <li><a href="account.php" class="helink">Prijavite se</a></li>
                <li><a href="login.php" class="helink">Administrator</a></li>
            </ul>
            <?php
}
?>
        </nav>
    </div>
</header>