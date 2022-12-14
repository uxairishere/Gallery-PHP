<?php

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom Styles  -->
    <link rel="stylesheet" href="css/uploadFormStyle.css">
    <link rel="stylesheet" href="css/galleryStyles.css">

    <!-- FONT FAMILY -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=PT+Sans+Narrow&family=Vujahday+Script&display=swap" rel="stylesheet">

    <!-- INTRO FONT  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=The+Nautigal&display=swap" rel="stylesheet">
<!-- W3 MODAL     -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<title>Document</title>
</head>

<body>
     <!-- NAVBAR_START -->
     <nav class="sticky-top navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
        <div  class="container-fluid">
            <a style="padding: 0 3rem 0 3rem; font-family: 'Bebas Neue', cursive; font-size: 2rem;" class="navbar-brand" href="#">Uxair</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
            <!-- LEFT BUTTONS -->
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                </ul>

            <!-- RIGHT BUTTONS -->
            
                <ul style="margin: 0 3rem 0 0;" class="navbar-nav" >
                <li><a class="nav-link" href="https://www.instagram.com/uxair_abbass">INSTAGRAM</a></li>
                <li><a class="nav-link" href="https://www.facebook.com/uxair.abbas.9">FACEBOOK</a></li>
                <li><a class="nav-link" href="https://uxairishere.github.io/profile/">PROFILE</a></li>
                
            </ul>
            </div>
        </div>
    </nav>
    <!-- NAVBAR_END -->
    <section class="container-md">
<!-- INTRO DIV START  -->
    <div class="x-intro-div">
        <h1 class="x-intro-title">I'm Uxair</h1>
        <p>Welcome to my gallery</p>
    </div>
    <!-- INTRO DIV END  -->
        <!-- x-main-div START  -->
        <div class="x-main-div">
        <!-- CARDS STRAT -->
        <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-3"> 


        <?php
        include_once 'includes/dbh.php';

        $destination = '';

        $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "SQL statement failed!";
        }else{
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

             while($row = mysqli_fetch_assoc($result)){
                $source = "img/gallery/".$row["imgFullNameGallery"];
                echo '<div class="col">
                <div class="card shadow-sm" style="text-align: center; background-color: #2C2B2B;">
                    <a href="'.$source.'" target="_blank"><img  id="'.$source.'" style="height: 12rem;" class="card-img-top" src="img/gallery/'.$row["imgFullNameGallery"].'" alt=""></a>
                    <h5>'.$row["titleGallery"].'</h5>
                    <p>'.$row["descGallery"].'</p>
                    
                </div>
            </div>';
            }
        }
        
        ?>

                    </div>
                </div>
            </div>

        </div>
        <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <?php
        echo '<img style="width: 100rem; height: 40rem" src="'.$destination.'" alt="Loading Image">';

        ?>
      </div>
    </div>
  </div>
        <!-- UPLOAD DIV START -->
        <div class="box">
    <form action="includes/gallery-upload.php" method="POST" enctype="multipart/form-data">
      <h1 style="font-family: 'Bebas Neue', cursive;">Upload Image</h1>
      <input type="text" name="filename" placeholder="File Name">
      <input type="text" name="filetitle" placeholder="Image Title">
      <input type="text" name="filedesc" placeholder="Image Discription">
      <input type="file" name="file">
      <input type="submit" name="submit" value="UPLOAD" >
    </form>
  </div>
        <!-- UPLOAD DIV END -->
        <!-- x-main-div END -->
    </div>
    </section>
    <!-- CARDS END -->
</body>
<script>
    function ModalClickHandler(clicked_id){
        window.location.href="index.php?uid=" + clicked_id;
        <?php $destination = $_GET["uid"] . $destination; ?> 
        document.getElementById("id01").style.display="block";
    }
    function modalClickHandler(){
        console.log("PRESSEDDDDD")
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<!-- W3 JS -->
<script src="https://www.w3schools.com/lib/w3.js"></script>
</html>