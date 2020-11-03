<?php
class AddressView extends DV
{

    public function displayBody()
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Student Addresses</h1>
            <p class="mb-4">This table is for addresses of students at <?php echo $this->retrieveLookup('tbl_schoolinfo', 0); ?>.
                This data starts in the year 2020.</p>

            <!-- Display Students in Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-primary">List of Addresses
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#addressmodal">
                            Add New Address
                        </button>
                        <!-- Modal for entering new addresses -->
                        <div class="modal fade" id="addressmodal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content col-xl-12 col-md-12 mb-4">
                                    <form action="index" name="addressform" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add New Address</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <br />
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <select id="studentID" class="form-control form-control col-md-6" name="studentID">
                                                    <option selected>--Select Student--</option>
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
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="guardiansResidents">Guardian's Address</label>
                                                <input type="text" class="form-control" name="guardiansResidents" id="guardiansResidents">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="guardiansPostalCode">Guardian's Postal Code</label>
                                                <input type="text" class="form-control" name="guardiansPostalCode" id="guardiansPostalCode">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="parent1Residence">Parent 1 Address</label>
                                                <input type="text" class="form-control" id="parent1Residence" name="parent1Residence">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="parent1PostalCode">Parent 1 Code</label>
                                                <input type="text" class="form-control" name="parent1PostalCode" id="parent1PostalCode">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="parent2Residence">Parent 2 Address</label>
                                                <input type="text" class="form-control" id="parent2Residence" name="parent2Residence">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="parent2PostalCode">Parent 2 Code</label>
                                                <input type="text" class="form-control" name="parent2PostalCode" id="parent2PostalCode">
                                            </div>
                                        </div>
                                        <input type="hidden" name="usecase" value="ucnewaddress">
                                        <input type="hidden" name="action" value="actnewaddress">
                                        <div class="modal-footer">
                                            <a class="collapse-item" href="#" onclick="addressform.submit();"><span>Add</span></a>
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
                                    <th>Guardians Address</th>
                                    <th>Guardians Postal Code</th>
                                    <th>Parent 1 Address</th>
                                    <th>Parent 1 Postal Code</th>
                                    <th>Parent 2 Address</th>
                                    <th>Parent 2 Postal Code</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $adderss_list = $this->retrieveLookup('tbl_studentaddresses', 104);
                                if (isset($adderss_list)) {
                                    foreach ($adderss_list as $addresses) { ?>
                                        <tr>
                                            <td><?php echo $addresses['addressID']; ?></td>
                                            <td><?php echo $addresses['studentID']; ?></td>
                                            <td><?php echo $addresses['guardiansResidents']; ?></td>
                                            <td><?php echo $addresses['guardiansPostalCode']; ?></td>
                                            <td><?php echo $addresses['parent1Residence']; ?></td>
                                            <td><?php echo $addresses['parent1PostalCode']; ?></td>
                                            <td><?php echo $addresses['parent2Residence']; ?></td>
                                            <td><?php echo $addresses['parent2PostalCode']; ?></td>
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

        <!-- Modal for editing addresses -->
        <div class="modal fade" id="editaddress" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content col-xl-12 col-md-12 mb-4">
                    <form action="index" name="editaddressform" method="post">
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
                                    <label for="guardiansPostalCode">Student ID</label>
                                    <input type="text" class="form-control" name="sID" id="sID" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="guardiansResidents">Guardian's Address</label>
                                <input type="text" class="form-control" name="gResidents" id="gResidents">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="guardiansPostalCode">Guardian's Postal Code</label>
                                <input type="text" class="form-control" name="gPostalCode" id="gPostalCode">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="parent1Residence">Parent 1 Address</label>
                                <input type="text" class="form-control" id="p1Residence" name="p1Residence">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="parent1PostalCode">Parent 1 Code</label>
                                <input type="text" class="form-control" name="p1PostalCode" id="p1PostalCode">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="parent2Residence">Parent 2 Address</label>
                                <input type="text" class="form-control" id="p2Residence" name="p2Residence">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="parent2PostalCode">Parent 2 Code</label>
                                <input type="text" class="form-control" name="p2PostalCode" id="p2PostalCode">
                            </div>
                        </div>
                        <input type="hidden" name="addressID" id="addressID">
                        <input type="hidden" name="usecase" value="ucedtaddress">
                        <input type="hidden" name="action" value="actedtaddress">
                        <div class="modal-footer">
                            <a class="collapse-item" href="#" onclick="editaddressform.submit();"><span>Save</span></a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div><!-- Modal for DELETING addresses -->
        <div class="modal fade" id="deleteaddress" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content col-xl-8 col-md-6 mb-4">
                    <form action="index" name="deleteaddressform" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <h4>Are you sure you want to delete this data?</h4>
                        <input type="hidden" name="addrID" id="addrID">
                        <input type="hidden" name="usecase" value="ucdltaddress">
                        <input type="hidden" name="action" value="actdltaddress">
                        <div class="modal-footer">
                            <a class="collapse-item" href="#" onclick="deleteaddressform.submit();"><span>Yes</span></a>
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
                    $('#editaddress').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#addressID').val(data[0]);
                    $('#sID').val(data[1]);
                    $('#gResidents').val(data[2]);
                    $('#gPostalCode').val(data[3]);
                    $('#p1Residence').val(data[4]);
                    $('#p1PostalCode').val(data[5]);
                    $('#p2Residence').val(data[6]);
                    $('#p2PostalCode').val(data[7]);
                })
            })

            //--DELETE SCRIPT--
            $(document).ready(function() {
                $('.deletebtn').on('click', function() {
                    $('#deleteaddress').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#addrID').val(data[0]);
                })
            })
        </script>



<?php }
}
?>