-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 16 nov. 2023 à 08:26
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `serie_net`
--

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `genre_name`) VALUES
(1, 'Action'),
(2, 'Thriller'),
(3, 'Drame'),
(4, 'Teen'),
(5, 'Espionnage'),
(6, 'Fantastique'),
(7, 'Surnaturel'),
(8, 'Science-fiction'),
(9, 'Comédie'),
(10, 'Crime'),
(11, 'Mystère'),
(12, 'Aventure'),
(13, 'Romance'),
(14, 'Comédie dramatique'),
(15, 'Horreur'),
(16, 'Musical'),
(17, 'Sport'),
(18, 'Animation'),
(19, 'Médical'),
(20, 'Historique');

-- --------------------------------------------------------

--
-- Structure de la table `historique_recherche`
--

DROP TABLE IF EXISTS `historique_recherche`;
CREATE TABLE IF NOT EXISTS `historique_recherche` (
  `id` int NOT NULL AUTO_INCREMENT,
  `profile_id` int NOT NULL,
  `terme_recherche` varchar(255) DEFAULT NULL,
  `date_recherche` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `utilisateur_id` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(20) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_profil`,`id_user`),
  KEY `profil_utilisateur_identifiant_fk` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `etoiles` decimal(3,1) NOT NULL,
  `synopsis` text,
  `poster` varchar(99) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`id`, `name`, `etoiles`, `synopsis`, `poster`) VALUES
(1, '24', '4.5', 'Jack Bauer, agent de la Cellule Anti-Terroriste de Los Angeles, est appelé à prendre des mesures draconiennes pour protéger sa patrie. La série suit en temps réel (chaque saison dure 24 heures, chaque épisode une heure) les journées de Jack Bauer, ses collègues, ses amis et ses ennemis, et les événements qui ponctuent leur existence mouvementée.', NULL),
(2, '90210', '3.5', 'Les Wilson, une famille de l\'Iowa, emménagent à Beverly Hills dans une luxueuse villa appartenant à la grand-mère des enfants, Tabitha. Le père, Harry, est le nouveau principal du lycée de Beverly Hills, le lycée West Beverly Hills. Ses deux enfants, Annie et Dixon, doivent alors quitter leur vie paisible pour s\'installer dans ce quartier huppé de Los Angeles. Ils vont alors découvrir un monde nouveau, où tous les coups sont permis, et où l\'argent et l\'apparence règnent en maîtres.', NULL),
(3, 'Alias', '4.0', 'Sydney Bristow est une jeune étudiante qui mène une double vie. Elle fait partie de la CIA, mais celle-ci lui fait croire qu\'elle travaille pour une agence gouvernementale qui lutte contre le terrorisme, la SD-6. Elle s\'aperçoit rapidement que la SD-6 n\'est pas ce qu\'elle prétend être. Elle se fait alors engager par la CIA pour détruire la SD-6 de l\'intérieur.', NULL),
(4, 'Angel', '4.0', 'Angel, un vampire âgé de plus de 240 ans, a connu une vie passée tourmentée. Se rendant compte que le mal qu\'il a fait était incommensurable, il décide de se racheter une conduite et de devenir un chasseur de démons, afin de lutter contre les forces du mal à Los Angeles. Pour mener à bien sa mission, il est aidé par Cordelia Chase, une ancienne connaissance, et Doyle, un demi-démon.', NULL),
(5, 'Battlestar Galactica', '4.5', 'La série raconte le périple du dernier groupe de survivants humains à la recherche d\'une planète mythique appelée la Terre. Ces derniers sont en effet pourchassés par leurs créations, les Cylons, des robots humanoïdes ayant pris l\'apparence des humains, et qui ont depuis évolué pour ressembler à leurs créateurs.', NULL),
(6, 'Better Off Ted', '4.0', 'Ted Crisp est le directeur de la recherche et développement chez Veridian Dynamics, une société qui fait des recherches dans tous les domaines, allant de la robotique à l\'armement en passant par l\'agriculture. Il est entouré de ses collègues, Veronica Palmer, sa supérieure, Phil Mymen, Lem Hewitt et Linda Zwordling.', NULL),
(7, 'Bionic Woman', '2.5', 'Jaime Sommers est une jeune femme qui mène une vie paisible jusqu\'au jour où un accident la laisse entre la vie et la mort. Pour la sauver, son petit ami, Will Anthros, la fait passer pour morte et la soumet à une opération bionique. Jaime devient alors une femme bionique, dotée de plusieurs capacités surhumaines. Elle est recrutée par l\'OSI, une agence gouvernementale secrète, pour laquelle elle travaille comme agent spécial.', NULL),
(8, 'Blade', '3.5', 'Blade est un être mi-homme mi-vampire qui lutte contre les vampires. Aidé de Whistler, son mentor, il tente de retrouver Deacon Frost, le vampire responsable de la mort de sa mère et de sa transformation en vampire.', NULL),
(9, 'Blood Ties', '3.0', 'Vicki Nelson est une ancienne policière devenue détective privée. Elle fait la connaissance d\'Henry Fitzroy, un vampire de 450 ans, qui l\'aide dans ses enquêtes. Ils sont aidés par Mike Celluci, un ancien partenaire de Vicki, qui est toujours amoureux d\'elle.', NULL),
(10, 'Bones', '4.0', 'Le Dr Temperance Brennan est une anthropologue hautement qualifiée qui travaille à l\'Institut Jeffersonian. En examinant les squelettes de personnes décédées, elle est capable d\'en reconstituer la vie et les circonstances de la mort. De telles capacités n\'échappent pas au FBI qui fait appel à ses services dans le cadre d\'affaires criminelles lorsque les méthodes traditionnelles d\'identification des corps ne donnent rien. Temperance travaille en collaboration avec l\'agent spécial Seeley Booth, ancien sniper de l\'armée qui se méfie de la science et des scientifiques.', NULL),
(11, 'Breaking Bad', '5.0', 'Walter White, 50 ans, est professeur de chimie dans un lycée du Nouveau-Mexique. Pour subvenir aux besoins de Skyler, sa femme enceinte, et de Walt Junior, son fils handicapé, il est obligé de travailler doublement. Son quotidien déjà morose devient carrément noir lorsqu\'il apprend qu\'il est atteint d\'un incurable cancer des poumons. Les médecins ne lui donnent pas plus de deux ans à vivre. Pour réunir rapidement beaucoup d\'argent afin de mettre sa famille à l\'abri, Walter ne voit plus qu\'une solution : mettre ses connaissances en chimie à profit pour fabriquer et vendre du crystal meth, une drogue de synthèse qui rapporte beaucoup. Il propose à Jesse, un de ses anciens élèves devenu un petit dealer de seconde zone, de faire équipe avec lui. Le duo improvisé met en place un labo itinérant dans un vieux camping-car. Cette association inattendue va les entraîner dans une série de péripéties tant comiques que pathétiques.', NULL),
(12, 'Buffy the Vampire Slayer', '4.5', 'Buffy Summers aspire à une vie simple et épanouie auprès de sa famille et de ses amis. Mais les démons qui rôdent à Sunnydale lui rappellent sans cesse qu\'elle doit faire face à ses responsabilités de Tueuse. Entre deux devoirs, elle doit mener une lutte sans fin contre les forces du mal : vampires, démons et forces souterraines en tout genre.', NULL),
(13, 'Burn Notice', '4.0', 'Michael Westen, un agent secret, est soudainement mis à pied. Il n\'a plus ni travail, ni revenu, ni accès à la liste des contacts de la CIA. Il se retrouve dans sa ville natale de Miami, en Floride, où il est surveillé par l\'agent qui l\'a fait sortir. Sans savoir pourquoi il a été mis à pied, Michael aide ceux qui ont des problèmes avec des criminels, des escrocs et des politiciens locaux. Tout en travaillant pour eux, il cherche à savoir pourquoi il a été mis à pied et par qui.', NULL),
(14, 'Californication', '3.5', 'Hank Moody est romancier et séparé de la mère de sa fille de 13 ans. Il est aussi accro aux femmes et aux drogues et ne peut s\'empêcher de dire la vérité, tout le temps et à tout le monde. Oui, Hank est auto-destructeur...', NULL),
(15, 'Caprica', '3.0', 'Caprica se déroule 58 ans avant la série Battlestar Galactica. La série raconte la création des premiers Cylons et la naissance de leur civilisation. Elle se concentre sur deux familles, les Graystone et les Adama, et leurs relations conflictuelles sur fond de science et de religion.', NULL),
(16, 'Charmed', '3.5', 'Les trois sœurs Halliwell découvrent qu\'elles descendent d\'une famille de sorcières et doivent apprendre à se servir de leurs pouvoirs magiques afin de lutter contre le Mal...', NULL),
(17, 'Chuck', '4.0', 'Chuck Bartowski, un as de l\'informatique chez BuyMore, n\'a plus toute sa tête. Mais c\'est une bonne nouvelle. En effet, depuis qu\'il a involontairement stocké dans son cerveau des informations secrètes du gouvernement, l\'action, l\'adrénaline ainsi qu\'une superbe petite amie agent secret ont fait irruption dans sa vie. Il se retrouve désormais dans la position du geek ultime : un héros capable de télécharger dans son cerveau la base de données secrètes du gouvernement...', NULL),
(18, 'Cold Case', '3.5', 'Lilly Rush est inspecteur à la brigade criminelle de Philadelphie. La jeune femme, forte et déterminée, n\'hésite pas à utiliser ses charmes pour obtenir des informations et faire avancer ses enquêtes. Elle a également un don pour comprendre les mobiles et les raisons qui poussent les criminels à agir. Elle enquête sur des affaires non résolues en faisant appel aux dernières avancées technologiques et scientifiques en matière d\'investigation.', NULL),
(19, 'Community', '4.0', 'Jeff est avocat. Mais Jeff doit surtout retourner à l\'université car son certificat a été invalidé. Entre les femmes au foyer fraîchement divorcées et ceux qui reprennent les études pour garder leur esprit actif, Jeff intègre une bande de joyeux drilles qui découvre les joies de la vie sur le campus. Ils en apprennent plus sur eux-mêmes que sur les cours qu\'ils suivent...', NULL),
(20, 'Criminal Minds', '4.0', 'L\'équipe des profilers étudie les comportements et les esprits torturés des criminels les plus dangereux du pays, afin d\'anticiper les crimes d\'un éventuel tueur. Chaque membre de cette unité d\'élite a sa personnalité, son histoire mais aussi sa spécialité. Ils sont tous dépendants les uns des autres et les résultats dépendent aussi de cette complémentarité.', NULL),
(21, 'Cupid', '3.5', 'Trevor Hale est un homme qui se dit être Cupidon. Il est envoyé sur Terre par Zeus pour réunir 100 couples. S\'il échoue, il sera condamné à rester sur Terre pour l\'éternité. Il est aidé dans sa tâche par Claire Allen, une psychologue qui pense que Trevor est fou.', NULL),
(22, 'Daybreak', '3.0', 'Le détective Brett Hopper est accusé du meurtre de l\'assistant du procureur Alberto Garza. Il se retrouve dans une situation inextricable : il est accusé d\'un meurtre qu\'il n\'a pas commis, il est poursuivi par des tueurs et il est coincé dans une boucle temporelle qui le ramène toujours au même moment de la journée, le moment du meurtre. Il va devoir trouver le moyen de prouver son innocence et de sortir de cette boucle temporelle.', NULL),
(23, 'Demons', '3.0', 'Luke Rutherford est un adolescent de 16 ans comme les autres, jusqu\'au jour où il découvre qu\'il est le descendant d\'un chasseur de démons. Il est alors recruté par Rupert Galvin, un homme mystérieux qui l\'aide à combattre les forces du mal. Il est aidé dans sa tâche par Ruby, une jeune femme qui a des pouvoirs magiques.', NULL),
(24, 'Desperate Housewives', '3.5', 'Wisteria Lane est un lieu paisible où les habitants semblent mener une vie heureuse... en apparence seulement ! Car en y regardant de plus près, on découvre bien vite, dans l\'intimité de chacun, que le bonheur n\'est pas toujours au rendez-vous. Et peu à peu, les secrets remontent inévitablement à la surface, risquant de faire voler en éclat le vernis lisse de leur tranquille existence...', NULL),
(25, 'Dexter', '4.5', 'Brillant expert scientifique du service médico-légal de la police de Miami, Dexter Morgan est spécialisé dans l\'analyse de prélèvements sanguins. Mais Dexter cache un terrible secret : c\'est également un tueur en série ! Un serial killer pas comme les autres, avec sa propre vision de la justice.', NULL),
(26, 'Dirt', '3.0', 'Lucy Spiller est la rédactrice en chef du magazine Dirt, un magazine à scandales. Elle est prête à tout pour obtenir des informations croustillantes sur les célébrités. Elle est aidée dans sa tâche par Don Konkey, son meilleur ami et photographe, et par Willa McPherson, une jeune journaliste.', NULL),
(27, 'Dirty Sexy Money', '3.0', 'Nick George, un avocat idéaliste, est engagé par Tripp Darling pour être l\'avocat de la famille Darling, l\'une des plus riches de New York. Il va alors découvrir que la vie de cette famille est remplie de scandales, de secrets et de trahisons.', NULL),
(28, 'Doctor Who', '4.0', 'Les aventures du Docteur, un extraterrestre, un Seigneur du Temps originaire de la planète Gallifrey, qui voyage à travers le temps et l\'espace à l\'aide d\'un vaisseau spatial, le TARDIS, qui, pour mieux s\'adapter à l\'environnement, a l\'apparence d\'une cabine téléphonique. Le Docteur voyage en compagnie d\'une jeune fille. Ensemble, ils font de nombreuses rencontres sur les diverses planètes qu\'ils explorent.', NULL),
(29, 'Dollhouse', '3.5', 'Echo est une doll (poupée en anglais). Elle fait partie d\'un groupe de personnes, les Actives, qui sont programmées pour accomplir différentes missions. Après chaque mission, leur mémoire est effacée, et elles retournent au sein de l\'organisation nommée Dollhouse. Là, elles sont soignées, reconditionnées et attendent la mission suivante...', NULL),
(30, 'Eleventh Hour', '3.5', 'Le docteur Jacob Hood est un brillant scientifique qui travaille pour le gouvernement américain. Il est chargé d\'enquêter sur des crimes qui semblent avoir été commis par des personnes ayant utilisé des technologies avancées.', NULL),
(31, 'Entourage', '4.0', 'Jeune et séduisant acteur, Vincent Chase rencontre très vite le succès et devient une star adulée à Hollywood. Soucieux de ne pas oublier ses origines, Vince s\'entoure de ses amis d\'enfance originaires comme lui du Queens, l\'un des quartiers pauvres de New York. Avec eux, il partage cette nouvelle aventure dans ce monde de strass et de paillettes.', NULL),
(32, 'Eureka', '4.0', 'Dans la petite ville d\'Eureka, la population locale cache un lourd secret : des scientifiques venus du monde entier y vivent en secret, travaillant sur des projets top-secret et des expériences qui dépassent l\'entendement. Mais un agent du gouvernement va venir troubler cette tranquillité.', NULL),
(33, 'Extras', '4.0', 'Andy Millman est un acteur raté qui ne décroche que des rôles de figurants. Il est entouré de Maggie Jacobs, son amie d\'enfance, et de Darren Lamb, son agent. Il va croiser la route de nombreuses célébrités qui vont lui donner des conseils pour réussir.', NULL),
(34, 'Fear Itself', '3.0', 'Chaque épisode est une histoire indépendante, avec de nouveaux personnages et une nouvelle intrigue. La série est basée sur les peurs et les phobies.', NULL),
(35, 'FlashForward', '3.5', 'Le 6 octobre 2009, à 11 h 00, la population mondiale est victime d\'un mal étrange : pendant 2 minutes et 17 secondes, chaque personne est confrontée à une vision du futur qui change à jamais sa vie... et son destin. Un agent du FBI, Mark Benford, essaye désespérément de comprendre ce qui a pu provoquer cet étrange phénomène, tandis que son coéquipier, Demetri Noh, lutte contre le temps pour empêcher un meurtre qui pourrait bien être lié à ce mystère. Au même moment, une jeune femme, Olivia Benford, chirurgien, découvre qu\'elle a un rôle à jouer dans tout cela. Et si ce phénomène n\'était pas uniquement le fait du hasard ?', NULL),
(36, 'Flashpoint', '3.5', 'Le SRU (Strategic Response Unit) est une force de police canadienne spécialisée dans les opérations paramilitaires. Ses membres sont entraînés pour intervenir dans des situations extrêmes comme les prises d\'otages, les désamorçages de bombes, les démantèlements de gangs, etc. Ils sont aussi formés pour négocier avec les preneurs d\'otages et les suspects. Ils sont souvent amenés à faire usage de leurs armes, mais uniquement en dernier recours.', NULL),
(37, 'Flight of the Conchords', '4.0', 'Les aventures de Bret et Jemaine, deux Néo-Zélandais, membres d\'un groupe de folk-rock, qui tentent de percer à New York.', NULL),
(38, 'Friday Night Lights', '4.0', 'Dans une petite ville du Texas où le football est roi, les états d\'âme des joueurs et de leur entourage sont mis en lumière.', NULL),
(39, 'Friends', '4.0', 'Les péripéties de 6 jeunes newyorkais liés par une profonde amitié. Entre amour, travail, famille, ils partagent leurs bonheurs et leurs soucis au Central Perk, leur café favori...', NULL),
(40, 'Fringe', '4.0', 'Olivia Dunham, agent du FBI, le Dr Walter Bishop, un génie extravaguant et son fils Peter enquêtent sur des phénomènes étranges. Leurs découvertes les amèneront à mener une lutte sans merci pour la sauvegarde de notre univers face à la menace d\'un univers parallèle.', NULL),
(41, 'Futurama', '4.0', 'En l\'an 3000, la Terre est ravagée par une guerre nucléaire. La pollution a rendu l\'air irrespirable et les humains se sont réfugiés dans des villes souterraines. Seul un robot, Bender, survit dans les décombres. Un jour, il rencontre Fry, un humain de l\'an 2000 qui a été accidentellement cryogénisé pendant mille ans. Ils deviennent amis et Fry rejoint l\'équipage de Planet Express, une entreprise de livraison spatiale. Il y rencontre Leela, une extraterrestre cyclope, et Farnsworth, le grand-père de Leela et le propriétaire de Planet Express. Ensemble, ils vont vivre de nombreuses aventures dans l\'espace.', NULL),
(42, 'Gary Unmarried', '3.0', 'Gary Brooks est un homme divorcé qui tente de rester ami avec sa femme Allison, avec qui il a eu deux enfants, Louise et Tom. Il est également entouré par son ami d\'enfance, Curtis, et par son frère, Mitch.', NULL),
(43, 'Ghost Whisperer', '3.0', 'Melinda Gordon a un don que sa grand-mère avant elle avait également : elle peut communiquer avec l\'esprit des morts. Elle a désormais aussi une mission : relayer les messages des disparus afin de soulager, voire de sauver, les vivants et permettre ainsi aux esprits libérés de passer de l\'autre côté... Elle est aidée dans sa tâche par son ami et associé Delia Banks, ainsi que par son époux Jim, qui accepte tant bien que mal que sa femme ait ce don un peu particulier.', NULL),
(44, 'Gossy Girl', '3.5', 'La vie de la jeunesse dorée des élèves de deux écoles privées new-yorkaises, vue à travers les yeux ironiques d\'une mystérieuse \"bloggeuse\" surnommée Gossip Girl. Entre amour et amitié, chacun tente de tirer son épingle du jeu, mais rien n\'est jamais simple derrière des apparences parfaites...', NULL),
(45, 'Greek', '3.5', 'Casey Cartwright est une étudiante brillante qui vient d\'être acceptée à la fac de son choix. Elle y rejoint sa soeur, Frannie, qui est membre de la sororité des Zeta Beta Zeta. Casey décide de ne pas suivre les traces de sa soeur et rejoint la sororité rivale, les Omega Chi Delta. Elle va alors découvrir un monde nouveau, où les fêtes et les fraternités sont les maîtres mots.', NULL),
(46, 'Grey\'s Anatomy', '3.5', 'Meredith Grey, fille d\'un chirurgien très réputé, commence son internat de première année en médecine chirurgicale dans un hôpital de Seattle. La jeune femme s\'efforce de maintenir de bonnes relations avec ses camarades internes, mais dans ce métier difficile la compétition fait rage.', NULL),
(47, 'Heroes', '4.0', 'Un groupe de personnes ordinaires découvre qu\'ils possèdent des pouvoirs extraordinaires. La vie de ces gens n\'en sera que plus étrange et excitante, mais aussi plus dangereuse. Ils vont être amenés à se croiser, se chercher et s\'affronter, sans connaître les répercussions de leurs actes...', NULL),
(48, 'House', '4.0', 'Le Dr Greg House est un médecin revêche qui ne fait confiance à personne, et encore moins à ses patients. Irrévérencieux et controversé, il n\'en serait que plus heureux s\'il pouvait ne pas adresser la parole à ses patients. Mais House est un brillant médecin. Et avec son équipe d\'experts, il est prêt à tout pour résoudre les cas médicaux les plus mystérieux et sauver des vies.', NULL),
(49, 'How I Met Your Mother', '4.0', 'Ted se remémore ses jeunes années, lorsqu\'il était encore célibataire. Il raconte à ses enfants avec nostalgie ses moments d\'égarements et de troubles, ses rencontres et ses recherches effrénées du Grand Amour et les facéties de sa bande d\'amis...', NULL),
(50, 'In Treatment', '4.0', 'Paul Weston est un psychothérapeute qui reçoit chaque semaine dans son cabinet un patient différent, pour une séance de 50 minutes. Il a également sa propre thérapeute, Gina, à qui il rend visite une fois par semaine, le vendredi en fin d\'après-midi.', NULL),
(51, 'Invasion', '3.0', 'Dans la petite ville d\'Homestead, en Floride, les habitants sont victimes d\'une étrange tempête qui va changer leur vie à jamais. Le shérif Tom Underlay est le premier à s\'apercevoir que quelque chose ne tourne pas rond. Il va alors enquêter sur ce phénomène et découvrir que des extraterrestres sont en train de prendre le contrôle de la ville.', NULL),
(52, 'Jake', '3.0', 'Jake Foley est un jeune technicien informatique qui travaille pour le gouvernement américain. Il est victime d\'un accident qui va changer sa vie à jamais. Il va alors développer des capacités physiques et mentales hors du commun. Il va être recruté par la NSA, qui va l\'aider à contrôler ses nouveaux pouvoirs.', NULL),
(53, 'Jekyll', '4.0', 'Tom Jackman est un homme ordinaire. Il a une femme aimante et deux enfants. Mais il a aussi un secret : il a une double personnalité. Il est également Mr Hyde, un homme violent et sans scrupules. Tom va alors faire appel à une psychologue, Katherine Reimer, pour l\'aider à contrôler ses pulsions.', NULL),
(54, 'Jericho', '3.5', 'Une petite ville américaine doit faire face à un accident nucléaire qui a détruit les États-Unis. Les habitants vont devoir apprendre à survivre dans un monde où les ressources sont limitées et où les menaces sont nombreuses.', NULL),
(55, 'John from Cincinnati', '3.0', 'John est un étranger qui arrive à Imperial Beach, une ville de Californie. Il va bouleverser la vie de la famille Yost, qui est composée de trois générations de surfeurs.', NULL),
(56, 'Journeyman', '3.5', 'Dan Vasser est un journaliste qui voyage dans le temps. Il se retrouve alors dans le passé, où il doit résoudre des problèmes qui ont des répercussions dans le présent.', NULL),
(57, 'Knight Rider', '2.5', 'Mike Traceur est le fils caché de Michael Knight, le pilote de K2000. Il est recruté par la Fondation Knight pour remplacer son père. Il est aidé dans sa tâche par Sarah Graiman, la fille de Charles Graiman, le créateur de K2000.', NULL),
(58, 'Kyle XY', '3.5', 'Un adolescent se réveille, nu et amnésique, dans une forêt de l\'État de Washington. Il s\'appelle Kyle. Il ne sait ni qui il est, ni d\'où il vient. À son poignet, un bracelet électronique lui permet de communiquer avec une mystérieuse entité. Il est recueilli par la famille Trager, qui décide de l\'héberger. Kyle va alors devoir s\'adapter à sa nouvelle vie.', NULL),
(59, 'Legend of the Seeker', '3.5', 'Les aventures de Richard Cypher, un jeune guide forestier, qui découvre qu\'il est investi d\'une noble et ancestrale destinée : celle de devenir un héros et un défenseur des terres inviolées contre l\'oppression et la tyrannie.', NULL),
(60, 'Leverage', '3.5', 'Nate Ford est un ancien enquêteur spécialisé dans les assurances. Il a perdu son fils durant une intervention en banlieue. Il décide alors de réunir une équipe de voleurs et d\'escrocs pour récupérer l\'argent qu\'il a perdu injustement. Il va alors devenir un justicier qui utilise ses talents pour aider les personnes qui sont victimes d\'abus de la part de riches hommes d\'affaires.', NULL),
(61, 'Lie to Me', '3.5', 'Le Dr Cal Lightman est un scientifique spécialisé dans la détection du mensonge. Qui que vous soyez, il sait si vous dites ou non la vérité...', NULL),
(62, 'Life', '3.5', 'Charlie Crews est un inspecteur de police qui a été emprisonné à tort pendant 12 ans pour un triple meurtre. Il a été innocenté par l\'ADN et il est libéré de prison. Il retourne alors à son travail et il est déterminé à découvrir qui l\'a piégé et pourquoi.', NULL),
(63, 'Lost', '4.5', 'Après le crash de leur avion sur une île perdue, les survivants doivent apprendre à cohabiter et survivre dans cet environnement hostile. Bien vite, ils se rendent compte qu\'une menace semble planer sur l\'île...', NULL),
(64, 'Madmen', '4.0', 'Dans le New York des années 60, Don Draper est l\'un des grands noms de la pub. Maître manipulateur, il compte dans son entourage des ennemis qui attendent sa chute.', NULL),
(65, 'Masters of Sci-Fi', '3.0', 'Chaque épisode est une histoire indépendante, avec de nouveaux personnages et une nouvelle intrigue. La série est basée sur des nouvelles de science-fiction.', NULL),
(66, 'Medium', '3.5', 'Allison Dubois est médium. Elle peut voir et entendre les morts. Elle peut également voir le futur et communiquer avec les défunts. Elle met ses dons au service de la justice et aide la police à résoudre des crimes.', NULL),
(67, 'Melrose Place', '3.0', 'La vie de jeunes adultes, qui vivent dans un immeuble de Melrose Place, un quartier de Los Angeles.', NULL),
(68, 'Mental', '3.0', 'Jack Gallagher est un psychiatre qui travaille dans un hôpital de Los Angeles. Il est spécialisé dans les maladies mentales. Il est aidé dans sa tâche par Nora Skoff, une psychiatre qui est également son ex-femme.', NULL),
(69, 'Merlin', '3.5', 'Merlin, un jeune homme à la découverte de ses pouvoirs magiques, arrive à Camelot où il va vivre auprès du prince Arthur, dont il va devenir le plus proche ami. Il va découvrir que sa destinée est étroitement liée à celle du royaume.', NULL),
(70, 'Moonlight', '3.5', 'Mick St. John est un vampire qui vit à Los Angeles. Il possède un don exceptionnel : il est capable de lire les pensées des gens. Il utilise ses pouvoirs pour aider les personnes qui ont besoin de lui. Il est aidé dans sa tâche par son ami Josef Kostan, un autre vampire.', NULL),
(71, 'My Name Is Earl', '3.5', 'Earl Hickey est un petit escroc minable qui vit de menus larcins et d\'arnaques en tout genre. Un jour, il gagne 100 000 dollars à un jeu de grattage. Mais, au même moment, il se fait renverser par une voiture. Alors qu\'il est à l\'hôpital, il découvre la série \"Last Call with Carson Daly\". Dans cette émission, Carson Daly parle du karma et de la loi du retour. Earl décide alors de réparer ses erreurs passées et de faire le bien autour de lui.', NULL),
(72, 'NCIS', '3.5', 'À la tête de cette équipe du NCIS, qui opère en dehors de la chaîne de commandement militaire, l\'agent Special Leroy Jethro Gibbs, un enquêteur qualifié dont les qualités sont d\'être intelligent, solide et prêt à contourner les règles pour faire le travail. Travaillant sous les ordres de Gibbs, on retrouve l\'agent Anthony DiNozzo, l\'agent Abby Sciuto et le Dr Donald \"Ducky\" Mallard.', NULL),
(73, 'NCIS: Los Angeles', '3.5', 'Les enquêtes de l\'équipe du NCIS de Los Angeles spécialisée dans les missions d\'infiltration...', NULL),
(74, 'Nip/Tuck', '3.5', 'Sean McNamara et Christian Troy sont deux chirurgiens esthétiques âgés d\'une quarantaine d\'années. Amis de longue date, ils possèdent une clinique privée à Miami dans laquelle ils reçoivent bon nombre de patients, qu\'ils soient issus de la jet-set ou non. Sean est un homme rangé, marié depuis de nombreuses années avec Julia, qui est également chirurgien esthétique. Ils ont deux enfants, Matt et Annie. Christian, quant à lui, est un célibataire endurci, qui enchaîne les conquêtes féminines. Il est également le père d\'un petit Wilber, né d\'une aventure d\'un soir avec Gina, une femme qui travaille dans leur clinique. Sean et Christian sont également associés avec une autre chirurgienne, Liz Cruz, qui est une ancienne alcoolique. Ils sont également aidés par Julia, qui est également chirurgienne esthétique, et par Matt, leur fils, qui est stagiaire dans la clinique.', NULL),
(75, 'One Tree Hill', '3.5', 'Lucas et Nathan, deux demi-frères que tout sépare, se retrouvent rivaux non seulement sur le terrain de leur équipe de basket mais aussi dans le coeur d\'une fille. Ils ne le savent pas encore, mais cette rencontre changera leur vie...', NULL),
(76, 'Oz', '3.5', 'Oz est la prison expérimentale de haute sécurité pour hommes d\'Oswald. Emerald City est le surnom de la cellule expérimentale de haute technologie de la prison. Les émeutes et les meurtres sont devenus monnaie courante dans cette prison. Pour faire face à cette situation, le directeur de la prison, Tim McManus, a créé un quartier expérimental, Emerald City, où les prisonniers ont plus de liberté et de responsabilités. Les détenus sont répartis en différents groupes, les Aryens, les musulmans, les latinos, les chrétiens, les italiens, les irlandais, les homosexuels...', NULL),
(77, 'Painkiller Jane', '2.5', 'Jane Vasco est une agent de la DEA qui a la capacité de se régénérer rapidement. Elle est recrutée par une organisation secrète qui lutte contre les menaces paranormales. Elle va alors devoir utiliser ses pouvoirs pour combattre les criminels.', NULL),
(78, 'Primeval', '3.5', 'Nick Cutter et son équipe doivent faire face à des créatures préhistoriques qui ont traversé les anomalies temporelles et qui se retrouvent dans notre époque.', NULL),
(79, 'Prison Break', '4.0', 'Michael Scofield s\'engage dans une véritable lutte contre la montre : son frère Lincoln est dans le couloir de la mort, en attente de son exécution. Persuadé de son innocence mais à court de solutions, Michael décide de se faire incarcérer à son tour dans le pénitencier d\'état de Fox River pour organiser leur évasion...', NULL),
(80, 'Private Practice', '3.5', 'Le Dr Addison Montgomery quitte Seattle Grace pour Los Angeles afin de rejoindre une clinique privée nommée Oceanside Wellness Group. Elle y retrouve d\'anciens amis et collègues de Seattle, mais aussi son ex-mari, le Dr Derek Shepherd, qui est venu lui demander de revenir à Seattle Grace. Addison va alors devoir faire un choix entre sa vie professionnelle et sa vie personnelle.', NULL),
(81, 'Psych', '3.5', 'Shawn Spencer a toujours eu un don pour remarquer les détails les plus insignifiants. C\'est grâce à ce talent qu\'il a réussi à convaincre la police qu\'il possédait des pouvoirs psychiques. Mais lorsqu\'il révèle qu\'il utilise ce don pour résoudre des crimes, il devient alors un consultant très convoité par le chef de la police.', NULL),
(82, 'Pushing Daisies', '4.0', 'Ned possède un don unique. Il peut, grâce à un simple contact, ramener les morts à la vie. Il en a fait l\'expérience avec son chien Digby, mort écrasé par un camion. Mais lorsqu\'il ramène à la vie son amour d\'enfance, Chuck, il déclenche une série d\'événements qui vont avoir des conséquences désastreuses.', NULL),
(83, 'Raines', '3.0', 'Michael Raines est un détective de la police de Los Angeles. Il est aidé dans ses enquêtes par des fantômes qui lui donnent des indices.', NULL),
(84, 'Reaper', '3.5', 'Sam Oliver est un jeune homme qui vit une vie tranquille avec ses amis et sa petite amie. Mais le jour de son 21e anniversaire, ses parents lui révèlent qu\'ils ont vendu son âme au diable avant sa naissance. Sam doit alors devenir un chasseur d\'âmes pour le diable.', NULL),
(85, 'Robin Hood', '3.5', 'Robin de Locksley rentre chez lui après avoir passé cinq ans en croisade. Il découvre que son domaine est en ruines et que son père a été assassiné. Il décide alors de se venger et de rétablir la justice en combattant les injustices et la corruption qui règnent dans le comté de Nottingham.', NULL),
(86, 'Rome', '4.0', 'En 52 avant Jésus-Christ, Jules César achève la conquête de la Gaule et prépare son retour à Rome. Il est accompagné de son armée et de ses fidèles soldats, Titus Pullo et Lucius Vorenus. Mais la mort de Pompée va changer la donne. César devient le maître de Rome et il est nommé dictateur à vie. Il va alors devoir faire face à de nombreux complots et trahisons.', NULL),
(87, 'Samantha Who?', '3.5', 'Samantha Newly est une jeune femme qui a perdu la mémoire à la suite d\'un accident de la route. Elle va alors découvrir qu\'elle était une femme égoïste et sans scrupules. Elle va alors essayer de changer et de devenir une meilleure personne.', NULL),
(88, 'Sanctuary', '3.0', 'Le Dr Helen Magnus dirige une équipe qui a pour mission de protéger les créatures qui vivent dans la clandestinité. Elle recueille ces créatures dans un sanctuaire situé à Londres.', NULL),
(89, 'Scrubs', '4.0', 'J.D. est un jeune médecin qui débute sa carrière dans l\'hôpital du Sacré-Coeur. Il va découvrir que la vie n\'est pas facile tous les jours, surtout quand on est entouré d\'infirmières peu compréhensives, de médecins imbus de leur personne et de patients plus fous les uns que les autres.', NULL),
(90, 'Sex and the City', '3.5', 'Quatre amies trentenaires vivent à New York et partagent leurs expériences et leurs vies amoureuses ou professionnelles.', NULL),
(91, 'Six Feet Under', '4.0', 'La famille Fisher tient une entreprise de pompes funèbres à Los Angeles. La mort fait partie de leur quotidien. Les membres de cette famille vont devoir apprendre à vivre avec leurs peurs et leurs névroses.', NULL),
(92, 'Skins', '3.5', 'Tony est un jeune homme de 17 ans qui est très populaire auprès de ses amis. Il est entouré par sa petite amie Michelle, sa meilleure amie Sid, son ami Anwar, son amie Jal, son ami Chris et sa petite amie Jal. Mais sa vie va être bouleversée par un accident qui va le plonger dans le coma. Ses amis vont alors devoir apprendre à vivre sans lui.', NULL),
(93, 'Smallville', '3.5', 'Dans une petite bourgade qui a connu une pluie de météorites quelques années plus tôt, le jeune Clark Kent est élevé par une famille de fermiers. Contraint de cacher ses pouvoirs exceptionnels, il va apprendre à les utiliser pour aller au secours de son prochain.', NULL),
(94, 'Sons of Anarchy', '4.0', 'L\'action se déroule à Charming, ville fictive du comté de San Joaquin en Californie. Une lutte de territoires entre dealers et trafiquants d\'armes vient perturber les affaires d\'un club de bikers (Motorcycle Club, ou MC en anglais). Ce club, nommé , Sons of Anarchy Motorcycle Club Redwood Original, couramment abrégé en SAMCRO, fait régner l\'ordre dans Charming. Clay Morrow, président de SAMCRO et patron du garage Teller-Morrow, ainsi que Jax Teller, vice-président, mènent le club. Leurs relations sont cependant mises à l\'épreuve lorsque Jax, jeune père célibataire en quête de rédemption, et son beau-père Clay, dont l\'ambition démesurée pour le club commence à dépasser les limites, se retrouvent face à face.', NULL),
(95, 'South Park', '4.0', 'La petite ville de South Park dans le Colorado est le théâtre des aventures de Cartman, Stan, Kyle et Kenny, quatre enfants qui ont un langage un peu... décalé', NULL),
(96, 'Spaced', '4.0', 'Tim Bisley et Daisy Steiner sont deux jeunes londoniens qui se rencontrent dans un café alors qu\'ils sont à la recherche d\'un appartement. Ils décident alors de se faire passer pour un couple afin de pouvoir louer un appartement. Ils vont alors devoir apprendre à vivre ensemble.', NULL),
(97, 'Stargate Atlantis', '3.5', 'Une équipe d\'explorateurs, qui regroupe des scientifiques et des militaires, voyage à bord d\'un vaisseau spatial, l\'USS Atlantis, à la découverte de mondes inconnus.', NULL),
(98, 'Stargate SG-1', '3.5', 'Une équipe d\'explorateurs, qui regroupe des scientifiques et des militaires, voyage à bord d\'un vaisseau spatial, l\'USS SG-1, à la découverte de mondes inconnus.', NULL),
(99, 'Stargate Universe', '3.5', 'Une équipe d\'explorateurs, qui regroupe des scientifiques et des militaires, voyage à bord d\'un vaisseau spatial, l\'USS Destiny, à la découverte de mondes inconnus.', NULL),
(100, 'Supernatural', '4.0', 'Deux frères parcourent les États-Unis pour traquer les forces du Mal. Ils espèrent par la même occasion mettre la main sur le démon responsable de la mort de leur mère, vingt ans plus tôt.', NULL),
(101, 'Swingtown', '3.0', 'Susan et Bruce Miller emménagent dans une nouvelle maison avec leurs deux enfants. Ils vont alors découvrir que leurs voisins ont un mode de vie très différent du leur. Ils vont alors devoir faire face à leurs propres désirs et à leurs propres fantasmes.', NULL),
(102, 'The 4400', '3.5', 'Le 3 juillet 1946, 4400 personnes ont été enlevées par des extraterrestres. Ces personnes réapparaissent un jour toutes ensemble dans un parc. Elles ne semblent pas avoir vieilli et ne se souviennent pas de ce qui leur est arrivé. Le gouvernement décide de les placer dans un centre afin de les étudier. Mais, au fur et à mesure, ils vont découvrir que ces personnes ont développé des capacités extraordinaires.', NULL),
(103, 'The Big Bang Theory', '4.0', 'Leonard et Sheldon pourraient vous dire tout ce que vous voudriez savoir à propos de la physique quantique. Mais ils seraient bien incapables de vous expliquer quoi que ce soit sur la vie \"réelle\", le quotidien ou les relations humaines... Mais tout va changer avec l\'arrivée de la superbe Penny, leur voisine.', NULL),
(104, 'The Black Donnellys', '3.5', 'Quatre frères irlandais et leur famille vivent dans le quartier de Hell\'s Kitchen à New York. Ils sont prêts à tout pour protéger leur famille et leur quartier.', NULL),
(105, 'The Kill Point', '3.0', 'Un groupe de vétérans de la guerre en Irak décide de braquer une banque. Mais, ils vont se retrouver pris au piège dans la banque avec des otages. Ils vont alors devoir faire face à la police et au FBI.', NULL),
(106, 'The Lost Room', '3.5', 'Joe Miller est un policier qui enquête sur la disparition de sa fille. Il découvre alors l\'existence d\'une chambre d\'hôtel qui est un portail vers un autre monde. Il va alors devoir faire face à des personnes qui veulent s\'emparer de cette chambre.', NULL),
(107, 'The Mentalist', '3.5', 'Patrick Jane est un mentaliste qui travaille pour le California Bureau of Investigation (CBI). Grâce à ses dons d\'observation, il va aider la police à résoudre des crimes.', NULL),
(108, 'The Nine', '3.0', 'Neuf personnes sont prises en otage dans une banque. Elles vont rester ensemble pendant 52 heures. Mais, après leur libération, elles vont devoir faire face aux conséquences de cette prise d\'otages.', NULL),
(109, 'The O.C.', '3.5', 'Ryan Atwood est un adolescent de 16 ans qui vit dans un quartier pauvre de Chino à Los Angeles. Il est arrêté alors qu\'il tentait de voler une voiture. Il est alors placé dans un centre de détention pour mineurs. Sandy Cohen, un avocat qui habite à Newport Beach, décide de le sortir de là. Il l\'héberge alors chez lui. Ryan va alors découvrir le monde de la haute société de Newport Beach.', NULL),
(110, 'The Pretender', '3.5', 'Jarod est un génie qui a été enlevé quand il était enfant. Il a été élevé dans un centre de recherches appelé Le Centre. Il a la capacité de devenir n\'importe qui et de résoudre n\'importe quel problème. Mais, un jour, il décide de s\'enfuir. Il va alors utiliser ses capacités pour aider les personnes qui ont besoin de lui.', NULL),
(111, 'The Riches', '3.0', 'Wayne et Dahlia Malloy sont des escrocs qui vivent dans une caravane avec leurs trois enfants. Ils décident de voler l\'identité d\'un couple de riches qui est mort dans un accident de voiture. Ils vont alors devoir s\'adapter à leur nouvelle vie.', NULL),
(112, 'The Sarah Connor Chronicles', '3.5', 'Sarah Connor est une mère célibataire qui élève son fils John. Elle va devoir faire face à un agent du FBI, James Ellison, qui est persuadé que John est un dangereux criminel. Mais, elle va également devoir protéger son fils qui est destiné à devenir le leader de la résistance humaine contre les machines.', NULL),
(113, 'The Shield', '4.0', 'Vic Mackey est un policier qui dirige une unité spéciale, la Strike Team, qui lutte contre les gangs de Los Angeles. Mais, il est prêt à tout pour arriver à ses fins, même à utiliser des méthodes peu orthodoxes.', NULL),
(114, 'The Sopranos', '4.0', 'Tony Soprano est un chef de la mafia qui est suivi par une psychiatre, le Dr Jennifer Melfi. Il va alors lui raconter sa vie de criminel et sa vie de famille.', NULL),
(115, 'The Tudors', '3.5', 'La vie du jeune Henry VIII, ses amours, ses intrigues et ses relations avec les puissances étrangères, le tout dans l\'Angleterre du XVIème siècle.', NULL),
(116, 'The Vampire Diaries', '3.5', 'Quatre mois après le tragique accident de voiture qui a tué leurs parents, Elena Gilbert, 17 ans, et son frère Jeremy, 15 ans, essaient encore de s\'adapter à cette nouvelle réalité. Belle et populaire, l\'adolescente poursuit ses études au Mystic Falls High en s\'efforçant de masquer son chagrin. Elena est immédiatement fascinée par Stefan et Damon Salvatore, deux frères que tout oppose. Elle ne tarde pas à découvrir qu\'ils sont en fait des vampires...', NULL),
(117, 'The Wire', '4.0', 'Baltimore, dans le Maryland, est une ville rongée par le crime, les règlements de compte, la drogue et la corruption. Une unité spéciale de la police tente de réduire le taux de criminalité.', NULL),
(118, 'Torchwood', '3.5', 'Le capitaine Jack Harkness est un ancien agent du 51e siècle qui voyage à travers le temps et l\'espace à bord de son vaisseau, le TARDIS. Il est à la tête d\'une organisation secrète, Torchwood, qui lutte contre les aliens qui menacent la Terre.', NULL),
(119, 'Traveler', '3.0', 'Jay Burchell et Tyler Fog sont deux étudiants qui partent en voyage à New York. Mais, ils sont accusés d\'avoir fait exploser un musée. Ils vont alors devoir prouver leur innocence et découvrir qui les a piégés.', NULL),
(120, 'Trucalling', '3.0', 'Tru Davies est une jeune étudiante en médecine qui travaille à mi-temps dans une morgue. Elle va découvrir qu\'elle a le pouvoir de revenir un jour en arrière pour sauver des personnes qui sont mortes.', NULL),
(121, 'TrueBlood', '3.5', 'Ayant trouvé un substitut pour se nourrir sans tuer (du sang synthétique), les vampires vivent désormais parmi les humains. Sookie, une serveuse capable de lire dans les esprits, tombe sous le charme de Bill, un mystérieux vampire. Une rencontre qui bouleverse la vie de la jeune femme...', NULL),
(122, 'Ugly Betty', '3.5', 'Betty Suarez n\'est pas spécialement belle, mais elle est douce, intelligente et travaille dur. Dans un monde régi par les apparences, ses qualités sont invisibles. Pourtant, le Président de Meade Publications l\'engage pour devenir l\'assistante de son fils, Daniel, récemment promu à la tête d\'un prestigieux magazine de mode. Il espère ainsi obliger son futur successeur à s\'intéresser davantage à son travail plutôt qu\'à la gent féminine. Si au début leur association est explosive, ils vont bientôt devenir une paire redoutable... ', NULL),
(123, 'V', '3.5', 'Des extraterrestres, qui ressemblent à des humains, arrivent sur Terre. Ils prétendent être venus en paix, mais ils ont en réalité des intentions bien différentes.', NULL),
(124, 'Veronica Mars', '4.0', 'Veronica Mars est une lycéenne de 17 ans qui habite à Neptune, une ville californienne qui a été frappée par un tragique événement. En effet, la meilleure amie de Veronica, Lilly Kane, a été assassinée. Son père, Keith Mars, qui était le shérif de la ville, a accusé Jake Kane, le père de Lilly, d\'être le meurtrier. Mais, il a été destitué de ses fonctions. Veronica va alors devoir faire face à la disparition de sa mère et à la trahison de ses amis.', NULL),
(125, 'Weeds', '3.5', 'Nancy Botwin est une mère célibataire qui vend de la marijuana. Elle va devoir faire face à la mort de son mari et à la découverte de son activité par son voisinage.', NULL),
(126, 'Whitechapel', '3.0', 'L\'inspecteur Joseph Chandler est un policier qui a une méthode peu orthodoxe. Il est chargé de résoudre une série de meurtres qui ont eu lieu dans le quartier de Whitechapel à Londres. Il va alors faire équipe avec Edward Buchan, un historien qui est spécialisé dans les crimes du XIXe siècle.', NULL),
(127, 'Women\'s Murder Club', '2.5', 'Autour de l\'inspecteur Lindsay Boxer, se crée une équipe de femmes, un club, réunissant une journaliste, un médecin légiste, une officier de police et une assistante du procureur, afin de résoudre les différents crimes commis dans la ville de San Francisco.', NULL),
(128, 'xfiles', '4.3', 'Deux agents du FBI sont chargés d\'enquêter sur les dossiers non résolus, appelés \"X-files\" la plupart du temps des affaires où le paranormal entre en jeu. L\'agent Fox Mulder, malgré le scepticisme de sa co-équipière Dana Scully, tente de prouver sa thèse du complot gouvernement/extra-terrestres...', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `serie_favori`
--

DROP TABLE IF EXISTS `serie_favori`;
CREATE TABLE IF NOT EXISTS `serie_favori` (
  `id_profil` int NOT NULL,
  `id_serie` int NOT NULL,
  PRIMARY KEY (`id_profil`,`id_serie`),
  KEY `id_serie` (`id_serie`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `serie_genre`
--

DROP TABLE IF EXISTS `serie_genre`;
CREATE TABLE IF NOT EXISTS `serie_genre` (
  `serie_id` int NOT NULL,
  `genre_id` int NOT NULL,
  PRIMARY KEY (`serie_id`,`genre_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `serie_genre`
--

INSERT INTO `serie_genre` (`serie_id`, `genre_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 3),
(3, 5),
(4, 3),
(4, 6),
(4, 7),
(5, 1),
(5, 3),
(5, 8),
(6, 8),
(6, 9),
(7, 1),
(7, 3),
(7, 8),
(8, 1),
(8, 6),
(9, 3),
(9, 6),
(9, 7),
(10, 3),
(10, 10),
(10, 11),
(11, 2),
(11, 3),
(11, 10),
(12, 1),
(12, 3),
(12, 6),
(13, 1),
(13, 2),
(13, 12),
(14, 3),
(14, 9),
(15, 3),
(15, 8),
(16, 3),
(16, 6),
(17, 1),
(17, 9),
(17, 12),
(18, 3),
(18, 10),
(18, 11),
(19, 9),
(20, 2),
(20, 3),
(20, 10),
(21, 3),
(21, 9),
(21, 13),
(22, 3),
(22, 6),
(22, 8),
(23, 3),
(23, 6),
(23, 7),
(24, 11),
(24, 14),
(25, 2),
(25, 3),
(25, 10),
(26, 3),
(27, 3),
(28, 3),
(28, 8),
(28, 12),
(29, 3),
(29, 8),
(30, 3),
(30, 8),
(30, 10),
(31, 3),
(31, 9),
(32, 3),
(32, 8),
(32, 9),
(33, 3),
(33, 9),
(34, 2),
(34, 3),
(34, 15),
(35, 3),
(35, 8),
(36, 1),
(36, 3),
(36, 10),
(37, 9),
(37, 16),
(38, 3),
(38, 17),
(39, 9),
(39, 13),
(40, 3),
(40, 8),
(41, 8),
(41, 9),
(41, 18),
(42, 9),
(43, 3),
(43, 6),
(44, 3),
(44, 13),
(45, 3),
(45, 9),
(46, 14),
(46, 19),
(47, 3),
(47, 8),
(48, 14),
(48, 19),
(49, 9),
(49, 13),
(50, 3),
(51, 3),
(51, 8),
(52, 3),
(52, 6),
(52, 8),
(53, 3),
(53, 6),
(53, 7),
(54, 3),
(54, 8),
(55, 3),
(55, 8),
(56, 3),
(56, 8),
(57, 1),
(57, 8),
(57, 12),
(58, 3),
(58, 8),
(59, 1),
(59, 3),
(59, 12),
(60, 1),
(60, 3),
(60, 10),
(61, 2),
(61, 3),
(61, 10),
(62, 3),
(62, 10),
(63, 3),
(63, 6),
(63, 12),
(64, 3),
(65, 3),
(65, 8),
(66, 3),
(66, 6),
(66, 10),
(67, 3),
(68, 3),
(69, 3),
(69, 6),
(69, 12),
(70, 3),
(70, 6),
(70, 7),
(71, 9),
(72, 3),
(72, 10),
(72, 11),
(73, 3),
(73, 10),
(73, 11),
(74, 3),
(75, 3),
(75, 13),
(76, 3),
(76, 10),
(77, 1),
(77, 3),
(77, 8),
(78, 1),
(78, 3),
(78, 12),
(79, 1),
(79, 3),
(79, 10),
(80, 14),
(80, 19),
(81, 9),
(81, 10),
(81, 11),
(82, 3),
(82, 6),
(82, 9),
(83, 3),
(83, 10),
(83, 11),
(84, 3),
(84, 6),
(84, 9),
(85, 1),
(85, 3),
(85, 12),
(86, 1),
(86, 3),
(86, 20),
(87, 9),
(87, 13),
(88, 3),
(88, 6),
(88, 8),
(89, 9),
(89, 19),
(90, 13),
(90, 14),
(91, 14),
(92, 3),
(93, 3),
(93, 8),
(93, 12),
(94, 3),
(94, 10),
(95, 9),
(95, 18),
(96, 9),
(97, 1),
(97, 8),
(97, 12),
(98, 1),
(98, 8),
(98, 12),
(99, 1),
(99, 8),
(99, 12),
(100, 3),
(100, 6),
(100, 15),
(101, 3),
(102, 3),
(102, 8),
(103, 9),
(104, 3),
(104, 10),
(105, 1),
(105, 3),
(105, 10),
(106, 3),
(106, 6),
(106, 8),
(107, 3),
(107, 10),
(107, 11),
(108, 2),
(108, 3),
(109, 3),
(109, 13),
(110, 3),
(110, 8),
(111, 3),
(112, 1),
(112, 3),
(112, 8),
(113, 2),
(113, 3),
(113, 10),
(114, 3),
(114, 10),
(115, 3),
(115, 20),
(116, 3),
(116, 6),
(116, 15),
(117, 2),
(117, 3),
(117, 10),
(118, 1),
(118, 3),
(118, 8),
(119, 1),
(119, 2),
(119, 3),
(120, 2),
(120, 3),
(120, 6),
(121, 3),
(121, 6),
(121, 15),
(122, 14),
(123, 3),
(123, 8),
(124, 3),
(124, 10),
(124, 11),
(125, 3),
(125, 9),
(125, 10),
(126, 3),
(126, 10),
(126, 11),
(127, 2),
(127, 3),
(128, 3),
(128, 7),
(128, 9),
(128, 15);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `identifiant` varchar(20) NOT NULL,
  `mot_de_passe` varchar(999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`identifiant`, `mot_de_passe`) VALUES
('julien_broisin', 'b38bb9429239744b50dfc9ef13d1a96b1985eb2b1afc9d056d3650b97c015cb7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
