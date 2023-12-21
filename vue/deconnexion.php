<?php
session_start();
session_unset();
header("location:../model/login.php");