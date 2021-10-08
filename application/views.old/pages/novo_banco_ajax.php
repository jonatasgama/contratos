<form class="col-10 offset-1">

<fieldset class="form-group">

<legend>Cadastrar Banco</legend>

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="banco_cliente">Banco</label>
      <input type="text" class="form-control" id="banco_cliente" name="banco_cliente">
    </div>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Banco</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($banco as $ban){ ;?>
			<tr>
				<td><?=$ban->id;?></td>
				<td><?=$ban->banco_cliente;?></td>
			</tr>
		<?php } ;?>
		</tbody>
	</table>

</fieldset>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<script type="text/javascript">
    $('form').submit(function(e) {
        e.preventDefault();


       var banco_cliente = $("input[name='banco_cliente']").val();
		console.log(banco_cliente);
        $.ajax({
           url: "<?=base_url('financeiro/cadastrarBancoAjax');?>",
           type: 'POST',
           data: {banco_cliente: banco_cliente},
           error: function() {
              alert('Houve alguma falha, não foi possível cadastrar.');
           },
           success: function(data) {
                $("tbody").append("<tr><td>"+banco_cliente+"</td></tr>");
                alert("Banco adicionado com sucesso.");  
				console.log(data);
           }
        });


    });


</script>