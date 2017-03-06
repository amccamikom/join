CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`);
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `member` (
  `nim` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `asal_sekolah` varchar(255) DEFAULT NULL,
  `divisi` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `noHp` varchar(255) DEFAULT NULL,
  `noReg` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
  PRIMARY KEY (`nim`);
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
