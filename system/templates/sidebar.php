<body>
    <div id="wrapper">
        <!--Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $school_name; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin Functions Here
            </div>

            <!-- Nav Item - Pages Collapse Menu >
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Staff</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li-->

            <!-- Nav Item - Utilities Collapse Menu >
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Finance</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li-->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Students
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-fw fa-pencil"></i>
                    <span>Data Entry</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Registry:</h6>
                        <form name="studentsform" action="index" method="post">
                            <input type="hidden" name="usecase" value="ucstudents" />
                            <input type="hidden" name="action" value="actstudents" />
                            <a class="collapse-item" href="#" onclick="studentsform.submit();"><span>Students</span></a>
                        </form>
                        <form name="contactsform" action="index" method="post">
                            <input type="hidden" name="usecase" value="uccontacts" />
                            <input type="hidden" name="action" value="actcontacts" />
                            <a class="collapse-item" href="#" onclick="contactsform.submit();"><span>Contacts</span></a>
                        </form>
                        <form name="addressesform" action="index" method="post">
                            <input type="hidden" name="usecase" value="ucaddresses" />
                            <input type="hidden" name="action" value="actaddresses" />
                            <a class="collapse-item" href="#" onclick="addressesform.submit();"><span>Addresses</span></a>
                        </form>
                        <form name="originsform" action="index" method="post">
                            <input type="hidden" name="usecase" value="ucorigins" />
                            <input type="hidden" name="action" value="actorigins" />
                            <a class="collapse-item" href="#" onclick="originsform.submit();"><span>Origins</span></a>
                        </form>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Lookup:</h6>
                        <form name="prevschoolform" action="index" method="post">
                            <input type="hidden" name="usecase" value="ucprevschool" />
                            <input type="hidden" name="action" value="actprevschool" />
                            <a class="collapse-item" href="#" onclick="prevschoolform.submit();"><span>Previous School</span></a>
                        </form>
                        <form name="religionform" action="index" method="post">
                            <input type="hidden" name="usecase" value="ucreligion" />
                            <input type="hidden" name="action" value="actreligion" />
                            <a class="collapse-item" href="#" onclick="religionform.submit();"><span>Religion</span></a>
                        </form>
                        <form name="housesform" action="index" method="post">
                            <input type="hidden" name="usecase" value="uchouses" />
                            <input type="hidden" name="action" value="acthouses" />
                            <a class="collapse-item" href="#" onclick="housesform.submit();"><span>Houses</span></a>
                        </form>
                        <form name="streamsform" action="index" method="post">
                            <input type="hidden" name="usecase" value="ucstreams" />
                            <input type="hidden" name="action" value="actstreams" />
                            <a class="collapse-item" href="#" onclick="streamsform.submit();"><span>Streams</span></a>
                        </form>
                        <form name="classesform" action="index" method="post">
                            <input type="hidden" name="usecase" value="ucclasses" />
                            <input type="hidden" name="action" value="actclasses" />
                            <a class="collapse-item" href="#" onclick="classesform.submit();"><span>Classes</span></a>
                        </form>
                        <form name="provincesform" action="index" method="post">
                            <input type="hidden" name="usecase" value="ucprovinces" />
                            <input type="hidden" name="action" value="actprovinces" />
                            <a class="collapse-item" href="#" onclick="provincesform.submit();"><span>Provinces</span></a>
                        </form>
                        <form name="islandsform" action="index" method="post">
                            <input type="hidden" name="usecase" value="ucislands" />
                            <input type="hidden" name="action" value="actislands" />
                            <a class="collapse-item" href="#" onclick="islandsform.submit();"><span>Islands</span></a>
                        </form>
                        <form name="kinform" action="index" method="post">
                            <input type="hidden" name="usecase" value="uckin" />
                            <input type="hidden" name="action" value="actkin" />
                            <a class="collapse-item" href="#" onclick="kinform.submit();"><span>Kin</span></a>
                        </form>
                    </div>
                </div>
            </li>


        </ul>
        <!-- End of Sidebar -->