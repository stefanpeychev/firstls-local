-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2017 at 12:08 AM
-- Server version: 5.5.54-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `h1egiteu_firstls`
--

-- --------------------------------------------------------

--
-- Table structure for table `fls1egvn_teachers`
--

CREATE TABLE IF NOT EXISTS `fls1egvn_teachers` (
  `t_nr` int(11) NOT NULL AUTO_INCREMENT,
  `egn` varchar(255) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`t_nr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `fls1egvn_teachers`
--

INSERT INTO `fls1egvn_teachers` (`t_nr`, `egn`, `t_name`, `email`, `password`, `status`) VALUES
(1, '9e557cd88f4393ca823498ed378923c7', 'Веселин Иванов Василев', 'firstls@abv.bg', '2595627ce75f65c5a113d61f9b2eed38', 0),
(2, 'cb4d7b0a50cc777ac95898533dff467d', 'Ангел Атанасов Митев', 'angel.mitev@gmail.com', 'badbdbeb91eb5848597b28534a03cc9f', 0),
(3, '0c488dee171f2799bf3c852bda2d9ea0', 'Росица Илиева Стоева', 'rositsa_stoeva@abv.bg', 'ae850ff42b593327bfcada72ee8ee86f', 0),
(4, '2fbc7410b211f172fc1612ab95f9a4b6', 'Атанаска Димитрова Вълчева', 'a.d.valcheva@gmail.com', '1d234d30395eda6ba0186572c4587e3e', 1),
(5, '00f2a9ef1835182b552b5a280a045662', 'Румен Колев Колев', 'rumenkoleff@abv.bg', 'b9c93fbdfd2a30504e05d3b0b32307da', 0),
(6, 'cd4d99165c4ccb813ab7847919faad4b', 'Ели Костадинова Герова', 'ekkostadinova@abv.bg', '24c5fb1816b69e4e5fd2a2d62874aee5', 3),
(7, 'c138a19718c6a8e26a1f83b47455d18d', 'Румяна Златева Златева-Кънчева', 'rumizlateva@abv.bg', '08f4b2f0e0de19e9e39f4b8fb97e5a40', 0),
(8, 'daa1c16ff1b52aac9fa0db3845f06e36', 'Диана Михайлова Куюджуклиева', 'didiku@abv.bg', '28652180106bc63ceea7d6aaf2a7246d', 0),
(9, 'b926c54ad465d754e0f154eba53a7c5f', 'Валентина Колева Попова', 'val_popova@abv.bg', '8254d4cdf785ee9f6a8b923f381c5903', 0),
(10, 'a0d6a777508d61dd185a324412b12de1', 'Драгомир Калчев Чанков', 'd.chankov@abv.bg', '80bb7b46ad30857f965b9e9eed3067ea', 0),
(11, 'f9eba6c01a314fcb316c71c49b9a7d6b', 'Маргарит Вахарш Мерджанов', 'margarit_merdjanov@abv.bg', 'c902805547a4b747fb7f69a044601b69', 0),
(12, '488607a0093489e88d084b638e4224d7', 'Виолета Георгиева Колева', 'vikoleva@abv.bg', 'ef2e3e3b57002d8c8a37e12c44c83aa7', 0),
(13, '7a160f9d65b8c6e92a18db048244d080', 'Пламен Славков Панчев', 'pantschev@gmail.com', '954968116875bf16899deb4e3bc6ad6a', 0),
(14, 'f48ec0a11c57b4c86ecf40f78f29ddfe', 'Милена Ганчева Георгиева', 'milenagancheva@gmail.com', '23fae3b1d3e0e9e4166e44f850e11b66', 0),
(15, '9ccf1d677895a767db45814f1fc3eeb6', 'Елисавета Стефанова Стателова', 'e.statelova@gmail.com', 'fbb6d86070824704f0b4cd6aa27b519a', 0),
(16, 'a82eb8518c3ec443eec3471cfa14937a', 'Тинка Методиева Антонова', 'tinkametodieva@gmail.com', '2a94d85225c772c854f3f45877fe2317', 0),
(17, 'a6312fd83a2d7259514c84e1afa02570', 'Пресиана Тошева Йоргакиева', 'cinderella_89@mail.bg', '0f7ccd5a0b24dcbf9f91c9f5d34a153c', 0),
(18, '36937a174a96f7cab4a327020205c99c', 'Димитрина Вълчева Иванова', 'dimitrina68@abv.bg', '96971ad962c59db5328343dc21f4f1ff', 3),
(19, '20029be6475ffcc2bf65b503d2c14f5d', 'Велина Иванова Обретенова', 'velina.obretenova@gmail.com', '73fe9e718740d6ad2f50939ee53648c5', 0),
(20, 'e3e80ad7f19c5c8300b4b11cb56971d0', 'Гергана Георгиева Герова-Иванова', 'gery_gerova@yahoo.com', '6253e1406b64bbe6ba7b00ac0bf81257', 0),
(21, '02b2493561c115224045dfc850395622', 'Екатерина Светославова Славова', 'katiaslavova@yahoo.com', '91b8d854aaa4f92962e5950699316d6c', 0),
(22, 'd198af77269942ca7fc3fab460873d98', 'Донета Лалева Митева', 'doneta_miteva@yahoo.co.uk', 'a1fdc8ae809acc9852c7946752428da2', 0),
(23, '1d10623c9017ef66768d86c12d314efa', 'Йорданка Димитрова Трифонова', 'ioritrifonova4@gmail.com', '1c360d0e4b8809f8ded8412200b191c4', 0),
(24, '754e1437a386ff1b07a0031e91926e73', 'Татяна Димитрова Караиванова', 'tatyanakaraivanova@abv.bg', '891df783dfaf5997eee18ff39e982d32', 0),
(25, '21c528716d04e062d15e15342bf0d353', 'Светла Кирилова Колева', 'sv_kirilova@yahoo.com', '0e1554137b8cd6000851675cf0295925', 3),
(26, '24e7919c259f3d31232e75f6f7fdd961', 'Даниела Енева Атанасова', 'didche86@abv.bg', '745ef8b9e927efe0d2e40545d35e0a8a', 0),
(27, '00fb89bc2af81029d40e9c8aba0d8ba3', 'Теодора Асенова Серафимова', 'tender.inspiration@yahoo.co.uk', 'af5d2b5120f77bd4efb1e3b7e4a0b53d', 0),
(28, 'a9579414787b0082be8e077b61bbf8eb', 'Светла Илиева Пенчева', 'svetla_pencheva@abv.bg', '61afa8def9694cbe01ce47930a666270', 0),
(29, '810fc8492aeff97ef2e6f95c58a5f622', 'Павлина Йовчева Стоянова', 'paza_elektra@yahoo.com', '1ba761afc577de7a37512c4395c4ad36', 0),
(30, '9ea43cf67954350dd658576281fa56aa', 'Дора Петрова Лазарова', 'doralazarova96@abv.bg', 'b15a6dc0504b6492da003e623d84e527', 0),
(31, 'd1f964388307beb0b5f9660cb1a5abbf', 'Дарина Георгиева Гаджева', 'darinagadzheva@gmail.com', '277d2c6992b86a2d651a5ed7f89489d7', 0),
(32, 'b7eb815c51b4ff2929181bb0f2503e1e', 'Теодора Христова Жекова', 'thpetrova09@abv.bg', 'edf218fd0838873e8184bd168da2d6c7', 0),
(33, 'ed1d741b2dd51fcafba38839b80edd0a', 'Олга Стефанова Касабова', 'o.kasabova@gmail.com', 'e1466697859e7f6f5b7c5938bed9dbbd', 0),
(34, 'dd5b07df2e52394ae171ed805f4aea04', 'Полина Йовчева Стоянова', 'popilina1977@yahoo.com', '8e96c299d66662f6ad9636b9bfc25425', 0),
(35, '573d61a130e64ffaca3c418889f37865', 'Сияна Атанасова Каросерова', 'siatka@abv.bg', '93898dc8277b8fb92fcd9b24fecdcf4b', 0),
(36, '336a4bf7cc5377685daa91cb667da0b6', 'Катерина Огнянова Караиванова', 'katerina_karaivanova@yahoo.com', 'e6d2e9e244f3e892de739232221200b1', 0),
(37, 'fb492169906f5ffd1a925741a6f4eaa1', 'Мартина Симеонова Тодорова', 'martina.todorova@hotmail.com', 'fad852307a1f38080c00f7a01f9d02ff', 0),
(38, 'b7f17a1e4c1f9e724dce0d5fe18e8dac', 'Станимира Петрова Мирчева', '', '', 0),
(39, '24f9e747612a6aaf7c9df3a04d62b2cd', 'Ивалина Йорданова Петрова', 'ipetrova94@abv.bg', '97f2aeaede4c034eba935b78f61af58f', 0),
(40, '3a1fba20b24b6f410b446feefa4d458f', 'Радка Антонова Христова', 'hristova_radka@abv.bg', '569e19539f4bcd6510cf00ec1f4775c6', 0),
(41, 'e2da39ca9ce991fff3daacec2faaeb13', 'Виолета Добрева Витлянова', 'vitlianova@abv.bg', '1ac0d72d238c86b2029c8419ba2574a2', 0),
(42, '0596f5b47a66bbc9d7c05797a4a5701c', 'Елена Иванова Каракулакова', 'elena1955@abv.bg', '925d7518fc597af0e43f5606f9a51512', 0),
(43, '0289b25768536ef3ade79edcad884117', 'Десислава Атанасова Атанасова', 'atanasovi_gad@abv.bg', '13c66216d44019105cfc38cf5d64823b', 0),
(44, '46d20b4ba6d40f4259f9475938e9a59a', 'Светломира Ангелова Грозева', 'grozeva_svetla@yahoo.com', 'a9a3ca8f7be6332dde3208aaddbbfb78', 0),
(45, 'f9a8e09b15083ab46e371db8918d5b13', 'Веселин Ангелов Първанов', 'veselin.parvanov@abv.bg', '59ec9c23d0e4cafc5feccd071c42b8ec', 0),
(46, 'cbedd179ae2835603a6a0f0357886403', 'Стефан Великов Стефанов', 'stefanov_sv@abv.bg', '8156fa3f08b7220d0db5d549de338462', 3),
(47, '06a05df8bcdc90c0480bd1496cd52356', 'Ирина Георгиева Филипова', 'rak.deva@abv.bg', '60cc2b41188e302d8e02a3d46a7a0840', 0),
(48, '1f0258d0e9db890da2c8284881d63904', 'Стефан Йорданов Пейчев', 'stefan.pejchev@gmail.com', '7e7671c839299832a9e8dbea73e57b58', 2),
(49, 'bc22cb625ce4ca9bbede9cca1c0e74d3', 'Анелия Христова Георгиева', 'a.georgieva11@abv.bg', '3baa271bc35fe054c86928f7016e8ae6', 1),
(50, 'a149979aa5c42483f056817fdd3b41d5', 'Снежина Евгениева Желева', 'peg_varna@abv.bg', '4d5ed546a3801a7694b048bbdc0dcc01', 0),
(51, '53977f98da1a3d530ace0fea0083f9fc', 'Николай Пламенов Стойчев', 'stoychew@abv.bg', 'e10adc3949ba59abbe56e057f20f883e', 0),
(52, '4d91c0cadcfbaabee7dbcbda31fde8f9', 'Петя Илиева Антонова', 'antonova_p@abv.bg', '087bcc978d7ddd6e1c6e2358cfedbf9a', 0),
(53, '5d213ff3af35d8a1fa94bcbdb0ab640a', 'Татяна Стефанова Лефтерова-Стойчева', 'tanjaleft@abv.bg', '9319a7df7933a63da3a90e42a8b5cd6f', 0),
(54, 'e89e026adf86fde87a6f551d2a68fa8e', 'Деян Цветков Маринов', 'd_marinov54@abv.bg', '2b84cd5da64a828bd859b18535c9345e', 0),
(55, 'dd519bce4a3859a37ef406cd3c6919e3', 'Зорница Стоянова Градева-Върбанова', 'z.gradeva@abv.bg', 'e80397aa42beba3bf6e9923221578e3c', 3),
(56, '2b577e79550c44c918cd982ecc128711', 'Стойко Атанасов Няголов', 'niagolov7@abv.bg', 'f1abb389a54cf3e8836f194736360128', 0),
(57, '38168bcb032e44e015a99e8b4ce75886', 'Нела Иванова Димова', 'nelidimova65@abv.bg', '04fc711301f3c784d66955d98d399afb', 0),
(58, '11516fb9e9c983787711669144b89f44', 'Мария Атанасова Симеонова', 'mariasimeonoff@yahoo.de', '2d724611d21e4c362da948b92339d8db', 0),
(59, '157115d1ae940c4410d33f099377035f', 'Асен Василев Устапанов', 'a.ustapanov@gmail.com', '93ef375163f5f5cf6410c10373564004', 0),
(60, 'df022435b5e9bc8fe58a4ddfa8e92487', 'Петя Андонова Андонова', 'vesniktrud@abv.bg', '76f7f45a976c77f4c686dc74afd5c3d7', 0),
(61, '6c6d8ad2cd213ddd4f45e2beaa0ae595', 'Галина Христова Георгиева', 'galia_georgieva@mail.bg', '1122644e2d0a5adbaf2726d8c3c2da42', 0),
(62, '85e399c7328353be8cf48d8bc588e474', 'Петранка Ванкова Тодорова', 'petranka_v@abv.bg', '05e7d19a6d002118deef70d21ff4226e', 3),
(63, 'd93f37f45ad144fb3ecd9fb4b310eba6', 'Илияна Стоянова Коларова', 'i_kolarova@abv.bg', '7740c188be18aca1000e3442c763663f', 0),
(64, '91e608d3b9aaaba2bfb064aeb3c76018', 'Антоанета Стоянова Георгиева', 'anisg@abv.bg', '3c0689cc25c9e8df7a5943e8c40a9725', 0),
(65, '503af1e89e489080b8ee336c2a04707b', 'Борис Георгиев Гочев', 'boris.gochev@gmail.com', '4419539583d9881e41e2c8489e4607cd', 0),
(66, '41a18d3417014852d426cb401461234f', 'Милена Тодорова Илиева', 'pla_mil@abv.bg', '7be2cd68dd6c60e55a5e731e635decab', 0),
(67, '134004301ca20437a0487774d792d67c', 'Милена Марчева Боева', 'milboewa@abv.bg', '22a65f9ed7605e33f50ed998fef4b956', 0),
(68, '3c0e1de1a0352a5af8649c2a70ab722a', 'Маргарита Димитрова Димитрова', 'mrgrt@abv.bg', '98dfa985498fb57773d04eb9c3e541a0', 0),
(69, 'b5daf3121c732d3103bd088182c435ea', 'Евелина Георгиева Геловска', 'gelovska_e@abv.bg', '28b8922ef8d6a59784782f4c20d9a395', 0),
(70, '59c13d6c5008fdd21271a01363820222', 'Снежина Христова Станчева - Желева', 'svezhart@yahoo.com', '30714de5b81ba204e4951eb861b676b0', 0),
(71, '05c7aaddf9ec7e3eb131180c64735b8f', 'Станимир Владимиров Диков', 'st_dickov@abv.bg', 'f129edf1c18a458fb0904b626bb131c3', 0),
(72, '8b85863502bc960187a08d435a3cd2a7', 'Методи Николаев Миланов', 'metod@mail.bg', 'ee0682d4281538ba6a0ffcaaf0752d34', 0),
(73, '133bf5928a74a270d65b8ad2b0270a51', 'Катя Сивенова Алипиева', 'katyaalipieva@abv.bg', 'd180c4c17a3e1949b3f87ba7d0a73059', 0),
(74, '992624c731678c89724413e0ba19cdc1', 'Цецко Благоев Цеков', 'tsetso141@abv.bg', '25f2e39c76511345384f515e1c101128', 0),
(75, '40df34526511026a562f35e841fd725a', 'Дочко Христов Думанов', 'dochko_dumanov@abv.bg', 'bfadcf3b90157f6e200514479e04d554', 0),
(76, 'd7c65638acadb544035ad7e2f50a906d', 'Полина Василева Стойнова', '', '', 0),
(84, '151e42f4507efd85f23a763e8705e389', 'Росица Кирилова Тодорова-Божкова', 'rossikirilova@abv.bg', '4bf3df251b1c1b574586aa994703aba9', 3),
(85, '46756f63803032058e5950298a4e5838', 'Красимира Неделчева Гавазова', 'krassng@abv.bg', '15a1180a96f17967fc32b4cd734c0214', 3),
(86, '4a2f863c0a0ad3d312a0bda53787aea3', 'Костадин Иванов Дюлгеров', 'salvado_dali@abv.bg', '55ebb77bb882eebdc0bfe2f5e264114e', 3),
(87, 'c3aa0a554cb97c966f0079c8901190aa', 'Сиана Тодорова Шивачева', 'scandy@abv.bg', '9a231dd5243775abe614b38d64df10e3', 0),
(88, 'f33b2bd144b3cd5a7c1d9f4ab76b3b47', 'Диана Якимова Дарелова', 'd_darelova@abv.bg', '11f222d313a9f29805871b11f7c1af6e', 0),
(89, 'a561f9719e158ef6b9dea839a2d1ba42', 'Диана Живкова Филипова', 'diana777@abv.bg', 'aef04fb09223a754df1fe5d31d9c697c', 0),
(90, 'bda5a22c4023d6a3cadaef037c692748', 'Галина Василева Георгиева', 'galinageorgieva89@abv.bg', 'dceff7d96e4ef6ac9c8b0b7a8fb4b0d0', 0),
(91, 'a34e77335581906325d54c104d49ba0c', 'Анка Койчева Добрева', 'anidob2000@yahoo.de', '33a1fecb5a1c5863874edbb30699ebf5', 0),
(92, 'cdf520dd140219e69b1e5b1e8a0c656c', 'Кремена Симеонова Анастасова', 'aanastasova74@gmail.com', '11e34f0137749f3e4ed97282af3cb32b', 3),
(95, 'd73a716e325fd9dbf7bf37764ae9c1d3', 'Гергана Славова Христова', 'g.hristova@nvna.eu', '6e4f3605739348b5d85f24f9fdb7530b', 0),
(96, '79eb33cb24244c93967ef063192bf7a8', 'Владимир Анчев Атанасов', 'Flutu@abv.bg', '5ae21533f62bc2015c2092cff7304b92', 0),
(97, 'ae632147482618fed78b574ba6a7b195', 'Добринка Стоянова Станкова', 'stankova63@abv.bg', '14d5fab2f7592501edf355abd663cac7', 0),
(98, '0fb73890e746dea16ed25b8062940227', 'Пролетина Христова Ганева', 'proletinaganeva@gmail.com', 'dd055f53a45702fe05e449c30ac80df9', 0),
(99, '61d5660c7364e5a316d229817869c735', 'Елена Койчева Ангелова', 'e.angelova11111@gmail.com', '177c64fb28fcdcaf3a91303ec50f14bd', 0),
(100, '8e49edabef624a127ed1e79a6c2eea43', 'Елена Калоянова Топачарова', 'elena_topacharova@abv.bg', '48de2b66577a24b521c674964e71733a', 0),
(101, '60a604442ede25b073ed4dba6fd67649', 'Добринка Паскалева Тодорова', 'dobrinkatodorova@abv.bg', '888e931d6360ee143df0d552f955299a', 0),
(102, '81723b79f6c7e51fe5bf0b9c63b1b320', 'Яница Боянова Янева', 'ianitsa_01@abv.bg', '9a7bd9265e6d6e83bd1f5fb4e6382c78', 0),
(103, '2f6b7c597173ad5eab2ba9df1491ed5c', 'Тест', 'test@1egit.eu', '25d55ad283aa400af464c76d713c07ad', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
