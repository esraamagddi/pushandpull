<?php require_once 'inc/header.php';
require_once 'App.php';


if(!$request->get('id')){
    $request->redirect('index.php');

}
$id=$request->get('id');
$product=$product->selectone($id);
if(empty($product)){

    $request->redirect('index.php');

}
 ?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
        <?php
        // require_once 'inc/errors.php';

        
        
        ?>

<!-- action="handlers/handleEditProduct.php?id=<?= $product['id']?>" method="post" -->
<form id="editProductForm" data-product-id="<?= $product['id']; ?>" enctype="multipart/form-data">
                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name = "name" value="<?= $product['name'];?>">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price"value="<?= $product['price'];?>">
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc"><?= $product['description'];?></textarea>
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" id="formFile" name="img">
                </div>

                <div class="col-lg-3">
                        <img src="images/<?= $product['image'];?>" class="card-img-top">
                        </div>
                        
                <center><button type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>


<script src="inc/jquery-3.7.1.min.js"></script>

<!-- <script src="inc/ajax.js"></script> -->
<!-- <script src="inc/xhr.js"></script> -->
<!-- <script src="inc/longPolling.js"></script> -->
<script src="inc/longPolling.js"></script>

<?php include 'inc/footer.php'; ?>