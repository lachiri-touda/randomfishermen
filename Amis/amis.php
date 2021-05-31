<?php 
session_start();

/*Checks that the user is connected*/
if($_SESSION["autoriser"]!="oui"){
    header("location:login.php");
    exit();
}
if (!isset($_COOKIE["id"])){
    header("location:login.php");
}

/*Connect to the database*/
$link = mysqli_connect("127.0.0.1", "admin", "it103", "it103");
mysqli_set_charset($link, "utf8");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/*Dealing with the id*/
if (isset($_SESSION['id'])){
    $id=$_SESSION['id'];
}

else{
    $log=$_SESSION["login"];
    $user = mysqli_query($link,"SELECT `ID` FROM `UTILISATEURS` WHERE `Pseudo`='$log'");
    
    while($id_temp = mysqli_fetch_row($user)){
        $id=$id_temp[0];
    }
}


/*Checks the page number*/
if (isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}

/*Get the friends*/
if($result = mysqli_query($link, "SELECT `ID_AMI`,`Prenom` FROM `AMIS`,`UTILISATEURS` WHERE `ID_USER`=$id AND `ID_AMI`=`ID`")){
    $num=mysqli_num_rows($result);
}
else{
    $num=0;
}

/* Is there a friend to display ?*/
if (isset ($_GET['idfr'])){
    $_SESSION['idfr']=$_GET['idfr'];
    $idfr=$_GET['idfr'];
}
elseif (isset($_SESSION['idfr'])){
    $idfr=$_SESSION['idfr'];
}


/*Do all transactions have to be displayed ?*/
if (isset($_GET['transac_fr'])){
    $transac_fr = $_GET['transac_fr'];
}
else{
    $transac_fr = 1; /*only the current transactions ahve to be displayed (else =2)*/
}

/*Others*/
$fpp=10; /*friends per page*/
$first = ($page-1)*$fpp; /*First friend shown */
$last = min($num,$page*$fpp); /*last friend shown */
?>

<!doctype html>
<html>
<head>
    <!--Basic metas-->
    <meta charset="utf-8">
    <title>Debster</title>
    
    <!--CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!--Tests-->

</head>
<body>

<?php include("header_friends.php");//navigation header?>

    <div class='container-fluid'> <!--The core of the page-->
        <div class="row">
            <!--The friends' list-->
            <?php include("list_friends.php");?>

            <!--The selected friend details including the transactions in common-->
            <?php include("detail_friends.php");?>

        </div>
    </div>

</body>