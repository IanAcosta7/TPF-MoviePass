<?php
    namespace DAO;

    use business\models\Room;

    interface IRoomDAO
    {
        function Add($room);
        function GetAll();
        function Delete($id);
    }
?>