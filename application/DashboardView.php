<?php
class DashboardView extends DV
{

  public function displayBody()
  {
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
      <p class="mb-4">A student registry from <a href="http://www.yumidisaen.com">Yumi Disaen</a> on behalf of <a href="http://www.viewpx.org">Viewpoint Exploration</a>.</p>

      <!-- Display Students in Table -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6>
            <?php echo date("D, d M Y"); ?>
          </h6>
        </div>
        <div class="card-body">
          <div class="card text-white bg-primary mb-3 col-md-6 " style="max-width: 18rem; float:left;">
            <div class="card-body">
              <h2 class="card-title"><?php echo $this->retrieveLookup('tbl_students', 2) ?: "0"; ?></h2>
              <p class="card-text">students are enrolled.</p>
            </div>
          </div>
          <div class="card text-white bg-info mb-3 col-md-6" style="max-width: 18rem; float:left;">
            <div class="card-body">
              <h2 class="card-title"><?php echo $this->retrieveLookup('tbl_houses', 3) ?: "0"; ?></h2>
              <p class="card-text">houses registered.</p>
            </div>
          </div>
          <div class="card text-white bg-secondary mb-3 col-md-6" style="max-width: 18rem; float:left;">
            <div class="card-body">
              <h2 class="card-title"><?php echo $this->retrieveLookup('tbl_classes', 4) ?: "0"; ?></h2>
              <p class="card-text">classes recorded.</p>
            </div>
          </div>
          <div class="card text-white bg-dark mb-3 col-md-6" style="max-width: 18rem;">
            <div class="card-body">
              <h2 class="card-title"><?php echo $this->retrieveLookup('tbl_streams', 5) ?: "0"; ?></h2>
              <p class="card-text">streams altogether.</p>
            </div>
          </div>

        </div>

      </div>

      <div class="card shadow mb-4 ">
        <div class="card-header py-3">
          <h6>
            Quarterly Stats
          </h6>
        </div>
        <div class="row ">
          <div class="card-body">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2 ">
                <div class="card-body ">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">School Fees (Term 3)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">VT4,000,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Outstanding Fees (Term1 & 2)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">VT2,150,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-12 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Content Row -->
        <div class="row">

          <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">School Fees Trends</h6>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
                <hr>
                This chart is for demo purposes only.
              </div>
            </div>

            <!-- Bar Chart -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Donations</h6>
              </div>
              <div class="card-body">
                <div class="chart-bar">
                  <canvas id="myBarChart"></canvas>
                </div>
                <hr>
                This chart is for demo purposes only.
              </div>
            </div>

          </div>

          <!-- Donut Chart -->
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Graduating Classes</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-pie pt-4">
                  <canvas id="myPieChart"></canvas>
                </div>
                <hr>
                This chart is for demo purposes only.
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Your Website 2019</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>



<?php }
}
?>