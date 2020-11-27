<?php
    include_once('../models/ClientManager.php');
    $Ucategories=[];
    $Ucat_man = new clientManager();
    $Ucategories = $Ucat_man->listeUCategorie();
    $tailleCategories = sizeof($Ucategories);
?>

<div class="modal fade" id="modalUpUt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upgrade l'utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="../controllers/Modifier.php" method="post" >
                        <div class="modal-body">
                            <input type="hidden" name="UMid" id="UMid" value="">
                            <div class="form-group ">
                                <label for="UMcategorie">Categorie</label>
                                <select class="form-control" id="UMcategorie" name="UMcategorie">
                                    <?php 
                                        for ($i=0; $i < $tailleCategories; $i++) { 
                                            echo '<option value="'.$Ucategories[$i]->getId().'">'.$Ucategories[$i]->getLibelle() . '</option> ';
                                        }
                                     ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                            <button type="submit" class="btn btn-primary">Oui </button>
                        </div>
                    </form>
            </div>
    </div>
</div> 