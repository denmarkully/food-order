<?php 
    include('../config/constants.php');

    session_destroy();

    header("location:".SITEURL.'admin/manage-admin.php');


?>