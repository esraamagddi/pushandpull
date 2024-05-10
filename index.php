<?php require_once 'inc/header.php'; ?>
<?php require_once 'App.php';
use helpers\Str; 
$products=$product->selectall();

?>



<div class="container my-5">
<?php
     
require_once 'inc/success.php';
?>
    <div class="row">
        

<?php
if(!empty($products)):
    foreach ($products as $product):


?>


    <div class="col-lg-4 mb-3">



            <div class="card">
            <img src="images/<?= $product['image']?>" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title"><?= $product['name']?></h5>
            <p class="text-muted"><?= $product['price']?> EGP</p>
            <p class="card-text"><?=str::limit( $product['description'])?></p>
            <a href="show.php?id=<?=$product['id']?>" class="btn btn-primary">Show</a>
            <?php if($session->hasSession('adminId')): ?>

            <a href="edit.php?id=<?=$product['id']?>" class="btn btn-info">Edit</a>
            <a href="./handlers/handleDeleteProduct.php?id=<?=$product['id']?>" class="btn btn-danger">Delete</a>   
            <?php endif; ?>
  
               </div>
        </div>
        
    </div>

    <?php
    endforeach;
    endif;
    ?>

    
        
    </div>

</div>



<?php include 'inc/footer.php'; ?>