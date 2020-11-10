<footer class="page-footer font-small pt-4">
	<div class="container-fluid bg-dark text-center text-white p-3">
   		<div class="row">
      		<div class="col">
         		<a href="">A propos</a> . 
         		<a href="">Vie privée</a> . 
         		<a href="">Condition d'utilisation</a>
      		</div>
   		</div>
   		<div class="row">
   			<div class="col">
   				<i class="far fa-copyright"></i> 2020 ******, Inc. All rights reserved.
   			</div>
   		</div>
	</div>	
</footer>

<script src="../public/js/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../public/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script>
	$(document).ready(function() {
		$("#searchBar").keyup(function() {
			var query = $("#searchBar").val();
			$.ajax({
				url:'../models/suggestionProduit.php',
				method:'POST',
				data: {query: query},
				dataType : 'JSON',
				success: function(data) {
					console.log(data);
					$( "#searchBar" ).autocomplete({
						source: data
					});
				},
			});
		});
	});

  </script>