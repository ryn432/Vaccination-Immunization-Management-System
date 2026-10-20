<?php
//fetch all region data from database
//Include database configuration file
include('../modify_center_scheduler/db_connect.php');

// select all regions from database 
$query = $mysqli->query("SELECT * FROM division ORDER BY division_name ASC");

//Count total number of rows
$rowCount = $query->num_rows;

//Display district list
if($rowCount > 0)
{
	//initial message display 
    //echo '<input type="text" >';// initial message display
    echo '<option value="">Select Region</option>';
        
    while($row = $query->fetch_assoc())
	{
        // select division id & name from division table
        echo '<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
    }
}
else
	{
        //display when no data!
        echo '<option value="">Region Not Available</option>';
	}
?>
