<script src="https://cdn.tailwindcss.com"></script>
<header id="main-header" class="fixed top-0 left-0 w-full h-16 flex items-center justify-between px-4 sm:px-6 bg-white border-b border-gray-200 z-50 shadow-sm">
    <div class="flex items-center">
        <button id="sidebar-toggle" class="text-2xl text-gray-600 hover:text-teal-600 focus:outline-none transition-colors">
            <i class='bx bx-menu-alt-left' id="toggle-icon"></i>
        </button>
        <h2 class="ml-3 sm:ml-4 text-base sm:text-lg font-semibold text-gray-700 tracking-tight truncate max-w-[180px] sm:max-w-none">
            Hostel Management System
        </h2>
    </div>
    
    <div class="flex items-center gap-2 sm:gap-4">
        <div class="text-right hidden xs:block">
            <p class="text-xs font-bold text-gray-800 truncate max-w-[100px] sm:max-w-[120px]">Admin User</p>
            <p class="text-[10px] text-gray-400 uppercase truncate">Super Admin</p>
        </div>
        <div class="w-8 h-8 sm:w-9 sm:h-9 md:w-10 md:h-10 rounded-full bg-slate-100 flex items-center justify-center text-teal-600 border border-gray-200">
            <i class="fa fa-user-shield text-sm sm:text-base"></i>
        </div>
    </div>
</header>

<aside id="nav-bar" class="fixed top-0 left-[-100%] md:left-0 w-full md:w-64 h-full bg-slate-900 text-slate-300 z-40">
    <nav class="h-full flex flex-col py-4 sm:py-6">
        <div class="flex items-center justify-between px-4 sm:px-6 mb-6 sm:mb-10">
            <div class="flex items-center gap-3 whitespace-nowrap">
                <div class="min-w-[32px] h-8 sm:min-w-[36px] sm:h-9 md:min-w-[40px] md:h-10 bg-teal-500 rounded-lg flex items-center justify-center text-white">
                    <i class='bx bx-layer text-lg sm:text-xl md:text-2xl'></i>
                </div>
                <span class="text-lg sm:text-xl md:text-xl font-bold text-white tracking-tight">Hostel MS</span>
            </div>
            <button id="close-sidebar" class="md:hidden text-xl text-white hover:text-gray-300">
                <i class='bx bx-x'></i>
            </button>
        </div>

        <div class="flex-1 space-y-1 px-3 sm:px-4 overflow-y-auto [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-700 [&::-webkit-scrollbar-thumb]:rounded-full">
            <?php 
                $page = isset($_GET['page']) ? $_GET['page'] : 'home'; 
                function navItem($slug, $label, $icon, $currentPage) {
                    $isActive = ($currentPage == $slug);
                    $activeClass = $isActive ? 'bg-teal-600 text-white shadow-md' : 'hover:bg-slate-800 hover:text-white';
                    $url = ($slug == 'home') ? 'index.php' : "index.php?page=$slug";
                    echo "
                    <a href='$url' class='flex items-center gap-3 sm:gap-4 px-3 py-2.5 sm:py-3 rounded-xl transition-all duration-200 group $activeClass whitespace-nowrap' title='$label'>
                        <i class='$icon text-lg sm:text-xl min-w-[24px] sm:min-w-[28px] md:min-w-[30px] text-center'></i>
                        <span class='font-medium text-sm'>$label</span>
                    </a>";
                }
            ?>

            <?php navItem('home', 'Dashboard', 'bx bx-grid-alt', $page); ?>
            <div class="pt-3 sm:pt-4 pb-1 sm:pb-2 px-3 uppercase text-[10px] font-bold text-slate-500 tracking-widest">Management</div>
            <?php navItem('userManage', 'Students', 'bx bx-user', $page); ?>
            <?php navItem('hostelManage', 'Bookings', 'fa fa-hotel', $page); ?>
            <?php navItem('hostelstuManage', 'Hostel Students', 'fa fa-users', $page); ?>
            <?php navItem('roomManage', 'Rooms', 'fa fa-bed', $page); ?>
            <?php navItem('courseManage', 'Courses', 'fa fa-tasks', $page); ?>
        </div>

        <div class="px-3 sm:px-4 pt-3 sm:pt-4 mt-3 sm:mt-4 border-t border-slate-800">
            <a href="partials/_logout.php" class="flex items-center gap-3 sm:gap-4 px-3 py-2.5 sm:py-3 rounded-xl text-slate-400 hover:bg-red-500/10 hover:text-red-500 transition-all whitespace-nowrap">
                <i class='bx bx-log-out text-lg sm:text-xl min-w-[24px] sm:min-w-[28px] md:min-w-[30px] text-center'></i>
                <span class="font-medium text-sm">Logout</span>
            </a>
        </div>
    </nav>
</aside>

<script>
    const btn = document.getElementById('sidebar-toggle');
    const closeBtn = document.getElementById('close-sidebar');
    const nav = document.getElementById('nav-bar');
    const icon = document.getElementById('toggle-icon');
    let isMobileSidebarOpen = false;

    // Open/close sidebar on mobile
    btn.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevent event from bubbling up
        
        if (window.innerWidth < 768) {
            if (nav.classList.contains('left-[-100%]')) {
                // Open sidebar
                nav.classList.remove('left-[-100%]');
                nav.classList.add('left-0');
                isMobileSidebarOpen = true;
                document.body.style.overflow = 'hidden';
                // Change icon to close when sidebar is open
                icon.classList.remove('bx-menu-alt-left');
                icon.classList.add('bx-x');
            } else {
                // Close sidebar
                nav.classList.remove('left-0');
                nav.classList.add('left-[-100%]');
                isMobileSidebarOpen = false;
                document.body.style.overflow = '';
                // Change icon back to menu
                icon.classList.remove('bx-x');
                icon.classList.add('bx-menu-alt-left');
            }
        }
    });

    // Close sidebar on mobile with close button
    if(closeBtn) {
        closeBtn.addEventListener('click', () => {
            nav.classList.remove('left-0');
            nav.classList.add('left-[-100%]');
            isMobileSidebarOpen = false;
            document.body.style.overflow = '';
            // Change icon back to menu
            icon.classList.remove('bx-x');
            icon.classList.add('bx-menu-alt-left');
        });
    }
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', (e) => {
        if (window.innerWidth < 768 && 
            isMobileSidebarOpen && 
            !nav.contains(e.target) && 
            e.target !== btn && 
            !btn.contains(e.target)) {
            nav.classList.remove('left-0');
            nav.classList.add('left-[-100%]');
            isMobileSidebarOpen = false;
            document.body.style.overflow = '';
            // Change icon back to menu
            icon.classList.remove('bx-x');
            icon.classList.add('bx-menu-alt-left');
        }
    });
    
    // Close sidebar on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && window.innerWidth < 768 && isMobileSidebarOpen) {
            nav.classList.remove('left-0');
            nav.classList.add('left-[-100%]');
            isMobileSidebarOpen = false;
            document.body.style.overflow = '';
            // Change icon back to menu
            icon.classList.remove('bx-x');
            icon.classList.add('bx-menu-alt-left');
        }
    });
    
    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            nav.classList.remove('left-[-100%]');
            nav.classList.add('left-0');
            document.body.style.overflow = '';
            // Reset icon to menu icon
            icon.classList.remove('bx-x');
            icon.classList.add('bx-menu-alt-left');
        } else {
            if (!nav.classList.contains('left-0')) {
                nav.classList.add('left-[-100%]');
            }
            isMobileSidebarOpen = nav.classList.contains('left-0');
        }
    });
    
    // Initialize sidebar state on page load
    document.addEventListener('DOMContentLoaded', () => {
        if (window.innerWidth < 768) {
            nav.classList.add('left-[-100%]');
            isMobileSidebarOpen = false;
        }
    });
</script>