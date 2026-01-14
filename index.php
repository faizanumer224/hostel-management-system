<?php 
session_start();
// Check if admin is logged in
if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true){
    $adminloggedin = true;
    $userId = $_SESSION['adminuserId'];
}
else{
    $adminloggedin = false;
    $userId = 0;
    // Redirect to login if not logged in
    header("location: login.php");
    exit; // Add exit to stop script execution
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    
    <title>Admin Dashboard - Hostel Management System</title>
    <link rel="icon" href="/hostel-management-system/img/hostel-image.png" type="image/x-icon">

</head>
<body class="bg-gray-50 font-sans text-gray-900">
        

    <?php 
        require 'partials/_dbconnect.php'; 
        require 'partials/_nav.php'; 
    ?>

    <main id="main-content" class="pt-20 px-6 pb-12 min-h-screen transition-all duration-300 md:ml-64">
        
        <?php if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true"): ?>
            <div id="login-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 flex justify-between items-center" role="alert">
                <span><strong class="font-bold">Success!</strong> You are logged in.</span>
                <button type="button" onclick="document.getElementById('login-alert').remove()" class="text-green-700 hover:text-green-900">
                    <i class='bx bx-x text-2xl'></i>
                </button>
            </div>
        <?php endif; ?>
        

        <div class="container mx-auto">
            <?php 
                $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                // Sanitize input to prevent local file inclusion
                $allowed_pages = ['home', 'userManage', 'hostelManage', 'hostelstuManage', 'roomManage', 'courseManage'];
                if (in_array($page, $allowed_pages)) {
                    include $page . '.php';
                } else {
                    include 'home.php';
                }
            ?>
        </div>
    </main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
<script>
    // Sidebar Toggle
    const btn = document.getElementById('sidebar-toggle');
    const closeBtn = document.getElementById('close-sidebar');
    const nav = document.getElementById('nav-bar');
    const header = document.getElementById('main-header');
    const content = document.getElementById('main-content');

    btn.addEventListener('click', () => {
        if(window.innerWidth >= 768) {
            nav.classList.toggle('sidebar-collapsed');
            header.classList.toggle('header-collapsed');
            content.classList.toggle('content-collapsed');
        } else {
            nav.classList.toggle('left-0');
            nav.classList.toggle('left-[-100%]');
        }
    });

    closeBtn.addEventListener('click', () => {
        nav.classList.add('left-[-100%]');
    });
</script>
</body>
</html>