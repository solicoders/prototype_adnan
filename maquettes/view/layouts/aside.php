<?php
$current_route = $_SERVER['REQUEST_URI'];
?>
<aside class="main-sidebar sidebar-dark-info elevation-4 position-fixed">
  <!-- Logo de la marque -->
  <a href="/view/home.php" class="brand-link">
    <img src="/view/assets/images/logo.png" class="brand-image img-circle elevation-3" alt="Image de groupe">
    <span class="brand-text font-weight-light text-center h6">Gestion des modules</span>
  </a>

  <!-- Barre latérale -->
  <div class="sidebar">
    <!-- Menu latéral -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/view/home.php" class="nav-link <?php echo (strpos($current_route, 'home') !== false) ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/view/modules/index.php" class="nav-link <?php echo (strpos($current_route, 'modules') !== false) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                modules
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/view/competences/index.php" class="nav-link <?php echo (strpos($current_route, 'taches') !== false) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                compétences
              </p>
            </a>
          </li>
          <!-- MEMBRE -->
          <li class="nav-item">
            <a href="/view/stagiaires/index.php" class="nav-link <?php echo (strpos($current_route, 'utilisateurs') !== false) ? 'active' : ''; ?>">
              <i class="fa-solid fa-users pl-1 pr-1"></i>
              <p>
              stagiaires
              </p>
            </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>