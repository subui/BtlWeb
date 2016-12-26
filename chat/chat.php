<?php
    session_start();

    if (isset($_REQUEST['message'])) {
        require '../config/connectdb.php';

        if (isset($_SESSION['admin'])) {
            $name = $_SESSION['admin'];
        } else {
            if (!isset($_SESSION['id_kh'])) {
                $name = 'GUEST';
                for ($i=0; $i < 5; $i++) {
                    $name .= rand(0, 9);
                }
                $_SESSION['id_kh'] = $name;
            } else {
                $name = $_SESSION['id_kh'];
            }
            $_SESSION['receiver'] = 'admin1';
        }

        $sql = "INSERT INTO chat (sender, receiver, message, is_received, time_sent) VALUES ('".$name."', '".$_SESSION['receiver']."', '".$_REQUEST['message']."', 0, '".date('Y-m-d H:i:s')."')";
        mysql_query($sql);
    }
    if (isset($_REQUEST['get'])) {
        if (isset($_SESSION['admin'])) {
            require '../config/connectdb.php';

            $sql = "SELECT * FROM chat WHERE is_received = 0 ORDER BY time_sent";
            $result = mysql_query($sql);
            if ($result) {
                while ($row = mysql_fetch_array($result)) {
                    if ($_SESSION['admin'] == $row['receiver']) {
                        $_SESSION['receiver'] = $row['sender'];
                        echo $row['message'].'<br>';
                        $sql = "UPDATE chat SET is_received = 1 WHERE chat_id = ".$row['chat_id'];
                        mysql_query($sql);
                    }
                }
            }
        } elseif (isset($_SESSION['id_kh'])) {
            require '../config/connectdb.php';

            $sql = "SELECT * FROM chat WHERE is_received = 0 ORDER BY time_sent";
            $result = mysql_query($sql);
            if ($result) {
                while ($row = mysql_fetch_array($result)) {
                    if ($_SESSION['id_kh'] == $row['receiver']) {
                        echo $row['message'].'<br>';
                        $sql = "UPDATE chat SET is_received = 1 WHERE chat_id = ".$row['chat_id'];
                        mysql_query($sql);
                    }
                }
            }
        }
    }
?>
