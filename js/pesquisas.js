$(function parametros(){
		$('input').change(function(){
			var  prontuario=$('input[name="prontuario"]:checked').val()
				,nome=$('input[name="nome"]:checked').val()
				,pesquisar=$('button[type="pesquisar"]')
			if (car)
				$('#car').addClass('selected')
			else
				$('#car').removeClass('selected')
								
		}).eq(0).trigger('change')
	})