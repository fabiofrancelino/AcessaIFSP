CREATE TABLE `aluno` (
  `prontuario` int(11) PRIMARY KEY NOT NULL,
  `nome` varchar(200) NOT NULL,
  `curso` varchar(200) NOT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `cartao` varchar(150) NOT NULL
);

CREATE TABLE `registro` (
  `id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `dado` varchar(250) NOT NULL,
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `aluno` (`prontuario`, `nome`, `curso`, `endereco`, `cidade`, `estado`, `telefone`, `celular`, `email`, `foto`, `cartao`) VALUES
(1420127, 'Fabio', 'ADS', 'Av. Minas Gerais 171', 'Sumaré', 'SP', '9999-9999', '9999-9999', 'fabio@acessaifsp.com.br', 'img/avatar/fabio.jpg', '');

INSERT INTO `registro` (`id`, `dado`, `hora`) VALUES
('', ' 1420127\n', '2018-02-04 12:38:05');