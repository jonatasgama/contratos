<div class="col-12">

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

<legend>Clientes</legend>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item">Listagem de clientes</li>
	  </ol>
	</nav>

  <div class="form-row">
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Cliente</th>			
				<th>Telefone</th>
				<th>Celular</th>
				<th>CPF</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($clientes as $cliente){ ;?>
			<tr>
			<form method="post" action="<?=base_url("financeiro/visualizaContratos/$cliente->id");?>">
				<td><?=$cliente->cliente;?></td>
				<td><?=$cliente->telefone;?></td>
				<td><?=$cliente->celular;?></td>
				<td><?=$cliente->cpf;?></td>
				<td><button type="submit" class="btn btn-sm btn-success"><i class="fa fa-file-text" aria-hidden="true"></i> Contratos</button></td>	
			</form>
			</tr>
		<?php } ;?>
		</tbody>
	</table>

</fieldset>

</div>

