
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `gossip` (
  `id` int(11) NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT 'Anon',
  `to` varchar(255) NOT NULL DEFAULT 'XXX',
  `msg` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `gossip_child` (
  `id` int(11) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `msg` longtext NOT NULL,
  `gossip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `secretariats` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `division_id` int(11) NOT NULL,
  `sub_division` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `division`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `gossip`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `gossip_child`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `secretariats`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `gossip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `gossip_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `secretariats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;