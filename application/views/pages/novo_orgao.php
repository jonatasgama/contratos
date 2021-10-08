<form class="col-10 offset-1 aparicao" method="post" action="<?=base_url("financeiro/cadastrarorgao");?>">

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

<legend>Cadastrar Órgão</legend>

  <div class="form-row">
    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="orgao" name="orgao" required>
	  
    </div>
	<div>
		<button type="submit" class="btn btn-primary">Cadastrar</button>	
	</div>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Órgão</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($orgao as $org){ ;?>
			<tr>
				<td><?=$org->id;?></td>
				<td><?=$org->orgao;?></td>
				<td><button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                data-target="#atualizaOrgao" onclick="buscaOrgao('<?=$org->id;?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
				<button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                data-target="#excluiOrgao" onclick="excluiOrgao('<?=$org->id;?>')"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button></td>				
			</tr>
		<?php } ;?>
		</tbody>
	</table>

</fieldset>
</form>

  <!--Modal atualiza-->
  <div class="modal fade" id="atualizaOrgao" tabindex="-1" role="dialog" aria-labelledby="atualizaOrgao" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/atualizaOrgao");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="atualizaOrgao">Atualizar Órgao</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
			  <label for="promotora">Órgão</label>
			  <input type="text" class="form-control" id="atualiza_orgao" name="atualiza_orgao">	
			  <input type="hidden" id="id_orgao" name="id_orgao">
			</div>
			<div class="modal-footer">
			<button class="btn btn-primary">Atualizar</a>
			</div>
		</form>
      </div>
    </div>
  </div>


  <!--Modal exclui-->
  <div class="modal fade" id="excluiOrgao" tabindex="-1" role="dialog" aria-labelledby="excluiOrgao" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/excluiOrgao");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="excluiOrgao">Excluir Órgao</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
				<p>Deseja realmente excluir o órgão <b><span id="exclui_orgao"></span></b>?</p>
			</div>
			<div class="modal-footer">
			<input type="hidden" id="id_exclui_orgao" name="id_exclui_orgao">
			<button type="submit" class="btn btn-primary">Sim</button>
			<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
      </div>
    </div>
  </div>
  
    <script>
	function buscaOrgao(id){
		$.getJSON("<?=base_url('financeiro/buscaOrgao/');?>"+id, function(data){
			document.getElementById('atualiza_orgao').value = data[0].orgao;
			document.getElementById('id_orgao').value = data[0].id;
		})
	}
	
	function excluiOrgao(id){
		$.getJSON("<?=base_url('financeiro/buscaOrgao/');?>"+id, function(data){
			document.getElementById('exclui_orgao').innerHTML = data[0].orgao;
			document.getElementById('id_exclui_orgao').value = data[0].id;
			
		})
	}
  </script>