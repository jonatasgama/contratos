<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro_model extends CI_Model{
	
    public function __construct(){
        parent::__construct();
    }
    
	//////CONTRATOS////////
	
    public function listarTipoDeContrato() {
        $sql = "SELECT * FROM tbl_tipo_contrato ORDER BY id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }
	
    public function buscaTipoDeContrato($id) {
        $sql = "SELECT * FROM tbl_tipo_contrato WHERE id = ?";
        $result = $this->db->query($sql, array($id));       
		return $result;	
    }	

    public function listaContratos() {
        $sql = "SELECT ct.id AS id_contrato, ct.numero_contrato, DATE_FORMAT(ct.data_deposito, '%d/%m/%Y') AS data_deposito, ct.valor_contrato, cl.id AS id_cliente, cl.cliente, ban_emp.banco_emprestimo, promo.promotora FROM tbl_contrato ct JOIN tbl_cliente cl ON ct.id_cliente = cl.id INNER JOIN tbl_banco_emprestimo ban_emp ON ct.id_banco_emprestimo = ban_emp.id INNER JOIN tbl_promotora promo ON ct.id_promotora = promo.id";
        $result = $this->db->query($sql);       
		return $result;	
    }		
	
    public function editarContrato($id) {
        $sql = "SELECT * FROM tbl_contrato WHERE id = ?";
        $result = $this->db->query($sql, array($id));       
		return $result;	
    }

    public function visualizaContratos($id){
        $sql = "SELECT cl.id AS id_cliente, cl.cliente, cl.celular, cl.cpf, ct.numero_contrato, DATE_FORMAT(ct.data_deposito, '%d/%m/%Y') AS data_deposito, ct.valor_contrato, ct.id AS id_contrato FROM tbl_cliente cl INNER JOIN tbl_contrato ct ON cl.id = ct.id_cliente WHERE cl.id = ?";
        $result = $this->db->query($sql, array($id));       
		return $result;	
    }
	
	public function contratosFinalizados(){
		$sql = "SELECT COUNT(*)  AS finalizados FROM tbl_contrato WHERE id_categoria = 1 AND id_situacao = 3";
        $result = $this->db->query($sql);       
		return $result;			
	}
	
	public function listaContratosFinalizados(){
		$sql = "SELECT ct.id AS id_contrato, ct.numero_contrato, DATE_FORMAT(ct.data_deposito, '%d/%m/%Y') AS data_deposito, ct.valor_contrato, cl.id AS id_cliente, cl.cliente, ban_emp.banco_emprestimo, promo.promotora FROM tbl_contrato ct JOIN tbl_cliente cl ON ct.id_cliente = cl.id INNER JOIN tbl_banco_emprestimo ban_emp ON ct.id_banco_emprestimo = ban_emp.id INNER JOIN tbl_promotora promo ON ct.id_promotora = promo.id WHERE ct.id_categoria = 1 AND ct.id_situacao = 3";
        $result = $this->db->query($sql);       
		return $result;			
	}
	
	public function listaContratosPagos(){
		$sql = "SELECT ct.id AS id_contrato, ct.numero_contrato, DATE_FORMAT(ct.data_deposito, '%d/%m/%Y') AS data_deposito, ct.valor_contrato, cl.id AS id_cliente, cl.cliente, ban_emp.banco_emprestimo, promo.promotora FROM tbl_contrato ct JOIN tbl_cliente cl ON ct.id_cliente = cl.id INNER JOIN tbl_banco_emprestimo ban_emp ON ct.id_banco_emprestimo = ban_emp.id INNER JOIN tbl_promotora promo ON ct.id_promotora = promo.id WHERE ct.id_situacao = 2";
        $result = $this->db->query($sql);       
		return $result;			
	}

	public function listaContratosEmAndamento(){
		$sql = "SELECT ct.id AS id_contrato, ct.numero_contrato, DATE_FORMAT(ct.data_deposito, '%d/%m/%Y') AS data_deposito, ct.valor_contrato, cl.id AS id_cliente, cl.cliente, ban_emp.banco_emprestimo, promo.promotora FROM tbl_contrato ct JOIN tbl_cliente cl ON ct.id_cliente = cl.id INNER JOIN tbl_banco_emprestimo ban_emp ON ct.id_banco_emprestimo = ban_emp.id INNER JOIN tbl_promotora promo ON ct.id_promotora = promo.id WHERE ct.id_situacao = 1";
        $result = $this->db->query($sql);       
		return $result;			
	}	
	
	public function contratosPagos(){
		$sql = "SELECT COUNT(*) AS pagos FROM tbl_contrato WHERE id_situacao = 2";
        $result = $this->db->query($sql);       
		return $result;			
	}
	
	public function contratosAndamento(){
		$sql = "SELECT COUNT(*) AS andamento FROM tbl_contrato WHERE id_situacao = 1";
        $result = $this->db->query($sql);       
		return $result;			
	}

	
	
	///////CLIENTE//////////
	
    public function listarCliente() {
        $sql = "SELECT cl.id, cl.cliente, cl.telefone, cl.celular, cl.cpf, og.orgao FROM tbl_cliente cl INNER JOIN tbl_orgao og ON cl.id_orgao = og.id ORDER BY cl.id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }
	

    public function editarCliente($id) {
        $sql = "SELECT * FROM tbl_cliente WHERE id = ?";
        $result = $this->db->query($sql, array($id));       
		return $result;	
    }		

    public function buscarCliente($cliente){
        $sql = "SELECT * FROM tbl_cliente WHERE cliente LIKE '%$cliente%'";
        $result = $this->db->query($sql);       
		return $result;	
    }
	


	////////TIPO//////////
	
    public function buscaTipo($id) {
        $sql = "SELECT * FROM tbl_tipo WHERE id = ?";
        $result = $this->db->query($sql, array($id));       
		return $result;	
    }
	
    public function listarTipo() {
        $sql = "SELECT * FROM tbl_tipo ORDER BY id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }			
	
	
	////////BANCO////////
	
	
    public function buscaBanco($id) {
        $sql = "SELECT * FROM tbl_banco_cliente WHERE id = ?";
        $result = $this->db->query($sql, array($id));       
		return $result;	
    }


	///////BANCO CREDITADO///////
	
    public function listarBancoCreditado() {
        $sql = "SELECT * FROM tbl_banco_creditado ORDER BY id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }



	/////////BANCO CLIENTE////////

    public function listarBancoCliente() {
        $sql = "SELECT * FROM tbl_banco_cliente ORDER BY id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }



	////////BANCO EMPRESTIMO///////////
	
    public function listarBancoEmprestimo() {
        $sql = "SELECT * FROM tbl_banco_emprestimo ORDER BY id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }		

	
    public function buscaBancoEmprestimo($id) {
        $sql = "SELECT * FROM tbl_banco_emprestimo WHERE id = ?";
        $result = $this->db->query($sql, array($id));       
		return $result;	
    }


	///////PROMOTORA/////////
	
    public function listarPromotora() {
        $sql = "SELECT * FROM tbl_promotora ORDER BY id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }	

    public function buscaPromotora($id) {
        $sql = "SELECT * FROM tbl_promotora WHERE id = ?";
        $result = $this->db->query($sql, array($id));       
		return $result;	
    }
	


	///////SITUAÇÃO///////////
	
    public function listarSituacao() {
        $sql = "SELECT * FROM tbl_situacao ORDER BY id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }	
	
	
	///////ÓRGÃO///////////
	
    public function listarOrgao() {
        $sql = "SELECT * FROM tbl_orgao ORDER BY id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }	
	
    public function buscaOrgao($id) {
        $sql = "SELECT * FROM tbl_orgao WHERE id = ?";
        $result = $this->db->query($sql, array($id));       
		return $result;	
    }	
	
	///////CATEGORIA/////////////
	
    public function listarCategoria() {
        $sql = "SELECT * FROM tbl_categoria ORDER BY id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }	


	///////CONSULTORES/////////
	
    public function listarConsultores() {
        $sql = "SELECT * FROM tbl_consultor ORDER BY id ASC";
        $result = $this->db->query($sql);       
		return $result;	
    }		
	
	public function vendasMes(){
		$this->db->trans_start();
		$this->db->query("SET lc_time_names = 'pt_BR'");
		$result = $this->db->query("SELECT SUM(REPLACE(REPLACE(ct.valor_contrato, ',','.'),'.','')) AS soma, ct.id_consultor, MONTHNAME(DATE(ct.data_deposito)) AS mes, cl.nome FROM tbl_contrato ct INNER JOIN tbl_consultor cl ON cl.id = ct.id_consultor GROUP BY MONTHNAME(DATE(ct.data_deposito)),cl.nome");
		$this->db->trans_complete();
		return $result;
	}
	
}