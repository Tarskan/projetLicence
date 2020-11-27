<?php
    include_once('../models/ConnexionBdd.php');
    include_once('../models/ClientManager.php');
    include_once('../public/template/upUtilisateur.php');

    $clients = [];
    $DBase = new Connect();
    $db = $DBase->connexion();
    $Cli_man = new clientManager();

    $clients = $Cli_man->listClient();
    $tailleClient = sizeof($clients);

?>

<div class="table-responsive-sm m-2 mt-5">
    <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Email</th>
            <th scope="col">Adresse</th>
            <th scope="col">Code Postal</th>
            <th scope="col">Ville</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Catégorie</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php
                for ($i=0; $i < $tailleClient; $i++) { 
            ?>
            <tr>
            <th scope="row"><?php echo $clients[$i]->getId()?></th>
            <td><?php echo $clients[$i]->getNom()?></td>
            <td><?php echo $clients[$i]->getPrenom()?></td>
            <td><?php echo $clients[$i]->getEmail()?></td>
            <td><?php echo $clients[$i]->getAdresse()?></td>
            <td><?php echo $clients[$i]->getCp()?></td>
            <td><?php echo $clients[$i]->getVille()?></td>
            <td><?php echo $clients[$i]->getTel()?></td>
            <td><?php echo $clients[$i]->getCategorie()?></td>
            <td>
                <button type="button" class=" open-up-Ut btn btn-light" data-toggle="modal" data-id = "<?php echo $clients[$i]->getId()?>" 
                            data-id-cat = "<?php echo $clients[$i]->getId_cat() ?>" data-target="#modalUpUt">
                    <i class="fas fa-arrow-up"></i>
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
            $(".open-up-Ut").click(function() { 
                $("#modalUpUt").find("#UMid").val($(this).attr('data-id'));
                $("#modalUpUt").find("#UMcategorie").val($(this).attr('data-id-cat')); 
               
                $("#modalUpUt").modal("show"); 
                
            }); 
        }); 
    </script> 
</div>