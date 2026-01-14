<script src="https://cdn.tailwindcss.com"></script>

<div class="container mx-auto mt-20 md:mt-24 px-3 sm:px-4 md:px-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6 md:mb-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800">User Management</h1>
        <button id="newUserBtn" class="flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-lg shadow transition duration-200 w-full sm:w-auto">
            <i class="fa fa-plus mr-2 text-sm sm:text-base"></i> 
            <span class="text-sm sm:text-base">New User</span>
        </button>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-lg md:rounded-xl shadow-md md:shadow-lg overflow-hidden border border-gray-200">
        <div class="px-4 sm:px-6 py-3 md:py-4 bg-teal-400 border-b border-teal-500">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800">Registered Users</h2>
        </div>
        
        <!-- Mobile Cards View -->
        <div class="p-4 sm:p-6 md:hidden">
            <?php
                $sql = "SELECT * FROM userregistration"; 
                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result)) {
                    $Id = $row['id'];
                    $regNo = $row['registration_no'];
                    $firstname = $row['first_name'];
                    $lastname = $row['last_name'];
                    $gender = $row['gender'];
                    $phone = $row['contact_no'];
                    $email = $row['emailid'];
            ?>
            <div class="bg-white rounded-lg border border-gray-200 p-4 mb-4 shadow-sm">
                <div class="flex items-start space-x-4">
                    <!-- Photo -->
                    <div class="flex-shrink-0">
                        <div class="h-16 w-16 rounded-full overflow-hidden border-2 border-gray-200">
                            <img src="/hostel-management-system/img/person-<?php echo $Id; ?>.jpg" 
                                 alt="User photo" 
                                 onError="this.src='/hostel-management-system/img/profilePic.jpg'" 
                                 class="h-full w-full object-cover">
                        </div>
                    </div>
                    
                    <!-- Details -->
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <?php echo $regNo; ?>
                                </span>
                                <span class="ml-2 inline-flex items-center px-2 py-1 rounded-full text-xs font-medium <?php echo ($gender == 'Male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800'); ?>">
                                    <?php echo $gender; ?>
                                </span>
                            </div>
                        </div>
                        
                        <h3 class="text-sm font-medium text-gray-900 truncate">
                            <?php echo $firstname . ' ' . $lastname; ?>
                        </h3>
                        
                        <div class="mt-2 space-y-1">
                            <div class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-phone-alt mr-2 text-xs text-gray-400"></i>
                                <span>+92 <?php echo $phone; ?></span>
                            </div>
                            <div class="flex items-center text-sm text-gray-600 truncate">
                                <i class="far fa-envelope mr-2 text-xs text-gray-400"></i>
                                <span class="truncate"><?php echo $email; ?></span>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="mt-3 flex items-center space-x-2">
                            <button class="edit-user-btn bg-blue-100 hover:bg-blue-200 text-blue-700 py-1.5 px-3 rounded-lg text-xs font-medium transition duration-200 flex items-center"
                                    data-modal="editUser<?php echo $Id; ?>">
                                <i class="fas fa-edit mr-1 text-xs"></i> Edit
                            </button>
                            <form action="partials/_userManage.php" method="POST" class="inline">
                                <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                                <button name="removeUser" class="bg-red-100 hover:bg-red-200 text-red-700 py-1.5 px-3 rounded-lg text-xs font-medium transition duration-200 flex items-center">
                                    <i class="fas fa-trash-alt mr-1 text-xs"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        
        <!-- Desktop Table View -->
        <div class="p-4 md:p-6 hidden md:block">
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-teal-50">
                        <tr>
                            <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Reg No.</th>
                            <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Photo</th>
                            <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                            <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Gender</th>
                            <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Mobile</th>
                            <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                            <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                            mysqli_data_seek($result, 0); // Reset pointer to reuse result
                            while($row = mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $regNo = $row['registration_no'];
                                $firstname = $row['first_name'];
                                $lastname = $row['last_name'];
                                $gender = $row['gender'];
                                $phone = $row['contact_no'];
                                $email = $row['emailid'];
                        ?>
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <?php echo $regNo; ?>
                                </span>
                            </td>
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <div class="h-12 w-12 md:h-16 md:w-16 rounded-full overflow-hidden border-2 border-gray-200">
                                        <img src="/hostel-management-system/img/person-<?php echo $Id; ?>.jpg" 
                                             alt="User photo" 
                                             onError="this.src='/hostel-management-system/img/profilePic.jpg'" 
                                             class="h-full w-full object-cover">
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900"><?php echo $firstname . ' ' . $lastname; ?></div>
                            </td>
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium <?php echo ($gender == 'Male' ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800'); ?>">
                                    <?php echo $gender; ?>
                                </span>
                            </td>
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-sm text-gray-600">
                                <div class="flex items-center">
                                    <span class="mr-1 text-xs">+92</span>
                                    <?php echo $phone; ?>
                                </div>
                            </td>
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-sm text-gray-600 truncate max-w-[150px]">
                                <div class="flex items-center">
                                    <i class="far fa-envelope mr-2 text-gray-400 text-xs"></i>
                                    <span class="truncate"><?php echo $email; ?></span>
                                </div>
                            </td>
                            <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    <button class="edit-user-btn bg-blue-100 hover:bg-blue-200 text-blue-700 py-1.5 px-3 rounded-lg text-xs font-medium transition duration-200 flex items-center"
                                            data-modal="editUser<?php echo $Id; ?>">
                                        <i class="fas fa-edit mr-1 text-xs"></i> Edit
                                    </button>
                                    <form action="partials/_userManage.php" method="POST" class="inline">
                                        <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                                        <button name="removeUser" class="bg-red-100 hover:bg-red-200 text-red-700 py-1.5 px-3 rounded-lg text-xs font-medium transition duration-200 flex items-center">
                                            <i class="fas fa-trash-alt mr-1 text-xs"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$fetch_query = mysqli_query($conn, "select max(id) as id from userregistration");
    $row = mysqli_fetch_assoc($fetch_query);
    if($row['id']==0)
    {
    $user_id = 1;
    }
    else
    {
    $user_id = $row['id'] + 1;
    }
?>

<!-- newUser Modal -->
<div id="newUserModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-3 sm:px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Backdrop -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal Panel -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full mx-2 sm:mx-0">
            <!-- Header -->
            <div class="bg-teal-500 px-4 sm:px-6 py-3 sm:py-4 rounded-t-lg">
                <div class="flex justify-between items-center">
                    <h3 class="text-base sm:text-lg font-semibold text-white">Create New User</h3>
                    <button type="button" class="modal-close text-white hover:text-gray-200 transition duration-200">
                        <i class="fas fa-times text-lg sm:text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Body -->
            <div class="px-4 sm:px-6 py-4 sm:py-6 bg-gray-50">
                <form action="partials/_userManage.php" method="post" class="space-y-4 sm:space-y-5">
                    <!-- Registration Number -->
                    <div>
                        <label for="registration" class="block text-sm font-medium text-gray-700 mb-1">Registration No:</label>
                        <input class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200 bg-gray-50 text-gray-700"
                               id="registration" name="registration" type="text" 
                               value="REG-00<?php echo $user_id; ?>" readonly>
                        <p class="mt-1 text-xs text-gray-500">Auto-generated registration number</p>
                    </div>
                    
                    <!-- Name Fields -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First Name:</label>
                            <input type="text" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                   id="firstName" name="firstName" placeholder="Enter first name" required>
                        </div>
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Last Name:</label>
                            <input type="text" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                   id="lastName" name="lastName" placeholder="Enter last name" required>
                        </div>
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="far fa-envelope text-gray-400 text-sm"></i>
                            </div>
                            <input type="email" class="w-full pl-10 pr-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                   id="email" name="email" placeholder="user@example.com" required>
                        </div>
                    </div>
                    
                    <!-- Phone & Gender -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone No:</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm border border-r-0 border-gray-300 bg-gray-100 text-gray-700 rounded-l-lg">+92</span>
                                <input type="tel" class="flex-1 px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                       id="phone" name="phone" placeholder="9876543210" required pattern="[0-9]{10}" maxlength="10">
                            </div>
                        </div>
                        <div>
                            <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Gender:</label>
                            <select name="gender" id="gender" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="pt-4 border-t border-gray-200">
                        <button type="submit" name="createUser" 
                                class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-2.5 sm:py-3 px-4 rounded-lg shadow transition duration-200 flex items-center justify-center text-sm sm:text-base">
                            <i class="fas fa-user-plus mr-2 text-sm"></i> Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
    $usersql = "SELECT * FROM `userregistration`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $regNo = $userRow['registration_no'];
        $firstname = $userRow['first_name'];
        $lastname = $userRow['last_name'];
        $email = $userRow['emailid'];
        $phone = $userRow['contact_no'];
        $gender = $userRow['gender'];
?>

<!-- editUser Modal -->
<div id="editUser<?php echo $Id; ?>" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-3 sm:px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Backdrop -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal Panel -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full mx-2 sm:mx-0">
            <!-- Header -->
            <div class="bg-teal-500 px-4 sm:px-6 py-3 sm:py-4 rounded-t-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-base sm:text-lg font-semibold text-white">Edit User</h3>
                        <p class="text-teal-100 text-xs sm:text-sm mt-1">Registration No: <span class="font-medium"><?php echo $regNo; ?></span></p>
                    </div>
                    <button type="button" class="modal-close text-white hover:text-gray-200 transition duration-200">
                        <i class="fas fa-times text-lg sm:text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Body -->
            <div class="px-4 sm:px-6 py-4 sm:py-6 bg-gray-50 max-h-[80vh] overflow-y-auto">
                <!-- Profile Picture Section -->
                <div class="flex flex-col md:flex-row items-start md:items-center border border-gray-200 rounded-lg p-4 mb-4 sm:mb-6 bg-white">
                    <div class="md:w-2/3 mb-4 md:mb-0 md:pr-4">
                        <form action="partials/_userManage.php" method="post" enctype="multipart/form-data">
                            <label for="userimage<?php echo $Id; ?>" class="block text-sm font-medium text-gray-700 mb-2">Update Profile Picture</label>
                            <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4">
                                <div class="flex-1">
                                    <input type="file" name="userimage" id="userimage<?php echo $Id; ?>" accept=".jpg" 
                                           class="w-full text-xs sm:text-sm text-gray-500 file:mr-2 sm:file:mr-4 file:py-1.5 sm:file:py-2 file:px-3 sm:file:px-4 file:rounded-lg file:border-0 file:text-xs sm:file:text-sm file:font-medium file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100">
                                </div>
                                <button type="submit" class="bg-teal-100 hover:bg-teal-200 text-teal-700 font-medium py-1.5 sm:py-2 px-3 sm:px-4 rounded-lg text-xs sm:text-sm transition duration-200" 
                                        name="updateProfilePhoto">
                                    <i class="fas fa-upload mr-1 text-xs"></i> Upload
                                </button>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">Only .jpg files are accepted</p>
                            <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                        </form>
                    </div>
                    <div class="md:w-1/3 text-center mt-2 sm:mt-0">
                        <div class="relative inline-block">
                            <div class="h-20 w-20 sm:h-24 sm:w-24 rounded-full overflow-hidden border-4 border-white shadow-lg">
                                <img src="/hostel-management-system/img/person-<?php echo $Id; ?>.jpg" 
                                     alt="Profile Photo" 
                                     onError="this.src ='/hostel-management-system/img/profilePic.jpg'"
                                     class="h-full w-full object-cover">
                            </div>
                            <form action="partials/_userManage.php" method="post" class="mt-2">
                                <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                                <button type="submit" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-1 px-2 sm:px-3 rounded-lg text-xs sm:text-sm transition duration-200" 
                                        name="removeProfilePhoto">
                                    <i class="fas fa-trash-alt mr-1 text-xs"></i> Remove
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Edit Form -->
                <form action="partials/_userManage.php" method="post" class="space-y-4 sm:space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                        <div>
                            <label for="firstName<?php echo $Id; ?>" class="block text-sm font-medium text-gray-700 mb-1">First Name:</label>
                            <input type="text" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                   id="firstName<?php echo $Id; ?>" name="firstName" value="<?php echo $firstname; ?>" required>
                        </div>
                        <div>
                            <label for="lastName<?php echo $Id; ?>" class="block text-sm font-medium text-gray-700 mb-1">Last Name:</label>
                            <input type="text" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                   id="lastName<?php echo $Id; ?>" name="lastName" value="<?php echo $lastname; ?>" required>
                        </div>
                    </div>
                    
                    <div>
                        <label for="email<?php echo $Id; ?>" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="far fa-envelope text-gray-400 text-sm"></i>
                            </div>
                            <input type="email" class="w-full pl-10 pr-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                   id="email<?php echo $Id; ?>" name="email" value="<?php echo $email; ?>" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                        <div>
                            <label for="phone<?php echo $Id; ?>" class="block text-sm font-medium text-gray-700 mb-1">Phone No:</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm border border-r-0 border-gray-300 bg-gray-100 text-gray-700 rounded-l-lg">+92</span>
                                <input type="tel" class="flex-1 px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200"
                                       id="phone<?php echo $Id; ?>" name="phone" value="<?php echo $phone; ?>" required pattern="[0-9]{10}" maxlength="10">
                            </div>
                        </div>
                        <div>
                            <label for="gender<?php echo $Id; ?>" class="block text-sm font-medium text-gray-700 mb-1">Gender:</label>
                            <select name="gender" id="gender<?php echo $Id; ?>" class="w-full px-3 sm:px-4 py-2.5 sm:py-3 text-sm sm:text-base border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-200" required>
                                <?php 
                                    if($gender == 'Male') {
                                ?>
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                <?php
                                    } else {
                                ?>
                                    <option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                                <?php
                                    } 
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <input type="hidden" id="userId" name="userId" value="<?php echo $Id; ?>">
                    
                    <div class="pt-4 border-t border-gray-200">
                        <button type="submit" name="editUser" 
                                class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-2.5 sm:py-3 px-4 rounded-lg shadow transition duration-200 flex items-center justify-center text-sm sm:text-base">
                            <i class="fas fa-save mr-2 text-sm"></i> Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
}
?>

<!-- Modal JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Modal functionality
    const newUserBtn = document.getElementById('newUserBtn');
    const editUserBtns = document.querySelectorAll('.edit-user-btn');
    const closeBtns = document.querySelectorAll('.modal-close');
    
    // Open new user modal
    if (newUserBtn) {
        newUserBtn.addEventListener('click', () => {
            openModal('newUserModal');
        });
    }
    
    // Open edit user modals
    editUserBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const modalId = btn.getAttribute('data-modal');
            openModal(modalId);
        });
    });
    
    // Close modals
    closeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            closeModal(btn.closest('.fixed.inset-0'));
        });
    });
    
    // Close modal when clicking on backdrop
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('fixed') && e.target.classList.contains('inset-0')) {
            closeModal(e.target);
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const openModals = document.querySelectorAll('.fixed.inset-0:not(.hidden)');
            openModals.forEach(modal => closeModal(modal));
        }
    });
    
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closeModal(modal) {
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }
});
</script>