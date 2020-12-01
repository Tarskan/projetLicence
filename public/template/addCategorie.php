<div class="modal fade" id="modalAddCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une categorie</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="../controllers/adminAjouter.php" method="post">
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="libelle">Nom categorie</label>
                                <input class="form-control" type="text" id="libelle" name="CAlibelle" >
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