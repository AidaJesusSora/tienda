<?php
@session_start();
session_destroy();
header("Location: /tienda/index.html");
?>