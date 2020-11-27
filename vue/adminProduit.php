<?php  
    include_once('../public/template/session.php');
    include_once('../models/ConnexionBdd.php');
    include_once('../models/CategorieManager.php');
    include_once('../models/Categorie.php');
    include_once('../models/ArticleManager.php');
    include_once('../public/template/deleteProduit.php');
    include_once('../public/template/addProduit.php');
    include_once('../public/template/modifProduit.php');
    include_once('../public/template/addPromo.php');
    include_once('../public/template/deletePromo.php');
    include_once('../public/template/modifPromo.php');

    $article = [];
    $articlePromo = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Cat_man = new CategorieManager();
    $Art_man = new articleManager();
    $article = $Art_man->getList('%');
    $articlePromo=$Art_man->getPromotionCategorie('%');
    $tailleArticle = sizeof($article);
    $categories=[];
    $categories = $Cat_man->listeCategorie();

?>

<div class="table-responsive-sm m-2 mt-5">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Référence</th>
            <th scope="col">Libellé</th>
            <th scope="col">Prix Unitaire</th>
            <th scope="col">Description</th>
            <th scope="col">Quantité</th>
            <th scope="col">Categorie</th>
            <th scope="col">Image</th>
            <th scope="col">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalAddProduit">
                    <i class="fas fa-plus"></i></th>
                </button>
            <th scope="col">Promotion</th>
            <th scope="col">Date fin promotion</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $y = 0;
                for ($i=0; $i < $tailleArticle; $i++) { 
            ?>
                <tr>
                <th scope="row"><?php echo $article[$i]->getId() ?></th>
                <td><?php echo $article[$i]->getReference() ?></td>
                <td><?php echo $article[$i]->getLibelle() ?></td>
                <td><?php echo $article[$i]->getPrix() ?> €</td>
                <td><?php echo $article[$i]->getDescription() ?></td>
                <td><?php echo $article[$i]->getQuantite() ?></td>
                <td><?php echo $article[$i]->getCategorie() ?></td>
                <td><img src="<?php echo $article[$i]->getImage() ?>"></td>
                <td>
                    <button type="button" class="open-modif-modal btn btn-light" data-toggle="modal" data-id = "<?php echo $article[$i]->getId() ?>" 
                    data-reference = "<?php echo $article[$i]->getReference() ?>" data-libelle = "<?php echo $article[$i]->getLibelle() ?>" 
                    data-prix = "<?php echo $article[$i]->getPrix() ?>" data-description = "<?php echo $article[$i]->getDescription() ?>" 
                    data-quantite = "<?php echo $article[$i]->getQuantite() ?>" data-categorie = "<?php echo $article[$i]->getCategorie() ?>" 
                     data-target="#modalModifProduit">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button type="button" class=" open-delete-modal btn btn-light" data-toggle="modal" data-id = "<?php echo $article[$i]->getId()?>" 
                    data-target="#modalDeleteProduit">
                        <i class="far fa-times-circle"></i>
                    </button>
                </td>
                <?php 
                    if($article[$i]->getId() == $articlePromo[$y]->getId()){ ?>
                    <td><?php echo $articlePromo[$y]->getPourcentage() ?> %</td>
                    <td><?php echo $articlePromo[$y]->getDateFin() ?></td>
                    <td>
                        <button type="button" class="open-delete-promo btn btn-dark" data-toggle="modal" data-id_produit="<?php echo $articlePromo[$y]->getId() ?>" 
                        data-id_promo = "<?php echo $articlePromo[$y]->getPromotion() ?>" data-target="#modalDeletePromo">
                            <i class="fas fa-trash"></i>
                        </button>
                    
                        <button type="button" class="open-modif-promo btn btn-dark" data-toggle="modal" data-id = "<?php echo $articlePromo[$y]->getPromotion() ?>"
                        data-pourcentage = "<?php echo $articlePromo[$y]->getPourcentage() ?>" data-date = "<?php echo $articlePromo[$y]->getDateFin() ?>" 
                        data-target="#modalModifPromo">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                <?php $y++;
                    }
                    else{
                ?>
                    <td>-</td>
                    <td>-</td>
                    <td>
                        <button type="button" class="open-add-promo btn btn-dark" data-toggle="modal" data-id_produit = "<?php echo $article[$i]->getId() ?>" 
                        data-libelle = "<?php echo $article[$i]->getLibelle() ?>" data-target="#modalAddPromo">
                            <i class="fas fa-percentage"></i>
                        </button>
                    </td>
                <?php
                    }
                ?>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <script> 
        $(document).ready(function() { 
            $(".open-modif-modal").click(function() { 
                $("#modalModifProduit").find("#Iid").val($(this).attr('data-id'));
                $("#modalModifProduit").find("#Ireference").val($(this).attr('data-reference')); 
                $("#modalModifProduit").find("#Ilibelle").val($(this).attr('data-libelle'));
                $("#modalModifProduit").find("#Iprix").val($(this).attr('data-prix'));
                $("#modalModifProduit").find("#Idescription").val($(this).attr('data-description'));
                $("#modalModifProduit").find("#Iquantite").val($(this).attr('data-quantite'));
                $("#modalModifProduit").find("#Icategorie").text($(this).attr('data-categorie'));
               
                $("#modalModifProduit").modal("show"); 
                
            }); 

            $(".open-delete-modal").click(function() { 
                $("#modalDeleteProduit").find("#id_produit").val($(this).attr('data-id'));        
                $("#modalDeleteProduit").modal("show"); 
                
            });

            $(".open-modif-promo").click(function() { 
                $("#modalModifPromo").find("#PMid_promo").val($(this).attr('data-id'));
                $("#modalModifPromo").find("#PMpourcentage").val($(this).attr('data-pourcentage')); 
                $("#modalModifPromo").find("#PMdate").val($(this).attr('data-date'));
               
                $("#modalModifPromo").modal("show"); 
                
            }); 

            $(".open-delete-promo").click(function() { 
                $("#modalDeletePromo").find("#PDid_produit").val($(this).attr('data-id_produit'));
                $("#modalDeletePromo").find("#PDid_promo").val($(this).attr('data-id_promo'));         
                $("#modalDeletePromo").modal("show"); 
                
            });

            $(".open-add-promo").click(function() { 
                $("#modalAddPromo").find("#PAid_produit").val($(this).attr('data-id_produit'));
                $("#modalAddPromo").find("#PAproduit").text($(this).attr('data-libelle'));        
                $("#modalAddPromo").modal("show"); 
                
            });

        }); 
</script> 
</div>