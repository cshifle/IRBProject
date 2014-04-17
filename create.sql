
USE S12-cpsc430G4;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
Create TABLE `users`
(
`id` INT(10) NOT NULL AUTO_INCREMENT,
`name` VARCHAR(25),
`email` VARCHAR(25),
`password` VARCHAR(15),
`permission` VARCHAR(10),
`hash` VARCHAR(50),
`active` CHAR(2),
PRIMARY KEY (`id`)
);


--
-- Table structure for table `exemptApp`
-- 

DROP TABLE IF EXISTS `exemptApp`;
CREATE TABLE `exemptApp` 
(
`id` INT NOT NULL AUTO_INCREMENT,
`title` VARCHAR(80),
`sponsor` VARCHAR(25),
`sponsorEmail` VARCHAR(25),
`department` VARCHAR(20),
`extension` VARCHAR(10),
`student` VARCHAR(25),
`studentEmail` VARCHAR(25),
`studentPhone` VARCHAR(10),
`graduate` VARCHAR(3),
`dateSigned` VARCHAR(10),
PRIMARY KEY(`id`)
);


--
-- Table structure for table `expeditedApp`
-- 
DROP TABLE IF EXISTS `expeditedApp`;
CREATE TABLE `expeditedApp` 
(
`id` INT NOT NULL AUTO_INCREMENT,
`title` VARCHAR(80),
`sponsor` VARCHAR(25),
`sponsorEmail` VARCHAR(25),
`department` VARCHAR(20),
`phone` VARCHAR(10),
`student` VARCHAR(25),
`studentEmail` VARCHAR(25),
`studentPhone` VARCHAR(10),
`graduate` VARCHAR(3),
`dateSigned` VARCHAR(10),
`abstract` VARCHAR(255),
`fundedFederally` CHAR(1),
`IRBReviewed` CHAR(1),
`dateReviewed` VARCHAR(10),
`meetsExpeditedCriteria` CHAR(1),
`summaryRationale` VARCHAR(255),
`summaryMethods` VARCHAR(255),
`subjectSex` CHAR(1),
`subjectAgeMin` INT,
`subjectAgeMax` INT,
`subjectUnderEighteen` CHAR(1),
`mentallyCompetentOrLegallyRestricted` CHAR(1),
`identificationAndRecruitment` VARCHAR(255),
`consent` CHAR(1),
`assent` CHAR(1),
`privacy` VARCHAR(255),
`dataConfidentiality` VARCHAR(255),
`recording` CHAR(1),
`records` VARCHAR(255),
`risks` VARCHAR(255),
`riskProcedures` VARCHAR(255),
`riskBenefits` VARCHAR(255),
PRIMARY KEY(`id`)
);

