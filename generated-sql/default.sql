
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- arrival
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `arrival`;

CREATE TABLE `arrival`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `course_id` VARCHAR(12) NOT NULL,
    `student_id` VARCHAR(14) NOT NULL,
    `arrival_date` DATE NOT NULL,
    `arrival_time` TIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- course
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course`
(
    `id` VARCHAR(12) NOT NULL,
    `name` VARCHAR(24) NOT NULL,
    `start_week` INTEGER NOT NULL,
    `end_week` INTEGER NOT NULL,
    `day_in_week` INTEGER NOT NULL,
    `start_class` INTEGER NOT NULL,
    `end_class` INTEGER NOT NULL,
    `teacher_id` VARCHAR(12) NOT NULL,
    `classroom` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- course_student
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `course_student`;

CREATE TABLE `course_student`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `course_id` VARCHAR(12) NOT NULL,
    `card_number` VARCHAR(24) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- day_off
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `day_off`;

CREATE TABLE `day_off`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `course_id` VARCHAR(12) NOT NULL,
    `student_number` VARCHAR(20) NOT NULL,
    `off_date` DATE NOT NULL,
    `off_time` TIME NOT NULL,
    `cause` VARCHAR(50),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- department
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(12) NOT NULL,
    `pid` INTEGER DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- student
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student`
(
    `id` VARCHAR(14) NOT NULL,
    `name` VARCHAR(12) NOT NULL,
    `gender` INTEGER DEFAULT 0 NOT NULL,
    `department_id` INTEGER NOT NULL,
    `class_number` INTEGER NOT NULL,
    `card_number` VARCHAR(24) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- teacher
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `teacher`;

CREATE TABLE `teacher`
(
    `id` VARCHAR(12) NOT NULL,
    `name` VARCHAR(12) NOT NULL,
    `pwd` VARCHAR(24) NOT NULL,
    `phone` VARCHAR(11),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
