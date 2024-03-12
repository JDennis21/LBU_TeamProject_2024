<div class="footer-wrap">
    <footer>
        <div class="footer-left">
            <h3>CLIMATE CONTROL SYSTEM</h3>
            <p>&copy; LBU TEAM PROJECT</p>
        </div>
        <div class="footer-middle">
            <div class="banner-container">
                <?php
                if(!isset($_SESSION["username"])) {
                    ?>
                    <div class="banner">
                    <div class="banner-text">READY FOR A QUOTE?</div>
                    <a href="/LBU_TeamProject_2024/pages/contact/contact.php" class="banner-button">CONTACT</a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="footer-right">
            <h1>LOGO</h1>
        </div>
    </footer>
</div>