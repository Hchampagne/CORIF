-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mer. 18 mars 2020 à 16:08
-- Version du serveur :  10.1.41-MariaDB-0+deb9u1
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `corif`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `adh_id` int(3) NOT NULL COMMENT 'index adherent',
  `adh_nom` varchar(50) NOT NULL COMMENT 'nom adhérent/admin',
  `adh_prenom` varchar(50) NOT NULL COMMENT 'prenom adhérent/admin',
  `adh_email` varchar(150) NOT NULL COMMENT 'email adhérent/admin',
  `adh_organisme` varchar(50) NOT NULL COMMENT 'oragnisme adhérent/admin',
  `adh_role` varchar(15) NOT NULL DEFAULT 'formateur' COMMENT 'role adhérent/admin',
  `adh_login` varchar(100) NOT NULL COMMENT 'login adh"rent/admin',
  `adh_mdp` varchar(60) NOT NULL COMMENT 'mot de passe adhérent/admin',
  `adh_validation` int(2) NOT NULL DEFAULT '0' COMMENT 'validation 0=non 1=oui',
  `adh_d_inscription` date DEFAULT NULL COMMENT 'date inscription adhérent/admin',
  `adh_d_connexion` datetime DEFAULT NULL COMMENT 'dernière connexion adh/admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`adh_id`, `adh_nom`, `adh_prenom`, `adh_email`, `adh_organisme`, `adh_role`, `adh_login`, `adh_mdp`, `adh_validation`, `adh_d_inscription`, `adh_d_connexion`) VALUES
(2, 'Delicque', 'Jeremy', 'Jeremy@delicque.fr', 'Afpa', 'administrateur', 'jdelicque', '$2y$10$AiVPNjz2GX9HhXQviC5YyONerxtajJ4gKTQb1N4eWcwZZOIzT/0Ie', 1, NULL, NULL),
(3, 'Champagne', 'Hervé', 'hch1@gmail.com', 'AFPA', 'administrateur', 'hch', '$2y$10$T7xJnooMadHxCN7xMPNAO.fBX7S2viy07ooWO3cZNlxgddcvJpH.y', 1, '2020-01-14', '2020-03-18 15:07:35'),
(16, 'Champagne', 'Antoine', 'ach@gmail.com', 'Afpa', 'formateur', 'ach', '$2y$10$VZxa/uauvqbEitSiJYp9ZeqvyujjWLn3eFF3jWgE9Yshhuta9DyUe', 1, '2020-01-28', NULL),
(17, 'Champagne', 'Mathilde', 'mch@gmail.com', 'UPJV', 'formateur', 'mch', '$2y$10$DE4HUm05wg6rxr0r6sH.eOy0Lif1.O2iDbUBjE/usaqfwmERZzcdi', 1, '2020-01-28', '2020-02-21 08:38:53'),
(18, 'Toto', 'Toto', 'toto@gmail.com', 'Toto', 'formateur', 'toto', '$2y$10$keno0VEAHi8AmAv2wN2rPOnEvN0IMrTVYfXIeUScbKDSEG0xpKcxu', 0, '2020-01-28', NULL),
(21, 'Champagne', 'Fabienne', 'fabie1@gmail.com', 'HP Compiègne', 'formateur', 'fabie', '$2y$10$XSOQuBh7lnwRcQjj3ceXS.2mnxn/U/AzuiJ5KxgIwEHYh7w3soLBq', 1, '2020-01-30', '2020-03-18 15:13:51'),
(22, 'Champagne', 'Hervé', 'hchampagne56@gmail.com', 'AFPA', 'formateur', 'hchampagne', '$2y$10$I3nIEhEEphlUa.aPHHHAC.YwICsPDPxPyrHKj8CgWgEkjeZkgFfY2', 0, '2020-03-05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `car_id` int(10) NOT NULL COMMENT 'index table carte',
  `car_met_id` int(10) NOT NULL COMMENT 'cle etrangère id/metier',
  `car_numero` varchar(10) NOT NULL COMMENT 'numero carte',
  `car_description` varchar(500) NOT NULL COMMENT 'carte description',
  `car_type` varchar(10) NOT NULL COMMENT 'type de carte'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`car_id`, `car_met_id`, `car_numero`, `car_description`, `car_type`) VALUES
(115, 1, 'P 387', 'Dans mon travail, je m\'occupe de différentes personnes jeunes ou adultes, malades ou valides.', 'metier'),
(116, 1, 'P 384', 'Je prends en charge toute seule les activités et les tâches quotidiennes des personnes dont je m\'occupe, de cette manière elles peuvent rester dans leur logement et leur environnement familier.', 'metier'),
(117, 1, 'P 380', 'Chez les personnes ou chez les familles auprès desquels j\'interviens, je repasse, je fais le ménage et la vaisselle, je prépare le repas et je fais parfois les courses. Je fais les toilettes également.', 'metier'),
(118, 1, 'P 375', 'Chaque particulier à ses exigences et je dois suivre leurs consignes. Mes interventions varient en fonction des personnes. Pour certains je passe l\'aspirateur et je fais les poussières. Pour d\'autres je repasse et je fais les vitres. Ça dépend aussi de ma semaine. J\'organise mon temps et mon travail.', 'metier'),
(119, 1, 'P 369', 'Quand je m\'occupe d\'une personne qui séjourne dans une résidence, je prends le linge pour le laver chez moi.', 'metier'),
(120, 1, 'P 362', 'J\'effectue pour certaines personnes des tâches administratives. Dès fois, elles peuvent venir avec moi si elles le désirent. Ça leur permet de sortir un peu de leur domicile.', 'metier'),
(121, 1, 'P 355', 'Pour les personnes âgées, je prépare tous les matins le petit déjeuner même le samedi matin. Mais le dimanche, je suis en repos. Je l\'ai demandé.', 'metier'),
(122, 1, 'P 348', 'Je travaille 25h, c\'est un choix. Alors qu\'au départ je travaillais à temps plein je faisais 40h.', 'metier'),
(123, 1, 'P 341', 'Mes interventions sont courtes, elles ne durent pas plus de 2 heures à 2 heures 30. Mais je travaille essentiellement dans mon quartier aussi je peux rentrer chez moi de temps en temps pour accompagner ma fille à l\'école.', 'metier'),
(124, 1, 'P 334', 'Mon employeur me donne un planning avec mes horaires pour toute la semaine. Je peux faire des heures en plus lorsque la personne a besoin de moi et me le demande.', 'metier'),
(125, 1, 'P 327', 'J\'ai toujours voulu être utile et aider les autres ; m\'occuper des autres était un intérêt pour moi.', 'metier'),
(126, 1, 'P 320', 'Mon travail me demande d\'être très dynamique et de me déplacer tous les jours. J\'effectue de nombreux déplacements mais ça fait parti de mon emploi. Mes déplacements sont compris dans les heures de travail.', 'metier'),
(127, 1, 'P 313', 'Je rencontre souvent des personnes seules qui n\'ont pas trop de contact avec l\'extérieur. Quand j\'arrive, je discute beaucoup. On échange nos idées, on parle de tout et de rien. Elles me racontent leur vie.', 'metier'),
(128, 1, 'P 306', 'Certains m\'offrent le caf » et des cadeaux pour les fêtes. D\'autres me donnent leurs clés pour que je puisse aller chez eux sans qu\'ils soient présents.', 'metier'),
(129, 1, 'P 299', 'Mon metier me demande d\'être présente, d\'écouter et d\'établir une relation de confiance. C\'est pour cela que certains me donnent leurs clés.', 'metier'),
(130, 1, 'P 292', 'En cas d\'hospitalisation, je leur rends visite à l\'hôpital. Et même lorsque je ne travaille pas chez eux ils veulent me rémunérer quand même, je n\'accepte pas.', 'metier'),
(131, 1, 'P 285', 'Maintenant, je connais toutes les personnes chez qui je vais. Au bout de plusieurs années, on installe une relation de confiance.', 'metier'),
(132, 1, 'P 278', 'Mon metier n\'est pas facile tous les jours. J\'ai déjà vu des décès, il faut savoir prendre du recul et avoir un bon équilibre.', 'metier'),
(133, 1, 'P 271', 'Je créé des liens dans mon travail et je me sens utile. Quand je suis malade, ils prennent de mes nouvelles.', 'metier'),
(134, 1, 'P 264', 'Je suis toujours sur la route, je conduis mes enfants à leurs loisirs et leurs activités sportives.', 'metier'),
(135, 1, 'P 257', 'J\'aime rentrer chez moi et lire même si je dors rapidement. En dehors de la lecture, je passe tout mon temps à m\'occuper de mes enfants.', 'metier'),
(136, 2, 'P 245', 'Je m\'occupe, en collaboration avec des infirmières, de personnes atteintes de la maladie de Parkinson, d\'Alzheimer, démentes ou souffrant de troubles psychiatriques. Je travaille dans cette structure depuis un an , je suis en CDI.', 'metier'),
(137, 2, 'P 240', 'Le matin, je commence le travail à 7h30. J\'arrive, je me change, c\'est obligatoire, je mets une blouse blanche stérile, des chaussures blanches.', 'metier'),
(138, 2, 'P 234', 'Je pratique des toilettes complètes au lit, mais aussi j\'aide les personnes à la toilette, à l\'habillage et au déshabillage.', 'metier'),
(139, 2, 'P 226', 'Trois ou quatre fois par jour, je fais des soins de nursing : le change.', 'metier'),
(140, 2, 'P 218', 'Je distribue les repas. Soit je donne les plateaux à ceux qui se débrouillent seul, soit j\'aide les personnes à s\'alimenter. Le plus souvent je m\'occupe des personnes qui ont des sondes gastriques.', 'metier'),
(141, 2, 'P 207', 'Pour les repas principaux, mes collègues et moi descendons les personnes qui le peuvent  en salle de restaurant.', 'metier'),
(142, 2, 'P 196', 'Je fais les soins des cheveux au lit, pour laver la tête je pose un évier en plastique gonflable et j\'installe la personne. Quelque fois je fais des brushings.', 'metier'),
(143, 2, 'P 184', 'Pour le confort de la personne, je propose aussi des massages : les pieds, les jambes, les mains.', 'metier'),
(144, 2, 'P 171', 'Je prépare les médicaments, je dois noter le jour et l\'heure de la prise des médicaments. Je le distribue avec les infirmiers.', 'metier'),
(145, 2, 'P 158', 'Je traite les escarres. Je vérifie si les personnes sont bien hydratées, je surveille les perfusions, je peux également brancher l\'oxygène si nécessaire.', 'metier'),
(146, 2, 'P 145', 'Chaque jour, je change les draps, les serviettes… ; je débarrasse les chambres du linge sale et je le trie dans différents sacs.', 'metier'),
(147, 2, 'P 132', 'J\'anime des ateliers l\'après-midi pendant le goûter. On met un peu d\'ambiance avec de la musique, on fait danser et chanter les résidents. On propose également des ateliers pour entretenir la capacité de mémorisation.', 'metier'),
(148, 2, 'P 119', 'Régulièrement on se réunit tous. Chaque jour il y a les transmissions : on échange sur tout ce qui s\'est passé la nuit ou la journée. Je signale s\'il y a eu des chutes des accidents, des problèmes avec les familles.', 'metier'),
(149, 2, 'P 106', 'Une fois par mois je participe à des réunions avec un psychologue, cela me permet de discuter de ce que je ressens, de partager les moments difficiles. J\'au aussi des formations comme par exemple sur la maltraitance.', 'metier'),
(150, 2, 'P 093', 'Le soir, je fais la vaisselle, ensuite je fais le nettoyage, je désinfecte les locaux (tables, salle et chaises) de notre étage avec des produits spécifiques.', 'metier'),
(151, 2, 'P 080', 'La nuit, je surveille sur mon étage, je passe dans les chambres pour vérifier si tout va bien, je m\'arrête de temps en temps pour réconforter certaines personnes lorsque je vois que ça ne va pas parce qu\'elles ont peur.', 'metier'),
(152, 2, 'P 067', 'La chose un peu plus difficile à mon travail c\'est l\'accompagnement de fin de vie avec la famille, préparer la séparation.', 'metier'),
(153, 2, 'P 054', 'Je fais les soins de conservation des personnes décédées. La toilette mortuaire consiste en une toilette normale après quoi je les habille des plus beaux vêtements qu\'ils ont. Je mets les dents, je ferme les yeux et la bouche ', 'metier'),
(154, 2, 'P 041', 'Depuis un an et demi je fais des interventions auprès des stagiaires en définition de projet. Nous montons un projet d\'animation : un spectacle chantant et dansant avec un goûter.', 'metier'),
(155, 2, 'P 028', 'Nous sommes tenus au secret professionnel. Ça n\'est pas évident quand je travaille avec des stagiaires de leur dire ce qu\'ils doivent savoir pour faire correctement leur travail mais pas plus pour respecter la confidentialité des dossiers.', 'metier'),
(156, 2, 'P 015', 'J\'aimerai bien avoir plus de reconnaissance quelque part. Bon vis-à-vis de mes chefs, j\'en ai. Mais vis-à-vis des familles…Moi je me suis déjà pris des claques dans la figure.', 'metier'),
(157, 2, 'P 002', 'Ce que j\'aime le plus c\'est le contact. Dans ce metier, il faut être bien physiquement et mentalement.', 'metier'),
(158, 3, 'P 009', 'Je répare les ailes, les longerons, les portières, les capots. Tout sauf ce qui est moteur et électricité. On change également les éléments vitrés quand ils ne sont pas collés.', 'metier'),
(159, 3, 'P 022', 'Pour réparer les pièces en fibre fissurées je perce un trou pour arrêter la fissure et ensuite je la colmate. C\'est délicat, il faut faire très attention de ne pas les casser plus.', 'metier'),
(160, 3, 'P 035', 'Je ne touche pas l\'électricité mais il m\'arrive de changer des ampoules. Quand je remonte des éléments électriques je fais les branchements nécessaires à leur bon fonctionnement.', 'metier'),
(161, 3, 'P 048', 'Pour remplacer les éléments endommagés, d\'abord je les dégarnis puis je démonte tout ce qu\'il est possible de démonter en faisant attention de ne rien perdre même pas une vis ou un boulon. Je regarde aussi comment toutes les pièces sont montées.', 'metier'),
(162, 3, 'P 061', 'S\'il faut remplacer un élément, on en choisit un nu et on remonte les accessoires qu\'on a démontés sur celui abîmé.', 'metier'),
(163, 3, 'P 074', 'Je redresse la tôle froissée ou bosselée je fais attention de pas mettre trop de mastic car ça coûte cher et le ponçage est très long.', 'metier'),
(164, 3, 'P 087', 'Je redonne à la tôle sa forme initiale, je la frappe avec le burin. J\'utilise aussi le chalumeau pour qu\'elle se tende à la chaleur. Avec une cuiller je reforme les arêtes et tous les mouvements qui font l\'esthétique de la pièce.', 'metier'),
(165, 3, 'P 100', 'Pour découper certains éléments, je meule. Je porte alors mes gants pour me protéger les mains et des lunettes pour ne pas recevoir de projection dans les yeux.', 'metier'),
(166, 3, 'P 113', 'Il m\'arrive fréquemment de souder. Par exemple quand le plancher est pourri je découpe les endroits les plus endommagés et je soude les pièces. Je travaille alors allongée par terre.', 'metier'),
(167, 3, 'P 126', 'Quand une pièce est réparée et remontée, alors il faut poncer. Quand on ponce toute une journée, la poussière est partout dans le nez, les cheveux, la toile bleue ne l\'arrête  pas.', 'metier'),
(168, 3, 'P 223', 'Je passe le jet, l\'aspirateur, je lave les carreaux. Quand on sort le véhicule, il est propre à l\'intérieur comme à l\'extérieur.Je prépare la pièce ou le véhicule entièrement jusque l\'apprêt, puis je fais le camouflage.', 'metier'),
(169, 3, 'P 152', 'Si on met la peinture à la bombe alors je peux le faire moi-même. Sinon c\'est le peintre. Quelque fois je prépare avec lui la base et la couleur. Il fait ses mélanges par ordinateur, et nous pesons tous les produits de la composition.', 'metier'),
(170, 3, 'P 165', 'Il faut porter un masque pour ne pas être intoxiqué par certains produits.', 'metier'),
(171, 3, 'P 178', 'Il faut de la force quelque fois et notamment pour actionner la pompe manuelle que j\'utilise pour tirer à la flèche un véhicule écrasé.', 'metier'),
(172, 3, 'P 191', 'Je trie et je range toutes les pièces avant d\'entamer un autre boulot. On récupère pas mal de choses, ça fait toujours plaisir à quelqu\'un une pièce d\'occasion.', 'metier'),
(173, 3, 'P 202', 'Je rencontre les représentants, ils informent des nouveaux produits. Je choisis mes produits ou mes pièces à commander suivant ce dont j\'ai besoin mais c\'est le chef qui prend la décision.', 'metier'),
(175, 3, 'P 231', 'L\'hiver il fait froid et ce n\'est  pas facile de travailler avec les mains gelées.', 'metier'),
(176, 3, 'P 238', 'Dans une grande concession, chacun sa place, mais ici le chef donne le travail quel qu\'il soit à celui qui est libre pour le faire. C\'est varié.', 'metier'),
(177, 3, 'P 244', 'Je travaille 7 heures par jour ;  quelque fois plus pour terminer à temps et satisfaire le client. Le soir, j\'aime m\'occuper de mes chiens.', 'metier'),
(178, 3, 'P 213', 'Tout ce qui est paperasserie c est le chef. Je n\'aimerai pas être chef. Enfin pas tout de suite.', 'metier'),
(179, 1, 'B 718', 'J\'ai le niveau BEP sténo-dactylo. J\'ai toujours voulu être derrière un bureau et devenir secrétaire enfin sténodactylo.', 'parcours'),
(180, 1, 'B 712', 'J ai tout de suite travaillé dans une entreprise de transport. Mon père connaissait une personne dans cette entreprise puisqu il ne travaillait pas loin de cette entreprise.', 'parcours'),
(181, 1, 'B 698', 'Mon contrat a démarré pendant les vacances d\'été. J\'ai occupé le poste de sténodactylo dans cette entreprise de transport.', 'parcours'),
(182, 1, 'B 706', 'C\'était un metier varié ou je pouvais rencontrer beaucoup de monde surtout dans le transport. Je répondais au téléphone, je dirigeais les communications téléphoniques, je prenais en sténo enfin tout comme une secrétaire.', 'parcours'),
(183, 1, 'B 688', 'J\'ai travaillé pendant 6 mois. J\'ai signé contrat sur contrat pendant cette période. Je savais que je n\'allais pas signer de CDI. J\'ai eu mon premier enfant.', 'parcours'),
(184, 1, 'B 676', 'Ma mère travaillait chez une dame, elle lui faisait le ménage et ma mère lui a parlé de moi que je recherchais un emploi.', 'parcours'),
(185, 1, 'B 664', 'Cette dame m\'a proposé de postuler chez un comptable agréer. Il recherchait quelqu\'un. J\'ai donc postulé et j\'ai signé un CDI entant qu\'opératrice de saisie. J\'ai tout appris sur le tas après une semaine d\'essai, j\'ai pu continuer.', 'parcours'),
(186, 1, 'B 638', 'J\'ai travaillé dans cette entreprise pendant 17ans j\'ai pris 3 ans de congé parental.', 'parcours'),
(187, 1, 'B 651', 'Mon rôle était de saisir toutes les données comptables sur ordinateur. J\'aimais ce travail, il était varié et j\'avais des responsabilités. J\'ai appris plein de choses. Avec mes collègues je m\'entendais très bien.', 'parcours'),
(188, 1, 'B 625', 'Il faut être rapide. La rapidité on l\'avait avec l\'habitude. On me demandait dès fois de me déplacer chez les clients pour compléter les documents.', 'parcours'),
(189, 1, 'B 612', 'Puis j\'ai été licenciée. Mon employeur m\'a annoncé quelques mois après mon retour de congé parental qu\'il n\'avait plus les moyens financiers pour me garder.', 'parcours'),
(190, 1, 'B 586', 'J\'ai été très déçue et anéantie. J\'ai dons dû m\'inscrire comme tout le monde à l\'ANPE. J\'ai eu du mal à vouloir retravailler.', 'parcours'),
(191, 1, 'B 599', 'Je suis restée 3 ans au chômage. Et pendant cette période, j\'ai cherché un poste d\'opératrice de saisie mais je n\'ai jamais trouvé. Je pensais garder contact avec mes collègues. Je n\'ai jamais eu de nouvelles. J\'ai été très déçue.', 'parcours'),
(192, 1, 'B 573', 'J\'ai eu des entretiens mais sans aucun résultat, je me suis aperçue que tout avait changé et je ne maîtrisé pas la bureautique.', 'parcours'),
(193, 1, 'B 560', 'Je ne voulais plus exercer ce metier, je voulais changer et être utile. Je voulais m\'occuper des personnes âgées. Je me suis donc adressée à la mairie de mon quartier pour récolter les renseignements nécessaires et j\'ai trouvé mon emploi.', 'parcours'),
(194, 1, 'B 547', 'Je travaille dans ce metier depuis 4 ans et aujourd\'hui j\'ai décidé de reprendre des cours en bureautique.', 'parcours'),
(195, 1, 'B 534', 'Depuis quelques mois j\'ai repris des cours en bureautique dans un centre de formation. Je me suis arrangée avec les formateurs pour pouvoir suivre les cours en travaillant. ', 'parcours'),
(196, 1, 'B 521', 'L\'ordinateur est toujours utile pour le travail mais aussi pour tous les jours. C\'est indispensable de connaître Internet de nos jours.', 'parcours'),
(197, 2, 'B 551', 'J\'ai eu une enfance très difficile avec une mère pas très cool et un beau père pas très cool non plus. Il y avait beaucoup de violences.', 'parcours'),
(198, 2, 'B 524', 'J\'étais un peu perdu, je fuguais. Au début au collège cela se passait bien et puis tous les problèmes…j\'ai laissé tomber. J\'ai arrêté le collège en quatrième.', 'parcours'),
(199, 2, 'B 550', 'Je devais avoir 15-16 ans. Je voulais travailler dans la restauration. J\'ai fait un contrat d\'apprentissage mais quand j\'ai été dedans ça ne m\'a pas plu du tout.', 'parcours'),
(200, 2, 'B 537', 'Je faisais 40 à 45 heures par semaines. J\'étais un peu exploité…J\'ai arrêté mon contrat d\'apprentissage. Je suis resté dans la galère quelque mois.', 'parcours'),
(201, 2, 'B 563', 'Alors j\'ai fait une formation, une sorte de définition de projet. Je voulais avoir du contact humain, aussi je voulais être fleuriste soit travailler dans la vente. J\'ai fait plusieurs stages dans la vente, et je me suis aperçu que le contact humain ce n\'était pas trop ça non plus. C\'était plutôt \"bonjour Mme, je peux vous aider\"…Fleuriste ça me plaisait bien, mais j\'ai eu quelques petits problèmes avec le patron, je ne vais pas trop détailler là-dessus. Et après j\'ai arrêté la formation.', 'parcours'),
(202, 2, 'B 576', 'Après re-galère. Je ne faisais rien, je traînais, je sortais avec mes amis, j\'en profitais encore un petit peu. A cette époque là je vivais chez  mes parents, ma mère m\'a forcé un peu. \"retourne en restauration, tu es fait pour ça\". Alors pour lui faire plaisir comme elle me prenait la tête, j\'ai envoyé des courriers j\'ai trouvé un CDD de deux mois.', 'parcours'),
(203, 2, 'B 602', 'Après je suis parti à Paris. La folle vie parisienne je travaillais sur deux emplois. La vente et la restauration, je ne savais faire que ça et en fin de compte j\'au eu un mi-temps en prêt à porter, l\'autre dans un café. C\'était un petit peu trop lourd.', 'parcours'),
(204, 2, 'B 589', 'Je suis revenu sur Lille. Il fallait que je me débrouille tout seul. J\'ai été saisonnier aussi sur la côte d\'Opale, serveur en salle c\'était des fruits de mer.', 'parcours'),
(205, 2, 'B 615', 'Après être tombé gravement malade, je suis retourné à la Mission Locale, mon correspondant m\'a trouvé une formation : une DIP (définition à l\'insertion professionnelle)', 'parcours'),
(206, 2, 'B 628', 'La formation s\'est très bien passée, j\'ai fait des stages en maison de retraite qui se sont bien passés.', 'parcours'),
(207, 2, 'B 641', 'Une formation d\'auxiliaire allait débuter, je me suis dit que je n\'allais pas réussir comme d\'habitude, j\'avais beaucoup de problèmes en français. Mais j\'ai été accepté pour une formation d\'auxiliaire de gérontologie.', 'parcours'),
(208, 2, 'B 666', 'J\'avais un contrat d\'un an et j\'étais considéré comme aide-soignant, et j\'avais 35 résidents à ma charge. Il y a eu démission du directeur, la nouvelle directrice est arrivée et au bout d\'un an, elle a dit stop, votre contrat n\'est pas renouvelé.', 'parcours'),
(209, 2, 'B 654', 'Mais je me suis refait, j\'ai attendu deux mois pour me reposer, mais pendant mon repos j\'ai démarché plusieurs maisons de retraite, et j\'ai postulé.', 'parcours'),
(210, 2, 'B 678', 'Au début c\'était un CDD d\'un mois et après elle m\'a embauché tout de suite en disant : Vous le méritez, j\'ai pensé à vous, on vous embauche tout de suite.', 'parcours'),
(211, 2, 'B 690', 'Je suis toujours intervenant en définition de projet professionnel. Je le fais en bénévolat.', 'parcours'),
(212, 2, 'B 700', 'J\'ai envie encore d\'évoluer un petit peu plus. Je serais capable de reprendre des cours, passer un D.A.E.U, retourner à la Fac, rentrer à l\'école d\'infirmier(es).', 'parcours'),
(213, 2, 'B 707', 'Je fais du shoping, je vais au cinéma de temps en temps, et puis des balades.', 'parcours'),
(214, 2, 'B 713', 'Je passe des soirées entre amis. Je vais voir ma sœur parce que j\'ai plus qu\'elle pour l\'instant. Et puis je vais dans ma belle famille quand ils font des fêtes, des repas de famille.', 'parcours'),
(215, 3, 'B 684', 'Mon père était mécanicien poids lourd. J\'ai un frère, il est boucher', 'parcours'),
(216, 3, 'B 672', 'Mon père est content de ce que je fais. C\'est  moi qui lui donnais un coup de main.', 'parcours'),
(217, 3, 'B 647', 'En troisième je voulais faire un CAP, ils m\'ont mis en classe de rattrapage. En fait je voulais aller travailler pour aider mes parents. Comme je n\'ai pas trouvé d\'emploi, je ne suis rentrée qu\'en octobre.', 'parcours'),
(218, 3, 'B 660', 'Je ne suis pas restée longtemps, j\'ai trouvé rapidement un travail à la municipalité. J\'ai soigné les personnes âgées pendant deux ans. Et puis je ne voulais plus j\'avais plus le cœur. ', 'parcours'),
(219, 3, 'B 634', 'Alors j\'ai été porteur dans les champs ; les femmes plus âgées ramassaient, moi je portais la récolte. Le midi je travaillais à la friterie.', 'parcours'),
(220, 3, 'B 621', 'J\'ai aussi été employée comme agent de production sur ligne semi-automatique, ils m\'ont formée sur le tas.', 'parcours'),
(221, 3, 'B 595', 'A près j\'ai fait la formation de carrossier/carrossière. Là en formation je n\'ai pas eu de problème mais en stage en entreprise…Au début cela ne s\'est pas bien passé, les gars me disaient, « vas faire ta vaisselle ». Je rentrais à la maison je pleurais.', 'parcours'),
(222, 3, 'B 608', 'J\'ai joué à quitte ou double. J\'ai montré mon caractère, je ne me suis pas laissée faire. Je suis allée jusqu\'au bout du stage. J\'ai validé ma formation, je suis sortie 3ème de promo.', 'parcours'),
(223, 3, 'B 582', 'Néanmoins après je n\'arrivais pas à trouver d\'emploi. Ils ne veulent pas de femmes.', 'parcours'),
(224, 3, 'B 569', 'J\'ai fait un stage en agent de sécurité incendie. J\'aime aider les gens. J\'ai mon ERP1.', 'parcours'),
(225, 3, 'B 543', 'Un jour mon beau frère a été embauché ici comme mécanicien et le patron lui a dit j\'ai besoin d\'un carrossier vous ne connaissez personne. Il a dit si je connais quelqu\'un mais c\'est une carrossière.', 'parcours'),
(226, 3, 'B 556', 'J\'aime bien mon travail. En formation on n\'apprend pas tout alors j\'apprends encore, je demande conseils aux collègues. Ils me montrent et puis j\'essaye.', 'parcours'),
(227, 3, 'B 530', 'Cela fait de longues journées, le garage est loin de notre habitation. Le soir quand je rentre, pour nous les femmes, la journée n\'est pas finie mais je suis tellement contente de ne plus être au RMI.', 'parcours'),
(228, 3, 'B 517', 'C\'est un travail d\'avenir, je n\'espère pas les accidents pour personne mais des tôles froissées y\'en a toujours. Mécanicien c\'est pas pareil avec l\'électronique aujourd\'hui.', 'parcours');

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE `contient` (
  `id_session` int(11) NOT NULL,
  `id_metier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contient`
--

INSERT INTO `contient` (`id_session`, `id_metier`) VALUES
(1, 1),
(1, 2),
(76, 1),
(77, 1),
(77, 2),
(77, 13),
(115, 1),
(115, 3),
(122, 1),
(123, 1),
(123, 2);

-- --------------------------------------------------------

--
-- Structure de la table `contient_carte`
--

CREATE TABLE `contient_carte` (
  `pil_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `invite`
--

CREATE TABLE `invite` (
  `inv_id` int(11) NOT NULL COMMENT 'index table invite',
  `inv_ses_id` int(11) DEFAULT '0' COMMENT 'cle etrangère id/session',
  `inv_nom` varchar(50) NOT NULL COMMENT 'nom invité',
  `inv_prenom` varchar(50) NOT NULL COMMENT 'prenom invité',
  `inv_email` varchar(150) NOT NULL COMMENT 'email invité',
  `inv_role` varchar(15) NOT NULL DEFAULT 'invite',
  `inv_conn` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invite`
--

INSERT INTO `invite` (`inv_id`, `inv_ses_id`, `inv_nom`, `inv_prenom`, `inv_email`, `inv_role`, `inv_conn`) VALUES
(52, 76, 'Champagne', 'Hervé', 'hch11@gmail.com', 'invite', 0),
(53, 77, 'Champagne', 'Hervé', 'hch3@gmail.com', 'invite', 0),
(60, 122, 'Champagne', 'Hervé', 'hch30@gmail.com', 'invite', 0),
(61, 115, 'Champagne', 'Hervé', 'hch2@gmail.com', 'invite', 0),
(62, 123, 'Champagne', 'Hervé', 'hch21@gmail.com', 'invite', 0);

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `jeu_id` int(11) NOT NULL,
  `jeu_inv_id` int(11) NOT NULL,
  `jeu_n_drop` smallint(6) NOT NULL,
  `jeu_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jeu`
--

INSERT INTO `jeu` (`jeu_id`, `jeu_inv_id`, `jeu_n_drop`, `jeu_date`) VALUES
(411, 60, 0, '2020-03-10 14:44:57');

-- --------------------------------------------------------

--
-- Structure de la table `metier`
--

CREATE TABLE `metier` (
  `met_id` int(3) NOT NULL COMMENT 'index table metier',
  `met_metier` varchar(50) NOT NULL COMMENT 'metier',
  `met_prenom` varchar(50) CHARACTER SET utf8mb4 NOT NULL COMMENT 'prenom personne/metier',
  `met_age` int(3) DEFAULT NULL COMMENT 'age personne/metier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `metier`
--

INSERT INTO `metier` (`met_id`, `met_metier`, `met_prenom`, `met_age`) VALUES
(1, 'Aide à domicile', 'Nadège', 43),
(2, 'Aide soignant(e) en gériatrie', 'David', 27),
(3, 'Carrosier(ière)', 'Marie', 31),
(4, 'Coiffeur(euse)', 'Olivier', 38),
(5, 'Conducteur(trice) de bus', 'Mélanie', 24),
(6, 'Conducteur(trice) de la machine de finition', 'Zakia', 33),
(7, 'Hote(esse) de caisse', 'Jean Luc', 45),
(8, 'Economiste de la construction / Mettreur(euse)', 'Anne Marie', 45),
(9, 'Menuisier(ère)', 'Samuel', 24),
(10, 'Opérateur(trice) sur machine', 'Sylvie', 33),
(11, 'Préparateur(trice) de commande', 'Patricia', 40),
(12, 'Responsable de rayon', 'Delphine', 26),
(13, 'Restaurateur(trice)', 'Smaïl', 39),
(14, 'Secrétaire', 'Yasmina', 48),
(15, 'Tourneur(euse)', 'Audrey', 22);

-- --------------------------------------------------------

--
-- Structure de la table `pile`
--

CREATE TABLE `pile` (
  `pil_id` int(11) NOT NULL,
  `pil_jeu_id` int(11) NOT NULL,
  `pil_container` varchar(10) NOT NULL,
  `pil_metier` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pile`
--

INSERT INTO `pile` (`pil_id`, `pil_jeu_id`, `pil_container`, `pil_metier`) VALUES
(649, 411, 'target6', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reset`
--

CREATE TABLE `reset` (
  `res_id` int(10) NOT NULL COMMENT 'index reset',
  `res_adh_id` int(10) NOT NULL COMMENT 'cle etrangère adherent',
  `res_cle_url` varchar(20) NOT NULL COMMENT 'cle pour url',
  `res_conf` varchar(6) NOT NULL COMMENT 'cle confirmation coprs mail',
  `res_date` datetime NOT NULL COMMENT 'date enregistrement'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `ses_id` int(11) NOT NULL COMMENT 'index table session',
  `ses_adh_id` int(11) NOT NULL COMMENT 'cle etrangère id/adherent',
  `ses_d_session` date NOT NULL COMMENT 'date de session',
  `ses_h_debut` time NOT NULL COMMENT 'heure debut session',
  `ses_h_fin` time NOT NULL COMMENT 'heure fin de session',
  `ses_validation` smallint(2) NOT NULL DEFAULT '0' COMMENT 'validation des session'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`ses_id`, `ses_adh_id`, `ses_d_session`, `ses_h_debut`, `ses_h_fin`, `ses_validation`) VALUES
(1, 3, '2020-01-14', '11:00:00', '11:15:00', 0),
(2, 3, '2020-01-15', '11:00:00', '12:00:00', 0),
(76, 21, '2020-02-28', '12:00:00', '12:30:00', 1),
(77, 21, '2020-02-26', '17:00:00', '17:15:00', 1),
(115, 21, '2020-03-04', '12:00:00', '22:00:00', 1),
(122, 21, '2020-03-10', '08:00:00', '18:00:00', 1),
(123, 21, '2020-03-11', '08:00:00', '18:30:00', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`adh_id`),
  ADD UNIQUE KEY `index_email` (`adh_email`),
  ADD UNIQUE KEY `index_login` (`adh_login`);

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `index_num_carte` (`car_numero`),
  ADD KEY `id_metier` (`car_met_id`);

--
-- Index pour la table `contient`
--
ALTER TABLE `contient`
  ADD PRIMARY KEY (`id_session`,`id_metier`),
  ADD KEY `id_metier` (`id_metier`);

--
-- Index pour la table `contient_carte`
--
ALTER TABLE `contient_carte`
  ADD PRIMARY KEY (`pil_id`,`car_id`),
  ADD KEY `contient_carte_carte0_FK` (`car_id`);

--
-- Index pour la table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `id_session` (`inv_ses_id`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`jeu_id`),
  ADD KEY `jeu_invite_FK` (`jeu_inv_id`);

--
-- Index pour la table `metier`
--
ALTER TABLE `metier`
  ADD PRIMARY KEY (`met_id`);

--
-- Index pour la table `pile`
--
ALTER TABLE `pile`
  ADD PRIMARY KEY (`pil_id`),
  ADD KEY `pile_jeu_FK` (`pil_jeu_id`);

--
-- Index pour la table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`res_id`),
  ADD UNIQUE KEY `res_adh_id` (`res_adh_id`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`ses_id`),
  ADD KEY `id_formateur` (`ses_adh_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `adh_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'index adherent', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'index table carte', AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT pour la table `invite`
--
ALTER TABLE `invite`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'index table invite', AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `jeu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT pour la table `metier`
--
ALTER TABLE `metier`
  MODIFY `met_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'index table metier', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `pile`
--
ALTER TABLE `pile`
  MODIFY `pil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=651;

--
-- AUTO_INCREMENT pour la table `reset`
--
ALTER TABLE `reset`
  MODIFY `res_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'index reset';

--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `ses_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'index table session', AUTO_INCREMENT=124;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carte`
--
ALTER TABLE `carte`
  ADD CONSTRAINT `carte_ibfk_1` FOREIGN KEY (`car_met_id`) REFERENCES `metier` (`met_id`);

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `contient_ibfk_1` FOREIGN KEY (`id_session`) REFERENCES `session` (`ses_id`),
  ADD CONSTRAINT `contient_ibfk_2` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`met_id`);

--
-- Contraintes pour la table `contient_carte`
--
ALTER TABLE `contient_carte`
  ADD CONSTRAINT `contient_carte_carte0_FK` FOREIGN KEY (`car_id`) REFERENCES `carte` (`car_id`),
  ADD CONSTRAINT `contient_carte_pile_FK` FOREIGN KEY (`pil_id`) REFERENCES `pile` (`pil_id`);

--
-- Contraintes pour la table `invite`
--
ALTER TABLE `invite`
  ADD CONSTRAINT `invite_ibfk_1` FOREIGN KEY (`inv_ses_id`) REFERENCES `session` (`ses_id`);

--
-- Contraintes pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD CONSTRAINT `jeu_invite_FK` FOREIGN KEY (`jeu_inv_id`) REFERENCES `invite` (`inv_id`);

--
-- Contraintes pour la table `pile`
--
ALTER TABLE `pile`
  ADD CONSTRAINT `pile_jeu_FK` FOREIGN KEY (`pil_jeu_id`) REFERENCES `jeu` (`jeu_id`);

--
-- Contraintes pour la table `reset`
--
ALTER TABLE `reset`
  ADD CONSTRAINT `reset_ibfk_1` FOREIGN KEY (`res_adh_id`) REFERENCES `adherent` (`adh_id`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`ses_adh_id`) REFERENCES `adherent` (`adh_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

