<?php
include("connection.php");
function find($id){
    global $conn;
            $stmt = $conn->prepare("SELECT * FROM customers WHERE username = ?");
            $stmt->bind_param("s", $id);
            $stmt->execute();
            $user = $stmt->get_result();
            return $user;
}
function find_id($id){
        $user_id='no';
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM customers WHERE username = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $user = $stmt->get_result();
        while ($row = $user->fetch_assoc()) {
                $user_id = $row['customer_id'];
        }
        return $user_id;
}

function find_address($id){
        $user_id='no';
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM customers WHERE username = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $user = $stmt->get_result();
        while ($row = $user->fetch_assoc()) {
                $user_id = $row['address'];
        }
        return $user_id;
}
?>
