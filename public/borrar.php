<?php

if(isset($_GET["borrar"])){
    unlink($_GET['borrar']);
}