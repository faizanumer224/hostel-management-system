<div class="container mx-auto px-4 py-8 mt-24">
    <!-- Header with Add New Room Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Rooms Management</h1>
        <button class="px-4 py-2 bg-teal-500 hover:bg-teal-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center space-x-2" data-toggle="modal" data-target="#newroom">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>New Room</span>
        </button>
    </div>

    <!-- Rooms Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Card Header -->
        <div class="bg-teal-400 px-6 py-4">
            <h2 class="text-xl font-bold text-white">Manage Rooms</h2>
        </div>
        
        <!-- Card Body -->
        <div class="p-6">
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-teal-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Room No.</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Seater</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Fees per Month</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                            $sql = "SELECT * FROM roomsdetails"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $roomno = $row['room_no'];
                                $seater = $row['seater'];
                                $fees = $row['fees'];
                                echo '<tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' .$roomno. '</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">' .$seater. '</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">Rs. ' .$fees. '</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        <div class="flex items-center space-x-3">
                                            <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors duration-200" data-toggle="modal" data-target="#editroom' .$Id. '" type="button">Edit</button>';
                                            
                                            echo '<form action="partials/_roomManage.php" method="POST" class="m-0">
                                                    <input type="hidden" name="Id" value="'.$Id. '">
                                                    <button name="removeRoom" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">Delete</button>
                                                </form>';
                                            
                                echo '    </div>
                                    </td>
                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- New Room Modal -->
<div class="modal fade" id="newroom" tabindex="-1" role="dialog" aria-labelledby="newroom" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-xl overflow-hidden border-0 shadow-2xl">
      <div class="modal-header bg-teal-400 px-6 py-4">
        <h5 class="modal-title text-lg font-bold text-white" id="newroom">Add New Room</h5>
        <button type="button" class="close text-white text-2xl font-light opacity-75 hover:opacity-100" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-6">
        <form action="partials/_roomManage.php" method="post">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Room Number -->
            <div class="space-y-2">
              <label for="roomno" class="block text-sm font-medium text-gray-700">Room Number</label>
              <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" id="roomno" name="roomno" placeholder="Enter Room Number" required>
            </div>
            
            <!-- Seater -->
            <div class="space-y-2">
              <label for="seater" class="block text-sm font-medium text-gray-700">Seater</label>
              <select name="seater" id="seater" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                <option value="">Select Seater</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            
            <!-- Fees -->
            <div class="space-y-2">
              <label for="fees" class="block text-sm font-medium text-gray-700">Fees per Month</label>
              <div class="relative">
                <span class="absolute left-3 top-3 text-gray-500">Rs.</span>
                <input type="text" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" id="fees" name="fees" placeholder="Enter Total Fees" required>
              </div>
            </div>
          </div>
          
          <!-- Submit Button -->
          <div class="mt-8 flex justify-end">
            <button type="submit" name="createRoom" class="px-6 py-3 bg-teal-500 hover:bg-teal-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
              Add Room
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
    $usersql = "SELECT * FROM `roomsdetails`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $seater = $userRow['seater'];
        $room_no = $userRow['room_no'];
        $fees = $userRow['fees'];
?>
<!-- Edit Room Modal -->
<div class="modal fade" id="editroom<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editroom<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-xl overflow-hidden border-0 shadow-2xl">
      <div class="modal-header bg-teal-400 px-6 py-4">
        <h5 class="modal-title text-lg font-bold text-white" id="editroom<?php echo $Id; ?>">Edit Room Details</h5>
        <button type="button" class="close text-white text-2xl font-light opacity-75 hover:opacity-100" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-6">
        <form action="partials/_roomManage.php" method="post">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Room Number -->
            <div class="space-y-2">
              <label for="roomno" class="block text-sm font-medium text-gray-700">Room Number</label>
              <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" id="roomno" name="roomno" placeholder="Enter Room Number" value="<?php echo $room_no; ?>" required>
            </div>
            
            <!-- Seater -->
            <div class="space-y-2">
              <label for="seater" class="block text-sm font-medium text-gray-700">Seater</label>
              <select name="seater" id="seater" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                <?php for($i=1; $i<=5; $i++): ?>
                <option value="<?php echo $i; ?>" <?php if($seater == $i) { echo "selected"; } ?>><?php echo $i; ?></option>
                <?php endfor; ?>
              </select>
            </div>
            
            <!-- Fees -->
            <div class="space-y-2">
              <label for="fees" class="block text-sm font-medium text-gray-700">Fees per Month</label>
              <div class="relative">
                <span class="absolute left-3 top-3 text-gray-500">Rs.</span>
                <input type="text" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" id="fees" name="fees" placeholder="Enter Total Fees" value="<?php echo $fees; ?>" required>
              </div>
            </div>
          </div>
          
          <!-- Hidden ID and Submit Button -->
          <input type="hidden" id="roomId" name="roomId" value="<?php echo $Id; ?>">
          <div class="mt-8 flex justify-end">
            <button type="submit" name="editRoom" class="px-6 py-3 bg-teal-500 hover:bg-teal-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
              Update Room
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