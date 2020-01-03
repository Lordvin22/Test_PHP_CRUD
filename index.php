<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

        <?php if(isset($_SESSION['message'])){ ?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- Eliminar las variables de session -->
        <?php session_unset(); } ?>
        
            <div class="card card-body">
                <form action="save_task.php"  method="POST">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="name" autofocus> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="npc" class="form-control" placeholder="NPC" autofocus> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="stock" class="form-control" placeholder="stock" autofocus> 
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="price" autofocus> 
                    </div>
                    <input type="submit" class="btn btn-success btn-block"  name="save_task" value="Save Task"> 
                </form>
            </div>
        </div>
           <div class="col-md-8">
                <table class="table table-bordered">
                   <thead>
                        <tr>
                            <th>Name </th>
                            <th>NPC </th>
                            <th>Stock </th>
                            <th>Price </th>
                            <th>Created At </th>
                            <th>Actions </th>
                        </tr>
                   </thead>
                   <tbody>
                        <?php
                            $query = "SELECT * FROM task";
                            $result_tasks = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_array($result_tasks)){ ?>
                                <tr>
                                    <td> <?php echo $row['name'] ?> </td>
                                    <td> <?php echo $row['npc'] ?> </td>
                                    <td> <?php echo $row['stock'] ?> </td>
                                    <td> <?php echo $row['price'] ?> </td>
                                    <td> <?php echo $row['created_at'] ?> </td>
                                    <td> 
                                        <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary" >
                                        <i class="fas fa-marker"> </i>
                                        </a>
                                        <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"> </i>
                                        </a>
                                    </td>

                            
                         <?php   }  ?>
                       
                   </tbody>

                </table>
           </div>

    </div>
</div>

<?php include("includes/footer.php") ?>


