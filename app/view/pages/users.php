<?php require ROUTE_APP . "/view/inc/header.php"; ?>

  <?php require ROUTE_APP . "/view/inc/sidebar-menu.php"; ?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmar borrado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <i class="fas fa-exclamation-circle text-danger d-block mb-3"></i>
        <p>¿Está seguro que desea eliminar a <span id="user-name" class="text-danger">nombre usuario</span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <a href="<?php echo ROUTE_URL ?>/users/delete/" type="button" class="btn btn-default btn-submit">Si, eliminar</a>
      </div>
    </div>
  </div>
</div>
  
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $data['title']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php foreach($data['users'] as $user): ?>
                    <tr>
                      <td><?php echo $user->email; ?></td>
                      <td><?php echo $user->name  . " " . $user->last_name; ?></td>
                      <td><?php echo $user->phone; ?></td>
                      <td><?php echo $user->role_name; ?></td>
                      <td>
                        <a href="#" class="btn btn-info btn-sm">
                          <i class="far fa-eye"></i>
                          Ver
                        </a>

                        <a href="<?php echo ROUTE_URL; ?>/users/update/<?php echo $user->id; ?>" class="btn btn-primary btn-sm">
                          <i class="fas fa-edit"></i>
                          Editar
                        </a>

                        <a href="#" data-user-id='<?php echo $user->id; ?>' data-user-name='<?php echo $user->name . " " . $user->last_name; ?>' data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm btn-delete-user">
                          <i class="far fa-trash-alt"></i>
                          Borrar
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <?php require ROUTE_APP . "/view/inc/footer.php"; ?>