<form class="col-10 offset-1 aparicao" method="post" action="<?=base_url("financeiro/cadastrarbanco");?>">

<?php
	if($this->session->flashdata('msg-erro')){ ?>
		<div class="mt-2 alert alert-danger alert-dismissible fade show text-center">
			<?=$this->session->flashdata('msg-erro');?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>			
		</div>
<?php } ;?>

<?php
	if($this->session->flashdata('msg-sucesso')){ ?>
		<div class="mt-2 alert alert-success alert-dismissible fade show text-center">
			<?=$this->session->flashdata('msg-sucesso');?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>			
		</div>
<?php } ; ?>

<fieldset class="form-group">

<legend>Cadastrar Banco</legend>

  <div class="form-row">
    <div class="form-group col-md-10">
		<input type="text" class="form-control" id="banco_cliente" name="banco_cliente" required>
    </div>
	<div>
		<button type="submit" class="btn btn-primary">Cadastrar</button>	
	</div>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Banco</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($banco as $ban){ ;?>
			<tr>
				<td><?=$ban->id;?></td>
				<td><?=$ban->banco_cliente;?></td>
				<td><button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                data-target="#atualizaBanco" onclick="buscaBanco('<?=$ban->id;?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
				<button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                data-target="#excluiBanco" onclick="excluiBanco('<?=$ban->id;?>')"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button></td>				
			</tr>
		<?php } ;?>
		</tbody>
	</table>

</fieldset>

</form>

  <!--Modal atualiza-->
  <div class="modal fade" id="atualizaBanco" tabindex="-1" role="dialog" aria-labelledby="atualizaBanco" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/atualizaBanco");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="atualizaBanco">Atualizar Banco</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
			  <label for="atualiza_banco">Banco</label>
			  <input type="text" class="form-control" id="atualiza_banco" name="atualiza_banco">	
			  <input type="hidden" id="id_banco" name="id_banco">
			</div>
			<div class="modal-footer">
			<button class="btn btn-primary">Atualizar</a>
			</div>
		</form>
      </div>
    </div>
  </div>


  <!--Modal exclui-->
  <div class="modal fade" id="excluiBanco" tabindex="-1" role="dialog" aria-labelledby="excluiBanco" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/excluiBanco");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="excluiBanco">Excluir Banco</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
				<p>Deseja realmente excluir o banco <b><span id="exclui_banco"></span></b>?</p>
			</div>
			<div class="modal-footer">
			<input type="hidden" id="id_exclui_banco" name="id_exclui_banco">
			<button type="submit" class="btn btn-primary">Sim</button>
			<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
      </div>
    </div>
  </div>
  
    <script>
	function buscaBanco(id){
		$.getJSON("<?=base_url('financeiro/buscaBanco/');?>"+id, function(data){
			document.getElementById('atualiza_banco').value = data[0].banco_cliente;
			document.getElementById('id_banco').value = data[0].id;
		})
	}
	
	function excluiBanco(id){
		$.getJSON("<?=base_url('financeiro/buscaBanco/');?>"+id, function(data){
			document.getElementById('exclui_banco').innerHTML = data[0].banco_cliente;
			document.getElementById('id_exclui_banco').value = data[0].id;
			
		})
	}
  </script>