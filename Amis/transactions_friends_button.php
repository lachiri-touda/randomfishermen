<div class="row">
    <div class="col">
        <div class="btn-group btn-block" role="group" aria-label="Basic example">
            <a type="button" class="btn btn-outline-dark <?php if ($transac_fr==1){echo "active";}?>"href="amis.php?transac_fr=1">Transactions en cours</a>
            <a type="button" class="btn btn-outline-dark <?php if ($transac_fr==2){echo "active";}?>" href="amis.php?transac_fr=2">Historique</a>
        </div>
    </div>
</div>