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
$(document).ready(function () {

  // 1. Load divisions on page load
  $.ajax({
    type: 'POST',
    url: '../view_center_scheduler/epiInfoAjaxData.php',
    success: function (html) {
      $('#division').html(html);
    }
  });

  // 2. Division -> District
  $('#division').on('change', function () {
    var divisionID = $(this).val();
    if (divisionID) {
      $.ajax({
        type: 'POST',
        url: '../view_center_scheduler/ajaxData.php',
        data: 'division_id=' + divisionID,
        success: function (html) {
          $('#district').html(html);
          $('#union').html('<option value="">Select District First</option>');
          $('#epi_year').html('<option value="">Select Union First</option>');
          $('#center').html('<option value="">Select Year First</option>');
        }
      });
    } else {
      $('#district').html('<option value="">Select Division First</option>');
      $('#union').html('<option value="">Select District First</option>');
      $('#epi_year').html('<option value="">Select Union First</option>');
      $('#center').html('<option value="">Select Year First</option>');
    }
  });

  // 3. District -> Union (replaces the old upazila step)
  $('#district').on('change', function () {
    var districtID = $(this).val();
    if (districtID) {
      $.ajax({
        type: 'POST',
        url: '../view_center_scheduler/ajaxData.php',
        data: 'district_id=' + districtID,
        success: function (html) {
          $('#union').html(html);
          $('#epi_year').html('<option value="">Select Union First</option>');
          $('#center').html('<option value="">Select Year First</option>');
        }
      });
    } else {
      $('#union').html('<option value="">Select District First</option>');
      $('#epi_year').html('<option value="">Select Union First</option>');
      $('#center').html('<option value="">Select Year First</option>');
    }
  });

  // 4. Union -> EPI year
  $('#union').on('change', function () {
    var unionID = $(this).val();
    if (unionID) {
      $.ajax({
        type: 'POST',
        url: '../view_center_scheduler/ajaxData.php',
        data: 'union_id=' + unionID,
        success: function (html) {
          $('#epi_year').html(html);
          $('#center').html('<option value="">Select Year First</option>');
        }
      });
    } else {
      $('#epi_year').html('<option value="">Select Union First</option>');
      $('#center').html('<option value="">Select Year First</option>');
    }
  });

  // 5. EPI year -> Center
  $('#epi_year').on('change', function () {
    var epiYear = $(this).val();
    if (epiYear) {
      $.ajax({
        type: 'POST',
        url: '../view_center_scheduler/ajaxData.php',
        data: 'epi_year=' + epiYear,
        success: function (html) {
          $('#center').html(html);
        }
      });
    } else {
      $('#center').html('<option value="">Select Year First</option>');
    }
  });

});
</script>
</head>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
<h1 align="center">EPI Schedule Session Details</h1>
<hr>
    <div class="col">
      <h5>Region</h5>
      <select name="region" id="division" data-live-search="true" class="chosen selectpicker form-control" autofocus="autofocus" required>
        <option value="">Select Region</option>
      </select>
    </div>
    <br>
    <div class="col">
      <h5>District</h5>
      <select class="selectpicker form-control" name="district" id="district" required>
        <option value="">Select Region First</option>
      </select>
    </div>
   <!-- <br>
    <div class="col">
      <h5>Upazila</h5>
      <select class="selectpicker form-control" name="upazila" id="upazila" standard title="Select Region First" autofocus="autofocus" required>
        <option value="">Select Region First</option>
      </select>
    </div> -->
    <br>
    <div class="col">
      <h5>Facility</h5>
      <select class="selectpicker form-control" name="union" id="union" standard title="Select Region First" autofocus="autofocus" required>
        <option value="">Select District First</option>
      </select>
    </div>
    <br>
    <div class="col">
      <h5>Year</h5>
      <select class="selectpicker form-control" name="epi_year" id="epi_year" standard title="Select Region First" autofocus="autofocus" required>
        <option value="">Select Union First</option>
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