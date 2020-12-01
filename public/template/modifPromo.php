<div class="modal fade" id="modalModifPromo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier une promotion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <form action="../controllers/adminModifier.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="PMid_promo" id="PMid_promo" value="">
                        <div class="form-group">
                            <label for="pourcentage">Pourcentage</label>
                            <input class="form-control" type="text" id="PMpourcentage" name="PMpourcentage" >
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input class="form-control" type="date" id="PMdate" name="PMdate">
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