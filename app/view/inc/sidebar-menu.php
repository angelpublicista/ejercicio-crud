<?php 
  require_once ROUTE_APP . "/view/inc/modules.php";
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo ROUTE_URL; ?>/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo ROUTE_URL; ?>/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php foreach($rtl_modules as $module): ?>
          <!-- 
            RECORRE MODULOS RTL
            @modules.php
          -->
          <li class="nav-item">
            <a href="<?php echo $module['link']; ?>" class="nav-link">
              <?php echo $module['icon']; ?>
              <p>
                <?php echo $module['title_menu']; ?>
                <?php if($module['subitems']): ?>
                  <i class="right fas fa-angle-left"></i>
                <?php endif; ?>
              </p>
            </a>
            
            <?php if($module['subitems']): ?>
              <ul class="nav nav-treeview">
                  <?php foreach($module['subitems'] as $subitem): ?>
                    <li class="nav-item">
                      <a href="<?php echo $subitem['link']; ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p><?php echo $subitem['title_menu']; ?></p>
                      </a>
                    </li>
                  <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
