CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
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
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admin` (`id`, `email`, `password`, `created_at`) VALUES (NULL, 'admin@amcc.or.id', '$2y$10$vahBv3GevBuExSoYwH5Ps.UszOT4fW4k1Z2hBEwi8.sIwk88Fv8wC', NOW());
