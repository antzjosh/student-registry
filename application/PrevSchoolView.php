<?php
class PrevSchoolView extends DV
{

    public function displayBody()
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Previous Schools</h1>
            <p class="mb-4">This is the lookup of all schools in Vanuatu which feed students into
                <?php echo $this->retrieveLookup('tbl_schoolinfo', 0); ?>.
            </p>

            <!-- Content Row -->
            <div class="row">

                <div class="col-xl-12 col-lg-7">

                    <!-- Area Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Schools
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModalCenter">
                                    Add New School
                                </button>
                                <!-- Modal for entering previous schools-->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add New School</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="index" method="post" name="prevschoolsform">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>School Name</label>
                                                        <input type="text" class="form-control" name="datainput">
                                                        <input type="hidden" name="usecase" value="ucnewprevschool">
                                                        <input type="hidden" name="action" value="actnewprevschool">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="collapse-item" href="#" onclick="prevschoolsform.submit();"><span>Add</span></a>
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
                                            <th scope="col">Index</th>
                                            <th scope="col">School Name</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $prev_school_list = $this->retrieveLookup('tbl_prevschool', 1);

                                        foreach ($prev_school_list as $schools) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $schools['prevSchoolID']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $schools['prevSchoolName']; ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success editbtn">Edit</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger deletebtn">Delete</button>
                                                </td>
                                            </tr>
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
            <!-- Modal for editing previous schools-->
            <div class="modal fade" id="editprevschool" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered modal-ml" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit School Name</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="index" method="post" name="edtprevschoolform">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Enter data below</label>
                                    <input type="text" class="form-control" name="prevSchoolName" id="prevSchoolName">
                                    <input type="hidden" name="prevSchoolID" id="prevSchoolID">
                                    <input type="hidden" name="usecase" value="ucedtprevschool">
                                    <input type="hidden" name="action" value="actedtprevschool">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a class="collapse-item" href="#" onclick="edtprevschoolform.submit();"><span>Save</span></a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Modal for DELETING previous schools -->
            <div class="modal fade" id="deleteprevschool" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-ml" role="document">
                    <div class="modal-content col-xl-12 col-md-12 mb-4">
                        <form action="index" name="deleteprevschoolform" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <h4>Are you sure you want to delete this data?</h4>
                            <input type="hidden" name="psID" id="psID">
                            <input type="hidden" name="usecase" value="ucdltprevschool">
                            <input type="hidden" name="action" value="actdltprevschool">
                            <div class="modal-footer">
                                <a class="collapse-item" href="#" onclick="deleteprevschoolform.submit();"><span>Yes</span></a>
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
                    $('#editprevschool').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#prevSchoolID').val(data[0]);
                    $('#prevSchoolName').val(data[1]);
                })
            })

            //--DELETE SCRIPT--
            $(document).ready(function() {
                $('.deletebtn').on('click', function() {
                    $('#deleteprevschool').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#psID').val(data[0]);
                })
            })
        </script>
<?php }
}
?>