
<div class="py-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center transition-transform hover:scale-[1.02]">
            <div class="flex-shrink-0 w-14 h-14 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-2xl">
                <i class="fa fa-user"></i>
            </div>
            <?php 
                $fetch_query = mysqli_query($conn, "select count(*) from userregistration");
                $emp = mysqli_fetch_row($fetch_query);
            ?>
            <div class="ml-5 text-right flex-1">
                <h3 class="text-3xl font-bold text-gray-800"><?php echo $emp[0]; ?></h3>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Registered Students</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center transition-transform hover:scale-[1.02]">
            <div class="flex-shrink-0 w-14 h-14 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-2xl">
                <i class="fa fa-building"></i>
            </div>
            <?php 
                $fetch_query = mysqli_query($conn, "select count(*) from roomsdetails");
                $room = mysqli_fetch_row($fetch_query);
            ?>
            <div class="ml-5 text-right flex-1">
                <h3 class="text-3xl font-bold text-gray-800"><?php echo $room[0]; ?></h3>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Rooms</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center transition-transform hover:scale-[1.02]">
            <div class="flex-shrink-0 w-14 h-14 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center text-2xl">
                <i class="fa fa-calendar-check"></i>
            </div>
            <?php 
                $fetch_query = mysqli_query($conn, "select count(*) from hostelbookings");
                $bookroom = mysqli_fetch_row($fetch_query);
            ?>
            <div class="ml-5 text-right flex-1">
                <h3 class="text-3xl font-bold text-gray-800"><?php echo $bookroom[0]; ?></h3>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Bookings</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
            <h5 class="text-lg font-bold text-gray-800">Recent Hostel Bookings</h5>
            <span class="px-3 py-1 bg-teal-100 text-teal-700 text-xs font-bold rounded-full uppercase">Live Data</span>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-widest border-b">Registration No.</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-widest border-b">Assigned Room</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-widest border-b">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php 
                    $fetch_query = mysqli_query($conn, "select * from hostelbookings order by id desc limit 5");
                    if(mysqli_num_rows($fetch_query) > 0) {
                        while($row = mysqli_fetch_array($fetch_query)) {
                        ?>
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-700"><?php echo $row['regno']; ?></td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-gray-100 text-gray-800">
                                    Room #<?php echo $row['roomno']; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="flex items-center text-sm text-green-600">
                                    <span class="w-2 h-2 mr-2 bg-green-500 rounded-full animate-pulse"></span>
                                    Active
                                </span>
                            </td>
                        </tr>
                        <?php 
                        }
                    } else {
                        echo "<tr><td colspan='3' class='px-6 py-10 text-center text-gray-400 italic'>No recent bookings found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 bg-gray-50/30 border-t border-gray-100 text-center">
            <a href="index.php?page=hostelstuManage" class="text-sm font-bold text-teal-600 hover:text-teal-700 flex items-center justify-center gap-2 transition-colors">
                View All Students
                <i class="bx bx-right-arrow-alt text-lg"></i>
            </a>
        </div>
    </div>
</div>