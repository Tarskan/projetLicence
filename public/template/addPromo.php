<div class="modal fade" id="modalAddPromo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une promotion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="../controllers/Ajouter.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <h3 id="PAproduit"></h3>
                        <input type="hidden" name="PAid_produit" id="PAid_produit" value="">
                        <div class="form-group">
                            <label for="pourcentage">Pourcentage</label>
                            <input class="form-control" type="text" id="PApourcentage" name="PApourcentage" >
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input class="form-control" type="date" id="PAdate" name="PAdate">
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