<?php
Session_start();
Session_destroy();

header('Location: ../pages/index.php');
