<?php
class DashboardController {
    public function __construct() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?controller=auth&action=login");
            exit;
        }
    }
    
    public function home() {
        include "../app/views/dashboard/home.php";
    }
}
?>
