<?php
    include("db.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $name = $row['name'];
            $npc = $row['npc'];
            $stock = $row['stock'];
            $price = $row['price'];
            

        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $name = $_POST['name'];
        $npc = $_POST['npc'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];


       $query = "UPDATE task set name = '$name' , npc = '$npc', stock = '$stock', price = '$price' WHERE id = $id ";
       $result = mysqli_query($conn,$query);
       $_SESSION['message'] = 'Product Update Succesfully';
       $_SESSION['message'] = 'warning';
       header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?> 

    <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Update Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="npc" value="<?php echo $npc; ?>" class="form-control" placeholder="Update npc">
                        </div>
                        <div class="form-group">
                            <input type="text" name="stock" value="<?php echo $stock; ?>" class="form-control" placeholder="Update stock">
                        </div>
                        <div class="form-group">
                            <input type="text" name="price" value="<?php echo $price; ?>" class="form-control" placeholder="Update price">
                        </div>
                        <button class="btn btn-success" name="update">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php") ?> 