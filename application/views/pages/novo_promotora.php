<form class="col-10 offset-1 aparicao" method="post" action="<?=base_url("financeiro/cadastrarpromotora");?>">

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

<legend>Cadastrar Promotora</legend>

  <div class="form-row">
    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="promotora" name="promotora" required>
	  
    </div>
	<div>
		<button type="submit" class="btn btn-primary">Cadastrar</button>	
	</div>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Promotora</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($promotora as $pro){ ;?>
			<tr>
				<td><?=$pro->id;?></td>
				<td><?=$pro->promotora;?></td>
				<td><button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                data-target="#atualizaPromotora" onclick="buscaPromotora('<?=$pro->id;?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
				<button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                data-target="#excluiPromotora" onclick="excluiPromotora('<?=$pro->id;?>')"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button></td>				
			</tr>
		<?php } ;?>
		</tbody>
	</table>

</fieldset>
</form>

  <!--Modal atualiza-->
  <div class="modal fade" id="atualizaPromotora" tabindex="-1" role="dialog" aria-labelledby="atualizaPromotora" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/atualizaPromotora");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="atualizaPromotora">Atualizar Promotora</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
			  <label for="promotora">Promotora</label>
			  <input type="text" class="form-control" id="atualiza_promotora" name="atualiza_promotora">	
			  <input type="hidden" id="id_promotora" name="id_promotora">
			</div>
			<div class="modal-footer">
			<button class="btn btn-primary">Atualizar</a>
			</div>
		</form>
      </div>
    </div>
  </div>


  <!--Modal exclui-->
  <div class="modal fade" id="excluiPromotora" tabindex="-1" role="dialog" aria-labelledby="excluiPromotora" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/excluiPromotora");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="excluiPromotora">Excluir Promotora</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
				<p>Deseja realmente excluir a promotora <b><span id="exclui_promotora"></span></b>?</p>
			</div>
			<div class="modal-footer">
			<input type="hidden" id="id_exclui_promotora" name="id_exclui_promotora">
			<button type="submit" class="btn btn-primary">Sim</button>
			<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
      </div>
    </div>
  </div>
  
    <script>
	function buscaPromotora(id){
		$.getJSON("<?=base_url('financeiro/buscaPromotora/');?>"+id, function(data){
			document.getElementById('atualiza_promotora').value = data[0].promotora;
			document.getElementById('id_promotora').value = data[0].id;
		})
	}
	
	function excluiPromotora(id){
		$.getJSON("<?=base_url('financeiro/buscaPromotora/');?>"+id, function(data){
			document.getElementById('exclui_promotora').innerHTML = data[0].promotora;
			document.getElementById('id_exclui_promotora').value = data[0].id;
			
		})
	}
  </script>