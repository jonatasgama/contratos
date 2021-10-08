<form method="post" action="<?=base_url("financeiro/editarcontrato");?>">

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

<legend>Contrato</legend>
	
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?=base_url("financeiro/listacontratos");?>">Listagem de contratos</a></li>
		<li class="breadcrumb-item active" aria-current="page">Editar contrato <b><?=$contrato['0']->numero_contrato;?></b></li>
	  </ol>
	</nav>	

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="numero_contrato">Nº do Contrato</label>
      <input type="text" class="form-control" id="numero_contrato" name="numero_contrato" value="<?=$contrato['0']->numero_contrato;?>">
    </div>
	
    <div class="form-group col-md-3">
      <label for="tipo">Tipo</label>
		<select class="form-control" id="tipo" name="tipo">
			<?php foreach($tipo as $t){ ;?>
				<option value="<?=$t->id;?>"><?=$t->tipo;?></option>
			<?php } ;?>
		</select>
    </div>
	
    <div class="col-md-2">
      <label for="percentual">Percentual</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">%</span>
        </div>
        <input type="text" class="form-control" id="percentual" name="percentual" value="<?=$contrato['0']->percentual;?>">
      </div>
    </div>
	
    <div class="form-group col-md-3">
      <label for="tipoDeContrato">Tipo de Contrato</label>
		<select class="form-control" id="tipoDeContrato" name="tipoDeContrato">
			<?php foreach($tipoDeContrato as $tipo){ ;?>
				<option value="<?=$tipo->id;?>"><?=$tipo->tipo_contrato;?></option>
			<?php } ;?>
		</select>
    </div>	
	
  </div>
  
  <div class="form-row">
    <div class="col-md-4">
      <label for="valorContrato">Valor do Contrato</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">$</span>
        </div>
        <input type="text" class="form-control" id="valorContrato" name="valorContrato" value="<?=$contrato['0']->valor_contrato;?>">
      </div>
    </div>
	
    <div class="form-group col-md-4">
      <label for="dataDeposito">Data do Depósito</label>
      <input type="date" class="form-control" id="dataDeposito" name="dataDeposito" value="<?=$contrato['0']->data_deposito;?>">
    </div>
	
    <div class="form-group col-md-4">
      <label for="banco_emprestimo">Banco Empréstimo</label>
		<select class="form-control" id="banco_emprestimo" name="banco_emprestimo">
			<?php foreach($banco_emprestimo as $ban_emp){ ;?>
				<option value="<?=$ban_emp->id;?>"><?=$ban_emp->banco_emprestimo;?></option>
			<?php } ;?>
		</select>
    </div>	

  </div>
  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="promotora">Promotora</label>
		<select class="form-control" id="promotora" name="promotora">
			<?php foreach($promotora as $p){ ;?>
				<option value="<?=$p->id;?>"><?=$p->promotora;?></option>
			<?php } ;?>
		</select>
    </div>	
	
    <div class="col-md-4">
      <label for="valorParcela">Valor da Parcela</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">R$</span>
        </div>
        <input type="text" class="form-control" id="valorParcela" name="valorParcela" value="<?=$contrato['0']->valor_parcela;?>">
      </div>
    </div>	
	
    <div class="form-group col-md-2">
      <label for="prazo">Prazo</label>
      <input type="text" class="form-control" id="prazo" name="prazo" value="<?=$contrato['0']->prazo;?>">
    </div>
	
    <div class="form-group col-md-2">
      <label for="categoria">Categoria</label>
		<select class="form-control" id="categoria" name="categoria">
			<?php foreach($categoria as $cat){ ;?>
				<option value="<?=$cat->id;?>"><?=$cat->categoria;?></option>
			<?php } ;?>
		</select>
    </div>		
	
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="bancoCliente">Banco</label>
		<select class="form-control" id="bancoCliente" name="bancoCliente">
			<?php foreach($bancoCliente as $bcCliente){ ;?>
				<option value="<?=$bcCliente->id;?>"><?=$bcCliente->banco_cliente;?></option>
			<?php } ;?>
		</select>
    </div>		
	
    <div class="form-group col-md-3">
      <label for="agencia">Agencia</label>
      <input type="text" class="form-control" id="agencia" name="agencia" value="<?=$contrato['0']->agencia;?>">
	</div>

    <div class="form-group col-md-3">
      <label for="conta_corrente">Conta Corrente</label>
      <input type="text" class="form-control" id="conta_corrente" name="conta_corrente" value="<?=$contrato['0']->conta_corrente;?>">
	</div>	

    <div class="form-group col-md-3">
      <label for="vencimento">Vencimento(dia do mês)</label>
      <input type="text" class="form-control" id="vencimento" name="vencimento" value="<?=$contrato['0']->vencimento;?>">
	</div>		
	
  </div>  
  
<div class="form-row"> 
	
    <div class="form-group col-md-3">
      <label for="quitacao">Quitação(meses)</label>
      <input type="number" class="form-control" id="quitacao" name="quitacao" value="<?=$contrato['0']->quitacao;?>">
	</div>	

    <div class="form-group col-md-3">
      <label for="estimativa">Estimativa</label>
      <input type="text" class="form-control" id="estimativa" name="estimativa" value="<?=$contrato['0']->estimativa;?>">
	</div>	

    <div class="form-group col-md-3">
      <label for="situacao">Situação</label>
		<select class="form-control" id="situacao" name="situacao">
			<?php foreach($situacao as $sit){ ;?>
				<option value="<?=$sit->id;?>"><?=$sit->situacao;?></option>
			<?php } ;?>
		</select>
    </div>	
	
    <div class="form-group col-md-3">
      <label for="consultor">Consultor</label>
		<select class="form-control" id="consultor" name="consultor">
			<?php foreach($consultores as $consultor){ ;?>
				<option value="<?=$consultor->id;?>"><?=$consultor->nome." ".$consultor->sobrenome;?></option>
			<?php } ;?>
		</select>
    </div>		

</div> 
  
</fieldset>
<hr>
<fieldset class="form-group">

<legend>Cliente</legend>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="cliente">Nome</label>
      <input type="text" class="form-control" id="cliente" name="cliente" value="<?=$cliente['0']->cliente;?>">
	</div>


    <div class="form-group col-md-4">
      <label for="telefone">Telefone</label>
	  
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
        </div>
        <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$cliente['0']->telefone;?>">
      </div>
	  
    </div>

    <div class="form-group col-md-4">
      <label for="celular">Celular</label>

      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-whatsapp"></i></span>
        </div>
        <input type="text" class="form-control" id="celular" name="celular" value="<?=$cliente['0']->celular;?>">
      </div>
    </div>
	
	
  </div>
  
<div class="form-row">  
    <div class="form-group col-md-6">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="<?=$cliente['0']->cpf;?>">
	</div>
			
    <div class="form-group col-md-6">
      <label for="orgao">Órgão</label>
		<select class="form-control" id="orgao" name="orgao">
			<?php foreach($orgao as $org){ ;?>
				<option value="<?=$org->id;?>"><?=$org->orgao;?></option>
			<?php } ;?>
		</select>
    </div>	

</div>


<div class="form-row">
    <div class="form-group col-12">
      <label for="observacao">Observação</label>
      <textarea class="form-control" id="observacao" name="observacao" rows="3"><?=$contrato['0']->observacao;?></textarea>
	</div>
</div>
<input type="hidden" name="id_cliente" value="<?=$cliente['0']->id;?>">
<input type="hidden" name="id_contrato" value="<?=$contrato['0']->id;?>">
</fieldset>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<script>
	document.getElementById("tipo").value = "<?=$contrato['0']->id_tipo;?>";
	document.getElementById("tipoDeContrato").value = "<?=$contrato['0']->id_tipo_contrato;?>";
	document.getElementById("banco_emprestimo").value = "<?=$contrato['0']->id_banco_emprestimo;?>";
	document.getElementById("bancoCliente").value = "<?=$contrato['0']->id_banco_cliente;?>";
	document.getElementById("promotora").value = "<?=$contrato['0']->id_promotora;?>";
	document.getElementById("categoria").value = "<?=$contrato['0']->id_categoria;?>";
	document.getElementById("orgao").value = "<?=$cliente['0']->id_orgao;?>";
	document.getElementById("situacao").value = "<?=$contrato['0']->id_situacao;?>";
	document.getElementById("consultor").value = "<?=$contrato['0']->id_consultor;?>";
</script>