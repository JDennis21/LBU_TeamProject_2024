<?php
Session_start();
Session_destroy();

header('Location: ../pages/homePage.php');