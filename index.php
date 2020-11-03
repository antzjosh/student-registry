<?php
//Database connection parameter definitions
    include('system/config.php');
//Views
    include('application/DV.php');
    include('application/AddressView.php');
    include('application/DashboardView.php');
    include('application/ClassesView.php');
    include('application/ContactView.php');
    include('application/HousesView.php');
    include('application/IslandsView.php');
    include('application/KinView.php');
    include('application/LoginView.php');
    include('application/OriginView.php');
    include('application/PrevSchoolView.php');
    include('application/ProvincesView.php');
    include('application/ReligionView.php');
    include('application/StreamsView.php');
    include('application/StudentView.php');
    //Login View
    
    //Data Access Objects
    include('dao/DAO.php');
    include('dao/ControlDAO.php');	

    //Controls
    include('control/Gateway.php');
    include('control/LoginController.php');
    include('control/SQLController.php');

    session_cache_limiter("none");
    session_start();

    
    if (!@$_SESSION['username']){
        $SessionSet = new LoginController;
        $SessionSet->setUserSession();
        $SessionSet->displayLogin();
    } else {

        $displayController = new Gateway();
        $displayController->uriRoutes();
    }

?>