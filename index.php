<?php
if (!isset($_SESSION)) {
    session_start();
}
if($_SESSION['KC']['login']  !== 'ok'){
    $_SESSION['KC']['login'] = 'no';
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title></title>
</head>

<style> 


header {
    background-color: black;
    color: white;
}

footer{
    background-color: black;
    color: white;
    width:100%;
    
}

.embed-container {
        position: relative;
        padding-bottom: 44.69%;
        /* ratio 16x9 */
        height: 0;
        overflow: hidden;
        width: 100%;
        height: auto;
    }

    .embed-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .row {
        display: flex;
        align-items : center;
        
    }

    .col {
        padding: 5px;
        margin: 5px;
        height: inherit;
  
    }

    a{
        color: white;
        text-decoration: none;
    }

</style>




<body>
    <header>
        <div class="row" style="justify-content : space-between; width: 100%;">
            <div class="row" style="justify-content : flex-start; margin-left: 30px;">
                <div class="col"><h1>KulowCup</h1></div>
            </div>
            <div class="row" style="justify-content: flex-end;  margin-right: 30px;"> 
                <div class="col"><a target="body" href="html/spieluebersicht.php"><h3>Übersicht</h3> </a> </div>
                <div class="col"><a target="body" href="html/Tippen.php"><h3>Tippen</h3></a> </div>
                <div class="col"><a target="body" href="html/Ranking.php"><h3>Ranking</h3></a> </div>
                <div class="col"><a target="body" href="html/logout.php"> <h3>
                <?php

                if($_SESSION['KC']['login']  !== 'ok'){
                    echo 'Login'; 
                } else{
                    echo 'Logut';   
                }
                ?></h3></a></div>
                
            </div> 

        </div>
    </header>
    <main>
        <div class="embed-container">
            <iframe name="body"  width="100%" src="html/login.php"> </iframe>
        </div>

    </main>
    <footer>
    <p>&copy; Moritz Kockert </p>
    </footer>

</body>

</html>