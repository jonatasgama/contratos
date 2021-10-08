<form method="post" id="formulario" class="aparicao" action="<?=base_url("financeiro/cadastrarcontrato");?>">

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

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="numero_contrato">Nº do Contrato</label>
      <input type="text" class="form-control" id="numero_contrato" name="numero_contrato">
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
        <input type="text" class="form-control" id="percentual" name="percentual">
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
        <input type="text" class="form-control" id="valorContrato" name="valorContrato">
      </div>
    </div>
	
    <div class="form-group col-md-4">
      <label for="dataDeposito">Data do Depósito</label>
      <input type="date" class="form-control" id="dataDeposito" name="dataDeposito">
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
        <input type="text" class="form-control" id="valorParcela" name="valorParcela">
      </div>
    </div>	
	
    <div class="form-group col-md-2">
      <label for="prazo">Prazo</label>
      <input type="text" class="form-control" id="prazo" name="prazo">
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
      <input type="text" class="form-control" id="agencia" name="agencia">
	</div>

    <div class="form-group col-md-3">
      <label for="conta_corrente">Conta Corrente</label>
      <input type="text" class="form-control" id="conta_corrente" name="conta_corrente">
	</div>	

    <div class="form-group col-md-3">
      <label for="vencimento">Vencimento(dia do mês)</label>
      <input type="text" class="form-control" id="vencimento" name="vencimento">
	</div>	
	
  </div>
  
<div class="form-row"> 
	
    <div class="form-group col-md-3">
      <label for="quitacao">Quitação(meses)</label>
      <input type="number" class="form-control" id="quitacao" name="quitacao">
	</div>	

    <div class="form-group col-md-3">
      <label for="estimativa">Estimativa</label>
      <input type="text" class="form-control" id="estimativa" name="estimativa">
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

      <div class="input-group">
        <input type="text" class="form-control" id="cliente" name="cliente">	
        <div class="input-group-append">
          <button type="button" class="btn btn-primary" id="procuraClientes" data-toggle="modal" data-target="#tabelaClientes">
			<i class="fas fa-search fa-sm" aria-hidden="true"></i>
		  </button>
        </div>

      </div>
	  
	</div>


    <div class="form-group col-md-4">
      <label for="telefone">Telefone</label>
	  
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-phone" aria-hidden="true"></i></span>
        </div>
        <input type="text" class="form-control" id="telefone" name="telefone">
      </div>
	  
    </div>

    <div class="form-group col-md-4">
      <label for="celular">Celular</label>

      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa fa-whatsapp"></i></span>
        </div>
        <input type="text" class="form-control" id="celular" name="celular">
      </div>
    </div>
	

	
  </div>
  
<div class="form-row">  
    <div class="form-group col-md-6">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf">
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
      <textarea class="form-control" id="observacao" name="observacao" rows="3"></textarea>
	</div>
</div>
<input type="hidden" name="cliente_existente" id="cliente_existente" value="">
</fieldset>
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>

  <!--Modal-->
  <div class="modal fade" id="tabelaClientes" tabindex="-1" role="dialog" aria-labelledby="tabelaClientes" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
		<form method="post" action="<?=base_url("financeiro/excluiBanco");?>">
			<div class="modal-header">
			  <h5 class="modal-title" id="excluiBanco">Clientes</h5>
			  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			  </button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered table-hover" id="tabela">
					<thead>
					  <tr>
						<th scope="col">Nome</th>
						<th scope="col">Telefone</th>
						<th scope="col">Celular</th>
						<th scope="col">CPF</th>
						<th scope="col">Órgão</th>
						<th scope="col">Opção</th>
					  </tr>
					</thead>

					<tbody></tbody>					
				</table>
			</div>
		</form>
      </div>
    </div>
  </div>
  
     <script type='text/javascript'>
	   $(document).ready(function(){

		document.getElementById('procuraClientes').addEventListener("click", function(){
		   $.ajax({
			 url: '<?=base_url('financeiro/listarCliente');?>',
			 type: 'get',
			 dataType: 'json',
			 success: function(result){
				createTable(result);
			 }
		   });
		})
	 
		 function createTable(result){
		   $('#tabela tbody').empty();
			console.log(result);
		   for(index in result){
			  var i = 0; 
			  var cliente = result[index].cliente;
			  var telefone = result[index].telefone;
			  var celular = result[index].celular;
			  var cpf = result[index].cpf;
			  var orgao = result[index].orgao;
			  	 
			  var tr = "<tr>";
			  tr += "<td>"+ cliente +"</td>";
			  tr += "<td>"+ telefone +"</td>";
			  tr += "<td>"+ celular +"</td>";
			  tr += "<td>"+ cpf +"</td>";
			  tr += "<td>"+ orgao +"</td>";
			  tr += "<td><button type='button' class='btn btn-success btn-sm' data-dismiss='modal' onclick='escolheCliente("+result[index].id+")'>Escolher</button></td>";
			  tr += "</tr>";
			  $('#tabela tbody').append(tr);
			  i++;	
			}
		  }
		   
		});
		
		function escolheCliente(cli){
		   $.ajax({
			 url: '<?=base_url('financeiro/buscarClienteID/');?>'+cli,
			 type: 'get',
			 dataType: 'json',
			 success: function(result){
				console.log(result);
				document.getElementById('cliente').value = result['0'].cliente;
				document.getElementById('cliente').setAttribute("disabled", true);
				document.getElementById('telefone').value = result['0'].telefone;
				document.getElementById('telefone').setAttribute("disabled", true);
				document.getElementById('celular').value = result['0'].celular;
				document.getElementById('celular').setAttribute("disabled", true);
				document.getElementById('cpf').value = result['0'].cpf;
				document.getElementById('cpf').setAttribute("disabled", true);
				document.getElementById('orgao').value = result['0'].id_orgao;
				document.getElementById('orgao').setAttribute("disabled", true);
				document.getElementById('cliente_existente').value = result['0'].id;
			 }
		   });
		}

	</script>