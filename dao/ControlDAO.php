<?php

    class ControlDAO extends DAO{

        //This function expects and SQL Statement and Type.
        //The SQL Type determines if the resultset will be fetchAll or fetchColumn
        public function sqlSelect($sql_statement, $sql_type){
            $this->openDB(ADMIN_USER,ADMIN_PASSWORD);

            try {
                
               switch ($sql_type){
                   case 0:{
                        $db_command = $this->cn->prepare($sql_statement);
                        $db_command->execute();
                        $ret_value = $db_command->fetchColumn();
                   break;
                   }
                   case 1:
                   case 104:
                   case 103:
                   case 100:
                   case 101:{
                        $db_command = $this->cn->prepare($sql_statement);
                        $db_command->execute();
                        $ret_value = $db_command->fetchAll();
                   break;
                    }
                   case 102:{
                        $db_command = $this->cn->prepare($sql_statement);
                        $db_command->execute();
                        $ret_value = $db_command->fetch(PDO::FETCH_ASSOC);
                   break;
                    }
                   default:{
                       $ret_value = $this->cn->query($sql_statement)->rowCount();
                   }
               }
            return $ret_value;
            }
            
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function queryInsert($sql_statement){
            $this->openDB(ADMIN_USER,ADMIN_PASSWORD);
            try {
                $db_command = $this->cn->prepare($sql_statement);
                $db_command->execute();

            }
            
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function runQuery($sql_statement){
            $this->openDB(ADMIN_USER,ADMIN_PASSWORD);
            try {
                $db_command = $this->cn->prepare($sql_statement);
                $db_command->execute();

            }
            
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>