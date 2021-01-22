<?php require ROUTE_APP . "/view/inc/header.php"; ?>

  <?php require ROUTE_APP . "/view/inc/sidebar-menu.php"; ?>
  
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
              <li class="breadcrumb-item active"><?php echo $data['title']; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulario <small>actualización de usuarios</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo ROUTE_URL ?>/users/update/<?php echo $data['user']->id; ?>" id="updateForm" method="POST">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-12 col-md-4">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Ingrese nombre" value="<?php echo $data['user']->name; ?>">
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="exampleInputEmail1">Apellido</label>
                        <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Ingrese apellido" value="<?php echo $data['user']->last_name; ?>">
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label for="exampleInputEmail1">Teléfono</label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Ej: 30109090909" value="<?php echo $data['user']->phone; ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputEmail1">Correo electrónico</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Ingrese correo electrónico" value="<?php echo $data['user']->email; ?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="exampleInputEmail1">Rol de usuario</label>
                        <select class="form-control custom-select" name="role" id="role">
                            <option disabled>Selecciona una opción</option>
                            <option <?php if($data['user']->id_role == 1){echo "selected";} ?> value="1">Administrador</option>
                            <option <?php if($data['user']->id_role == 2){echo "selected";} ?> value="2">Colaborador</option>
                            <option <?php if($data['user']->id_role == 3){echo "selected";} ?> value="3">Cliente</option>
                            <option <?php if($data['user']->id_role == 4){echo "selected";} ?> value="4">Aliado</option>
                        </select>
                    </div>

                    <div class="form-group col-12 d-none" id="box-change-password">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Ingrese contraseña" value="">
                    </div>
                    <div class="form-group col-12 mb-0">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="terms" class="custom-control-input" id="change-pass">
                        <label class="custom-control-label" for="change-pass">Cambiar contraseña</label>
                      </div>
                    </div>
                  </div>
                  
                  <!-- <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div> -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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