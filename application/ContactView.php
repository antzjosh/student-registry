<?php
class ContactView extends DV
{

    public function displayBody()
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Student Contacts</h1>
            <p class="mb-4">This table contains contact details about students of <?php echo $this->retrieveLookup('tbl_schoolinfo', 0); ?>.
                This data starts in the year 2020.</p>

            <!-- Display Students in Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-primary">List of Student Contacts
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModalCenter">
                            Add New Contact
                        </button>
                        <!-- Modal for entering NEW CONTACTS -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                <div class="modal-content col-xl-12 col-md-12 mb-4">
                                    <form action="index" name="contactform" method="post">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Add New Contact</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <br />
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <select id="studentID" class="form-control form-control col-md-4" name="studentID">
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
                                            <div class="form-group col-md-6">
                                                <label for="contactName">Contact Name</label>
                                                <input type="text" class="form-control" id="contactName" name="contactName">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="kinID">Kin Type</label>
                                                <select id="kinID" class="form-control" name="kinID">
                                                    <option selected>--Select Kin--</option>
                                                    <?php
                                                    $kin_list = $this->retrieveLookup('tbl_kin', 1);
                                                    foreach ($kin_list as $kins) { ?>
                                                        <option value="<?php echo $kins['kinID']; ?>">
                                                            <?php echo $kins['kinName']; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="contactNumber1">Contact Number 1</label>
                                                <input type="number" class="form-control" id="contactNumber1" name="contactNumber1">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="contactNumber2">Contact Number 2</label>
                                                <input type="number" class="form-control" id="contactNumber2" name="contactNumber2">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="contactEmail">Email</label>
                                                <input type="email" class="form-control" id="contactEmail" name="contactEmail">
                                            </div>
                                        </div>
                                        <input type="hidden" name="usecase" value="ucnewcontact">
                                        <input type="hidden" name="action" value="actnewcontact">
                                        <div class="modal-footer">
                                            <a class="collapse-item" href="#" onclick="contactform.submit();"><span>Add</span></a>
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
                                    <th>Contact Name</th>
                                    <th>Kin Type</th>
                                    <th>Contact Number 1</th>
                                    <th>Contact Number 2</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contact_list = $this->retrieveLookup('tbl_studentcontacts', 103);
                                if (isset($contact_list)) {
                                    foreach ($contact_list as $contacts) { ?>
                                        <tr>
                                            <td><?php echo $contacts['contactID']; ?></td>
                                            <td><?php echo $contacts['studentID']; ?></td>
                                            <td><?php echo $contacts['contactName']; ?></td>
                                            <td><?php echo $contacts['kinName']; ?></td>
                                            <td><?php echo $contacts['mobileNumber1']; ?></td>
                                            <td><?php echo $contacts['mobileNumber2']; ?></td>
                                            <td><?php echo $contacts['email']; ?></td>
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
        <!-- Modal for EDITING CONTACTS -->
        <div class="modal fade" id="editcontact" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content col-xl-12 col-md-12 mb-4">
                    <form action="index" name="editcontactform" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Student Contact Details</h5>
                            <?php echo @$_POST['sID']; ?>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <br />
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="sID" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contactName">Contact Name</label>
                                <input type="text" class="form-control" id="cName" name="cName">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="kID">Kin Type</label>
                                <!--input type="text" id="kID" class="form-control" name="kID" -->
                                <select id="kID" class="form-control" name="kin">
                                    <!--option selected>--Select Kin--</option-->
                                    <?php
                                    $kin_list = $this->retrieveLookup('tbl_kin', 1);
                                    foreach ($kin_list as $kins) { ?>
                                        <option value="<?php echo $kins['kinName']; ?>">
                                            <?php echo $kins['kinName']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="contactNumber1">Contact Number 1</label>
                                <input type="number" class="form-control" id="cNumber1" name="cNumber1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contactNumber2">Contact Number 2</label>
                                <input type="number" class="form-control" id="cNumber2" name="cNumber2">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="contactEmail">Email</label>
                                <input type="email" class="form-control" id="cEmail" name="cEmail">
                            </div>
                        </div>
                        <input type="hidden" name="contactID" id="contactID" >
                        <input type="hidden" name="usecase" value="ucedtcontact">
                        <input type="hidden" name="action" value="actedtcontact">
                        <div class="modal-footer">
                            <a class="collapse-item" href="#" onclick="editcontactform.submit();"><span>Save</span></a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Modal for DELETING contacts -->
        <div class="modal fade" id="deletecontact" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content col-xl-8 col-md-6 mb-4">
                    <form action="index" name="deletecontactform" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <h4>Are you sure you want to delete this data?</h4>
                        <input type="hidden" name="cID" id="cID">
                        <input type="hidden" name="usecase" value="ucdltcontact">
                        <input type="hidden" name="action" value="actdltcontact">
                        <div class="modal-footer">
                            <a class="collapse-item" href="#" onclick="deletecontactform.submit();"><span>Yes</span></a>
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
                    $('#editcontact').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#contactID').val(data[0]);
                    $('#sID').val(data[1]);
                    $('#cName').val(data[2]);
                    $('#kID').val(data[3]);
                    $('#cNumber1').val(data[4]);
                    $('#cNumber2').val(data[5]);
                    $('#cEmail').val(data[6]);
                })
            })

            //--DELETE SCRIPT--
            $(document).ready(function() {
                $('.deletebtn').on('click', function() {
                    $('#deletecontact').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#cID').val(data[0]);
                })
            })
        </script>


<?php }
}
?>