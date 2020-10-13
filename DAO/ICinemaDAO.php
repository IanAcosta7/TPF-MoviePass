<?php
    namespace DAO;

    use models\Cinema;

    interface ICinemaDAO
    {
        function Add(Cinema $cinema);
        function GetAll();
        function Delete();
        function Update();
    }
?>