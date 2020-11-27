<?php
    include_once('../models/ConnexionBdd.php');
    include_once('../models/conseilManager.php');
    include_once('../public/template/addConseil.php');
    include_once('../public/template/deleteConseil.php');
    include_once('../public/template/modifConseil.php');

    $conseils = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Conseil_man = new conseilManager();
    $conseils = $Conseil_man->listeConseils();
    $tailleConseil = sizeof($conseils);

?>

<div class="table-responsive-sm m-2 mt-5">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Libelle</th>
            <th scope="col">Video</th>
            <th scope="col">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modalAddCons">
                    <i class="fas fa-plus"></i></th>
                </button>
            </th>
            </tr>
        </thead>
        <tbody>
        <?php
            for ($i=0; $i < $tailleConseil; $i++) { 
        ?>
            <tr>
            <th scope="row"><?php echo $conseils[$i]->getId() ?></th>
            <td><?php echo $conseils[$i]->getTitre() ?></td>
            <td><?php echo $conseils[$i]->getLibelle() ?></td>
            <td><iframe width="560" height="315" src="<?php echo $conseils[$i]->getVideo()?>" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="align-self-start mr-3"></iframe></td>
            <td>
                    <button type="button" class=" open-modif-cons btn btn-light" data-toggle="modal" data-id = "<?php echo $conseils[$i]->getId()?>" 
                        data-titre = "<?php echo $conseils[$i]->getTitre() ?>" data-libelle = "<?php echo $conseils[$i]->getLibelle() ?>" data-video = "<?php echo $conseils[$i]->getVideo()?>"
                        data-target="#modalModifCons">
                            <i class="fas fa-pencil-alt"></i>
                    </button>
                    
                    <button type="button" class=" open-delete-cons btn btn-light" data-toggle="modal" data-id = "<?php echo $conseils[$i]->getId()?>" 
                    data-target="#modalDeleteCons">
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
            $(".open-modif-cons").click(function() { 
                $("#modalModifCons").find("#id").val($(this).attr('data-id'));
                $("#modalModifCons").find("#titre").val($(this).attr('data-titre')); 
                $("#modalModifCons").find("#libelle").val($(this).attr('data-libelle'));
                $("#modalModifCons").find("#video").val($(this).attr('data-video'));
               
                $("#modalModifCons").modal("show"); 
                
            }); 

            $(".open-delete-cons").click(function() { 
                $("#modalDeleteCons").find("#id").val($(this).attr('data-id'));        
                $("#modalDeleteCons").modal("show"); 
                
            }); 
        }); 
    </script> 
</div>