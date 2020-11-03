<?php
class StudentView extends DV
{

    public function displayBody()
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Display Student Summary</h1>
            <p class="mb-4">A registry of all students enrolled at <?php echo $this->retrieveLookup('tbl_schoolinfo', 0); ?>.
                This data starts in the year 2020.</p>

            <!-- Display Students in Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-primary">List of Students
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModalCenter">
                            Add New Student
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content col-xl-12 col-md-12 mb-4">
                                    <form action="index" name="studentform" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title col-md-6" id="exampleModalCenterTitle">Add New Student</h5>
                                            <?php
                                                $result = $this->retrieveLookup('tbl_students', 102);
                                                $studentID = "Last Student ID: " . $result['studentID'];
                                            ?>
                                            <input class="col-md-4 form-control" type="text" placeholder="Last Student ID" disabled value="<?php echo $studentID; ?>">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <br />
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" style="float:right;" class="form-control" name="studentID" id="studentID" placeholder="Enter Student ID">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <?php
                                                $month = date('m');
                                                $day = date('d');
                                                $year = date('Y');

                                                $today = $year . '-' . $month . '-' . $day;
                                                ?>
                                                <input type="date" value="<?php echo $today; ?>" style="float:right;" class="form-control" name="registrationDate" id="registrationDate">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="firstName">First Name</label>
                                                <input type="text" class="form-control" id="firstName" name="firstName">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="middleName">Middle Name</label>
                                                <input type="text" class="form-control" id="middleName" name="middleName">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName">
                                            </div>
                                            <div class="form-group  col-md-3">
                                                <label for="gender">Gender</label>
                                                <select id="gender" class="form-control" name="gender">
                                                    <option selected>Choose</option>
                                                    <option>M</option>
                                                    <option>F</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group  col-md-3">
                                                <label for="dob">Date of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob">
                                            </div>
                                            <div class="form-group  col-md-3">
                                                <label for="boardStatus">Will student board on campus?</label>
                                                <input type="checkbox" class="form-control" id="boardStatus" name="boardStatus">
                                            </div>
                                            <div class="form-group  col-md-3">
                                                <label for="houseID">House</label>
                                                <select id="houseID" class="form-control" name="houseID">
                                                    <option selected>Choose</option>
                                                    <?php
                                                    $house_list = $this->retrieveLookup('tbl_houses', 1);
                                                    foreach ($house_list as $houses) { ?>
                                                        <option value="<?php echo $houses['housesID']; ?>"><?php echo $houses['houseName']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group  col-md-3">
                                                <label for="religionID">Religion</label>
                                                <select id="religionID" class="form-control" name="religionID">
                                                    <option selected>Choose</option>
                                                    <?php
                                                    $religion_list = $this->retrieveLookup('tbl_religion', 1);
                                                    foreach ($religion_list as $religions) { ?>
                                                        <option value="<?php echo $religions['religionID']; ?>"><?php echo $religions['religionName']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group  col-md-3">
                                                <label for="classID">Class</label>
                                                <select id="classID" class="form-control" name="classID">
                                                    <option selected>Choose</option>
                                                    <?php
                                                    $class_list = $this->retrieveLookup('tbl_classes', 1);
                                                    foreach ($class_list as $classes) { ?>
                                                        <option value="<?php echo $classes['classID']; ?>"><?php echo $classes['classDescription']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group  col-md-3">
                                                <label for="streamID">Stream</label>
                                                <select id="streamID" class="form-control" name="streamID">
                                                    <option selected>Choose</option>
                                                    <?php
                                                    $stream_list = $this->retrieveLookup('tbl_streams', 1);
                                                    foreach ($stream_list as $streams) { ?>
                                                        <option value="<?php echo $streams['streamID']; ?>"><?php echo $streams['streamName']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group  col-md-3">
                                                <label for="prevSchoolID">Previous School</label>
                                                <select id="prevSchoolID" class="form-control" name="prevSchoolID">
                                                    <option selected>Choose</option>
                                                    <?php
                                                    $prevschool_list = $this->retrieveLookup('tbl_prevschool', 1);
                                                    foreach ($prevschool_list as $prevschools) { ?>
                                                        <option value="<?php echo $prevschools['prevSchoolID']; ?>"><?php echo $prevschools['prevSchoolName']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group  col-md-3">
                                                <label for="prevSchoolYear">Year attended previous school</label>
                                                <input type="number" class="form-control" id="prevSchoolYear" name="prevSchoolYear">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="islandID">Island</label>
                                                <select id="islandID" class="form-control" name="islandID">
                                                    <option selected>Choose</option>
                                                    <?php
                                                    $island_list = $this->retrieveLookup('tbl_island', 1);
                                                    foreach ($island_list as $islands) { ?>
                                                        <option value="<?php echo $islands['islandID']; ?>"><?php echo $islands['islandName']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="villageName">Village/City</label>
                                                <input type="text" class="form-control" id="villageName" name="villageName">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="provinceID">Province</label>
                                                <select id="provinceID" class="form-control" name="provinceID">
                                                    <option selected>Choose</option>
                                                    <?php
                                                    $province_list = $this->retrieveLookup('tbl_province', 1);
                                                    foreach ($province_list as $provinces) { ?>
                                                        <option value="<?php echo $provinces['provinceID']; ?>"><?php echo $provinces['provinceName']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="usecase" value="ucnewstudent">
                                        <input type="hidden" name="action" value="actnewstudent">
                                        <div class="modal-footer">
                                            <a class="collapse-item" href="#" onclick="studentform.submit();"><span>Add</span></a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>House</th>
                                    <th>Class</th>
                                    <th>Stream</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $student_list = $this->retrieveLookup('tbl_students', 100);
                                //print_r($student_list);
                                if (isset($student_list)) {
                                    foreach ($student_list as $students) { ?>
                                        <tr>
                                            <td><?php echo $students['studentID']; ?></td>
                                            <td><?php echo $students['firstName']; ?></td>
                                            <td><?php echo $students['middleName']; ?></td>
                                            <td><?php echo $students['lastName']; ?></td>
                                            <td><?php echo $students['gender']; ?></td>
                                            <td><?php echo $students['dob']; ?></td>
                                            <td><?php echo $students['houseName']; ?></td>
                                            <td><?php echo $students['classDescription']; ?></td>
                                            <td><?php echo $students['streamName']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="row col-md-12 col-xl-12">
                                        <div class="card text-white bg-danger mb-3 " style="max-width: 18rem;">
                                            <div class="card-body">
                                                <h2 class="card-title">No data returned!</h2>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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