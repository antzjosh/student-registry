<?php
class OriginView extends DV
{

    public function displayBody()
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Student Origins</h1>
            <p class="mb-4">This table contains data about where students of <?php echo $this->retrieveLookup('tbl_schoolinfo', 0); ?> hail from.
                This data starts in the year 2020.</p>

            <!-- Display Students in Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-primary">List of Student Origins
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModalCenter">
                            Add New Origin Data
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content col-xl-12 col-md-12 mb-4">
                                    <form action="index" name="originform" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Add New Origin Data</h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <br />
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <select id="houseID" class="form-control form-control col-md-4" name="houseID">
                                                    <option selected>Student ID</option>
                                                    <?php
                                                    $student_list = $this->retrieveLookup('tbl_students', 1);
                                                    foreach ($student_list as $students) { ?>
                                                        <option value="<?php echo $students['studentID']; ?>">
                                                            <?php
                                                            echo $students['firstName'] . " | " . $students['middleName'] . " | " . $students['lastName'];
                                                            ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
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
                                        <input type="hidden" name="usecase" value="ucneworigin">
                                        <input type="hidden" name="action" value="actneworigin">
                                        <div class="modal-footer">
                                            <a class="collapse-item" href="#" onclick="originform.submit();"><span>Add</span></a>
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
                                    <th>Index</th>
                                    <th>Student ID</th>
                                    <th>Village Name</th>
                                    <th>Island Name</th>
                                    <th>Province Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $origin_list = $this->retrieveLookup('tbl_studentorigin', 101);
                                if (isset($origin_list)) {
                                    foreach ($origin_list as $origins) { ?>
                                        <tr>
                                            <td><?php echo $origins['originID']; ?></td>
                                            <td><?php echo $origins['studentID']; ?></td>
                                            <td><?php echo $origins['villageName']; ?></td>
                                            <td><?php echo $origins['islandName']; ?></td>
                                            <td><?php echo $origins['provinceName']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-success editbtn">Edit</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deletebtn">Delete</button>
                                            </td>
                                        </tr>
                                <?php
                                    }
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
        <!-- Modal for EDITING ORIGINS -->
        <div class="modal fade" id="editorigin" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content col-xl-12 col-md-12 mb-4">
                    <form action="index" name="editoriginform" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Address</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <br />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-group col-md-12">
                                    <label for="sID">Student ID</label>
                                    <input type="text" class="form-control" name="sID" id="sID" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <input type="hidden" name="addressID" id="addressID">
                            <div class="form-group col-md-8">
                                <label for="island">Island</label>
                                <select id="island" class="form-control" name="island">
                                    <option selected>Choose</option>
                                    <?php
                                    $island_list = $this->retrieveLookup('tbl_island', 1);
                                    foreach ($island_list as $islands) { ?>
                                        <option value="<?php echo $islands['islandName']; ?>">
                                            <?php echo $islands['islandName']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="guardiansPostalCode">Village</label>
                                <input type="text" class="form-control" name="village" id="village">
                            </div>
                            <label for="province">Province</label>
                            <select id="province" class="form-control" name="province">
                                <option selected>Choose</option>
                                <?php
                                $province_list = $this->retrieveLookup('tbl_province', 1);
                                foreach ($province_list as $provinces) { ?>
                                    <option value="<?php echo $provinces['provinceName']; ?>">
                                        <?php echo $provinces['provinceName']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="originID" id="originID">
                        <input type="hidden" name="usecase" value="ucedtorigin">
                        <input type="hidden" name="action" value="actedtorigin">
                        <div class="modal-footer">
                            <a class="collapse-item" href="#" onclick="editoriginform.submit();"><span>Save</span></a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Modal for DELETING origins -->
        <div class="modal fade" id="deleteorigin" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content col-xl-8 col-md-6 mb-4">
                    <form action="index" name="deleteoriginform" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <h4>Are you sure you want to delete this data?</h4>
                        <input type="hidden" name="oID" id="oID">
                        <input type="hidden" name="usecase" value="ucdltorigin">
                        <input type="hidden" name="action" value="actdltorigin">
                        <div class="modal-footer">
                            <a class="collapse-item" href="#" onclick="deleteoriginform.submit();"><span>Yes</span></a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
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

        <script>
            //--EDIT SCRIPT--
            $(document).ready(function() {
                $('.editbtn').on('click', function() {
                    $('#editorigin').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#originID').val(data[0]);
                    $('#sID').val(data[1]);
                    $('#village').val(data[2]);
                    $('#island').val(data[3]);
                    $('#province').val(data[4]);
                })
            })

            //--DELETE SCRIPT--
            $(document).ready(function() {
                $('.deletebtn').on('click', function() {
                    $('#deleteorigin').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#oID').val(data[0]);
                })
            })
        </script>

<?php }
}
?>