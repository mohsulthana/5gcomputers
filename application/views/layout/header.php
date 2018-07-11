<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>

    <!-- Bootstrap CSS files -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/style.css">

    <!-- Bootstrap JS and Jquery files -->
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>    
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>

<body>
<div class="left-sidebar">
    <div class="sidebar-link">
        <a href="<?php echo base_url();?>admin_c">Home</a> 
        <a href="<?php echo base_url();?>pengeluaran_c">Pengeluaran</a><hr>
        <a href="<?php echo base_url();?>admin_c/logout">Logout</a>
    </div> 
</div>
    <div class="navbar navbar-default">
        <div class="container card">
            <h2><span class="glyphicon glyphicon-home"></span>&nbsp;5G Computers</h2>
        </div>
    </div>
    <div class="container">
        <!-- <button class="btn btn-danger glyphicon glyphicon-off" onClick="<?php echo base_url();?>admin_c/logout">Logout</button>  -->