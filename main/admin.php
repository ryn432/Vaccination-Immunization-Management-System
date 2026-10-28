<?php
  $page_title = 'Dashboard';
  require_once('../load.php');
  page_require_level(3);
?>

<?php
  $c_user = count_by_id('users');
?>

<?php include_once('../header.php'); ?>

<div id="page-wrapper">
	<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h1>Dashboard</h1>
      <hr>
    </div>
    <div class="row">
                <!-- 4 Boxes Start -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-archive fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                        $conn = mysqli_connect("localhost", "root", "", "central_db");
                                        $result = $db->query("SELECT COUNT(*) FROM division");
                                        $row = $result->fetch_row();
                                        echo $row[0];
                                      ?>
                                    </div>
                                    <div>Regions</div>
                                </div>
                            </div>
                        </div>
                        <a href="../data_info/Division.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bars fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                        $conn = mysqli_connect("localhost", "root", "", "central_db");
                                        $result = $db->query("SELECT COUNT(*) FROM district");
                                        $row = $result->fetch_row();
                                        echo $row[0];
                                      ?>
                                    </div>
                                    <div>Districts</div>
                                </div>
                            </div>
                        </div>
                        <a href="../data_info/District.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-columns fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                        //$conn = mysqli_connect("localhost", "root", "", "central_db");
                                        //$result = $db->query("SELECT COUNT(*) FROM upazila");
                                        //$row = $result->fetch_row();
                                        //echo $row[0];
                                      ?>
                                    </div>
                                    <div>Upazilas</div>
                                </div>
                            </div>
                        </div>
                        <a href="../data_info/Upazilla.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-codepen fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      <?php
                                        $conn = mysqli_connect("localhost", "root", "", "central_db");
                                        $result = $db->query("SELECT COUNT(*) FROM union_council");
                                        $row = $result->fetch_row();
                                        echo $row[0];
                                      ?>
                                    </div>
                                    <div>Union Councils</div>
                                </div>
                            </div>
                        </div>
                        <a href="../data_info/Union.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- 4 Boxes End -->
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <th>Age for Vaccine</th>
                            <th>Name of Vaccine</th>
                            <th>Preventive Disease</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>After Birth</td>
                                <td>BCG, OPV 0 (oral polio vaccine)</td>
                                <td>Tuberculosis, Poliomyelitis</td>
                            </tr>

                            <tr>
                                <td>6 Weeks</td>
                                <td>DTP-HepB-Hib 1 (pentavalent), OPV 1, PCV13 1 (pneumococcal conjugate), Rotavirus 1</td>
                                <td>Diphtheria, tetanus, pertussis (whooping cough), hepatitis B, Haemophilus influenzae type b (meningitis, pneumonia), Poliomyelitis, Pneumococcal pneumonia, meningitis and sepsis, Rotavirus diarrhoea</td>
                            </tr>
                            <tr>
                                <td>10 Weeks</td>
                                <td>DTP-HepB-Hib 2, OPV 2, PCV13 2, Rotavirus 2</td>
                                <td>Diphtheria, tetanus, pertussis, hepatitis B, Hib, Poliomyelitis, Pneumococcal disease,Rotavirus diarrhoea</td>
                            </tr>
                            <tr>
                                <td>14 Weeks</td>
                                <td>DTP-HepB-Hib 3, OPV 3, PCV13 3, IPV (inactivated polio vaccine)</td>
                                <td>Diphtheria, tetanus, pertussis, hepatitis B, Hib, Poliomyelitis, Pneumococcal disease</td>
                            </tr>
                            <tr>
                                <td>9 Mothns</td>
                                <td>Measles-Rubella (MR), Yellow fever (YF)</td>
                                <td>Measles, Rubella, Yellow fever</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-area-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      Statistics
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="../vaccine_statistics/index.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-mobile fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      Application
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Download Now</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-newspaper-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                      Document
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Download Now</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
  </div>
</div>
<?php include_once('../footer.php'); ?>
