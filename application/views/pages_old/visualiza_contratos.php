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

<legend>Contratos</legend>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<?php 
			$cliArray = explode(" ",$contratos['0']->cliente);
			$cli = $cliArray['0'];
		?>
		<li class="breadcrumb-item"><a href="<?=base_url("financeiro/buscarCliente/$cli");?>">Listagem de clientes</a></li>
		<li class="breadcrumb-item active" aria-current="page">Contratos <?=$contratos['0']->cliente;?></li>
	  </ol>
	</nav>

  <div class="form-row">
	
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Cliente</th>
				<th>CPF</th>
				<th>Celular</th>	
				<th>Nº do Contrato</th>
				<th>Data Depósito</th>
				<th>Valor Contrato</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($contratos as $cts){ ;?>
			<tr>
			<form method="post" action="<?=base_url("financeiro/editaContratoVisualizado/$cts->id_contrato/$cts->id_cliente");?>">
				<td><?=$cts->cliente;?></td>
				<td><?=$cts->cpf;?></td>
				<td><?=$cts->celular;?></td>
				<td><?=$cts->numero_contrato;?></td>
				<td><?=$cts->data_deposito;?></td>
				<td><?=$cts->valor_contrato;?></td>
				<td><button type="submit" class="btn btn-sm btn-success" data-toggle="modal"
                data-target="#atualizaTipo"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></td>	
			</form>
			</tr>
		<?php } ;?>
		</tbody>
	</table>

</fieldset>

</div>

