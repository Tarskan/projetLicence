<?php
    
?>

<div class="modal fade" id="modalModifProduit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier le produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../controllers/adminModifier.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="Mid" id="Iid" value="">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Ireference">Reference</label>
                            <input class="form-control" type="text" id="Ireference" name="Mreference" value="">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="Ilibelle">Libelle</label>
                            <input class="form-control" type="text" id="Ilibelle" name="Mlibelle" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Iprix">Prix Unitaire</label>
                            <input class="form-control" type="text" id="Iprix" name="Mprix" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Idescription">Description</label>
                        <textarea class="form-control" id="Idescription" rows="3" name="Mdescription"></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="Iquantite">Quantité</label>
                            <input class="form-control" type="text" id="Iquantite" name="Mquantite" value="">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="Icategorie">Categorie</label>
                        <select class="form-control" id="Icategorie" name="Mcategorie">
                            <?php
                                include_once('../models/CategorieManager.php');
                                $categories=[];
                                $Cat_man = new CategorieManager();
                                $categories = $Cat_man->listeCategorie(); 
                                $tailleCategories = sizeof($categories);
                                for ($i=0; $i < $tailleCategories; $i++) { 
                                    echo '<option value="'.$categories[$i]->getId().'">'.$categories[$i]->getLibelle() . '</option> ';
                                }
                                ?>
                        </select>
                        </div>
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