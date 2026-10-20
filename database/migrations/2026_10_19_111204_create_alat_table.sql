-- create_alat_table

CREATE TABLE IF NOT EXISTS `alat` (
  `id_alat` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_alat` varchar(255) NOT NULL,
  `kode_alat` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `id_kategori` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id_alat`),
  KEY `fk_alat_id_kategori_444caa` (`id_kategori`),
  CONSTRAINT `fk_alat_id_kategori_444caa` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_alat_id_kategori_fe4223` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
