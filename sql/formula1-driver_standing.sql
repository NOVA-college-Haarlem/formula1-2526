

CREATE TABLE `driver_standing` (
  `driverStandingsId` int(5) NOT NULL,
  `raceId` int(3) DEFAULT NULL,
  `driverId` int(3) DEFAULT NULL,
  `points` int(4) DEFAULT NULL,
  `position` int(3) DEFAULT NULL,
  `positionText` varchar(3) DEFAULT NULL,
  `wins` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
