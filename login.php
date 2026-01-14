<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    
    <title>Login - Hostel Management System</title>
    <link rel="icon" href="/hostel-management-system/img/hostel-image.png" type="image/x-icon">
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="flex flex-col md:flex-row">
            
            <!-- Left Side - Branding -->
            <div class="md:w-1/2 bg-teal-600 p-8 md:p-12 flex flex-col items-center justify-center">
                <div class="w-32 h-32 mb-6 bg-white rounded-full flex items-center justify-center">
                    <img src="/hostel-management-system/img/hostel-bg.png" alt="Hostel Logo" class="w-20 h-20">
                </div>
                
                <h1 class="text-2xl md:text-3xl font-bold text-white text-center mb-4">
                    Hostel Management System
                </h1>
                <p class="text-teal-100 text-center">
                    Admin Portal
                </p>
            </div>
            
            <!-- Right Side - Login Form -->
            <div class="md:w-1/2 p-8 md:p-12">
                <div class="max-w-md mx-auto">
                    <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center md:text-left">
                        Admin Login
                    </h2>
                    
                    <form action="partials/_handleLogin.php" method="post" class="space-y-6">
                        <!-- Username Field -->
                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700 mb-2">
                                Username
                            </label>
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="username" 
                                    name="username" 
                                    class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none"
                                    placeholder="Enter username"
                                    required
                                >
                                <i class='fas fa-user absolute left-3 top-3.5 text-gray-400'></i>
                            </div>
                        </div>
                        
                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <input 
                                    type="password" 
                                    id="password" 
                                    name="password" 
                                    class="w-full px-4 py-3 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 outline-none pr-10"
                                    placeholder="Enter password"
                                    required
                                >
                                <i class='fas fa-lock absolute left-3 top-3.5 text-gray-400'></i>
                                <button 
                                    type="button" 
                                    onclick="togglePassword()"
                                    class="absolute right-3 top-3.5 text-gray-400 hover:text-gray-600"
                                >
                                    <i id="toggleIcon" class='fas fa-eye'></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Error Message -->
                        <?php if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"): ?>
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                            <div class="flex items-center">
                                <i class='fas fa-exclamation-circle mr-2'></i>
                                <span>Invalid username or password</span>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-3 px-4 rounded-lg transition-colors duration-200"
                        >
                            Sign In
                        </button>
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>