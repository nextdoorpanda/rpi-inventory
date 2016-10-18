<div id="autocomplete_form" class="clearfix">
	<h2>Rechercher un produit</h2>
	<div class="clearfix">
		{!! Form::open(array('class' => 'col-md-8 form-horizontal', 'url' => 'listes-courses/addProducts')) !!}
		<div class="form-group">
			{!! Form::label('produits', 'Saisir des premières lettres du produit', array('class' => 'col-md-6 control-label')) !!}
			<div class="col-md-6">
				{!! Form::text('produit', '', array('id' => 'autocomplete', 'class' => 'form-control text-keyboard')) !!}
			</div>
		</div>
		{!! Form::close() !!}
		<div id="no-result" class="col-sm-3"></div>
	</div>
</div>

<script type="text/javascript">
    $(function() {
        $("#autocomplete").autocomplete({
            source: "getdata",
            minLength: 3,
            select: function( event, ui ) {
				$.ajax({
					type: "POST",
					url: baseURL+"/listes-courses/addProducts",
					async: true,
					data: {
						produits: [ui.item.id],
						ajaxCall: true
					},
					success: function(data) {
						if (typeof(data) == 'object' && typeof(data.status) == 'boolean') {
							$('#liste-courses-products').html(data.html);
						} else {
							alert('Erreur retour: ');
						}
					}
				})
            }
        });
    });
</script>
