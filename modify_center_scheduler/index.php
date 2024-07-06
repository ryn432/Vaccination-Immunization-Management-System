<?php
  $page_title = 'View Center Schedule';
  require_once('../load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(3);
//pull out all user form database
 $all_users = find_all_user();
?>
<?php include_once('../header.php'); ?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script>
    window.load=$( document ).ready(function()
    {
      $.ajax(
      {
        type:'POST',
        url:'../view_center_scheduler/epiInfoAjaxData.php',
        success:function(html)
        {
          $('#division').html(html);
        }
      });
		});

		$( document ).ready(function()
    {
			$('#division').on('change',function()
      {//change function on division to display all district
        var divisionID = $(this).val();
        if(divisionID)
        {
          $.ajax(
          {
            type:'POST',
            url:'../modify_center_scheduler/ajaxData.php',
            data:'division_id='+divisionID,
            success:function(html)
            {
              $('#district').html(html);
              $('#subdistrict').html('<option value="">Select District First</option>');
              $('#union').html('<option value="">Select SubDistrict First</option>');
              $('#epi_year').html('<option value="">Select Union First</option>');
            }
          });
        }
        else
        {
          $('#district').html('<option value="">Select Division First</option>');
          $('#subdistrict').html('<option value="">Select District First</option>');
        }
      });

    $('#district').on('change',function()
    {//change district to display all subdistrict
      var districtID = $(this).val();
      if(districtID)
      {
        $.ajax(
        {
          type:'POST',
          url:'../modify_center_scheduler/ajaxData.php',
          data:'district_id='+districtID,
          success:function(html)
          {
            $('#subdistrict').html(html);
          }
        });
      }
      else
      {
        $('#subdistrict').html('<option value="">Select District First</option>');
      }
    });

    $('#subdistrict').on('change',function()
    {//change subdistrict to display all union
      var subdistrictID = $(this).val();
      if(subdistrictID)
      {
        $.ajax(
        {
          type:'POST',
          url:'../modify_center_scheduler/ajaxData.php',
          data:'subdistrict_id='+subdistrictID,
          success:function(html)
          {
            $('#union').html(html);
          }
        });
      }
      else
      {
        $('#union').html('<option value="">Select SubDistrict First</option>');
      }
    });

    $('#union').on('change',function()
    {//change subdistrict to display all union
      var unionID = $(this).val();
      if(unionID)
      {
        $.ajax(
        {
          type:'POST',
          url:'../modify_center_scheduler/ajaxData.php',
          data:'union_id='+unionID,
          success:function(html)
          {
            $('#epi_year').html(html);
          }
        });
      }
      else
      {
        $('#epi_year').html(html);
      }
    });

    $('#epi_year').on('change',function()
    {//change subdistrict to display all union
      var epi_yearID = $(this).val();
      if(epi_yearID)
      {
        $.ajax(
        {
          type:'POST',
          url:'../modify_center_scheduler/ajaxData.php',
          data:'epi_year='+epi_yearID,
          success:function(html)
          {
            $('#center').html(html);
          }
        });
      }
      else
      {
        $('#center').html(html);
      }
    });
	 });
	</script>
</head>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
<h1 align="center">Modify EPI Schedule Session Details</h1>
<hr>
    <div class="col">
      <h5>Division</h5>
      <select name="division" id="division" data-live-search="true" class="chosen selectpicker form-control" autofocus="autofocus" required>
        <option value="">Select Division</option>
      </select>
    </div>
    <br>
    <div class="col">
      <h5>District</h5>
      <select class="selectpicker form-control" name="district" id="district" required>
        <option value="">Select Division First</option>
      </select>
    </div>
    <br>
    <div class="col">
      <h5>SubDistrict</h5>
      <select class="selectpicker form-control" name="subdistrict" id="subdistrict" standard title="Select Division First" autofocus="autofocus" required>
        <option value="">Select Division First</option>
      </select>
    </div>
    <br>
    <div class="col">
      <h5>Union</h5>
      <select class="selectpicker form-control" name="union" id="union" standard title="Select Division First" autofocus="autofocus" required>
        <option value="">Select Division First</option>
      </select>
    </div>
    <br>
    <div class="col">
      <h5>Year</h5>
      <select class="selectpicker form-control" name="epi_year" id="epi_year" standard title="Select Division First" autofocus="autofocus" required>
        <option value="">Select Division First</option>
      </select>
    </div>
  <br>
  <div class="table-responsive">
    <div class="table table-sm" align='center'>
      <div name="center" id="center"></div>
    </div>
  </div>
</br>
    </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>
