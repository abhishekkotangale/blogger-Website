<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="upload-form">
        <form action="postupload.php" method="post" enctype="multipart/form-data">
        
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="content" placeholder="Description"></textarea>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="file">
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div> 
</body>
</html>