-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2021 at 11:56 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdt_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_address`
--

DROP TABLE IF EXISTS `billing_address`;
CREATE TABLE IF NOT EXISTS `billing_address` (
  `billing_ID` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`billing_ID`),
  KEY `userID_FK` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `billing_address`
--

INSERT INTO `billing_address` (`billing_ID`, `userID`, `name`, `email`, `address`) VALUES
(1, 1, '123123', '123132@mail.com', '123123,12313,123213,123123'),
(2, 1, '123123', '123132@mail.com', '123123,12313,123213,123123'),
(3, 1, '123123', '123132@mail.com', '123123,12313,123213,123123'),
(4, 10, 'Ho Chang Yong', 'ho@gmail.com', 'No.2A, Jalan kp2/17, Taman Kjang Prima, 43000 Kajang, Selangor.,Kajang,Selangor,43000'),
(5, 10, 'Ho Chang Yong', 'ho@gmail.com', 'No.2A, Jalan kp2/17, Taman Kjang Prima, 43000 Kajang, Selangor.,Kajang,Selangor,43000'),
(6, 10, 'Ho Chang Yong', 'ho@gmail.com', 'No.2A, Jalan kp2/17, Taman Kjang Prima, 43000 Kajang, Selangor.,Kajang,Selangor,43000'),
(7, 10, 'Ho Chang Yong', 'ho@gmail.com', 'No.2A, Jalan kp2/17, Taman Kjang Prima, 43000 Kajang, Selangor.,Kajang,Selangor,43000'),
(9, 15, 'Low Chun Kit Alvin', 'alvin2@gmail.com', 'No. 88, Jalan 9/11, Taman cheras square,Cheras,Kuala Lumpur,43950'),
(13, 13, 'Justus Leong Yuek Kang', 'justus@gmail.com', 'No. 7C, Jalan Sri Penang, Taman Height,Cheras,Kuala Lumpur,43950'),
(14, 13, 'Low Chun Kit Alvin', 'alvin2@gmail.com', 'No. 88, Jalan 9/11, Taman cheras square,Cheras,Kuala Lumpur,43950'),
(15, 13, 'Justus Leong Yuek Kang', 'justus@gmail.com', 'No. 7C, Jalan Sri Penang, Taman Height,Cheras,Kuala Lumpur,43950'),
(16, 13, 'Justus Leong Yuek Kang', 'justus@gmail.com', 'No. 7C, Jalan Sri Penang, Taman Height,Cheras,Kuala Lumpur,43950'),
(17, 12, 'Chua E Heng', 'eheng@gmail.com', 'No.33, Jalan 2/16, Taman Saping height,Klang,Kuala Lumpur,43522'),
(18, 12, 'Chua E Heng', 'eheng@gmail.com', 'No.33, Jalan 2/16, Taman Saping height,Klang,Kuala Lumpur,43522'),
(19, 1, 'Michelle Ng', 'michelle@gmail.com', '1231,123,123,12312'),
(20, 13, 'Leong Yuek Kang', 'justus@gmail.com', '123123,123123123,123123,12313'),
(21, 1, 'Michelle Ng', 'michelle@gmail.com', '12321313,1231321,12312313,12312'),
(22, 17, 'Ali Ali', 'ali1@mail.com', '12313,123123,123123,12312');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_price` decimal(10,2) NOT NULL,
  `book_img` varchar(300) NOT NULL,
  `book_desc` text NOT NULL,
  `book_format` varchar(255) NOT NULL,
  `book_lang` varchar(255) NOT NULL DEFAULT 'English',
  `book_pub_date` varchar(255) NOT NULL,
  `book_publisher` varchar(255) NOT NULL,
  `book_page` int NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `category_FK` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_author`, `book_price`, `book_img`, `book_desc`, `book_format`, `book_lang`, `book_pub_date`, `book_publisher`, `book_page`, `quantity`, `category_id`) VALUES
(1, 'Billy Summers', 'Stephen King', '115.00', 'https://images-na.ssl-images-amazon.com/images/I/61d8F8stCkS.jpg', 'Billy Summers is a man in a room with a gun. He\'s a killer for hire and the best in the business. But he\'ll do the job only if the target is a truly bad guy. And now Billy wants out. But first there is one last hit. Billy is among the best snipers in the world, a decorated Iraq war vet, a Houdini when it comes to vanishing after the job is done. So what could possibly go wrong?', 'Hardback', 'English', '03 August 2021', 'Hodder & Stoughton', 448, '22', 3),
(2, 'I Had That Same Dream Again', 'Yoru Suminoe', '62.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/6450/9781645054399.jpg', 'An unhappy girl who engages in self-harm, a high schooler ostracized by her classmates, and an old woman looking to live out her twilight years in peace - what could three such different people have in common? That\'s what grade schooler Nanoka Koyanagi is trying to find out. Assigned by her teacher to define what \"happiness\" means to her, Nanoka tries to find her place in the world by exploring her relationships with these three strangers, and through them, comes to know herself.', 'Paperback', 'English', '07 July 2020', 'Seven Seas Entertainment, LLC', 300, '120', 3),
(3, 'Outlander', 'Diana Gabaldon', '49.00', 'https://images-na.ssl-images-amazon.com/images/I/71pjU7wfZFL.jpg', 'The year is 1945. Claire Randall, a former combat nurse, is just back from the war and reunited with her husband on a second honeymoon when she walks through a standing stone in one of the ancient circles that dot the British Isles. Suddenly she is a Sassenach—an “outlander”—in a Scotland torn by war and raiding border clans in the year of Our Lord...1743.', 'Paperback', 'English', '01 August 1996', 'Bantam Doubleday Dell Publishing Group Inc', 896, '209', 3),
(4, 'Sherlock Holmes', 'Sir Arthur Conan Doyle', '95.20', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/8402/9781840220766.jpg', 'From 1891, beginning with The Adventures of Sherlock Holmes, the now legendary and pioneering Strand Magazine began serializing Arthur Conan Doyle\'s matchless tales of detection, featuring the incomparable sleuth patiently assisted by his doggedly loyal and lovably pedantic friend and companion, Dr Watson.', 'Hardback', 'English', '05 March 2008', 'Wordsworth Editions Ltd', 1408, '20', 3),
(5, 'The Underground Railroad', 'Colson Whitehead', '39.00', 'https://upload.wikimedia.org/wikipedia/en/thumb/3/32/The_Underground_Railroad_Poster.png/250px-The_Underground_Railroad_Poster.png', 'Cora is a slave on a cotton plantation in Georgia. All the slaves lead a hellish existence, but Cora has it worse than most; she is an outcast even among her fellow Africans and she is approaching womanhood, where it is clear even greater pain awaits. When Caesar, a slave recently arrived from Virginia, tells her about the Underground Railroad, they take the perilous decision to escape to the North. . . .', 'Paperback', 'English', '29 June 2017', 'Little, Brown Book Group', 400, '43', 3),
(6, 'A Slow Fire Burning', 'Paula Hawkins', '78.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/8575/9780857524454.jpg', 'Laura has spent most of her life being judged. She\'s seen as hot-tempered, troubled, a loner. Some even call her dangerous.\r\nMiriam knows that just because Laura is witnessed leaving the scene of a horrific murder with blood on her clothes, that doesn\'t mean she\'s a killer. Bitter experience has taught her how easy it is to get caught in the wrong place at the wrong time.\r\nCarla is reeling from the brutal murder of her nephew. She trusts no one: good people are capable of terrible deeds. But how far will she go to find peace?', 'Paperback', 'English', '01 September 2021', 'Transworld Publishers Ltd', 320, '33', 3),
(7, 'Where the Crawdads Sing', 'Delia Owens', '37.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4721/9781472154668.jpg', 'For years, rumors of the \'Marsh Girl\' have haunted Barkley Cove, a quiet town on the North Carolina coast. So in late 1969, when handsome Chase Andrews is found dead, the locals immediately suspect Kya Clark, the so-called Marsh Girl. But Kya is not what they say. Sensitive and intelligent, she has survived for years alone in the marsh that she calls home, finding friends in the gulls and lessons in the sand. Then the time comes when she yearns to be touched and loved. When two young men from town become intrigued by her wild beauty, Kya opens herself to a new life - until the unthinkable happens.', 'Paperback', 'English', '20 Dec 2019', 'Little, Brown Book Group', 384, '22', 3),
(8, 'All the Light We Cannot See', 'Anthony Doerr', '52.00', 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781501173219/all-the-light-we-cannot-see-9781501173219_hr.jpg', 'For Marie-Laure, blind since the age of six, the world is full of mazes. The miniature of a Paris neighborhood, made by her father to teach her the way home. The microscopic layers within the invaluable diamond that her father guards in the Museum of Natural History. The walled city by the sea, where father and daughter take refuge when the Nazis invade Paris. And a future which draws her ever closer to Werner, a German orphan, destined to labor in the mines until a broken radio fills his life with possibility and brings him to the notice of the Hitler Youth.\r\n', 'Paperback', 'English', '01 May 2015', 'HarperCollins Publishers', 544, '88', 3),
(9, 'The Innovators', 'Walter Isaacson', '60.90', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4711/9781471138805.jpg', 'Following his blockbuster biography of Steve Jobs, The Innovatorsis Walter Isaacson\'s story of the people who created the computer and the Internet. It is destined to be the standard history of the digital revolution and a guide to how innovation really works.\r\n\r\nWhat talents allowed certain inventors and entrepreneurs to turn their disruptive ideas into realities? What led to their creative leaps? Why did some succeed and others fail?', 'Paperback', 'English', '06 Oct 2015', 'Simon & Schuster Ltd', 560, '56', 4),
(10, 'What\'s Your Type?', 'Merve Emre', '96.20', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/0082/9780008201388.jpg', 'First conceived in the 1920s by the mother-daughter team of Katherine Briggs and Isabel Briggs Myers, a pair of aspiring novelists and devoted homemakers, the Myers-Briggs was designed to bring the gospel of Carl Jung to the masses. But it would take on a life of its own, reaching from the smoke-filled boardrooms of mid-century New York to Berkeley, California, where it was honed against some of the 20th century\'s greatest creative minds. It would travel across the world to London, Zurich, Cape Town, Melbourne, and Tokyo; to elementary schools, nunneries, wellness retreats, and the closed-door corporate training sessions of today.\r\n', 'Paperback', 'English', '11 Sep 2018', 'HarperCollins Publishers', 336, '166', 4),
(11, 'Understanding Biographies', 'Birgitte Possing', '121.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9788/7767/9788776749927.jpg', 'In modern and postmodern times, biography is one of the most popular genres of the day. In Understanding Biographies, the Danish historian and biographer Birgitte Possing uncovers the essence of biography as a genre, spanning a number of radically different types of life-storytelling. She defines biography as a genre, a narrative form and an analytic field, providing guidelines to an understanding of gender, archetypes, narrative traditions, critique and ethics of the field. ', 'Paperback', 'English', '01 Oct 2021', 'University Press of Southern Denmark', 232, '135', 4),
(12, 'A Del of a Life', 'David Jason', '96.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/5291/9781529125115.jpg', 'Fortunately, during my life and career I have been given all sorts of advice and learned huge amounts from some great and enormously talented people. I\'ve been blessed to play characters such as Derek Trotter, Granville, Pop Larkin and Frost, who have changed my life in all sorts of ways, and taught me lessons that go far beyond the television set. And I\'ve worked a few things out for myself as well, about friendship, ambition, rejection, success, failure, adversity and fortune. So lean back, pour yourself a glass, and try not to fall through the bar flap . . .\'', 'Hardback', 'English', '01 Jan 2021', 'Cornerstone', 336, '65', 4),
(13, 'The Everything Store', 'Brad Stone', '78.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/3162/9780316219280.jpg', 'Amazon.com started off delivering books through the mail. But its visionary founder, Jeff Bezos, wasn\'t content with being a bookseller. He wanted Amazon to become the everything store, offering limitless selection and seductive convenience at disruptively low prices. To do so, he developed a corporate culture of relentless ambition and secrecy that\'s never been cracked. Until now. Brad Stone enjoyed unprecedented access to current and former Amazon employees and Bezos family members, giving readers the first in-depth, fly-on-the-wall account of life at Amazon', 'Paperback', 'English', '12 Aug 2014', 'Little, Brown & Company', 416, '54', 4),
(14, '438 Days', 'Jonathan Franklin', '48.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/5098/9781509800193.jpg', 'On 17th November, 2012, Salvador Alvarenga left the coast of Mexico for a two-day fishing trip. A vicious storm killed his engine and the current dragged his boat out to sea. The storm picked up and carried him West, deeper into the heart of the Pacific Ocean. Alvarenga would not touch solid ground again for 14 months. When he was washed ashore on January 30th, 2014, he had drifted over 9,000 miles.', 'Paperback', 'English', '02 Jul 2016', 'Pan Macmillan', 300, '77', 4),
(15, 'My Own Words', 'Ruth Bader Ginsburg ', '55.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/5011/9781501145254.jpg', 'The New York Times bestselling book from Supreme Court Justice Ruth Bader Ginsburg-\"a comprehensive look inside her brilliantly analytical, entertainingly wry mind, revealing the fascinating life of one of our generation\'s most influential voices in both law and public opinion\" (Harper\'s Bazaar).', 'Paperback', 'English', '16 Oct 2018', 'Simon & Schuster', 400, '90', 4),
(16, 'The Little Big Things', 'Henry Fraser', '88.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4091/9781409167785.jpg', 'Henry Fraser was 17 years old when a tragic accident severely crushed his spinal cord. Paralysed from the shoulders down, he has conquered unimaginable difficulty to embrace life and a new way of living. Through challenging adversity, he has found the opportunity to grow and inspire others.', 'Hardback', 'English', '04 Dec 2018', 'Orion Publishing Co', 176, '53', 4),
(17, 'A Deadly Education', 'Naomi Novik', '44.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/5291/9781529100877.jpg', 'In the start of an all-new trilogy, the bestselling author of Uprooted and Spinning Silver introduces you to a dangerous school for the magically gifted where failure means certain death -- until one girl begins to rewrite its rules.', 'Paperback', 'English', '06 May 2021', 'Cornerstone', 336, '123', 2),
(18, 'Holding Up the Universe', 'Jennifer Niven', '41.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/1413/9780141357058.jpg', 'From the author of the New York Times bestseller All the Bright Places comes a heart-wrenching story about what it means to see (and love) someone for who they truly are.', 'Paperback', 'English', '06 Oct 2016', 'Penguin Random House Children\'s UK', 432, '166', 2),
(19, 'Educated', 'Tara Westover', '53.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/9848/9781984854858.jpg', 'Born to survivalists in the mountains of Idaho, Tara Westover was seventeen the first time she set foot in a classroom. Her family was so isolated from mainstream society that there was no one to ensure the children received an education, and no one to intervene when one of Tara’s older brothers became violent. When another brother got himself into college, Tara decided to try a new kind of life. Her quest for knowledge transformed her, taking her over oceans and across continents, to Harvard and to Cambridge University. Only then would she wonder if she’d traveled too far, if there was still a way home.', 'Paperback', 'English', '30 Oct 2018', 'Random House USA Inc', 352, '57', 2),
(20, 'Make It Happen', 'Jordanna Levin', '45.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/9223/9781922351463.jpg', 'In this warm and witty book, Jordanna shares her personal experiences and struggles along with her foolproof equation for manifesting whatever you desire, from your dream job to a lasting relationship. Whether you\'re a matter-of-fact skeptic or a somewhat hippie yoga-lover, Make It Happen will empower you to take ownership of your life and create anything you want.', 'Paperback', 'English', '20 Apr 2021', 'Murdoch Books', 352, '73', 2),
(21, 'Think You Know it All?', 'Daniel Smith', '45.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/8431/9781843174578.jpg', 'Were your school exercise books adorned with huge ticks, glowing comments and gold stars? Did you win prizes for your awe-inspiring performances on the toughest of tests? Do you still think you know it all? If you reckon you\'ve got what it takes to list the capitals of Europe, name the 52 states of the USA, check off all 38 Shakespeare plays, or recall all the James Bond films (in order), let\'s find out.', 'Hardback', 'English', '20 May 2010', 'Michael O\'Mara Books Ltd', 224, '90', 2),
(22, 'Research Methods in Education', 'Louis Cohen', '245.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/1382/9781138209886.jpg', 'This thoroughly updated and extended eighth edition of the long-running bestseller Research Methods in Education covers the whole range of methods employed by educational research at all stages. Its five main parts cover: the context of educational research; research design; methodologies for educational research; methods of data collection; and data analysis and reporting. It continues to be the go-to text for students, academics and researchers who are undertaking, understanding and using educational research, and has been translated into several languages.', 'Paperback', 'English', '14 Dec 2017', 'Taylor & Francis Ltd', 916, '167', 2),
(23, 'Education in a New Society', 'Jal Mehta', '199.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/2265/9780226517421.jpg', 'The sociology of education, the contributors show, largely works with themes, concepts, and theories that were generated decades ago, even as both the actual world of education and the discipline of sociology have changed considerably. The moment has come, they argue, to break free of the past and begin asking new questions and developing new programs of empirical study. Both rallying cry and road map, Education in a New Society will galvanize the field.', 'Paperback', 'English', '12 Jun 2018', 'The University of Chicago Press', 464, '173', 2),
(24, 'Think Again', 'P. CLARKE', '70.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/7535/9780753553893.jpg', 'Discover how rethinking can lead to excellence at work and wisdom in life. Intelligence is usually seen as the ability to think and learn, but in a rapidly changing world it might matter more that we can rethink and unlearn. Organizational psychologist Adam Grant is an expert on opening other people\'s minds-and our own. As Wharton\'s top-rated professor and the bestselling author of Originals and Give and Take, he tries to argue like he\'s right but listen like he\'s wrong.', 'Paperback', 'English', '04 Feb 2021', 'Ebury Publishing', 320, '234', 2),
(25, 'Dragon Ball Super, Vol. 14', 'Akira Toriyama', '50.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/9747/9781974724635.jpg', 'Ever since Goku became Earth\'s greatest hero and gathered the seven Dragon Balls to defeat the evil Boo, his life on Earth has grown a little dull. But new threats loom overhead, and Goku and his friends will have to defend the planet once again in this continuation of Akira Toriyama\'s best-selling series, Dragon Ball!', 'Hardback', 'English', '30 Sep 2021', 'Viz Media, Subs. of Shogakukan Inc', 192, '11', 1),
(26, 'Bleach, Vol. 1', 'Tite Kubo', '60.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/5911/9781591164418.jpg', 'Ichigo Kurosaki has always been able to see ghosts, but this ability doesn\'t change his life nearly as much as his close encounter with Rukia Kuchiki, a Soul Reaper and member of the mysterious Soul Society. While fighting a Hollow, an evil spirit that preys on humans who display psychic energy, Rukia attempts to lend Ichigo some of her powers so that he can save his family; but much to her surprise, Ichigo absorbs every last drop of her energy. Now a fully-fledged Soul Reaper himself, Ichigo quickly learns that the world he inhabits is one full of dangerous spirits, and along with Rukia, who is slowly regaining her powers, it\'s Ichigo\'s job to both protect the innocent from Hollows and to help the spirits themselves find peace.', 'Hardback', 'English', '03 Sep 2007', 'Viz Media, Subs. of Shogakukan Inc', 192, '14', 1),
(27, 'One Piece, Vol. 1', 'Eiichiro Oda', '40.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/5693/9781569319017.jpg', 'As a child, Monkey D. Luffy dreamed of becoming King of the Pirates. But his life changed when he accidentally gained the power to stretch like rubber...at the cost of never being able to swim again! Years, later, Luffy sets off in search of the \"One Piece,\" said to be the greatest treasure in the world...', 'Paperback', 'English', '06 Oct 2008', 'Viz Media, Subs. of Shogakukan Inc', 216, '10', 1),
(28, 'Fairy Tail Vol. 1', 'Hiro Mashima', '65.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/6126/9781612622767.jpg', '17-year-old Lucy is an attractive mage-in-training who wants to join a magician\'s guild so that she can become a full-fledged magician. The guild she dreams about joining is the most famous in the world and it is known as the Fairy Tail. One day she meets Natsu, a boy raised by a Dragon who mysteriously left him when he was young. Natsu has devoted his life to finding his Dragon father. When Natsu helps Lucy out of a tricky situation, she discovers that he is a member of the Fairy Tail magician\'s guild and our heroes\' adventure together begins.', 'Paperback', 'English', '28 Aug 2012', 'Kodansha America, Inc', 208, '2', 1),
(29, 'One-Punch Man, Vol. 1', 'ONE', '55.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4215/9781421585642.jpg', 'Nothing about Saitama passes the eyeball test when it comes to superheroes, from his lifeless expression to his bald head to his unimpressive physique. However, this average-looking guy has a not-so-average problem - he just can\'t seem to find an opponent strong enough to take on! Every time a promising villain appears, he beats the snot out of \'em with one punch! Can Saitama finally find an opponent who can go toe-to-toe with him and give his life some meaning? Or is he doomed to a life of superpowered boredom?', 'Paperback', 'English', '24 Sep 2015', 'Viz Media, Subs. of Shogakukan Inc', 200, '39', 1),
(30, 'Attack On Titan 1', 'Hajime Isayama', '40.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/6126/9781612620244.jpg', 'Several hundred years ago, humans were nearly exterminated by giants. Giants are typically several stories tall, seem to have no intelligence and who devour human beings. A small percentage of humanity survied barricading themselves in a city protected by walls even taller than the biggest of giants. Flash forward to the present and the city has not seen a giant in over 100 years - before teenager Elen and his foster sister Mikasa witness something horrific as the city walls are destroyed by a super-giant that appears from nowhere.', 'Paperback', 'English', '19 Jun 2012', 'Kodansha America, Inc', 200, '5', 1),
(31, 'My Hero Academia, Vol. 1', 'Kohei Horikoshi', '90.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/4215/9781421582696.jpg', 'Middle school student Izuku Midoriya wants to be a hero more than anything, but he hasn\'t got an ounce of power in him. With no chance of ever getting into the prestigious U.A. High School for budding heroes, his life is looking more and more like a dead end. Then an encounter with All Might, the greatest hero of them all, gives him a chance to change his destiny...', 'Paperback', 'English', '27 Aug 2015', 'Viz Media, Subs. of Shogakukan Inc', 192, '8', 1),
(32, 'Invincible Compendium, Vol. 1', 'Robert Kirkman', '299.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/6070/9781607064114.jpg', '\"Ever since Mark Grayson got superpowers, life has never been the same. As Invincible, he\'s fought the universe\'s most dangerous villains, graduated high school, got a girlfriend (two of them!)... and his father, the world\'s greatest superhero Omni-Man, revealed himself to be an alien conqueror bent on taking over Earth. Since then, Invincible\'s been working for the Global Defense Agency, fighting their fights and saving the world in their name. Until now. Invincible can no longer follow their orders unquestioned. Now he finds himself up against the very organization he\'s been working for! And war looms on the horizon...\"', 'Paperback', 'English', '30 Aug 2011', 'Image Comics', 1024, '9', 1),
(33, 'Blue Period 1', 'Tsubasa Yamaguchi', '43.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/6465/9781646511129.jpg', 'Winner of the 2020 Manga Taisho Grand Prize! A manga about the struggles and rewards of a life dedicated to art. The studious Yatora leaves a dry life of study and good manners behind for a new passion: painting.....', 'Paperback', 'English', '13 Oct 2020', 'Kodansha America, Inc', 123, '13', 1),
(34, 'Life Without Limits', 'Nick Vujicic', '67.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/3075/9780307589743.jpg', 'Born without arms or legs, Nick Vujicic overcame his disabilities to live an independent, rich, fulfilling, and \"ridiculously good\" life while serving as a role model for anyone seeking true happiness.....', 'Paperback', 'English', '3 Feb 2015', 'Waterbrook Press', 232, '10', 2),
(35, 'Avengers Vs. X-Men (2013)', 'Brian Michael Bendiz', '46.62', 'https://i.annihil.us/u/prod/marvel/i/mg/d/90/4f7dc878b57fe/clean.jpg', 'Itâ€™s No Longer Comingâ€”Itâ€™s Here! â€¢ Does The Return Of The Phoenix To Earth Signal The Rebirth Of The Mutant Species? Thatâ€™s What The X-Men Believe! â€¢ Unfortunately, The Avengers Are Convinced That Its Coming Will Mean The End Of All Life On Earth! â€¢ The Stage Is Set For The Ultimate Marvel Showdown In This Oversized First Issue!', 'Paperback', 'English', '04 April 2012', 'Jim Cheung', 187, '18', 1),
(36, 'Solo Leveling', 'Chugong', '70.00', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/9753/9781975319458.jpg', 'E-rank hunter Jinwoo Sung thought he would die in the double dungeon...but instead, he heard a mysterious voice telling him that he\'s now a Player...? This new leveling system is something he\'s has never seen or heard of and comes with its own set of rules, monsters, and even dungeons! Jinwoo\'s not sure how or why this is happening to him, but if it can make him stronger, he\'s ready to give it everything he\'s got!', 'Paperback', 'English', '20 July 2021', 'Yen Press', 192, '10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Comic'),
(2, 'Education'),
(3, 'Novel'),
(4, 'Biography');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `contact_us_ID` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `Question` varchar(255) NOT NULL,
  PRIMARY KEY (`contact_us_ID`),
  KEY `user_FK` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_us_ID`, `userID`, `first_name`, `last_name`, `Reason`, `Question`) VALUES
(10, 13, 'Leong', 'Yuek', 'admin panel failure', 'the email showing all the same'),
(15, 10, 'Ho', 'Chang', 'login failure', 'Email and password entered correctly but still cannot login');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_reply`
--

DROP TABLE IF EXISTS `inquiry_reply`;
CREATE TABLE IF NOT EXISTS `inquiry_reply` (
  `reply_id` int NOT NULL AUTO_INCREMENT,
  `user_ID` int NOT NULL,
  `reason` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY (`reply_id`),
  KEY `uid_fk_reply` (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inquiry_reply`
--

INSERT INTO `inquiry_reply` (`reply_id`, `user_ID`, `reason`, `question`, `answer`) VALUES
(3, 12, 'account information', 'cannot edit my personal details such as email, password...', 'Dear customer, we fixed the bug, you may try again'),
(7, 13, 'test', 'testing', 'tested'),
(8, 12, 'register failure', 'alway have a pop up alert and say something went wrong', 'Dear customer, please check your details entered correctly or not, thanks'),
(13, 1, 'Add to Cart Problem', 'I cannot click on checkout', 'I have solved the problem, please try again');

-- --------------------------------------------------------

--
-- Table structure for table `personal_history`
--

DROP TABLE IF EXISTS `personal_history`;
CREATE TABLE IF NOT EXISTS `personal_history` (
  `history_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `book_id` int NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `date_of_purchase` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`history_id`),
  KEY `uid_fk` (`user_id`),
  KEY `bid_fk` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_history`
--

INSERT INTO `personal_history` (`history_id`, `user_id`, `book_id`, `book_name`, `date_of_purchase`, `amount`) VALUES
(1, 1, 18, 'Holding Up the Universe', '2021-10-01', '41.00'),
(2, 1, 18, 'Holding Up the Universe', '2021-11-05', '41.00'),
(3, 1, 14, '438 Days', '2021-11-05', '48.00'),
(5, 17, 1, 'Billy Summers', '2021-11-05', '115.00'),
(6, 17, 35, 'Avengers Vs. X-Men (2012)', '2021-11-05', '46.60'),
(7, 17, 2, 'I Had That Same Dream Again', '2021-11-05', '62.00'),
(8, 17, 16, 'The Little Big Things', '2021-11-05', '88.00');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

DROP TABLE IF EXISTS `shoppingcart`;
CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `cart_ID` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `bookID` int NOT NULL,
  `cart_quantity` int NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  PRIMARY KEY (`cart_ID`),
  KEY `book_ID_FK` (`bookID`),
  KEY `user_ID_FK` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `mobile_num` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `gender`, `mobile_num`) VALUES
(1, 'Mitch', 'michelle@gmail.com', '202cb962ac59075b964b07152d234b70', 'Michelle', 'Ng', 'Female', '0169853498'),
(2, 'Luka', 'luka@mail.com', '202cb962ac59075b964b07152d234b70', 'Luka', 'Doncic', 'Male', '0166236985'),
(10, 'HOCY', 'ho@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ho', 'Chang Yong', 'Male', '0162987532'),
(12, 'E heng', 'eheng@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Chua', 'E Heng', 'Male', '0129493832'),
(13, 'Justus', 'justus@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Leong', 'Yuek Kang', 'Male', '0192923829'),
(14, 'john', 'john@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'john', 'ma', 'Female', '0183629322'),
(15, 'alvin', 'alvin2@gmail.com', '202cb962ac59075b964b07152d234b70', 'Low', 'Chun Kit', 'Male', '0134857253'),
(17, 'Ali', 'ali1@mail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Ali', 'Ali', 'Female', '01236651599');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billing_address`
--
ALTER TABLE `billing_address`
  ADD CONSTRAINT `userID_FK` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `category_FK` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `contactus`
--
ALTER TABLE `contactus`
  ADD CONSTRAINT `user_FK` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);

--
-- Constraints for table `inquiry_reply`
--
ALTER TABLE `inquiry_reply`
  ADD CONSTRAINT `uid_fk_reply` FOREIGN KEY (`user_ID`) REFERENCES `users` (`id`);

--
-- Constraints for table `personal_history`
--
ALTER TABLE `personal_history`
  ADD CONSTRAINT `bid_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `uid_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `book_ID_FK` FOREIGN KEY (`bookID`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `user_ID_FK` FOREIGN KEY (`userID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
