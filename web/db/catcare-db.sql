-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 07:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catcare-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `idDiagnose` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `idDisease` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diagnoses`
--

INSERT INTO `diagnoses` (`idDiagnose`, `date`, `idDisease`, `userId`) VALUES
(2001, '2023-09-26 00:00:00', 1003, 5021),
(2004, '2023-12-17 17:33:33', 1001, 5041),
(2007, '2023-12-18 01:08:21', 1003, 5041),
(2011, '2023-12-19 00:54:52', 1004, 5021),
(2012, '2023-12-19 10:58:54', 1001, 5041),
(2013, '2023-12-19 13:41:43', 1002, 5041),
(2014, '2023-12-19 15:36:17', 1001, 5042);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `idDisease` int(11) NOT NULL,
  `codeOfDisease` varchar(5) NOT NULL,
  `nameOfDisease` varchar(30) NOT NULL,
  `latinNameOfDisease` varchar(40) NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `precaution` text NOT NULL,
  `solution` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`idDisease`, `codeOfDisease`, `nameOfDisease`, `latinNameOfDisease`, `picture`, `description`, `precaution`, `solution`) VALUES
(1001, 'P01', 'Cacingan', 'Helminthiasis', 'img/diseases/diseases1696523331.png', 'Penyakit ini disebut Helminthiasis atau kecacingan. Pada umumnya, kucing dapat terinfeksi lebih dari satu jenis cacing parasit pada waktu yang sama dan juga dapat ditularkan ke manusia,ada umumnya, kucing yang mengalami helminthiasis akan memiliki perut buncit, membran nictitans (selaput mata) terlihat, kurus, rambut rontok dan kusam, tidak selera makan, diare (feses coklat-kuning pasta dengan bau menyengat dan berdarah), lemas hingga kematian jika telah terinfeksi berat. Selain itu, gejala spesifik yang dapat diamati adalah ditemukannya segmen cacing pada feses kucing.', 'Berikut beberapa langkah pencegahan yang dapat dilakukan untuk meminimalisir risiko terjadinya infeksi endoparasit ini.\r\n1.	Membersihkan kandang kucing setiap hari, meliputi seluruh peralatannya seperti tempat makan, litter box, tempat tidur, dan lainnya.\r\n2.	Memandikan kucing seperlunya saja, tidak kurang dari 2 minggu sekali. Hal ini karena kucing berisiko dapat menelan telur cacing saat dimandikan.\r\n3.	Mengurangi frekuensi kucing bermain di luar rumah.\r\n4.	Mengatur pakan yang sesuai dan terjamin kebersihannya.', 'Setelah benar-benar memastikan bahwa kucing Anda mengalami penyakit kecacingan atau helminthiasis, maka langkah terbaik yang dapat dilakukan yaitu membawa kucing kesayangan Anda ke dokter hewan. Dokter hewan akan memeriksa lebih lanjut jenis parasit cacing yang menginfeksi kucing serta pengobatan yang tepat dan sesuai dengan kondisi kucing anda.'),
(1002, 'P02', 'Kudis', 'Skabies', 'img/diseases/diseases1696523127.jpg', 'Scabies atau kudis merupakan penyakit kulit menular yang bisa dialami oleh manusia serta hewan, termasuk hewan berbulu seperti kucing. Sedangkan scabies kucing merupakan kudis pada kucing yang disebabkan oleh parasit yang disebut dengan Notoedres cati dan Sarcoptes scabiei, Sarcoptes scabiei merupakan parasit dari keluarga Sarcoptidae. Parasit jenis ini akan masuk ke dalam kulit kucing dan kemudian menjadi scabies. Induk Sarcoptes scabiei biasanya akan bertelur di bawah kulit menyebabkan kucing menjadi gatal, hingga akhirnya muncul scabies kucing di area telinga, Sedangkan Notoedres cati merupakan parasit dari sarcoptiformes family. Jenis parasit ini hampir sama dengan Sarcoptes scabiei var canis yang menyebabkan scabies pada anjing. Bedanya, jenis parasit ini lebih kecil, telurnya bulat dan anus punggung. Ukurannya begitu kecil, sehingga hanya bisa terlihat menggunakan mikroskop.Scabies kucing menyebabkan kucing merasa sangat gatal. Biasanya, gatalnya menyerang area kepala terutama sekitar telinga. Pada kucing, penyakit ini bisa menimbulkan rasa tidak nyaman, gatal-gatal, iritasi kulit, bahkan kulit berkerak.Scabies kucing dapat ditularkan melalui kontak fisik dengan hewan berbulu lain yang terkena scabies, atau kontak dengan barang-barang yang terdapat tungau Sarcoptes scabiei dan Notoedres cati.Scabies kucing umumnya lebih banyak menular pada sesama kucing. Namun, terkadang scabies dari kucing juga bisa menular pada manusia. Penularan ini biasanya juga bisa disebabkan oleh kutu atau tungau dari kucing.', 'Ada beberapa perawatan yang bisa dilakukan di rumah untuk menghilangkan scabies. Tentunya hal ini memerlukan waktu dan ketelatenan agar proses penyembuhan berlangsung dengan maksimal dengan cara :\r\n1.	Mengisolasi Kucing yang Terkena Scabies \r\n2.	Mencari Tahu Sumber Tungau\r\n3.	Sterilisasi Kandang\r\n4.	Gunakan Shampoo Anti Kutu\r\n5.	Berikan Salep scabies\r\n6.	Lakukan Suntik scabies untuk kucing\r\nJika gejalanya sudah parah sebaiknya segera bawa bawa kucing ke dokter hewan untuk mengobati kucing sakit yang terkena scabies, dokter dapat meresepkan obat antiparasit, misalnya ivermectin, baik yang diminum, dioles, atau disuntikkan. Pillhan obat ini akan disesuaikan dengan jenis tungau, area tubuh yang terkena, dan tingkat keparahan scabies pada kucing selain itu, dokter juga bisa memberikan obat pereda rasa gatal untuk membuat kucingmu merasa lebih nyaman dan tidak banyak menggaruk kulitnya lagi. Jika sudah terdapat infeksi bakteri di kulit kucing, dokter juga dapat memberikan obat antibiotik.', 'Usai mengenal apa itu scabies kucing, jenis-jenisnya serta gejalanya. Maka selanjutnya adalah mengetahui cara penanganannya. Jika gejala yang disebutkan sebelumnya muncul pada kucing, maka tidak perlu panik karena dokter hewan akan mengatasinya, Hal pertama yang harus dilakukan saat kucing terkena scabies adalah dengan segera membawa ke dokter. Dengan membawanya ke dokter akan mencegah mencegah penularan tungau ke hewan peliharaan lain yang ada di rumah, Ketika kucing dibawa ke klinik, dokter hewan akan melakukan pemeriksaan terlebih dahulu. biasanya  dokter akan mengambil bagian di area yang terkena dan melihatnya menggunakan mikroskop untuk memastikan bahwa benar ini adalah tungau atau scabies, Setelah diperiksa, dokter akan meresepkan obat untuk membantu proses penyembuhan kucing peliharaan Anda. Adapun obat yang bisa digunakan adalah obat kutu dan heartworm. Selain itu, dokter juga akan menyarankan sampo khusus dan obat penenang untuk membuat kucing lebih rileks, Selain itu dalam masa penyembuhan, kucing peliharaan yang terkena scabies kucing sebaiknya dipisahkan dari hewan peliharaan lainnya agar bisa terlindungi. Terakhir, Anda harus segera membersihkan tempat-tempat yang sering disinggahi dan disentuh kucing. Hal ini agar tungau bisa hilang dan tidak hinggap ke hewan peliharaan lain.'),
(1003, 'P03', 'Pijal, kutu, caplak', 'Ektoparasit', 'img/diseases/diseases1696523142.jpg', 'Kucing yang dipelihara maupun tidak dipelihara dapat terserang oleh ektoparasit. Infestasi ektoparasit pada kucing merupakan infeksi yang disebabkan oleh parasit yang hidup diluar tubuh inang. Ektoparasit yang sering menginfestasi kucing yaitu kutu, tungau, dan pinjal. Spesies ektoparasit yang menginfestasi kucing yaitu kutu Felicola subrostatus, pinjal Ctenocephalides felis, tungau Otodectes cynotis dan Sarcoptes scabei, Ektoparasit ini menimbulkan kesakitan dan ketidaknyaman serta gejala klinis yang khas dari infestasi ektoparasit tersebut Jenis ektoparasit yang paling banyak menginfeksi kucing adalah pinjal (Ctenocephalides felis) yang ditemukan pada karnivora di seluruh dunia.', 'Ada beberapa tips untuk menjaga kucing dari kutu:\r\n1.Tidak membiarkannya bermain di luar rumah tanpa pengawasan.\r\n2.	 Tidak mempertemukan kucing peliharaan dengan kucing liar.\r\n3.Sering membersihkan dan mendisinfeksi lingkungan sekitar.\r\n4.	Rutin memandikan atau Grooming kucing .\r\n5.	Pemberian obat tetes kutu.', 'Gunakan produk pembasmi pinjal dalam bentuk spot-on lebih efektif dan aman untuk kucing ketimbang sampo dan spray. Produk ini bisa dibeli di klinik dokter hewan terdekat. Meski begitu, konsultasikan terlebih dahulu hal ini ke dokter hewan supaya bisa berkonsultasi perihal pemakaian, berapa banyak yang harus digunakan, hingga seberapa sering kamu menggunakannya. Jika pergi ke dokter hewan tidak memungkinkan, cobalah pelajari label produk terlebih dahulu dan pastikan jika hal ini aman.\r\nBeberapa produk ini mengandung kandungan seperti:\r\nï¿½	Fiproni\r\nï¿½	Imidacloprid\r\nï¿½	Selamectin\r\nï¿½	Fluralaner\r\nSelain itu, produk pembasmi pinjal pada kucing juga bisa dalam bentuk obat-obatan yang dikonsumsi. Pil nitenpyram dapat membunuh pinjal dewasa pada kucing. Namun obat ini dapat memiliki efek yang bisa bertahan lama.\r\nSelain pil nitenpyram, obat spinosad yang bisa dikunyah juga dapat membunuh pinjal sebelum mereka bertelur. Hal ini dapat memberikan pencegahan penetasan telur pinjal di masa depan.'),
(1004, 'P04', 'Diare', 'Koksidiosis', 'img/diseases/diseases1696523153.png', 'Koksidia merupakan infeksi protozoa yakni jenis coccidia yang menginvasi saluran intestinal pada anjing dan kucing. Jenis Coccidia yang menyerang anjing yakni Isospora canis sedangkan pada kucing yakni Isospora felis. Hewan yang terinfeksi coccidiosis akan menunjukkan gejala klinis yakni seperti diare, muntah, dehidrasi, inappetide, berat badan menurun dan pada kasusparah dapat menyebabkan kematian.', 'Kebersihan merupakan tindakan paling penting untuk mencegah infeksi parasit pada kucing. Tinja harus dibuang dari jalan-jalan, kandang dan halaman untuk kucing setiap hari secara teratur. Bila mungkin semua itu harus berlantai beton. Kandang dan sebagainya harus diatur sedemikian rupa sehingga tiap-tiap bagian terkena sinar matahari langsung meskipun hanya sebentar, karena sinar matahari akan membunuh telur, larva, atau ookista bila semua itu tidak tertutup oleh debu, tinja atau tumbuh-tumbuhan pelindung. Pakan dan minum dicegah terkontaminasi dari tinja.', 'Jika kucing kalian terlihat feces berbentuk bubur dan lebih dari 4 kali dalam sehari dan masih mau makan pertolongan pertama yang harus kalian lakukan adalah memberikan oralit atau obat diare yang mengandung kaolin peptin.\r\nJika masih berlanjut  dalam 24 jam dengan konsistensi feses mulai ke arah cair serta kucing mulai tidak mau makan dan minum segera bawa ke dokter hewan terdekat untuk dilakukan pemeriksaan lanjutan dan di lakukan tindakan yang di butuhkan.'),
(1005, 'P05', 'Flu Kucing', 'Feline Viral Rhinotracheitis', 'img/diseases/diseases1696523167.jpg', 'Penyakit ini disebabkan oleh virus herpes dan dapat menyebabkan permasalahan pada saluran nafas bagian atas. Masa inkubasi yaitu masa dari masuknya virus sampai timbulnya gejala berkisar antara 3-5 hari.\r\n\r\nKucing dari segala usia berpotensi terinfeksi tetapi lebih beresiko pada anak kucing. Induk kucing yang bunting dan kucing dengan kekebalan tubuh jelek juga mempunyai resiko tinggi tertular Feline Rhinotracheitis.', 'Hal yang harus diperhatikan untuk mencegah dari penyakit ini adalah: Populasi kucing jangan terlalu padat di dalam rumah, Ventilasi serta sanitasi yang baik, Nutrisi harus tercukupi, dan menjaga kesetresan serta vaksin tricat atau tetracat.', 'Harus dibawa ke dokter hewan dan biasanya akan melakukan berbagai tindakan untuk menyembuhkan penyakit ini secara menyeluruh. Pertama, perbaikan nutrisi agar tidak dehidrasi termasuk dengan infus jika diperlukan. Kedua, pemberian antibiotik untuk mencegah infeksi sekunder dari bakteri. Ketiga, pemberian obat untuk pernafasan dan mata.\r\nKesembuhan kucing sangat bergantung pada kekebalan tubuh, nutrisi yang baik, dan cairan tubuh yang terjaga, biasanya akan membaik dalam waktu tujuh hingga sepuluh hari.\r\nSatu-satunya pencegahan terhadap Feline Rhinotracheitis adalah dengan vaksin tricat atau tetracat.'),
(1006, 'P06', 'Pernafasan', 'Feline Calicivirus', 'img/diseases/diseases1696523185.jpg', 'Feline Calicivirus adalah suatu penyakit yang disebabkan oleh virus dari famili caliciviridae. Virus calici ini merupakan salah satu dari jenis cat flu yang paling sering menyerang kucing selain herpes virus (FHV).Virus ini dapat masuk ke dalam tubuh melalui mata, hidung (pernafasan) dan mulut. Karena partikel virus yang sangat kecil dan mudah menempel pada sembarang tempat, seperti lantai, tempat tidur kucing, makanan, air minum, dan bahkan baju atau tangan manusia yang tidak steril, maka penularan dapat sangat cepat terjadi. Masa inkubasi dari virus ini relatif cepat yaitu 2 ï¿½ 4 hari.Saat virus calici ini sudah masuk ke dalam tubuh, maka selanjutnya virus ini akan memperbanyak diri (replikasi) pada sel epitel di saluran pernafasan, conjunctiva, lidah dan pnemuosit alveoli paru-paru.', 'Pencegahan terbaik untuk menghindari terjadinya infeksi virus ini adalah dengan melakukan vaksinasi secara rutin. Umumnya vaksin untuk virus calici ini tidak sendiri, melainkan vaksin gabungan dengan virus herpes.', 'Sejauh ini, belum ada obat virus calici pada kucing yang secara khusus ditujukan untuk menyembuhkannya, akan tetapi dapat melakukan perawatan di rumah selama sistem kekebalan tubuh kucing melawan infeksinya. Berikut adalah sejumlah cara mengobati virus calici pada kucing yang bisa dilakukan.\r\nï¿½	Membawa kucing ke dalam kamar mandi, lalu nyalakan keran air hangat selama 10-15 menit. Hal ini dilakukan untuk mengurangi penyumbatan hidung. Lakukan sebanyak dua kali dalam sehari.\r\nï¿½	Menyajikan berbagai makanan yang aromanya kuat untuk mengatasi nafsu makan kucing yang buruk selama terinfeksi calicivirus.\r\nï¿½	Gunakan kain yang dibasahi air hangat untuk membersihkan cairan atau kotoran dari mata dan hidung kucing.\r\nDalam beberapa kasus, dokter juga bisa meresepkan atau merekomendasikan obat-obatan berikut untuk meringankan gejala infeksi virus calici.\r\nï¿½	Obat pereda nyeri untuk meringankan rasa sakit akibat luka di mulut atau hidung.\r\nï¿½	Antibiotik oral untuk mengatasi infeksi sekunder di hidung, paru-paru, serta mulut.\r\nï¿½	Obat oles antibiotik untuk mata untuk mengatasi infeksi mata akibat virus calici.\r\nï¿½	Obat antiradang nonsteroid oral untuk mengurangi peradangan dan demam.\r\nï¿½	Cairan intravena atau subkutan jika kucing mengalami dehidrasi.\r\nSegera bawa kucing kesayanganmu ke dokter hewan apabila mereka menunjukkan berbagai gejala feline calcivirus. Dengan demikian, dokter bisa memberikan pengobatan terbaik untuk mengatasi infeksi akibat virus tersebut.'),
(1007, 'P07', 'Parvo', 'Feline Panleukopenia', 'img/diseases/diseases1696523090.jpg', 'Feline panleukopeniavirus (FP) menyerang saluran pencernaan, sistem imun, hingga sistem saraf kucing,Sama seperti Feline herpesvirus (FHV), FP juga merupakan penyakit virus yang sangat menular antar kucing. Kitten atau anak kucing dan kucing yang tidak divaksinasi paling berisiko terkena penyakit FP, meski tidak menutup kemungkinan virus ini menginfeksi kucing dari segala usia. Kitten atau anak kucing dan kucing yang tidak divaksinasi paling berisiko terkena penyakit FP, meski tidak menutup kemungkinan virus ini menginfeksi kucing dari segala usia. Virus ini menginfeksi dan membunuh sel-sel dengan sangat cepat, seperti sel di sumsum tulang, usus, dan janin yang sedang berkembang.\r\n', 'Pencegahan agar kucing tidak terserang Feline panleukopenia virus adalah dengan melakukan vaksinasi. Kucing dapat diberikan vaksinasi pertama kali pada usia 9 minggu. Desinfeksi lingkungan juga perlu dilakukan untuk menghindari kejadian berulang karena virus dapat bertahan di lingkungan hingga 1 tahun.', 'Panleukopenia adalah jenis penyakit yang tingkat kematiannya sangat tinggi di kalangan kucing yang mengidapnya. Langkah penanganan pertama dengan disuapi makanan dan cairan untuk mencegah dehidrasi. Itu paling penting untuk menunggu sampai bisa ke dokter hewan. Pastikan makanan yang diberikan adalah makanan khusus kucing, terutama yang sesuai usianya agar mudah dicerna.\r\nApabila mulai terlihat penurunan napsu makan, segera bawa ke dokter hewan untuk memastikan apakah ini karena penyakit lain atau panleukopenia. Gejala awal sudah menujukan penyakit panleukopenia maka langsung bawa ke dokter hewan, jangan tunggu parah, apabila ke dokter hewan, sebagian besar penanganan diberi obat-obatan lewat infus atau suntikan.'),
(1008, 'P08', 'Kutu Telinga', 'Ear Mite', 'img/diseases/diseases1696523110.jpg', 'Ear Mite adalah tungau telinga yang umum dialami kucing. Parasit ini menyukai kulit saluran kecil telinga kucing yang lembap dan hangat, bahkan menjalani sebagian besar siklus kehidupannya di sana.\r\n', 'Tungau dapat dicegah dengan perawatan anti-parasit yang tepat. Hal ini harus dibicarakan dengan dokter hewan tentang produk yang direkomendasikan dan apakah perawatan kutu kucing dapat mencegah tungau telinga. Hindari sembarangan membeli dan mengaplikasikan obat tetes telinga tanpa konsultasi dengan dokter hewan karena dapat memperparah keadaan.\r\nSangat penting untuk menjaga lingkungan dalam ruangan kucing agar selalu bersih. Terutama jika kucing peliharaan pernah dirawat karena masalah tungau juga sebelumnya. \r\nPerlu diwaspadai, kehadiran parasit lain memiliki dampak yang jauh lebih terlihat pada kucing adalah tungau penggali, yang memakan permukaan kulit. Tungau ini dapat menyebabkan kerontokan bulu yang parah pada kucing dan membutuhkan perawatan segera. \r\nTindakan terbaik yang harus dilakukan jika melihat adanya tanda iritasi kulit pada kucing peliharaan adalah menghubungi dokter hewan. Dokter hewan akan merekomendasikan produk perawatan hewan yang dijual bebas seperti sampo atau anti-parasit untuk menghilangkan tungau.\r\n', 'Jika kucing tampak kesakitan selama proses pembersihan, segera hentikan dan bawa kucing ke dokter hewan. Dokter mungkin memberikan obat suntik tambahan jika diperlukan. Obat tetes telinga yang efektif mengandung piretrin atau selamectin, yang berbentuk obat tetes. Meskipun obat tungau telinga kucing dapat dibeli secara bebas, tapi obat yang diresepkan dokter hewan umumnya lebih efektif.');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `typeOfRole` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `typeOfRole`) VALUES
(4001, 'admin'),
(4002, 'doctor'),
(4003, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `rulesId` int(11) NOT NULL,
  `idDisease` int(11) NOT NULL,
  `idSymptom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`rulesId`, `idDisease`, `idSymptom`) VALUES
(6001, 1001, 3001),
(6002, 1001, 3006),
(6003, 1001, 3010),
(6004, 1001, 3029),
(6007, 1003, 3003),
(6008, 1003, 3004),
(6009, 1003, 3005),
(6010, 1003, 3007),
(6011, 1003, 3018),
(6012, 1003, 3035),
(6013, 1002, 3003),
(6014, 1002, 3007),
(6015, 1002, 3015),
(6016, 1002, 3024),
(6017, 1002, 3026),
(6018, 1004, 3004),
(6019, 1004, 3005),
(6020, 1004, 3006),
(6021, 1004, 3008),
(6022, 1004, 3022),
(6023, 1005, 3008),
(6024, 1005, 3009),
(6025, 1005, 3012),
(6026, 1005, 3013),
(6027, 1005, 3014),
(6028, 1005, 3016),
(6029, 1005, 3017),
(6030, 1005, 3021),
(6031, 1005, 3030),
(6032, 1006, 3001),
(6033, 1006, 3008),
(6034, 1006, 3009),
(6035, 1006, 3025),
(6036, 1006, 3031),
(6037, 1007, 3001),
(6038, 1007, 3006),
(6039, 1007, 3008),
(6040, 1007, 3011),
(6041, 1007, 3034),
(6042, 1007, 3023),
(6043, 1008, 3012),
(6044, 1008, 3020),
(6045, 1008, 3027),
(6046, 1008, 3028),
(6047, 1008, 3033);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

CREATE TABLE `symptoms` (
  `idSymptom` int(11) NOT NULL,
  `codeOfSymptom` varchar(5) NOT NULL,
  `descOfSymptom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`idSymptom`, `codeOfSymptom`, `descOfSymptom`) VALUES
(3001, 'G01', 'Tidak mau makan'),
(3002, 'G02', 'Batuk'),
(3003, 'G03', 'Bulu rontok'),
(3004, 'G04', 'Dehidrasi'),
(3005, 'G05', 'Kurus'),
(3006, 'G06', 'Diare disertai darah'),
(3007, 'G07', 'Gatal-gatal'),
(3008, 'G08', 'Anemia (gusi putih)'),
(3009, 'G09', 'Keluar air liur'),
(3010, 'G10', 'Diare disertai cacing'),
(3011, 'G11', 'Demam'),
(3012, 'G12', 'Dipegang telinga kesakitan'),
(3013, 'G13', 'Flu'),
(3014, 'G14', 'Bersin-bersin'),
(3015, 'G15', 'Jaringan kulit rontok'),
(3016, 'G16', 'Bengkak mata'),
(3017, 'G17', 'Keluar air mata (epifora)'),
(3018, 'G18', 'Kemerahan pada kulit'),
(3019, 'G19', 'Kerusakan selaput lendir mata'),
(3020, 'G20', 'Berbau busuk pada telinga'),
(3021, 'G21', 'Leleran hidung keruh (kental seperti nanah)'),
(3022, 'G22', 'Lemah'),
(3023, 'G23', 'Lesu'),
(3024, 'G24', 'Luka keropeng'),
(3025, 'G25', 'Luka pada mulut'),
(3026, 'G26', 'Luka pada telinga'),
(3027, 'G27', 'Menggelengkan kepala'),
(3028, 'G28', 'Muntah'),
(3029, 'G29', 'Muntah diserta cacing'),
(3030, 'G30', 'Nafas lewat mulut'),
(3031, 'G31', 'Saluran nafas tertutup lendir (ingusan)'),
(3032, 'G32', 'Sesak nafas'),
(3033, 'G33', 'Telinga selalu kotor'),
(3034, 'G34', 'Bau mulut busuk'),
(3035, 'G35', 'Tidak tenang'),
(3043, 'G400', 'asd1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `username`, `email`, `password`, `roleId`) VALUES
(5001, 'Administrator', 'admin', 'admin@gmail.com', 'admin', 4001),
(5007, 'Padiansyah', 'padi', 'pakpadioye@gmail.com', 'asd', 4001),
(5013, 'Heru Gunawan, S.KH', 'herguns', 'heru@gmail.com', 'hers', 4002),
(5017, 'Hendra Wijaya', 'hendw', 'Hendraw@gmail.com', 'hendra', 4003),
(5018, 'Reynaldi Gustavo', 'deden', 'reynaldi@gmail.com', 'dens', 4001),
(5019, 'Wildan Friana, S.KH', 'emo', 'emo@ymail.com', 'yatim', 4002),
(5021, 'Rosidah Naetulah', 'rosi', 'rosi@ymail.com', 'ros123', 4003),
(5041, 'Mameng Galuh', 'mameng', 'mameng.galuh@gmail.com', 'mameng', 4003),
(5042, 'yuda', 'yuda', 'yuda@gmail.com', 'yuda', 4003);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`idDiagnose`),
  ADD KEY `id_disease` (`idDisease`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`idDisease`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`rulesId`),
  ADD KEY `id_disease` (`idDisease`),
  ADD KEY `idSymptom` (`idSymptom`);

--
-- Indexes for table `symptoms`
--
ALTER TABLE `symptoms`
  ADD PRIMARY KEY (`idSymptom`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `idDiagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2015;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `idDisease` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4004;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `rulesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6053;

--
-- AUTO_INCREMENT for table `symptoms`
--
ALTER TABLE `symptoms`
  MODIFY `idSymptom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3044;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5043;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD CONSTRAINT `diagnoses_ibfk_1` FOREIGN KEY (`idDisease`) REFERENCES `diseases` (`idDisease`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnoses_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `rules`
--
ALTER TABLE `rules`
  ADD CONSTRAINT `rules_ibfk_1` FOREIGN KEY (`idDisease`) REFERENCES `diseases` (`idDisease`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rules_ibfk_2` FOREIGN KEY (`idSymptom`) REFERENCES `symptoms` (`idSymptom`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `roles` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
