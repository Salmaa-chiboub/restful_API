        <?php
        $notifications=2;
        $messages=1;
        
        ?>
        
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
                      <?php if($notifications!=0){
                        echo '<span  class="notification-badge">'. $notifications.'</span>';
                      } ?>
                  </a>
              </div>

              <div class="position-relative mx-2">
                  <a href="#" class="btn btn-link text-decoration-none position-relative">
                      <i class="bi bi-envelope fs-5"></i>
                      <?php if($messages!=0){
                        echo '<span  class="notification-badge">'. $messages.'</span>';
                      } ?>
                  </a>
              </div>
              
              <div class="dropdown ms-2">
                <button class="btn btn-link dropdown-toggle text-decoration-none d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                  <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="rounded-circle border" width="32" height="32">
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><span class="dropdown-item-text">My Account</span></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="profile_admin.php">Profile</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Log out</a></li>
                </ul>
              </div>
            </div>
          </div>
        </header>