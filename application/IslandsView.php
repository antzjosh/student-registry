<?php
class IslandsView extends DV
{
    public function displayBody()
    {
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Islands</h1>
            <p class="mb-4">This is the lookup of islands which students of
                <?php echo $this->retrieveLookup('tbl_schoolinfo', 0); ?> hail from.
            </p>
            <!-- Content Row -->
            <div class="row">

                <div class="col-xl-12 col-lg-7">

                    <!-- Area Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">List of Islands
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModalCenter">
                                    Add New Island
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Island</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="index" method="post" name="islandform">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Enter data below</label>
                                                        <input type="text" class="form-control" name="datainput">
                                                        <input type="hidden" name="usecase" value="ucnewisland">
                                                        <input type="hidden" name="action" value="actnewisland">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="collapse-item" href="#" onclick="islandform.submit();"><span>Add</span></a>
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
                                            <th scope="col">Island Name</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $island_list = $this->retrieveLookup('tbl_island', 1);

                                        foreach ($island_list as $islands) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $islands['islandID']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $islands['islandName']; ?>
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