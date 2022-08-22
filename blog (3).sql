-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 11:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `username`, `comment`, `created_at`) VALUES
(1, 16, 17, 'David Kariuki', '&lt;p&gt;Nice Work,&lt;/p&gt;&lt;p&gt;Very educative,&lt;/p&gt;&lt;p&gt;Regards.&lt;/p&gt;', '2020-04-07 17:28:22'),
(2, 16, 17, 'David Kariuki', '&lt;p&gt;Good Work man,&lt;/p&gt;&lt;p&gt;You are gonna make it one day.&lt;/p&gt;', '2020-04-07 17:30:45'),
(3, 37, 17, 'David Kariuki', '&lt;p&gt;very educative,&lt;/p&gt;&lt;p&gt;keep up the good work&lt;/p&gt;', '2020-04-08 17:56:57'),
(4, 39, 17, 'David Kariuki', '&lt;p&gt;i believe in a thing called love.....&lt;/p&gt;&lt;p&gt;by the Darkness&lt;/p&gt;', '2020-04-08 18:06:37'),
(5, 39, 17, 'David Kariuki', '&lt;p&gt;I believe in a thing called love....&lt;/p&gt;&lt;p&gt;by the darkness&lt;/p&gt;', '2020-04-08 18:06:54'),
(6, 39, 17, 'David Kariuki', '&lt;p&gt;nice stuff bro&lt;/p&gt;', '2020-04-09 08:33:49'),
(7, 15, 17, 'David Kariuki', '&lt;p&gt;thank you for the content....very very educational&lt;/p&gt;&lt;p&gt;Regards&lt;/p&gt;', '2020-04-09 08:55:05'),
(8, 36, 17, 'David Kariuki', '&lt;p&gt;yummy&lt;/p&gt;', '2020-04-09 08:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `sender_name` varchar(250) NOT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `recipient_name` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `body` varchar(250) NOT NULL,
  `viewed` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `sender_name`, `recipient_id`, `recipient_name`, `subject`, `body`, `viewed`, `created_at`) VALUES
(1, 17, 'David Kariuki', 25, 'Pampido', 'Remark on your outstanding work', '&lt;p&gt;Nice work you\'ve been doing lately,&lt;/p&gt;&lt;p&gt;keep up.&lt;/p&gt;&lt;p&gt;regards&lt;/p&gt;', 0, '2020-04-09 19:52:49'),
(2, 17, 'David Kariuki', 17, 'David Kariuki', 'Test', '&lt;p&gt;Brave,&lt;/p&gt;&lt;p&gt;stong,&lt;/p&gt;&lt;p&gt;enabled.&lt;/p&gt;', 0, '2020-04-09 19:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `sub` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `email`, `sub`, `created_at`) VALUES
(1, 'david', 'dkariuki8125@gmail.com', 1, '2020-04-07 17:48:40'),
(2, 'winnie', 'nmungai2018@gmail.com', 1, '2020-04-07 17:49:17'),
(3, 'mary', 'marymungai2019@icloud.com', 1, '2020-04-08 17:36:36'),
(4, 'mary', 'marymungai2014@gmail.com', 1, '2020-04-08 17:38:41'),
(5, 'jeff', 'jeffmungai2019@gmail.com', 1, '2020-04-08 17:40:16'),
(7, 'Moses', 'moses@gmail.com', 1, '2020-04-08 20:59:59'),
(8, 'Test', '123@gmail.com', 1, '2020-04-08 21:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `username`, `topic_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(15, 17, 'David Kariuki', 9, 'Stop what you are doing and learn coding', '1580236832_Technology-Track.jpg', '&lt;p&gt;Mark Zuckerberg, Steve Jobs, Elon Musk: Today&rsquo;s business role models are those who have created technology products that define and shape the behavior of millions&amp;nbsp;- the iPhone, Facebook, Tesla, PayPal. And none of them could have got where they were without coding. For example take Elon Musk&amp;nbsp;- he wrote his first computer game aged 12 and successfully sold it for $500: a feat that was extremely brilliant for at that age all children worry about is how the game is played and not how it&rsquo;s made.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Elon probably doesn&rsquo;t code that much anymore, he has employees to do that for him - but the principles and skills he learnt are essential for managing his employees, coming up with new business ideas, and running his company to ensure maximum growth.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;br&gt;And that&rsquo;s why coding is so essential. Even if you&rsquo;re not coding yourself on a day-to-day basis, you&rsquo;ll probably be either supervising programmers or working alongside them in some capacity.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;br&gt;Half of all programming openings aren&rsquo;t in the &lsquo;technology&rsquo; industry as people would think. Instead, they are in finance (to create e-finance apps such as Jumia, Kilimall, Tala; just to mention a few), science, engineering (to create apps and sites that aid in engineering calculations such as Autodesk product design suite, MatLab, CATIA; just to mention a few), healthcare (to create apps that measure your vital signs, aid doctors in disease hypothesis, aid to help users to exercise and much more), and more (source:&amp;nbsp;&lt;a href=&quot;http://burning-glass.com/research/coding-skills/&quot;&gt;Burning Glass&lt;/a&gt;).&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Coding is no longer a specialist skill; it&rsquo;s a core skill&lt;/strong&gt;.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;br&gt;Let&rsquo;s look at an example - the fashion industry. Wearable technology today means bracelets and smartwatches, but in a few years&rsquo; time there will be smart clothing that can do everything your phone does today and more. Workout clothes that track your performance, shirts that can call a taxi at the end of your night out, underwear that monitors your health, vests that aid the wearer to detoxifying the body: the possibilities are almost endless.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;br&gt;Faced with that future, which fashion student is more hire able: Student A with just a fashion degree, or Student B, who has a fashion degree too, but has also taught themselves how to code?&lt;/p&gt;&lt;p&gt;I know which one I&rsquo;d hire. Student B will be able to understand and communicate with the specialists creating the tech easily and will require significantly less training, thus increasing maximum efficiency which is what many employers are after.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;br&gt;By looking at new, disruptive technologies starting to come into play today, we can see that there will be a high demand for coding skills:&lt;/p&gt;&lt;p&gt;&lt;br&gt;Big Data, Artificial Intelligence, the Internet of Things (I.O.T), Wearable Technology, Virtual Reality; almost all future trends will require coding skills.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;br&gt;Meanwhile, traditional jobs - manufacturing, transportation, even financial trading - are at risk from artificial intelligence. Even law, a traditionally &lsquo;safe&rsquo; job with good prospects, is at risk of contracting, as artificial intelligence learns to do much of the legal-work that makes up a lawyer&rsquo;s day-to-date job.&lt;/p&gt;&lt;p&gt;&lt;i&gt;Knowledge is having the right answer; intelligence is asking the right question! &lt;/i&gt;I bet that by now you are even more worried about your future career prospects? Don&rsquo;t be. Coding is totally based on your mindset; if you believe that its hard then it will be the hardest thing you will ever do so you should train your mindset to the thought that coding is just like driving, with constant practice it become a part of you. You&rsquo;ve got time to learn to code if you want to and there are&amp;nbsp;tools&amp;nbsp;that allow you to teach yourself, for free. Whatever you&rsquo;re chosen industry might be, learning to code could be one of the best career choices you make.&lt;/p&gt;&lt;p&gt;&lt;br&gt;Trust me on this, because in the end, everyone will run on the motto:&lt;/p&gt;&lt;p&gt;&lt;i&gt;&lt;strong&gt;Declare variables and not war.&lt;/strong&gt;&lt;/i&gt;&lt;/p&gt;', 1, '2020-01-28 18:40:32'),
(16, 17, 'David Kariuki', 6, 'Power of saying no!!', '1580236975_power of saying no 6.jpg', '&lt;p&gt;Over the course of the weekend I visited a friend of mine who lives close by. It had been long before I had seen him. While I was there I noticed a few things. One for starters was that his girl was doing most of the chores in the house. She looked tired but my friend still kept giving her additional tasks to perform. Although she didn&rsquo;t want to do them, she couldn&rsquo;t bring herself to say &ldquo;no&rdquo; to her boyfriend. I had to intervene to give the girl a break.&lt;/p&gt;&lt;p&gt;Later when I left for home I kept thinking about the poor girl and her predicament. I could imagine how she was inconveniencing herself by agreeing to everything she was told to do.&lt;/p&gt;&lt;p&gt;That&rsquo;s when I realized that &ldquo;No&rdquo; is such a small word that packs a lot of power. It carries with it an invisible force that can make it feel like overly oppressive, or even like a dirty word. We&rsquo;re often taught that saying &ldquo;no&rdquo; is a negative thing, that it hurts those around us and causes us to miss out on new, exciting opportunities. It&rsquo;s no wonder so many people are uncomfortable saying it.&lt;/p&gt;&lt;p&gt;But the truth is, when you say &ldquo;no,&rdquo; you&rsquo;re not saying &ldquo;I hate you,&rdquo; and you&rsquo;re not insulting someone, you&rsquo;re simply exercising your right to say &ldquo;no.&rdquo; Because it is a&lt;strong&gt; right&lt;/strong&gt;, not a privilege.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Wielded wisely,&amp;nbsp;&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&lt;strong&gt;No is an instrument of integrity and a shield against exploitation.&lt;/strong&gt;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&amp;nbsp;It often takes courage to say. Its hard to receive.&amp;nbsp;&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;&lt;strong&gt;But setting limits sets us free.&lt;/strong&gt;&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;The reason why many people are afraid to say no lies not in the obvious need to please; but rather in the fact that some of us have the tendency to put others objectives above our own. Our inability to say &ldquo;no&rdquo; stems from the fact that we want to &lt;strong&gt;reassure&lt;/strong&gt; and &lt;strong&gt;make others feel comfortable.&lt;/strong&gt; This is a notion you need to shake, immediately. Being unable to say &ldquo;no&rdquo; is not only unfair to ourselves, but it can be unfair to the other person as well.&lt;/p&gt;&lt;p&gt;But i do understand why people say yes rather than no.Disregarding our own feelings and needs seems like the &lt;strong&gt;unselfish thing to do&lt;/strong&gt;. After all, we are taught to give, not take.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;But, just because it&rsquo;s easier to say &ldquo;yes&rdquo; doesn&rsquo;t mean we should. Think about times when you&rsquo;ve agreed to do something, be it in your professional or personal life, and later resented yourself or the person who asked you for something later. How did that make you feel? Didn&rsquo;t you wish you could go back in time and tap into your right to say no?&lt;/p&gt;&lt;p&gt;We should all learn to say no. before making any decision; first stop and think, assess the situation. Critically think of all the outcomes that will come out of your decision; be it a &lt;strong&gt;yes or no;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;decide whether the decision will be beneficial to both you and others. Try imagining if saying &ldquo;no&rdquo; would be the better option for both parties. The power of no can be beneficial for all parties involved sometimes&lt;/p&gt;&lt;p&gt;Of course, if a hard &ldquo;no&rdquo; is still too difficult to say, there are other ways to state it. For instance: &ldquo;That will not work for me&rdquo; &ldquo;Not at this time&rdquo; and &ldquo;I choose not to&quot; are all different ways to say &ldquo;no&rdquo; that don&rsquo;t feel quite as harsh. Practice turning others down and get more comfortable in your right to say no. And remember, it &lt;i&gt;is&lt;/i&gt; your right to decide how you spend your time.&lt;/p&gt;&lt;p&gt;So guys i hope this post helps you a lot. For any inquires you can leave a comment below and I\'ll respond as soon as possible. Have a blessed week ahead. Sayonara !&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 1, '2020-01-28 18:42:55'),
(27, 32, 'Awat', 9, 'Man who created cut and paste dies at 74!!', '1582201187_BB10aSJg.png', '&lt;p&gt;Computer scientist and user interface guru Larry Tesler, a key figure at Apple during its early years, died Monday at the age of 74, according to Apple Insider.&nbsp;&lt;br&gt;&nbsp;&lt;/p&gt;&lt;p&gt;Tesler pioneered the concept of &quot;cut-copy-paste&quot; during his time at the Xerox Palo Alto Research Center in the 1970s. In the following two decades at Apple, he would be deeply involved in the user interface design of the Lisa, Macintosh and Newton, a precursor to the iPhone .&lt;/p&gt;&lt;p&gt;In 1979, Tesler was assigned to show Apple co-founder Steve Jobs around Xerox PARC, including the tour in which Jobs and a few other Apple employees got to see Xerox\'s Alto computer in action. The computer featured icons, windows, folders, a mouse, pop-up menus, WYSIWYG (What You See Is What You Get) text editor, Ethernet-based local networking and network-based printing and games. The concept of &quot;cut, copy and paste&quot; was also part of the demonstration.&lt;br&gt;&nbsp;&lt;/p&gt;&lt;p&gt;&quot;Steve was very excited and was pacing around the room, and occasionally looking at the screen,&quot; Tesler said&nbsp;in 2011 at a Churchill Club event in San Jose, California. He recalled Jobs\' reaction as he led them on the product tour. &quot;\'You are sitting on a goldmine. Why aren\'t you doing something with this technology... you could change this world.\' It was clear to him that Xerox was never going to do the kind of revolution things he was envisioning.&quot;&lt;/p&gt;&lt;p&gt;The result of the meeting was that Apple got to see the graphical user interface (GUI) that ended up making it into the Mac OS. Jobs also persuaded Tesler to leave Xerox to go work for Apple the following year, managing the Lisa applications team.&lt;/p&gt;', 1, '2020-02-20 08:50:07'),
(30, 25, 'Pampido', 6, 'Self Love', '1582271115_Self Love.jpg', '&lt;p&gt;I have been holding back posting anything here. Reason?&lt;/p&gt;&lt;p&gt;I hate being judged. Though it hasn&rsquo;t happened that many times to warrant the amount of morbid fear I have assigned to it, the few times it has happened, it has come from very unexpected quarters, especially from people I had, hitherto, held in high esteem.&lt;/p&gt;&lt;p&gt;Their words cut deep. Just remembering to those instances makes me cringe. And being the occasional emotional mess that I can be I tear up a little bit.&lt;/p&gt;&lt;p&gt;The other day I started reading a book with a not so PG rated title, &lsquo;The Subtle Art of Not Giving A F**k&rsquo;, and in that book, this far I have gleaned a few gems. For example, You will never be happy if you continue to search for what happiness consists of. You will never live if you are looking for the meaning of life.&lt;/p&gt;&lt;p&gt;And, the best quote I have read in that book is,&lt;/p&gt;&lt;p&gt;&quot;The desire for more positive experience is itself a negative experience. And, paradoxically, the acceptance of one&rsquo;s negative experience is itself a positive note experience.&quot;&lt;/p&gt;&lt;p&gt;Basically the conclusion reached here is that one shouldn&rsquo;t care as much what people think of you. Because there are people that will judge, dislike you and be generally nasty towards you on one side of the spectrum and there are those that will love you as you are, warts et al. Those that lie in the middle could as well fall to either end when they get information they are looking for.&lt;/p&gt;&lt;p&gt;I have cared way too much, invested way too much, emotionally, in people and expecting the same from them. Basically looking for myself in other people. That will soon stop. Not the caring and investing in people, but expecting people to reciprocate the same energy I put in. If I receive the same energy, well and good. If not, then shod it.&lt;/p&gt;&lt;p&gt;I will try, though I don&rsquo;t have the foggiest how I will do it, to not take people&rsquo;s criticism and judgement of me too personally. Grow a thick skin as it were and those that do get to read this blog will have a front row seat as to how I will do that. If I ever do that!&lt;/p&gt;&lt;p&gt;Anywho, here goes nothing&hellip;&hellip; Let&rsquo;s see what people around me will think. Here&rsquo;s to self love.&lt;/p&gt;', 1, '2020-02-21 05:54:58'),
(31, 25, 'Pampido', 6, 'Blog or Journal?', '1582265505_Budha.jpg', '&lt;p&gt;At the beginning of the year I had set a few resolutions for myself. They were, in no particular order;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Exercise&lt;/li&gt;&lt;li&gt;Journal&lt;/li&gt;&lt;li&gt;Learn and read more&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;On exercising, I have done the very thing most people do when they set the resolution at the end or beginning of the year, I started with a bang out of the gate and slowly fizzled out. Though in my defense I did feel like I was giving myself a hernia or something (It&rsquo;s a cop out, I know).&lt;/p&gt;&lt;p&gt;Learning and reading are always at the fore of my mind. This is hugely driven by the fact at times I seem to feel inadequate when speaking to people. Don&rsquo;t get me wrong, I am a &ldquo;wealth of useless information&rdquo;, as I have been keen to let people know. I am not dumb by any measure, but there are people who you talk to and they sound so knowledgeable that at that moment you start questioning what topic you could talk about with such eloquence and confidence and you come up short. Anyway, that is the main reason I am always reading, listening and watching stuff that will enlarge my &lsquo;repertoire&rsquo; of knowledge.&lt;/p&gt;&lt;p&gt;Journaling was also started with great enthusiasm, peppered with a lot of anger and resentment. I read back on what I wrote before and my goodness I was in a dark place. I simply STOPPED. It only now with great encouragement from Dave that I have decided to revive this and do the writing here. As Sylvia Plath opines, &ldquo;&lt;strong&gt;Nothing stinks like a pile of unpublished writing&lt;/strong&gt;.&rdquo; This &amp;nbsp;got me thinking, should I go back to journaling? Do I &amp;nbsp;have a difficult time writing, and &amp;nbsp;if affirmative, how can I improve? &amp;nbsp;So guys bear with me as I experiment here.&lt;/p&gt;', 1, '2020-02-21 06:11:45'),
(32, 32, 'Awat', 12, 'Tyson Fury beats Deontay Wilder in their heavyweight rematch ', '1582439593_Capture.PNG', '&lt;p&gt;It\'s all over and we have a new WBC heavyweight champion of the world. Tyson Fury manhandled Deontay Wilder over seven grueling rounds before the &quot;Bronze Bomber\'s&quot; corner threw in the towel to declare Fury the winner. Fury outmatched Wilder in every way, dropping him multiple times in the fight and causing him to bleed out of his ear.&lt;/p&gt;&lt;p&gt;The victory comes 14 months after the two heavyweights fought to a draw in a dramatic fight, and a sold-out crowd was on hand at the MGM Grand arena to watch them do it again.&lt;/p&gt;', 1, '2020-02-23 06:33:13'),
(33, 17, 'David Kariuki', 12, 'Lupita Nyong\'o Scoops 2 awards at NAACP Image Awards in Los Angeles', '1582608421_lupitaa.jfif', '&lt;p&gt;Our very own Hollywood star Lupita Nyong\'o had a night to remember at the National Association for the Advancement of Colored People (NAACP) Image Awards.The actress scooped two awards at the 51st edition of the awards held on the night of Saturday, February 22.&lt;/p&gt;&lt;p&gt;Lupita won the award for Best Actress for her role in Jordan Peele\'s movie and her second award was for her own creation, the book Sulwe which grabbed the award for Outstanding Literary Work Children.&lt;/p&gt;&lt;p&gt;Even though the stylish Lupita was not at the event as she was in Africa, she could not fail to celebrate in the best way possible.She moved to her social media to celebrate her win, as she was proud to have become one of the esteemed winners.&lt;/p&gt;&lt;p&gt;&ldquo;I could not be happier to have received this honour for my first book, Thank you NAACPImageAwards, &quot;she wrote on her Instagram.&lt;/p&gt;&lt;p&gt;She also went on her Insta Story to celebrate her win for the best actress award.&lt;/p&gt;&lt;p&gt;&quot;I just got the news about the best actress award from the NAACP Image Awards for the movie US, just wanna say thank you so much, I&rsquo;m so sorry that I could not be there myself. I&rsquo;m away in my homeland doing some work and I just want to share how honoured I am,&quot; she said.&lt;/p&gt;&lt;p&gt;The actress had announced her nominations for four major categories with the US movie taking up two of the positions.&lt;/p&gt;&lt;p&gt;She was contesting for Outstanding Actress in a Motion Picture for the Us Movie, Outstanding Ensemble Cast in a Motion Picture for the Us Movie, Outstanding Character Voice-Over Performance for Serengeti and Outstanding Literary Work Children for her book Sulwe.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 1, '2020-02-25 05:27:01'),
(34, 17, 'David Kariuki', 12, 'Rubik\'s Cube Mona Lisa fetches 480,000 euros at Paris auction', '1582608943_rubik.jfif', '&lt;p&gt;A Mona Lisa as puzzling as the smile of Leonardo da Vinci\'s muse, made out of nearly &lt;strong&gt;300&lt;/strong&gt; Rubik\'s Cubes -- sold for nearly half a million euros at auction in Paris on Sunday evening.&lt;/p&gt;&lt;p&gt;Created by the French street artist Franck Slama, famous for the pixellated Space Invader mosaics that have popped up on city streets around the world, the &quot;Rubik Mona Lisa&quot; sold for &lt;strong&gt;480,000 euros&lt;/strong&gt; ( &lt;strong&gt;Kshs 52, 700, 170&lt;/strong&gt;), a record for the artist, Artcurial auction house said. Its guide price was 120,000 (Kshs 13, 174, 072) to 150,000 euros (Kshs 16, 467, 589).&lt;/p&gt;&lt;p&gt;Slama, who works under the pseudonym &quot;Invader&quot;, has playfully styled himself the founder of a new school of art that uses the iconic 1980s puzzle as the medium: &quot;Rubikcubism.&quot;&lt;/p&gt;&lt;p&gt;The 2005 &quot;Rubik Mona Lisa&quot; was the first in a series of pieces inspired by the great paintings in history.&lt;/p&gt;&lt;p&gt;Slama has also produced pixellated reproductions of Edouard Manet\'s 1863 masterpiece &quot;Le Dejeuner sur l\'Herbe&quot; (The Luncheon on the Grass) as well as Gustave Courbet\'s &quot;L\'Origine du Monde&quot; (The Origin of the World).&lt;/p&gt;', 1, '2020-02-25 05:35:43'),
(35, 17, 'David Kariuki', 13, 'How Much Daily Exercise Is Actually Needed??', '1582609608_workout.jfif', '&lt;p&gt;Zero exercise is not enough. Going for a walk every day is probably a good thing. And if you\'re training for a marathon, you\'ll be on your feet for a couple hours of hard workouts every week. But what is the benchmark for a human being just trying to squeeze enough healthy exercise into their life? Let\'s break it down.&lt;/p&gt;&lt;p&gt;Fortunately, all the major public health bodies (including the World Health Organisation) are in agreement when it comes to the following guidelines for aerobic exercise:&lt;/p&gt;&lt;ol&gt;&lt;li&gt;150 minutes&amp;nbsp;per week of moderate intensity exercise like walking, ideally broken up into 30 minutes per day over five days&lt;/li&gt;&lt;li&gt;75 minutes per week of vigorous exercise like running, ideally in three 25-minute chunks&lt;/li&gt;&lt;li&gt;It only counts if you do 10 minutes or more in each session, and you should spread your sessions throughout the week (so, you can\'t take a single 90-minute spinning class and figure you\'re done.)&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;If you\'re a stroll-around-the-neighbourhood person, go with the first recommendation. If you enjoy hard workouts, but would rather not change into your gym clothes every day, you can just go with the 75 minute recommendation. And feel free to mix and match. Here are some possibilities:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Walk 15 minutes to and from work every week day (5 x 30 minutes = 150 moderate)&lt;/li&gt;&lt;li&gt;Go running on Monday/Wednesday/Friday, each for 2-3 miles (3 x 25 minutes = 75 vigorous)&lt;/li&gt;&lt;li&gt;Take a 90-minute heart-pounding cycling class, and go for a walk after dinner at least a few other days of the week (1 x 90 minutes = 90 vigorous, plus perhaps 3 x 15 = 45 moderate)&lt;/li&gt;&lt;li&gt;Go for a 30-minute easy bike ride on Monday. Try a 45-minute water aerobics class on Wednesday. Take a short hike on Saturday. Mow the lawn for an hour on Saturday. (30 + 45 + 30 + 60 = 165 moderate)&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;If you\'re confused about what counts in each category, the UK\'s National Health Service has a list of &quot;moderate&quot; and &quot;vigorous&quot; activities here.&lt;/p&gt;&lt;p&gt;If you\'re pretty athletic, the above won\'t sound like much. Good news! The World Health Organisation has set a secondary goal for people like you. It\'s simple: just do double the above. So you can aim for 150 minutes per week of vigorous activity:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Two of those killer 90-minute classes, Monday and Thursday&lt;/li&gt;&lt;li&gt;A 4-5km run every weekday&lt;/li&gt;&lt;li&gt;An hour-long martial arts class three times a week&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;or, to meet the requirement with moderate activity, you can stroll for an hour before breakfast each day, the favourite activity of spunky grandmas and grandpas who will probably never die. (To be fair, the recommendations we\'re talking about are for people up to age 65.)&lt;/p&gt;&lt;p&gt;So, what about an upper limit? There isn\'t one, from a public health point of view. More is better. (And even if you are doing less than the recommendations, &lt;i&gt;anything&lt;/i&gt; is better than &lt;i&gt;nothing&lt;/i&gt;.)&lt;/p&gt;&lt;p&gt;That said, it is possible for you as an individual to do more exercise than your body is ready for. Don\'t jump from a life of occasional strolling to a marathon training plan. And if you &lt;i&gt;are&lt;/i&gt; on that marathon training plan and you\'re feeling worn down, take a break already.&lt;/p&gt;&lt;h2&gt;Strength, Flexibility, and More&lt;/h2&gt;&lt;p&gt;So far we\'ve been talking about aerobic exercise, which is the kind where you\'re continuously moving (or, perhaps, doing quick work/rest intervals) and your heart rate is up. But there are other important forms of exercise, too. The WHO and other organisations recommend two days per week of &quot;high intensity muscle strengthening activity,&quot; which includes anything where you\'re thinking in terms of sets and reps. (Three sets of eight to 10 reps is a good structure to start.)&lt;/p&gt;&lt;p&gt;That activity can be anything that challenges your muscles, and where the 10th rep is a lot harder than the first: lifting weights, or resistance band exercises, or bodyweight exercises like push-ups. So if you run three days per week but have time for more, don\'t just fit in extra runs; try adding two days in the weight room instead.&lt;/p&gt;&lt;p&gt;In addition, the American College of Sports Medicine recommends two other kinds of exercise you might otherwise forget:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Two to three days per week that include stretching, ideally spending 60 seconds stretching each major muscle group. This can be in a few short stints of 10-30 seconds each.&lt;/li&gt;&lt;li&gt;Two to three days per week that include neuromuscular training. Think of this as hand-eye coordination and its full-body equivalents. Anything involving balance, coordination, or paying attention to your gait fall into these categories.&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;Both of these can fit into your other workouts. Stretching works well in a cool-down session after your main workout, or some people prefer to put it into a warm-up. If you\'re doing functional movements like lunges that challenge your balance and coordination, you\'re working on neuromuscular fitness.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 0, '2020-02-25 05:46:48'),
(36, 17, 'David Kariuki', 11, 'How to make scrambled eggs', '1582610527_eggs.jfif', '&lt;p&gt;Want to learn how to make scrambled eggs? This is a simple dish with a simple recipe that anyone can follow. The upside of scrambled eggs? They\'re healthy, hearty and filling which is great news if you\'re serious about watching what you eat.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;You will need ( ingredients ):&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Eggs &ndash; 2 to 3 medium eggs per person&amp;nbsp;&lt;/p&gt;&lt;p&gt;Milk (optional)&amp;nbsp;&lt;/p&gt;&lt;p&gt;Butter&amp;nbsp;&lt;/p&gt;&lt;p&gt;Salt and pepper&amp;nbsp;&lt;/p&gt;&lt;p&gt;Extra toppings&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Steps:&lt;/strong&gt;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Begin by cracking your eggs into a large bowl. I\'d recommend 2 to 3 eggs per person as an average.&lt;/li&gt;&lt;li&gt;Take a whisk and begin beating your eggs until they form a smooth, yellow consistency.&lt;/li&gt;&lt;li&gt;If you like your eggs super smooth and creamy, add a dash&amp;nbsp;of milk at this stage. If not, leave it out&lt;/li&gt;&lt;li&gt;Season your egg mixture using salt and plenty of pepper.&lt;/li&gt;&lt;li&gt;Place a frying pan on the hob, and begin melting a small knob of butter.&lt;/li&gt;&lt;li&gt;Once melted, add in your egg mixture and turn down the hob to a low heat.&lt;/li&gt;&lt;li&gt;Take a spatula and begin working your eggs, ensuring that nothing sticks to the bottom of the pan.&lt;/li&gt;&lt;li&gt;Once most of the liquid mixture has become soft, but solid, remove your eggs from the heat. You don\'t want to risk overcooking them, so stop before the mixture begins to look dry.&lt;/li&gt;&lt;li&gt;Serve your scrambled eggs.&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h2&gt;Can you cook scrambled eggs in the microwave?&lt;/h2&gt;&lt;p&gt;Yes, you can cook scrambled eggs in a microwave. I don\'t think they come out as well as if they\'re cooked in a pan, but if you don\'t have access to a hob, here\'s how to get the best results:&lt;/p&gt;&lt;ol&gt;&lt;li&gt;Break your chosen number of eggs into a microwave safe mixing bowl.&amp;nbsp;&lt;/li&gt;&lt;li&gt;Add a dash of milk (and I mean just a dash), season with salt and pepper and mix well together.&lt;/li&gt;&lt;li&gt;Microwave on high for half a minute.&lt;/li&gt;&lt;li&gt;Remove from the microwave, stir with a fork, put back in.&amp;nbsp;&lt;/li&gt;&lt;li&gt;Microwave for another half a minute, remove, scramble with the fork.&amp;nbsp;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&lt;strong&gt;N/B: Hob is a cooking appliance, or the flat top part of a cooker, with hotplates or burners.&lt;/strong&gt;&lt;/p&gt;', 1, '2020-02-25 06:02:07'),
(37, 25, 'Pampido', 9, 'Traceroute on Linux', '1583223674_Traceroute.jpg', '&lt;p&gt;If I haven&rsquo;t made it known already, I am a huge fan of Linux. I am no where near being as good as a friend of mine, Roy I am talking about you, but I am trying to learn each and every day. So today I was reading about Traceroute and decided to share it here.&lt;/p&gt;&lt;p&gt;I share it for any other Linux newbie like me and also I will use my blog for reference every so often. With no further ado I give you, Traceroute!&lt;/p&gt;&lt;p&gt;You can use the Linux traceroute command to spot the slow leg of a network packet&rsquo;s journey and troubleshoot sluggish network connections. We&rsquo;ll show you how!&lt;/p&gt;&lt;p&gt;How traceroute Works&lt;br&gt;When you appreciate how traceroute works, it makes understanding the results much easier. The more complicated the route a network packet has to take to reach its destination, the harder it is to pinpoint where any slowdowns might be occurring.&lt;/p&gt;&lt;p&gt;A small organization&rsquo;s local area network (LAN) might be relatively simple. It&rsquo;ll probably have at least one server and a router or two. The complexity increases on a wide area network (WAN) that communicates between different locations or via the internet. Your network packet then encounters (and is forwarded and routed by) a lot of hardware, like routers and gateways.&lt;/p&gt;&lt;p&gt;The headers of metadata on data packets describe its length, where it came from, where it&rsquo;s going, the protocol it&rsquo;s using, and so on. The specification of the protocol defines the header. If you can identify the protocol, you can determine the start and end of each field in the header and read the metadata.&lt;/p&gt;&lt;p&gt;Traceroute uses the TCP/IP suite of protocols, and sends User Datagram Protocol packets. The header contains the Time to Live (TTL) field, which contains an eight-bit integer value. Despite what the name suggests, it represents a count, not a duration.&lt;/p&gt;&lt;p&gt;A packet travels from its origin to its destination via a router. Each time the packet arrives at a router, it decrements the TTL counter. If the TTL value ever reaches one, the router that receives the packet decrements the value and notices it&rsquo;s now zero. The packet is then discarded and not forwarded to the next hop of its journey because it has &ldquo;timed out.&rdquo;&lt;/p&gt;&lt;p&gt;The router sends an Internet Message Control Protocol (ICMP) Time Exceeded message back to the origin of the packet to let it know the packet timed out. The Time Exceeded message contains the original header and the first 64 bits of the original packet&rsquo;s data. This is defined on page six of Request for Comments 792.&lt;/p&gt;&lt;p&gt;So, if traceroute sends a packet out, but then sets the TTL value to one, the packet will only get as far as the first router before it&rsquo;s discarded. It will receive an ICMP time exceeded message from the router, and it can record the time it took for the round trip.&lt;/p&gt;&lt;p&gt;It then repeats the exercise with TTL set to 2, which will fail after two hops. traceroute increases the TTL to three and tries again. This process repeats until the destination is reached or the maximum number of hops (30, by default) is tested.&lt;/p&gt;&lt;p&gt;Some Routers Don&rsquo;t Play Nicely&lt;br&gt;Some routers have bugs. They try to forward packets with a TTL of zero instead of discarding them and raising an ICMP time exceeded message.&lt;/p&gt;&lt;p&gt;According to Cisco, some Internet Service Providers (ISPs) rate-limit the number of ICMP messages their routers relay.&lt;/p&gt;&lt;p&gt;Some devices are configured never to send ICMP packets. This is often to ensure the device can&rsquo;t be unwittingly coerced into participating in a distributed denial of service, like a smurf attack.&lt;/p&gt;&lt;p&gt;traceroute has a default timeout for replies of five seconds. If it doesn&rsquo;t receive a response within those five seconds, the attempt is abandoned. This means responses from very slow routers are ignored.&lt;/p&gt;&lt;p&gt;Installing traceroute&lt;br&gt;traceroute was already installed on Fedora 31 but has to be installed on Manjaro 18.1 and Ubuntu 18.04. To install traceroute on Manjaro use the following command:&lt;/p&gt;&lt;p&gt;sudo pacman -Sy traceroute&lt;/p&gt;&lt;p&gt;To install traceroute on Ubuntu, use the following command:&lt;/p&gt;&lt;p&gt;sudo apt-get install traceroute&lt;/p&gt;&lt;p&gt;Using traceroute&lt;br&gt;As we covered above, traceroute&rsquo;s purpose is to elicit a response from the router at each hop from your computer to the destination. Some might be tight-lipped and give nothing away, while others will probably spill the beans with no qualms.&lt;/p&gt;&lt;p&gt;As an example, we&rsquo;ll run a traceroute to the Blarney Castle website in Ireland, home of the famous Blarney Stone. Legend has it if you kiss the Blarney Stone you&rsquo;ll be blessed with the &ldquo;gift of the gab.&rdquo; Let&rsquo;s hope the routers we encounter along the way are suitably garrulous.&lt;/p&gt;&lt;p&gt;We type the following command:&lt;/p&gt;&lt;p&gt;traceroute &lt;a href=&quot;http://www.blarneycastle.ie/&quot;&gt;www.blarneycastle.ie&lt;/a&gt;&lt;/p&gt;&lt;p&gt;The first line gives us the following info:&lt;/p&gt;&lt;p&gt;The destination and its IP address.&lt;br&gt;The number of hops traceroute will try before giving up.&lt;br&gt;The size of the UDP packets we&rsquo;re sending.&lt;br&gt;All of the other lines contain information about one of the hops. Before we dig into the details, though, we can see there are 11 hops between our computer and the Blarney Castle website. Hop 11 also tells us that we reached our destination.&lt;/p&gt;&lt;p&gt;The format of each hop line is as follows:&lt;/p&gt;&lt;p&gt;The name of the device or, if the device doesn&rsquo;t identify itself, the IP address.&lt;br&gt;The IP address.&lt;br&gt;The time it took round trip for each of the three tests. If an asterisk is here, it means there wasn&rsquo;t a response for that test. If the device doesn&rsquo;t respond at all, you&rsquo;ll see three asterisks, and no device name or IP address.&lt;br&gt;Let&rsquo;s review what we&rsquo;ve got below:&lt;/p&gt;&lt;p&gt;Hop 1: The first port of call (no pun intended) is the DrayTek Vigor Router on the local network. This is how our UDP packets leave the local network and get on the internet.&lt;br&gt;Hop 2: This device didn&rsquo;t respond. Perhaps it was configured never to send ICMP packets. Or, perhaps it did respond but was too slow, so traceroute timed out.&lt;br&gt;Hop 3: A device responded, but we didn&rsquo;t get its name, only the IP address. Note there&rsquo;s an asterisk in this line, which means we didn&rsquo;t get a response to all three requests. This could indicate packet loss.&lt;br&gt;Hops 4 and 5: More anonymous hops.&lt;br&gt;Hop 6: There&rsquo;s a lot of text here because a different remote device handled each of our three UDP requests. The (rather long) names and IP addresses for each device were printed. This can happen when you encounter a &ldquo;richly populated&rdquo; network on which there&rsquo;s a lot of hardware to handle high volumes of traffic. This hop is within one of the largest ISPs in the U.K. So, it would be a minor miracle if the same piece of remote hardware handled our three connection requests.&lt;br&gt;Hop 7: This is the hop our UDP packets made as they left the ISPs network.&lt;br&gt;Hop 8: Again, we get an IP address but not the device name. All three tests returned successfully.&lt;br&gt;Hops 9 and 10: Two more anonymous hops.&lt;br&gt;Hop 11: We&rsquo;ve arrived at the Blarney Castle website. The castle is in Cork, Ireland, but, according to IP address geolocation, the website is in London.&lt;br&gt;So, it was a mixed bag. Some devices played ball, some responded but didn&rsquo;t tell us their names, and others remained completely anonymous.&lt;/p&gt;&lt;p&gt;However, we did get to the destination, we know it&rsquo;s 11 hops away, and the round-trip time for the journey was &lt;a href=&quot;tel:13773&quot;&gt;13.773&lt;/a&gt; and &lt;a href=&quot;tel:14715&quot;&gt;14.715&lt;/a&gt; milliseconds.&lt;/p&gt;&lt;p&gt;Hiding Device Names&lt;br&gt;As we&rsquo;ve seen, sometimes including device names leads to a cluttered display. To make it easier to see the data, you can use the -n (no mapping) option.&lt;/p&gt;&lt;p&gt;To do this with our example, we type the following:&lt;/p&gt;&lt;p&gt;traceroute -n &lt;a href=&quot;http://blarneycastle.ie/&quot;&gt;blarneycastle.ie&lt;/a&gt;&lt;/p&gt;&lt;p&gt;This makes it easier to pick out large numbers for round-trip timings that could indicate a bottleneck.&lt;/p&gt;&lt;p&gt;Hop 3 is starting to look a little suspect. Last time, it only responded twice, and this time, it only responded once. In this scenario, it&rsquo;s out of our control, of course.&lt;/p&gt;&lt;p&gt;However, if you were investigating your corporate network, it would be worth it to dig a little deeper into that node.&lt;/p&gt;&lt;p&gt;Setting the traceroute Timeout Value&lt;br&gt;Perhaps if we extend the default timeout period (five seconds), we&rsquo;ll get more responses. To do this, we&rsquo;ll use the -w (wait time) option to change it to seven seconds. (Note this is a floating-point number.)&lt;/p&gt;&lt;p&gt;We type the following command:&lt;/p&gt;&lt;p&gt;traceroute -w 7.0 &lt;a href=&quot;http://blarneycastle.ie/&quot;&gt;blarneycastle.ie&lt;/a&gt;&lt;/p&gt;&lt;p&gt;That didn&rsquo;t make much of a difference, so the responses are probably timing out. It&rsquo;s likely the anonymous hops are being purposefully secretive.&lt;/p&gt;&lt;p&gt;Setting the Number of Tests&lt;br&gt;By default, traceroute sends three UDP packets to each hop. We can use the -q (number of queries) option to adjust this up or down.&lt;/p&gt;&lt;p&gt;To speed up the traceroute test, we type the following to reduce the number of UDP probe packets we send to one:&lt;/p&gt;&lt;p&gt;traceroute -q 1 &lt;a href=&quot;http://blarneycastle.ie/&quot;&gt;blarneycastle.ie&lt;/a&gt;&lt;/p&gt;&lt;p&gt;This sends a single probe to each hop.&lt;/p&gt;&lt;p&gt;Setting the Initial TTL Value&lt;br&gt;We can set the initial value of TTL to something other than one, and skip some hops. Usually, the TTL values are set to one for the first set of tests, two for the next set of tests, and so on. If we set it to five, the first test will attempt to get to hop five and skip hops one through four.&lt;/p&gt;&lt;p&gt;Because we know the Blarney Castle website is 11 hops from this computer, we type the following to go straight to Hop 11:&lt;/p&gt;&lt;p&gt;traceroute -f 11 &lt;a href=&quot;http://blarneycastle.ie/&quot;&gt;blarneycastle.ie&lt;/a&gt;&lt;/p&gt;&lt;p&gt;That gives us a nice, condensed report on the state of the connection to the destination.&lt;/p&gt;&lt;p&gt;Be Considerate&lt;br&gt;traceroute is a great tool to investigate network routing, check connection speeds, or identify bottlenecks. Windows also has a tracert command that functions similarly.&lt;/p&gt;&lt;p&gt;However, you don&rsquo;t want to bombard unknown devices with torrents of UDP packets, and be wary of including traceroute in scripts or unattended jobs.&lt;/p&gt;&lt;p&gt;The load traceroute can place on a network might adversely impact its performance. Unless you&rsquo;re in a fix-it-now kind of situation, you might want to use it outside of normal business hours.&lt;/p&gt;', 1, '2020-03-03 08:21:14'),
(38, 25, 'Pampido', 13, ' Walking', '1583225240_Walk.jpg', '&lt;p&gt;I love walking.&lt;/p&gt;&lt;p&gt;I have not always been a fan of walking. Walking started as a result of wanting to get somewhere but being too broke, and sometimes too mad, to take any form of transport, public or otherwise.&lt;/p&gt;&lt;p&gt;Walking was never for exercise for me. Contrary to what people see now, I used to be skinny, bordering on the malnourished. This was not for lack of food, far from it, I had a voracious appetite of a growing boy, 14 to be precise, barely a minute into my teenage years, struggling to process a broken voice and pubic hair and these constant thoughts of a girl&rsquo;s dark areola. One thing I knew for sure was I had the metabolism of a humming bird. I seemed to burn more calories than I ate. I digress.&lt;/p&gt;&lt;p&gt;During those walks I worked on my one biggest flaw, my anger. As I was growing up I felt like the unwanted child and everyone around me seemed to confirm what I was feeling, and as a result my anger, was short and instant to whoever vexed me at that time. Unfortunately, it was never commensurate to the perceived slight.&lt;/p&gt;&lt;p&gt;I cannot say for certain what made me get to the point of changing but I got to the point in my life where I didn&rsquo;t feel like holding on to my anger was doing me any good. Whether I knew this or I intuited it I may never tell.&lt;/p&gt;&lt;p&gt;Walking helped me clear my head and think more clearly and I took any and all opportunities to walk. Later on I started introducing music to my walks and much much later podcasts. And now that I have gained a few kilograms around the waist, my reasons for walking have increased and I will not stop any time soon.&lt;/p&gt;&lt;p&gt;Do you walk? What are your reasons for walking? What fun things do you do while you walk?&lt;/p&gt;', 1, '2020-03-03 08:34:08'),
(39, 25, 'Pampido', 4, 'Love', '1583488891_Love.jpg', '&lt;p&gt;It is a wonderful feeling to be in love. Knowing that someone cares for you, thinks about you and worries about you, is perhaps the most beautiful feeling in love. I have been in love, I am in love. When you meet someone, who laughs at your silly jokes, cries when you cry and walks with you through this journey of life, then you have found love.&lt;/p&gt;&lt;p&gt;Love is finding an overflowing oasis in a desert of pain and turmoil. You know you are in love when you do not want to fall asleep because reality is finally better than your dreams. Love is the journey of finding oneself through another person&rsquo;s eyes. Every time she smiles at me, it is an action of love, a gift to me, a beautiful gift. In the same breathe you have to realize that a kiss is a lovely trick designed by nature to stop speech when words become superfluous.&lt;/p&gt;&lt;p&gt;We are all a little weird. Life is a little weird.&amp;nbsp; And when we find someone whose weirdness is compatible with ours, we join up with them and fall into mutually satisfying weirdness &ndash; and call it love &ndash; true love&lt;/p&gt;&lt;p&gt;I have learnt that I do not have to be perfect to be loved, love makes me perfect. Love cheers me on, encouraging me every day to be better, to live for something bigger &amp;amp; better than myself&hellip;that &lsquo;someone&rsquo;. I have come to know that it is in being loved that I become as a child; needing warmth, care and attention. Craving for her attention, wanting to stare into her crystal eyes and tell her that I of all men am the most fortunate. I have found love, I have found life&hellip; I have found the one that He made for me&hellip;&lt;/p&gt;&lt;p&gt;I however have to walk carefully in the beginning of love; the running across fields into my lover&rsquo;s arms can only come later when I am sure they will not laugh if I trip.&lt;/p&gt;&lt;p&gt;Love knows no answer for it does not question. At the touch of love, everyone becomes a poet&lt;/p&gt;', 1, '2020-03-06 10:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `security_questions`
--

CREATE TABLE `security_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security_questions`
--

INSERT INTO `security_questions` (`id`, `question`, `created_at`) VALUES
(1, 'what is your mothers maiden name?', '2020-04-10 18:42:34'),
(2, 'what is the name of your favourite pet?', '2020-04-10 18:42:34'),
(3, 'What is the name of your favorite childhood friend?', '2020-04-10 18:44:18'),
(4, 'In what city does your nearest sibling live?', '2020-04-10 18:44:18'),
(5, 'In what city or town was your first job?', '2020-04-10 18:46:11'),
(6, 'What was your favorite sport in high school?', '2020-04-10 18:46:11'),
(7, 'What was your childhood nickname?', '2020-04-10 18:51:56'),
(8, 'What is the first name of the boy or girl that you first kissed?', '2020-04-10 18:51:56'),
(9, 'In what city did you meet your spouse/significant other?', '2020-04-10 18:58:10'),
(10, 'Who was your childhood hero? ', '2020-04-10 18:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `date_created`) VALUES
(4, 'Poetry', '<p>This holds all the pieces of writing in which the expression of feelings and ideas is given intensity by particular attention to diction</p>', '2020-01-26 09:51:29'),
(5, 'Quotes', '<p>Motivational word to keep you pushing on through thick and thin</p>', '2020-01-26 10:00:20'),
(6, 'Life Lessons', '<p>Posts to give you enough street smarts to handle yourself&nbsp;</p>', '2020-01-26 10:00:55'),
(8, 'Music', '<p>Blah..blaah....blaaaah.....blaaahhh</p>', '2020-01-27 20:20:47'),
(9, 'Technology', '&lt;p&gt;All about technological advances&lt;/p&gt;', '2020-01-28 18:39:59'),
(11, 'recipes', '&lt;p&gt;cooking guide to great meals&lt;/p&gt;', '2020-02-20 08:44:35'),
(12, 'Entertainment', '&lt;p&gt;an event, performance, or activity designed to entertain others.&lt;/p&gt;', '2020-02-23 06:29:19'),
(13, 'Exercise', '&lt;p&gt;Work out routines for the best results&lt;/p&gt;', '2020-02-25 05:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `su_admin` tinyint(4) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `assigned_image` tinyint(4) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `su_admin`, `admin`, `username`, `email`, `password`, `image`, `description`, `assigned_image`, `date_created`) VALUES
(17, 1, 1, 'David Kariuki', 'dkariuki8125@gmail.com', '$2y$10$ttEAKOTvnkhbrRTSnNa78uidkpob/bdjlGwpuLkppj3m.58by7YDK', '1586078238_1584070230_Dave.jfif', ' Web Developer, Writer & Artist ', 1, '2020-01-27 20:57:35'),
(24, 0, 1, 'Cynthia', 'anyangoc55@gmail.com', '$2y$10$d6OzDOSjkRg4eowAee3OAuLdfvfEBPoHrvo1ZNi1Zqb3NJmkeXKY2', 'r', NULL, 0, '2020-01-29 20:45:57'),
(25, 0, 1, 'Pampido', 'tsinjekho@gmail.com', '$2y$10$nHnZuCqI.UJqOoPYH9zDJOaykWKhXzCdQsm8J0BHQdsd8WvNvtWly', 'r', NULL, 0, '2020-02-03 08:08:37'),
(28, 0, 1, 'mactoo', 'mactookevin@gmail.com', '$2y$10$tN48F/zojNhDNlWJHR6aYO1pDHp3zKj7cCUKIrMQqb/GxVSPLxbSK', 'r', NULL, 0, '2020-02-12 22:59:46'),
(30, 0, 1, 'Gabby', 'muthonimawy@gmail.com', '$2y$10$pfuNbal5exrlv8CZKRXUN.ETFTlh9dX7pChRiESyUouonbqiPAzty', 'r', NULL, 0, '2020-02-18 05:55:47'),
(32, 0, 1, 'Awat', 'elishaawati@gmail.com', '$2y$10$bWn4zZTV2gp05avJasCvp.VSrsHEuYjH6.jX44oGHc1GoDWKxl19m', 'r', NULL, 0, '2020-02-19 09:35:58'),
(35, 0, 1, 'Cassy', 'casso2309@gmail.com', '$2y$10$3W2t2vcdjqykx0OabNYpS.5QFfF.YbtYsX8BY4etcZSqYUilbzhHG', 'r', NULL, 0, '2020-02-25 18:27:22'),
(41, 0, 0, 'Winnie', 'nmungai2018@gmail.com', '$2y$10$7LFaUD0blQ7G6iJOcC.HQO2jG.0x91Yw2GFKqsiIcrSou77bKB5eS', '1586084644_stuart-merida-mohohoho.jpg', 'Creative Soul.', 1, '2020-04-03 08:56:01'),
(42, 0, 0, 'Jeff Mungai', 'jeffmungai2019@gmail.com', '$2y$10$Wh8jzmz5Jej2FcjTvd6E5O.PePAOAyJVwvR4wHR2dwG3z03lq4hd2', '1586085731_IMG_20200224_080454.jpg', 'Speed Skater', 1, '2020-04-05 11:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `ip_address` text NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `post_id`, `ip_address`, `visit_date`) VALUES
(1, 39, '12:12:12:12', '2020-04-07 06:12:07'),
(2, 39, '::1', '2020-04-07 06:21:30'),
(3, 39, '54:54:54:54', '2020-04-07 06:25:43'),
(4, 38, '::1', '2020-04-07 06:30:16'),
(5, 38, '::1', '2020-04-07 06:30:20'),
(6, 38, '54:54:54:54', '2020-04-07 06:31:27'),
(7, 34, '::1', '2020-04-07 06:34:22'),
(8, 33, '::1', '2020-04-07 06:34:40'),
(9, 32, '::1', '2020-04-07 06:34:48'),
(10, 36, '::1', '2020-04-07 06:55:06'),
(11, 16, '::1', '2020-04-07 16:12:45'),
(12, 37, '::1', '2020-04-08 17:56:05'),
(17, 31, '::1', '2020-04-08 21:05:13'),
(26, 27, '::1', '2020-04-09 08:39:52'),
(27, 15, '::1', '2020-04-09 08:44:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `security_questions`
--
ALTER TABLE `security_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `security`
--
ALTER TABLE `security`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `security_questions`
--
ALTER TABLE `security_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `security`
--
ALTER TABLE `security`
  ADD CONSTRAINT `security_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `security_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `security_questions` (`id`);

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
