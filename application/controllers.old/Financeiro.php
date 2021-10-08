<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Financeiro extends CI_Controller {

	
    public function __construct(){
        parent::__construct();
		$this->load->model('financeiro_model');		
    }	

	public function index(){		
		$this->load->view('template/header');
		$this->load->view('pages/dashboard');
		$this->load->view('template/footer');
	}
	
	public function dashboard(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");		
		$this->load->view('template/header');
		$this->load->view('pages/dashboard');
		$this->load->view('template/footer');
	}
	
//#################################				CONTRATO			####################################################	

	public function novoContrato(){
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");			
		$dados['tipo'] = $this->financeiro_model->listarTipo()->result();
		$dados['tipoDeContrato'] = $this->financeiro_model->listarTipoDeContrato()->result();
		$dados['promotora'] = $this->financeiro_model->listarPromotora()->result();
		$dados['bancoCliente'] = $this->financeiro_model->listarBancoCliente()->result();
		$dados['situacao'] = $this->financeiro_model->listarSituacao()->result();
		$dados['orgao'] = $this->financeiro_model->listarOrgao()->result();
		$dados['categoria'] = $this->financeiro_model->listarCategoria()->result();
		$dados['banco_emprestimo'] = $this->financeiro_model->listarBancoEmprestimo()->result();
		$dados['clientes'] = $this->financeiro_model->listarCliente()->result();
		$this->load->view('template/header');
		$this->load->view('pages/novo_contrato', $dados);
		$this->load->view('template/footer');
	}	

	public function cadastrarContrato(){
		if($this->input->post('cliente_existente') == ""){
			$tbl_cliente['cliente'] = $this->input->post('cliente');
			$tbl_cliente['telefone'] = $this->input->post('telefone');
			$tbl_cliente['celular'] = $this->input->post('celular');
			$tbl_cliente['id_orgao'] = $this->input->post('orgao');
			$tbl_cliente['cpf'] = $this->input->post('cpf');
			$this->db->insert('tbl_cliente', $tbl_cliente);
			$id = $this->db->insert_id();
			$tbl_contrato['numero_contrato'] = $this->input->post('numero_contrato');
			$tbl_contrato['id_tipo'] = $this->input->post('tipo');
			$tbl_contrato['percentual'] = $this->input->post('percentual');
			$tbl_contrato['id_tipo_contrato'] = $this->input->post('tipoDeContrato');
			$tbl_contrato['valor_contrato'] = $this->input->post('valorContrato');
			$tbl_contrato['data_deposito'] = $this->input->post('dataDeposito');
			$tbl_contrato['id_banco_emprestimo'] = $this->input->post('banco_emprestimo');
			$tbl_contrato['id_promotora'] = $this->input->post('promotora');
			$tbl_contrato['valor_parcela'] = $this->input->post('valorParcela');
			$tbl_contrato['prazo'] = $this->input->post('prazo');
			$tbl_contrato['id_categoria'] = $this->input->post('categoria');
			$tbl_contrato['agencia'] = $this->input->post('agencia');
			$tbl_contrato['conta_corrente'] = $this->input->post('conta_corrente');
			$tbl_contrato['vencimento'] = $this->input->post('vencimento');
			$tbl_contrato['quitacao'] = $this->input->post('quitacao');
			$tbl_contrato['estimativa'] = $this->input->post('estimativa');
			$tbl_contrato['id_situacao'] = $this->input->post('situacao');
			$tbl_contrato['observacao'] = $this->input->post('observacao');		
			$tbl_contrato['id_banco_cliente'] = $this->input->post('bancoCliente');		
			$tbl_contrato['id_cliente'] = $id;		
			if($this->db->insert('tbl_contrato', $tbl_contrato)){
				$this->session->set_flashdata('msg-sucesso', "Contrato cadastrado com sucesso.");
			}else{
				$this->session->set_flashdata('msg-erro', "Não foi possível cadastrar, houve algum erro.");
			}			
		}else{
			$tbl_contrato['numero_contrato'] = $this->input->post('numero_contrato');
			$tbl_contrato['id_tipo'] = $this->input->post('tipo');
			$tbl_contrato['percentual'] = $this->input->post('percentual');
			$tbl_contrato['id_tipo_contrato'] = $this->input->post('tipoDeContrato');
			$tbl_contrato['valor_contrato'] = $this->input->post('valorContrato');
			$tbl_contrato['data_deposito'] = $this->input->post('dataDeposito');
			$tbl_contrato['id_banco_emprestimo'] = $this->input->post('banco_emprestimo');
			$tbl_contrato['id_promotora'] = $this->input->post('promotora');
			$tbl_contrato['valor_parcela'] = $this->input->post('valorParcela');
			$tbl_contrato['prazo'] = $this->input->post('prazo');
			$tbl_contrato['id_categoria'] = $this->input->post('categoria');
			$tbl_contrato['agencia'] = $this->input->post('agencia');
			$tbl_contrato['conta_corrente'] = $this->input->post('conta_corrente');
			$tbl_contrato['vencimento'] = $this->input->post('vencimento');
			$tbl_contrato['quitacao'] = $this->input->post('quitacao');
			$tbl_contrato['estimativa'] = $this->input->post('estimativa');
			$tbl_contrato['id_situacao'] = $this->input->post('situacao');
			$tbl_contrato['observacao'] = $this->input->post('observacao');		
			$tbl_contrato['id_banco_cliente'] = $this->input->post('bancoCliente');
			if($this->input->post('cliente_existente') != ""){
				$tbl_contrato['id_cliente'] = $this->input->post('cliente_existente');
				if($this->db->insert('tbl_contrato', $tbl_contrato)){
					$this->session->set_flashdata('msg-sucesso', "Contrato cadastrado com sucesso.");
				}else{
					$this->session->set_flashdata('msg-erro', "Não foi possível cadastrar, houve algum erro.");
				}
			}else{
				$tbl_contrato['id_cliente'] = $id;
				if($this->db->insert('tbl_contrato', $tbl_contrato)){
					$this->session->set_flashdata('msg-sucesso', "Contrato cadastrado com sucesso.");
				}else{
					$this->session->set_flashdata('msg-erro', "Não foi possível cadastrar, houve algum erro.");
				}			
			}
		}

		redirect(base_url("financeiro/novoContrato"));
	}
	
	public function editarContrato(){
		$contrato = $this->input->post('id_contrato');
		$cliente = $this->input->post('id_cliente');
		$tbl_contrato['numero_contrato'] = $this->input->post('numero_contrato');
		$tbl_contrato['id_tipo'] = $this->input->post('tipo');
		$tbl_contrato['percentual'] = $this->input->post('percentual');
		$tbl_contrato['id_tipo_contrato'] = $this->input->post('tipoDeContrato');
		$tbl_contrato['valor_contrato'] = $this->input->post('valorContrato');
		$tbl_contrato['data_deposito'] = $this->input->post('dataDeposito');
		$tbl_contrato['id_banco_emprestimo'] = $this->input->post('banco_emprestimo');
		$tbl_contrato['id_promotora'] = $this->input->post('promotora');
		$tbl_contrato['valor_parcela'] = $this->input->post('valorParcela');
		$tbl_contrato['prazo'] = $this->input->post('prazo');
		$tbl_contrato['id_categoria'] = $this->input->post('categoria');
		$tbl_contrato['id_banco_cliente'] = $this->input->post('bancoCliente');
		$tbl_contrato['agencia'] = $this->input->post('agencia');
		$tbl_contrato['conta_corrente'] = $this->input->post('conta_corrente');
		$tbl_contrato['vencimento'] = $this->input->post('vencimento');
		$tbl_contrato['quitacao'] = $this->input->post('quitacao');
		$tbl_contrato['estimativa'] = $this->input->post('estimativa');
		$tbl_contrato['id_situacao'] = $this->input->post('situacao');
		$tbl_contrato['observacao'] = $this->input->post('observacao');		
		$this->db->where('id', $this->input->post('id_contrato'));
		if($this->db->update('tbl_contrato', $tbl_contrato)){
			$tbl_cliente['cliente'] = $this->input->post('cliente');
			$tbl_cliente['telefone'] = $this->input->post('telefone');
			$tbl_cliente['celular'] = $this->input->post('celular');
			$tbl_cliente['id_orgao'] = $this->input->post('orgao');
			$tbl_cliente['cpf'] = $this->input->post('cpf');
			$this->db->where('id', $this->input->post('id_cliente'));
			if($this->db->update('tbl_cliente', $tbl_cliente)){
				$this->session->set_flashdata('msg-sucesso', "Dados atualizados com sucesso.");
			}else{
				$this->session->set_flashdata('msg-erro', "Não foi possível atualizar, houve algum erro.");
			}
		}
		if($this->session->flashdata('redirect')){
			redirect(base_url("financeiro/editaContratoVisualizado/$contrato/$cliente"));
		}else{
			redirect(base_url("financeiro/editaContrato/$contrato/$cliente"));
		}
	}
	
	public function novoTipoDeContrato(){
		$dados['tipoDeContrato'] = $this->financeiro_model->listarTipoDeContrato()->result();
		$this->load->view('template/header');
		$this->load->view('pages/novo_tipo_contrato', $dados);
		$this->load->view('template/footer');
	}
		
	
	public function cadastrarTipoDeContrato(){
		$tbl_tipo_contrato = $this->input->post();
		if($this->db->insert('tbl_tipo_contrato', $tbl_tipo_contrato)){
			$this->session->set_flashdata('msg-sucesso', "Tipo de contrato cadastrado com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível cadastrar, houve algum erro.");
		}
		redirect(base_url("financeiro/novoTipoDeContrato"));
	}	
	
	public function buscaTipoDeContrato($id){
		
		$tipo_contrato = $this->financeiro_model->buscaTipoDeContrato($id)->result();
		echo json_encode($tipo_contrato);
	}	
	
	public function atualizaTipoDeContrato(){
		$tbl_tipo_contrato['tipo_contrato'] = $this->input->post("atualiza_tipo_contrato");
		$this->db->where('id', $this->input->post("id_tipo_contrato"));
		if($this->db->update('tbl_tipo_contrato', $tbl_tipo_contrato)){
			$this->session->set_flashdata('msg-sucesso', "Tipo de contrato atualizado com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível atualizar, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoTipoDeContrato"));
	}
	
	public function excluiTipoDeContrato(){
		$id = $this->input->post("id_exclui_tipo_contrato");
		if($this->db->delete('tbl_tipo_contrato', array('id' => $id))){
			$this->session->set_flashdata('msg-sucesso', "Tipo de contrato excluída com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível excluir, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoTipoDeContrato"));
	}	
	
	public function listaContratos(){
		$dados['contratos'] = $this->financeiro_model->listaContratos()->result();
		$this->load->view('template/header');
		$this->load->view('pages/lista_contrato', $dados);
		$this->load->view('template/footer');
	}	

	public function visualizaContratos($id){
		$dados['contratos'] = $this->financeiro_model->visualizaContratos($id)->result();
		$this->load->view('template/header');
		$this->load->view('pages/visualiza_contratos', $dados);
		$this->load->view('template/footer');
	}
	
	public function editaContrato($id_contrato, $id_cliente){

			//$id_contrato = $this->input->post("id_contrato");
			//$id_cliente = $this->input->post("id_cliente");

		$dados['tipo'] = $this->financeiro_model->listarTipo()->result();
		$dados['tipoDeContrato'] = $this->financeiro_model->listarTipoDeContrato()->result();
		$dados['promotora'] = $this->financeiro_model->listarPromotora()->result();
		$dados['bancoCliente'] = $this->financeiro_model->listarBancoCliente()->result();
		$dados['situacao'] = $this->financeiro_model->listarSituacao()->result();
		$dados['orgao'] = $this->financeiro_model->listarOrgao()->result();
		$dados['categoria'] = $this->financeiro_model->listarCategoria()->result();
		$dados['banco_emprestimo'] = $this->financeiro_model->listarBancoEmprestimo()->result();		
		$dados['contrato'] = $this->financeiro_model->editarContrato($id_contrato)->result();
		$dados['cliente'] = $this->financeiro_model->editarCliente($id_cliente)->result();
		$this->load->view('template/header');
		$this->load->view('pages/edita_contrato', $dados);
		$this->load->view('template/footer');
	}

	public function editaContratoVisualizado($id_contrato, $id_cliente){

			//$id_contrato = $this->input->post("id_contrato");
			//$id_cliente = $this->input->post("id_cliente");

		$dados['tipo'] = $this->financeiro_model->listarTipo()->result();
		$dados['tipoDeContrato'] = $this->financeiro_model->listarTipoDeContrato()->result();
		$dados['promotora'] = $this->financeiro_model->listarPromotora()->result();
		$dados['bancoCliente'] = $this->financeiro_model->listarBancoCliente()->result();
		$dados['situacao'] = $this->financeiro_model->listarSituacao()->result();
		$dados['orgao'] = $this->financeiro_model->listarOrgao()->result();
		$dados['categoria'] = $this->financeiro_model->listarCategoria()->result();
		$dados['banco_emprestimo'] = $this->financeiro_model->listarBancoEmprestimo()->result();		
		$dados['contrato'] = $this->financeiro_model->editarContrato($id_contrato)->result();
		$dados['cliente'] = $this->financeiro_model->editarCliente($id_cliente)->result();
		$this->load->view('template/header');
		$this->load->view('pages/edita_contrato_visualizado', $dados);
		$this->load->view('template/footer');
	}	

//#################################			TIPO		####################################################	
	
	public function novoTipo(){
		$dados['tipo'] = $this->financeiro_model->listarTipo()->result();
		$this->load->view('template/header');
		$this->load->view('pages/novo_tipo', $dados);
		$this->load->view('template/footer');
	}	
	
	public function cadastrarTipo(){
		$tbl_tipo = $this->input->post();
		if($this->db->insert('tbl_tipo', $tbl_tipo)){
			$this->session->set_flashdata('msg-sucesso', "Novo tipo cadastrado com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível cadastrar, houve algum erro.");
		}
		redirect(base_url("financeiro/novoTipo"));
	}

	public function buscaTipo($id){
		header("Access-Control-Allow-Origin: *");
		$tipo = $this->financeiro_model->buscaTipo($id)->result();
		echo json_encode($tipo);
	}	
	
	public function atualizaTipo(){
		$tbl_tipo['tipo'] = $this->input->post("atualiza_tipo");
		$this->db->where('id', $this->input->post("id_tipo"));
		if($this->db->update('tbl_tipo', $tbl_tipo)){
			$this->session->set_flashdata('msg-sucesso', "Tipo atualizado com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível atualizar, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoTipo"));
	}
	
	public function excluiTipo(){
		$id = $this->input->post("id_exclui_tipo");
		if($this->db->delete('tbl_tipo', array('id' => $id))){
			$this->session->set_flashdata('msg-sucesso', "Tipo excluída com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível excluir, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoTipo"));
	}
	
	
//#################################				POMOTORA			####################################################	
	
	public function novoPromotora(){
		$dados['promotora'] = $this->financeiro_model->listarPromotora()->result();
		$this->load->view('template/header');
		$this->load->view('pages/novo_promotora', $dados);
		$this->load->view('template/footer');
	}	

	public function cadastrarPromotora(){
		$tbl_promotora = $this->input->post();
		if($this->db->insert('tbl_promotora', $tbl_promotora)){
			$this->session->set_flashdata('msg-sucesso', "Promotora cadastrada com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível cadastrar, houve algum erro.");
		}
		redirect(base_url("financeiro/novoPromotora"));
	}	
	
	public function buscaPromotora($id){
		$promotora = $this->financeiro_model->buscaPromotora($id)->result();
		echo json_encode($promotora);
	}
	
	public function atualizaPromotora(){
		$tbl_promotora['promotora'] = $this->input->post("atualiza_promotora");
		$this->db->where('id', $this->input->post("id_promotora"));
		if($this->db->update('tbl_promotora', $tbl_promotora)){
			$this->session->set_flashdata('msg-sucesso', "Promotora atualizada com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível atualizar, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoPromotora"));
	}
	
	public function excluiPromotora(){
		$id = $this->input->post("id_exclui_promotora");
		if($this->db->delete('tbl_promotora', array('id' => $id))){
			$this->session->set_flashdata('msg-sucesso', "Promotora excluída com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível excluir, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoPromotora"));
	}
	
	
//#################################				BANCO			####################################################	
	
	public function novoBanco(){
		$dados['banco'] = $this->financeiro_model->listarBancoCliente()->result();
		$this->load->view('template/header');
		$this->load->view('pages/novo_banco', $dados);
		$this->load->view('template/footer');
	}

	public function cadastrarBanco(){
		$tbl_banco_cliente = $this->input->post();
		if($this->db->insert('tbl_banco_cliente', $tbl_banco_cliente)){
			$this->session->set_flashdata('msg-sucesso', "Banco cadastrado com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível cadastrar, houve algum erro.");
		}
		redirect(base_url("financeiro/novoBanco"));
	}	
	
	public function buscaBanco($id){
		$tipo = $this->financeiro_model->buscaBanco($id)->result();
		echo json_encode($tipo);
	}	
	
	public function atualizaBanco(){
		$tbl_banco_cliente['banco'] = $this->input->post("atualiza_banco");
		$this->db->where('id', $this->input->post("id_banco"));
		if($this->db->update('tbl_banco_cliente', $tbl_banco_cliente)){
			$this->session->set_flashdata('msg-sucesso', "Banco atualizado com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível atualizar, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoBanco"));
	}
	
	public function excluiBanco(){
		$id = $this->input->post("id_exclui_banco");
		if($this->db->delete('tbl_banco_cliente', array('id' => $id))){
			$this->session->set_flashdata('msg-sucesso', "Banco excluído com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível excluir, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoBanco"));
	}	
	
	
//#################################				ÓRGÃO			####################################################
		
	public function novoOrgao(){
		$dados['orgao'] = $this->financeiro_model->listarOrgao()->result();
		$this->load->view('template/header');
		$this->load->view('pages/novo_orgao', $dados);
		$this->load->view('template/footer');
	}	

	public function buscaOrgao($id){
		
		$orgao = $this->financeiro_model->buscaOrgao($id)->result();
		echo json_encode($orgao);
	}	
	
	public function atualizaOrgao(){
		$tbl_orgao['orgao'] = $this->input->post("atualiza_orgao");
		$this->db->where('id', $this->input->post("id_orgao"));
		if($this->db->update('tbl_orgao', $tbl_orgao)){
			$this->session->set_flashdata('msg-sucesso', "Órgão atualizado com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível atualizar, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoOrgao"));
	}
	
	public function excluiOrgao(){
		$id = $this->input->post("id_exclui_orgao");
		if($this->db->delete('tbl_orgao', array('id' => $id))){
			$this->session->set_flashdata('msg-sucesso', "Órgão excluído com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível excluir, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoOrgao"));
	}	
	
	public function cadastrarOrgao(){
		$tbl_orgao = $this->input->post();
		if($this->db->insert('tbl_orgao', $tbl_orgao)){
			$this->session->set_flashdata('msg-sucesso', "Órgão cadastrado com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível cadastrar, houve algum erro.");
		}
		redirect(base_url("financeiro/novoOrgao"));
	}	
	
	
//#################################				BANCO EMPRÉSTIMO			####################################################	
	
	public function cadastrarBancoEmprestimo(){
		$tbl_banco_emprestimo = $this->input->post();
		if($this->db->insert('tbl_banco_emprestimo', $tbl_banco_emprestimo)){
			$this->session->set_flashdata('msg-sucesso', "Banco cadastrado com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível cadastrar, houve algum erro.");
		}
		redirect(base_url("financeiro/novoBancoEmprestimo"));
	}		
	
	public function novoBancoEmprestimo(){
		$dados['banco_emprestimo'] = $this->financeiro_model->listarBancoEmprestimo()->result();
		$this->load->view('template/header');
		$this->load->view('pages/novo_banco_emprestimo', $dados);
		$this->load->view('template/footer');
	}	
	
	public function atualizaBancoEmprestimo(){
		$tbl_banco_emprestimo['banco_emprestimo'] = $this->input->post("atualiza_banco_emprestimo");
		$this->db->where('id', $this->input->post("id_banco_emprestimo"));
		if($this->db->update('tbl_banco_emprestimo', $tbl_banco_emprestimo)){
			$this->session->set_flashdata('msg-sucesso', "Banco atualizado com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível atualizar, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoBancoEmprestimo"));
	}
	
	public function excluiBancoEmprestimo(){
		$id = $this->input->post("id_exclui_banco_emprestimo");
		if($this->db->delete('tbl_banco_emprestimo', array('id' => $id))){
			$this->session->set_flashdata('msg-sucesso', "Banco excluído com sucesso.");
		}else{
			$this->session->set_flashdata('msg-erro', "Não foi possível excluir, houve algum erro.");
		}
		
		redirect(base_url("financeiro/novoBancoEmprestimo"));
	}	
	
	public function buscaBancoEmprestimo($id){		
		$banco_emprestimo = $this->financeiro_model->buscaBancoEmprestimo($id)->result();
		echo json_encode($banco_emprestimo);
	}	
	
//#################################				CLIENTE			####################################################	

	public function buscarCliente($cliente = null){
		if($cliente == null){
			$cliente = $this->input->post("cliente");
		}
		$dados['clientes'] = $this->financeiro_model->buscarCliente($cliente)->result();
		$this->load->view('template/header');
		$this->load->view('pages/lista_cliente', $dados);
		$this->load->view('template/footer');
	}
	
	public function listarCliente(){		
		$cliente = $this->financeiro_model->listarCliente()->result();
		echo json_encode($cliente);
	}

	public function buscarClienteID($id){		
		$cliente = $this->financeiro_model->editarCliente($id)->result();
		echo json_encode($cliente);
	}	
}
