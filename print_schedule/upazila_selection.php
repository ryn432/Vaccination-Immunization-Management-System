<?php
  $page_title = 'Print Schedule';
  require_once('../load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(3);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('../header.php'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-left">STEP :: 3</h2>
            <hr>
            <div class="outer-scontainer">
		        <div class="row">
		          <div class="jumbotron">
		            <div class="container">
		              <h4 class="display-3">
		              	<article>
		              	Please select an <strong>SubDistrict...</strong>
		              </article>
		              </h4>
		              <br>
		            <?php
					$con = mysqli_connect("localhost","root","","central_db");

					// Check connection
					if (mysqli_connect_errno())
					  {
					  echo "Failed to connect to MySQL: " . mysqli_connect_error();
					  }
					?>
					<?php
						global $subdistrict_id;
						$district_id;
						$district_id = $_SESSION['district_id'];

						$query_subdistrict = "SELECT * FROM subdistrict WHERE district_id = $district_id";
						$query_subdistrict_run = mysqli_query($con, $query_subdistrict);

						echo "<form method='post' action=''>";
						echo "<select name='subdistrict_id' class='form-control form-control-lg'>";
						while ($row = $query_subdistrict_run->fetch_assoc())
						{

						   echo '<option value="'.$row['subdistrict_id'].'">'.$row['subdistrict_name'].'</option>';
						}
						echo "</select>";
						echo '<br><button class="btn btn-primary" type="submit" name="submit_subdistrict">NEXT</button>';
						echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						echo '<a class="btn btn-warning" href="../print_schedule/district_selection.php">PREVIOUS</a>';
						echo '</form>';

						if(isset($_POST["submit_subdistrict"]))
						{
							$subdistrict_id = $_POST["subdistrict_id"];
							$_SESSION['subdistrict_id'] = $subdistrict_id;
							?>
						<script type="text/javascript">
		    				window.location = "../print_schedule/union_selection.php";
						</script>
					<?php
						}
					?>
		            </div>
		          </div>
		        </div>
        		<br>
      		</div>
        </div>
    </div>
</div>
<?php include_once('../footer.php'); ?>
