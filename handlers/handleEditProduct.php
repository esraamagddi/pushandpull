<?php
use helpers\Img;
// use validation\Img as validateimg;
require_once '../App.php';


if ($request->ispost())
{   $id=$request->get('id');
    $name=$request->post('name');
    $desc=$request->post('desc');
    $price=$request->post('price');
    $img=$request->file('img');
    $imgName=$img['name'];
    $imgOldName=$product->selectone($id)['image'];
    $validation->rules('name',$name,['required','string','max:50']);
    $validation->rules('desc',$desc,['required','string']);
    $validation->rules('price',$price,['required','numeric']);
    $validation->rules('img',$imgName,['img']);






    if(empty($validation->errors))
    {
        if(!empty($imgName)){
            $img=new Img($img);
            $updateImage=$img->imgNewName;

        }else
        {
            $updateImage=$imgOldName;

        }



       $runquery=$product->update($name,$desc,$updateImage,$price,$id);
    //    var_dump($runquery);

       if($runquery)

       {
        if(!empty($imgName)){
            $img->upload();
            $img->delete($imgOldName);

        }
        // var_dump($_FILES['img']);
            // $session->push('success','product updated successfully');

            // $request->redirect('../index.php');

       }
       else
       {
        $session->push('errors','error while updating product');
            
        // $request->redirect("../edit.php?id=$id");
       }
    }
    else
    {
        // echo '<pre>';
        print_r($validation->errors);
        foreach ($validation->errors as $error) {
            $session->push('errors',$error);
            # code...
        }



        // $request->redirect("../edit.php?id=$id");

    }
    
}
else
{
    echo 'errorrrr';
    // $request->redirect('../index.php');
}