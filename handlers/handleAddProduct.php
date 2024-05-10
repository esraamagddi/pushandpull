<?php
use helpers\Img;
// use validation\Img as validateimg;
require_once '../App.php';


if ($request->ispost())
{
    $name=$request->post('name');
    $desc=$request->post('desc');
    $price=$request->post('price');
    $img=$request->file('img');
    $validation->rules('name',$name,['required','string','max:50']);
    $validation->rules('desc',$desc,['required','string']);
    $validation->rules('price',$price,['required','numeric']);
    $validation->rules('img',$img['name'],['required','img']);






    if(empty($validation->errors))
    {
        $img=new Img($img);

       $runquery=$product->insert($name,$desc,$img->imgNewName,$price);
    //    var_dump($runquery);

       if($runquery)

       {
        // var_dump($_FILES['img']);
            $img->upload();
            $session->push('success','product inserted successfully');

            $request->redirect('../index.php');

       }
       else
       {
        $session->push('errors','error while inserting product');
            
        $request->redirect('../Add.php');
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

        $session->add('name',$name);
        $session->add('desc',$desc);
        $session->add('price',$price);


        $request->redirect('../Add.php');

    }
    
}
else
{
    echo 'errorrrr';
    // $request->redirect('../Add.php');
}