-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 03:59 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_discussion_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(255) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_pass` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `ad_picture` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_email`, `ad_pass`, `token`, `ad_picture`, `date_time`) VALUES
(1, 'Preeti Guin', 'preeti@idiscuss.com', '$2y$10$hXyv.wD9814NmEfeE7m.GuRRd7GyOKUb26qiet0IN0V.q8..CjXE.', '0c2b3eb0c181578cdf4ab66628ca0d', '../AdminProfilePic/a1.jpg', '2021-09-21 19:54:00'),
(2, 'Arun Kapoor', 'arun@idiscuss.com', '$2y$10$x8ne7nioQ4kU1r9fGFmKc.MYESFbF6OeI.xPOZrgS4UxiMwJUmd4K', 'cee2dd35411999d65bde57ff1dee99', '../AdminProfilePic/a3.jpg', '2021-09-21 19:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `ad_delete_requests`
--

CREATE TABLE `ad_delete_requests` (
  `addr_id` int(11) NOT NULL,
  `addr_ad_id` int(11) NOT NULL,
  `addr_ad_status` varchar(255) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_delete_requests`
--

INSERT INTO `ad_delete_requests` (`addr_id`, `addr_ad_id`, `addr_ad_status`, `date_time`) VALUES
(1, 4, 'Delete Request', '2021-09-25 17:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `art_id` int(11) NOT NULL,
  `art_title` varchar(255) NOT NULL,
  `art_content` text NOT NULL,
  `art_banner_pic` varchar(255) NOT NULL,
  `art_by` int(11) NOT NULL,
  `total_count` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`art_id`, `art_title`, `art_content`, `art_banner_pic`, `art_by`, `total_count`, `date_time`) VALUES
(1, 'Why Your Data Science Team Needs Separate Testing, Validation & Training Sets', '<p>Automated testing of machine learning models can help to dramatically reduce the amount of time and effort that your team has to dedicate to debugging them. Not applying these techniques properly, however, could potentially do a great deal of harm if the process is completely unmonitored and doesn&rsquo;t adhere to a list of best practices. Some tests can be applied to models after the training stage is over while others should be applied directly to test the assumptions that the model is operating under.</p><p>Traditionally, it&rsquo;s proven somewhat difficult to test machine learning models because they&rsquo;re very complex containers that often play host to a number of learned operations that can&rsquo;t be clearly decoupled from the underlying software.. Conventional software can be broken up into individual units that each accomplish a specific task. The same can&rsquo;t be said of ML models, which are often solely the product of training and therefore can&rsquo;t be decomposed into smaller parts.</p><p>Testing and&nbsp;evaluating the data sets&nbsp;that you use for training could be the first step in unraveling this problem.</p><p><strong>Monitoring Data Sets in a Training Environment</strong></p><p>ML testing is very different from testing application software because anyone performing checks on ML models will find that they&rsquo;re attempting to test something that is probabilistic as opposed to deterministic. An otherwise perfect model could occasionally make mistakes and still be considered the best possible model that someone could develop. Engineers working on a spreadsheet or database program wouldn&rsquo;t be able to tolerate even the slightest rounding errors, but it&rsquo;s at least somewhat acceptable to find the occasional flaw in the output of a program that processes data by way of learned responses. The&nbsp;level of variance&nbsp;will differ somewhat depending on the tasks that a particular model is being trained to accomplish, but it may always be there regardless.</p><p>As a result, it&rsquo;s important to at least examine the initial data that&rsquo;s being used to train ML models. If this data doesn&rsquo;t accurately represent the kind of information that a real-world environment would thrust onto a model, then said model couldn&rsquo;t ever hope to perform adequately when such input is finally given. Decent input specifications will help to ensure that the model comes away with a somewhat accurate representation of natural variability in whatever industry it&rsquo;s performing a study in.</p><p>Pure performance measurements can come from essentially any test set, but data scientists will normally want to specify the hyperparameters of their model to provide a clear metric by which to judge performance while taking said measurements. Those who consistently use one model over another solely for its performance on a particular test set may end up fitting test sets to models to find something that performs exactly as they want it to.</p><p>Those who are working with smaller data sets will need to find some way to evaluate them in spite of their diminutive size.</p><p><strong>Managing a Smaller Set of Data Safely</strong></p><p>Those working with particularly large data sets have typically gone with 60-20-20 or 80-10-10 splits. This has helped to strike a decent balance between the competing needs of&nbsp;reducing potential bias&nbsp;while also ensuring that the simulations run fast enough to be repeated several times over.</p><p>Those working with a smaller data set might find that it simply isn&rsquo;t representative enough, but for whatever reason it isn&rsquo;t possible to increase the amount of information put into the test set. Cross-validation might be the best option for those who find themselves in this sort of situation. This is normally used by those in the applied ML field to compare and select models since it&rsquo;s relatively easy to understand.</p><p>K-fold cross-validation algorithms are often used to estimate the skill of a particular ML model on new data irrespective of the size of the data in question. No matter what method you decide to try, though, your team needs to keep the concepts of testing and validation data separate when training your ML model. When you square these off in a&nbsp;training data vs. test data&nbsp;free-for-all, the results should come out something like this:</p><ul><li>Test sets are essentially examples that are only ever used to judge the performance of a classifier that&rsquo;s been completely specified.</li><li>Validation sets are deployed when data scientists are tuning the parameters of a classifier. You might start using a validation set to find the total number of hidden units that exist in a predefined neural network.</li><li>Training sets are used exclusively for learning. Many experts will define these as sets that are designed to fit the parameters of the initial classifier.</li></ul><p>Segmenting testing, validation and training sets might not seem natural to those who are used to relying on one long inclusive data set in order to ensure that their ML models work in any scenario. Nevertheless, it&rsquo;s vital to have them separated as much as possible.&nbsp;Test data management&nbsp;should always be part of your QA workflows. On top of this, it&rsquo;s important to keep an eye on how a model responds as it learns from the data even if it does appear that accuracy increases over time. This is because there are several high-quality insights an operator can derive from the learning process.</p><p><strong>Taking a Closer Look at Weights During the Training Process</strong></p><p>An ideal model will enjoy lower losses and a higher degree of accuracy over time, which is often more than enough to please the data scientists that develop them. However, you can learn more by taking a close look at what areas are receiving the heaviest weights during training. A buggy piece of code could produce outcomes where different potential choices aren&rsquo;t given different weights. Alternatively, it could be that they&rsquo;re not really stacked against one another at all. In these cases, the overall results might end up looking realistic when they&rsquo;re actually errant. Finding bugs in this way is especially important in a world where ML agents are being used to debug conventional software applications.</p><p>Taking a closer look at the weights themselves can help specialists to discover these problems before a model ever makes its way out into the wild. Debugging ML models as though they were application software will never work simply because so many aspects of their neural networks come from exclusively learned behaviors that aren&rsquo;t possible to decompose into something that could be<a href=\"https://data-science-blog.com/blog/2020/10/27/10360/\">&nbsp;mapped on a flowchart</a>. However, it should be possible to detect certain types of problems by paying close attention to these weights.</p><p>Developing any piece of software takes quite a bit of time, and the fact that ML models have to be trained means that they&rsquo;ll often take even longer. Give yourself enough lead time and you should find that your testing, validation and training sets split evenly into different neat packages that make the process much simpler.</p>', 'ArticleBannerPic/ar1.JPG', 3, 6, '2021-09-22 23:10:29'),
(2, 'Bitcoin Basics: A Beginner’s Guide to Cryptocurrency', '<p>The world is abuzz about bitcoin these days and that has many people wondering what bitcoin actually is, why it&rsquo;s so hot right now, and what it all means for the future of ecommerce. The following article will hopefully help demystify this ultra-hot cryptocurrency.</p><p><strong>What is bitcoin?</strong></p><p>Bitcoin is a form of digital currency and a worldwide payment system. Unlike traditional currency, such as minted coins or printed bills, bitcoin is created and held electronically. And unlike traditional currency that is controlled by a central bank, no single entity controls bitcoin and, by extension, no single authority can manipulate the value or destabilize the network. Bitcoin is exchanged electronically by users via cryptographic addresses. Third-party sites, called&nbsp;<strong>exchanges</strong>, help facilitate these transactions.</p><p><strong>Where does bitcoin come from?</strong></p><p>The process by which bitcoins are generated is called&nbsp;<strong>mining</strong>. Using powerful computer processors, individual miners or groups working together essentially solve a complex mathematical problem, which not only uncovers new bitcoin, but also serves to maintain the security and integrity of all bitcoin transactions that take place on the network.</p><p>Specifically, transaction details resulting from the transfer of bitcoin around the world are collected into a list called a&nbsp;<strong>block</strong>. It&rsquo;s up to miners to confirm those transactions and write them into a general ledger, which is essentially a long list of blocks, known as the&nbsp;<strong>blockchain</strong>. Anyone can access the blockchain to explore any transaction made between any bitcoin addresses, at any point on the network.</p><p>When a block of transactions is created, miners put it through a complicated process involving a&nbsp;<strong>hash</strong>&nbsp;algorithm and a&nbsp;<strong>nonce</strong>, which this&nbsp;<a href=\"https://www.coindesk.com/information/how-bitcoin-mining-works/\">blog&nbsp;</a>from Coindesk describes in greater detail for those who are so inclined. In return for all their hard work maintaining blockchain, miners earn bitcoins for successfully completing each complex cryptographic hash. The mining process makes use of various checks and balances to ensure that the system&rsquo;s data remains secure, as tampering with data effectively prevents the production of new bitcoins.</p><p>There is a finite number of bitcoins to be discovered &mdash; 21 million to be exact &mdash; and the process of mining inherently increases in difficulty over time as a way of limiting the number of bitcoins found each day. It is predicted that all 21 million bitcoins will be mined by 2140.</p><p><br /><strong>Who created bitcoin?</strong></p><p>It only makes sense that a&nbsp;<em>crypto</em>currency&rsquo;s origin story should be shrouded in mystery. The name&nbsp;<em>Satoshi Nakamoto</em>&nbsp;has been associated with its invention ever since the first digital paper on bitcoin emerged in 2008. But even now, almost 10 years later, we are no closer to knowing with certainty just who Satoshi Nakamoto is or whether bitcoin was actually the result of a team of people working together instead.</p><p>So far, Hal Finney, Dorian S. Nakamoto, Craig Wright, and Nick Szabo, among others, have been considered possible candidates. As an homage to bitcoin&rsquo;s purported creator, a&nbsp;<em>satoshi&nbsp;</em>is the smallest divisible amount within one bitcoin, representing 0.00000001 bitcoin or one hundred millionth of a bitcoin.</p><p><strong>What are the key features of bitcoin?</strong></p><p>Given that bitcoin was created in large part to serve as an alternative to&nbsp;fractional-reserve banking&nbsp;, it&rsquo;s not surprising that it differs in some pretty significant ways to traditional currency and payment systems. Here are a few of the key differences:</p><p>&nbsp; &nbsp; <strong>&nbsp; &nbsp;1.&nbsp;It&rsquo;s decentralized-&nbsp;</strong>Individual users are in control of their bitcoin. There is no central authority that can manipulate or seize control of the bitcoin network.</p><p>&nbsp; &nbsp; &nbsp;<strong> &nbsp;2.</strong>&nbsp;<strong>Personal information is not traceable to transactions-&nbsp;</strong>This is both a pro and a con in that it protects users from things like identity theft, but it also led to bitcoin becoming a popular payment method for illicit black markets, such as the Silk Road, an online marketplace for illegal weapons and drugs.</p><p><strong>&nbsp; &nbsp; &nbsp; &nbsp;3.</strong>&nbsp;<strong>Minimal transaction fees-&nbsp;</strong>Currently there are fairly low fees associated with bitcoin payments. Bitcoin exchanges may offer a variety of services whereby fees vary depending on the type of transaction, but generally speaking these fees tend to be lower than credit cards or PayPal.</p><p><strong>&nbsp; &nbsp; &nbsp; &nbsp;4.</strong>&nbsp;<strong>Reduced risk for merchants-&nbsp;</strong>Since bitcoin transactions cannot be reversed, do not carry with them any personal information, and are secure, merchants are better protected from any losses that might occur from fraudulent credit card use.</p><p><strong>&nbsp; &nbsp; &nbsp; &nbsp;5.</strong>&nbsp;<strong>It&rsquo;s a true global currency-&nbsp;</strong>Bitcoin&rsquo;s value is the same worldwide and it can be used in any country. No one country can overinflate the value or devalue it, for instance, by making more.</p><p><strong>Should you invest in bitcoin?</strong></p><p>Since its inception, Bitcoin has had its ups and downs, but nothing quite like what&rsquo;s happening right now. At the time this article was written, one bitcoin was worth $25,000 CAD. But before you jump onto the bitcoin bandwagon, consider a few of the pros and cons of investing in bitcoin:</p><p><strong>Pros</strong>&nbsp;:</p><ul><li><strong>Bitcoin is no longer just for computer geeks and libertarians.&nbsp;</strong>A growing number of mainstream investors and entrepreneurs now see bitcoin as a legitimate asset class, similar to stocks, bonds, or commodities.</li><li><strong>A finite supply of bitcoin could continue to drive value</strong>. It is thought that nearly 80% of all bitcoins have already been discovered and, as mentioned, no new ones will be available after 2140. In addition, some are predicting demand to increase particularly if central banks decide to start buying them as foreign currency reserves.</li></ul><p><strong>Cons</strong>&nbsp;:</p><ul><li><strong>Bitcoin&rsquo;s uptake as a mainstream payment system has been slow&nbsp;</strong>(except among criminal entities). To date, there is still little evidence that bitcoin will replace cash or credit cards anytime soon. Transactions are relatively slow (10 minutes in some cases) and fees are steadily increasing.</li><li><strong>The bitcoin bubble could burst</strong>. Over the last decade, bitcoin has been volatile with some fairly dramatic crashes, notably in 2013 and 2015. Also, experts contend that this latest exponential&nbsp;price increase is unsustainable&nbsp;and once prices drop, many buyers will exit the market.</li></ul><p>While it may be unclear precisely what the future has in store for bitcoin, it has, without question, been the driving force behind elevating cryptocurrency to the collective conscience. Whether you prefer to watch the bitcoin action from the sidelines or jump right into the fray, it will be fascinating to see how this journey unfolds.</p>', 'ArticleBannerPic/ar2.jpg', 2, 8, '2021-09-22 23:19:25'),
(3, '5 Key Cybersecurity Trends to Know For 2021', '<p>The fundamentals of cybersecurity in 2021: Scalability, user awareness, and the ability to evolve to meet changing network and security needs.</p><p>COVID-19 pushed many businesses to adopt remote and flexible working. As a consequence, businesses now have to find new, more effective ways of coping with the rapidly changing post-pandemic digital space. There now are millions of connected offices, and most of these offices are not as protected digitally as traditional offices. The secure firewalls, access management systems, and secure routers, etc., in your office, may not be sufficient to cover all your remote workers. That leaves your devices and networks vulnerable to data thieves. To address this new challenge, you need to familiarize yourself with these five key cybersecurity trends for 2021:</p><p><strong>1) Expanding cyber-attack surface is necessitating data security automation</strong></p><p>It goes without saying that your cyber-attack surface has increased tremendously over the last decade. Most of your business transactions were happening over the internet even before the pandemic and have increased rapidly over the course of the pandemic. The Fourth Industrial Revolution is also here with us, and it is mainly characterized by the increased meshing of us humans and machines. Clearly, hackers have a much larger playing field now when it comes to breaching cyber-defense.</p><p>How will businesses protect this huge and consistently expanding attack surface in 2021?&nbsp; For starters, businesses will need to utilize automation as a cybersecurity tool. They will need to automate scanning technologies in data access management and invest in incident alert tools. Most importantly, they will need to develop and leverage self-repairing software to counter any damages done by attackers. Secondly, businesses will need to leverage machine learning and artificial intelligence technologies in acting on possible cyber threats.&nbsp;Take a look at this article on business intelligence&nbsp;to learn more about it.</p><p><strong>2)&nbsp;</strong><strong>Increased adoption of multi-factor authentication</strong></p><p>With increased remote and flexible working, the use of passwords as the sole protection against cyberattacks won&rsquo;t cut it. Businesses have to invest in multiple data protection layers. That is where multi-factor authentication (MFA) comes in. With MFA, employees have to authenticate their identities through multiple devices before they are given access to sensitive company data. Say, for example, a remote employee wants to log into their staff portal or the company&rsquo;s file share service from a personal computer. The company&rsquo;s MFA can be programmed to send an SMS containing to the employee&rsquo;s cell phone upon entering on the computer their username and password. The SMS contains a one-time pin (OTP) that a user has to produce; otherwise, they are locked out of the system. The cell phone number, in this case, has to be on record and cannot be changed without approval from the IT department. Other companies require employees to install an authentication app on their smartphones, while others are now using voice multi-factor authentication.</p><p>MFAs are, to a great extent, more reliable than passwords. However, because SMSs and voice MFAs aren&#39;t end-to-end encrypted, they could still be vulnerable to attacks. Going forward, companies will need to switch to app authenticators such as Google Authenticator, Microsoft Authenticator, and OneSpan Authenticator.</p><p><strong>3)&nbsp;</strong><strong>Cybersecurity tech stack trends 2021</strong></p><p>Even as you protect your business data from external threats, you have to adopt effective tools and platforms that are tailor-made for your website and related workflows. This is relevant for any field, even if you have a&nbsp;freelance medical writer website. You must have software tools (the tech stack) in place to guarantee that your security posture is strong and intact. A solid Tech Stack has to include basic protection tools such as antiviruses and firewalls as well as advanced tools such as&nbsp;DNS&nbsp;Filters. Your cybersecurity tech stack has to provide the architecture framework needed to actualize your data security plan. It should protect your OS, web servers, databases, digital assets, and custom web apps, among other digital assets, consequently helping you run your applications and websites more effectively. That is why, going forward, you cannot afford to have gaps in your cybersecurity tech stack.</p><p><strong>4)&nbsp;</strong><strong>Mobile software security</strong></p><p>Increased remote working has necessitated mobile software security for businesses. Employees are now using their phones, tablets, and PCs, etc., to access sensitive data. Some are even doing it via public, mostly unsecured public Wi-Fi. These devices are, in most cases, connected to other remote objects through IoT technology. Data thieves can spy on encrypted messaging applications or successfully perform a Distributed Denial of Service (DDoS) attack on an insecure mobile device. It is your responsibility as an employer to add extra layers of mobile software security for your employees&rsquo; personal devices.</p><p><strong>5)&nbsp;</strong><strong>Cybersecurity awareness training</strong></p><p>Many internet users are unaware of common cyberattack methods. Many people easily fall prey to basic cybersecurity attacks such as phishing emails. That ignorance is what fuels the upsurge in cybersecurity cases. Organizations must now use&nbsp;explainer videos&nbsp;to train their employees and users on how to identify and thwart all forms of phishing and malware infections.</p><p><strong>Conclusion</strong></p><p>The fundamentals of cybersecurity in 2021: Scalability, user awareness, and versatility. Your cybersecurity strategy must evolve as fast as, if not faster than, the changing network and security needs. That&rsquo;s how you will keep your network and data safe from data thieves. How well your strategy will evolve starts with keeping up with cybersecurity trends such as those listed above.</p>', 'ArticleBannerPic/ar3.jpg', 4, 7, '2021-09-22 23:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation. Its language constructs as well as it is object-oriented.', '2021-08-10 19:33:59'),
(2, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2021-08-10 19:34:24'),
(3, 'PHP', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group. ', '2021-08-10 19:35:06'),
(4, 'MySQL', 'MySQL is an open-source relational database management system. Its name is a combination of \"My\", the name of co-founder Michael daughter, and \"SQL\", the abbreviation for Structured Query Language.', '2021-08-10 19:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, '<p>if not a:</p><p>&nbsp; &nbsp; &nbsp; print(&quot;List is empty&quot;)</p>', 1, 4, '2021-09-23 00:20:56'),
(2, '<p><strong>I prefer it explicitly:</strong></p><p>if len(li) == 0:</p><p>&nbsp; &nbsp; &nbsp; &nbsp; print(&#39;the list is empty&#39;)</p>', 1, 5, '2021-09-23 00:21:31'),
(3, '<p>The pythonic way to do it is from the&nbsp;<a href=\"https://www.python.org/dev/peps/pep-0008\">PEP 8 style guide</a>&nbsp;(where&nbsp;<strong>Yes</strong>&nbsp;means &ldquo;recommended&rdquo; and&nbsp;<strong>No</strong>&nbsp;means &ldquo;not recommended&rdquo;):</p><p>For sequences, (strings, lists, tuples), use the fact that empty sequences are false.</p><p>Yes: if not seq:</p><p>&nbsp; &nbsp; &nbsp; &nbsp; if seq:</p><p>No: if len(seq):</p><p>&nbsp; &nbsp; &nbsp; &nbsp;if not len(seq):</p>', 1, 2, '2021-09-23 00:22:52'),
(4, '<p>When you split a string you get an array of strings, ranint won&#39;t take string as an argument so <strong>you have to convert it to integer.</strong></p><p>import random</p><p>a = &quot;7 2&quot;</p><p>b = a.split(&quot; &quot;)</p><p>random.randint(0, int(b[0]))</p>', 3, 8, '2021-09-23 00:34:49'),
(5, '<p>Rewrite the code as follows with&nbsp;<strong>Tkinter&nbsp;as&nbsp;tkinter</strong>&nbsp;(lowercase) for 3.x:</p><p>from tkinter import *</p><p>root = Tk()</p><p>w = Label(root, text=&quot;Hello, world!&quot;)</p><p>w.pack()</p><p>root.mainloop()</p>', 4, 6, '2021-09-23 00:52:52'),
(6, '<p>The root of the problem is that the Tkinter module is named&nbsp;<strong>Tkinter&nbsp;(capital &quot;T&quot;) in python 2.x, and&nbsp;tkinter&nbsp;(lowercase &quot;t&quot;) in python 3.x.</strong></p><p><strong>To make your code work in both Python 2 and 3 you can do something like this:</strong></p><p>try:</p><p>&nbsp; &nbsp; &nbsp;# for Python2</p><p>&nbsp; &nbsp; &nbsp;from Tkinter import *</p><p>except ImportError:</p><p>&nbsp; &nbsp; &nbsp;# for Python3</p><p>&nbsp; &nbsp; &nbsp;from tkinter import *</p>', 4, 5, '2021-09-23 00:55:08'),
(7, '<p>Use <strong>getState()</strong></p><p>boolean checked = c1.getState();</p><p>if(c1.getState()) {</p><p>&nbsp; &nbsp; &nbsp; &nbsp;//c1 is checked</p><p>&nbsp;}</p><p>else if (c2.getState()) {</p><p>&nbsp; &nbsp; &nbsp; &nbsp;//c2 is checked</p><p>}</p>', 5, 8, '2021-09-23 01:02:17'),
(8, '<p>I found the <strong>isChecked()</strong> method to be the winner.</p><p>// Check to see if box is checked</p><p>if (c1.isChecked()) {</p><p>&nbsp; &nbsp; &nbsp;// Your code if the box is checked</p><p>}</p><p>else {</p><p>&nbsp; &nbsp; &nbsp;// Your code if the box is not checked</p><p>}</p>', 5, 6, '2021-09-23 01:03:50'),
(9, '<p>Judging by your use of&nbsp;isSelected&nbsp;i concluded you have <strong>1 of 2 mistakes:</strong></p><p>you want to use <strong>check box</strong>, if that is the case, then you should use<strong>&nbsp;c1.getState()</strong>&nbsp;and not&nbsp;isSelected()</p><p>you need&nbsp;<strong>RadioBox</strong>&nbsp;instead of&nbsp;CheckBox&nbsp;and then you can use the<strong>&nbsp;isSelected()</strong>&nbsp;method.</p>', 5, 1, '2021-09-23 01:05:51'),
(10, '<p>You can do it by using subqueries, one subquery for each tableCount :</p><p>SELECT</p><p>&nbsp; &nbsp; &nbsp; (SELECT COUNT(*) FROM table1 WHERE someCondition) as table1Count,</p><p>&nbsp; &nbsp; &nbsp; (SELECT COUNT(*) FROM table2 WHERE someCondition) as table2Count,</p><p>&nbsp; &nbsp; &nbsp; (SELECT COUNT(*) FROM table3 WHERE someCondition) as table3Count</p>', 6, 4, '2021-09-23 01:11:43'),
(11, '<p>Here is simple approach to get purely the row counts from multiple tables, if there are&nbsp;<strong>no conditions on specific tables</strong>.</p><p><strong>Note:</strong> For InnoDB this count is an&nbsp;<strong>approximation</strong>. However, for MyISAM the count is accurate.</p><p>Using the&nbsp;<strong>information_schema.tables</strong>&nbsp;table you can use:</p><p>SELECT</p><p>&nbsp; &nbsp; &nbsp; table_name,</p><p>&nbsp; &nbsp; &nbsp; table_rows</p><p>FROM</p><p>&nbsp; &nbsp; &nbsp; &nbsp;information_schema.tables</p><p>WHERE</p><p>&nbsp; &nbsp; &nbsp; &nbsp;table_name like &#39;my_table%&#39;;</p><p><strong>Output:</strong></p><p>table_name&nbsp; &nbsp; &nbsp;table_rows</p><p>my_table_1&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 0</p><p>my_table_2&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 15</p><p>my_table_3&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 30</p>', 6, 5, '2021-09-23 01:13:50'),
(12, '<p>Consider&nbsp;<strong><a href=\"http://docs.python.org/library/stdtypes.html#dict.pop\">dict.pop</a>:</strong></p><p>for key in exclusion:</p><p>&nbsp; &nbsp; &nbsp; a.pop(key, None)</p>', 7, 1, '2021-09-23 01:24:09'),
(13, '<p>a = dict((key,value) for (key,value) in a.iteritems() if key not in exclusion)</p>', 7, 2, '2021-09-23 01:24:35'),
(14, '<p>You can actually do it all with GET methods. However, you&#39;ll want to use a full challenge response protocol for the logins. (You can hash on the client side using javascript. You just need to send out a unique challenge each time.) You&#39;ll also want to use SSL to ensure that no one can see the strings as they go across.</p><p>In some senses there&#39;s no real security difference between GET and POST requests as they both go across in plaintext, in other senses and in practice... GET is are a hell of a lot easier to intercept and is all over most people&#39;s logs and your web browser&#39;s history. :)</p><p>(Or as suggested by the other posters, use a different method entirely like HTTP auth, digest auth or some higher level authentication scheme like AD, LDAP, kerberos or shib. However I kinda assumed that if you didn&#39;t have POST you wouldn&#39;t have these either.)</p>', 8, 4, '2021-09-23 01:29:31'),
(15, '<p>You could use HTTP Authentication, if supported.</p><p>You&#39;d have to add SSL, as all methods, POST, GET and HTTP Auth (well, except Digest HHTP authentication) send plaintext.</p><p>GET is basically just like POST, it just has a limit on the amount of data you can send which is usually a lot smaller than POST and a semantic difference which makes GET not a good candidate from that point of view, even if technically they both can do it.</p><p>As for examples, what are you using? There are many choices in Python, like the cgi module or some framework like Django, CherryPy, and so on</p>', 8, 3, '2021-09-23 01:29:40'),
(16, '<p>A&nbsp;<a href=\"https://docs.python.org/3/library/functions.html#slice\">slice</a>&nbsp;isn&#39;t an iterable. It doesn&#39;t contain elements, but instead specifies which elements in some other iterable are to be returned if the slice is applied to that iterable.</p><p>Since it&#39;s not an iterable, you can&#39;t iterate over it. As you have discovered, however, you can obtain the indices for which it will return elements from an iterable to which it is applied, using&nbsp;<a href=\"https://docs.python.org/3/library/functions.html#func-range\">range()</a>&nbsp;- and you&nbsp;<strong>can</strong>&nbsp;iterate over that:</p><p>s = slice(1, 10, 2)</p><p>indices = range(s.start, s.stop, s.step)</p><p>it = iter(indices)</p><p>&nbsp;</p><p>&gt;&gt;&gt; list(it)</p><p>[1, 3, 5, 7, 9]</p>', 9, 3, '2021-09-23 02:07:46'),
(17, '<p>you can use <strong>date_format</strong></p><p>Query:&nbsp;</p><p>select DATE_FORMAT(date,&#39;%y-%m-%d&#39;) from tablename</p>', 2, 6, '2021-09-24 21:04:49'),
(18, '<p><strong>For today:</strong></p><p>SELECT * FROM `tbl_name` where DATE(column_name) = CURDATE()</p><p><br /><strong>For selected date:</strong></p><p>SELECT * FROM `tbl_name` where DATE(column_name) = DATE(&#39;2016-01-14&#39;)</p>', 2, 3, '2021-09-24 21:05:56'),
(19, '<p>Quite simple actually:</p><p><strong>SELECT * FROM `table` WHERE `column` LIKE &#39;%{$needle}%&#39;</strong></p>', 10, 9, '2021-09-25 06:37:54'),
(20, '<p><strong>Faster way of doing this:</strong></p><p>WHERE interests LIKE &#39;%sports%&#39; OR interests LIKE &#39;%pub%&#39;</p><p><strong>is this:</strong></p><p>WHERE interests REGEXP &#39;sports|pub&#39;</p>', 11, 1, '2021-09-25 16:11:11'),
(21, '<p>Use this code :</p><p><strong>JOptionPane.showMessageDialog(null, &quot;Title&quot;);</strong></p>', 12, 10, '2021-09-25 17:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contactus_id` int(11) NOT NULL,
  `contactus_name` varchar(255) NOT NULL,
  `contactus_email` varchar(255) NOT NULL,
  `contactus_message` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contactus_id`, `contactus_name`, `contactus_email`, `contactus_message`, `date_time`) VALUES
(1, 'Sana Patil', 'sana@gmail.com', 'This is a dummy contact us meassage.\r\n', '2021-09-25 02:05:02'),
(2, 'Riya Khan', 'riya@gmail.com', 'I would like to join idiscuss, let me know if there is any vacancies left and also the requirements to join.', '2021-09-25 17:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `testemonial`
--

CREATE TABLE `testemonial` (
  `testemonial_id` int(11) NOT NULL,
  `testemonial_user_sno` int(11) NOT NULL,
  `testemonial_content` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testemonial`
--

INSERT INTO `testemonial` (`testemonial_id`, `testemonial_user_sno`, `testemonial_content`, `status`, `date_time`) VALUES
(1, 1, 'I STRONGLY recommend to use IDiscuss paltform as users here are active and UI also is greate.', 'Current', '2021-09-24 21:42:06'),
(2, 9, 'I am impressed by the quality of idiscuss and looking forward to actively response on forums', 'Current', '2021-09-24 21:42:15'),
(3, 2, 'Idiscuss is a great platform for programmers to learn more and more by sloving problems.', 'Current', '2021-09-24 21:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_code` text NOT NULL,
  `thread_cat_id` int(11) NOT NULL,
  `thread_user_id` int(11) NOT NULL,
  `total_count` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_code`, `thread_cat_id`, `thread_user_id`, `total_count`, `timestamp`) VALUES
(1, 'How do I check if a list is empty?', 'How do I check to see if a is empty? For example, if passed the following: ', ' &lt;p&gt;a = []&lt;/p&gt;', 1, 1, 36, '2021-09-22 23:49:55'),
(2, 'How to select only date from a DATETIME field in MySQL?', 'I have a table in the MySQL database that is set up with DATETIME. I need to SELECT in this table only by DATE and excluding the time.', ' &lt;p&gt;Database input:&amp;nbsp;2012-01-23 09:24:41&lt;/p&gt;&lt;p&gt;I need to SELECT&amp;nbsp;only the date as output:&amp;nbsp;2012-01-23&lt;/p&gt;', 4, 2, 16, '2021-09-23 00:11:14'),
(3, 'import random - randint in python not working', 'I am attempting one of the practice questions and already failing because apparently random.randit needs a string.', ' &lt;p&gt;&lt;strong&gt;I&amp;#39;ve tried this...&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;import random&lt;/p&gt;&lt;p&gt;a = &amp;quot;7 2&amp;quot;&lt;/p&gt;&lt;p&gt;b = a.split(&amp;quot; &amp;quot;)&lt;/p&gt;&lt;p&gt;random.randint(0, b[0])&lt;/p&gt;&lt;p&gt;&lt;strong&gt;I expected it the output of, well, any number chosen RANDOMLY between 0 and 7, inclusive. But it gives this error message:&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Traceback (most recent call last):&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; return self.randrange(a, b+1)&lt;/p&gt;&lt;p&gt;TypeError: must be str, not int&lt;/p&gt;', 1, 3, 23, '2021-09-23 00:30:30'),
(4, 'ImportError when importing Tkinter in Python', 'I am trying to test GUI code using Python 3.2 with standard library Tkinter but I can not import the library.\r\nThis is my test code:', ' &lt;p&gt;from Tkinter import *&lt;/p&gt;&lt;p&gt;root = Tk()&lt;/p&gt;&lt;p&gt;w = Label(root, text=&amp;quot;Hello, world!&amp;quot;)&lt;/p&gt;&lt;p&gt;w.pack()&lt;/p&gt;&lt;p&gt;root.mainloop()&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;The shell reports this error:&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Traceback (most recent call last):&lt;/p&gt;&lt;p&gt;File &amp;quot;&amp;lt;pyshell#9&amp;gt;&amp;quot;, line 1, in &amp;lt;module&amp;gt;&lt;/p&gt;&lt;p&gt;from Tkinter import *&lt;/p&gt;&lt;p&gt;ImportError: No module named Tkinter&lt;/p&gt;', 1, 4, 19, '2021-09-23 00:30:43'),
(5, 'Java check if Checkbox is checked', '', ' &lt;p&gt;I use:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;CheckboxGroup cg = new CheckboxGroup();&lt;/p&gt;&lt;p&gt;Checkbox c1 = new Checkbox(&amp;quot;A&amp;quot;, false, cg);&lt;/p&gt;&lt;p&gt;Checkbox c2 = new Checkbox(&amp;quot;B&amp;quot;, false, cg);&lt;/p&gt;&lt;p&gt;Checkbox c3 = new Checkbox(&amp;quot;C&amp;quot;, true, cg);&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;To create a group of three checkboxes. Now, I want to check which one of them is checked. I use:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;if (c1.isSelected()) { }&lt;/p&gt;', 2, 5, 17, '2021-09-23 00:59:20'),
(6, 'COUNT(*) from multiple tables in MySQL', 'How do I go about selecting COUNT(*)s from multiple tables in MySQL?', ' &lt;p&gt;Such as:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;SELECT COUNT(*) AS table1Count FROM table1 WHERE someCondition JOIN??&lt;/p&gt;&lt;p&gt;SELECT COUNT(*) AS table2Count FROM table2 WHERE someCondition CROSS JOIN? subqueries?&lt;/p&gt;&lt;p&gt;SELECT COUNT(*) AS table3Count FROM table3 WHERE someCondition&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;The goal is to return this:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;+-----------------+-----------------+-----------------+&lt;/p&gt;&lt;p&gt;| table1Count | table2Count | table3Count |&lt;/p&gt;&lt;p&gt;+-----------------+-----------------+-----------------+&lt;/p&gt;&lt;p&gt;|&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;14&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;|&amp;nbsp; &amp;nbsp; &amp;nbsp; 27&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;|&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; 0&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; |&lt;/p&gt;&lt;p&gt;+-----------------+-----------------+-----------------+&lt;/p&gt;', 4, 1, 16, '2021-09-23 01:10:32'),
(7, 'Removing a subset of a dict from within a list', 'This is really only easy to explain with an example, so to remove the intersection of a list from within a dict I usually do something like this:', '&lt;p&gt;a = {1:&amp;#39;&amp;#39;, 2:&amp;#39;&amp;#39;, 3:&amp;#39;&amp;#39;, 4:&amp;#39;&amp;#39;}&lt;/p&gt;&lt;p&gt;exclusion = [3, 4, 5]&lt;/p&gt;&lt;p&gt;# have to build up a new list or the iteration breaks&lt;/p&gt;&lt;p&gt;toRemove = []&lt;/p&gt;&lt;p&gt;for var in a.iterkeys():&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; if var in exclusion:&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; toRemove.append(var)&lt;/p&gt;&lt;p&gt;for var in toRemove:&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; del a[var]&lt;/p&gt;', 1, 6, 18, '2021-09-23 01:23:42'),
(8, 'Can I implement a web user authentication system in python without POST?', '', ' &lt;p&gt;My university doesn&amp;#39;t support the POST cgi method (I know, it&amp;#39;s crazy), and I was hoping to be able to have a system where a user can have a username and password and log in securely. Is this even possible?&lt;/p&gt;&lt;p&gt;If it&amp;#39;s not, how would you do it with POST? Just out of curiosity.&lt;/p&gt;', 1, 8, 20, '2021-09-23 01:28:39'),
(9, 'How to iterate over a slice?', '', '&lt;p&gt;A&amp;nbsp;slice&amp;nbsp;in python is not iterable. This code:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;s = slice(1, 10, 2)&lt;/p&gt;&lt;p&gt;iter(s)&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;results in this error:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;TypeError: &amp;#39;slice&amp;#39; object is not iterable&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;This is the code I&amp;#39;ve come up with to show the slice by creating a list iterable:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;list(range(s.start, s.stop, s.step))&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;This uses the&amp;nbsp;start,&amp;nbsp;stop&amp;nbsp;and&amp;nbsp;step&amp;nbsp;attributes of the slice object. I plug those into a range (an immutable sequence type) and create a list:&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;[1, 3, 5, 7, 9]&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Is there something missing? Can I iterate over a slice any better?&lt;/p&gt;', 1, 2, 15, '2021-09-23 02:04:21'),
(10, 'MySQL query String contains', 'I have been trying to figure out how I can make a query with MySQL that checks if the value (string $haystack ) in a certain column contains certain data (string $needle), like this:', '&lt;p&gt;SELECT *&lt;/p&gt;&lt;p&gt;FROM `table`&lt;/p&gt;&lt;p&gt;WHERE `column`.contains(&amp;#39;{$needle}&amp;#39;)&lt;/p&gt;', 4, 8, 9, '2021-09-25 05:22:06'),
(11, 'MySQL Like multiple values', '', ' &lt;p&gt;I have this MySQL query.&lt;/p&gt;&lt;p&gt;I have database fields with this contents&lt;/p&gt;&lt;p&gt;sports,shopping,pool,pc,games shopping,pool,pc,games sports,pub,swimming, pool, pc, games&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Why does this like query does not work? I need the fields with either sports or pub or both?&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;SELECT * FROM table WHERE interests LIKE (&amp;#39;%sports%&amp;#39;, &amp;#39;%pub%&amp;#39;)&lt;/p&gt;', 4, 9, 6, '2021-09-25 06:30:00'),
(12, 'How can I display a message dialog box in java', '', ' &lt;p&gt;public class demo{&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; public static void main(String[] x){&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; // i want to display the below message in a dialog box&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;System.out.print(&amp;quot;java is fun&amp;quot;);&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; }&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp;}&lt;/p&gt;', 2, 9, 13, '2021-09-25 06:32:06'),
(13, 'How to fix \"Headers already sent\" error in PHP', 'The lines mentioned in the error messages contain header() and setcookie() calls. What could be the reason for this? And how to fix it? When running my script, I am getting several errors like this:', '&lt;p&gt;Warning: Cannot modify header information - headers already sent by (output started at /some/file.php:12) in /some/file.php on line 23&lt;/p&gt;', 3, 10, 1, '2021-09-25 17:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `profilepic` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_name`, `user_email`, `user_pass`, `token`, `status`, `phone`, `designation`, `about`, `profilepic`, `timestamp`) VALUES
(1, 'Kirti Saroj', 'kirti@gmail.com', '$2y$10$rdvZinTPYjYC.DcGaO9lquk6WnECGuebldRfploy71/r/Dl.A0J3a', '835c9770b4e13db6a8b2d17a920338', 'Active', '4567538907', 'Python Data Scientist', '', 'UserProfilePic/g1.jpg', '2021-09-25 02:34:24'),
(2, 'Afzal Khan', 'afzal@gmail.com', '$2y$10$poqpEDiLeh4gtHUKEPVn6.Zvx/4AvoR0eAU2i5EyJRsUfofF0X8w2', '5f3a03ccf81dc560b78bbef62f90cd', 'Active', '9076546867', 'Computer Programmer', '', 'UserProfilePic/b3.jpg', '2021-09-25 02:36:00'),
(3, 'Bhoomi Nighut', 'bhoomi@gmail.com', '$2y$10$erbU6NAr57v4FQospO6mOentvbEj/sk7WLml.Fi2E03ctZ3QoUue2', 'e836b8a8cfe20869db5b1d6caee70e', 'Active', '8908679088', 'Software Engineer', '', 'UserProfilePic/g3.jpg', '2021-09-25 02:36:43'),
(4, 'Jobin Joseph', 'jobin@gmail.com', '$2y$10$oysx3Ncej/AX0QPzqY04QeIjw2Jk1sU3rtty866Z0oDtIKXGnv2KG', '442965c3ccc9fb89dbdfc71a8a7f5b', 'Active', '9086532346', 'Database Administrator', '', 'UserProfilePic/b4.jpg', '2021-09-25 02:38:13'),
(5, 'Shraddha Tripathi', 'shraddha@gmail.com', '$2y$10$JYrfuRbaFRnaIU6MlUsKse56f3eF6REFcFdLWk7PaMxZEkiqtriHm', '473ef4a564d1b2ee5602fc8028b9b1', 'Active', '9086533467', 'Final Year Student', '', 'UserProfilePic/g2.jpg', '2021-09-25 02:42:43'),
(6, 'Shubham Kamble', 'shubham@gmail.com', '$2y$10$bmo6EsWj9e.9YTzdO2ESrOSxt2J/uswQTrwFl/YevH9Zrdb5u6wwK', '264494abda53eafdb7605a1519d9a1', 'Active', '9086789076', 'Java Programmer ', '', 'UserProfilePic/b5.jpg', '2021-09-25 02:46:15'),
(7, 'Shruti Guin', 'shruti@gmail.com', '$2y$10$7YiNLxF3TLo5pep81aA3ouXRcR7HwA36R55kU9tJiUjJHm7HNeFf6', 'c613de7d993175a78bfe7bed5ae10f', 'Inactive', '', '', '', 'UserProfilePic/userdefault.png', '2021-09-25 02:48:18'),
(8, 'Hrishikesh Jadhav', 'hrishi@gmail.com', '$2y$10$AhpfyCDZVhmHwG0Aqy9CiuphjcHF7yHyVU2F0BeMn0HhwcVduphUm', '9979743627d88d3559a754dd9b4142', 'Active', '7089765432', 'Web Developer', '', 'UserProfilePic/userdefault.png', '2021-09-25 02:49:14'),
(9, 'Priya Vikas Sharma', 'whizz1026@gmail.com', '$2y$10$58zmNdIRyxoL6CkhKsADfuiaXFGI.mrN3APRQ4qI48VAWYPwc/jpy', 'bfd47f5ca48ee1231cff4352af257e', 'Active', '9033758374', 'Student', '', 'UserProfilePic/g4.jpg', '2021-09-25 05:47:30'),
(10, 'Preeti Guin', 'preetiguin@gmail.com', '$2y$10$lfqWTtXOd4R.BDRcTQzpXu5qh5o.ZAqEUCrxQzzjXP1mOTAP8n20u', 'f9d5edfe116126cf014407c174d8b0', 'Active', '9847586666', 'Student', '', 'UserProfilePic/downloadprofilepic.jpg', '2021-09-25 17:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `id` int(11) NOT NULL,
  `total_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`id`, `total_count`) VALUES
(1, 242);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `ad_delete_requests`
--
ALTER TABLE `ad_delete_requests`
  ADD PRIMARY KEY (`addr_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contactus_id`);

--
-- Indexes for table `testemonial`
--
ALTER TABLE `testemonial`
  ADD PRIMARY KEY (`testemonial_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`,`thread_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ad_delete_requests`
--
ALTER TABLE `ad_delete_requests`
  MODIFY `addr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contactus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testemonial`
--
ALTER TABLE `testemonial`
  MODIFY `testemonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
