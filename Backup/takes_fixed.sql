ALTER TABLE `enrollements`.`takes` 
DROP FOREIGN KEY `takes_ibfk_4`,
DROP FOREIGN KEY `takes_ibfk_3`,
DROP FOREIGN KEY `takes_ibfk_2`,
DROP FOREIGN KEY `SemesterTaken_FK`;
ALTER TABLE `enrollements`.`takes` 
DROP INDEX `year_fk_idx2` ,
DROP INDEX `takes_ibfk_2_idx` ,
DROP INDEX `SemesterTaken_FK_idx` ,
DROP INDEX `SectionID` ;






CREATE DEFINER = `root`@`localhost` TRIGGER `enrollements`.`section_BEFORE_DELETE` 
BEFORE DELETE ON `section` 
FOR EACH ROW
BEGIN
	DELETE FROM takes WHERE OLD.CourseID=takes.CourseID AND OLD.SemesterOfOfferedSection = takes.SemesterTaken AND OLD.YearOfOfferedSection=takes.YearTaken ;
END


///////
USE `enrollements`;

DELIMITER $$

DROP TRIGGER IF EXISTS enrollements.section_BEFORE_DELETE$$
USE `enrollements`$$

CREATE DEFINER = `root`@`localhost` TRIGGER `enrollements`.`section_BEFORE_DELETE` 
BEFORE DELETE ON `section` 
FOR EACH ROW
BEGIN
	DELETE FROM takes WHERE OLD.CourseID=takes.CourseID AND OLD.SemesterOfOfferedSection = takes.SemesterTaken AND OLD.YearOfOfferedSection=takes.YearTaken ;
END
$$
DELIMITER ;
