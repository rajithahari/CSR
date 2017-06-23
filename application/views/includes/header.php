<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CSR Ticket System</title>
	
	<link rel="stylesheet" href="<?=base_url()?>/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/css/style.css">

	<script type="text/javascript" src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.3.8/packaged/jquery.noty.packaged.min.js"></script>

	
	<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
	<script src="<?=base_url()?>/js/bootstrap.min.js"></script>	
	<script src="<?=base_url()?>/js/angular.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.9.0/ui-bootstrap-tpls.min.js"></script>
	
	<script src="<?=base_url()?>/app/controllers/UserController.js"></script>
	<script src="<?=base_url()?>/app/controllers/TicketController.js"></script>
</head>
<body>
	<div id="container">
		<h1>
			CSR - Ticket System
			<span class="pull-right"><?=@$this->session->userdata['user']['username'];?></span>
		</h1><?php 
		if(@$this->session->userdata['user']['username']){?>
			<ul class="nav nav-tabs">
				<li class="<?=strpos($_SERVER['REQUEST_URI'],'dashboard')?'active':''?>"><a href="<?=base_url().'user/dashboard'?>">Dashboard</a></li>
				<li class="<?=strpos($_SERVER['REQUEST_URI'],'ticket/create') || strpos($_SERVER['REQUEST_URI'],'ticket/view') || strpos($_SERVER['REQUEST_URI'],'ticket/edit')?'active':''?>"><a href="<?=base_url().'ticket/create'?>"><?=strpos($_SERVER['REQUEST_URI'],'ticket/view') || strpos($_SERVER['REQUEST_URI'],'ticket/edit') ?'':'Create'?> Ticket</a></li>
				<li class="<?=strpos($_SERVER['REQUEST_URI'],'logout')?'active':''?>"><a href="<?=base_url().'user/logout'?>">Logout</a></li>
			</ul>
			<br><?php
		}?>