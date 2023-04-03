CREATE DATABASE IF NOT EXISTS `eleicao` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `eleicao`;

CREATE TABLE `candidato` (
  `cand_id` int(11) NOT NULL,
  `cand_nome` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `cand_qtd` int(11) DEFAULT NULL,
  PRIMARY KEY (`cand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `candidato` (`cand_id`, `cand_nome`, `cand_qtd`) VALUES
(1, 'Candidato 1', 0),
(2, 'Candidato 2', 0),
(3, 'Candidato 3', 0),
(4, 'Candidato 4', 0),
(5, 'Nulo', 0),
(6, 'Branco', 0);