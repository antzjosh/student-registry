<?php

    class Gateway{
        function uriRoutes(){
        //var_dump(@$_POST['action']);
                switch (@$_POST['action']) {
                        case 'actstudents': {
                                $ctl = new StudentView;
                                return $ctl->display();
                        }
                        case 'actreligion': {
                                $ctl = new ReligionView;
                                return $ctl->display();
                        }
                        case 'actprevschool': {
                                $ctl = new PrevSchoolView;
                                return $ctl->display();
                        }
                        case 'acthouses': {
                                $ctl = new HousesView;
                                return $ctl->display();
                        }
                        case 'actstreams': {
                                $ctl = new StreamsView;
                                return $ctl->display();
                        }
                        case 'actclasses': {
                                $ctl = new ClassesView;
                                return $ctl->display();
                        }
                        case 'actprovinces': {
                                $ctl = new ProvincesView;
                                return $ctl->display();
                        }
                        case 'actislands': {
                                $ctl = new IslandsView;
                                return $ctl->display();
                        }
                        case 'actkin': {
                                $ctl = new KinView;
                                return $ctl->display();
                        }
                        case 'actorigins': {
                                $ctl = new OriginView;
                                return $ctl->display();
                        }
                        case 'actcontacts': {
                                $ctl = new ContactView;
                                return $ctl->display();
                        }
                        case 'actaddresses': {
                                $ctl = new AddressView;
                                return $ctl->display();
                        }
                        case 'actnewstudent': {
                                $ctl =  new SQLController;
                                $ctl->insertStudent();
                                $ctl->insertOrigin();

                                $ctl = new StudentView;
                                return $ctl->display();
                        }
                        case 'actnewclass': {

                                $ctl =  new SQLController;
                                $ctl->getTable();

                                $ctl = new ClassesView;
                                return $ctl->display();
                        }
                        case 'actnewhouse': {

                                $ctl =  new SQLController;
                                $ctl->getTable();

                                $ctl = new HousesView;
                                return $ctl->display();
                        }
                        case 'actnewisland': {

                                $ctl =  new SQLController;
                                $ctl->getTable();

                                $ctl = new IslandsView;
                                return $ctl->display();
                        }
                        case 'actnewkin': {

                                $ctl =  new SQLController;
                                $ctl->getTable();

                                $ctl = new KinView;
                                return $ctl->display();
                        }
                        case 'actnewprevschool': {

                                $ctl =  new SQLController;
                                $ctl->getTable();

                                $ctl = new PrevSchoolView;
                                return $ctl->display();
                        }
                        case 'actnewprovince': {

                                $ctl =  new SQLController;
                                $ctl->getTable();

                                $ctl = new ProvincesView;
                                return $ctl->display();
                        }
                        case 'actnewreligion': {

                                $ctl =  new SQLController;
                                $ctl->getTable();

                                $ctl = new ReligionView;
                                return $ctl->display();
                        }
                        case 'actnewstream': {

                                $ctl =  new SQLController;
                                $ctl->getTable();

                                $ctl = new StreamsView;
                                return $ctl->display();
                        }
                        case 'actneworigin': {

                                $ctl =  new SQLController;
                                $ctl->insertOrigin();

                                $ctl = new OriginView;
                                return $ctl->display();
                        }
                        case 'actnewcontact': {

                                $ctl =  new SQLController;
                                $ctl->insertContact();

                                $ctl = new ContactView;
                                return $ctl->display();
                        }
                        case 'actnewaddress': {

                                $ctl =  new SQLController;
                                $ctl->insertAddress();

                                $ctl = new AddressView;
                                return $ctl->display();
                        }
                        case 'actedtaddress': {

                                $ctl =  new SQLController;
                                $ctl->updateAddress();

                                $ctl = new AddressView;
                                return $ctl->display();
                        }
                        case 'actdltaddress': {

                                $ctl =  new SQLController;
                                $ctl->deleteAddress();

                                $ctl = new AddressView;
                                return $ctl->display();
                        }
                        case 'actedtorigin': {

                                $ctl =  new SQLController;
                                $ctl->updateOrigin();

                                $ctl = new OriginView;
                                return $ctl->display();
                        }
                        case 'actdltorigin': {

                                $ctl =  new SQLController;
                                $ctl->deleteOrigin();

                                $ctl = new OriginView;
                                return $ctl->display();
                        }
                        case 'actedtcontact': {

                                $ctl =  new SQLController;
                                $ctl->updateContact();

                                $ctl = new ContactView;
                                return $ctl->display();
                        }
                        case 'actdltcontact': {

                                $ctl =  new SQLController;
                                $ctl->deleteContact();

                                $ctl = new ContactView;
                                return $ctl->display();
                        }
                        case 'actedtprevschool': {

                                $ctl =  new SQLController;
                                $ctl->updateLookupData('tbl_prevschool','prevSchoolID','prevSchoolName',@$_POST['prevSchoolID'],@$_POST['prevSchoolName']);

                                $ctl = new PrevSchoolView;
                                return $ctl->display();
                        }
                        case 'actdltprevschool': {

                                $ctl =  new SQLController;
                                $ctl->deleteLookupData('tbl_prevschool', 'prevSchoolID',@$_POST['psID']);

                                $ctl = new PrevSchoolView;
                                return $ctl->display();
                        }
                        case 'actedtreligion': {

                                $ctl =  new SQLController;
                                $ctl->updateLookupData('tbl_religion','religionID','religionName',@$_POST['religionID'],@$_POST['religionName']);

                                $ctl = new ReligionView;
                                return $ctl->display();
                        }
                        case 'actdltrelition': {

                                $ctl =  new SQLController;
                                $ctl->deleteLookupData('tbl_prevschool', 'religionID',@$_POST['relID']);

                                $ctl = new ReligionView;
                                return $ctl->display();
                        }
                        case 'actlogout':{
                                $ctl = new LoginController;
                                $ctl->sessionDestroy();

                                $ctl = new LoginView;
                                return $ctl->displayBody();
                        }
                        default: {
                                $ctl = new DashboardView;
                                return $ctl->display();
                        }//end defaul case
                }// end switch
        }// end function
    } //end class

?>