<?php
$error = [];
$success = '';

if(empty($_POST['fname'])){
    $error['fname'] = "First name is required";
}

if(empty($_POST['lname'])){
    $error['lname'] = "Last name is required";
}

if(empty($_POST['gender'])){
    $error['gender'] = "Please select gender";
}

if(empty($_POST['hobbies'])){
    $error['hobbies'] = "Please select at least one hobby";
}

if(empty($_POST['address'])){
    $error['address'] = "Address is required";
}

if(empty($_POST['grade'])){
    $error['grade'] = "Please select grade";
}

if(!empty($error)){
    echo json_encode(['error'=>$error]);
}else{
    $success = "Form submitted successfully!";
    echo json_encode(['success'=>$success]);
}
?>
