-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: ukz
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `applicants` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_names` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_dob` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_phone` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_zip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominees` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `read_constitution` tinyint DEFAULT NULL,
  `certify_details` tinyint DEFAULT NULL,
  `uk_resident` tinyint DEFAULT NULL,
  `orderID` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicants`
--

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
INSERT INTO `applicants` VALUES (1,'Joe',NULL,'Munapo','1994-12-07 01:31:00','jmunapo@outlook.com','3463 H 3','Mutare','Zimbabwe','ZW','m','+263 77 569 6233','Mutare','Zimbabwe','1998-01-19 01:31:00','wbt@gmail.com','Web T Munapo','+263 77 714 4384','3463 H3','MT','[{\"dob\": \"2001-06-07T01:31:00.000Z\", \"email\": \"plaxy@gmail.com\", \"full_name\": \"Pla An Munapo\", \"zimbabwean_by\": \"birth\"}]',1,1,1,'44P488494M8108014','2020-04-28 23:52:00','2020-05-11 23:24:14',NULL,'accepted','code-lWFxEP8q8gNlL4APLu4JoMkb5zXS15Aox7WM83zM'),(2,'Plaxedes','Anesu','Munapo','2001-06-07T20:33:00.000Z','plax.anemunapo@gmail.com','3463 H 3','Mutare','Zimbabwe','MT','f','+263 77 569 6266','Mutare','Zimbabwe','1994-12-07T20:33:00.000Z','jmunapo@gmail.com','Josiah Munapo','+263 77 569 6233','3463 H 3','MT','[{\"dob\": \"1998-01-09T20:33:00.000Z\", \"email\": \"wbt@gmail.com\", \"full_name\": \"Tafadzwa Munapo\", \"zimbabwean_by\": \"birth\"}]',1,1,1,'6GS77095DW624443C','2020-04-29 18:39:49','2020-04-29 18:39:49',NULL,'pending',NULL),(3,'David',NULL,'Munapo','2003-12-02T20:53:00.000Z','divamunapo@gmail.com','3463 H 3','Mutare','Zimbabwe','MT','m','+263 77 569 6233','Mutare','Zimbabwe','1994-12-07T20:53:00.000Z','jmunapo@gmail.com','Josiah Munapo','+263 77 569 6233','3463 H 3',NULL,'[{\"dob\": \"1998-01-19T20:53:00.000Z\", \"email\": \"wbt@gmail.com\", \"full_name\": \"Webster Munapo\", \"zimbabwean_by\": \"birth\"}, {\"dob\": \"1974-08-08T20:56:00.000Z\", \"email\": \"achads@gmail.com\", \"full_name\": \"Agnes Chadambuka\", \"zimbabwean_by\": \"spouse\"}]',1,1,1,'61J50941HE043702E','2020-04-29 19:00:02','2020-04-29 19:00:02',NULL,'pending',NULL),(10,'Sibongile',NULL,'Simango','1998-01-23T23:27:00.000Z','sibosimango@gmail.com','2448 Hobhouse 3','Mutare','Zimbabwe','Mt','f','+263 77 911 5362','Mutare','Zimbabwe','1994-12-11T23:27:00.000Z','loe@gmail.com','Lorrean Simango','+263 77 236 3566','Test zimunya','Mt','[{\"full_name\":\"Joe Munapo\",\"email\":\"ceo@nhembe.co.zw\",\"dob\":\"1994-12-06T23:27:00.000Z\",\"zimbabwean_by\":\"birth\"}]',1,1,1,'7L349918J3820505U','2020-04-29 22:31:43','2020-04-29 22:31:43',NULL,'pending',NULL),(12,'John',NULL,'Doe','1977-08-10T23:46:00.000Z','jdoe@gmail.com','Umm','Umm','Ireland','Umm','m','+263 77 639 6233','Ok','Ireland','1997-08-06T23:46:00.000Z','hson@gmail.com','J Doe son','+263 77 522 3322','Kkk','Umm','[{\"full_name\":\"Umm ko chii\",\"email\":\"chii@gmail.com\",\"dob\":\"2010-01-06T23:46:00.000Z\",\"zimbabwean_by\":\"birth\"}]',1,1,1,'94E98994GU9466022','2020-04-29 22:48:55','2020-04-29 22:48:55',NULL,'pending',NULL);
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `board_members`
--

DROP TABLE IF EXISTS `board_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `board_members` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int DEFAULT NULL,
  `selected_on` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_handle` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tg_username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board_members`
--

LOCK TABLES `board_members` WRITE;
/*!40000 ALTER TABLE `board_members` DISABLE KEYS */;
INSERT INTO `board_members` VALUES (1,1,'2020-05-15 14:22:00','committee_member','joemags','jmags40','joemags',NULL,'2020-05-15 10:22:52','2020-05-15 10:25:31','board-members/May2020/xLhbb3c9Y9bb5PYk99IS.png'),(2,2,'2020-05-04 14:34:00','vice_chairperson','barney','gurwe','@cricket',NULL,'2020-05-15 10:36:27','2020-05-15 10:37:06','board-members/May2020/NReRnow6FZY2C9BWFcD1.png');
/*!40000 ALTER TABLE `board_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `constitution`
--

DROP TABLE IF EXISTS `constitution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `constitution` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constitution`
--

LOCK TABLES `constitution` WRITE;
/*!40000 ALTER TABLE `constitution` DISABLE KEYS */;
INSERT INTO `constitution` VALUES (1,'<h2>UKZ CHEMA ASSOCIATION</h2>\r\n<h3>INTRODUCTION</h3>\r\n<p>The idea of forming this project came after realising that as Zimbabweans living in the United Kingdom, we need to form a body that would work to help members with funeral costs in the event of death of nominated loved ones, whether they wish to be repatriated or laid to rest in the UK. We have experienced a lot of problems as a community where fellow Zimbabweans who have passed on in the UK spent so much time in the morgue while funds are being raised through Crowdfunding Platforms to give the deceased a decent burial. The vision of the project aims to encourage large scale transition from the humiliation of crowd funded funerals of Zimbabweans in keeping with our traditions of contributing Chema.</p>\r\n<p>The project at hand aims to encourage social cohesion, and a desire for Zimbabweans to work together, particularly at times of bereavement. The main selling points of the project to date are a Pay As You Go nature, and the open recruitment format. By recruiting many members (targeted at 1000 contributing members), small, nominal contributions will amount to a significant amount of compassion offerings (Chema) in time of need. The association will also act as an information point in UK for our members on issues of illness and death.</p>\r\n<h3>1. NAME</h3>\r\n<p>The Body shall be named UKZ Chema Association hereinafter referred to as the Funeral Association.</p>\r\n<h3>2. OFFICES</h3>\r\n<p>As the Association is run by volunteers, there is at present no registered address. Activities will be conducted from the homes of Volunteers in United Kingdom.</p>\r\n<h3>3. AIMS</h3>\r\n<p style=\"padding-left: 40px;\"><strong>3.1</strong> To raise money towards funeral expenses for members and their nominees.</p>\r\n<p style=\"padding-left: 40px;\"><strong>3.2</strong> To widen the support network of Zimbabweans living in the UK during times of bereavement.</p>\r\n<p style=\"padding-left: 40px;\"><strong>3.3</strong> To promote a spirit of unity and oneness amongst fellow citizens by encouraging members to attend funerals of members giving spiritual and moral support in times of bereavement.</p>\r\n<h3>4. MEMBERSHIP</h3>\r\n<h4>4.1 <em>Definition</em>: Member</h4>\r\n<p>Member must qualify under the following terms:</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.1.1</strong> Must be Zimbabwean citizens by birth or descent.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.1.2</strong> Be a person of good repute; willing to associate with others socially.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.1.3</strong> Be at least 16 years of age.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.1.4</strong> Must be ordinarily resident in the United Kingdom and Ireland.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.1.5</strong> Must have completed a membership registration form and paid the registration fee of <strong>&pound;13.</strong></p>\r\n<h4>4.2 <em>Definition</em>: Nominee</h4>\r\n<p>Nominees must qualify under the following terms:</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.2.1</strong> Must be a Zimbabwean citizen by birth or descent, or spouse of a member.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.2.2</strong> Must be ordinarily resident in the United Kingdom and Ireland.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.2.3</strong> Must be named on a fully registered member&rsquo;s registration form.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.2.4</strong> A nominee may only be named on one registration form. The onus is on members to ensure that duplications do not occur.</p>\r\n<h4>4.3 Registration</h4>\r\n<p style=\"padding-left: 40px;\"><strong>4.3.1</strong> Prospective members will complete a registration form including their current address, date of birth and next of kin details.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.3.2</strong> They will nominate up to four persons for whom they will receive contributions in the event of their death.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.3.3</strong> Nominee addresses and date of birth will be required at the time of registration.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.3.4</strong> A <strong>&pound;13</strong> Registration fee will be paid. This will include a nominal registration fee of &pound;3 which is non refundable (see section 5.7 for how it is used) and a payment of &pound;10 which will add to the Association bank balance used for use while collections take place.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.3.5</strong> Members will be provided with a membership number for use on all correspondence and as a reference on bank transactions.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.3.6</strong> Membership begins on the day the completed registration form is received.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.3.7</strong> A 3 month deferred (waiting) period will apply for all registrations. During the deferred period you must pay for all funerals. Members will not receive payments until after the deferred period (first 3 months).</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.3.8</strong> In the event of death, checks will be conducted to ensure validity of membership.</p>\r\n<h4>4.4 Amendments</h4>\r\n<p style=\"padding-left: 40px;\"><strong>4.4.1</strong> A member may amend nominees on the registration form by sending an email to ukzchema@gmail.com during the amendment window, of 15 September to 15 October annually.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.4.2</strong> Acceptable reasons for amendments include :</p>\r\n<p style=\"padding-left: 80px;\"><strong>a</strong>. nominee becomes a member</p>\r\n<p style=\"padding-left: 80px;\"><strong>b</strong>. nominee emigrates</p>\r\n<p style=\"padding-left: 80px;\"><strong>c</strong>. family expansion</p>\r\n<p style=\"padding-left: 80px;\"><strong>d</strong>. family reconstruction</p>\r\n<p style=\"padding-left: 80px;\"><strong>e</strong>. Change of address or contact details can be done anytime</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.4.3</strong> Any entrants/amendments will be subject to a 3 month deferred period assuming eligibility on 15 December for all amendments made during the amendment period.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.4.4</strong> A member may replace nominees after 3 nominees have passed on, or 3 years whichever is later</p>\r\n<h4>4.5 Withdrawal</h4>\r\n<p style=\"padding-left: 40px;\"><strong>4.5.1</strong> A member may withdraw from the society if they wish to do so, subject to approval by the Trustees or Board.</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.5.2</strong> Notice of withdrawal should be in writing, by email to ukzchema@gmail.com</p>\r\n<p style=\"padding-left: 40px;\"><strong>4.5.3</strong> Should a member fail to meet the financial obligations set out in the constitution, their membership may be withdrawn by the Board.</p>\r\n<h3>5. CONTRIBUTIONS</h3>\r\n<p style=\"padding-left: 40px;\"><strong>5.1</strong> An amount paid by registered members is herein known as a contribution.</p>\r\n<p style=\"padding-left: 40px;\"><strong>5.2</strong> Contributions will be paid on a pay as you go basis upon the death of a member or their nominee within 72 hours of notification of death.5.3 Contributions are an Obligatory condition of membership, although spiritual, emotional and practical support are also encouraged.</p>\r\n<p style=\"padding-left: 40px;\"><strong>5.4</strong> Any late payment of contributions will need to be communicated to the Secretary who will inform the Trustees of payment date.</p>\r\n<p style=\"padding-left: 40px;\"><strong>5.5</strong> If a member has a genuine reason for failing to pay, the Board should be duly notified and will assess the member&rsquo;s circumstances.</p>\r\n<p style=\"padding-left: 40px;\"><strong>5.6</strong> A grace period (up to 14 days will be given to allow for personal challenges. After each bereavement, appointed persons will provide information regarding payments collected and received.</p>\r\n<p style=\"padding-left: 40px;\"><strong>5.7</strong> Contributions shall be paid to the Society&rsquo;s bank account with Bank of Scotland hereinafter known as the bank. Account details will be given on registration.</p>\r\n<p style=\"padding-left: 40px;\"><strong>5.8</strong> At registration, members pay &pound;13. &pound;3 of this amount is the joining fee which will sit in the Association account and will cover essential expenses such as bank charges, legal fees, and essential administration costs plus.</p>\r\n<p style=\"padding-left: 40px;\">&pound;10 is added to the account balance used to pay bereaved families whilst contributions are being collected. It is anticipated the bank account will always have at least &pound;5000, ready to pay for funerals.</p>\r\n<p style=\"padding-left: 40px;\"><strong>5.9</strong> The Membership Number, must be used as a reference on every transaction <strong>(e.g. 00001 Nzou)</strong> and in correspondence with the Association.</p>\r\n<h3>6. FINANCIAL AND OTHER ASSISTANCE</h3>\r\n<p>Assistance, financially, materially and/or in kind will be rendered as follows:</p>\r\n<p style=\"padding-left: 40px;\"><strong>6.1</strong> Where a fully paid up member or their nominee passes away; the association will contribute (Chema) towards funeral costs.</p>\r\n<p style=\"padding-left: 40px;\"><strong>6.2</strong> An agreed amount of &pound;5000 per funeral will be paid.</p>\r\n<p style=\"padding-left: 40px;\"><strong>6.3</strong> The contribution per member will be equal to &pound;5000 divided by the number of members at the time of the event adjusted by 5% to account for dropouts and terminations. Should an excess of &pound;5000 be collected, it will be accounted for in the next funeral.</p>\r\n<p style=\"padding-left: 40px;\"><strong>6.4</strong> Financial assistance can only be made if the deceased person was a member for three months or more and their contributions paid up to date.</p>\r\n<p style=\"padding-left: 40px;\"><strong>6.5</strong> Payments will be made on submission of proof of death (Death Certificate) and residence</p>\r\n<p style=\"padding-left: 40px;\"><strong>6.6</strong> Joining fees are non refundable and the Association shall retain the member&rsquo;s joining fee.</p>\r\n<h3>7. MEETINGS</h3>\r\n<p style=\"padding-left: 40px;\"><strong>7.1</strong> An Annual General Meeting of the Association shall be held annually in September.</p>\r\n<p style=\"padding-left: 40px;\"><strong>7.2</strong> The Secretary at the request of the chairperson, shall convene the Annual General Meeting by arranging the posting of notice thereof to all members specifying the time and place of the Annual General Meeting at least 14 days in advance.</p>\r\n<p style=\"padding-left: 40px;\"><strong>7.3</strong> The Annual General Meeting shall elect the Executive Board for the ensuing year.</p>\r\n<p style=\"padding-left: 40px;\"><strong>7.4</strong> Nominations for the Executive Board and items for inclusion on the agenda shall be made in writing and received by the Secretary at least 7 days before the date of the Annual General Meeting. The Honorary Secretary shall arrange for notice to be posted of such nominations and agenda received not less than 7 days before the date of the Annual General Meeting.</p>\r\n<p style=\"padding-left: 40px;\"><strong>7.5</strong> Office Bearers and other Council members shall hold office for a period of one year, at the expiry of which they shall be eligible for re-election.</p>\r\n<p style=\"padding-left: 40px;\"><strong>7.6</strong> A Special General Meeting may be convened at any time by the Association Executive Board in the event of a member dying or any special urgent purpose, the Secretary shall arrange for notice to be posted on the time, place and business of the meeting.</p>\r\n<h3>8. VOTING PROCEDURES</h3>\r\n<p style=\"padding-left: 40px;\"><strong>8.1</strong> At any General Meeting of the Association an Executive Board member must have two thirds majority of voting members available at the meeting.</p>\r\n<p style=\"padding-left: 40px;\"><strong>8.2</strong> All members of the Association who are 16 years or above, provided that their contributions are not in arrears on the day of the meeting, shall be entitled to attend the Association meeting and vote.</p>\r\n<p style=\"padding-left: 40px;\"><strong>8.3</strong> At any General Meetings of the Association, all election of Board members shall be decided by a show of hands.</p>\r\n<p style=\"padding-left: 40px;\"><strong>8.4</strong> Every member present and entitled to vote shall have one vote. Decisions will be reached based on a simple majority, except in the case of amendments to the Constitution. In the case of equality of votes, the Chairperson of the meeting shall have a second or casting vote or at his/her discretion, may direct a second ballot or a second show of hands.</p>\r\n<h3>9. THE UKZ ASSOCIATION EXECUTIVE BOARD &amp; SUPERVISORY BOARD</h3>\r\n<p style=\"padding-left: 40px;\"><strong>9.1</strong> The Executive Board shall manage the affairs of the Association, which shall meet quarterly and, subject to this constitution, shall have full power to apply the funds of the Association and to take such other steps as deemed to be necessary to pursue the objectives of Association</p>\r\n<p style=\"padding-left: 40px;\"><strong>9.2</strong> The Association&rsquo;s Executive Board shall comprise of the following elected persons:</p>\r\n<p style=\"padding-left: 80px;\">❖ The Chairperson and Vice Chairperson</p>\r\n<p style=\"padding-left: 80px;\">❖ The Secretary</p>\r\n<p style=\"padding-left: 80px;\">❖ The Treasurer</p>\r\n<p style=\"padding-left: 80px;\">❖ Two elected committee members</p>\r\n<p style=\"padding-left: 40px;\"><strong>9.3</strong> The committee will include members volunteered or chosen at each AGM to aid in primary debates, brainstorming and administration tasks.</p>\r\n<p style=\"padding-left: 40px;\"><strong>9.4</strong> The Supervisory Board will be responsible for approving all Association&rsquo;s major decisions while the Executive Committee oversees the Association and provides general direction.</p>\r\n<p style=\"padding-left: 40px;\"><strong>9.5</strong> The Founding Members, all listed on Annex 1 will form the Supervisory Board.</p>\r\n<p style=\"padding-left: 40px;\"><strong>9.6</strong> Every AGM, 3 members from the outgoing Executive Committee will be voted onto the Supervisory Board and will serve for up to 3 years.</p>\r\n<h3>10. AMENDMENTS TO THE CONSTITUTION</h3>\r\n<p style=\"padding-left: 40px;\"><strong>10.1</strong> Amendments to this Constitution may only be made at a General Meeting. A 75% vote of those present and voting in favour of any amendment is required for its acceptance.</p>\r\n<p style=\"padding-left: 40px;\"><strong>10.2</strong> Sufficient notice of any proposed amendments must be given to the Secretary no less than 7 days before the AGM to be considered by the Association Board for inclusion in the Agenda for the AGM.</p>\r\n<h3>11 . DESOLUTION</h3>\r\n<p>Prior notice having been given in the notice convening the General Meeting at which the matter is to be discussed, the Association Executive Board may be dissolved by a two thirds majority of those present and voting at the meeting.</p>\r\n<h3>12. DATA PROTECTION</h3>\r\n<p style=\"padding-left: 40px;\"><strong>12.1</strong> All the information regarding members and their personal details will be used for the purposes of the Association and shall not be passed to any individual or organisation for any other reasons other than the purposes of the Association.</p>\r\n<p style=\"padding-left: 40px;\"><strong>12.2</strong> Sensitive Data will be handled by the secretary, treasurer and a limited number of vetted persons to ensure the integrity of the data.</p>\r\n<p style=\"padding-left: 40px;\"><strong>12.3</strong> All spreadsheets, emails, storage drives will be password protected. Passwords will be changed periodically.</p>\r\n<h3>13. GENERAL</h3>\r\n<p style=\"padding-left: 40px;\"><strong>13.1</strong> The Association will operate as an Unincorporated Association, under the name UKZ Chema Association.</p>\r\n<p style=\"padding-left: 40px;\"><strong>13.2</strong> The Nhimbe Yerufu / Umbuthano Wemfa logo shall be a registered logo for the Association.</p>\r\n<p style=\"padding-left: 40px;\"><strong>13.3</strong> The Association reserves the right to accept or reject an application for membership.</p>\r\n<p style=\"padding-left: 40px;\"><strong>13.4</strong> Any rules or regulations not covered in this Constitution or determined by the Association Boards shall be as per the Memorandum, Articles of Association and Rules of Society.</p>\r\n<p style=\"padding-left: 40px;\"><strong>13.5</strong> The Association shall operate within the laws of the United Kingdom and the Financial Services Authority.</p>\r\n<h3>14. ACCEPTANCE OF TERMS</h3>\r\n<p>By submitting a completed registration form and paying the registration fee, prospective members agree to the terms set out in this constitution.</p>',NULL,'2020-05-20 19:09:37','2020-05-20 19:23:18');
/*!40000 ALTER TABLE `constitution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_rows` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int unsigned NOT NULL,
  `field` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,NULL,1),(2,1,'name','text','Name',1,1,1,1,1,1,NULL,2),(3,1,'email','text','Email',1,1,1,1,1,1,NULL,3),(4,1,'password','password','Password',1,0,0,1,1,0,NULL,4),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,NULL,5),(6,1,'created_at','timestamp','Created At',0,1,1,0,0,0,NULL,6),(7,1,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,7),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,NULL,8),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}',10),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',11),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,NULL,12),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,NULL,1),(17,3,'name','text','Name',1,1,1,1,1,1,NULL,2),(18,3,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(19,3,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(20,3,'display_name','text','Display Name',1,1,1,1,1,1,NULL,5),(21,1,'role_id','text','Role',1,1,1,1,1,1,NULL,9),(22,5,'id','text','Id',1,0,0,0,0,0,'{}',1),(23,5,'first_name','text','First Name',0,1,1,1,1,1,'{}',2),(24,5,'middle_names','text','Middle Names',0,1,1,1,1,1,'{}',3),(25,5,'last_name','text','Last Name',0,1,1,1,1,1,'{}',4),(26,5,'dob','text','Dob',0,1,1,1,1,1,'{}',5),(27,5,'email','text','Email',0,1,1,1,1,1,'{}',6),(28,5,'street','text','Street',0,1,1,1,1,1,'{}',7),(29,5,'city','text','City',0,1,1,1,1,1,'{}',8),(30,5,'country','text','Country',0,1,1,1,1,1,'{}',9),(31,5,'zip','text','Zip',0,1,1,1,1,1,'{}',10),(32,5,'gender','text','Gender',0,1,1,1,1,1,'{}',11),(33,5,'phone','text','Phone',0,1,1,1,1,1,'{}',12),(34,5,'nok_city','text','Nok City',0,0,1,1,1,1,'{}',13),(35,5,'nok_country','text','Nok Country',0,0,1,1,1,1,'{}',14),(36,5,'nok_dob','text','Nok Dob',0,0,1,1,1,1,'{}',15),(37,5,'nok_email','text','Nok Email',0,0,1,1,1,1,'{}',16),(38,5,'nok_full_name','text','Next of Kin\'s Full Name',0,1,1,1,1,1,'{}',17),(39,5,'nok_phone','text','Next of Kin\'s Phone',0,1,1,1,1,1,'{}',18),(40,5,'nok_street','text','Nok Street',0,0,1,1,1,1,'{}',19),(41,5,'nok_zip','text','Nok Zip',0,0,1,1,1,1,'{}',20),(42,5,'nominees','text','Nominees',0,0,1,0,1,1,'{}',21),(43,5,'read_constitution','text','Read Constitution',0,0,1,1,1,1,'{}',22),(44,5,'certify_details','text','Certify Details',0,0,1,1,1,1,'{}',23),(45,5,'uk_resident','text','Uk Resident',0,0,1,1,1,1,'{}',24),(46,5,'orderID','text','OrderID',0,1,1,1,1,1,'{}',25),(47,5,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',26),(48,5,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',27),(49,5,'deleted_at','timestamp','Deleted At',0,0,1,0,0,1,'{}',28),(50,5,'status','select_dropdown','Status',0,1,1,1,0,1,'{\"default\":\"pending\",\"options\":{\"pending\":\"Pending\",\"accepted\":\"Accepted\",\"rejected\":\"Rejected\"}}',29),(51,5,'token','text','Token',0,1,1,1,1,1,'{}',30),(52,6,'id','text','Member ID',1,1,1,0,0,1,'{}',1),(53,6,'deleted_at','timestamp','Deleted At',0,0,1,0,0,1,'{}',2),(54,6,'created_at','timestamp','Created At',0,0,1,0,0,1,'{}',3),(55,6,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',4),(56,6,'email','text','Email',0,1,1,1,1,1,'{}',8),(57,6,'first_name','text','First Name',0,1,1,1,1,1,'{}',5),(58,6,'middle_names','text','Middle Names',0,1,1,1,1,1,'{}',6),(59,6,'last_name','text','Last Name',0,1,1,1,1,1,'{}',7),(60,6,'dob','text','Dob',0,0,1,1,1,1,'{}',9),(61,6,'city','text','City',0,0,1,1,1,1,'{}',10),(62,6,'country','text','Country',0,0,1,1,1,1,'{}',11),(63,6,'street','text','Street',0,0,1,1,1,1,'{}',12),(64,6,'zip','text','Zip',0,0,1,1,1,1,'{}',13),(65,6,'gender','text','Gender',0,1,1,1,1,1,'{}',14),(66,6,'phone','text','Phone',0,1,1,1,1,1,'{}',15),(67,6,'nok_city','text','Nok City',0,0,1,1,1,1,'{}',16),(68,6,'nok_country','text','Nok Country',0,0,1,1,1,1,'{}',17),(69,6,'nok_dob','text','Nok Dob',0,0,1,1,1,1,'{}',18),(70,6,'nok_email','text','Nok Email',0,0,1,1,1,1,'{}',19),(71,6,'nok_full_name','text','Nok Full Name',0,0,1,1,1,1,'{}',20),(72,6,'nok_phone','text','Nok Phone',0,0,1,1,1,1,'{}',21),(73,6,'nok_street','text','Nok Street',0,0,1,1,1,1,'{}',22),(74,6,'nok_zip','text','Nok Zip',0,0,1,1,1,1,'{}',23),(76,6,'orderID','text','Payment Ref',0,1,1,1,1,1,'{}',25),(77,7,'id','text','Id',1,0,0,0,0,0,'{}',1),(78,7,'deleted_at','timestamp','Deleted At',0,0,1,0,0,1,'{}',18),(79,7,'created_at','timestamp','Added On',0,0,1,0,0,1,'{}',14),(80,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',15),(81,7,'member_id','text','Member ID',0,1,1,0,1,1,'{}',2),(82,7,'full_name','hidden','Full Name (deceased)',0,1,1,1,1,1,'{}',6),(83,7,'biography','text_area','Biography',0,0,1,1,1,1,'{}',7),(84,7,'dob','hidden','D.O.B',0,1,1,1,1,1,'{}',8),(85,7,'dod','timestamp','D.O.D',0,1,1,1,1,1,'{}',9),(87,7,'death_place','text','Death Place',0,1,1,1,1,1,'{}',11),(88,7,'phone','text','Phone',0,1,1,1,1,1,'{}',12),(89,7,'photo','image','Photo',0,0,1,1,1,1,'{\"resize\":{\"width\":\"1000\",\"height\":null},\"quality\":\"80%\",\"upsize\":true}',13),(90,7,'obituary_belongsto_member_relationship','relationship','Member ID',0,1,1,0,1,1,'{\"model\":\"App\\\\Models\\\\Member\",\"table\":\"members\",\"type\":\"belongsTo\",\"column\":\"member_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"applicants\",\"pivot\":\"0\",\"taggable\":\"0\"}',3),(91,6,'user_id','text','User Id',0,0,1,1,1,1,'{}',26),(92,6,'bio','text','Bio',0,0,1,1,1,1,'{}',27),(93,7,'goal_amount','number','Goal Amount (£)',0,1,1,1,1,1,'{}',16),(94,7,'donated_amount','number','Donated Amount (£)',0,1,1,1,0,1,'{}',19),(95,7,'member_type','select_dropdown','Member Type',0,1,1,0,1,1,'{\"default\":\"member\",\"options\":{\"member\":\"Member\",\"nominee\":\"Nominee\",\"nok\":\"Next of Kin\"}}',4),(96,8,'id','text','Id',1,0,0,0,0,0,'{}',1),(98,8,'obituary_id','text','Obituary Id',0,1,1,1,1,1,'{}',4),(99,8,'amount','number','Amount (£)',0,1,1,1,1,1,'{}',5),(100,8,'on','timestamp','Added On',0,1,1,1,1,1,'{}',6),(101,8,'orderID','text','Payment Ref',0,1,1,1,1,1,'{}',7),(102,8,'deleted_at','timestamp','Deleted At',0,0,0,0,0,1,'{}',8),(103,8,'created_at','timestamp','Created At',0,0,1,0,0,1,'{}',9),(104,8,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',10),(105,9,'id','text','Id',1,0,0,0,0,0,'{}',1),(106,9,'member_id','text','Member Id',0,1,1,1,1,1,'{}',4),(107,9,'full_name','text','Full Name',0,1,1,1,1,1,'{}',5),(108,9,'dob','timestamp','Date of Birth',0,1,1,1,1,1,'{}',7),(110,9,'created_at','timestamp','Created At',0,0,1,0,0,1,'{}',9),(111,9,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',10),(112,9,'deleted_at','timestamp','Deleted At',0,0,1,0,0,1,'{}',11),(113,9,'nominee_belongsto_member_relationship','relationship','Member\'s First Name',0,1,1,0,0,1,'{\"model\":\"App\\\\Models\\\\Member\",\"table\":\"members\",\"type\":\"belongsTo\",\"column\":\"member_id\",\"key\":\"id\",\"label\":\"first_name\",\"pivot_table\":\"applicants\",\"pivot\":\"0\",\"taggable\":\"0\"}',3),(114,9,'nominee_belongsto_member_relationship_1','relationship','Member\'s ID',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Member\",\"table\":\"members\",\"type\":\"belongsTo\",\"column\":\"member_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"applicants\",\"pivot\":\"0\",\"taggable\":\"0\"}',2),(115,8,'member_id','text','Member ID',0,1,1,1,1,1,'{}',2),(116,8,'donation_belongsto_obituary_relationship','relationship','Donation For',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Obituary\",\"table\":\"obituaries\",\"type\":\"belongsTo\",\"column\":\"obituary_id\",\"key\":\"id\",\"label\":\"full_name\",\"pivot_table\":\"applicants\",\"pivot\":\"0\",\"taggable\":\"0\"}',3),(117,9,'email','text','Email',0,1,1,1,1,1,'{}',6),(118,9,'zimbabwean_by','text','Zimbabwean By',0,1,1,1,1,1,'{}',5),(121,7,'obituary_belongsto_nominee_relationship','relationship','Nominee\'s Name (required if member type is nominee)',0,0,0,0,1,1,'{\"model\":\"App\\\\Models\\\\Nominee\",\"table\":\"nominees\",\"type\":\"belongsTo\",\"column\":\"nominee_id\",\"key\":\"id\",\"label\":\"full_name\",\"pivot_table\":\"applicants\",\"pivot\":\"0\",\"taggable\":\"0\"}',5),(122,7,'nominee_id','hidden','Nominee Id',0,0,0,0,0,0,'{}',17),(123,10,'id','text','Id',1,0,0,0,0,0,'{}',1),(124,10,'full_name','text','Full Name',0,1,1,1,1,1,'{}',2),(125,10,'testimony','text_area','Testimony',0,1,1,1,1,1,'{}',3),(126,10,'show','checkbox','Show',0,1,1,1,1,1,'{}',4),(127,10,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',5),(128,10,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',6),(129,10,'photo','image','Photo',0,1,1,1,1,1,'{}',7),(130,12,'id','text','Id',1,0,0,0,0,0,'{}',1),(131,12,'member_id','text','Member Id',0,1,1,1,1,1,'{}',2),(132,12,'selected_on','timestamp','Selected On',0,1,1,1,1,1,'{}',4),(133,12,'position','select_dropdown','Position',0,1,1,1,1,1,'{\"options\":{\"chairperson\":\"Chairperson\",\"vice_chairperson\":\"Vice Chairperson\",\"secretary\":\"Secretary\",\"treasurer\":\"Treasurer\",\"committee_member\":\"Committee Member\"}}',5),(134,12,'fb_username','text','Facebook Username',0,1,1,1,1,1,'{}',6),(135,12,'twitter_handle','text','Twitter Handle',0,1,1,1,1,1,'{}',7),(136,12,'tg_username','text','Telegram Username',0,1,1,1,1,1,'{}',8),(137,12,'deleted_at','timestamp','Deleted At',0,0,0,0,0,1,'{}',9),(138,12,'created_at','timestamp','Created At',0,0,1,0,0,1,'{}',10),(139,12,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',11),(140,12,'board_member_belongsto_member_relationship','relationship','Membership ID',0,1,1,1,1,1,'{\"model\":\"App\\\\Models\\\\Member\",\"table\":\"members\",\"type\":\"belongsTo\",\"column\":\"member_id\",\"key\":\"id\",\"label\":\"id\",\"pivot_table\":\"applicants\",\"pivot\":\"0\",\"taggable\":\"0\"}',3),(141,12,'photo','image','Photo',0,1,1,1,1,1,'{}',11),(142,13,'id','text','Id',1,0,0,0,0,0,'{}',1),(144,13,'deleted_at','timestamp','Deleted At',0,0,0,0,0,1,'{}',3),(145,13,'created_at','timestamp','Created At',0,0,0,0,0,1,'{}',4),(146,13,'updated_at','timestamp','Updated At',0,1,0,0,0,0,'{}',5),(147,13,'content','rich_text_box','Constitution',0,1,1,1,1,1,'{}',2);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint NOT NULL DEFAULT '0',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController','',1,0,NULL,'2020-04-24 09:41:00','2020-04-24 09:41:00'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2020-04-24 09:41:00','2020-04-24 09:41:00'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController','',1,0,NULL,'2020-04-24 09:41:00','2020-04-24 09:41:00'),(5,'applicants','applicants','New Applicant','New Applicants','voyager-list-add','App\\Models\\Applicant',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-04-28 23:55:54','2020-05-11 19:56:34'),(6,'members','members','Member','Members','voyager-people','App\\Models\\Member',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-05-06 16:22:52','2020-05-14 21:00:48'),(7,'obituaries','obituaries','Obituary','Obituaries','voyager-activity','App\\Models\\Obituary',NULL,'App\\Http\\Controllers\\ObituaryAdminController',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-05-06 16:37:18','2020-05-14 22:13:32'),(8,'donations','donations','Donation','Donations','voyager-gift','App\\Models\\Donation',NULL,'App\\Http\\Controllers\\AdminDonationController',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-05-11 09:03:26','2020-05-12 14:29:07'),(9,'nominees','nominees','Nominee','Nominees','voyager-heart','App\\Models\\Nominee',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-05-12 13:23:41','2020-05-12 15:29:47'),(10,'testimonials','testimonials','Testimonial','Testimonials','voyager-thumbs-up','App\\Models\\Testimonial',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-05-15 09:19:28','2020-05-15 09:24:07'),(12,'board_members','board-members','Board Member','Board Members','voyager-ship','App\\Models\\BoardMember',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-05-15 10:15:45','2020-05-15 10:25:18'),(13,'constitution','constitution','Constitution','Constitution','voyager-documentation','App\\Models\\Constitution',NULL,NULL,NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}','2020-05-20 17:59:27','2020-05-20 19:14:26');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int DEFAULT NULL,
  `obituary_id` int DEFAULT NULL,
  `amount` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on` timestamp NULL DEFAULT NULL,
  `orderID` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
INSERT INTO `donations` VALUES (1,4,1,'15.00','2020-05-11 09:05:59','3EH01166NA4636704',NULL,'2020-05-11 09:05:59','2020-05-11 09:05:59'),(2,4,1,'15.00','2020-05-11 10:25:58','3EH01166NA4636704',NULL,'2020-05-11 10:25:58','2020-05-11 10:25:58'),(3,4,1,'15.00','2020-05-11 10:58:46','3EH01166NA4636704',NULL,'2020-05-11 10:58:46','2020-05-11 10:58:46'),(4,4,1,'15.00','2020-05-11 10:59:45','3EH01166NA4636704',NULL,'2020-05-11 10:59:45','2020-05-11 10:59:45'),(5,4,1,'15.00','2020-05-11 11:08:25','3EH01166NA4636704',NULL,'2020-05-11 11:08:25','2020-05-11 11:08:25'),(6,4,1,'15.00','2020-05-11 11:09:05','3EH01166NA4636704',NULL,'2020-05-11 11:09:05','2020-05-11 11:09:05'),(7,4,1,'15.00','2020-05-11 11:09:37','3EH01166NA4636704',NULL,'2020-05-11 11:09:37','2020-05-11 11:09:37'),(8,4,1,'15.00','2020-05-11 11:16:23','3EH01166NA4636704',NULL,'2020-05-11 11:16:23','2020-05-11 11:16:23'),(9,4,1,'15.00','2020-05-11 11:25:22','3EH01166NA4636704',NULL,'2020-05-11 11:25:22','2020-05-11 11:25:22'),(10,4,2,'20.00','2020-05-11 11:51:32','2EG042797S918505D',NULL,'2020-05-11 11:51:32','2020-05-11 11:51:32'),(11,2,2,'10.00','2020-05-11 12:44:28','5WC458731G820023L',NULL,'2020-05-11 12:44:28','2020-05-11 12:44:28'),(12,3,3,'17.00','2020-05-12 18:36:27','99E90386R7150061G',NULL,'2020-05-12 18:36:27','2020-05-12 18:36:27');
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `members` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_names` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_country` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_full_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_street` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nok_zip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderID` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `bio` mediumtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,NULL,'2020-05-06 17:10:07','2020-05-20 21:40:43','joemags.apps@gmail.com','Mugore','Barney','Cloud','06.12.1994','Mutare','Zimbabwe','3463 Hobhouse 3','ZIM','m','+263 77 569 6233','Barcelona','UK','04 May 1994','jim@jonse.com','Jim Jones','+4477589652','Street','UKSH1','41T46117TK1583021',4,'Stay home and avoid touching your face to stop the spread of COVID19'),(2,NULL,'2020-05-08 11:09:04','2020-05-08 11:09:04','mutasaleo1@gmail.com','Leo',NULL,'Mutasa','03.01.2000','Harare','Zimbabwe','21 homestead road Hatfield',NULL,'m','+263 78 336 5009','Harare','Zimbabwe','12.08.1993','mutasaleo1@gmail.com','Boss','+263 77 448 8345','Ehehhjj','+263','33R80552YK4008541',5,NULL),(3,NULL,'2020-05-12 15:41:40','2020-05-12 18:28:22','jmags40@gmail.com','David',NULL,'Munapo','02.12.2001','City','Zimbabwe','3555 Diamond 1','DI','m','+263 77 569 6233','Mutare','Zimbabwe','07 December 1994','jmunapo@gmail.com','Josiah Munapo','+263 77 569 6233','3463 Hobhouse 3','ZW','72324556YA225354S',6,NULL);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `order` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Dashboard','','_self','voyager-boat',NULL,NULL,1,'2020-04-24 09:41:10','2020-04-24 09:41:10','voyager.dashboard',NULL),(2,1,'Media','','_self','voyager-images',NULL,NULL,10,'2020-04-24 09:41:10','2020-05-06 17:07:42','voyager.media.index',NULL),(3,1,'Users','','_self','voyager-person',NULL,NULL,8,'2020-04-24 09:41:10','2020-05-06 17:07:35','voyager.users.index',NULL),(4,1,'Roles','','_self','voyager-lock',NULL,NULL,5,'2020-04-24 09:41:11','2020-05-06 15:59:16','voyager.roles.index',NULL),(5,1,'Tools','','_self','voyager-tools',NULL,NULL,3,'2020-04-24 09:41:11','2020-05-06 15:59:16',NULL,NULL),(6,1,'Menu Builder','','_self','voyager-list',NULL,5,1,'2020-04-24 09:41:11','2020-04-24 09:49:32','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,5,2,'2020-04-24 09:41:11','2020-04-24 09:49:36','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,5,3,'2020-04-24 09:41:11','2020-04-24 09:49:37','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,5,4,'2020-04-24 09:41:11','2020-04-24 09:49:38','voyager.bread.index',NULL),(10,1,'Settings','','_self','voyager-settings',NULL,NULL,4,'2020-04-24 09:41:12','2020-05-06 15:59:16','voyager.settings.index',NULL),(11,1,'Hooks','','_self','voyager-hook',NULL,5,5,'2020-04-24 09:41:48','2020-04-24 09:49:39','voyager.hooks',NULL),(12,1,'New Applicants','','_self','voyager-list-add',NULL,NULL,6,'2020-04-28 23:55:56','2020-05-06 17:07:26','voyager.applicants.index',NULL),(13,1,'Member Dashboard','/member','_self','voyager-browser','#000000',NULL,2,'2020-05-06 15:59:07','2020-05-06 15:59:16',NULL,''),(14,1,'Members','','_self','voyager-people',NULL,NULL,7,'2020-05-06 16:22:54','2020-05-06 17:07:35','voyager.members.index',NULL),(15,1,'Obituaries','','_self','voyager-activity',NULL,NULL,9,'2020-05-06 16:37:20','2020-05-06 17:07:41','voyager.obituaries.index',NULL),(16,1,'Donations','','_self','voyager-gift',NULL,NULL,11,'2020-05-11 09:03:27','2020-05-11 09:03:27','voyager.donations.index',NULL),(17,1,'Nominees','','_self','voyager-heart',NULL,NULL,12,'2020-05-12 13:23:42','2020-05-12 13:23:42','voyager.nominees.index',NULL),(18,1,'Testimonials','','_self','voyager-thumbs-up',NULL,NULL,13,'2020-05-15 09:19:28','2020-05-15 09:19:28','voyager.testimonials.index',NULL),(19,1,'Board Members','','_self','voyager-ship',NULL,NULL,14,'2020-05-15 10:15:46','2020-05-15 10:15:46','voyager.board-members.index',NULL),(20,1,'Constitution','','_self','voyager-documentation',NULL,NULL,15,'2020-05-20 17:59:29','2020-05-20 17:59:29','voyager.constitution.index',NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2020-04-24 09:41:10','2020-04-24 09:41:10');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2016_01_01_000000_add_voyager_user_fields',1),(3,'2016_01_01_000000_create_data_types_table',1),(4,'2016_05_19_173453_create_menu_table',1),(5,'2016_10_21_190000_create_roles_table',1),(6,'2016_10_21_190000_create_settings_table',1),(7,'2016_11_30_135954_create_permission_table',1),(8,'2016_11_30_141208_create_permission_role_table',1),(9,'2016_12_26_201236_data_types__add__server_side',1),(10,'2017_01_13_000000_add_route_to_menu_items_table',1),(11,'2017_01_14_005015_create_translations_table',1),(12,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(13,'2017_03_06_000000_add_controller_to_data_types_table',1),(14,'2017_04_21_000000_add_order_to_data_rows_table',1),(15,'2017_07_05_210000_add_policyname_to_data_types_table',1),(16,'2017_08_05_000000_add_group_to_settings_table',1),(17,'2017_11_26_013050_add_user_role_relationship',1),(18,'2017_11_26_015000_create_user_roles_table',1),(19,'2018_03_11_000000_add_user_settings',1),(20,'2018_03_14_000000_add_details_to_data_types_table',1),(21,'2018_03_16_000000_make_settings_value_nullable',1),(22,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nominees`
--

DROP TABLE IF EXISTS `nominees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nominees` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int DEFAULT NULL,
  `full_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zimbabwean_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nominees`
--

LOCK TABLES `nominees` WRITE;
/*!40000 ALTER TABLE `nominees` DISABLE KEYS */;
INSERT INTO `nominees` VALUES (1,1,'Tafadzwa Munapo','22 December 2004','birth','2020-05-12 13:53:16','2020-05-20 21:41:19',NULL,NULL),(3,3,'Joe Mags','25 December 2010','spouse','2020-05-12 16:13:34','2020-05-12 18:19:58',NULL,'jmags@gmail.com'),(7,3,'Josiah Munapo','07 December 1994','birth','2020-05-12 18:20:26','2020-05-12 18:20:52',NULL,'jmunapo@gmail.com'),(8,NULL,'Joe Munapo','1994-12-07 00:00:00',NULL,'2020-05-14 22:05:44','2020-05-14 22:05:44',NULL,'jmunapo@gmail.com'),(9,1,'Tim Kim','05 May 2010','descent','2020-05-20 21:41:19','2020-05-20 21:41:19',NULL,NULL);
/*!40000 ALTER TABLE `nominees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obituaries`
--

DROP TABLE IF EXISTS `obituaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obituaries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `member_id` int DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` longtext COLLATE utf8mb4_unicode_ci,
  `dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dod` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `death_place` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal_amount` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `donated_amount` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `member_type` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obituaries`
--

LOCK TABLES `obituaries` WRITE;
/*!40000 ALTER TABLE `obituaries` DISABLE KEYS */;
INSERT INTO `obituaries` VALUES (1,NULL,'2020-05-07 20:32:13','2020-05-12 14:49:24',2,'Andrew Dunbar','Andrew was an actor who was also a stand-in as Theon on GoT. Extremely shocked and saddened to hear of his passing. To lose a loved one so young, I can only imagine what his family are going through. RIP Andrew xxx','1974-01-15 00:30:00','2020-04-22 00:30:00','Belfast, Northern Ireland','+44758895551','obituaries/May2020/4yRDgd6aD7MC8hmNL73S.jpg',NULL,'125','member',NULL),(2,NULL,'2020-05-07 20:42:00','2020-05-14 20:02:36',1,'Robert Brady','Town officials in Avon and loved ones are remembering Robert F. Brady, Jr. for his passion for public service, after the 65-year-old selectman passed away from COVID-19. \r\n\r\nBrady, who served on multiple boards and committees in Avon over the course of 17 years, died May 4. He had battled health issues in recent years and announced last year he would not seek re-election. But after the coronavirus pandemic postponed the town’s election, he continued to serve on the Board of Selectmen and “guide the town in the face of uncertain times,” town officials wrote in a statement announcing his passing.\r\n\r\n“The Town of Avon lost a champion this week,” Town Administrator Gregory Enos said in a statement. “He was a great supporter of all the hard work put in by the employees of the town. Bob was a wonderful listener and had a big heart. He was always upbeat and had a great sense of humor. We are honored to have worked with him here in Avon and our town will be forever impacted by his leadership. Bob will be remembered fondly by the Avon community and missed tremendously by all.”','1976-06-24 00:39:00','2020-05-07 00:39:00','Holbrook','+4471234561235','obituaries/May2020/dmRlnIGwqq8hkOS3lldS.png',NULL,'30','nok',NULL),(3,NULL,'2020-05-07 20:43:00','2020-05-14 19:58:53',1,'Anne Milewski','Anne Milewski, 100, of Milford, beloved wife of the late Milton Milewski, passed away peacefully at Milford Healthcare and Rehabilitation Center on May 4, 2020. Born on April 7, 1920 in Bridgeport to the late Joseph and Pauline Pavlosky, Anne was a 1937 graduate of Warren Harding High School.\r\n\r\nAnne married Milton, her beloved husband of 62 years in 1941. They settled in Stratford where they raised their four children. Anne was an excellent home-maker; her home was always beautifully maintained along with her flower gardens. For many years, she and Milton hosted all the festive holiday gatherings for their family. It was during these times that her cooking and decorating talents were highlighted. Anne was also a bird and animal lover and for several years she raised miniature poodles.\r\n\r\nAnne was a member of Mill River Country Club for 46 years. There, she enjoyed golfing, bowling, and playing bridge and pinochle with “the girls”. She was also an avid fan of the New York Yankees and UCONN Women’s Basketball, but the activity she enjoyed the most was casino gambling. She made weekly bus trips to the casino until she was 90 – always managing to come home with “some of my money”.','1956-06-28 00:43:00','2020-05-05 00:42:00','107 Broad Street Milford,',NULL,'obituaries/May2020/uVa8Ptama8w1Ic3XKvgG.jpg',NULL,'17','nok',NULL),(4,NULL,'2020-05-07 20:46:00','2020-05-14 19:57:14',1,'John Doe','A Portland man who served in the U.S. Army during the Vietnam War died April 25 from complications of COVID-19 and diabetes, according to his obituary.\r\n\r\nPatrick Laureat \"Larry\" Dube, 76, joined the Army in 1965 and served until 1977.\r\n\r\nDube, who was a member of the New England Bowling Association and the Central Connecticut Bowling Association, “was an avid and talented bowler for many years of his life,” his obituary said.','1976-07-29 00:45:00','2020-05-07 00:45:00','Portland','+447754588585','obituaries/May2020/4vGkyEGL1HHfYxPByROL.jpg','10000','10','nominee',NULL),(5,NULL,'2020-05-14 19:50:47','2020-05-14 21:59:37',2,'Taruvinga Gwandingwa','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','1995-07-10 23:49:00','2020-05-13 23:49:00','Leicester','0777144384','obituaries/May2020/k6r82gfFFSMSd33Z6KUs.png','100','0','nominee',NULL),(7,NULL,'2020-05-14 21:25:54','2020-05-14 21:57:00',1,'Tafadzwa Munapo','If you are using MySQL (or any RDBMS which supports cascading) you can cascade deleting on database level. If don\'t, you have to handle it manually on controller or by model event listening functions. See documentation on migrations detailing foreign key constrains.','1980-06-25 01:56:00','2020-05-07 01:56:00','Belfast, Northern Ireland','0775696233','obituaries/May2020/jx4z4VPS7wgiuGzMfEkk.png','100','0','nominee',1),(8,NULL,'2020-05-14 22:05:46','2020-05-14 22:05:46',1,'Joe Munapo','I\'ve been trying to do something similar as @rainieren. Even though I set up foreign keys and cascade on delete in the migration, I couldn\'t get the replies to be deleted when a theme is deleted.','2012-02-15 02:05:00','2020-05-14 02:05:00','Leicester','0777144384','obituaries/May2020/lHFgElrPRfswfxtGCQa7.png','210','0','nok',NULL);
/*!40000 ALTER TABLE `obituaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `used` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES (1,4,'token-9EERU5aJafNNkCIdDrk1p3kfJIlqVmVlMQnjMm57S4xmx',0,'2020-05-20 20:26:07','2020-05-20 20:26:07'),(2,4,'token-SnqLJjhOGiXBPBr0xvBq5C7uBHw9Z5aNZvOUKgKQ2U4hJ',0,'2020-05-20 20:35:38','2020-05-20 20:35:38'),(3,4,NULL,1,'2020-05-20 20:47:26','2020-05-20 21:32:13');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(1,3),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(16,3),(17,1),(17,3),(18,1),(18,3),(19,1),(19,3),(20,1),(20,3),(21,1),(21,3),(22,1),(22,3),(23,1),(23,3),(24,1),(24,3),(25,1),(25,3),(26,1),(27,1),(27,3),(28,1),(28,3),(29,1),(29,3),(30,1),(30,3),(31,1),(31,3),(32,1),(32,3),(33,1),(33,3),(34,1),(34,3),(35,1),(35,3),(36,1),(36,3),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2020-04-24 09:41:14','2020-04-24 09:41:14'),(2,'browse_bread',NULL,'2020-04-24 09:41:15','2020-04-24 09:41:15'),(3,'browse_database',NULL,'2020-04-24 09:41:15','2020-04-24 09:41:15'),(4,'browse_media',NULL,'2020-04-24 09:41:15','2020-04-24 09:41:15'),(5,'browse_compass',NULL,'2020-04-24 09:41:16','2020-04-24 09:41:16'),(6,'browse_menus','menus','2020-04-24 09:41:17','2020-04-24 09:41:17'),(7,'read_menus','menus','2020-04-24 09:41:18','2020-04-24 09:41:18'),(8,'edit_menus','menus','2020-04-24 09:41:19','2020-04-24 09:41:19'),(9,'add_menus','menus','2020-04-24 09:41:19','2020-04-24 09:41:19'),(10,'delete_menus','menus','2020-04-24 09:41:21','2020-04-24 09:41:21'),(11,'browse_roles','roles','2020-04-24 09:41:22','2020-04-24 09:41:22'),(12,'read_roles','roles','2020-04-24 09:41:24','2020-04-24 09:41:24'),(13,'edit_roles','roles','2020-04-24 09:41:25','2020-04-24 09:41:25'),(14,'add_roles','roles','2020-04-24 09:41:27','2020-04-24 09:41:27'),(15,'delete_roles','roles','2020-04-24 09:41:30','2020-04-24 09:41:30'),(16,'browse_users','users','2020-04-24 09:41:31','2020-04-24 09:41:31'),(17,'read_users','users','2020-04-24 09:41:32','2020-04-24 09:41:32'),(18,'edit_users','users','2020-04-24 09:41:32','2020-04-24 09:41:32'),(19,'add_users','users','2020-04-24 09:41:32','2020-04-24 09:41:32'),(20,'delete_users','users','2020-04-24 09:41:32','2020-04-24 09:41:32'),(21,'browse_settings','settings','2020-04-24 09:41:32','2020-04-24 09:41:32'),(22,'read_settings','settings','2020-04-24 09:41:33','2020-04-24 09:41:33'),(23,'edit_settings','settings','2020-04-24 09:41:33','2020-04-24 09:41:33'),(24,'add_settings','settings','2020-04-24 09:41:33','2020-04-24 09:41:33'),(25,'delete_settings','settings','2020-04-24 09:41:34','2020-04-24 09:41:34'),(26,'browse_hooks',NULL,'2020-04-24 09:41:48','2020-04-24 09:41:48'),(27,'browse_applicants','applicants','2020-04-28 23:55:55','2020-04-28 23:55:55'),(28,'read_applicants','applicants','2020-04-28 23:55:55','2020-04-28 23:55:55'),(29,'edit_applicants','applicants','2020-04-28 23:55:55','2020-04-28 23:55:55'),(30,'add_applicants','applicants','2020-04-28 23:55:55','2020-04-28 23:55:55'),(31,'delete_applicants','applicants','2020-04-28 23:55:55','2020-04-28 23:55:55'),(32,'browse_members','members','2020-05-06 16:22:52','2020-05-06 16:22:52'),(33,'read_members','members','2020-05-06 16:22:52','2020-05-06 16:22:52'),(34,'edit_members','members','2020-05-06 16:22:52','2020-05-06 16:22:52'),(35,'add_members','members','2020-05-06 16:22:52','2020-05-06 16:22:52'),(36,'delete_members','members','2020-05-06 16:22:52','2020-05-06 16:22:52'),(37,'browse_obituaries','obituaries','2020-05-06 16:37:18','2020-05-06 16:37:18'),(38,'read_obituaries','obituaries','2020-05-06 16:37:18','2020-05-06 16:37:18'),(39,'edit_obituaries','obituaries','2020-05-06 16:37:18','2020-05-06 16:37:18'),(40,'add_obituaries','obituaries','2020-05-06 16:37:18','2020-05-06 16:37:18'),(41,'delete_obituaries','obituaries','2020-05-06 16:37:18','2020-05-06 16:37:18'),(42,'browse_donations','donations','2020-05-11 09:03:26','2020-05-11 09:03:26'),(43,'read_donations','donations','2020-05-11 09:03:26','2020-05-11 09:03:26'),(44,'edit_donations','donations','2020-05-11 09:03:26','2020-05-11 09:03:26'),(45,'add_donations','donations','2020-05-11 09:03:26','2020-05-11 09:03:26'),(46,'delete_donations','donations','2020-05-11 09:03:26','2020-05-11 09:03:26'),(47,'browse_nominees','nominees','2020-05-12 13:23:41','2020-05-12 13:23:41'),(48,'read_nominees','nominees','2020-05-12 13:23:41','2020-05-12 13:23:41'),(49,'edit_nominees','nominees','2020-05-12 13:23:41','2020-05-12 13:23:41'),(50,'add_nominees','nominees','2020-05-12 13:23:41','2020-05-12 13:23:41'),(51,'delete_nominees','nominees','2020-05-12 13:23:41','2020-05-12 13:23:41'),(52,'browse_testimonials','testimonials','2020-05-15 09:19:28','2020-05-15 09:19:28'),(53,'read_testimonials','testimonials','2020-05-15 09:19:28','2020-05-15 09:19:28'),(54,'edit_testimonials','testimonials','2020-05-15 09:19:28','2020-05-15 09:19:28'),(55,'add_testimonials','testimonials','2020-05-15 09:19:28','2020-05-15 09:19:28'),(56,'delete_testimonials','testimonials','2020-05-15 09:19:28','2020-05-15 09:19:28'),(57,'browse_board_members','board_members','2020-05-15 10:15:46','2020-05-15 10:15:46'),(58,'read_board_members','board_members','2020-05-15 10:15:46','2020-05-15 10:15:46'),(59,'edit_board_members','board_members','2020-05-15 10:15:46','2020-05-15 10:15:46'),(60,'add_board_members','board_members','2020-05-15 10:15:46','2020-05-15 10:15:46'),(61,'delete_board_members','board_members','2020-05-15 10:15:46','2020-05-15 10:15:46'),(62,'browse_constitution','constitution','2020-05-20 17:59:28','2020-05-20 17:59:28'),(63,'read_constitution','constitution','2020-05-20 17:59:28','2020-05-20 17:59:28'),(64,'edit_constitution','constitution','2020-05-20 17:59:28','2020-05-20 17:59:28'),(65,'add_constitution','constitution','2020-05-20 17:59:28','2020-05-20 17:59:28'),(66,'delete_constitution','constitution','2020-05-20 17:59:28','2020-05-20 17:59:28');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2020-04-24 09:41:13','2020-04-24 09:41:13'),(2,'user','Normal User','2020-04-24 09:41:14','2020-04-24 09:41:14'),(3,'board_member','Executive Board','2020-05-06 16:28:43','2020-05-06 16:28:43');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '1',
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','UKZ | Chema Association','','text',1,'Site'),(2,'site.description','Site Description','A body to help members with funeral costs in the event of death of nominated loved ones','','text',2,'Site'),(3,'site.logo','Site Logo','settings/May2020/b56Ko6IkCA7Bx6M1vEW1.png','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID',NULL,'','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','settings/May2020/aEzwL7vUW1d6Xg2wAveY.jpg','','image',5,'Admin'),(6,'admin.title','Admin Title','UKZ Admin','','text',1,'Admin'),(7,'admin.description','Admin Description','UKZ Board Members Area','','text',2,'Admin'),(8,'admin.loader','Admin Loader','','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','settings/May2020/WSi8Gmj23p99XBtaMHb8.png','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)',NULL,'','text',1,'Admin'),(11,'social.telegram','Telegram Chat','439081755',NULL,'text',6,'Social'),(13,'member.can_update_nominees','Members can update nominees','1',NULL,'checkbox',7,'Member'),(15,'site.landing_title','Landing Title','Chema Association for UK based Zimbabweans',NULL,'text',8,'Site'),(16,'site.landing_description','Landing Page Description','UKZ Chema is a benevolent UK based community organisation formed to help Zimbabweans who live in the UK to cover funeral expenses.',NULL,'text_area',9,'Site');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimony` mediumtext COLLATE utf8mb4_unicode_ci,
  `show` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Barney The Cricket','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',1,'2020-05-15 09:20:00','2020-05-15 09:24:21','testimonials/May2020/7UVnvIaH55w2lmlW0942.png');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `translations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int unsigned NOT NULL,
  `locale` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,1,'UKZ','admin@ukz.co.uk','users/default.png',NULL,'$2y$10$on77YugkGau71ZkonUPTzuD4pH8aUG2qB7kxg.482W8f3y1Sidnoi','1vk3M0bB9GU47Dh3KAMmSylo8vWaVvZCAMBPCwGByPsth5t75DEqrebAAF4l',NULL,'2020-04-24 09:46:18','2020-04-24 09:46:19'),(3,3,'Demo User','demo@ukz.co.uk','users/default.png',NULL,'$2y$10$VbxaxOdRwIhr2e.6OzVQsuoNV7aC.PURDvWSr2dX9wj3rSPlFFMRi','13eonwf9qjlG2iN8UHAxT51W6LwGkMtcCtYRh9zfyUBdvBjR83pY37kEbren','{\"locale\":\"en\"}','2020-05-06 16:29:53','2020-05-06 16:29:53'),(4,2,'Mugore  Cloud','joemags.apps@gmail.com','users/default.png','2020-05-06 17:10:07','$2y$10$n9SH./iq4jLeJE4a0OYRE.D0DjCoy8I8ggEqj3IDUPhnKrWOJhGSW','w40hqRzthZYMQmrepBsNhDYhStYecFkbdOaA6IV9ogB9AeREPYnwIR3dWQpM',NULL,'2020-05-06 17:10:05','2020-05-20 21:32:13'),(5,2,'Leo  Mutasa','mutasaleo1@gmail.com','users/default.png','2020-05-08 11:09:04','$2y$10$Qy8c4i9uZt5XWV73Nzg11urlyCQBHuSvhjydMaZqjtf5zPHj79bF.',NULL,NULL,'2020-05-08 11:09:03','2020-05-08 11:09:04'),(6,2,'David  Munapo','jmags40@gmail.com','users/default.png','2020-05-12 15:41:40','$2y$10$OKjHpVMhpzgEyhA7alpVZ.2UNPwA1B1rfznEcHJUpWwNW6dQy6kp2',NULL,NULL,'2020-05-12 15:41:40','2020-05-12 15:41:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-21  2:07:33
