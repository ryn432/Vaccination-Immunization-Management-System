<?php
//Include database configuration file
include('../modify_center_scheduler/db_connect.php');

session_start();

// Small helper: escape text before printing it into HTML
function e($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

/*
 * NOTE: the branches are an if / elseif chain on purpose.
 * The "year" request now sends BOTH epi_year and union_id, so epi_year
 * must be tested first, otherwise the union_id branch would also run
 * and print year options into the center table area.
 */

// ---------------------------------------------------------------
// 1. Year selected -> show the schedule table for that union + year
// ---------------------------------------------------------------
if(isset($_POST["epi_year"]) && !empty($_POST["epi_year"]))
{
    $epi_year = $_POST["epi_year"];

    // Prefer the union sent by the page, fall back to the session value
    if(!empty($_POST["union_id"]))
    {
        $union_id = $_POST["union_id"];
    }
    elseif(!empty($_SESSION["union_id"]))
    {
        $union_id = $_SESSION["union_id"];
    }
    else
    {
        $union_id = '';
    }

    $stmt = $mysqli->prepare("SELECT * FROM epi_schedule WHERE epi_year_ec = ? AND union_id = ?");
    $stmt->bind_param("ss", $epi_year, $union_id);
    $stmt->execute();
    $query = $stmt->get_result();

    //Count total number of rows
    $rowCount = $query->num_rows;

    if($rowCount > 0)
    {
        echo "<table class='table table-bordered'>
            <tr><td colspan='20' class='text-center'>The below information are shown based on your uploaded Union Council's EPI Center data. You can do an EDIT by using Edit Action</td></tr>
            <tr>
                <th>Ward No</th>
                <th>Sub-Block</th>
                <th>Center Name</th>
                <th>From House</th>
                <th>To House</th>
                <th>Center Type</th>
                <th>JAN</th>
                <th>FEB</th>
                <th>MAR</th>
                <th>APR</th>
                <th>MAY</th>
                <th>JUN</th>
                <th>JUL</th>
                <th>AUG</th>
                <th>SEP</th>
                <th>OCT</th>
                <th>NOV</th>
                <th>DEC</th>
                <th>HA Details</th>
                <th>Action</th>
            </tr>";

        while($row = $query->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>" . e($row['ward_no']) . "</td>";
            echo "<td>" . e($row['sub_block_name']) . "</td>";
            echo "<td>" . e($row['center_name']) . "</td>";
            echo "<td>" . e($row['from_house']) . "</td>";
            echo "<td>" . e($row['to_house']) . "</td>";
            echo "<td>" . e($row['center_type']) . "</td>";
            echo "<td>" . e($row['jan_date']) . "</td>";
            echo "<td>" . e($row['feb_date']) . "</td>";
            echo "<td>" . e($row['mar_date']) . "</td>";
            echo "<td>" . e($row['apr_date']) . "</td>";
            echo "<td>" . e($row['may_date']) . "</td>";
            echo "<td>" . e($row['jun_date']) . "</td>";
            echo "<td>" . e($row['jul_date']) . "</td>";
            echo "<td>" . e($row['aug_date']) . "</td>";
            echo "<td>" . e($row['sep_date']) . "</td>";
            echo "<td>" . e($row['oct_date']) . "</td>";
            echo "<td>" . e($row['nov_date']) . "</td>";
            echo "<td>" . e($row['dec_date']) . "</td>";
            echo "<td>" . e($row['ha_details']) . "</td>";
            echo "<td><a href='../modify_center_scheduler/edit_calender.php?id=" . (int)$row['id'] . "'>Edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "<br>";
        echo "<h3 align='center'>Sorry, No Available Information!</h3>";
        echo "<hr>";
    }
}

// ---------------------------------------------------------------
// 2. Union selected -> list the years available for that union
// ---------------------------------------------------------------
elseif(isset($_POST["union_id"]) && !empty($_POST["union_id"]))
{
    $union_id = $_POST["union_id"];
    $_SESSION["union_id"] = $union_id;

    $stmt = $mysqli->prepare("SELECT DISTINCT epi_year FROM epi_center WHERE union_id = ? ORDER BY epi_year ASC");
    $stmt->bind_param("s", $union_id);
    $stmt->execute();
    $query = $stmt->get_result();

    //Count total number of rows
    $rowCount = $query->num_rows;

    if($rowCount > 0)
    {
        echo '<option value="">Select Year</option>';

        while($row = $query->fetch_assoc())
        {
            echo '<option value="'.e($row['epi_year']).'">'.e($row['epi_year']).'</option>';
        }
    }
    else
    {
        echo '<option value="">Year Not Available</option>';
    }
}

// ---------------------------------------------------------------
// 3. District selected -> list the unions of that district
//    (replaces the old district -> upazila -> union steps)
// ---------------------------------------------------------------
elseif(isset($_POST["district_id"]) && !empty($_POST["district_id"]))
{
    $district_id = $_POST["district_id"];

    $stmt = $mysqli->prepare("SELECT * FROM union_council WHERE district_id = ? ORDER BY union_name ASC");
    $stmt->bind_param("s", $district_id);
    $stmt->execute();
    $query = $stmt->get_result();

    //Count total number of rows
    $rowCount = $query->num_rows;

    if($rowCount > 0)
    {
        echo '<option value="">Select Union</option>';

        while($row = $query->fetch_assoc())
        {
            echo '<option value="'.e($row['union_id']).'">'.e($row['union_name']).'</option>';
        }
    }
    else
    {
        echo '<option value="">Union Not Available</option>';
    }
}

// ---------------------------------------------------------------
// 4. Division (region) selected -> list its districts
// ---------------------------------------------------------------
elseif(isset($_POST["division_id"]) && !empty($_POST["division_id"]))
{
    $division_id = $_POST["division_id"];

    $stmt = $mysqli->prepare("SELECT * FROM district WHERE division_id = ? ORDER BY district_name ASC");
    $stmt->bind_param("s", $division_id);
    $stmt->execute();
    $query = $stmt->get_result();

    //Count total number of rows
    $rowCount = $query->num_rows;

    if($rowCount > 0)
    {
        echo '<option value="">Select District</option>';

        while($row = $query->fetch_assoc())
        {
            echo '<option value="'.e($row['district_id']).'">'.e($row['district_name']).'</option>';
        }
    }
    else
    {
        echo '<option value="">District Not Available</option>';
    }
}
?>