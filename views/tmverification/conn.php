<?php

	$conn=mysqli_connect("localhost:3307","root","","ebis_crm"); 
  	// Check connection
      if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
