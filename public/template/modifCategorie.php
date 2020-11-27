<div class="modal fade" id="modalModifCat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier le produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="../controllers/Modifier.php" method="post" >
                        <div class="modal-body">
                            <input type="hidden" name="CMid" id="CMid" value="">
                            <div class="form-group ">
                                <label for="CMlibelle">Libelle</label>
                                <input class="form-control" type="text" id="CMlibelle" name="CMlibelle">
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
