CREATE DATABASE IF NOT EXISTS `loja` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `loja`;

CREATE TABLE `cliente` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(255) DEFAULT NULL,
  `cli_cpf` varchar(14) DEFAULT NULL,
  `cli_telefone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `cliente` (`cli_id`, `cli_nome`, `cli_cpf`, `cli_telefone`) VALUES
(1, 'Fulano da Silva', '111.111.111-11', '99999-8888'),
(2, 'João Oliveira', '756.985.321-56', '98875-0987'),
(3, 'Maria da Flores', '095.873.276-87', '93245-0967'),
(4, 'Josiane Correia', '784.350.641-03', '99214-5438'),
(5, 'José Martins', '544.386.095-23', '99678-8900');

CREATE TABLE `produto` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_nome` varchar(255) DEFAULT NULL,
  `prod_preco` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `produto` (`prod_id`, `prod_nome`, `prod_preco`) VALUES
(1, 'Notebook Dell i15 7567', 6299.00),
(2, 'Mouse sem fio', 43.55),
(3, 'Teclado bluetooth ABNT2', 96.75);

ALTER TABLE `cliente`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `produto`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;