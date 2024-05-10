<?php require_once 'inc/header.php';?>
<?php require_once 'App.php';?>




<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
        <?php
        require_once 'inc/errors.php';

        
        
        ?>

            <form action="handlers/handleLoginProduct.php" method="POST" >
                <div class="mb-3">
                <label for="name" class="form-label">Email:</label>
                <input type="email" class="form-control" id="name" name = "email" value="<?= $session->get('email');$session->remove('email');?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="price" name="password" >
                </div>



                <center><button on type="submit" class="btn btn-primary" name="submit">Submit</button></center>
            </form>
        </div>
    </div>
</div>


<?php include 'inc/footer.php'; ?>