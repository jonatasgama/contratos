<form class="col-10 offset-1 aparicao" method="post" action="<?=base_url("financeiro/cadastrartipodecontrato");?>">

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

<legend>Cadastrar Tipo de Contrato</legend>

  <div class="form-row">
    <div class="form-group col-md-10">
		<input type="text" class="form-control" id="tipo_contrato" name="tipo_contrato" required>
    </div>
	<div>
		<button type="submit" class="btn btn-primary">Cadastrar</button>	
	</div>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Tipo de Contrato</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($tipoDeContrato as $tipo){ ;?>
			<tr>
				<td><?=$tipo->id;?></td>
				<td><?=$tipo->tipo_contrato;?></td>
				<td><button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                data-target="#atualizaTipoContrato" onclick="buscaTipoContrato('<?=$tipo->id;?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
				<button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                data-target="#excluiTipoDeContrato" onclick="excluiTipoDeContrato('<?=$tipo->id;?>')"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button></td>				
			</tr>
		<?php } ;?>
		</tbody>
	</table>

</fieldset>

</form>

  <!--Modal atualiza-->
  <div class="modal fade" id="atualizaTipoContrato" tabindex="-1" role="dialog" aria-labelledby="atualizaTipoContrato" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/atualizaTipoDeContrato");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="atualizaTipoContrato">Atualizar Tipo de Contrato</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
			  <label for="promotora">Tipo de Contrato</label>
			  <input type="text" class="form-control" id="atualiza_tipo_contrato" name="atualiza_tipo_contrato">	
			  <input type="hidden" id="id_tipo_contrato" name="id_tipo_contrato">
			</div>
			<div class="modal-footer">
			<button class="btn btn-primary">Atualizar</a>
			</div>
		</form>
      </div>
    </div>
  </div>


  <!--Modal exclui-->
  <div class="modal fade" id="excluiTipoDeContrato" tabindex="-1" role="dialog" aria-labelledby="excluiTipoDeContrato" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/excluiTipoDeContrato");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="excluiTipoDeContrato">Excluir tipo de contrato</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
				<p>Deseja realmente excluir o tipo de contrato <b><span id="exclui_tipo_contrato"></span></b>?</p>
			</div>
			<div class="modal-footer">
			<input type="hidden" id="id_exclui_tipo_contrato" name="id_exclui_tipo_contrato">
			<button type="submit" class="btn btn-primary">Sim</button>
			<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
      </div>
    </div>
  </div>
  
    <script>
	function buscaTipoContrato(id){
		$.getJSON("<?=base_url('financeiro/buscaTipoDeContrato/');?>"+id, function(data){
			document.getElementById('atualiza_tipo_contrato').value = data[0].tipo_contrato;
			document.getElementById('id_tipo_contrato').value = data[0].id;
		})
	}
	
	function excluiTipoDeContrato(id){
		$.getJSON("<?=base_url('financeiro/buscaTipoDeContrato/');?>"+id, function(data){
			document.getElementById('exclui_tipo_contrato').innerHTML = data[0].tipo_contrato;
			document.getElementById('id_exclui_tipo_contrato').value = data[0].id;
			
		})
	}
  </script>