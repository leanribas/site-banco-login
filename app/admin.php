<?php
if(isset($_SESSION['logado']) && $_SESSION['logado'] === 1)
{
    require_once 'admin_control.php';
}
else
{
    require_once 'login.php';
}    