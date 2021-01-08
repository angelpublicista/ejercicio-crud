<?php include "db.php"; ?>

<?php include "includes/header.php"; ?>

<div class="container p-4">
    <div class="row">
        <div class="col-12 col-md-4">
            <?php if(isset($_SESSION["message"])):?>
                <div class="alert alert-<?php echo $_SESSION["message_type"]; ?> alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION["message"]; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); endif; ?>
            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Task description"></textarea>
                    </div>
                    <input type="submit" value="Crear tarea" class="btn btn-primary btn-block" name="save_task">
                </form>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query_task = "SELECT * FROM task";
                        $query_task_sentence = $connect_db->query($query_task);
                    ?>
                    <?php foreach($query_task_sentence as $row):?>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['create_at'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>

    
