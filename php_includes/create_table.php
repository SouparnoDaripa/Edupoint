<?php 

include_once("db_con.php");

$tbl_usrs = "CREATE TABLE IF NOT EXISTS users(
		id INT(11) NOT NULL AUTO_INCREMENT,
		username VARCHAR(100) NOT NULL,
		email VARCHAR(255) NOT NULL,
		password VARCHAR(100) NOT NULL,
		gender ENUM('m', 'f', 'o') NOT NULL DEFAULT 'f',
		userlevel ENUM('a','b','c','d') NOT NULL DEFAULT 'a',
		avatar VARCHAR(255) NULL,
		ip VARCHAR(255) NOT NULL,
		signup DATETIME NOT NULL,
		notescheck DATETIME NOT NULL,
		activated ENUM('0','1') NOT NULL DEFAULT '0',
		PRIMARY KEY (id),
		UNIQUE KEY username (username, email)
	)";
$query = mysqli_query($db_conx, $tbl_usrs);

$tbl_usroptions = "CREATE TABLE IF NOT EXISTS usroptions(
		id INT(11) NOT NULL AUTO_INCREMENT,
		username VARCHAR(100) NOT NULL,
		background VARCHAR(255) NOT NULL,
		question VARCHAR(255) NULL,
		answer VARCHAR(255) NULL,
		PRIMARY KEY (id),
		UNIQUE KEY username (username) 
	)";
$query = mysqli_query($db_conx, $tbl_usroptions);

$tbl_reviews = "CREATE TABLE IF NOT EXISTS review(
		id INT(11) NOT NULL AUTO_INCREMENT,
		lession_id INT(11) NOT NULL,
		user_id INT(11) NOT NULL,
		rating INT(11) NOT NULL,
		review TEXT NOT NULL,
		review_date DATETIME NOT NULL,
		PRIMARY KEY (id)
	)";

$query = mysqli_query($db_conx, $tbl_reviews);

$tbl_subject = "CREATE TABLE IF NOT EXISTS subject(
		id INT(11) NOT NULL AUTO_INCREMENT,
		subject_name VARCHAR(16) NOT NULL,
		subject_img VARCHAR(255) NOT NULL,
		PRIMARY KEY (id)
	)";

$query = mysqli_query($db_conx, $tbl_subject);

$tbl_lession = "CREATE TABLE IF NOT EXISTS lession(
		id INT(11) NOT NULL AUTO_INCREMENT,
		sub_id INT(11) NOT NULL,
		lession_name VARCHAR(255) NOT NULL,
		lession_img VARCHAR(255) NOT NULL,
		PRIMARY KEY (id)
	)";

$query = mysqli_query($db_conx, $tbl_lession);

$tbl_lec = "CREATE TABLE IF NOT EXISTS lecture(
		lec_id INT(11) NOT NULL AUTO_INCREMENT,
		chap_id INT(11) NOT NULL,
		lec_name VARCHAR(255) NOT NULL,
		url VARCHAR(255) NOT NULL,
		uploaddate DATETIME NOT NULL,
		PRIMARY KEY (lec_id)
	)";

$query = mysqli_query($db_conx, $tbl_lec);

$tbl_notifications = "CREATE TABLE IF NOT EXISTS notifications(
		id INT(11) NOT NULL AUTO_INCREMENT,
		username VARCHAR(16) NOT NULL,
		initiator VARCHAR(16) NOT NULL,
		app VARCHAR(16) NOT NULL,
		note VARCHAR(16) NOT NULL,
		did_read ENUM('0', '1') NOT NULL DEFAULT '0',
		date_time DATETIME NOT NULL,
		PRIMARY KEY (id)
	)";

$query = mysqli_query($db_conx, $tbl_notifications);

?>