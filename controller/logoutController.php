<?php 

require '../config/modules.php';

    clearSession();
    deleteCookie('user');
    routes('/login');

?>