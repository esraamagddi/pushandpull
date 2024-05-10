<?
require_once '../App.php';

use helpers\Img;

if (!$request->get('id')) {
    $request->redirect('../index.php');
}

$id = $request->get('id');
$pro = $product->selectone($id);

if (empty($pro)) {
    $request->redirect('../index.php');
}

$imageName = $pro['image'];

$runquery = $product->delete($id);

if ($runquery) {
    Img::delete($imageName);
    $session->push('success', 'Product deleted successfully');
} else {
    $session->push('errors', 'Error while deleting product');
}

$request->redirect('../index.php');

 ?>