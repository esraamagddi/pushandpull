<?php
require_once '../App.php';


if ($request->ispost())
{
    $email=$request->post('email');
    $password=$request->post('password');

    $validation->rules('email',$email,['required','email']);
    $validation->rules('password',$password,['required']);

    if(empty($validation->errors))
    {

        $result=$admin->attempt($email,$password);
        
        if(!empty($result)){

            $session->add('adminId',$result['id']);
            $session->add('username',$result['username']);


            $request->redirect('../index.php');

       }
       else
       {
        $session->push('errors','invalid credentials');
            
        $request->redirect('../login.php');
       }
    }
    else
    {
        // echo '<pre>';
        print_r($validation->errors);
        foreach ($validation->errors as $error) {
            $session->push('errors',$error);
        }

        $session->add('email',$email);



        $request->redirect('../login.php');

    }
    
}
else
{
    echo 'errorrrr';
    $request->redirect('../login.php');
}