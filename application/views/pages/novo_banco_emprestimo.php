<form class="col-10 offset-1 aparicao" method="post" action="<?=base_url("financeiro/cadastrarbancoemprestimo");?>">

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

<legend>Cadastrar Banco Empréstimo</legend>

  <div class="form-row">
    <div class="form-group col-md-10">
      <input type="text" class="form-control" id="banco_emprestimo" name="banco_emprestimo" required>
	  
    </div>
	<div>
		<button type="submit" class="btn btn-primary">Cadastrar</button>	
	</div>
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Banco Empréstimo</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($banco_emprestimo as $ban_emp){ ;?>
			<tr>
				<td><?=$ban_emp->id;?></td>
				<td><?=$ban_emp->banco_emprestimo;?></td>
				<td><button type="button" class="btn btn-sm btn-success" data-toggle="modal"
                data-target="#atualizaBancoEmprestimo" onclick="buscaBancoEmprestimo('<?=$ban_emp->id;?>')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
				<button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                data-target="#excluiBancoEmprestimo" onclick="excluiBancoEmprestimo('<?=$ban_emp->id;?>')"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button></td>				
			</tr>
		<?php } ;?>
		</tbody>
	</table>

</fieldset>
</form>

  <!--Modal atualiza-->
  <div class="modal fade" id="atualizaBancoEmprestimo" tabindex="-1" role="dialog" aria-labelledby="atualizaBancoEmprestimo" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/atualizaBancoEmprestimo");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="atualizaBancoEmprestimo">Atualizar Banco Empréstimo</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
			  <label for="atualiza_banco_emprestimo">Banco Empréstimo</label>
			  <input type="text" class="form-control" id="atualiza_banco_emprestimo" name="atualiza_banco_emprestimo">	
			  <input type="hidden" id="id_banco_emprestimo" name="id_banco_emprestimo">
			</div>
			<div class="modal-footer">
			<button class="btn btn-primary">Atualizar</a>
			</div>
		</form>
      </div>
    </div>
  </div>


  <!--Modal exclui-->
  <div class="modal fade" id="excluiBancoEmprestimo" tabindex="-1" role="dialog" aria-labelledby="excluiBancoEmprestimo" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/excluiBancoEmprestimo");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="excluiBancoEmprestimo">Excluir Banco</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
				<p>Deseja realmente excluir o banco <b><span id="exclui_banco_emprestimo"></span></b>?</p>
			</div>
			<div class="modal-footer">
			<input type="hidden" id="id_exclui_banco_emprestimo" name="id_exclui_banco_emprestimo">
			<button type="submit" class="btn btn-primary">Sim</button>
			<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
			</div>
		</form>
      </div>
    </div>
  </div>
  
    <script>
	function buscaBancoEmprestimo(id){
		$.getJSON("<?=base_url('financeiro/buscaBancoEmprestimo/');?>"+id, function(data){
			document.getElementById('atualiza_banco_emprestimo').value = data[0].banco_emprestimo;
			document.getElementById('id_banco_emprestimo').value = data[0].id;
			console.log(data);
		})
	}
	
	function excluiBancoEmprestimo(id){
		$.getJSON("<?=base_url('financeiro/buscaBancoEmprestimo/');?>"+id, function(data){
			document.getElementById('exclui_banco_emprestimo').innerHTML = data[0].banco_emprestimo;
			document.getElementById('id_exclui_banco_emprestimo').value = data[0].id;
			console.log(data);
			
		})
	}
  </script>