<?php
/**
 * Created by PhpStorm.
 * User: CG
 * Date: 12/04/2017
 * Time: 23:51
 */

session_start();
session_destroy();

header('Location: index.php');
?>