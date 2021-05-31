
<?php include("header_transactions.php"); ?>

<body>  
<?php include("navbar.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php //include("navbar.php"); ?>
            </div>
        </div>
        
        <br />

        <div class="row">
            <div class="col">
                <?php include("creation_simple.php"); ?>
            </div>
    
            <div class="col">
                <?php include("creation_groupe.php"); ?>
            </div>
        </div>
        
        <br />
        <br />
        
        <div class="row">
            <div class="col">
                <h1 class="display-6 text-center">Mes Transactions</h1>
            </div>
        </div>
        
        <br />

        <div class="row">
            <div class="col">
                <?php include("table_transactions.php"); ?>     
            </div>
        </div>
    </div>    
</body>