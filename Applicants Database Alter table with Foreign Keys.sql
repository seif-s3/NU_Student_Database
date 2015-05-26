ALTER TABLE `admission_info`
ADD CONSTRAINT `admission_info_ibfk_1` FOREIGN KEY (`IntendedMajor`) REFERENCES `enrollements`.`major` (`MajorID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `applied_school_fk` FOREIGN KEY (`AppliedSchool`) REFERENCES `enrollements`.`school` (`SchoolID`) ON DELETE CASCADE ON UPDATE CASCADE;