<div class="container mx-auto px-4 py-8 mt-24">
    <div class="w-full">
        <div class="flex flex-wrap -mx-2">
            <!-- FORM Panel -->
            <div class="w-full px-2">
                <form action="partials/_hostelManage.php" method="post" enctype="multipart/form-data" class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="bg-teal-400 px-6 py-4">
                        <h2 class="text-xl font-bold text-white">Hostel Bookings</h2>
                    </div>
                    <div class="p-6">
                        <!-- Room & Date Section -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div class="space-y-2">
                                <label for="roomno" class="block text-sm font-medium text-gray-700">Room Number:</label>
                                <select name="roomNo" id="roomNo" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required onchange="selectdata(this.value)">
                                    <option value="">Select Number</option>
                                    <?php 
                                    $usersql = "SELECT * FROM `roomsdetails`";
                                    $userResult = mysqli_query($conn, $usersql);
                                    while($userRow = mysqli_fetch_assoc($userResult)){
                                    $roomNo = $userRow['room_no'];
                                    ?>
                                    <option value="<?php echo $roomNo; ?>"><?php echo $roomNo; ?></option>
                                    <?php } ?>
                                </select>
                                <span id="availability-status" class="text-sm font-medium"></span>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Start Date:</label>
                                <input type="date" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" name="startdate" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Seater:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50" name="seater" id="seater" placeholder="Enter Seater No." required readonly>
                            </div>
                        </div>

                        <!-- Duration & Fees Section -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div class="space-y-2">
                                <label for="duration" class="block text-sm font-medium text-gray-700">Total Duration (months):</label>
                                <select name="duration" id="duration" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                                    <option value="">Choose Duration</option>
                                    <?php for($i=1; $i<=12; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label for="food" class="block text-sm font-medium text-gray-700">Food Status:</label>
                                <select name="foodstatus" id="foodstatus" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                                    <option value="">Select Status</option>
                                    <option value="1">Required (Extra 4000 Rs. per month)</option>
                                    <option value="0">Not Required</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Total Fees Per Month:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50" name="fees" id="fees" placeholder="Fees per Month" required readonly>
                            </div>
                        </div>

                        <!-- Total Amount -->
                        <div class="mb-8">
                            <div class="max-w-md">
                                <label class="block text-sm font-medium text-gray-700">Total Amount:</label>
                                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-gray-50 text-lg font-semibold" name="total_ammount" id="total_ammount" required placeholder="Total amount" readonly>
                            </div>
                        </div>

                        <!-- Student's Personal Information -->
                        <div class="border-t border-b border-gray-200 py-4 mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 text-center">Student's Personal Information</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div class="space-y-2">
                                <label for="food" class="block text-sm font-medium text-gray-700">Registration Number:</label>
                                <select name="reg_no" id="reg_no" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                                    <option value="">Select Registration Number</option>
                                    <?php 
                                    $usersql = "SELECT registration_no FROM `userregistration` where registration_no not in(select regno from hostelbookings)";
                                    $userResult = mysqli_query($conn, $usersql);
                                    while($userRow = mysqli_fetch_assoc($userResult)){
                                    ?>
                                    <option value="<?php echo $userRow['registration_no']; ?>"><?php echo $userRow['registration_no']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">First Name:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50" name="first_name" id="first_name" required placeholder="Enter first name" readonly>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Last Name:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50" name="last_name" required placeholder="Enter last name" id="last_name" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Email:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50" name="emailid" required placeholder="Enter email" id="emailid" readonly>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Gender:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50" name="gender" required placeholder="Enter gender" id="gender" readonly>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Contact Number:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg bg-gray-50" name="phone" required placeholder="Enter phone number" id="phone" readonly maxlength="10">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Emergency Contact Number:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" name="emg_no" required placeholder="Enter emergency number" maxlength="10">
                            </div>
                            <div class="space-y-2">
                                <label for="food" class="block text-sm font-medium text-gray-700">Preferred Course:</label>
                                <select name="course" id="course" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                                    <option value="">Select Course</option>
                                    <?php 
                                    $coursesql = "SELECT course_fn FROM `courses`";
                                    $courseResult = mysqli_query($conn, $coursesql);
                                    while($courseRow = mysqli_fetch_assoc($courseResult)){
                                    ?>
                                    <option value="<?php echo $courseRow['course_fn']; ?>"><?php echo $courseRow['course_fn']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div></div> <!-- Empty div for grid alignment -->
                        </div>

                        <!-- Guardian's Information -->
                        <div class="border-t border-b border-gray-200 py-4 mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 text-center">Guardian's Information</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Guardian Name:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" name="guardian_name" required placeholder="Enter guardian name">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Relation:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" name="relation" required placeholder="Enter relation">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Contact Number:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" name="contact_number" required placeholder="Enter contact number" maxlength="10">
                            </div>
                        </div>

                        <!-- Address Information -->
                        <div class="border-t border-b border-gray-200 py-4 mb-6">
                            <h3 class="text-lg font-semibold text-gray-800 text-center">Address Information</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div class="space-y-2">
                                <label for="food" class="block text-sm font-medium text-gray-700">State:</label>
                                <select name="state" id="state" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" required>
                                    <option value="">Select State</option>
                                    <?php 
                                    $statesql = "SELECT State FROM `state_master`";
                                    $stateResult = mysqli_query($conn, $statesql);
                                    while($stateRow = mysqli_fetch_assoc($stateResult)){
                                    ?>
                                    <option value="<?php echo $stateRow['State']; ?>"><?php echo $stateRow['State']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">City:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" name="city" required placeholder="Enter city name">
                            </div>
                            <div class="space-y-2 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">Address:</label>
                                <textarea class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" name="address" required placeholder="Enter Address" rows="3"></textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Postal Code:</label>
                                <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" name="postal_code" required placeholder="Enter postal code">
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                        <div class="flex justify-center">
                            <button type="submit" name="createHostal" id="createHostal" class="px-8 py-3 bg-teal-500 hover:bg-teal-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                                Submit Booking
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- FORM Panel -->
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
function selectdata(no)
{
 $.ajax({
    url: 'fetch-data.php',
    method: 'post',
    data: 'room='+no,
    success: function(result)
    {
        $('#seater').val(result);
        
    }
 });
 $.ajax({
    url: 'fetch-data.php',
    method: 'post',
    data: 'roomid='+no,
    success: function(result)
    {
        $('#fees').val(result);
        
    }
 });

 $.ajax({
    url: 'fetch-data.php',
    method: 'post',
    data: {roomsno:no},
    dataType: "JSON",
    success: function(result)
    {
        if(result['success']==0)
        {
        $("#availability-status").html(result['msg']);
        $('#createHostal').hide();
        }
        else
        {
            $("#availability-status").html(result['msg']);
            $('#createHostal').show();
        }
                
    }
 });

}
$(document).ready(function() {
        $('#duration').change(function(){
         var foodstatus = $("#foodstatus").val();
         if(foodstatus==1){
         var duration = $("#duration").val();
         var fees = $("#fees").val();
         var total_amt = duration*fees+4000;
         
            $('#total_ammount').val(total_amt);
        }
        else
        {
            var duration = $("#duration").val();
         var fees = $("#fees").val();
         var total_amt = duration*fees;
         
            $('#total_ammount').val(total_amt);
        }
        });
    });

$(document).ready(function() {
        $('#roomNo').change(function(){
        $('#duration').val('');
        $('#total_ammount').val(''); 
        $('#foodstatus').val('');        
        });
    });
$(document).ready(function() {
        $('#foodstatus').change(function(){
         var foodstatus = $(this).val(); 
         if(foodstatus==1)
         {
         var duration = $("#duration").val();
         var fees = $("#fees").val();
         var total_amt = duration*fees+4000;
         
            $('#total_ammount').val(total_amt);
         }       
         else if(foodstatus==0)
         {
            var duration = $("#duration").val();
            var fees = $("#fees").val();
            var total_amt = duration*fees;
            $('#total_ammount').val(total_amt);
         }
         else
         {
            $('#total_ammount').val('');
         }
        });
    });
$(document).ready(function() {
        $('#reg_no').change(function(){
        var reg_no = $(this).val();
        $.ajax({
        url: 'fetch-data.php',
        method: 'post',
        data: 'regNo='+reg_no,
        success: function(result)
        {
          var jsondata = $.parseJSON(result);
          $('#first_name').val(jsondata.first_name);
          $('#last_name').val(jsondata.last_name);
          $('#emailid').val(jsondata.emailid);
          $('#gender').val(jsondata.gender);
          $('#phone').val(jsondata.contact_no);          
        }
     });
});
});
</script>