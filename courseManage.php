<div class="container mx-auto px-4 py-8 mt-24">
    <!-- Header with Add New Course Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Courses Management</h1>
        <button class="px-4 py-2 bg-teal-500 hover:bg-teal-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center space-x-2" data-toggle="modal" data-target="#newcourse">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>New Course</span>
        </button>
    </div>

    <!-- Courses Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Card Header -->
        <div class="bg-teal-400 px-6 py-4">
            <h2 class="text-xl font-bold text-white">Manage Courses</h2>
        </div>
        
        <!-- Card Body -->
        <div class="p-6">
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-teal-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Course Code</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Course</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Course Full Name</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                            $sql = "SELECT * FROM courses"; 
                            $result = mysqli_query($conn, $sql);
                            
                            while($row=mysqli_fetch_assoc($result)) {
                                $Id = $row['id'];
                                $course_code = $row['course_code'];
                                $course_sn = $row['course_sn'];
                                $course_fn = $row['course_fn'];
                                echo '<tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">' .$course_code. '</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">' .$course_sn. '</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">' .$course_fn. '</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        <div class="flex items-center space-x-3">
                                            <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-lg transition-colors duration-200" data-toggle="modal" data-target="#editcourse' .$Id. '" type="button">Edit</button>';
                                            
                                            echo '<form action="partials/_courseManage.php" method="POST" class="m-0">
                                                    <input type="hidden" name="Id" value="'.$Id. '">
                                                    <button name="removecourse" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-lg transition-colors duration-200">Delete</button>
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

<!-- New Course Modal -->
<div class="modal fade" id="newcourse" tabindex="-1" role="dialog" aria-labelledby="newcourse" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-xl overflow-hidden border-0 shadow-2xl">
      <div class="modal-header bg-teal-400 px-6 py-4">
        <h5 class="modal-title text-lg font-bold text-white" id="newcourse">Add New Course</h5>
        <button type="button" class="close text-white text-2xl font-light opacity-75 hover:opacity-100" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-6">
        <form action="partials/_courseManage.php" method="post">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Course Code -->
            <div class="space-y-2">
              <label for="coursecode" class="block text-sm font-medium text-gray-700">Course Code</label>
              <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" id="coursecode" name="coursecode" placeholder="Enter Course Code" required>
            </div>
            
            <!-- Course Name -->
            <div class="space-y-2">
              <label for="course" class="block text-sm font-medium text-gray-700">Course Name</label>
              <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" id="course" name="course" placeholder="Enter Course Name" required>
            </div>
            
            <!-- Course Full Name -->
            <div class="space-y-2 md:col-span-2">
              <label for="course_fn" class="block text-sm font-medium text-gray-700">Course Full Name</label>
              <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" id="course_fn" name="course_fn" placeholder="Enter Full Course Name" required>
            </div>
          </div>
          
          <!-- Submit Button -->
          <div class="mt-8 flex justify-end">
            <button type="submit" name="createCourse" class="px-6 py-3 bg-teal-500 hover:bg-teal-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
              Add Course
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
    $usersql = "SELECT * FROM `courses`";
    $userResult = mysqli_query($conn, $usersql);
    while($userRow = mysqli_fetch_assoc($userResult)){
        $Id = $userRow['id'];
        $course_code = $userRow['course_code'];
        $course_sn = $userRow['course_sn'];
        $course_fn = $userRow['course_fn'];
?>
<!-- Edit Course Modal -->
<div class="modal fade" id="editcourse<?php echo $Id; ?>" tabindex="-1" role="dialog" aria-labelledby="editcourse<?php echo $Id; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-xl overflow-hidden border-0 shadow-2xl">
      <div class="modal-header bg-teal-400 px-6 py-4">
        <h5 class="modal-title text-lg font-bold text-white" id="editcourse<?php echo $Id; ?>">Edit Course Details</h5>
        <button type="button" class="close text-white text-2xl font-light opacity-75 hover:opacity-100" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-6">
        <form action="partials/_courseManage.php" method="post">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Course Code -->
            <div class="space-y-2">
              <label for="coursecode" class="block text-sm font-medium text-gray-700">Course Code</label>
              <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" id="coursecode" name="coursecode" placeholder="Enter Course Code" value="<?php echo $course_code; ?>" required>
            </div>
            
            <!-- Course Name -->
            <div class="space-y-2">
              <label for="course" class="block text-sm font-medium text-gray-700">Course Name</label>
              <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" id="course" name="course" placeholder="Enter Course Name" value="<?php echo $course_sn; ?>" required>
            </div>
            
            <!-- Course Full Name -->
            <div class="space-y-2 md:col-span-2">
              <label for="course_fn" class="block text-sm font-medium text-gray-700">Course Full Name</label>
              <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition-colors" id="course_fn" name="course_fn" placeholder="Enter Full Course Name" value="<?php echo $course_fn; ?>" required>
            </div>
          </div>
          
          <!-- Hidden ID and Submit Button -->
          <input type="hidden" id="courseId" name="courseId" value="<?php echo $Id; ?>">
          <div class="mt-8 flex justify-end">
            <button type="submit" name="editCourse" class="px-6 py-3 bg-teal-500 hover:bg-teal-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300">
              Update Course
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