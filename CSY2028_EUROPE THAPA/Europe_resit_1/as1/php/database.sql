CREATE TABLE `admin` (
  `adminName` varchar(30) NOT NULL,
  `passcodeAdmin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `admin` (`adminName`, `passcodeAdmin`) VALUES
('admin', 'admin');


CREATE TABLE `category` (
  `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
);

INSERT INTO `category` (`category_id`, `categoryName`) VALUES
(1, 'TOYS'),
(2, 'AIRPLANES');

CREATE TABLE `Users` (
  `userId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `userEmail` VARCHAR(90) NOT NULL,
  `userName` VARCHAR(90) NOT NULL,
  `password` VARCHAR(90) NOT NULL,
  PRIMARY KEY (`userId`)
);

CREATE TABLE `auction` (
  `auction_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `auction_title` varchar(100) NOT NULL,
  `descriptionAuction` varchar(255) NOT NULL,
  `bidAmount` varchar(255) NOT NULL,
  `endDate` DATE NOT NULL,
  `categoryId` int NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  PRIMARY KEY (`auction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO auction (auction_id, auction_title, descriptionAuction, bidAmount, endDate, categoryId,createdBy)
VALUES (1, 'Sample Auction', 'This is a sample auction description.', '100.00', '2023-12-31 23:59:59', 1, 'thapa');

INSERT INTO auction (auction_id, auction_title, descriptionAuction, bidAmount, endDate, categoryId,createdBy)
VALUES (2, 'Sample Auction2', 'This is a sample auction description2.', '100.00', '2023-12-31 23:59:59', 1, 'thapa');



