-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Set-2019 às 15:57
-- Versão do servidor: 10.3.11-MariaDB
-- versão do PHP: 7.2.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financeirors`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_banco_cliente`
--

DROP TABLE IF EXISTS `tbl_banco_cliente`;
CREATE TABLE `tbl_banco_cliente` (
  `id` int(11) NOT NULL,
  `banco_cliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_banco_cliente`
--

TRUNCATE TABLE `tbl_banco_cliente`;
--
-- Extraindo dados da tabela `tbl_banco_cliente`
--

INSERT INTO `tbl_banco_cliente` (`id`, `banco_cliente`) VALUES
(22, 'Santander'),
(23, 'Itaú'),
(24, 'Bradesco'),
(25, 'Caixa Econômica'),
(26, 'Banco do Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_banco_creditado`
--

DROP TABLE IF EXISTS `tbl_banco_creditado`;
CREATE TABLE `tbl_banco_creditado` (
  `id` int(11) NOT NULL,
  `banco_creditado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_banco_creditado`
--

TRUNCATE TABLE `tbl_banco_creditado`;
--
-- Extraindo dados da tabela `tbl_banco_creditado`
--

INSERT INTO `tbl_banco_creditado` (`id`, `banco_creditado`) VALUES
(4, 'Banco do Brasil'),
(5, 'Bradesco'),
(6, 'Itaú');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_banco_emprestimo`
--

DROP TABLE IF EXISTS `tbl_banco_emprestimo`;
CREATE TABLE `tbl_banco_emprestimo` (
  `id` int(11) NOT NULL,
  `banco_emprestimo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_banco_emprestimo`
--

TRUNCATE TABLE `tbl_banco_emprestimo`;
--
-- Extraindo dados da tabela `tbl_banco_emprestimo`
--

INSERT INTO `tbl_banco_emprestimo` (`id`, `banco_emprestimo`) VALUES
(3, 'Daycoval'),
(4, 'Sabemi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_categoria`
--

DROP TABLE IF EXISTS `tbl_categoria`;
CREATE TABLE `tbl_categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_categoria`
--

TRUNCATE TABLE `tbl_categoria`;
--
-- Extraindo dados da tabela `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`id`, `categoria`) VALUES
(1, 'IPNF'),
(2, 'Consignado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cliente`
--

DROP TABLE IF EXISTS `tbl_cliente`;
CREATE TABLE `tbl_cliente` (
  `id` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `cpf` varchar(100) DEFAULT NULL,
  `id_orgao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_cliente`
--

TRUNCATE TABLE `tbl_cliente`;
--
-- Extraindo dados da tabela `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`id`, `cliente`, `telefone`, `celular`, `cpf`, `id_orgao`) VALUES
(1, 'Wanise Maria de Souza Cruz', '(21) 2275-8843', '(21)9 8743-5292', '663.641.917-20', 5),
(3, 'Manoel Mendes alves', '(21) 2548-5626', '(21)9 7676-2132', '078.634.647-73', 2),
(4, 'Marcelo de Morais Costa', '(21) 3442-0074', '(21)9 5230-3103', '702.997.227-91', 1),
(5, 'Fernando de Souza Rangel', '(21) 2240-8899', '(21)9 6579-5258', '096.037.767-00', 1),
(6, 'Anderson Noblat dos Santos', '(22) 3355-1166', '(21)9 8906-7531', '085.581.397-09', 4),
(15, 'Milton Soares Santos', '(24) 5566-7722', '(21)9 8899-0044', '074.986.967-20', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_consultor`
--

DROP TABLE IF EXISTS `tbl_consultor`;
CREATE TABLE `tbl_consultor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_consultor`
--

TRUNCATE TABLE `tbl_consultor`;
--
-- Extraindo dados da tabela `tbl_consultor`
--

INSERT INTO `tbl_consultor` (`id`, `nome`, `sobrenome`) VALUES
(1, 'Caio', 'Queiroz'),
(2, 'Jonatas', 'Gama'),
(3, 'Gabriella', 'Santos'),
(4, 'Cintia', 'França');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_contrato`
--

DROP TABLE IF EXISTS `tbl_contrato`;
CREATE TABLE `tbl_contrato` (
  `id` int(11) NOT NULL,
  `numero_contrato` varchar(100) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `percentual` varchar(45) DEFAULT NULL,
  `id_tipo_contrato` int(11) NOT NULL,
  `valor_contrato` varchar(45) NOT NULL,
  `data_deposito` varchar(45) DEFAULT NULL,
  `id_promotora` int(11) DEFAULT NULL,
  `valor_parcela` varchar(45) NOT NULL,
  `prazo` varchar(45) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_banco_emprestimo` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `estimativa` varchar(45) DEFAULT NULL,
  `quitacao` varchar(45) DEFAULT NULL,
  `vencimento` varchar(45) DEFAULT NULL,
  `conta_corrente` varchar(45) DEFAULT NULL,
  `agencia` varchar(45) DEFAULT NULL,
  `id_banco_cliente` int(11) DEFAULT NULL,
  `id_situacao` int(11) DEFAULT NULL,
  `observacao` text DEFAULT NULL,
  `id_consultor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='		';

--
-- Truncate table before insert `tbl_contrato`
--

TRUNCATE TABLE `tbl_contrato`;
--
-- Extraindo dados da tabela `tbl_contrato`
--

INSERT INTO `tbl_contrato` (`id`, `numero_contrato`, `id_tipo`, `percentual`, `id_tipo_contrato`, `valor_contrato`, `data_deposito`, `id_promotora`, `valor_parcela`, `prazo`, `id_cliente`, `id_banco_emprestimo`, `id_categoria`, `estimativa`, `quitacao`, `vencimento`, `conta_corrente`, `agencia`, `id_banco_cliente`, `id_situacao`, `observacao`, `id_consultor`) VALUES
(1, '0020/04/19', 3, '3', 2, '53.945,58', '2019-04-30', 1, '1.400,00', '96', 15, 4, 1, '40.998,99', '24', '30', '20055-7', '0127', 23, 3, 'teste', 1),
(2, '0019/19', 3, '5', 2, '14.275,49', '2019-02-28', 2, '.315,71', '72', 4, 4, 1, '50.000,00', '24', '30', '0130-0', '1336', 25, 3, 'teste', 4),
(3, '00025/19', 1, '3', 1, '27.000,00', '2019-04-30', 1, '1.085,23', '60', 5, 3, 1, '23.440,96', '24', '22', '04002-2', '8383', 22, 2, 'teste', 2),
(4, '0033/19', 3, '3', 2, '28.011,49', '2019-07-22', 3, '.676,06', '96', 6, 4, 1, '20.000,00', '24', '30', '55025-2', '955', 24, 1, 'teste', 2),
(5, '0032/19', 1, '9', 2, '30.036,22', '2019-07-04', 3, '1.079,63', '10', 5, 3, 1, '30.000,00', '12', '30', '05672-8', '0751', 26, 1, 'teste', 1),
(7, '0030/19', 3, '4', 1, '15.000,00', '2019-06-26', 2, '.460,31', '72', 1, 3, 1, '10.000,00', '36', '30', '02584-8', '199', 25, 1, 'teste', 4),
(8, '0028/19', 2, '4', 2, '70.590,67', '2019-06-11', 2, '1.774,50', '53', 15, 4, 1, '60.000,00', '12', '30', '97993-7', '129', 24, 3, 'testes', 3),
(9, '00027/19', 3, '1', 2, '77.398,56', '2019-06-03', 1, '1.882,00', '72', 3, 4, 1, '70.000,00', '12', '30', '02283-5', '8909', 23, 1, 'teste cliente existente', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_meta`
--

DROP TABLE IF EXISTS `tbl_meta`;
CREATE TABLE `tbl_meta` (
  `id` int(11) NOT NULL,
  `meta` varchar(255) DEFAULT NULL,
  `valor` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_meta`
--

TRUNCATE TABLE `tbl_meta`;
--
-- Extraindo dados da tabela `tbl_meta`
--

INSERT INTO `tbl_meta` (`id`, `meta`, `valor`) VALUES
(1, 'basica', '20000.00'),
(2, 'intermediaria', '60000.00'),
(3, 'estrela', '90000.00'),
(4, 'diamante', '120000.00'),
(5, 'master', '150000.00'),
(6, 'top master black', '200000.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_orgao`
--

DROP TABLE IF EXISTS `tbl_orgao`;
CREATE TABLE `tbl_orgao` (
  `id` int(11) NOT NULL,
  `orgao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_orgao`
--

TRUNCATE TABLE `tbl_orgao`;
--
-- Extraindo dados da tabela `tbl_orgao`
--

INSERT INTO `tbl_orgao` (`id`, `orgao`) VALUES
(3, 'Aeronáutica'),
(8, 'Comlurb'),
(2, 'Exército'),
(5, 'Federal'),
(9, 'Governo RJ'),
(4, 'INSS'),
(1, 'Marinha'),
(7, 'Prefeitura RJ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_promotora`
--

DROP TABLE IF EXISTS `tbl_promotora`;
CREATE TABLE `tbl_promotora` (
  `id` int(11) NOT NULL,
  `promotora` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_promotora`
--

TRUNCATE TABLE `tbl_promotora`;
--
-- Extraindo dados da tabela `tbl_promotora`
--

INSERT INTO `tbl_promotora` (`id`, `promotora`) VALUES
(1, 'Alsif'),
(2, 'Bevicred'),
(3, 'Ecredit');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_rs_solucoes`
--

DROP TABLE IF EXISTS `tbl_rs_solucoes`;
CREATE TABLE `tbl_rs_solucoes` (
  `id` int(11) NOT NULL,
  `valor_depositado` varchar(45) DEFAULT NULL,
  `data_deposito` varchar(45) DEFAULT NULL,
  `id_banco_creditado` int(11) DEFAULT NULL,
  `consultor` varchar(45) DEFAULT NULL,
  `equipe` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_rs_solucoes`
--

TRUNCATE TABLE `tbl_rs_solucoes`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_situacao`
--

DROP TABLE IF EXISTS `tbl_situacao`;
CREATE TABLE `tbl_situacao` (
  `id` int(11) NOT NULL,
  `situacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_situacao`
--

TRUNCATE TABLE `tbl_situacao`;
--
-- Extraindo dados da tabela `tbl_situacao`
--

INSERT INTO `tbl_situacao` (`id`, `situacao`) VALUES
(1, 'Em andamento'),
(2, 'Pago'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_tipo`
--

DROP TABLE IF EXISTS `tbl_tipo`;
CREATE TABLE `tbl_tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_tipo`
--

TRUNCATE TABLE `tbl_tipo`;
--
-- Extraindo dados da tabela `tbl_tipo`
--

INSERT INTO `tbl_tipo` (`id`, `tipo`) VALUES
(1, 'Cartão'),
(2, 'CDC'),
(3, 'Crédito Consignado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_tipo_contrato`
--

DROP TABLE IF EXISTS `tbl_tipo_contrato`;
CREATE TABLE `tbl_tipo_contrato` (
  `id` int(11) NOT NULL,
  `tipo_contrato` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `tbl_tipo_contrato`
--

TRUNCATE TABLE `tbl_tipo_contrato`;
--
-- Extraindo dados da tabela `tbl_tipo_contrato`
--

INSERT INTO `tbl_tipo_contrato` (`id`, `tipo_contrato`) VALUES
(1, 'Cartão'),
(2, 'Novo'),
(3, 'Refin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banco_cliente`
--
ALTER TABLE `tbl_banco_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banco_creditado`
--
ALTER TABLE `tbl_banco_creditado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banco_creditado_UNIQUE` (`banco_creditado`);

--
-- Indexes for table `tbl_banco_emprestimo`
--
ALTER TABLE `tbl_banco_emprestimo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_id_orgao` (`id_orgao`);

--
-- Indexes for table `tbl_consultor`
--
ALTER TABLE `tbl_consultor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contrato`
--
ALTER TABLE `tbl_contrato`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `numero_contrato_UNIQUE` (`numero_contrato`),
  ADD KEY `fk_id_tipo_idx` (`id_tipo`),
  ADD KEY `fk_id_promotora_idx` (`id_promotora`),
  ADD KEY `fk_id_tipo_contrato_idx` (`id_tipo_contrato`),
  ADD KEY `fk_id_cliente_idx` (`id_cliente`),
  ADD KEY `fk_id_banco_emprestimo_idx` (`id_banco_emprestimo`),
  ADD KEY `fk_id_categoria_idx` (`id_categoria`),
  ADD KEY `fk_id_banco_cliente_idx` (`id_banco_cliente`),
  ADD KEY `fk_id_situacao_idx` (`id_situacao`),
  ADD KEY `fk_id_consultor` (`id_consultor`);

--
-- Indexes for table `tbl_meta`
--
ALTER TABLE `tbl_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orgao`
--
ALTER TABLE `tbl_orgao`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orgao` (`orgao`);

--
-- Indexes for table `tbl_promotora`
--
ALTER TABLE `tbl_promotora`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promotora_UNIQUE` (`promotora`);

--
-- Indexes for table `tbl_rs_solucoes`
--
ALTER TABLE `tbl_rs_solucoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_banco_creditado_idx` (`id_banco_creditado`);

--
-- Indexes for table `tbl_situacao`
--
ALTER TABLE `tbl_situacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tipo`
--
ALTER TABLE `tbl_tipo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_UNIQUE` (`tipo`);

--
-- Indexes for table `tbl_tipo_contrato`
--
ALTER TABLE `tbl_tipo_contrato`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_contrato_UNIQUE` (`tipo_contrato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banco_cliente`
--
ALTER TABLE `tbl_banco_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_banco_creditado`
--
ALTER TABLE `tbl_banco_creditado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_banco_emprestimo`
--
ALTER TABLE `tbl_banco_emprestimo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_consultor`
--
ALTER TABLE `tbl_consultor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_contrato`
--
ALTER TABLE `tbl_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_meta`
--
ALTER TABLE `tbl_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_orgao`
--
ALTER TABLE `tbl_orgao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_promotora`
--
ALTER TABLE `tbl_promotora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rs_solucoes`
--
ALTER TABLE `tbl_rs_solucoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_situacao`
--
ALTER TABLE `tbl_situacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tipo`
--
ALTER TABLE `tbl_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tipo_contrato`
--
ALTER TABLE `tbl_tipo_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD CONSTRAINT `fk_id_orgao` FOREIGN KEY (`id_orgao`) REFERENCES `tbl_orgao` (`id`);

--
-- Limitadores para a tabela `tbl_contrato`
--
ALTER TABLE `tbl_contrato`
  ADD CONSTRAINT `fk_id_banco_cliente` FOREIGN KEY (`id_banco_cliente`) REFERENCES `tbl_banco_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_banco_emprestimo` FOREIGN KEY (`id_banco_emprestimo`) REFERENCES `tbl_banco_emprestimo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_consultor` FOREIGN KEY (`id_consultor`) REFERENCES `tbl_consultor` (`id`),
  ADD CONSTRAINT `fk_id_promotora` FOREIGN KEY (`id_promotora`) REFERENCES `tbl_promotora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_situacao` FOREIGN KEY (`id_situacao`) REFERENCES `tbl_situacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tbl_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_tipo_contrato` FOREIGN KEY (`id_tipo_contrato`) REFERENCES `tbl_tipo_contrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tbl_rs_solucoes`
--
ALTER TABLE `tbl_rs_solucoes`
  ADD CONSTRAINT `fk_id_banco_creditado` FOREIGN KEY (`id_banco_creditado`) REFERENCES `tbl_banco_creditado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
