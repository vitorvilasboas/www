-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `siscop`
--
CREATE DATABASE `siscop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `siscop`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrativo`
--

CREATE TABLE IF NOT EXISTS `administrativo` (
  `ADM_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `USU_CODIGO` int(11) DEFAULT NULL,
  `ADM_CARGO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ADM_CODIGO`),
  KEY `FK_USUARIO_ADMINISTRATIVO2` (`USU_CODIGO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `administrativo`
--

INSERT INTO `administrativo` (`ADM_CODIGO`, `USU_CODIGO`, `ADM_CARGO`) VALUES
(1, 2013001, 'TI'),
(2, 2013005, 'Assistente Administrativo'),
(3, 2013009, 'Assistente Administrativo'),
(4, 2013010, 'Técnico Enfermagem'),
(5, 2013011, 'Operadora de Máquina'),
(6, 2013012, 'Operadora de Máquina'),
(7, 2013013, 'outro'),
(8, 2013014, 'ewew');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `DEP_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `DEP_NOME` varchar(255) DEFAULT NULL,
  `DEP_DESCRICAO` varchar(255) DEFAULT NULL,
  `DEP_VINCULO` varchar(255) DEFAULT NULL,
  `DEP_INSTITUICAO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`DEP_CODIGO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4006 ;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`DEP_CODIGO`, `DEP_NOME`, `DEP_DESCRICAO`, `DEP_VINCULO`, `DEP_INSTITUICAO`) VALUES
(4001, 'UPD', 'Unidade de Processamento de Dados', 'DIRECAO', 'IFTO - Campus Araguatins'),
(4002, 'DAP', 'Direção de Administração e Planejamento', 'DIRECAO', 'IFTO - Campus Araguatins'),
(4003, 'DDE', 'Direção Educacional', 'DIRECAO', 'IFTO - Campus Araguatins'),
(4004, 'DIRECAO', 'Gabinete do Diretor', 'OUTRO', 'IFTO - Campus Araguatins'),
(4005, 'REPROGRAFIA', 'Reprografia', 'DAP', 'IFTO - Campus Araguatins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `PROF_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `USU_CODIGO` int(11) DEFAULT NULL,
  `PROF_AREA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PROF_CODIGO`),
  KEY `FK_USUARIO_PROFESSOR2` (`USU_CODIGO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`PROF_CODIGO`, `USU_CODIGO`, `PROF_AREA`) VALUES
(2, 2013002, 'Informática'),
(3, 2013003, 'Agronomia'),
(4, 2013004, 'Letras'),
(5, 2013006, 'Paleontologia'),
(6, 2013007, 'Química'),
(7, 2013008, 'Geografia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicao`
--

CREATE TABLE IF NOT EXISTS `requisicao` (
  `REQ_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `USU_CODIGO` int(11) DEFAULT NULL,
  `REQ_DATA` datetime DEFAULT NULL,
  `REQ_TCOPIAS` int(11) DEFAULT NULL,
  `REQ_STATUS` varchar(255) DEFAULT NULL,
  `REQ_JUST` varchar(255) DEFAULT NULL,
  `REQ_AUT` int(11) DEFAULT NULL,
  `REQ_MNPAGS` int(11) DEFAULT NULL,
  `REQ_MNCOPS` int(11) DEFAULT NULL,
  `REQ_END` varchar(255) DEFAULT NULL,
  `REQ_MSG` varchar(255) DEFAULT NULL,
  `REQ_DTENTREGA` date DEFAULT NULL,
  `REQ_DEP` int(11) DEFAULT NULL,
  PRIMARY KEY (`REQ_CODIGO`),
  KEY `FK_REQUISICAO_USUARIO` (`USU_CODIGO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `requisicao`
--

INSERT INTO `requisicao` (`REQ_CODIGO`, `USU_CODIGO`, `REQ_DATA`, `REQ_TCOPIAS`, `REQ_STATUS`, `REQ_JUST`, `REQ_AUT`, `REQ_MNPAGS`, `REQ_MNCOPS`, `REQ_END`, `REQ_MSG`, `REQ_DTENTREGA`, `REQ_DEP`) VALUES
(1, 2013007, '2013-03-11 10:57:12', 80, 'Cancelado', 'Lista de Alunos SIGA', 2013007, 2, 40, '161616_ListaAlunos.pdf', 'Irei retirar pela tarde.', '2013-03-15', 4003),
(2, 2013007, '2013-03-11 10:59:39', 2, 'Aguardando', 'Contracheque para o RH', NULL, 1, 2, '2013007_contracheque.pdf', 'Urgente.', '2013-03-19', 4003),
(3, 2013007, '2013-03-11 11:00:46', 12, 'Autorizado', 'Calendario Escolar', 2013004, 3, 4, '2013007_Calendario.pdf', 'Á noite passarei na reprografia para retirar.', '2013-03-13', 4003);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `USU_CODIGO` int(11) NOT NULL AUTO_INCREMENT,
  `DEP_CODIGO` int(11) DEFAULT NULL,
  `ADM_CODIGO` int(11) DEFAULT NULL,
  `PROF_CODIGO` int(11) DEFAULT NULL,
  `USU_NOME` varchar(255) DEFAULT NULL,
  `USU_CPF` varchar(14) DEFAULT NULL,
  `USU_SIAPE` int(11) DEFAULT NULL,
  `USU_PERMISSAO` varchar(255) DEFAULT NULL,
  `USU_EMAIL` varchar(255) DEFAULT NULL,
  `USU_LOTACAO` varchar(255) DEFAULT NULL,
  `USU_FUNCAO` varchar(255) DEFAULT NULL,
  `USU_LOGIN` varchar(255) DEFAULT NULL,
  `USU_SENHA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`USU_CODIGO`),
  KEY `FK_USUARIO_ADMINISTRATIVO` (`ADM_CODIGO`),
  KEY `FK_USUARIO_PROFESSOR2` (`USU_CODIGO`),
  KEY `FK_USUARIO_DEPARTAMENTO` (`DEP_CODIGO`),
  KEY `FK_USUARIO_PROFESSOR` (`PROF_CODIGO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2013015 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`USU_CODIGO`, `DEP_CODIGO`, `ADM_CODIGO`, `PROF_CODIGO`, `USU_NOME`, `USU_CPF`, `USU_SIAPE`, `USU_PERMISSAO`, `USU_EMAIL`, `USU_LOTACAO`, `USU_FUNCAO`, `USU_LOGIN`, `USU_SENHA`) VALUES
(2013001, 4001, 1, NULL, 'ADM SISCOP', '717.653.878-68', 123456789, 'Root', 'dgti@ifto.edu.br', 'UPD', 'Administrador', 'admin', '25d55ad283aa400af464c76d713c07ad'),
(2013002, 4001, NULL, 2, 'Admin', '335.966.470-10', 87654321, 'Root', 'admin@ifto.edu.br', 'UPD', 'Administrador do Sistema', 'adm', '6ebe76c9fb411be97b3b0d48b791a7c9'),
(2013003, 4004, NULL, 3, 'Avaliador DG', '258.387.062-95', 101010, 'Avaliador', 'dg@ifto.edu.br', 'DIRECAO', 'Diretor', 'dg', '6d071901727aec1ba6d8e2497ef5b709'),
(2013004, 4003, NULL, 4, 'Avaliador DDE', '044.544.453-38', 90909, 'Avaliador', 'dde@ifto.edu.br', 'DDE', 'Diretor Educacional', 'dde', '63b96f7449223fcb75f28836e42f6db7'),
(2013005, 4002, 2, NULL, 'Avaliador DAP', '789.216.644-08', 80808, 'Avaliador', 'dap@ifto.edu.br', 'DAP', 'Diretor Administrativo', 'dap', '6dd3641aaa09a5e2b8f41e928271db9b'),
(2013006, 4003, NULL, 5, 'Professor Um', '677.834.029-09', 151515, 'Requerente', 'prof1', 'DDE', 'Professor EBPT', 'prof1', '858915f1d2d425959fd4da867ba6b599'),
(2013007, 4003, NULL, 6, 'Professor Dois', '552.335.113-04', 161616, 'Requerente', 'prof2@ifto.edu.br', 'DDE', 'Professor EBPT', 'prof2', '221d9123f0160352578878d99aa7f379'),
(2013008, 4003, NULL, 7, 'Professor Tres', '523.355.691-04', 171717, 'Requerente', 'prof3@ifto.edu.br', 'DDE', 'Professor EBPT', 'prof3', '746207de20752e1f51890764d6c2457f'),
(2013009, 4002, 3, NULL, 'Tecnico Administrativo Um', '632.248.635-79', 131313, 'Requerente', 'tae1@ifto.edu.br', 'DAP', 'Chefe CPL', 'tae1', 'e04755387e5b5968ec213e41f70c1d46'),
(2013010, 4002, 4, NULL, 'Tecnico Administrativo Dois', '658.064.481-85', 141414, 'Requerente', 'tae2@ifto.edu.br', 'DAP', 'Chefe do SOE', 'tae2', 'd0fc0b3e9b4e6e85c06fa4687921f481'),
(2013011, 4005, 5, NULL, 'Funcionario Um', '508.370.937-67', 111111, 'Reprografia', 'func1@ifto.edu.br', 'REPROGRAFIA', 'Copiador', 'func1', '96e79218965eb72c92a549dd5a330112'),
(2013012, 4005, 6, NULL, 'Funcionario Dois', '744.454.381-03', 121212, 'Reprografia', 'func2@ifto.edu.br', 'REPROGRAFIA', 'Copiadora', 'func2', '8ce87b8ec346ff4c80635f667d1592ae'),
(2013013, 4003, 7, NULL, 'outro', '257.911.551-07', 123456, 'Avaliador', 'tttt', 'DDE', '', 'vitor', 'e10adc3949ba59abbe56e057f20f883e'),
(2013014, 4001, 8, NULL, 'Vitor', '484.846.397-11', 323223, 'Reprografia', 'www', 'UPD', 'qqq', 'fgfg', '11c5587af2863955b7c04c59a8732ccc');

--
-- Gatilhos `usuario`
--
DROP TRIGGER IF EXISTS `trg_usu_exclui`;
DELIMITER //
CREATE TRIGGER `trg_usu_exclui` BEFORE DELETE ON `usuario`
 FOR EACH ROW begin
	delete from administrativo where usu_codigo = old.usu_codigo;
        delete from professor where usu_codigo = old.usu_codigo;
	END
//
DELIMITER ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `administrativo`
--
ALTER TABLE `administrativo`
  ADD CONSTRAINT `FK_USUARIO_ADMINISTRATIVO2` FOREIGN KEY (`USU_CODIGO`) REFERENCES `usuario` (`USU_CODIGO`);

--
-- Restrições para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `FK_USUARIO_PROFESSOR2` FOREIGN KEY (`USU_CODIGO`) REFERENCES `usuario` (`USU_CODIGO`);

--
-- Restrições para a tabela `requisicao`
--
ALTER TABLE `requisicao`
  ADD CONSTRAINT `FK_REQUISICAO_USUARIO` FOREIGN KEY (`USU_CODIGO`) REFERENCES `usuario` (`USU_CODIGO`);

--
-- Restrições para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_USUARIO_DEPARTAMENTO` FOREIGN KEY (`DEP_CODIGO`) REFERENCES `departamento` (`DEP_CODIGO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
