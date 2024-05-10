<?php require_once 'inc/header.php'; ?>
<?php require_once 'App.php'; 

    if(!$request->get('id'))
    {
        $request->redirect(path:'index.php');
    }

    $id=$request->get('id');
    $product=$product->selectone($id);

    if(empty($product))
    {
        $request->redirect(path:'index.php');

    }




?>





<div class="container my-5">

    <div class="row">


    <div class="col-lg-6">
            <img src="images/<?= $product['img']?>" class="card-img-top">
            </div>
            <div class="col-lg-6">
            <h5 ><?= $product['name']?></h5>
            <p class="text-muted">Price: <?= $product['price']?> EGP</p>
            <p>L<?= $product['desc']?></p>
            <a href="index.php" class="btn btn-primary">Back</a>
            <a href="" class="btn btn-info">Edit</a>
            <a href="" class="btn btn-danger">Delete</a>
        </div>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>