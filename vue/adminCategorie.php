<?php  
    include_once('../models/ConnexionBdd.php');
    include_once('../models/CategorieManager.php');
    include_once('../public/template/addCategorie.php');
    include_once('../public/template/deleteCategorie.php');
    include_once('../public/template/modifCategorie.php');

    $categories = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Cat_man = new CategorieManager();

    $categories = $Cat_man->listeCategorie();
    $tailleCategories = sizeof($categories);

?>


<div class="table-responsive-sm m-2 mt-5">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Categorie</th>
            <th scope="col">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalAddCat">
                    <i class="fas fa-plus"></i></th>
                </button>
            </th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i=0; $i < $tailleCategories; $i++) { 
            ?>
                <tr>
                <th scope="row"><?php echo $categories[$i]->getId() ?></th>
                <td><?php echo $categories[$i]->getLibelle() ?></td>
                <td>
                    <button type="button" class=" open-modif-cat btn btn-light" data-toggle="modal" data-id = "<?php echo $categories[$i]->getId()?>" 
                        data-libelle = "<?php echo $categories[$i]->getLibelle() ?>" data-target="#modalModifCat">
                            <i class="fas fa-pencil-alt"></i>
                    </button>
                    
                    <button type="button" class=" open-delete-cat btn btn-light" data-toggle="modal" data-id = "<?php echo $categories[$i]->getId()?>" 
                    data-target="#modalDeleteCat">
                        <i class="far fa-times-circle"></i>
                    </button>
                </td>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
    <script> 
        $(document).ready(function() { 
            $(".open-modif-cat").click(function() { 
                $("#modalModifCat").find("#CMid").val($(this).attr('data-id'));
                $("#modalModifCat").find("#CMlibelle").val($(this).attr('data-libelle'));
               
                $("#modalModifCat").modal("show"); 
                
            }); 

            $(".open-delete-cat").click(function() { 
                $("#modalDeleteCat").find("#CDid").val($(this).attr('data-id'));        
                $("#modalDeleteCat").modal("show"); 
                
            }); 
        }); 
    </script> 
</div>