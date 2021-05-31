<div class="col sm-6 p-4"> 
    <div class="row"> <!--Here you click to see more informations about one of your friends-->
        <div class="col">
            <ul class="list-group">
                <?php
                    $count = 1;
                    while($ami=mysqli_fetch_row($result)){
                        if(($first<=$count)&&($count<=$last)){ //To change with the new session system
                            echo '<a href="';
                            echo "amis.php"; /*main script's name*/
                            echo "?idfr=$ami[0]";
                            echo '" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">';
                            echo $ami[1];
                            /*<span class="badge badge-primary badge-pill">3</span>*/
                            echo '</a>';
                        }
                        $count++;
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="row m-2"> <!--Here you click to change the page in the list of friends (if you have more than $fpp friends)-->
        <div class="col">
            <?php
                for($i=1; $i<=($num/$fpp+1);$i++){
                    echo "page   ";
                    if ($i==$page){
                        echo "<button type=\"button\" href=\"#\" class=\"btn btn-secondary active\">$i </button>"; 
                    }
                    else{
                        echo "<button type=\"button\" href=\"amis.php?page=$i\" class=\"btn btn-secondary\">$i</button>"; //to change, maybe with a session management
                    }
                }
            ?>
        </div>
    </div>
    <div class="row"> <!--Here you add a friend-->
        <div class="col p-3">
            <?php
            echo "<a type=\"button\" href=\"amis.php?idfr=0\" class=\"btn btn-primary btn-lg btn-block\" role=\"button\">Ajouter un ami</a>"; 
            ?>
        </div>
    </div>
</div>