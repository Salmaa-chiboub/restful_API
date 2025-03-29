<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management - UniAdmin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/students.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include '../includes/sidebar.php'; ?>
        
        <div class="main-content">
            <?php include '../includes/header.php'; ?>
            
            <div class="container-fluid p-4 student-management-container">
                <!-- Page Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Student Management</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                        <i class="bi bi-plus-lg me-1"></i> Add Student
                    </button>
                </div>

                <!-- Search and Filters -->
                <div class="card mb-4 search-filters">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="search-box">
                                    <i class="bi bi-search"></i>
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search students...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" id="fieldFilter">
                                    <option value="">All Fields of Study</option>
                                    <option value="Civil">Civil Engineering</option>
                                    <option value="Informatique">Computer Science</option>
                                    <option value="Data">Data Science</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Students Table -->
                <div class="card student-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="studentTable">
                                <thead>
                                    <tr>
                                        <th>CNE</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Field</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table content will be dynamically populated -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Edit Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Student Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addStudentForm">
                        <input type="hidden" name="id_etudiant" value="">
                        <div class="mb-3">
                            <label for="CNE" class="form-label">CNE</label>
                            <input type="text" class="form-control" id="CNE" name="CNE" required>
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="tele" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="tele" name="tele" required>
                        </div>
                        <div class="mb-3">
                            <label for="sexe" class="form-label">Gender</label>
                            <select class="form-select" id="sexe" name="sexe" required>
                                <option value="masculin">Male</option>
                                <option value="féminin">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="filiere" class="form-label">Field of Study</label>
                            <select class="form-select" id="filiere" name="filiere" required>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pays" class="form-label">Country</label>
                            <input type="text" class="form-control" id="pays" name="pays" required>
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">City</label>
                            <input type="text" class="form-control" id="ville" name="ville" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_naissance" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                        </div>
                        <div class="mb-3">
                            <label for="lieu_naissance" class="form-label">Place of Birth</label>
                            <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" required>
                        </div>
                        <div class="mb-3">
                            <label for="coordonne_parental" class="form-label">Parent Contact</label>
                            <input type="text" class="form-control" id="coordonne_parental" name="coordonne_parental" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_inscription" class="form-label">Registration Date</label>
                            <input type="date" class="form-control" id="date_inscription" name="date_inscription" required>
                        </div>
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/students.js"></script>
    <script src="../assets/js/sidebar.js"></script>
</body>
</html>