// sidebar.js
document.addEventListener('DOMContentLoaded', function() {
    // Mobile sidebar toggle
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    
    function toggleSidebar() {
      const isOpen = mobileSidebar.style.transform === 'translateX(0px)';
      
      if (isOpen) {
        mobileSidebar.style.transform = 'translateX(-100%)';
        sidebarOverlay.style.display = 'none';
        document.body.style.overflow = 'auto';
      } else {
        mobileSidebar.style.transform = 'translateX(0)';
        sidebarOverlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
      }
    }
    
    if (sidebarToggle && mobileSidebar && sidebarOverlay) {
      sidebarToggle.addEventListener('click', toggleSidebar);
      sidebarOverlay.addEventListener('click', toggleSidebar);
    } else {
      console.error("Un ou plusieurs éléments de la barre latérale sont manquants.");
    }
  
    // Initialize all accordions/collapsibles in the sidebar
    const accordionButtons = document.querySelectorAll('[data-bs-toggle="collapse"]');
    accordionButtons.forEach(button => {
      button.addEventListener('click', function() {
        const icon = this.querySelector('.submenu-icon');
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        
        if (isExpanded) {
          icon.style.transform = 'rotate(180deg)';
        } else {
          icon.style.transform = 'rotate(0deg)';
        }
      });
    });
  });