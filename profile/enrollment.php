<?php
$number = $profile_data['enrollment_id'];;
$enroll_break = str_split($number,3); // Splits the number into a new element every 3 characters
//echo( $enroll_break[0].' ' .$enroll_break[1].' '. $enroll_break[2] ); // Ouputs each element with a space in between
//	echo( $enroll_break[3]); // Ouputs each element with a space in between
	$rollno=$enroll_break[0];
	$school_code=$enroll_break[1];
	$course= $enroll_break[2];
	$year=$enroll_break[3];
	
	if($year=='14'){
	$batch="Batch 2018";
	}
	else if($year=='15'){
	$batch="Batch 2019";
	}
	else if($year=='12'){
	$batch="Batch 2016";
	}
	else if($year=='13'){
	$batch="Batch 2017";
	}
	else if($year=='11'){
	$batch="Batch 2015";
	}
	else if($year=='16'){
	$batch="Batch 2020";
	}
	else{
	$batch="Batch is not specified , since enrollment number specified is not correct.";
	}
	
	if($school_code=='164'){
	
	$school="University School of Information and Communication Technology";
	
	}else if($school_code=='208'){
	
	$school="Bhagwan Parshuram Institute of Technology";
	
	}
	else {
	$school="University School of Studies(Enrollment number specified is not correct.)";
	
	}
	if($course=='105'){
	$branch="B.E (Information Technology)";
	
	}
	else if($course=='015'){
	$branch="B.E (Information Technology)";
	
	}
	else if($course=='128'){
	$branch="B.E (Electronics and Communication Engineering)";
	
	}
	else if($course=='032'){
	$branch="B.E (Computer Science Engineering)";
	
	}
	else if($course=='045'){
	$branch="Master of Computer Application(S.E)";
	
	}else if($course=='031'){
	$branch="Information Technology ";
	
	}
	else{
	$branch="(Enrollment number specified is not correct.)";
	
	}
	?>