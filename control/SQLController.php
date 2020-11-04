<?php

    class SQLController{

        public function sqlFlag($table_name, $flag){
            $controlDAO = new ControlDAO();

            switch($flag){
                case 0: {
                    $sql = "SELECT schoolName FROM $table_name";
                break;
                }
                case 100: {
                    $sql = "SELECT
                                s.studentID,
                                s.firstName, 
                                s.middleName, 
                                s.lastName,
                                s.gender, 
                                s.dob, 
                                h.houseName, 
                                c.classDescription, 
                                st.streamName
                            FROM tbl_students s
                            INNER JOIN tbl_houses h ON h.housesID = s.houseID
                            INNER JOIN tbl_classes c ON c.classID = s.classID
                            INNER JOIN tbl_streams st ON st.streamID = s.streamID
                            ";
                    break;
                }
                case 101:{
                    $sql = "SELECT
                                s.originID,
                                s.studentID, 
                                s.villageName, 
                                i.islandName, 
                                p.provinceName 
                            FROM tbl_province p
                            INNER JOIN tbl_studentorigin s ON s.provinceID = p.provinceID
                            INNER JOIN tbl_island i ON i.islandID = s.islandID
                            ";
                    break;
                }
                case 102:{
                    $sql = "SELECT studentID FROM $table_name GROUP BY sIndex DESC LIMIT 1";
                    break;
                }
                case 103:{
                    $sql = "SELECT
                                s.contactID,
                                s.studentID, 
                                s.contactName, 
                                s.mobileNumber1, 
                                s.mobileNumber2,
                                s.email,
                                k.kinName
                            FROM tbl_kin k
                            INNER JOIN tbl_studentcontacts s ON s.kinID = k.kinID
                            ";
                    break;
                }
                default:{
                    $sql = "SELECT * FROM $table_name";
                }
            }

            return $controlDAO->sqlSelect($sql, $flag);
        }

        public function getTable(){
            
            $insert_data = @$_POST['datainput'];

            if ($insert_data){
                switch (@$_POST['usecase']){
                    case 'ucnewstudent':{
                        //WORK ON THIS COMPLEX INSERT STATEMENT NEXT
                        $sql = "INSERT INTO tbl_students (classDescription) VALUES ('$insert_data')";
                        break;
                    }
                    case 'ucnewclass':{
                        $sql = "INSERT INTO tbl_classes (classDescription) VALUES ('$insert_data')";
                    break;
                    }
                    case 'ucnewhouse': {
                        $sql = "INSERT INTO tbl_houses (houseName) VALUES ('$insert_data')";
                        break;
                    }
                    case 'ucnewisland': {
                        $sql = "INSERT INTO tbl_island (islandName) VALUES ('$insert_data')";
                        break;
                    }
                    case 'ucnewkin': {
                        $sql = "INSERT INTO tbl_kin (kinName) VALUES ('$insert_data')";
                        //var_dump($sql);
                        break;
                    }
                    case 'ucnewprevschool': {
                        $sql = "INSERT INTO tbl_prevschool (prevSchoolName) VALUES ('$insert_data')";
                        break;
                    }
                    case 'ucnewprovince': {
                        $sql = "INSERT INTO tbl_province (provinceName) VALUES ('$insert_data')";
                        break;
                    }
                    case 'ucnewreligion': {
                        $sql = "INSERT INTO tbl_religion (religionName) VALUES ('$insert_data')";
                        break;
                    }
                    case 'ucnewstream': {
                        $sql = "INSERT INTO tbl_streams (streamName) VALUES ('$insert_data')";
                        break;
                    }
                    default:
                        echo "<script>alert('There was an error. Contact your administrator.');</script>";
                }
                //var_dump($sql);
                $controlDAO = new ControlDAO();

                $controlDAO->queryInsert($sql);
                
            }else{
                echo "<script>alert('There was an error: Make sure you entered a value.');</script>";
            }                      
        }

        public function insertStudent(){
            $studentID = @$_POST['studentID'];
            $regDate = @$_POST['registrationDate'];
            $fname = @$_POST['firstName'];
            $mname = @$_POST['middleName'];
            $lname = @$_POST['lastName'];
            $gender = @$_POST['gender'];
            $dob = @$_POST['dob'];
            
            $bstatus = @$_POST['boardStatus'] == 'on'? 1: 0;

            $hID = @$_POST['houseID'];
            $rID = @$_POST['religionID'];
            $cID = @$_POST['classID'];
            $sID = @$_POST['streamID'];
            $psID = @$_POST['prevSchoolID'];
            $psYear = @$_POST['prevSchoolYear'];

            $sql = "INSERT INTO tbl_students (
                        studentID, registrationDate,
                        firstName, middleName, lastName, gender,
                        dob, boardStatus, houseID, religionID,
                         classID, streamID, prevSchoolID, prevSchoolYear
                    )
                    VALUES (
                        '$studentID', '$regDate', 
                        '$fname', '$mname', '$lname', '$gender', 
                        '$dob', $bstatus, $hID, $rID, 
                        $cID, $sID, $psID, $psYear
                    )
                ";
            $controlDAO = new ControlDAO;
            $controlDAO -> queryInsert($sql);
            //print_r($sql);
        }

        public function insertOrigin(){
            $studentID = @$_POST['studentID'];
            $iID = @$_POST['islandID'];
            $vName = @$_POST['villageName'];
            $pID = @$_POST['provinceID'];

            $sql = "INSERT INTO tbl_studentorigin (
                            studentID, villageName, islandID, provinceID
                        )
                        VALUES (
                            '$studentID', '$vName', $iID, $pID
                        )
                    ";
            $controlDAO = new ControlDAO;
            $controlDAO->queryInsert($sql);
        }
        
        public function insertContact(){
            $studentID = @$_POST['studentID'];
            $cName = @$_POST['contactName'];
            $c1 = @$_POST['contactNumber1'];
            $c2 = @$_POST['contactNumber2'];
            $kID = @$_POST['kinID'];
            $eml = @$_POST['contactEmail'];

            $sql = "INSERT INTO tbl_studentcontacts (
                            studentID, contactName, mobileNumber1, mobileNumber2, kinID, email
                        )
                        VALUES (
                            '$studentID', '$cName', $c1, $c2, $kID, '$eml'
                        )
                    ";
            $controlDAO = new ControlDAO;
            $controlDAO->queryInsert($sql);
        }

        public function insertAddress(){
            $studentID = @$_POST['studentID'];
            $guardiansResidents = @$_POST['guardiansResidents'];
            $guardiansPostalCode = @$_POST['guardiansPostalCode'];
            $parent1Residence = @$_POST['parent1Residence'];
            $parent1PostalCode = @$_POST['parent1PostalCode'];
            $parent2Residence = @$_POST['parent2Residence'];
            $parent2PostalCode = @$_POST['parent2PostalCode'];

            $sql = "INSERT INTO tbl_studentaddresses (
                            studentID, guardiansResidents, guardiansPostalCode, parent1Residence,
                            parent1PostalCode, parent2Residence, parent2PostalCode
                        )
                        VALUES (
                            '$studentID', '$guardiansResidents', '$guardiansPostalCode',
                            '$parent1Residence', '$parent1PostalCode', '$parent2Residence', '$parent2PostalCode'
                        )            
            ";

            $controlDAO = new ControlDAO;
            $controlDAO->queryInsert($sql);
        }

        public function updateAddress(){
            if ($_POST['usecase']=='ucedtaddress'){

                //$studentID=@$_POST['studentID'];
                $addressID=@$_POST['addressID'];
                $guardiansResidents=@$_POST['gResidents'];
                $guardiansPostalCode=@$_POST['gPostalCode'];
                $parent1Residence=@$_POST['p1Residence'];
                $parent1PostalCode=@$_POST['p1PostalCode'];
                $parent2Residence=@$_POST['p2Residence'];
                $parent2PostalCode=@$_POST['p2PostalCode'];

                $sql = "UPDATE tbl_studentaddresses SET
                        guardiansResidents = '$guardiansResidents',
                        guardiansPostalCode = '$guardiansPostalCode',
                        parent1Residence = '$parent1Residence',
                        parent1PostalCode = '$parent1PostalCode',
                        parent2Residence = '$parent2Residence',
                        parent2PostalCode = '$parent2PostalCode'
                        WHERE
                        addressID=$addressID
                ";
                print_r($sql);

                $controlDAO = new ControlDAO;
                $controlDAO->runQuery($sql);
            }

        }

        public function deleteAddress(){
            if ($_POST['usecase']=='ucdltaddress'){
                $addressID = @$_POST['addrID'];

                $sql = "DELETE FROM tbl_studentaddresses WHERE addressID = $addressID";

                $controlDAO = new ControlDAO;
                $controlDAO->runQuery($sql);
            }
        }

        public function updateOrigin(){
            if ($_POST['usecase']=='ucedtorigin'){

                //$studentID=@$_POST['sID'];
                $provinceName=@$_POST['province'];
                $islandName=@$_POST['island'];

                //Get islandID based on $islandName above
                $sql = "SELECT islandID from tbl_island WHERE islandName='$islandName'";
                $controlDAO = new ControlDAO;
                $islandResult = $controlDAO->sqlSelect($sql,102);

                //Get provinceID based on $provinceName above
                $sql = "SELECT provinceID from tbl_province WHERE provinceName='$provinceName'";
                $controlDAO = new ControlDAO;
                $provinceResult = $controlDAO->sqlSelect($sql,102);

                $islandID = $islandResult['islandID'];
                $provinceID = $provinceResult['provinceID'];
                $originID=@$_POST['originID'];
                $villageName=@$_POST['village'];

                $sql = "UPDATE tbl_studentorigin SET
                        provinceID = $provinceID,
                        villageName = '$villageName',
                        islandID = $islandID
                        WHERE
                        originID=$originID
                ";
                
                $controlDAO = new ControlDAO;
                $controlDAO->runQuery($sql);
            }

        }

        public function deleteOrigin(){
            if ($_POST['usecase']=='ucdltorigin'){
                $originID = @$_POST['oID'];

                $sql = "DELETE FROM tbl_studentorigin WHERE originID = $originID";

                $controlDAO = new ControlDAO;
                $controlDAO->runQuery($sql);
            }
        }

    public function updateContact()
    {
        if ($_POST['usecase'] == 'ucedtcontact') {

            //$studentID = @$_POST['sID'];
            //echo 'Email: '. @$_POST['email'] . '<br>';
            $kinName = @$_POST['kin'];

            //Get kinID based on $kinName above
            $sql = "SELECT kinID from tbl_kin WHERE kinName='$kinName'";
            $controlDAO = new ControlDAO;
            $kinResult = $controlDAO->sqlSelect($sql, 102);

            $kinID = $kinResult['kinID'];
            $contactID = @$_POST['contactID'];
            $contactName = $_POST['cName'];
            $mobileNumber1 = @$_POST['cNumber1'];
            $mobileNumber2 = @$_POST['cNumber2'];
            $email = @$_POST['cEmail'];

            $sql = "UPDATE tbl_studentcontacts SET
                        kinID=$kinID,
                        contactName='$contactName',
                        mobileNumber1='$mobileNumber1',
                        mobileNumber2='$mobileNumber2',
                        email='$email'
                        WHERE
                        contactID=$contactID
                
                ";

            $controlDAO = new ControlDAO;
            $controlDAO->runQuery($sql);
        }
    }

    public function deleteContact()
    {
        if ($_POST['usecase'] == 'ucdltcontact') {
            $contactID = @$_POST['cID'];

            $sql = "DELETE FROM tbl_studentcontacts WHERE contactID = $contactID";

            $controlDAO = new ControlDAO;
            $controlDAO->runQuery($sql);
        }
    }

    public function updateLookupData($table_name, $rec_id, $field_name, $rec_id_value, $field_value)
    {
        
        $sql = "UPDATE $table_name SET $field_name = '$field_value' WHERE $rec_id = $rec_id_value";


        $controlDAO = new ControlDAO;
        $controlDAO->runQuery($sql);
        
    }

    public function deleteLookupData($table_name, $rec_id, $rec_id_value){

        $sql = "DELETE FROM $table_name WHERE $rec_id=$rec_id_value";

        $controlDAO = new ControlDAO;
        $controlDAO->runQuery($sql);

    }
}