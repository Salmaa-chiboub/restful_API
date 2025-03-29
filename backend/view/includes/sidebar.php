<?php
$currentPage = basename($_SERVER['PHP_SELF']); // Récupère le fichier actuel

// Tableau des éléments du menu
$menuItems = [
    "Dashboard" => [
        "link" => "index.php",
        "icon" => "bi-house-door",
        "submenu" => null
    ],
    "User Management" => [
        "link" => "#",
        "icon" => "bi-people",
        "submenu" => [
            "Students" => "students.php",
            "Faculty" => "faculty.php",
            "Staff" => "staff.php"
        ]
    ],
    "Content Management" => [
        "link" => "#",
        "icon" => "bi-book",
        "submenu" => [
            "Courses" => "coures.php",
            "Modules" => "modules.php",
            "Resources" => "resources.php"
        ]
    ],
    "Timetable Management" => [
        "link" => "#",
        "icon" => "bi-calendar-week",
        "submenu" => [
            "Class Schedule" => "class_schedule.php",
            "Exam Schedule" => "exam_schedule.php"
        ]
    ],
    "Statistics and Reports" => [
        "link" => "#",
        "icon" => "bi-bar-chart",
        "submenu" => [
            "Attendance" => "attendance.php",
            "Grades" => "grades.php",
            "Analytics" => "analytics.php"
        ]
    ],
    "Communication" => [
        "link" => "#",
        "icon" => "bi-chat-square-text",
        "submenu" => [
            "Messages" => "messages.php",
            "Announcements" => "announcements.php",
            "Email" => "email.php"
        ]
    ],
    
    "Settings" => [
        "link" => "settings.php",
        "icon" => "bi-gear",
        "submenu" => null
    ]
];
?>

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
        <?php foreach ($menuItems as $label => $item): ?>
            <?php if ($item['submenu'] === null): ?>
                <!-- Élément simple sans sous-menu -->
                <div class="sidebar-item <?= ($currentPage == $item['link']) ? 'active' : '' ?>">
                    <a href="<?= $item['link'] ?>" class="nav-link">
                        <i class="bi <?= $item['icon'] ?>"></i>
                        <span class="ms-2"><?= $label ?></span>
                    </a>
                </div>
            <?php else: ?>
                <!-- Élément avec sous-menu -->
                <div class="sidebar-item">
                    <button class="nav-link w-100 d-flex justify-content-between align-items-center" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#<?= str_replace(' ', '', $label) ?>Menu" 
                            aria-expanded="<?= in_array($currentPage, $item['submenu']) ? 'true' : 'false' ?>">
                        <div class="d-flex align-items-center">
                            <i class="bi <?= $item['icon'] ?>"></i>
                            <span class="ms-2"><?= $label ?></span>
                        </div>
                        <i class="bi bi-chevron-down submenu-icon"></i>
                    </button>
                    <div class="collapse submenu <?= in_array($currentPage, $item['submenu']) ? 'show' : '' ?>" id="<?= str_replace(' ', '', $label) ?>Menu">
                        <?php foreach ($item['submenu'] as $subLabel => $subLink): ?>
                            <div class="sidebar-item <?= ($currentPage == $subLink) ? 'active' : '' ?>">
                                <a href="<?= $subLink ?>" class="nav-link"><?= $subLabel ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<!-- Mobile sidebar overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Mobile sidebar -->
<div class="sidebar mobile-sidebar" id="mobileSidebar">
    <div class="sidebar-header border-bottom border-sidebar p-4">
        <a href="index.php" class="d-flex align-items-center text-decoration-none">
            <i class="bi bi-mortarboard-fill fs-4 text-primary"></i>
            <span class="ms-2 fs-4 fw-bold text-primary">UniAdmin</span>
        </a>
    </div>

    <div class="sidebar-menu py-2">
        <?php foreach ($menuItems as $label => $item): ?>
            <?php if ($item['submenu'] === null): ?>
                <!-- Élément simple sans sous-menu -->
                <div class="sidebar-item <?= ($currentPage == $item['link']) ? 'active' : '' ?>">
                    <a href="<?= $item['link'] ?>" class="nav-link">
                        <i class="bi <?= $item['icon'] ?>"></i>
                        <span class="ms-2"><?= $label ?></span>
                    </a>
                </div>
            <?php else: ?>
                <!-- Élément avec sous-menu -->
                <div class="sidebar-item">
                    <button class="nav-link w-100 d-flex justify-content-between align-items-center" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#mobile<?= str_replace(' ', '', $label) ?>Menu" 
                            aria-expanded="<?= in_array($currentPage, $item['submenu']) ? 'true' : 'false' ?>">
                        <div class="d-flex align-items-center">
                            <i class="bi <?= $item['icon'] ?>"></i>
                            <span class="ms-2"><?= $label ?></span>
                        </div>
                        <i class="bi bi-chevron-down submenu-icon"></i>
                    </button>
                    <div class="collapse submenu <?= in_array($currentPage, $item['submenu']) ? 'show' : '' ?>" id="mobile<?= str_replace(' ', '', $label) ?>Menu">
                        <?php foreach ($item['submenu'] as $subLabel => $subLink): ?>
                            <div class="sidebar-item <?= ($currentPage == $subLink) ? 'active' : '' ?>">
                                <a href="<?= $subLink ?>" class="nav-link"><?= $subLabel ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
