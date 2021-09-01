-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 08:38 AM
-- Server version: 10.4.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u346577485_AliBinAli`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_details`
--

CREATE TABLE `about_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_details`
--

INSERT INTO `about_details` (`id`, `title_ar`, `title_en`, `text_ar`, `text_en`, `icon`, `created_at`, `updated_at`) VALUES
(10, 'رؤيتنا', 'Our Hope', '<p>رؤﻳﺘﻨﺎ أن يكون ﻣـﺴــﺘـﺸــﻔـﻰ ﻋﻠﻲ ﺑــﻦ ﻋﻠﻲ اﻟﻤـﻜــﺎن اﻷﻓـﻀـــﻞ ﻟﻠﺤـﺼـــﻮل ﻋـﻠـﻰ اﻟـﺮﻋـﺎﻳـﺔ, وﻣـﻤـﺎرﺳــﺔ ﻣـﻬـﻨـﺔ اﻟـﻄـﺐ , وأن ﺗـﻜــﻮن ﻫـﻲ اﻟﻤﻜﺎن اﻷﻓﻀﻞ ﻟﻠﻌﻤﻞ</p>', '<p>Our vision is that Ali Bin Ali Hospital is the best place to get care and practice medicine, and to be the best place to work.</p>', 'fa fa-eye', '2021-07-29 09:23:34', '2021-07-29 09:23:34'),
(11, 'الرسالة', 'Our Message', '<p>رﺳـﺎﻟﺘﻨﺎ ﻓﻲ ﻣـﺴﺘـﺸـﻔﻰ ﻋﻠﻲ ﺑـﻦ ﻋﻠﻲ هي التفوق ﻓﻲ ﺗﻮﻓﻴﺮ ﻛﺎﻓﺔ اﺣﺘﻴﺎﺟﺎت اﻟـﺮﻋﺎﻳﺔ الصحية ﻓـﻲ ﻋﺎﺻﻤﺘﻨﺎ ﻣﻦ ﺧـﻼل ﺗـﻮﻓﻴﺮ اﻟﺠـﻮدة واﻟﻜـﻔﺎءة والعـناية الـمركزة لـمرضانا</p>', '<p>Our mission at Ali Bin Ali Hospital is to excel in providing all healthcare needs in our capital by providing quality, efficiency and intensive care to our patients.</p>', 'fa fa-send', '2021-07-29 09:26:22', '2021-07-29 19:32:46'),
(12, 'قيمنا', 'Our Value', '<ul><li>الطموح</li><li>الأمان</li><li>المسؤولية</li><li>التعليم</li><li>البراعة</li><li>الولاء</li><li>النزاهه</li><li>المبادرة</li></ul>', '<ul><li>Ambition</li><li>Safety</li><li>Responsibility</li><li>Education</li><li>Ingenuity</li><li>Loyalty</li><li>Integrity</li><li>Initiative</li></ul>', 'fa fa-shopping-bag\r\n', '2021-07-29 09:28:29', '2021-07-29 09:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `about_infos`
--

CREATE TABLE `about_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text1_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text1_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_infos`
--

INSERT INTO `about_infos` (`id`, `text1_ar`, `text1_en`, `text2_ar`, `text2_en`, `title_ar`, `title_en`, `content_ar`, `content_en`, `created_at`, `updated_at`) VALUES
(1, 'ﻳـﻌـﺘـﺒـﺮ ﻣـﺴــﺘـﺸـﻔـﻰ ﻋـﻠـﻲ ﺑـﻦ ﻋـﻠـﻲ ﻣـﻦ اﻟـﻤـﺴﺘـﺸـﻔـﻴـﺎت اﻟـﺨـﺎﺻـﺔ ﺑـﻤـﺪﻳـﻨـﺔ اﻟـﺮﻳـﺎض اﻟـﺬي ﺗــﻢ ﺗــﺄﺳـﻴـﺴــﻪ واﻟـﻌـﻤـﻞ ﻋـﻠـﻰ ﺗـﺸـﻐـﻴـﻠـﻪ ﻣـﻊ بـدايـة عام 2020 م .كمـا ﺗﺒـﻠـﻎ اﻟـﺴـﻌـﺔ اﻟﺴــﺮﻳـﺮﻳﺔ ﻟﻠﻤـﺴـﺘﺸـﻔـﻰ ﻣـﺌﺔ ﺳــﺮﻳﺮ وﻳـﻄﻤــﺢ أن ﻳـﻜـﻮن اﻟـﻣـﺴــﺘـﺸـﻔـﻰ واﺣــﺪاً مـن أبـرز مـقـدمـي ﺨـﺪﻣـﺎت الـرعـاية اﻟﺼـﺤﻴﺔ ﻓﻲ الـمملكـة العـربيـة الـسعـوديـة', 'Hospital is Ali Bin Ali of private hospitals in Riyadh, which has been established and work on it off with the beginning of the year 2020. As of bed capacity of the hospital a hundred bed hospital aspires to be one of the leading providers of health care services in the Kingdom of Saudi Arabia', 'تتـكـون الخـدمـات الـصحيـة فـي اﻟـﻤـﺴـﺘــﺸــﻔﻰ ﺑـﺸـﻜﻞ أﺳـﺎﺳـﻲ ﻣـﻦ اﻟﺨﺪﻣﺎت اﻟﺘﺸـــﺨﻴﺼـﻴﺔ واﻟﻌﻼﺟﻴﺔ واﻟـﻮﻗـﺎﺋﻴـﺔ وﺧـﺪﻣـﺎت اﻟﻤﺮاﻓـﻖ اﻟﻤـﺴــﺎﻧـﺪة ﻟﻠـﺮﻋـﺎﻳـﺔ الـيوﻣﻴـﺔ. ﻛـﻤـﺎ ﻳﺤـﺮص ﻣﺴـﺘﺸـﻔـﻰ ﻋـﻠـﻲ ﺑﻦ ﻋـﻠـﻲ ﻋـﻠـﻰ ﺗﻘـﺪﻳـﻢ اﻟﺨـﺪﻣﺎت اﻟﺼـﺤﻴﺔ ﺑﺠـﻮدة ﻋـﺎﻟـﻴﺔ ﺑـﻮﺟﻮد ﻓـﺮﻳـﻖ ﻋـﺎﻟـﻲ اﻟـﻜﻔــﺎءة ﻣـﻦ اﻟـﻤﻤـﺎرﺳـﻴﻦ اﻟـﺼﺤﻴﻴـﻦ واﻟـﺨـﺪﻣﺎت اﻹدارﻳـﺔ اﻟﻤﻤﻴـﺰة, وﻗﺪ ﺗـﻢ ﺗﺠﻬﻴــﺰ اﻟﻤﺴﺘﺸﻔـﻰ ﺑـﺄﺣـﺪث اﻟﻤﻌـﺪات اﻟـﻄﺒﻴـﺔ \r\n', 'Health services in a hospital mainly consist of diagnostic, curative, preventive and supportive care facility services. Ali is also keen Ben Ali Hospital to provide health services with high quality the presence of high-efficiency team of health practitioners distinctive and administrative services, the hospital has been equipped with the latest medical equipment', 'تصميم المستشفي', 'hospital design', 'يعتبر المستشفى واحداً من المنظومات الصحية الداعمة لتقديم رعاية صحية عالية الجودة وبمساندة أحدث التقنيات الحديثة\r\n\r\nتبلغ الطاقة الاستيعابية للمستشفى 100سرير وتشتمل الخدمات على الأقسام التنويمية، وخدمات العيادات الخارجية، والأشعة والمختبر، والعلاج الطبيعي،', 'يعتبر المستشفى واحداً من المنظومات الصحية الداعمة لتقديم رعاية صحية عالية الجودة وبمساندة أحدث التقنيات الحديثة\r\n\r\nتبلغ الطاقة الاستيعابية للمستشفى 100سرير وتشتمل الخدمات على الأقسام التنويمية، وخدمات العيادات الخارجية، والأشعة والمختبر، والعلاج الطبيعي،', NULL, '2021-07-31 07:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `about_sliders`
--

CREATE TABLE `about_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_sliders`
--

INSERT INTO `about_sliders` (`id`, `icon`, `title_ar`, `title_en`, `text_ar`, `text_en`, `created_at`, `updated_at`) VALUES
(3, 'uploads/about/slider/1627831680.jpg', NULL, NULL, NULL, NULL, '2021-08-01 13:28:00', '2021-08-01 13:28:00'),
(4, 'uploads/about/slider/1627831692.jpg', NULL, NULL, NULL, NULL, '2021-08-01 13:28:12', '2021-08-01 13:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title_ar`, `title_en`, `text_ar`, `text_en`, `job_ar`, `job_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'وليد بن علي ين محمد', 'Walid bin Ali yen Muhammad', 'ﻳـﻔـﺨــﺮ ﻣــﺴــــﺘــﺸـــــﻔﻰ ﻋـﻠـﻲ ﺑـﻦ ﻋـﻠـﻲ واﻟﻌــﺎﻣـﻠــﻮن ﺑــﻪ ﺑــﺘــﻘــﺪﻳـﻢ ﺧـﺪﻣـــﺎت اﻟـﺮﻋــﺎﻳــﺔ اﻟـﺼــﺤــﻴــﺔ اﻟـﻌـﻼﺟـﻴـﺔ واﻟـﻮﻗـﺎﺋـﻴـﺔ واﻟـﺘـﺄﻫـﻴـﻠـﻴـﺔ ﺑـﺄﻋـﻠـﻰ ﻣﺴــــﺘـﻮﻳـﺎﺗـﻬـﺎ ﺑـﺠـﻨـﻮب اﻟﻌـﺎﺻـﻤﺔ اﻟﺴــﻌﻮدﻳﺔ اﻟﺮﻳﺎض .\r\n\r\nإن ﻧــﺒــﺾ اﻟـﺤـﻴـﺎة ﻫـﻮ ﺷـــﻌـﺎرﻧـﺎ اﻟــﺬي أﺻــﺒــﺢ إﻟـﺰاﻣــﺎ وﺑــﻜــﻞ ﻣــﻬــﺎرة وإﺗــﻘــﺎن واﺣـــﺘــﺮام ﻟـﺠــﻤــﻴــﻊ ﻋـﻤـﻼﺋــﻨــﺎ ﻣــﻦ اﻟـﻤـﺮاﺟــﻌــﻴــﻦ واﻟــﻌــﺎﻣــﻠــﻴــﻦ إن ﺗﻮاﺻـﻠﻜﻢ وﺗﻌﺎﻣﻠﻜﻢ ﻣﻊ اﻟﻤﺴـﺘـﺸـﻔﻰ ﻳﺄﺗﻲ ﻓﻲ ﻗﻤﺔ اﻹﻫﺘﻤﺎﻣﺎت ﻣـﻦ ﻗـﺒـﻞ اﻟـﻌـﺎﻣﻠـﻴـﻦ, وﻫـﺬه اﻹﻳــﺠــﺎﺑــﻴــﺔ ﻓــﻲ اﻟــﺘــﻌــﺎﻣـــﻞ ﺗـــﺆدي إﻟــﻰ اﻟــﻨــﺠــﺎح ﺑــﺘـــﻘــﺪﻳــﻢ اﻟــﻌــﻨــﺎﻳــﺔ اﻟـﻤــــﺴــــﺘــﻤــﺮة ﺑــﻜــﻢ .\r\n\r\nإن ﻫـﺬا اﻟـﺼـﺮح اﻟـﻄـﺒـﻲ واﻟـﺬي ﻳـﻌـﺘـﺒـﺮ ﻣـﻦ اﻟﻤﻨـﺸـﺂت اﻟـﺼـﺤـــﻴـﺔ اﻟـﻤـﺒـﻬـﺮة ﻗـﺪ إﺳــﺘـﺜـﻤـﺮ ﺑـﺎﻟـﻜﻮادر اﻟـﻄـﺒـﻴـﺔ اﻟـﻤـﺆﻫـﻠـﺔ ﺑـﻤـﺴـﺎﻧـﺪة ﻓـﺮﻳـﻖ ﻣـﻦ اﻟﺘـﻤـﺮﻳــﺾ واﻟـﻔـﻨـﻴــﻴـﻦ ﻣـﺪرب ﻋـﻠﻰ أﺣـﺪث ﻧـﻈـﻢ ﺗـﻘـﺪﻳﻢ اﻟﺨـﺪﻣـﺎت اﻟﺼـﺤـﻴـﺔ، إﺿـﺎﻓـﺔ إﻟـﻰ ﺗﺠـﻬـﻴـﺰ اﻟﻤﺴـــﺘـﺸــﻔﻰ ﺑﺄﺣﺪث الأدوات والأﺟـﻬـﺰة الطبية ﻣـﻦ ﻛﺒار اﻟﺸـﺮﻛﺎت اﻟﻌﺎﻟﻤـﻴـﺔ ﻟﻀـﻤـﺎن اﻟـﺠـﻮدة واﻟﺘﻤـﻴـﺰ\r\n\r\n', 'Preventive and rehabilitative at its highest levels in the south of the Saudi capital, Riyadh. The pulse of life is our motto, which has become binding and with all the skill and mastery and respect for all of our customers and employees of the reviewers', 'الرئيس التنفيذي', 'Chief Executive Officer', 'uploads/about_us/a.jpg', NULL, '2021-07-30 14:22:31'),
(101, 'الشيخ علي بن علي', 'Sheikh Ali bin Ali', 'يسعي ﻣﺴﺘﺸﻔﻰ ﻋﻠﻲ ﺑﻦ ﻋﻠﻲ ﻟﺤﻤﻞ رﺳﺎﻟﺔ اﻟﺸﺮاﻛﺔ اﻟﻤﺠﺘﻤﻌﻴﺔ وﻳﻘﺪم اﻟﻨﻤﻮذج اﻟﻤﺘﻜﺎﻣﻞ ﻟﺘﻮﻓﻴﺮ اﻟﺠﻮدة اﻟﻌﺎﻟﻴﺔ ﻟﻠﺘﻤﻴﺰ في القطاع اﻟﺼﺤﻲ ﺑﻌﺎﺻﻤﺘﻨﺎ اﻟﻐﺎﻟﻴﺔ .\r\n\r\nإﻧﻨﺎ ﻣﺘﻄﻠﻌﻮن ﻟﻠﻮﺻﻮل إﻟﻰ أرﻗﻰ اﻟﻤﺴﺘﻮﻳﺎت اﻟﻄﺒﻴﺔ ﻣـﻊ ﺗﻄﺒﻴﻖ أﻓﻀﻞ اﻟﻤﻮاﺻﻔﺎت واﻟﻤﻘﺎﻳﻴـﺲ اﻟﻌﺎﻟﻤـﻴـﺔ ، وذﻟﻚ ﻣـﻦ ﺧـﻼل إﺳــﺘـﻘﻄـﺎب اﻟﻜﻔـﺎءات واﻟﺨـﺒـﺮات اﻟﻄـﺒﻴـﺔ اﻟﻤـﺘـﻤـﻴـﺰة ذات اﻟـﻤـﺆﻫـﻞ العالي ﻓـﻲ ﻣﻌـﻈـﻢ اﻟﺘﺨﺼـﺼـﺎت .\r\n\r\nإن ﻣﻨﻈﻮﻣﺔ ﻣـﺴـﺘﺸـﻔﻰ ﻋﻠﻲ ﺑﻦ ﻋﻠﻲ وﻣﻦ ﺧﻼل رؤﻳﺘﻬﺎ اﻟﻤﺴﺘﻘﺒﻠﻴﺔ وﺧﻄﻄﻬﺎ اﻹﺳﺘﺮاﺗﻴﺠﻴﺔ ﺗﻌﻤﻞ ﻋﻠﻰ إﻳﺠﺎد ﺷـﺮاﻛﺔ إﺳـﺘﺮاﺗﻴﺠﻴﺔ ﻣﻊ اﻟﺨﺒﺮات واﻟﻤﺮاﻛﺰ اﻟﻄﺒﻴﺔ اﻟﻌﺎﻟﻤﻴﺔ، ﻛﻤﺎ ﺗﺤﺮص ﻋﻠﻰ ﺗﻮﻓـﻴـﺮ أﺣـﺪث اﻟﻤﻌﺪات واﻟﺘﻜﻨﻮﻟﻮﺟﻴﺎ اﻟﻄـﺒﻴـﺔ اﻟﻌﺎﻟﻤﻴﺔ ﻣﻤـﺎ ﻳﺠﻌـﻠﻨﺎ ﻣـﻦ رواد ﻣﻘﺪﻣﻲ اﻟﺨﺪﻣﺔ اﻟﺼﺤﻴﺔ ﺑﺎﻟﻤﻤﻠﻜﺔ اﻟﻌﺮﺑﻴﺔ اﻟﺴﻌﻮدﻳﺔ\r\n\r\n', 'Ali Ben Ali Hospital strives to carry the message of community partnership and presents an integrated model to provide high quality excellence in the health sector in our dear capital.\r\n\r\nWe are looking forward to reaching the highest medical standards with the application of the best international specifications and standards, by attracting highly qualified medical professionals and expertise.\r\n\r\nThe system of Ali Ben Ali Hospital, through its future vision and strategic plans, is working to find a strategic partnership with the expertise and international medical centers, and is keen to provide the most modern, technologically advanced medical equipment.', 'رئيس مجلس الادارة', 'Chairman of Board of Directors', 'uploads/about_us/p15.jpg', NULL, NULL),
(103, 'الشيخ خالد أل فهد', 'Elshiekh Khaled AL-FAHD', 'يسعدني أن أرحب بكم بنيابة عن 50 طبيبًا متخصصًا و 100 متخصص في الرعاية الصحية. الذين يعملون معًا لتقديم خدمات الرعاية الصحية الأساسية لمساعدتك على تحقيق صحة أفضل على المدى الطويل\r\n\r\nكمستشفى مجتمعي ، نشعر بإحساس عميق بالفخر والالتزام تجاه جميع أولئك الذين يضعون ثقتهم في رعايتنا. ينصب تركيزنا الأساسي على تقديم رعاية استثنائية تتجاوز المعايير الوطنية في الجودة والسلامة ورضا المرضي', 'I am pleased to welcome you on behalf of 50 medical professionals and 100 healthcare professionals. who work together to provide essential healthcare services to help you achieve better long-term health\r\n\r\nAs a community hospital, we feel a deep sense of pride and commitment to all those who place their trust in our care. Our primary focus is to provide exceptional care that exceeds national standards in quality, safety and patient satisfaction', 'المؤسس‎\r\n', 'founder', 'uploads/about_us/1627660365.jpg', '2021-07-30 13:00:43', '2021-07-30 13:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('admin','doctor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `clinic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `min_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'yes',
  `video` enum('yes','no') CHARACTER SET utf8 NOT NULL DEFAULT 'yes',
  `cv_image` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT 'on',
  `price` int(11) DEFAULT 0,
  `rate` int(11) DEFAULT NULL,
  `is_advisory` enum('no','yes') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `advisory_languages` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_home_visit` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `phone`, `type`, `name_ar`, `name_en`, `category_ar`, `category_en`, `image`, `country_id`, `clinic_id`, `min_age`, `max_age`, `audio`, `video`, `cv_image`, `address`, `latitude`, `longitude`, `status`, `price`, `rate`, `is_advisory`, `advisory_languages`, `has_home_visit`, `created_at`, `updated_at`) VALUES
(15, 'admin@admin.com', '$2y$10$r4APdO9rlyZV7TnTiATH/uca1gJMmIRkmegvafKL8FfvS51ppwCGq', '01069099099', 'admin', 'مشرف 1', NULL, NULL, NULL, 'uploads/admins/1628176566.jpg', NULL, NULL, NULL, NULL, 'yes', 'yes', NULL, NULL, NULL, NULL, 'on', NULL, NULL, 'no', NULL, 'yes', NULL, '2021-08-05 15:16:06'),
(24, 'drshady2009@hotmail.com', '$2y$10$r4APdO9rlyZV7TnTiATH/uca1gJMmIRkmegvafKL8FfvS51ppwCGq', '0582021156', 'doctor', 'د. شادي صلاح الدين شاهين', 'Dr/Shadi salah eldin Shhin', 'نائب اول جراحة عامة', 'First Deputy General Surgery', 'uploads/doctors/doctor6.png', 1, 22, '10', '60', 'yes', 'no', 'uploads/cv/1629385168.png', NULL, NULL, NULL, 'on', 250, NULL, 'no', NULL, 'yes', NULL, '2021-08-16 22:11:16'),
(25, 'dr.zainabbabiker@gmail.com', '$2y$10$6rlvRvrxWQrc1iF.eS0cLuo1rAMwSX3ohC45b//0e.YHj4ovvcg3S', '0508479351', 'doctor', 'د. زينب علي بابكر\r\n\r\n', 'Dr/Zinab ali babker', 'طبيب أسنان\r\n\r\n', 'dentist\r\n', 'uploads/doctors/doctor9.png', 4, 15, '10', '60', 'yes', 'yes', 'uploads/cv/1629385168.png', NULL, NULL, NULL, 'on', 300, 4, 'no', NULL, 'yes', NULL, NULL),
(26, 'Sana123150@gmail.com', '$2y$10$GoUnO4WcS1jH6tMj4K.ieOEq5OMv9YKOA/FSOuHaa9bbc8bUpfquK', '966566223027+', 'doctor', 'د. ثناء مصطفى قاسم', 'Dr/Sanaa moustafa kaseem', 'نائب نساء وولادة', 'Deputy of Obstetrics and Gynecology', 'uploads/doctors/doctor10.png', 6, 19, '10', '60', 'yes', 'yes', 'uploads/cv/1629385168.png', NULL, NULL, NULL, 'on', 200, NULL, 'no', NULL, 'yes', NULL, '2021-08-06 00:38:04'),
(27, 'test@doctor.com', '$2y$10$6rlvRvrxWQrc1iF.eS0cLuo1rAMwSX3ohC45b//0e.YHj4ovvcg3S', '01234567891', 'doctor', 'د. الهام السيد الظاهر\r\n', 'Dr/Elham Elsaid Elzazir', 'نائب أطفال\r\n', 'vice kids\r\n', 'uploads/doctors/doctor11.png', 1, 18, '10', '60', 'yes', 'yes', 'uploads/cv/1629385168.png', NULL, NULL, NULL, 'on', 190, NULL, 'no', NULL, 'yes', NULL, NULL),
(28, 'mohamed@gmail.com', '$2y$10$6FVFX4XleUOUb.bJk/60/euhdnKchjhVCAxoUa2XbmnBiePhV6es.', '1418 7618324', 'doctor', 'د. محمد السعيد', 'Dr Mohamed Elsaied', 'طبيب أسنان', 'Dentist', 'uploads/doctors/1628096903.png', 1, 15, '0', '40', 'yes', 'yes', NULL, NULL, NULL, NULL, 'on', 200, NULL, 'no', NULL, 'yes', '2021-08-04 17:08:23', '2021-08-17 08:34:41'),
(30, 'sam2alibinali@hotmail.com', '$2y$10$RrsdNxILL7BFaIvTCo2Wce0kFJivgJOMWxr6hngVnc.yRRT6iwfwm', '01069099099', 'doctor', 'د. حسام ابو موسى', 'Dr. Hossam Abu Musa', 'استشاري الأمراض الباطنية', 'Internal Medicine Consultant', 'uploads/doctors/1628115405.png', 8, 20, '15', '60', 'yes', 'yes', 'uploads/cv/1629385168.png', NULL, NULL, NULL, 'on', 300, NULL, 'no', NULL, 'yes', '2021-08-04 22:16:45', '2021-08-17 13:14:01'),
(31, 'AlibenAli@gmail.com', '$2y$10$nUY71.1Aq9ZovZpw3jbiyO3E3w1Y1WlFLpAiVJZiv3uNE.VhVMSXi', '01098080847', 'admin', 'AliBenAli', NULL, NULL, NULL, 'uploads/admins/1628173911.jpg', NULL, NULL, NULL, NULL, 'yes', 'yes', 'uploads/cv/1629385168.png', NULL, NULL, NULL, 'on', NULL, NULL, 'no', NULL, 'yes', '2021-08-05 14:31:51', '2021-08-05 14:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `apply_orders`
--

CREATE TABLE `apply_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`id`, `image`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(13, 'uploads/clinic/1628103294.png', 'عيادة العظام', 'Orthopedic Clinic', '2021-07-31 08:10:11', '2021-08-04 18:54:54'),
(14, 'uploads/clinic/1628105333.jpg', 'العناية المركزة', 'Intensive Care', '2021-07-31 08:10:11', '2021-08-04 19:28:53'),
(15, 'uploads/clinic/1628103057.png', 'طب اسنان', 'Dentistry', '2021-08-04 18:50:57', '2021-08-04 18:50:57'),
(16, 'uploads/clinic/1628105621.png', 'الانف والاذن والحنجرة', 'Ear, Nose and Throat', '2021-08-04 19:33:41', '2021-08-04 19:33:41'),
(17, 'uploads/clinic/1628105759.png', 'الجلدية', 'Dermatology', '2021-08-04 19:35:59', '2021-08-04 19:35:59'),
(18, 'uploads/clinic/1628105830.jpg', 'طب اطفال', 'Pediatrics', '2021-08-04 19:37:10', '2021-08-04 19:37:10'),
(19, 'uploads/clinic/1628106221.jpg', 'النساء والولادة', 'Obstetrics and Gynecology', '2021-08-04 19:43:41', '2021-08-04 19:43:41'),
(20, 'uploads/clinic/1628106260.png', 'الباطنية', 'Esoteric', '2021-08-04 19:44:20', '2021-08-04 19:44:20'),
(21, 'uploads/clinic/1628106357.png', 'عيادة نفسية', 'Psychiatric Clinic', '2021-08-04 19:45:57', '2021-08-04 19:45:57'),
(22, 'uploads/clinic/1628111428.jpg', 'جراحة عامة', 'General Surgery', '2021-08-04 21:10:28', '2021-08-04 21:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(2, 'محمد احمد', 'mohamed@gmail.com', '01098380454', 'يرجي تطوير المستشفي', '2021-09-22 12:39:15', NULL),
(4, 'Ahmed tarek yahya', 'ahmed@yahoo.com', NULL, 'It is very good service thx 💜', '2021-08-31 19:05:50', '2021-08-03 19:05:50'),
(6, 'Ahmed samir', 'ahmed@yahoo.com', NULL, 'من احسن المستشفيات التي تعاملت معها 💙', '2021-08-07 13:47:59', '2021-08-07 13:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `title_ar`, `title_en`, `icon`, `number`, `created_at`, `updated_at`) VALUES
(5, 'مريض راضي', 'satisfied patiant', 'fas fa-child', '10000', '2021-08-04 16:49:18', '2021-08-04 16:49:18'),
(6, 'غرف المستشفى', 'Hospital Rooms', 'fas fa-home', '100', '2021-08-04 16:53:18', '2021-08-04 16:53:18'),
(7, 'طبيب', 'Doctors', 'fas fa-user-md', '35', '2021-08-04 16:54:17', '2021-08-04 16:54:17'),
(8, 'موظف مؤهل', 'Qualified Employees', 'fas fa-heart', '160', '2021-08-04 16:57:07', '2021-08-04 16:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_ar`, `name_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'مصر', 'Egypt', 'uploads/flags/Egypt.png', NULL, NULL),
(3, 'امريكي', 'America', 'uploads/countries/america.jpg', '2021-08-01 10:51:08', '2021-08-01 10:51:08'),
(4, 'السودان', 'Sudan', 'uploads/countries/sudan.png', NULL, NULL),
(6, 'لبنان', 'Lebanon', 'uploads/countries/lebanon.jpg', NULL, NULL),
(8, 'الاردن', 'Jordan', 'uploads/Countries/1628114576.png', '2021-08-04 22:02:56', '2021-08-04 22:02:56'),
(10, 'الجزائر', 'Algeria', 'uploads/Countries/1628114718.png', '2021-08-04 22:05:18', '2021-08-04 22:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `title_ar`, `title_en`, `text_ar`, `text_en`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1410, 'المؤهلات\r\n\r\n', 'Qualifications', 'بكالوريوس طب و جراحة الفم و الأسنان (جامعة المنصورة - مصر) (مايو 2010)\r\n\r\n', 'Bachelor of Oral and Dental Medicine and Surgery (Mansoura University - Egypt) (May 2010)\r\n', 28, NULL, NULL),
(1411, '_', '_', 'دراسات عليا : دبلوم عالى فى علاج الجذور(حشو العصب)(جامعة طنطا - مصر) (أكتوبر 2015)\r\n\r\n', 'Postgraduate studies: Higher Diploma in Endodontics (Nerve Filling) (Tanta University - Egypt) (October 2015)\r\n', 28, NULL, NULL),
(1412, '-', '-', 'التحضير لامتحان زمالة كلية الجراحين الملكيه بجلاكسو (بريطانيا)\r\n\r\n', 'Preparing for the Fellowship Exam of the Royal College of Surgeons in Glasgow (UK)\r\n', 28, NULL, NULL),
(1413, 'التراخيص', 'licenses', 'العمل فى شركة زيركونزان الالمانية الرائده فى مجال تركيبات الزيركون كمدير فنى وتسويق لمنتجات الشركة فى 2010\r\n\r\n', 'Work in Zirconzan, the leading German company in the field of zircon fittings, as a technical and marketing manager for the company’s products in 2010\r\n', 28, NULL, NULL),
(1414, '-', '-', 'العمل فى مستشفى المنصوره العسكرى كطبيب اسنان فى الفتره من ابريل 2012 حتى يونيو 2013\r\n\r\n', 'Worked in Mansoura Military Hospital as a dentist from April 2012 to June 2013\r\n', 28, NULL, NULL),
(1415, 'المؤهلات\r\n\r\n', 'Qualifications', ' درجة الدكتوراة في الجراحة العامة وجراحة المناظير مايو 2019 ، كلية الطب ؛ جامعة - بنها ،مصر.\r\n', 'MD in General and Laparoscopic Surgery May 2019, College of Medicine; University - Benha, Egypt.\r\n', 24, NULL, NULL),
(1416, '-', '-', '.درجة الماجستير في الجراحة العامة ، يناير 2015 ، كلية الطب ,جامعة بنها, مصر -\r\n', 'Master\'s degree in General Surgery, January 2015, Faculty of Medicine, Benha University, Egypt -\r\n', 24, NULL, NULL),
(1417, 'الخبرة', 'Experience', '. استشاري ثالث فى الجراحة العامة وجراحة المناظير بمستشفيات جامعة بنها بمصر منذ عام 2019 -\r\n', '. Third consultant in general and endoscopic surgery at Benha University Hospitals in Egypt since 2019 -\r\n', 24, NULL, NULL),
(1418, '-', '-', '. أخصائي الجراحة العامة وجراحة المناظير بمستشفيات جامعة بنها بمصر منذ عام 2015 -\r\n', '. Specialist in general and endoscopic surgery at Benha University Hospitals in Egypt since 2015 -\r\n', 24, NULL, NULL),
(1419, '-', '-', '. طبيب مقيم بقسم الجراحة العامة بمستشفى بنها الجامعي بمصر منذ عام 2012 -\r\n\r\n', '. Resident doctor, Department of General Surgery, Benha University Hospital, Egypt, since 2012 -\r\n', 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `title_ar`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'ضغط الدم', 'Blood Pressure', '2021-07-11 08:14:08', '2021-06-30 11:46:15'),
(2, 'مرض السكر', 'Sugary', NULL, NULL),
(3, 'سرطان الدم', 'Blood Cancer', '2021-08-02 10:27:59', '2021-08-02 10:27:59'),
(4, 'مم', 'نن', '2021-08-23 21:45:25', '2021-08-23 21:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_dates`
--

CREATE TABLE `doctor_dates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_reserved` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_dates`
--

INSERT INTO `doctor_dates` (`id`, `doctor_id`, `offer_id`, `date`, `is_reserved`, `created_at`, `updated_at`) VALUES
(4, 25, NULL, '2021-08-31', 'no', '2021-08-04 23:18:59', '2021-08-04 23:18:59'),
(5, 27, NULL, '2021-08-31', 'no', '2021-08-05 00:15:57', '2021-08-05 00:15:57'),
(6, 26, NULL, '2021-08-31', 'no', '2021-08-05 00:17:15', '2021-08-05 00:17:15'),
(7, 30, NULL, '2021-10-04', 'no', '2021-08-05 00:17:59', '2021-08-05 00:17:59'),
(8, 28, NULL, '2021-08-31', 'no', '2021-08-05 00:18:38', '2021-08-05 00:18:38'),
(11, NULL, 1, '2021-8-31', 'no', '2021-08-31 14:08:05', NULL),
(13, NULL, 2, '2021-08-31', 'no', '2021-08-20 14:44:01', '2021-08-20 14:44:01'),
(14, NULL, 3, '2021-08-07', 'no', '2021-08-20 14:44:01', '2021-08-20 14:44:01'),
(19, 25, NULL, '2021-08-31', 'no', '2021-08-23 06:37:38', '2021-08-23 06:37:38'),
(20, 24, NULL, '2021-08-31', 'no', '2021-08-23 06:37:38', '2021-08-23 06:37:38'),
(21, 24, NULL, '2021-08-31', 'no', '2021-08-23 06:37:38', '2021-08-23 06:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_hours`
--

CREATE TABLE `doctor_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_reserved` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_hours`
--

INSERT INTO `doctor_hours` (`id`, `date_id`, `hour`, `is_reserved`, `created_at`, `updated_at`) VALUES
(2, 4, '1:00:00', 'no', '2021-08-04 23:18:59', '2021-08-19 07:29:52'),
(3, 4, '2:00:00', 'yes', '2021-08-04 23:18:59', '2021-08-30 12:38:10'),
(4, 4, '6:00:00', 'yes', '2021-08-04 23:18:59', '2021-08-30 10:50:22'),
(5, 4, '8:00:00', 'yes', '2021-08-04 23:18:59', '2021-08-12 11:31:58'),
(6, 5, '16:00:00', 'no', '2021-08-05 00:15:57', '2021-08-05 00:15:57'),
(7, 5, '17:00:00', 'no', '2021-08-05 00:15:57', '2021-08-11 22:29:32'),
(8, 5, '22:00:00', 'no', '2021-08-05 00:15:57', '2021-08-05 00:15:57'),
(9, 6, '10:00:00', 'yes', '2021-08-05 00:17:15', '2021-08-05 00:17:15'),
(10, 6, '16:00:00', 'yes', '2021-08-05 00:17:15', '2021-08-05 00:17:15'),
(11, 6, '18:00:00', 'yes', '2021-08-05 00:17:15', '2021-08-21 09:58:10'),
(12, 7, '14:00:00', 'no', '2021-08-05 00:17:59', '2021-08-05 00:17:59'),
(13, 7, '16:00:00', 'no', '2021-08-05 00:17:59', '2021-08-05 00:17:59'),
(14, 7, '23:00:00', 'no', '2021-08-05 00:17:59', '2021-08-05 00:17:59'),
(18, 11, '14:08:59', 'yes', NULL, '2021-08-21 09:58:03'),
(29, 19, '22:00:00', 'no', NULL, NULL),
(30, 19, '20:00:00', 'no', NULL, NULL),
(31, 4, '21:00:00', 'yes', NULL, '2021-08-30 12:37:49'),
(32, 19, '24:00:00', 'no', NULL, NULL),
(33, 20, '21:00:00', 'yes', NULL, '2021-08-30 11:58:56'),
(34, 20, '24:00:00', 'yes', NULL, '2021-08-30 11:37:58'),
(35, 21, '21:00:00', 'yes', NULL, '2021-08-30 12:38:26'),
(36, 21, '24:00:00', 'yes', NULL, '2021-08-30 12:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `doctor_id`, `offer_id`) VALUES
(1, 1, 25, NULL),
(2, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `created_at`, `updated_at`) VALUES
(14, 'uploads/media_center/image/1.jpg', NULL, NULL),
(15, 'uploads/media_center/image/2.jpg', NULL, NULL),
(16, 'uploads/media_center/image/3.jpg', NULL, NULL),
(18, 'uploads/media_center/image/1628627320.jpg', '2021-08-10 20:28:40', '2021-08-10 20:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `join_us`
--

CREATE TABLE `join_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `join_us`
--

INSERT INTO `join_us` (`id`, `title_ar`, `title_en`, `text_ar`, `text_en`, `created_at`, `updated_at`) VALUES
(1, 'فرصنا المتوفرة', 'Our Jobs', 'نحن في مستشفى علي بن علي لدينا بيئة عمل مليئة بالتحديات والتحفيز والتي تتيح مجالًا كبيرًا للنمو والتطوير الوظيفي. نخلق ثقافة عمل موصلة تجذب الأفراد الموهوبين والملتزمين وتحافظ عليهم وتساعدهم على النمو. نحن نشجع التعلم مدى الحياة ونقدم أفضل رعاية لعملائنا ونسعى جاهدين لإنشاء منصة عالمية المستوى لرعاية محترفي الغد.', 'We have a  very good environment', '2021-08-10 13:34:08', '2021-08-02 09:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `join_us_details`
--

CREATE TABLE `join_us_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `join_us_details`
--

INSERT INTO `join_us_details` (`id`, `title_ar`, `title_en`, `category_ar`, `category_en`, `address_ar`, `address_en`, `content_ar`, `content_en`, `date`, `created_at`, `updated_at`) VALUES
(9, 'ممرضات', 'Nurses', 'تمريض', 'Nursing', 'مستشفي علي بن علي', 'Alibinali Hospital', 'خبرة سريرية في غرفة الطوارئ ، ومهارات تواصل جيدة ، وإدارة الوقت', 'Clinical expertise in the emergency room, good communication skills, time management', NULL, '2021-08-04 23:50:16', '2021-08-04 23:50:16'),
(10, 'غير ذلك', 'others', 'غير ذلك', 'others', 'مستشفي علي بن علي', 'Alibinali Hospital', 'نتطلع دائمًا إلى مقابلة أشخاص موهوبين جدد ، ولكن نظرًا لتطور وضع COVID-19 ، لدينا توقف مؤقت في التوظيف. هناك فرصة جيدة أننا قد نبحث عن مجموعة متنوعة من الأدوار والمهارات الجديدة في المستقبل. لذا ، إذا كنت تعتقد أنك تطابق مجموعة مهارات جيدة في Modern Tribe ، فيرجى تقديم طلب وسنتواصل معك عندما نقوم بالتجنيد بنشاط مرة أخرى ومعرفة ما إذا كنت لا تزال مهتمًا.', 'We’re always looking to meet new talented people, but due to the evolving COVID-19 situation, we have a temporary pause on hiring. There is a good chance we might be looking for a variety of new roles and skillsets in the future. So, if you think you’re a good skill set match for Modern Tribe, please apply and we will reach out to you when we are actively recruiting again and see if you are still interested.', NULL, '2021-08-04 23:55:06', '2021-08-04 23:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_07_14_095359_create_sliders_table', 1),
(2, '2021_07_14_095732_create_settings_table', 1),
(3, '2021_07_26_143130_create_second_sections_table', 1),
(4, '2021_07_26_143209_create_images_table', 1),
(5, '2021_07_26_143220_create_videos_table', 1),
(6, '2021_07_26_143233_create_news_table', 1),
(7, '2021_07_26_143250_create_about_infos_table', 1),
(8, '2021_07_26_143302_create_counters_table', 1),
(9, '2021_07_26_143310_create_about_us_table', 1),
(10, '2021_07_26_143323_create_contacts_table', 1),
(11, '2021_07_26_143333_create_about_details_table', 1),
(12, '2021_07_26_143349_create_clinics_table', 1),
(13, '2021_07_26_143404_create_countries_table', 1),
(14, '2021_07_26_143416_create_admins_table', 1),
(15, '2021_07_26_143540_create_about_sliders_table', 1),
(16, '2021_07_26_143550_create_cvs_table', 1),
(17, '2021_07_26_143606_create_doctor_dates_table', 1),
(18, '2021_07_26_143617_create_doctor_hours_table', 1),
(19, '2021_07_26_143620_create_diseases_table', 1),
(20, '2021_07_26_143631_create_reservations_table', 1),
(21, '2021_07_26_143645_create_join_us_table', 1),
(22, '2021_07_26_143842_create_join_us_details_table', 1),
(23, '2021_07_26_143906_create_apply_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_slider`
--

CREATE TABLE `mobile_slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobile_slider`
--

INSERT INTO `mobile_slider` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'uploads/slider/1627381896.jpg', NULL, NULL),
(3, 'uploads/slider/1627571286.jpg', NULL, NULL),
(4, 'uploads/doctors/doctor6.png', NULL, NULL),
(5, 'uploads/media_center/image/1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `title_ar`, `title_en`, `content_ar`, `content_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'مارس', 'مستشفى علي بن علي', 'Ali Bin Ali Hospital\r\n', 'ﻳـﻌـﺘـﺒـﺮ ﻣـﺴــﺘـﺸـﻔـﻰ ﻋـﻠـﻲ ﺑـﻦ ﻋـﻠـﻲ ﻣـﻦ اﻟـﻤـﺴﺘـﺸـﻔـﻴـﺎت اﻟـﺨـﺎﺻـﺔ ﺑـﻤـﺪﻳـﻨـﺔ اﻟـﺮﻳـﺎض اﻟـﺬي ﺗــﻢ ﺗــﺄﺳـﻴـﺴــﻪ واﻟـﻌـﻤـﻞ ﻋـﻠـﻰ ﺗـﺸـﻐـﻴـﻠـﻪ ﻣـﻊ بـدايـة عام 2020 م .كمـا ﺗﺒـﻠـﻎ اﻟـﺴـﻌـﺔ اﻟﺴــﺮﻳـﺮﻳﺔ ﻟﻠﻤـﺴـﺘﺸـﻔـﻰ ﻣـﺌﺔ ﺳــﺮﻳﺮ وﻳـﻄﻤــﺢ أن ﻳـﻜـﻮن اﻟـﻣـﺴــﺘـﺸـ', 'Hospital is Ali Bin Ali of private hospitals in Riyadh, which has been established and work on it off with the beginning of the year 2020. As of bed capacity of the hospital a hundred bed hospital aspires to be one of the leading providers of health care ', 'uploads/media_center/news/2.jpg', '2021-08-03 15:52:11', NULL),
(2, 'مارس', 'مستشفى علي بن علي', 'Ali Bin Ali Hospital\r\n', 'ﻳـﻌـﺘـﺒـﺮ ﻣـﺴــﺘـﺸـﻔـﻰ ﻋـﻠـﻲ ﺑـﻦ ﻋـﻠـﻲ ﻣـﻦ اﻟـﻤـﺴﺘـﺸـﻔـﻴـﺎت اﻟـﺨـﺎﺻـﺔ ﺑـﻤـﺪﻳـﻨـﺔ اﻟـﺮﻳـﺎض اﻟـﺬي ﺗــﻢ ﺗــﺄﺳـﻴـﺴــﻪ واﻟـﻌـﻤـﻞ ﻋـﻠـﻰ ﺗـﺸـﻐـﻴـﻠـﻪ ﻣـﻊ بـدايـة عام 2020 م .كمـا ﺗﺒـﻠـﻎ اﻟـﺴـﻌـﺔ اﻟﺴــﺮﻳـﺮﻳﺔ ﻟﻠﻤـﺴـﺘﺸـﻔـﻰ ﻣـﺌﺔ ﺳــﺮﻳﺮ وﻳـﻄﻤــﺢ أن ﻳـﻜـﻮن اﻟـﻣـﺴــﺘـﺸـ', 'Hospital is Ali Bin Ali of private hospitals in Riyadh, which has been established and work on it off with the beginning of the year 2020. As of bed capacity of the hospital a hundred bed hospital aspires to be one of the leading providers of health care ', 'uploads/media_center/news/1.jpg', '2021-08-10 15:52:14', NULL),
(3, 'مارس', 'مستشفى علي بن علي', 'Ali Bin Ali Hospital\r\n', 'ﻳـﻌـﺘـﺒـﺮ ﻣـﺴــﺘـﺸـﻔـﻰ ﻋـﻠـﻲ ﺑـﻦ ﻋـﻠـﻲ ﻣـﻦ اﻟـﻤـﺴﺘـﺸـﻔـﻴـﺎت اﻟـﺨـﺎﺻـﺔ ﺑـﻤـﺪﻳـﻨـﺔ اﻟـﺮﻳـﺎض اﻟـﺬي ﺗــﻢ ﺗــﺄﺳـﻴـﺴــﻪ واﻟـﻌـﻤـﻞ ﻋـﻠـﻰ ﺗـﺸـﻐـﻴـﻠـﻪ ﻣـﻊ بـدايـة عام 2020 م .كمـا ﺗﺒـﻠـﻎ اﻟـﺴـﻌـﺔ اﻟﺴــﺮﻳـﺮﻳﺔ ﻟﻠﻤـﺴـﺘﺸـﻔـﻰ ﻣـﺌﺔ ﺳــﺮﻳﺮ وﻳـﻄﻤــﺢ أن ﻳـﻜـﻮن اﻟـﻣـﺴــﺘـﺸـ', 'Hospital is Ali Bin Ali of private hospitals in Riyadh, which has been established and work on it off with the beginning of the year 2020. As of bed capacity of the hospital a hundred bed hospital aspires to be one of the leading providers of health care ', 'uploads/media_center/news/4.jpg', '2021-08-17 15:52:21', NULL),
(9, 'مارس', 'مستشفى علي بن علي', 'Ali Bin Ali Hospital\r\n', 'ﻳـﻌـﺘـﺒـﺮ ﻣـﺴــﺘـﺸـﻔـﻰ ﻋـﻠـﻲ ﺑـﻦ ﻋـﻠـﻲ ﻣـﻦ اﻟـﻤـﺴﺘـﺸـﻔـﻴـﺎت اﻟـﺨـﺎﺻـﺔ ﺑـﻤـﺪﻳـﻨـﺔ اﻟـﺮﻳـﺎض اﻟـﺬي ﺗــﻢ ﺗــﺄﺳـﻴـﺴــﻪ واﻟـﻌـﻤـﻞ ﻋـﻠـﻰ ﺗـﺸـﻐـﻴـﻠـﻪ ﻣـﻊ بـدايـة عام 2020 م .كمـا ﺗﺒـﻠـﻎ اﻟـﺴـﻌـﺔ اﻟﺴــﺮﻳـﺮﻳﺔ ﻟﻠﻤـﺴـﺘﺸـﻔـﻰ ﻣـﺌﺔ ﺳــﺮﻳﺮ وﻳـﻄﻤــﺢ أن ﻳـﻜـﻮن اﻟـﻣـﺴــﺘـﺸـ', 'Hospital is Ali Bin Ali of private hospitals in Riyadh, which has been established and work on it off with the beginning of the year 2020. As of bed capacity of the hospital a hundred bed hospital aspires to be one of the leading providers of health care ', 'uploads/media_center/news/3.jpg', '2021-08-17 15:52:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `reservation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `doctor_id`, `title_ar`, `message_ar`, `title_en`, `message_en`, `user_id`, `date`, `reservation_id`, `created_at`, `updated_at`) VALUES
(173, NULL, '12حالة الحجز رقم ', 'عذرا تم رفض حجزك', 'status of reservation number 12', 'your reservation is accepted', 1, '2021-12-09', 12, '2021-08-21 09:22:20', '2021-08-21 09:22:20'),
(174, 26, '12حالة الحجز رقم ', '2021-12-09تم الغاء حجز يوم ', 'status of reservation number 12', 'The reservation canceled on 2021-12-09', NULL, '2021-12-09', 12, '2021-08-21 09:22:20', '2021-08-21 09:22:20'),
(176, NULL, '10حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number 10', 'your reservation ended successfully', 1, '2021-07-01', 10, '2021-08-21 09:28:10', '2021-08-21 09:28:10'),
(178, NULL, '11حالة الحجز رقم ', 'تم قبول حجزك', 'status of reservation number 11', 'your reservation is accepted', 1, '2021-09-03', 11, '2021-08-21 09:58:03', '2021-08-21 09:58:03'),
(179, 28, '11حالة الحجز رقم ', '2021-09-03هناك حجز جديد يوم ', 'status of reservation number 11', 'There is a new reservation on 2021-09-03', NULL, '2021-09-03', 11, '2021-08-21 09:58:03', '2021-08-21 09:58:03'),
(180, NULL, '18حالة الحجز رقم ', 'تم قبول حجزك', 'status of reservation number 18', 'your reservation is accepted', 1, '2021-09-03', 18, '2021-08-21 09:58:10', '2021-08-21 09:58:10'),
(181, 24, '18حالة الحجز رقم ', '2021-09-03هناك حجز جديد يوم ', 'status of reservation number 18', 'There is a new reservation on 2021-09-03', NULL, '2021-09-03', 18, '2021-08-21 09:58:10', '2021-08-21 09:58:10'),
(182, NULL, '11حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number 11', 'your reservation ended successfully', 1, '2021-09-03', 11, '2021-08-21 10:08:30', '2021-08-21 10:08:30'),
(183, 28, '11حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number 11', 'your reservation ended successfully', NULL, '2021-09-03', 11, '2021-08-21 10:08:30', '2021-08-21 10:08:30'),
(184, NULL, '21حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number 21', 'your reservation ended successfully', 6, '2021-08-30', 21, '2021-08-30 11:11:55', '2021-08-30 11:11:55'),
(185, 25, 'حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number ', 'your reservation ended successfully', NULL, '2021-08-30', 21, '2021-08-30 11:11:55', '2021-08-30 11:11:55'),
(186, NULL, '28حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number 28', 'your reservation ended successfully', 6, '2021-08-30', 28, '2021-08-30 12:31:23', '2021-08-30 12:31:23'),
(187, 24, 'حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number ', 'your reservation ended successfully', NULL, '2021-08-30', 28, '2021-08-30 12:31:23', '2021-08-30 12:31:23'),
(188, NULL, '33حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number 33', 'your reservation ended successfully', 6, '2021-08-30', 33, '2021-08-30 12:42:12', '2021-08-30 12:42:12'),
(189, 25, 'حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number ', 'your reservation ended successfully', NULL, '2021-08-30', 33, '2021-08-30 12:42:12', '2021-08-30 12:42:12'),
(190, NULL, '29حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number 29', 'your reservation ended successfully', 6, '2021-08-30', 29, '2021-08-30 15:54:37', '2021-08-30 15:54:37'),
(191, 24, 'حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number ', 'your reservation ended successfully', NULL, '2021-08-30', 29, '2021-08-30 15:54:37', '2021-08-30 15:54:37'),
(192, NULL, '29حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number 29', 'your reservation ended successfully', 6, '2021-08-30', 29, '2021-08-30 15:59:58', '2021-08-30 15:59:58'),
(193, 24, 'حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number ', 'your reservation ended successfully', NULL, '2021-08-30', 29, '2021-08-30 15:59:58', '2021-08-30 15:59:58'),
(194, NULL, '29حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number 29', 'your reservation ended successfully', 6, '2021-08-30', 29, '2021-08-30 16:00:00', '2021-08-30 16:00:00'),
(195, 24, 'حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number ', 'your reservation ended successfully', NULL, '2021-08-30', 29, '2021-08-30 16:00:00', '2021-08-30 16:00:00'),
(196, NULL, '31حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number 31', 'your reservation ended successfully', 6, '2021-08-30', 31, '2021-08-30 16:03:44', '2021-08-30 16:03:44'),
(197, 24, 'حالة الحجز رقم ', 'تم انهاء الحجز بنجاح', 'status of reservation number ', 'your reservation ended successfully', NULL, '2021-08-30', 31, '2021-08-30 16:03:44', '2021-08-30 16:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `clinic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offer` int(11) DEFAULT NULL,
  `old_price` int(11) DEFAULT NULL,
  `new_price` int(11) DEFAULT NULL,
  `rate` int(11) NOT NULL DEFAULT 0,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(191) CHARACTER SET utf8mb4 NOT NULL,
  `details_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `doctor_id`, `clinic_id`, `offer`, `old_price`, `new_price`, `rate`, `title_ar`, `title_en`, `details_ar`, `details_en`, `created_at`, `updated_at`) VALUES
(1, NULL, 21, 10, 3000, 2700, 5, 'عرض الكشف النفسي', 'psychological offer', 'الاختبار النفسي هو أداة مصممة لقياس التراكيب الخفية، والتي تعرف أيضًا بالمتغيرات الكامنة. تكون الاختبارات النفسية عادةً، وليس بالضرورة، سلسلة من المهام أو المشكلات التي يجب أن يحلها الشخص المستجيب. هذه الاختبارات أشبه ما تكون باستطلاع للرأي، والذي يكون مصممًا أيضًا لقياس التراكيب الخفية، لكنه يختلف عن الاختبارات النفسية التي تطالب بالوصول لأقصى أداء للفرد المستجيب، بينما يقيس الاستطلاع أداء الفرد في حالته الطبيعية.', 'A psychological test is a tool designed to measure hidden structures, also known as latent variables. Psychological tests are usually, but not necessarily, a series of tasks or problems that the respondent must solve. These tests are similar to an opinion poll, which is also designed to measure occult structures, but differs from psychological tests that demand maximum performance of the respondent, while the survey measures the performance of the individual in his natural state.', NULL, '2021-08-30 16:09:47'),
(2, NULL, 15, 25, 1600, 1200, 4, 'عرض الاسنان', 'good offer', 'يمكن أن يستخدم طبيب الأسنان مخدرًا موضعيًا لتخدير المنطقة حول السن المراد ملؤه، ثم يبدأ بواسطة جهاز الحفر، أو أداة كشط هوائية، أو باستخدام الليزر في إزالة المنطقة المتحللة. يفحص الطبيب السن بالكامل لتحديد ما إذا كان قد تم إزالة التسوس بالكامل، ثم يقوم بتهيئة المساحة للحشو عن طريق تنظيف التجويف من البكتيريا والحطام.  يمكن أن يضع طبيبك بطانة مصنوعة من زجاج الأيونومر (Glass ionomer)، أو راتنج مركب (Dental composite resins)، أو مواد أخرى لحماية العصب إذا كان التسوس قريبًا من العصب.  يقوم الطبيب بصقل السن وتلميعه بعد انتهاء من الحشو، وتقليمه للمواد الزائدة', 'The dentist may use a local anesthetic to numb the area around the tooth to be filled, then start with a drill, pneumatic scraping tool, or use a laser to remove the decayed area. The doctor examines the entire tooth to determine if all the decay has been removed, then prepares the space for the filling by cleaning the cavity of bacteria and debris. If the decay is close to the nerve, your doctor may place a glass ionomer, dental composite resins or other material to protect the nerve. The doctor polishes and polishes the tooth after the filling is completed, and the excess material is trimmed.', NULL, '2021-08-30 16:05:05'),
(3, NULL, 14, 10, 1050, 945, 3, 'عرض العناية المركزة', 'Intensive care offer', 'العيادات الخارجية فى المستشفى بها جميع التخصصات (ماعدا الرمد) تحت اشراف نخبة من اكفأ  اساتذة الجامعات و المعاهد التعليمية يسعي قسم العيادات الخارجيه الي تسهيل الخدمات للمرضي عن طريق الحجز تليفونيا  او من خلال الموقع الرسمى للحجزحيث يتاح للمريض الحجز علي مدار الاسبوع', 'The outpatient clinics in the hospital have all specialties (except for ophthalmology) under the supervision of a group of the most efficient professors of universities and educational institutes. The outpatient clinics department seeks to facilitate services for patients by making reservations by phone or through the official website for reservation, where the patient is available to book throughout the week', NULL, '2021-08-30 16:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `offer_slider`
--

CREATE TABLE `offer_slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_slider`
--

INSERT INTO `offer_slider` (`id`, `offer_id`, `image`, `created_at`, `updated_at`) VALUES
(12, 2, 'uploads/offers/1630328351.png', '2021-08-30 15:59:11', '2021-08-30 15:59:11'),
(13, 3, 'uploads/offers/1630328365.jpg', '2021-08-30 15:59:25', '2021-08-30 15:59:25'),
(17, 1, 'uploads/offers/1630329355.jpg', '2021-08-30 16:15:55', '2021-08-30 16:15:55'),
(18, 1, 'uploads/offers/1630329355.png', '2021-08-30 16:15:55', '2021-08-30 16:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `phone_token`
--

CREATE TABLE `phone_token` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('ios','android') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_token`
--

INSERT INTO `phone_token` (`id`, `user_id`, `type`, `phone_token`, `created_at`, `updated_at`) VALUES
(4, 1, 'ios', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', '2021-08-11', '2021-08-11'),
(5, 6, 'android', 'fOEoHvVUQnOKhGIH_uwpbe:APA91bH6PzLBl0GYXRL0itoXxC4l9N6-z2a8KmYxlyCR8oIWTDO0ez79BBOMn4T7NHlrLQE7lgtvsLOy_t4_yh9CBg_Sphpi_ZXhWsWaNGZNSMyCvDbsX2yu3uuJf84W6elO7iYJz5wd', '2021-08-29', '2021-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `phone_token_doctor`
--

CREATE TABLE `phone_token_doctor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('android','ios') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_token_doctor`
--

INSERT INTO `phone_token_doctor` (`id`, `doctor_id`, `type`, `phone_token`, `created_at`, `updated_at`) VALUES
(6, 25, 'android', 'eIqzcXU3Q92MGKoSkO0F-f:APA91bEUUFITw0m5lqcF8sD-A5SgJ4_YZlV12sm-dFi5mTkld77kd7_BxaQrgy5L1xiCEFyLK_Jdmb0rZS6eLzZlgir7pljPaaMKIn0Vslntou-cIbNAZhjUtYCnZnnFD7Ds7FzdQ3y8', '2021-08-17 14:43:30', '2021-08-17 14:43:30'),
(7, 25, 'android', 'ffbr_O1kQtWK07u4Qs8H3V:APA91bGzIQv9dhVUZfTg2huqJm2uR0mAQ6ioWOFdkbC-0-Qt0nAK1xsT77YJYOYA4BKeV8_nCkW7DjXRnCRc0ToqrakKNZbJXOXRcd6XbQZZs5bY01Ax0-OwnzriBBT4dlAatissY5rk', '2021-08-29 17:52:04', '2021-08-29 17:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `rate`, `doctor_id`, `offer_id`, `user_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 4, 25, NULL, 1, 'دكتور رائع', '2021-08-04 14:20:06', NULL),
(2, 3, 25, NULL, 3, 'دكتور رائع', '2021-08-06 14:20:09', NULL),
(3, 4, 24, NULL, 1, 'دكتور رائع', '2021-08-02 14:20:16', NULL),
(4, 5, 24, NULL, 1, 'دكتور رائعدكتور رائع', '2021-08-20 14:20:13', NULL),
(5, 2, 24, NULL, 1, 'دكتور رائع', '2021-08-27 14:20:20', NULL),
(7, 4, NULL, 1, 1, 'دكتور رائع', '2021-08-14 14:20:36', NULL),
(8, 4, NULL, 2, 1, 'دكتور رائع', '2021-08-05 14:20:32', NULL),
(9, 3, NULL, 1, 1, 'aaaaaaaaaaaa', '2021-08-03 14:20:29', NULL),
(10, 2, NULL, 2, 1, 'bbbbbbbbb', '2021-08-04 14:20:25', NULL),
(11, 3, 26, NULL, 1, 'دكتور رائع', '2021-08-04 14:20:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hour_id` bigint(20) UNSIGNED DEFAULT NULL,
  `disease_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('online','offer') COLLATE utf8mb4_unicode_ci DEFAULT 'online',
  `call_type` enum('audio','video') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_start` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('new','accepted','refused','ended') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `is_deleted` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `doctor_id`, `offer_id`, `date_id`, `hour_id`, `disease_id`, `user_id`, `name`, `phone`, `report_text`, `type`, `call_type`, `call_start`, `gender`, `age`, `image`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(10, 25, NULL, 5, 7, NULL, 6, 'ahmed samir', '01004834728', 'نص وصف تقرير المريض', 'online', 'video', 'off', NULL, 20, NULL, 'ended', 'no', '2021-08-10 12:16:24', '2021-08-21 09:28:10'),
(11, NULL, 2, 4, 18, NULL, 6, 'ahmed samir', '01004834728', NULL, 'offer', NULL, 'off', NULL, 50, NULL, 'ended', 'no', '2021-11-10 12:21:42', '2021-08-21 10:08:31'),
(12, NULL, 1, 6, 2, NULL, 6, 'ahmed samir', '01004834728', NULL, 'offer', NULL, 'off', NULL, 36, NULL, 'accepted', 'no', '2021-09-10 12:25:13', '2021-08-21 09:22:22'),
(18, 25, NULL, 4, 11, NULL, 6, 'ahmed samir', '01004834728', NULL, 'online', 'audio', 'off', NULL, 49, NULL, 'accepted', 'no', '2021-11-11 14:35:59', '2021-08-21 09:58:11'),
(21, 25, NULL, 4, 2, 1, 6, 'ahmed samir', '01004834728', NULL, 'online', 'audio', 'off', NULL, 25, NULL, 'ended', 'no', '2021-08-19 14:35:59', '2021-08-30 11:11:55'),
(23, 25, NULL, 19, 28, 3, 6, 'محمد ', '01098380656', 'مريض', 'online', 'video', 'off', NULL, NULL, NULL, 'accepted', 'no', NULL, NULL),
(24, 25, NULL, 19, 27, NULL, 6, 'Emad magdy', '+201066174087', NULL, 'online', 'audio', 'off', 'male', NULL, NULL, 'new', 'no', '2021-08-29 17:37:02', '2021-08-29 17:37:02'),
(25, 25, NULL, 19, 28, NULL, 6, 'Emad magdy', '+201066174087', NULL, 'online', 'audio', 'off', 'male', NULL, NULL, 'new', 'no', '2021-08-29 17:37:32', '2021-08-29 17:37:32'),
(26, 25, NULL, 19, 28, NULL, 6, 'Emad magdy', '+201066174087', NULL, 'online', 'audio', 'off', NULL, NULL, NULL, 'new', 'no', '2021-08-29 17:38:00', '2021-08-29 17:38:00'),
(28, 24, NULL, 20, 34, NULL, 6, 'Emad magdy', '+201066174087', 'لانز', 'online', 'audio', 'off', NULL, NULL, NULL, 'ended', 'no', '2021-08-30 11:37:58', '2021-08-30 17:38:19'),
(29, 24, NULL, 20, 34, NULL, 6, 'Emad magdy', '+201066174087', 'تمام', 'online', 'video', 'off', 'male', 50, NULL, 'ended', 'no', '2021-08-30 11:40:15', '2021-08-31 10:58:11'),
(30, 24, NULL, 20, 33, NULL, 6, 'Emad magdy', '+201066174087', NULL, 'online', 'audio', 'off', 'male', 55, NULL, 'accepted', 'no', '2021-08-30 11:58:56', '2021-08-30 11:58:56'),
(31, 24, NULL, 21, 36, NULL, 6, 'Emad magdy', '+201066174087', NULL, 'online', 'audio', 'off', 'female', 69, NULL, 'ended', 'no', '2021-08-30 12:37:39', '2021-08-30 16:03:44'),
(32, 25, NULL, 4, 31, NULL, 6, 'Emad magdy', '+201066174087', NULL, 'online', 'audio', 'off', NULL, NULL, NULL, 'accepted', 'no', '2021-08-30 12:37:49', '2021-08-30 12:37:49'),
(33, 25, NULL, 4, 3, NULL, 6, 'Emad magdy', '+201066174087', NULL, 'online', 'audio', 'off', NULL, NULL, NULL, 'ended', 'no', '2021-08-30 12:38:10', '2021-08-30 12:42:12'),
(34, 24, NULL, 21, 35, NULL, 6, 'Emad magdy', '+201066174087', NULL, 'online', 'video', 'off', 'female', 66, NULL, 'accepted', 'no', '2021-08-30 12:38:26', '2021-08-30 12:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_disease`
--

CREATE TABLE `reservation_disease` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `disease_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reservation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_disease`
--

INSERT INTO `reservation_disease` (`id`, `disease_id`, `reservation_id`, `created_at`, `updated_at`) VALUES
(9, 2, 21, '2021-08-17 09:38:51', '2021-08-17 09:38:51'),
(10, 1, 10, NULL, NULL),
(11, 2, 10, NULL, NULL),
(14, 2, 24, '2021-08-29 17:37:02', '2021-08-29 17:37:02'),
(15, 3, 25, '2021-08-29 17:37:32', '2021-08-29 17:37:32'),
(17, 1, 29, '2021-08-30 11:40:15', '2021-08-30 11:40:15'),
(18, 3, 29, '2021-08-30 11:40:15', '2021-08-30 11:40:15'),
(19, 2, 29, '2021-08-30 11:40:15', '2021-08-30 11:40:15'),
(20, 2, 30, '2021-08-30 11:58:56', '2021-08-30 11:58:56'),
(21, 1, 30, '2021-08-30 11:58:56', '2021-08-30 11:58:56'),
(22, 1, 31, '2021-08-30 12:37:39', '2021-08-30 12:37:39'),
(23, 3, 31, '2021-08-30 12:37:39', '2021-08-30 12:37:39'),
(24, 1, 34, '2021-08-30 12:38:26', '2021-08-30 12:38:26'),
(25, 3, 34, '2021-08-30 12:38:26', '2021-08-30 12:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_files`
--

CREATE TABLE `reservation_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_files`
--

INSERT INTO `reservation_files` (`id`, `reservation_id`, `file`, `created_at`, `updated_at`) VALUES
(7, 10, 'uploads/media_center/image/1.jpg', NULL, NULL),
(8, 10, 'uploads/media_center/image/1.jpg', NULL, NULL),
(9, 18, 'uploads/media_center/image/1.jpg', NULL, NULL),
(10, 18, 'uploads/media_center/image/1.jpg', NULL, NULL),
(11, 22, 'uploads/media_center/image/1.jpg', NULL, NULL),
(12, 22, 'uploads/media_center/image/1.jpg', NULL, NULL),
(13, 29, 'storage/offer_reservation_files/XCipHJwz3grTnit6Ub1ZF7IRu5ho796xvzJqmUfb.jpeg', '2021-08-30 11:40:17', '2021-08-30 11:40:17'),
(14, 31, 'storage/offer_reservation_files/0bLUurQXwldfbsD3XtkeNaShNj7M0AQKPwc6ySEs.jpeg', '2021-08-30 12:37:39', '2021-08-30 12:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_reports`
--

CREATE TABLE `reservation_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `report` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation_reports`
--

INSERT INTO `reservation_reports` (`id`, `reservation_id`, `report`, `created_at`, `updated_at`) VALUES
(19, 10, 'uploads/media_center/image/1.jpg', NULL, NULL),
(20, 10, 'uploads/media_center/image/1.jpg', NULL, NULL),
(21, 28, 'storage/reservation_report_files/MW05n8AH3FWWUbq8Fj0k70VmseohBzkw2K7gW5R6.jpeg', '2021-08-30 17:34:01', '2021-08-30 17:34:01'),
(22, 28, 'storage/reservation_report_files/stNlzAMtJxHGfFJHiF8XcWsnPk4b4oTVkKcP70AP.jpeg', '2021-08-30 17:36:38', '2021-08-30 17:36:38'),
(23, 28, 'storage/reservation_report_files/FO2sRjuUQGB8SvVVm7akgih9mgiggcKbIeSfzecp.jpeg', '2021-08-30 17:38:19', '2021-08-30 17:38:19'),
(24, 29, 'storage/reservation_report_files/3edk9d8y361QZV0IOjaL3KUsrzQGzoCymxSQQuWy.jpeg', '2021-08-31 10:58:11', '2021-08-31 10:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `second_sections`
--

CREATE TABLE `second_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `second_sections`
--

INSERT INTO `second_sections` (`id`, `title_ar`, `title_en`, `content_ar`, `content_en`, `image`, `created_at`, `updated_at`) VALUES
(1, 'مرحبا بكم في مستشفى علي بن علي', 'Welcome to Ali Bin Ali Hospital', 'تعد المستشفى واحدة من أكبر مقدمي الخدمات الطبية والرعاية السريرية المتميزة بالرياض , مع توافر أحدث الأجهزة الطبية الحديثة ووحدة القسطرة القلبية , وتقدم المستشفى خدماتها وفقآ لأحدث المعاييرالعلمية المتعارف عليها وتحت إشراف طاقمآ متميزآ من البروفيسرات والإستشاريين والأخصائيين لعلاج جميع الحالات والحالات المستعصية ويساندة طاقمآ إداريآ للعمل على إرضاء مراجعينا والإعتناء بهم وبما يتناسب مع توقعاتهم', 'The hospital is one of the largest providers of medical services and excellent clinical care in Riyadh, with the availability of the latest modern medical devices and a cardiac catheterization unit. Our reviewers, taking care of them and in line with their expectationsThe hospital is one of the largest providers of medical services and excellent clinical care in Riyadh, with the availability of the latest modern medical devices and a cardiac catheterization unit. Our reviewers, taking care of them and in line with their expectations\r\n', 'uploads/second_section/1627399186.jpg', NULL, '2021-08-03 19:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone1`, `phone2`, `facebook`, `twitter`, `insta`, `linkedin`, `address_ar`, `address_en`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(2, 'info@alibinali.sa', '0563744814', '0112600000 ', 'https://www.facebook.com/ABAHospital/', 'https://twitter.com/ABAHospital', 'https://www.instagram.com/aba.hospital/?igshid=dytc5iotlytu', 'https://sa.linkedin.com/', 'محمد رشيد رضا, العزيزية, الرياض', 'Mohammed Rashid Reda, Aziziyah, Riyadh', '25.2413', '51.5191', NULL, '2021-08-05 10:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'uploads/doctors/doctor6.png', NULL, NULL),
(2, 'uploads/media_center/image/1.jpg', NULL, NULL),
(3, 'uploads/doctors/doctor6.png', NULL, NULL),
(4, 'uploads/media_center/image/1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'uploads/slider/1627381896.jpg', '2021-07-27 08:31:36', '2021-07-27 08:31:36'),
(3, 'uploads/slider/1627571286.jpg', '2021-07-29 13:08:06', '2021-07-29 13:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone_code` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `is_login` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone_code`, `phone`, `password`, `is_login`, `created_at`, `updated_at`) VALUES
(1, 'ahmed samir elfaramawy', '20', '1234567891', '$2y$10$Ikls1siw39oaFmO1cvRyKe/XfXhhEqGUzQUrGYkXakqur.MmVNTc.', 'yes', '2021-07-31 12:22:40', '2021-08-11 11:01:20'),
(2, 'ahmed tarek ya2', NULL, '01004834728', '$2y$10$r4APdO9rlyZV7TnTiATH/uca1gJMmIRkmegvafKL8FfvS51ppwCGq', 'no', '2021-07-31 12:53:21', '2021-08-09 13:14:22'),
(3, 'ahmed samir', '020', '1004834728', '123456', 'yes', '2021-08-05 09:59:38', '2021-08-05 09:59:38'),
(6, 'mostafa ragab', '20', '123456', '$2y$10$Ikls1siw39oaFmO1cvRyKe/XfXhhEqGUzQUrGYkXakqur.MmVNTc.', 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `image`, `link`, `created_at`, `updated_at`) VALUES
(2, 'uploads/media_center/videos/1628117337.png', 'https://www.youtube.com/watch?v=Zhz5RtBpgOg', NULL, '2021-08-04 22:48:57'),
(3, 'uploads/media_center/videos/1628117388.png', 'https://www.youtube.com/watch?v=Zhz5RtBpgOg', NULL, '2021-08-04 22:49:48'),
(7, 'uploads/media_center/videos/1628616737.jpg', 'https://www.youtube.com/watch?v=Vc4xDkGCNE0', '2021-08-10 17:32:17', '2021-08-10 17:32:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_details`
--
ALTER TABLE `about_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_infos`
--
ALTER TABLE `about_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_sliders`
--
ALTER TABLE `about_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_country_id_foreign` (`country_id`),
  ADD KEY `admins_clinic_id_foreign` (`clinic_id`);

--
-- Indexes for table `apply_orders`
--
ALTER TABLE `apply_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apply_orders_details_id_foreign` (`details_id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cvs_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_dates`
--
ALTER TABLE `doctor_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_dates_doctor_id_foreign` (`doctor_id`),
  ADD KEY `doctor_dates_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `doctor_hours`
--
ALTER TABLE `doctor_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_hours_date_id_foreign` (`date_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fav_user_id` (`user_id`),
  ADD KEY `fav_doc_id` (`doctor_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_us`
--
ALTER TABLE `join_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_us_details`
--
ALTER TABLE `join_us_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_slider`
--
ALTER TABLE `mobile_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id` (`user_id`),
  ADD KEY `orders_id` (`reservation_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_doc_id12` (`doctor_id`),
  ADD KEY `offer_clinic_id12` (`clinic_id`);

--
-- Indexes for table `offer_slider`
--
ALTER TABLE `offer_slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_slider_offer_id123` (`offer_id`);

--
-- Indexes for table `phone_token`
--
ALTER TABLE `phone_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client45494_id` (`user_id`);

--
-- Indexes for table `phone_token_doctor`
--
ALTER TABLE `phone_token_doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_token_doctor_id` (`doctor_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rate_doc_id` (`doctor_id`),
  ADD KEY `rate_user_id` (`user_id`),
  ADD KEY `rate_offer_id` (`offer_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_doctor_id_foreign` (`doctor_id`),
  ADD KEY `reservations_date_id_foreign` (`date_id`),
  ADD KEY `reservations_hour_id_foreign` (`hour_id`),
  ADD KEY `reservations_disease_id_foreign` (`disease_id`),
  ADD KEY `reservations_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `reservation_disease`
--
ALTER TABLE `reservation_disease`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_disease_des_id` (`disease_id`),
  ADD KEY `reservation_disease_res_id` (`reservation_id`);

--
-- Indexes for table `reservation_files`
--
ALTER TABLE `reservation_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation_reports`
--
ALTER TABLE `reservation_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `second_sections`
--
ALTER TABLE `second_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_details`
--
ALTER TABLE `about_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `about_infos`
--
ALTER TABLE `about_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `about_sliders`
--
ALTER TABLE `about_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `apply_orders`
--
ALTER TABLE `apply_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1420;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor_dates`
--
ALTER TABLE `doctor_dates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctor_hours`
--
ALTER TABLE `doctor_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `join_us`
--
ALTER TABLE `join_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `join_us_details`
--
ALTER TABLE `join_us_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mobile_slider`
--
ALTER TABLE `mobile_slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `offer_slider`
--
ALTER TABLE `offer_slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `phone_token`
--
ALTER TABLE `phone_token`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phone_token_doctor`
--
ALTER TABLE `phone_token_doctor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reservation_disease`
--
ALTER TABLE `reservation_disease`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reservation_files`
--
ALTER TABLE `reservation_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reservation_reports`
--
ALTER TABLE `reservation_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `second_sections`
--
ALTER TABLE `second_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_clinic_id_foreign` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `apply_orders`
--
ALTER TABLE `apply_orders`
  ADD CONSTRAINT `apply_orders_details_id_foreign` FOREIGN KEY (`details_id`) REFERENCES `join_us_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cvs`
--
ALTER TABLE `cvs`
  ADD CONSTRAINT `cvs_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_dates`
--
ALTER TABLE `doctor_dates`
  ADD CONSTRAINT `doctor_dates_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_dates_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_hours`
--
ALTER TABLE `doctor_hours`
  ADD CONSTRAINT `doctor_hours_date_id_foreign` FOREIGN KEY (`date_id`) REFERENCES `doctor_dates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `fav_doc_id` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fav_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notification_reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_to_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_to_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offer_clinic_id12` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offer_doc_id12` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_slider`
--
ALTER TABLE `offer_slider`
  ADD CONSTRAINT `offer_slider_offer_id123` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phone_token`
--
ALTER TABLE `phone_token`
  ADD CONSTRAINT `token_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phone_token_doctor`
--
ALTER TABLE `phone_token_doctor`
  ADD CONSTRAINT `phone_token_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rate_doc_id` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rate_offer_id` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`),
  ADD CONSTRAINT `rate_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_date_id_foreign` FOREIGN KEY (`date_id`) REFERENCES `doctor_dates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_disease_id_foreign` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_hour_id_foreign` FOREIGN KEY (`hour_id`) REFERENCES `doctor_hours` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation_disease`
--
ALTER TABLE `reservation_disease`
  ADD CONSTRAINT `reservation_disease_des_id` FOREIGN KEY (`disease_id`) REFERENCES `diseases` (`id`),
  ADD CONSTRAINT `reservation_disease_res_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservation_reports`
--
ALTER TABLE `reservation_reports`
  ADD CONSTRAINT `reservation_id_upload` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
