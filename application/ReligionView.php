<?php
class ReligionView extends DV
{
    public function displayBody()
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Religion</h1>
            <p class="mb-4">This is the lookup of all religions being practised by students at
                <?php echo $this->retrieveLookup('tbl_schoolinfo', 0); ?>.
            </p>

            <!-- Content Row -->
            <div class="row">

                <div class="col-xl-12 col-lg-7">

                    <!-- Area Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Religions
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModalCenter">
                                    Add New Religion
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Religion</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="index" method="post" name="religionsform">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Enter data below</label>
                                                        <input type="text" class="form-control" name="datainput">
                                                        <input type="hidden" name="usecase" value="ucnewreligion">
                                                        <input type="hidden" name="action" value="actnewreligion">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="collapse-item" href="#" onclick="religionsform.submit();"><span>Add</span></a>
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
                                            <th scope="col">Religion Name</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $religion_list = $this->retrieveLookup('tbl_religion', 1);

                                        foreach ($religion_list as $religions) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $religions['religionID']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $religions['religionName']; ?>
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

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <!-- Modal for editing previous religions-->
        <div class="modal fade" id="editreligion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit School Name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="index" method="post" name="editreligionform">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Religion Name/label>
                                <input type="text" class="form-control" name="religionName" id="religionName">
                                <input type="hidden" name="religionID" id="religionID">
                                <input type="hidden" name="usecase" value="ucedtreligion">
                                <input type="hidden" name="action" value="actedtreligion">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="collapse-item" href="#" onclick="editreligionform.submit();"><span>Save</span></a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Modal for DELETING previous schools -->
        <div class="modal fade" id="deletereligion" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-ml" role="document">
                <div class="modal-content col-xl-12 col-md-12 mb-4">
                    <form action="index" name="deletereligionform" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Confirm Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <h4>Are you sure you want to delete this data?</h4>
                        <input type="hidden" name="relID" id="relID">
                        <input type="hidden" name="usecase" value="ucdltreligion">
                        <input type="hidden" name="action" value="actdltreligion">
                        <div class="modal-footer">
                            <a class="collapse-item" href="#" onclick="deletereligion.submit();"><span>Yes</span></a>
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
                    $('#editreligion').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#religionID').val(data[0]);
                    $('#religionName').val(data[1]);
                })
            })

            //--DELETE SCRIPT--
            $(document).ready(function() {
                $('.deletebtn').on('click', function() {
                    $('#deletereligion').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#relID').val(data[0]);
                })
            })
        </script>
<?php }
}
?>