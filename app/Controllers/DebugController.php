<?php
class DebugController extends Controller
{
    public function index()
    {
        $mysqli = new mysqli("localhost", "root", "root", "safehands_mvc_db", 8889);
        $result = $mysqli->query("SELECT * FROM bookings");
        $data = [];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        
        $users = [];
        $res2 = $mysqli->query("SELECT id, full_name, role FROM users");
        while($row = $res2->fetch_assoc()) {
            $users[] = $row;
        }
        
        echo json_encode(['bookings' => $data, 'users' => $users]);
    }
}
