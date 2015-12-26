<?php
	require 'db_constants.inc.php';
	require 'db_connect.inc.php';


	//Date format YYYY-MM-DD
	//Time format HH:MM:SS
	$sql='Create table if not exists blog(id int primary key,title varchar(50),content longtext,author varchar(50),designation varchar(200),date Date default "0000-00-00")';
	mysqli_query($db,$sql) or die(mysqli_error($db));

	$sql='Create table if not exists word(id int primary key,word varchar(50) unique,meaning varchar(200),sentence1 varchar(200),sentence2 varchar(200))';
	mysqli_query($db,$sql) or die(mysqli_error($db));

	$sql='create table if not exists members(id int primary key,name varchar(50),phone char(10),email varchar(50),rollno char(9) default "000000000")';
	mysqli_query($db,$sql) or die(mysqli_error($db));	

	$sql='create table if not exists login(id int primary key,username varchar(100) unique,password char(40),salt char(40),level enum("0","1","2"),constraint login_member_id foreign key (id) references members(id))';
	mysqli_query($db,$sql) or die(mysqli_error($db));

	$sql='Create table if not exists speakers(num int,s_id int,e_id int,topic varchar(50),project varchar(20),primary key(num,s_id,e_id))';
	mysqli_query($db,$sql) or die(mysqli_error($db));

	$sql='create table if not exists meetings(num int primary key,theme varchar(50),date Date default "0000-00-00",time Time default "00:00:00",venue varchar(20),toastmaster varchar(20),ttm varchar(20),ahCounter varchar(20),listener varchar(20),mom mediumText,constraint meeting_speakes_num foreign key (num) references speakers(num))';
	mysqli_query($db,$sql) or die(mysqli_error($db));

	$sql='create table if not exists diary(id int,content mediumText,num int,primary key(id,num))';
	mysqli_query($db,$sql) or die(mysqli_error($db));

	echo 'Tables Created';
?>