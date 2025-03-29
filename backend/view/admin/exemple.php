html :  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UniAdmin User Management</title>
    <meta name="description" content="University Admin User Management" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/students.css">
    <link rel="stylesheet" href="../css/dashbord.css">

  </head>

<body>
<div class="dashboard-container">
      <!-- Sidebar for desktop -->
      <div class="sidebar d-none d-lg-block">
        <div class="sidebar-header border-bottom border-sidebar p-4">
          <a href="index.html" class="d-flex align-items-center text-decoration-none">
            <svg 
              xmlns="http://www.w3.org/2000/svg" 
              viewBox="0 0 24 24" 
              fill="none" 
              stroke="currentColor" 
              stroke-width="2" 
              stroke-linecap="round" 
              stroke-linejoin="round" 
              class="h-6 w-6 mr-2 text-primary"
            >
              <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
              <path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/>
            </svg>
            <span class="ms-2 fs-4 fw-bold text-primary">UniAdmin</span>
          </a>
        </div>
        
        <div class="sidebar-menu py-2">
          <div class="sidebar-item active">
            <a href="index.html" class="nav-link">
              <i class="bi bi-house-door"></i>
              <span class="ms-2">Dashboard</span>
            </a>
          </div>
          
          <div class="sidebar-item">
            <button class="nav-link w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#userManagementMenu">
              <div class="d-flex align-items-center">
                <i class="bi bi-people"></i>
                <span class="ms-2">User Management</span>
              </div>
              <i class="bi bi-chevron-down submenu-icon"></i>
            </button>
            <div class="collapse submenu" id="userManagementMenu">
              <a href="#" class="nav-link">Students</a>
              <a href="#" class="nav-link">Faculty</a>
              <a href="#" class="nav-link">Staff</a>
            </div>
          </div>
          
          <div class="sidebar-item">
            <button class="nav-link w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#contentManagementMenu">
              <div class="d-flex align-items-center">
                <i class="bi bi-book"></i>
                <span class="ms-2">Content Management</span>
              </div>
              <i class="bi bi-chevron-down submenu-icon"></i>
            </button>
            <div class="collapse submenu" id="contentManagementMenu">
              <a href="#" class="nav-link">Courses</a>
              <a href="#" class="nav-link">Modules</a>
              <a href="#" class="nav-link">Resources</a>
            </div>
          </div>
          
          <div class="sidebar-item">
            <button class="nav-link w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#timetableMenu">
              <div class="d-flex align-items-center">
                <i class="bi bi-calendar-week"></i>
                <span class="ms-2">Timetable Management</span>
              </div>
              <i class="bi bi-chevron-down submenu-icon"></i>
            </button>
            <div class="collapse submenu" id="timetableMenu">
              <a href="#" class="nav-link">Class Schedule</a>
              <a href="#" class="nav-link">Exam Schedule</a>
            </div>
          </div>
          
          <div class="sidebar-item">
            <button class="nav-link w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#communicationMenu">
              <div class="d-flex align-items-center">
                <i class="bi bi-chat-square-text"></i>
                <span class="ms-2">Communication</span>
              </div>
              <i class="bi bi-chevron-down submenu-icon"></i>
            </button>
            <div class="collapse submenu" id="communicationMenu">
              <a href="#" class="nav-link">Messages</a>
              <a href="#" class="nav-link">Announcements</a>
              <a href="#" class="nav-link">Email</a>
            </div>
          </div>
          
          <div class="sidebar-item">
            <button class="nav-link w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#statisticsMenu">
              <div class="d-flex align-items-center">
                <i class="bi bi-bar-chart"></i>
                <span class="ms-2">Statistics & Reports</span>
              </div>
              <i class="bi bi-chevron-down submenu-icon"></i>
            </button>
            <div class="collapse submenu" id="statisticsMenu">
              <a href="#" class="nav-link">Attendance</a>
              <a href="#" class="nav-link">Grades</a>
              <a href="#" class="nav-link">Analytics</a>
            </div>
          </div>
          
          <div class="sidebar-item">
            <a href="#" class="nav-link">
              <i class="bi bi-gear"></i>
              <span class="ms-2">Settings</span>
            </a>
          </div>
        </div>
      </div>
      
      <!-- Mobile sidebar overlay -->
      <div class="sidebar-overlay" id="sidebarOverlay"></div>
      
      <!-- Mobile sidebar -->
      <div class="sidebar mobile-sidebar" id="mobileSidebar">
        <!-- Same content as desktop sidebar -->
        <div class="sidebar-header border-bottom border-sidebar p-4">
          <a href="index.html" class="d-flex align-items-center text-decoration-none">
            <i class="bi bi-mortarboard-fill fs-4 text-primary"></i>
            <span class="ms-2 fs-4 fw-bold text-primary">UniAdmin</span>
          </a>
        </div>
        
        <div class="sidebar-menu py-2">
          <!-- Same items as desktop sidebar -->
          <div class="sidebar-item active">
            <a href="index.html" class="nav-link">
              <i class="bi bi-house-door"></i>
              <span class="ms-2">Dashboard</span>
            </a>
          </div>
          
          <div class="sidebar-item">
            <button class="nav-link w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#mobileUserManagementMenu">
              <div class="d-flex align-items-center">
                <i class="bi bi-people"></i>
                <span class="ms-2">User Management</span>
              </div>
              <i class="bi bi-chevron-down submenu-icon"></i>
            </button>
            <div class="collapse submenu" id="mobileUserManagementMenu">
              <a href="#" class="nav-link">Students</a>
              <a href="#" class="nav-link">Faculty</a>
              <a href="#" class="nav-link">Staff</a>
            </div>
          </div>
          <div class="sidebar-item">
            <button class="nav-link w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#contentManagementMenu">
              <div class="d-flex align-items-center">
                <i class="bi bi-book"></i>
                <span class="ms-2">Content Management</span>
              </div>
              <i class="bi bi-chevron-down submenu-icon"></i>
            </button>
            <div class="collapse submenu" id="contentManagementMenu">
              <a href="#" class="nav-link">Courses</a>
              <a href="#" class="nav-link">Modules</a>
              <a href="#" class="nav-link">Resources</a>
            </div>
          </div>
          
          <div class="sidebar-item">
            <button class="nav-link w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#timetableMenu">
              <div class="d-flex align-items-center">
                <i class="bi bi-calendar-week"></i>
                <span class="ms-2">Timetable Management</span>
              </div>
              <i class="bi bi-chevron-down submenu-icon"></i>
            </button>
            <div class="collapse submenu" id="timetableMenu">
              <a href="#" class="nav-link">Class Schedule</a>
              <a href="#" class="nav-link">Exam Schedule</a>
            </div>
          </div>
          
          <div class="sidebar-item">
            <button class="nav-link w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#communicationMenu">
              <div class="d-flex align-items-center">
                <i class="bi bi-chat-square-text"></i>
                <span class="ms-2">Communication</span>
              </div>
              <i class="bi bi-chevron-down submenu-icon"></i>
            </button>
            <div class="collapse submenu" id="communicationMenu">
              <a href="#" class="nav-link">Messages</a>
              <a href="#" class="nav-link">Announcements</a>
              <a href="#" class="nav-link">Email</a>
            </div>
          </div>
          
          <div class="sidebar-item">
            <button class="nav-link w-100 d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#statisticsMenu">
              <div class="d-flex align-items-center">
                <i class="bi bi-bar-chart"></i>
                <span class="ms-2">Statistics & Reports</span>
              </div>
              <i class="bi bi-chevron-down submenu-icon"></i>
            </button>
            <div class="collapse submenu" id="statisticsMenu">
              <a href="#" class="nav-link">Attendance</a>
              <a href="#" class="nav-link">Grades</a>
              <a href="#" class="nav-link">Analytics</a>
            </div>
          </div>
          
          <div class="sidebar-item">
            <a href="#" class="nav-link">
              <i class="bi bi-gear"></i>
              <span class="ms-2">Settings</span>
            </a>
          </div>
          
          
          <!-- Copy other sidebar items for mobile version with different IDs -->
        </div>
      </div>
      <div class="main-content">
        <!-- Header -->
        <header class="header bg-white border-bottom border-gray">
          <div class="d-flex justify-content-between align-items-center px-3 py-3">
            <div class="d-flex d-lg-none">
              <button class="btn btn-link text-decoration-none" id="sidebarToggle">
                <i class="bi bi-list fs-4"></i>
              </button>
            </div>
            
            <div class="search-bar d-none d-md-block">
              <form class="position-relative">
                <i class="bi bi-search position-absolute search-icon"></i>
                <input type="search" class="form-control search-input" placeholder="Search...">
              </form>
            </div>
            
            <div class="header-icons d-flex align-items-center">
              <div class="position-relative mx-2">
                <a href="#" class="btn btn-link text-decoration-none position-relative">
                  <i class="bi bi-bell fs-5"></i>
                  <span class="notification-badge">5</span>
                </a>
              </div>
              
              <div class="position-relative mx-2">
                <a href="#" class="btn btn-link text-decoration-none position-relative">
                  <i class="bi bi-envelope fs-5"></i>
                  <span class="notification-badge">3</span>
                </a>
              </div>
              
              <div class="dropdown ms-2">
                <button class="btn btn-link dropdown-toggle text-decoration-none d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                  <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="rounded-circle border" width="32" height="32">
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><span class="dropdown-item-text">My Account</span></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Log out</a></li>
                </ul>
              </div>
            </div>
          </div>
        </header>
        <div class="container-fluid p-4 student-management-container">
    <div class="row mb-4">
      <div class="col">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2>Students List</h2>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
            <i class="bi bi-plus-lg me-1"></i> Add Student
          </button>
        </div>

        <!-- Search and Filters -->
        <div class="card mb-4">
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-4">
                <div class="input-group">
                  <input type="text" id="searchInput" class="form-control" placeholder="Search by ID or CNE...">
                  <button class="btn btn-outline-secondary" type="button" id="searchButton">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </div>
              <div class="col-md-8">
                <div class="row g-2">
                  <div class="col-md-4">
                    <select class="form-select" id="fieldFilter">
                      <option value="">All Fields of Study</option>
                      <option value="Civil">Civil </option>
                      <option value="Informatique">Informatique</option>
                      <option value="Data">Data </option>
                      <option value="GEER">GEER</option>
                      <option value="GEE">GEE</option>
                      <option value="IA">Artificial Intelligence</option>
                      <option value="Mécanique">Mechanical Engineering</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="form-select" id="yearFilter">
                      <option value="">All Years</option>
                      <option value="CP1">CP1</option>
                      <option value="CP2">CP2</option>
                      <option value="1st year">1st year </option>
                      <option value="2nd year">2nd year </option>
                      <option value="3rd year">3rd year </option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="form-select" id="statusFilter">
                      <option value="">All Status</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                      <option value="Suspended">Suspended</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Students Table -->
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover" id="studentsTable">
                <thead class="table-light">
                  <tr>
                    <th>ID</th>
                    <th>CNE</th>
                    <th>Name</th>
                    <th>Field of Study</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="studentsTableBody">
                
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <div>
                Showing <span id="studentCount">0</span> students
              </div>
              <nav aria-label="Page navigation">
                <ul class="pagination" id="pagination">
                  <!-- Pagination will be populated with JavaScript -->
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addStudentForm">
          <input type="hidden" id="studentId" name="id_etudiant" value="">
          <div class="mb-3">
            <label for="cne" class="form-label">CNE</label>
            <input type="text" class="form-control" id="cne" name="CNE" >
          </div>
          <div class="mb-3">
            <label for="nom" class="form-label">First Name</label>
            <input type="text" class="form-control" id="nom" name="nom" >
          </div>
          <div class="mb-3">
            <label for="prenom" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="prenom" name="prenom" >
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" >
          </div>
          <div class="mb-3">
            <label for="tele" class="form-label">Phone</label>
            <input type="text" class="form-control" id="tele" name="tele">
          </div>
          <div class="mb-3">
            <label for="sexe" class="form-label">Gender</label>
            <select class="form-select" id="sexe" name="sexe" required>
              <option value="masculin">Male</option>
              <option value="féminin">Female</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="pays" class="form-label">Country</label>
            <input type="text" class="form-control" id="pays" name="pays">
          </div>
          <div class="mb-3">
            <label for="ville" class="form-label">City</label>
            <input type="text" class="form-control" id="ville" name="ville">
          </div>
          <div class="mb-3">
            <label for="date_naissance" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" >
          </div>
          <div class="mb-3">
            <label for="lieu_naissance" class="form-label">Place of Birth</label>
            <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance">
          </div>
          <div class="mb-3">
            <label for="coordonne_parental" class="form-label">Parental Contact</label>
            <textarea class="form-control" id="coordonne_parental" name="coordonne_parental"></textarea>
          </div>
          <div class="mb-3">
            <label for="id_filiere" class="form-label">Filiere ID</label>
            <input type="number" class="form-control" id="id_filiere" name="id_filiere">
          </div>
          <div class="mb-3">
            <label for="date_inscription" class="form-label">Date of Enrollment</label>
            <input type="date" class="form-control" id="date_inscription" name="date_inscription">
          </div>
          <div class="mb-3">
            <label for="study_field" class="form-label">Field of Study</label>
            <select class="form-select" id="study_field" name="study_field" >
              <option value="Civil">Civil</option>
              <option value="Informatique">Informatique</option>
              <option value="Data">Data</option>
              <option value="GEER">GEER</option>
              <option value="GEE">GEE</option>
              <option value="IA">Artificial Intelligence</option>
              <option value="Mécanique">Mechanical Engineering</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <select class="form-select" id="year" name="year" >
              <option value="CP1">CP1</option>
              <option value="CP2">CP2</option>
              <option value="1st year">1st year</option>
              <option value="2nd year">2nd year</option>
              <option value="3rd year">3rd year</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" >
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
              <option value="suspended">Suspended</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="saveStudent">Save</button>
      </div>
    </div>
  </div>
</div>


  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this student? This action cannot be undone.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
        </div>
      </div>
    </div>
  </div>
       <!-- Bootstrap JS Bundle with Popper -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ApexCharts JS for charts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- Custom JavaScript -->
    <script src="../js/main.js"></script>
    <script src="../js/students.js"></script>
</body>
</html>