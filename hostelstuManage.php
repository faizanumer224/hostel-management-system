<div class="container mx-auto px-3 sm:px-4 md:px-6 py-6 md:py-8 mt-20 md:mt-24">
    <div class="w-full">
        <div class="w-full">
            <div class="bg-white rounded-lg md:rounded-xl shadow-md md:shadow-lg overflow-hidden border border-gray-200">
                <!-- Card Header -->
                <div class="bg-teal-400 px-4 sm:px-6 py-3 md:py-4">
                    <h2 class="text-lg sm:text-xl font-bold text-white">Hostel Students</h2>
                </div>
                
                <!-- Card Body -->
                <div class="p-4 sm:p-6">
                    <!-- Mobile Cards View -->
                    <div class="md:hidden space-y-4">
                        <?php
                            $sql = "SELECT * FROM hostelbookings"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row = mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $reg_no = $row['regno'];
                                $student_first_name = $row['firstName'];
                                $student_last_name = $row['lastName'];
                                $room_no = $row['roomno'];
                                $seater = $row['seater'];
                                $staying = $row['stayfrom'];
                                $contact = $row['contactno'];
                        ?>
                        <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <div class="flex items-center space-x-2 mb-2">
                                        <span class="text-sm font-bold text-gray-800"><?php echo $student_first_name . ' ' . $student_last_name; ?></span>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            Reg: <?php echo $reg_no; ?>
                                        </span>
                                    </div>
                                    <div class="space-y-1 text-sm text-gray-600">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                            Room: <?php echo $room_no; ?> (<?php echo $seater; ?>-seater)
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            From: <?php echo $staying; ?>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                            <?php echo $contact; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex space-x-2">
                                <button class="flex-1 px-3 py-2 bg-teal-500 hover:bg-teal-600 text-white text-xs font-medium rounded-lg transition-colors duration-200 flex items-center justify-center" 
                                        data-toggle="modal" data-target="#viewdetails<?php echo $Id; ?>" type="button">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View
                                </button>
                                
                                <form action="partials/_hostelstuManage.php" method="POST" class="flex-1">
                                    <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                                    <button name="removestudetails" class="w-full px-3 py-2 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-lg transition-colors duration-200 flex items-center justify-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    
                    <!-- Desktop Table View -->
                    <div class="hidden md:block">
                        <div class="overflow-x-auto rounded-lg border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-teal-50">
                                    <tr>
                                        <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Reg No.</th>
                                        <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Student's Name</th>
                                        <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Room No.</th>
                                        <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Seater</th>
                                        <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Staying From</th>
                                        <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Contact No.</th>
                                        <th class="px-4 md:px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php
                                        mysqli_data_seek($result, 0); // Reset pointer to reuse result
                                        while($row = mysqli_fetch_assoc($result)) {
                                            $Id = $row['id'];
                                            $reg_no = $row['regno'];
                                            $student_first_name = $row['firstName'];
                                            $student_last_name = $row['lastName'];
                                            $room_no = $row['roomno'];
                                            $seater = $row['seater'];
                                            $staying = $row['stayfrom'];
                                            $contact = $row['contactno'];
                                    ?>
                                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                                        <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                <?php echo $reg_no; ?>
                                            </span>
                                        </td>
                                        <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-sm text-gray-700"><?php echo $student_first_name . ' ' . $student_last_name; ?></td>
                                        <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-sm text-gray-700"><?php echo $room_no; ?></td>
                                        <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-sm text-gray-700">
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                <?php echo $seater; ?>-seater
                                            </span>
                                        </td>
                                        <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-sm text-gray-700"><?php echo $staying; ?></td>
                                        <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-sm text-gray-700"><?php echo $contact; ?></td>
                                        <td class="px-4 md:px-6 py-3 md:py-4 whitespace-nowrap text-sm text-gray-700">
                                            <div class="flex items-center space-x-2">
                                                <button class="px-3 py-1.5 bg-teal-500 hover:bg-teal-600 text-white text-xs font-medium rounded-lg transition-colors duration-200 flex items-center" 
                                                        data-toggle="modal" data-target="#viewdetails<?php echo $Id; ?>" type="button">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    View
                                                </button>
                                                
                                                <form action="partials/_hostelstuManage.php" method="POST" class="m-0">
                                                    <input type="hidden" name="Id" value="<?php echo $Id; ?>">
                                                    <button name="removestudetails" class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-medium rounded-lg transition-colors duration-200 flex items-center">
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        Delete
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
        </div>
    </div>
</div>

<?php 
    $usersql = "SELECT * FROM `hostelbookings`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $roomno = $userRow["roomno"];
        $stayfrom = $userRow["stayfrom"];
        $seater = $userRow["seater"];
        $duration = $userRow["duration"];
        $foodstatus = $userRow["foodstatus"];
        $fees = $userRow["feespm"];
        $total_ammount = $userRow["total_amount"];
        $reg_no = $userRow["regno"];
        $first_name = $userRow["firstName"];
        $last_name = $userRow["lastName"];
        $emailid = $userRow["emailid"];
        $gender = $userRow["gender"];
        $phone = $userRow["contactno"];
        $emg_no = $userRow["egycontactno"];
        $course = $userRow["course"];
        $guardian_name = $userRow["guardian_name"];
        $relation = $userRow["guardian_relation"];
        $guardian_contact = $userRow["guardian_contact"];
        $state = $userRow["state"];
        $address = $userRow["address"];
        $city = $userRow["city"];
        $postal_code = $userRow["pin_code"];
        $datetime = $userRow["entry_date"];
?>
<!-- viewdetails Modal -->
<div id="viewdetails<?php echo $Id; ?>" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-3 sm:px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Backdrop -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal Panel -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl w-full mx-2 sm:mx-0 max-h-[90vh] overflow-y-auto">
            <!-- Header -->
            <div class="bg-teal-400 px-4 sm:px-6 py-3 sm:py-4 sticky top-0 z-10">
                <div class="flex justify-between items-center">
                    <h5 class="text-base sm:text-lg font-bold text-white">Student Details</h5>
                    <button type="button" class="modal-close text-white text-xl sm:text-2xl font-light opacity-75 hover:opacity-100 transition duration-200">
                        <span>&times;</span>
                    </button>
                </div>
            </div>
            <div class="p-4 sm:p-6">
                <!-- Registration Date -->
                <div class="mb-6 p-3 sm:p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <p class="text-xs sm:text-sm font-semibold text-gray-700">Date & Time of Registration</p>
                    <p class="text-sm sm:text-lg font-medium text-gray-900"><?php echo $datetime;?></p>
                </div>

                <!-- Student Information Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <!-- Row 1 -->
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Registration Number</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $reg_no;?></p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Full Name</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $first_name; ?> <?php echo $last_name; ?></p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Email Address</p>
                        <p class="text-sm sm:text-base text-gray-900 break-words"><?php echo $emailid;?></p>
                    </div>

                    <!-- Row 2 -->
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Contact Number</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $phone;?></p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Gender</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $gender;?></p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Selected Course</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $course;?></p>
                    </div>

                    <!-- Row 3 -->
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Emergency Contact No.</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $emg_no;?></p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Guardian Name</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $guardian_name;?></p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Guardian Relation</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $relation;?></p>
                    </div>

                    <!-- Guardian Contact (full width) -->
                    <div class="space-y-1 sm:space-y-2 sm:col-span-3">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Guardian Contact No.</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $guardian_contact;?></p>
                    </div>
                </div>

                <!-- Address Section -->
                <div class="mb-6 sm:mb-8 p-3 sm:p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <p class="text-xs sm:text-sm font-semibold text-gray-700 mb-2">Address</p>
                    <p class="text-sm sm:text-base text-gray-900">
                        <?php echo $address;?><br />
                        <?php echo $city;?>, <?php echo $postal_code;?>, <?php echo $state;?>
                    </p>
                </div>

                <!-- Hostel Details Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Room No</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $roomno;?></p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Starting Date</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $stayfrom;?></p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Seater</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $seater;?></p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Duration</p>
                        <p class="text-sm sm:text-base text-gray-900"><?php echo $duration;?> Months</p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Food Status</p>
                        <p class="text-sm sm:text-base text-gray-900">
                            <?php 
                                if($foodstatus==0){
                                    echo "Not Required";
                                } else {
                                    echo "Required";
                                }
                            ?>
                        </p>
                    </div>
                    <div class="space-y-1 sm:space-y-2">
                        <p class="text-xs sm:text-sm font-semibold text-gray-700">Fees Per Month</p>
                        <p class="text-sm sm:text-base text-gray-900">Rs. <?php echo $fees;?></p>
                    </div>
                </div>

                <!-- Total Fees Section -->
                <div class="p-4 sm:p-6 bg-teal-50 rounded-lg border border-teal-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-base sm:text-lg font-bold text-gray-900">Total Fees (<?php echo $duration .' months'?>)</p>
                            <p class="text-xs sm:text-sm text-gray-600">Including all charges</p>
                        </div>
                        <p class="text-xl sm:text-2xl font-bold text-teal-600 mt-2 sm:mt-0">Rs. <?php echo $total_ammount;?></p>
                    </div>
                </div>
            </div>
            
            <!-- Print Button -->
            <div class="bg-gray-50 px-4 sm:px-6 py-3 sm:py-4 border-t border-gray-200">
                <div class="flex justify-center">
                    <button onclick="window.print()" class="px-4 sm:px-6 py-2.5 sm:py-3 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center space-x-2 text-sm sm:text-base">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                        <span>Print Details</span>
                    </button>
                </div>
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
    // Modal functionality for view buttons
    const viewBtns = document.querySelectorAll('[data-target^="#viewdetails"]');
    const closeBtns = document.querySelectorAll('.modal-close');
    
    // Open view modals
    viewBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const modalId = btn.getAttribute('data-target');
            const modal = document.querySelector(modalId);
            if (modal) {
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        });
    });
    
    // Close modals
    closeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const modal = btn.closest('.fixed.inset-0');
            if (modal) {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        });
    });
    
    // Close modal when clicking on backdrop
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('fixed') && e.target.classList.contains('inset-0')) {
            e.target.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const openModals = document.querySelectorAll('.fixed.inset-0:not(.hidden)');
            openModals.forEach(modal => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });
        }
    });
    
    // Print media query for modal
    const style = document.createElement('style');
    style.textContent = `
        @media print {
            body * {
                visibility: hidden;
            }
            .fixed.inset-0:not(.hidden),
            .fixed.inset-0:not(.hidden) * {
                visibility: visible;
            }
            .fixed.inset-0:not(.hidden) {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: auto;
                background: white;
            }
            .modal-close,
            .modal-footer {
                display: none !important;
            }
        }
    `;
    document.head.appendChild(style);
});
</script>