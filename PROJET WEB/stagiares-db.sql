
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `departement` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `idadmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `intern` (
  `id_intern` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthday` date DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `internship` (
  `iddep` int(11) NOT NULL,
  `idintern` int(11) NOT NULL,
  `id_admi` int(11) NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

ALTER TABLE `departement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admin` (`idadmin`);


ALTER TABLE `intern`
  ADD PRIMARY KEY (`id_intern`),
  ADD KEY `fk_admin_intern` (`admin_id`);

ALTER TABLE `internship`
  ADD PRIMARY KEY (`iddep`,`idintern`,`id_admi`),
  ADD KEY `fk_admin_internship` (`id_admi`),
  ADD KEY `fk_intern` (`idintern`),
  ADD KEY `iddep` (`iddep`);


ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `departement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;


ALTER TABLE `intern`
  MODIFY `id_intern` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;




ALTER TABLE `departement`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`id_admin`) ON UPDATE CASCADE;


ALTER TABLE `intern`
  ADD CONSTRAINT `fk_admin_intern` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id_admin`);


ALTER TABLE `internship`
  ADD CONSTRAINT `fk_admin_internship` FOREIGN KEY (`id_admi`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `fk_intern` FOREIGN KEY (`idintern`) REFERENCES `intern` (`id_intern`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


