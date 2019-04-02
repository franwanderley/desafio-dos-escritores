-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Mar-2019 às 13:34
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artigos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigos`
--

CREATE TABLE `artigos` (
  `id` int(11) NOT NULL,
  `temaid` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `resumo` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `date` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `artigos`
--

INSERT INTO `artigos` (`id`, `temaid`, `titulo`, `resumo`, `texto`, `date`) VALUES
(23, 12, 'Lorem Impsu 2', 'Mollis phasellus pulvinar magna phasellus per odio volutpat, auctor venenatis at ultricies odio litora diam ultrices, etiam proin velit facilisis ultrices egestas. pretium euismod vivamus imperdiet vestibulum leo hac', '<p><strong>Lorem ipsum</strong> gravida metus quis venenatis torquent fermentum volutpat sed aenean posuere morbi dui nullam mollis, commodo pretium scelerisque facilisis sit ac congue placerat nam himenaeos ad orci hac nullam. taciti est nullam duis rutrum proin quisque orci etiam ac, convallis arcu accumsan mauris velit laoreet volutpat maecenas, curae ipsum sed eget potenti phasellus velit tristique. a imperdiet turpis proin fermentum netus curae, suspendisse ut ad lacus arcu iaculis ornare, sodales convallis adipiscing ipsum purus. integer pulvinar malesuada ultricies nullam morbi urna dolor phasellus imperdiet, duis vulputate elit pharetra diam massa <i>scelerisque sapien, luctus convallis curabitur ligula primis quisque tempor suscipit.</i> &nbsp;<br><br>Elit convallis hac fames venenatis odio litora rutrum fusce in erat, sit risus massa lobortis facilisis suscipit tellus vestibulum duis. lectus platea gravida pharetra arcu pellentesque venenatis maecenas himenaeos class cubilia rhoncus accumsan habitant quam, risus ac per ante velit praesent eget aenean purus porta feugiat aptent. ad id aptent nunc massa justo maecenas ornare donec euismod, luctus lacinia sem gravida platea torquent himenaeos pharetra, eleifend metus semper donec pretium adipiscing id aliquam. porttitor fringilla venenatis velit orci morbi tempor luctus ipsum, nec habitasse praesent commodo phasellus lectus nisl erat, ut massa habitasse quis aptent torquent fames. &nbsp;</p><p>&nbsp;</p><blockquote><p><br><br>Class molestie curae sapien conubia curabitur pharetra vulputate tempus rutrum, orci condimentum auctor dui nostra mattis aptent platea, consectetur ante <i><strong>quam mauris eget aliquam</strong></i> feugiat faucibus. potenti inceptos vitae praesent laoreet eget mattis amet nisl diam ante fermentum, feugiat torquent hac convallis class sem neque ante eu mi, ipsum fringilla aliquet proin conubia nec purus tristique diam mi. cras ac pellentesque aliquam <strong>neque lacinia quam aliquet tincidunt</strong>, tempus tempor congue pellentesque curabitur nam. fringilla vulputate proin ac gravida integer quam quisque, consectetur erat lectus condimentum dictumst massa interdum, nec justo sit mauris vivamus curabitur. &nbsp;<br>&nbsp;</p></blockquote><p><br>Lorem aenean aliquet donec consequat placerat sociosqu potenti sodales tristique enim rhoncus, a sit condimentum aptent lacinia ultrices ultricies tempor pharetra taciti rhoncus molestie, tellus euismod eget aenean consectetur libero etiam aptent aenean etiam. sociosqu quam sem eget hendrerit augue adipiscing proin neque praesent consectetur amet ac metus fringilla mollis, curae vestibulum nullam malesuada pretium nulla non vivamus consectetur a viverra tempor leo sollicitudin. nunc imperdiet mauris quisque enim pellentesque pharetra aenean nec ligula, viverra dictumst velit platea netus consectetur fames lectus. curae iaculis nulla quisque gravida aliquam scelerisque tempus lacinia curabitur adipiscing, arcu magna porta volutpat augue curae tellus lectus interdum cubilia, fusce pulvinar conubia quam facilisis augue aenean lacinia dictumst. &nbsp;<br><br>Sociosqu suspendisse integer quisque aenean phasellus, sociosqu quam bibendum massa quis vivamus, magna velit duis phasellus. at sit tellus duis etiam aenean platea id facilisis auctor senectus, tincidunt feugiat sed blandit accumsan sollicitudin molestie est etiam luctus commodo, vitae luctus gravida a suscipit nisl mauris sed tristique. blandit felis malesuada id dictum taciti urna aliquet odio curabitur, ante fermentum morbi augue laoreet egestas enim accumsan, aenean ut gravida praesent vulputate facilisis aliquam suspendisse. eget ad praesent tincidunt mauris vulputate tempus quisque etiam quis, quisque tellus ornare commodo cras netus nam vehicula diam consectetur, et imperdiet interdum ut nibh gravida ut est.&nbsp;</p><figure class="table"><table><tbody><tr><td>lorem</td><td>doloris</td><td>impsu</td></tr><tr><td>qwqwwe</td><td>qqweer</td><td>gfbnfgnbfgnbg</td></tr><tr><td>vdfgrfgfdgrt</td><td>qwegfdgfd</td><td>qerww</td></tr></tbody></table></figure><p>&nbsp;<br><br>Mollis phasellus pulvinar magna phasellus per odio volutpat, auctor venenatis at ultricies odio litora diam ultrices, etiam proin velit facilisis ultrices egestas. pretium euismod vivamus imperdiet vestibulum leo hac, nostra tortor tincidunt lacus aenean magna quisque, elementum litora quisque potenti pellentesque. erat cursus ac pulvinar nostra himenaeos curabitur habitasse dictum mi consectetur eros, non pulvinar rutrum posuere dolor neque tincidunt mi sodales ultrices conubia curae, in diam adipiscing accumsan sagittis phasellus volutpat maecenas imperdiet vel. risus phasellus euismod arcu rhoncus ultricies pellentesque elementum, suscipit varius feugiat dapibus elementum ad, eleifend ullamcorper dolor sodales nullam molestie.&nbsp;</p>', '21/3/2019'),
(22, 11, 'Lorem Impsu 1', 'Vivamus ullamcorper at maecenas senectus curabitur pulvinar tristique urna orci, iaculis porttitor integer curabitur curae sollicitudin mauris aenean venenatis, cubilia fusce torquent nunc lacinia etiam egestas bibendum.', '<p><strong>&nbsp;Lorem ipsum</strong> ac nisi hendrerit lacus et aenean ante condimentum vel, est mauris ullamcorper cras class lorem justo purus sed rutrum, fusce nam justo curae cursus dui luctus accumsan mauris. fames aliquam aenean litora tristique mattis fusce senectus magna conubia, mollis cubilia viverra et gravida accumsan etiam vivamus, lobortis interdum lorem aliquam elementum taciti nostra euismod. id interdum condimentum nec vestibulum habitant mi augue lobortis ut aenean et, varius feugiat commodo at cubilia curae potenti faucibus ad arcu litora accumsan, torquent mollis commodo curae auctor aliquam curae gravida ante habitant. &nbsp;<br><br><i>Cursus vestibulum aliquam blandit tortor eu vel neque diam tempor ullamcorper amet</i> aliquet pellentesque bibendum, curabitur sodales lobortis elit vivamus vulputate justo suscipit ullamcorper habitasse ad suspendisse. risus aliquam in feugiat at torquent etiam himenaeos erat eget, auctor molestie accumsan integer auctor metus donec porttitor, nisi dictumst leo molestie viverra torquent elementum vitae. ad tellus enim per sapien ornare quis cras, nibh etiam libero blandit neque amet conubia suscipit, eu id erat rhoncus rutrum tempor. porta quisque nostra magna conubia etiam bibendum auctor curae iaculis, molestie posuere fames nisl ac consectetur massa donec, ut sagittis congue dolor fusce ut a phasellus. &nbsp;<br><br><i>Vivamus ullamcorper at maecenas senectus curabitur p</i>ulvinar tristique urna orci, iaculis porttitor integer curabitur curae sollicitudin mauris aenean venenatis, cubilia fusce torquent nunc lacinia etiam egestas bibendum. nunc fermentum enim eleifend iaculis lectus etiam facilisis primis, luctus quisque vivamus donec aenean vestibulum potenti, dictum phasellus rhoncus ad netus fringilla aenean. suscipit pulvinar ultrices placerat habitant orci suscipit arcu donec platea laoreet luctus egestas etiam nibh, rutrum habitasse inceptos facilisis rutrum volutpat scelerisque egestas massa viverra vehicula rhoncus dui. habitant curabitur libero enim litora vitae, in venenatis duis curabitur fermentum eu, nisi senectus etiam libero. &nbsp;<br><br>Aenean eu integer vulputate interdum fames ante fames proin tempor eleifend, urna massa volutpat magna mauris aenean hac sapien proin, sollicitudin ultrices orci sollicitudin tortor phasellus laoreet massa posuere. etiam eleifend quisque etiam condimentum mattis facilisis dolor nullam, tellus placerat tortor porta ipsum ultricies nulla eu rhoncus, molestie inceptos fringilla sem velit consectetur lobortis. vulputate tempus facilisis eros erat enim amet vitae, quam orci inceptos consectetur lectus vel, rutrum aliquam nam dapibus neque nostra. tempor quisque sit nullam fames vestibulum arcu euismod ultricies condimentum rutrum, aliquet nullam mauris interdum phasellus ut praesent varius in. &nbsp;<br><br>Ut turpis malesuada curae enim quisque nostra placerat metus mi nunc, cubilia vivamus torquent ante aenean lobortis luctus platea habitasse. tincidunt enim habitant elementum facilisis convallis, elit mauris sagittis vehicula. purus tempor pulvinar integer neque metus molestie nec dictumst, risus donec suscipit blandit maecenas libero faucibus, vel tortor blandit risus aenean lectus vulputate. purus amet convallis sed a ac faucibus, etiam malesuada cursus risus vestibulum in felis, aliquam lobortis non feugiat ipsum. consectetur hac auctor laoreet tincidunt sapien justo condimentum nulla, lobortis feugiat ultricies rhoncus class sem sit. non enim suspendisse quam erat aenean donec ac quisque ut turpis malesuada aliquam, accumsan condimentum amet integer lobortis hac amet quisque suscipit rutrum in. &nbsp;<br><br><i>Cras inceptos diam ornare mi nisi, risus phasellus hac.&nbsp;</i></p>', '21/3/2019');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tema`
--

INSERT INTO `tema` (`id`, `nome`) VALUES
(12, 'gastronomia'),
(11, 'moda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `email` varchar(64) NOT NULL,
  `vemail` tinyint(1) NOT NULL DEFAULT '0',
  `nivel` int(11) NOT NULL DEFAULT '1',
  `senha` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `vemail`, `nivel`, `senha`) VALUES
(13, 'wanderley', 'wanderley3101@gmail.com', 1, 2, '5dc3f061014ea0fb6d7db54318e5bc3d'),
(12, 'stuart', 'stuartgato@gmail.com', 0, 1, '6563a40641269184dae6f2c215bb3335'),
(14, 'socorro', 'socorro@gmail.com', 0, 1, 'f8461b554d59b3014e8ff5165dc62fac'),
(15, 'Rafael', 'franwanderley@outlook.com', 1, 1, '83b8089bba156f7da0b76af1d593bb79');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo` (`titulo`);

--
-- Indexes for table `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `senha` (`senha`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artigos`
--
ALTER TABLE `artigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
