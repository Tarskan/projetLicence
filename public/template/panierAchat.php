<div class="modal fade" id="panierAchat" tabindex="-1" role="dialog" aria-labelledby="panierAchat" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="card">
                <article class="card-body">
                    <h4 class="card-title text-center mb-4 mt-1">Panier d'achat</h4>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Nom du produit</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody id="affichagePanier">
                            <?php
                                if(!empty($_SESSION['panier']['id_prod'])){
                                    for ($i = 0; $i < count($_SESSION['panier']['id_prod']); $i ++) {
                                        $articleDisplay[$i] = $Art_man->getInfo($_SESSION['panier']['id_prod'][$i]);
                                    }
                                    if (isset($_SESSION['panier'])) {
                                        for ($i = 0; $i < count($_SESSION['panier']['id_prod']); $i ++) {
                                            $articleDisplay[$i] = $Art_man->getInfo($_SESSION['panier']['id_prod'][$i]);
                                            echo "<tr>";
                                            echo "<th scope='row'>" . $i . "</th>";
                                            echo "<td>" . $articleDisplay[$i][0]->getLibelle() . "</td>";
                                            echo "<td>" . $_SESSION['panier']['quantite'][$i] . "</td>";
                                            echo "<td>" . $_SESSION['panier']['quantite'][$i]*$_SESSION['panier']['prix'][$i] . " €</td>";
                                            echo "</tr>";
                                        }
                                    }
                                };
                            ?>
                        </tbody>
                    </table>
                </article>
                <?php
                   if(empty($_SESSION['panier']['id_prod'])){
                    echo "<div id='AVIDER' class='text-center'>";
                    echo "<p>Panier Vide</p>";
                    echo "</div>";
                    } 
                ?>
                <div class="text-center">
                    <table class="table">
                    <tr>
                        <td>Montant Total : <span id="totalPrixAchat"><?php echo $panier->montantTotal()?></span>€ </td>
                        <td>Article Total : <span id="totalCaddie2"><?php echo $panier->nbArticles()?></span> </td>
                    </table>
                </div>   
                <a href="#" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Payer</a>
        </div>
    </div>
</div>