<form class="col-10 offset-1" method="post" action="<?=base_url("financeiro/cadastrartipo");?>">

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

<legend>Cadastrar Tipo</legend>

  <div class="form-row">
    <div class="form-group col-md-10">
		<input type="text" class="form-control" id="tipo" name="tipo" required>
    </div>
	<div>
		<button type="submit" class="btn btn-primary">Cadastrar</button>	
	</div>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Tipo</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($tipo as $t){ ;?>
			<tr>
				<td><?=$t->id;?></td>
				<td><?=$t->tipo;?></td>
				<td><button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                data-target="#atualizaTipo" onclick="buscaTipo('<?=$t->id;?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
				<button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                data-target="#excluiTipo" onclick="excluiTipo('<?=$t->id;?>')"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button></td>					
			</tr>
		<?php } ;?>
		</tbody>
	</table>

</fieldset>

</form>

  <!--Modal atualiza-->
  <div class="modal fade" id="atualizaTipo" tabindex="-1" role="dialog" aria-labelledby="atualizaTipo" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/atualizaTipo");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="atualizaTipo">Atualizar Tipo</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
			  <label for="atualiza_tipo">Tipo de Contrato</label>
			  <input type="text" class="form-control" id="atualiza_tipo" name="atualiza_tipo">	
			  <input type="hidden" id="id_tipo" name="id_tipo">
			</div>
			<div class="modal-footer">
			<button class="btn btn-primary">Atualizar</a>
			</div>
		</form>
      </div>
    </div>
  </div>


  <!--Modal exclui-->
  <div class="modal fade" id="excluiTipo" tabindex="-1" role="dialog" aria-labelledby="excluiTipo" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/excluiTipo");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="excluiTipo">Excluir tipo</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
				<p>Deseja realmente excluir o tipo <b><span id="exclui_tipo"></span></b>?</p>
			</div>
			<div class="modal-footer">
			<input type="hidden" id="id_exclui_tipo" name="id_exclui_tipo">
			<button type="submit" class="btn btn-primary">Sim</button>
			<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
      </div>
    </div>
  </div>
  
    <script>
	function buscaTipo(id){
		$.getJSON("<?=base_url('financeiro/buscaTipo/');?>"+id, function(data){
			document.getElementById('atualiza_tipo').value = data[0].tipo;
			document.getElementById('id_tipo').value = data[0].id;
		})
	}
	
	function excluiTipo(id){
		$.getJSON("<?=base_url('financeiro/buscaTipo/');?>"+id, function(data){
			document.getElementById('exclui_tipo').innerHTML = data[0].tipo;
			document.getElementById('id_exclui_tipo').value = data[0].id;
			
		})
	}
  </script>