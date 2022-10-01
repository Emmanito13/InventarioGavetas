<?php

class Conexion {

    static function ConectarDBG()
    {
        try {

            require "GlobalG.php";

            $cnxG = new PDO(DSN,USERNAME,PASSWORD);

            return $cnxG;

        } catch (PDOException $ex){

            die($ex->getMessage());

        }


    }


}

?>