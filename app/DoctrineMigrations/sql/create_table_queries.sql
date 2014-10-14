-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 15 Février 2014 à 15:58
-- Version du serveur: 5.5.27-29.0
-- Version de PHP: 5.4.25-1~dotdeb.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `afup`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_accreditation_presse`
--

CREATE TABLE IF NOT EXISTS `afup_accreditation_presse` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  `titre_revue` varchar(255) NOT NULL DEFAULT '',
  `civilite` varchar(4) NOT NULL DEFAULT '',
  `nom` varchar(40) NOT NULL DEFAULT '',
  `prenom` varchar(40) NOT NULL DEFAULT '',
  `carte_presse` varchar(50) NOT NULL DEFAULT '',
  `adresse` text NOT NULL,
  `code_postal` varchar(10) NOT NULL DEFAULT '',
  `ville` varchar(50) NOT NULL DEFAULT '',
  `id_pays` char(2) NOT NULL DEFAULT '',
  `telephone` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `commentaires` text,
  `id_forum` smallint(6) NOT NULL DEFAULT '0',
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_forum` (`id_forum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Accreditation presse' AUTO_INCREMENT=12 ;

--
-- Contenu de la table `afup_accreditation_presse`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_antenne`
--

CREATE TABLE IF NOT EXISTS `afup_antenne` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Structure de la table `afup_blacklist`
--

CREATE TABLE IF NOT EXISTS `afup_blacklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Contenu de la table `afup_blacklist`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_compta_facture`
--

CREATE TABLE IF NOT EXISTS `afup_compta_facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_devis` date NOT NULL,
  `numero_devis` varchar(50) NOT NULL,
  `date_facture` date NOT NULL,
  `numero_facture` varchar(50) NOT NULL,
  `societe` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `adresse` text NOT NULL,
  `code_postal` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `id_pays` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `observation` text NOT NULL,
  `ref_clt1` varchar(50) NOT NULL,
  `ref_clt2` varchar(50) NOT NULL,
  `ref_clt3` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `etat_paiement` int(11) NOT NULL DEFAULT '0',
  `date_paiement` date DEFAULT NULL,
  `devise_facture` enum('EUR','DOL') DEFAULT 'EUR',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=206 ;

--
-- Contenu de la table `afup_compta_facture`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_compta_facture_details`
--

CREATE TABLE IF NOT EXISTS `afup_compta_facture_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idafup_compta_facture` int(11) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `quantite` double(11,2) NOT NULL,
  `pu` double(11,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1051 ;

--
-- Contenu de la table `afup_compta_facture_details`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_conferenciers`
--

CREATE TABLE IF NOT EXISTS `afup_conferenciers` (
  `conferencier_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` smallint(6) NOT NULL DEFAULT '0',
  `civilite` varchar(5) NOT NULL DEFAULT '',
  `nom` varchar(70) NOT NULL DEFAULT '',
  `prenom` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL DEFAULT '',
  `societe` varchar(120) DEFAULT NULL,
  `biographie` text NOT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`conferencier_id`),
  KEY `id_forum` (`id_forum`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=838 ;

--
-- Contenu de la table `afup_conferenciers`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_conferenciers_sessions`
--

CREATE TABLE IF NOT EXISTS `afup_conferenciers_sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `conferencier_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`session_id`,`conferencier_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1054 ;

--
-- Contenu de la table `afup_conferenciers_sessions`
--


-- --------------------------------------------------------

--
-- Structure de la table `afup_contacts`
--

CREATE TABLE IF NOT EXISTS `afup_contacts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `type` enum('ssii','agence web','grand compte','presse','projet','prof','sponsor','presse NPDC''') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=432 ;

--
-- Contenu de la table `afup_contacts`
--


-- --------------------------------------------------------

--
-- Structure de la table `afup_cotisations`
--

CREATE TABLE IF NOT EXISTS `afup_cotisations` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `date_debut` int(11) unsigned NOT NULL DEFAULT '0',
  `type_personne` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `id_personne` smallint(5) unsigned NOT NULL DEFAULT '0',
  `montant` float(5,2) unsigned NOT NULL DEFAULT '0.00',
  `type_reglement` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `informations_reglement` varchar(255) DEFAULT NULL,
  `date_fin` int(11) unsigned NOT NULL DEFAULT '0',
  `numero_facture` varchar(15) NOT NULL DEFAULT '',
  `commentaires` text,
  `nombre_relances` tinyint(3) unsigned DEFAULT NULL,
  `date_derniere_relance` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_personne` (`id_personne`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Cotisation des personnes physiques et morales' AUTO_INCREMENT=1533 ;

--
-- Contenu de la table `afup_cotisations`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_email`
--

CREATE TABLE IF NOT EXISTS `afup_email` (
  `email` varchar(128) NOT NULL DEFAULT '',
  `blacklist` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`),
  KEY `email` (`email`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `afup_email`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_facturation_forum`
--

CREATE TABLE IF NOT EXISTS `afup_facturation_forum` (
  `reference` varchar(255) NOT NULL DEFAULT '',
  `montant` float NOT NULL DEFAULT '0',
  `date_reglement` int(11) unsigned DEFAULT NULL,
  `type_reglement` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `informations_reglement` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `societe` varchar(40) DEFAULT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `adresse` text NOT NULL,
  `code_postal` varchar(10) NOT NULL DEFAULT '',
  `ville` varchar(50) NOT NULL DEFAULT '',
  `id_pays` char(2) NOT NULL DEFAULT '',
  `autorisation` varchar(20) DEFAULT NULL,
  `transaction` varchar(20) DEFAULT NULL,
  `etat` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `facturation` tinyint(4) NOT NULL DEFAULT '0',
  `id_forum` smallint(6) NOT NULL DEFAULT '0',
  `date_facture` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`reference`),
  KEY `id_pays` (`id_pays`),
  KEY `id_forum` (`id_forum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Facturation pour le forum PHP';

--
-- Contenu de la table `afup_facturation_forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_forum`
--

CREATE TABLE IF NOT EXISTS `afup_forum` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL DEFAULT '',
  `path` varchar(100) DEFAULT NULL,
  `nb_places` int(11) unsigned NOT NULL DEFAULT '0',
  `date_debut` date NOT NULL DEFAULT '0000-00-00',
  `date_fin` date NOT NULL DEFAULT '0000-00-00',
  `annee` int(11) DEFAULT NULL,
  `date_fin_appel_projet` int(11) DEFAULT NULL,
  `date_fin_appel_conferencier` int(11) DEFAULT NULL,
  `date_fin_prevente` int(11) DEFAULT NULL,
  `date_fin_vente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Structure de la table `afup_forum_coupon`
--

CREATE TABLE IF NOT EXISTS `afup_forum_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` int(11) NOT NULL,
  `texte` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=268 ;

--
-- Contenu de la table `afup_forum_coupon`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_forum_partenaires`
--

CREATE TABLE IF NOT EXISTS `afup_forum_partenaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` int(11) NOT NULL,
  `id_niveau_partenariat` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `presentation` text,
  `logo` varchar(100) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Contenu de la table `afup_forum_partenaires`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_forum_planning`
--

CREATE TABLE IF NOT EXISTS `afup_forum_planning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_session` int(11) DEFAULT NULL,
  `debut` int(10) DEFAULT NULL,
  `fin` int(10) DEFAULT NULL,
  `id_salle` smallint(4) DEFAULT NULL,
  `id_forum` int(11) DEFAULT NULL,
  `keynote` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=257 ;

--
-- Contenu de la table `afup_forum_planning`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_forum_salle`
--

CREATE TABLE IF NOT EXISTS `afup_forum_salle` (
  `id` smallint(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `id_forum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `afup_forum_salle`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_forum_sessions_commentaires`
--

CREATE TABLE IF NOT EXISTS `afup_forum_sessions_commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_session` int(11) DEFAULT NULL,
  `id_personne_physique` int(11) DEFAULT NULL,
  `commentaire` mediumtext,
  `date` int(10) DEFAULT NULL,
  `public` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;

--
-- Contenu de la table `afup_forum_sessions_commentaires`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_inscriptions_rappels`
--

CREATE TABLE IF NOT EXISTS `afup_inscriptions_rappels` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `date` int(10) NOT NULL DEFAULT '0',
  `id_forum` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Emails pour le rappel du forum PHP' AUTO_INCREMENT=1443 ;

--
-- Contenu de la table `afup_inscriptions_rappels`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_inscription_forum`
--

CREATE TABLE IF NOT EXISTS `afup_inscription_forum` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  `reference` varchar(255) NOT NULL DEFAULT '',
  `coupon` varchar(255) NOT NULL DEFAULT '',
  `type_inscription` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `montant` float NOT NULL DEFAULT '0',
  `informations_reglement` varchar(255) DEFAULT NULL,
  `civilite` varchar(4) NOT NULL DEFAULT '',
  `nom` varchar(40) NOT NULL DEFAULT '',
  `prenom` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `telephone` varchar(40) DEFAULT NULL,
  `citer_societe` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `newsletter_afup` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `newsletter_nexen` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `commentaires` text,
  `etat` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `facturation` tinyint(4) NOT NULL DEFAULT '0',
  `id_forum` smallint(6) NOT NULL DEFAULT '0',
  `mobilite_reduite` tinyint(1) NOT NULL DEFAULT '0',
  `mail_partenaire` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_forum` (`id_forum`),
  KEY `reference` (`reference`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Inscriptions au forum PHP' AUTO_INCREMENT=3446 ;

--
-- Contenu de la table `afup_inscription_forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_logs`
--

CREATE TABLE IF NOT EXISTS `afup_logs` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  `id_personne_physique` smallint(5) unsigned NOT NULL DEFAULT '0',
  `texte` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id_personne_physique` (`id_personne_physique`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Logs des actions' AUTO_INCREMENT=155853 ;

--
-- Contenu de la table `afup_logs`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_niveau_partenariat`
--

CREATE TABLE IF NOT EXISTS `afup_niveau_partenariat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `afup_oeuvres`
--

CREATE TABLE IF NOT EXISTS `afup_oeuvres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_personne_physique` smallint(5) unsigned DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `valeur` smallint(5) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4206 ;

--
-- Contenu de la table `afup_oeuvres`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_pays`
--

CREATE TABLE IF NOT EXISTS `afup_pays` (
  `id` char(2) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL DEFAULT '',
  `nom` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Pays';

-- --------------------------------------------------------

--
-- Structure de la table `afup_personnes_morales`
--

CREATE TABLE IF NOT EXISTS `afup_personnes_morales` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `civilite` varchar(4) NOT NULL DEFAULT '',
  `nom` varchar(40) NOT NULL DEFAULT '',
  `prenom` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `raison_sociale` varchar(100) NOT NULL DEFAULT '',
  `siret` varchar(14) NOT NULL DEFAULT '',
  `adresse` text NOT NULL,
  `code_postal` varchar(10) NOT NULL DEFAULT '',
  `ville` varchar(50) NOT NULL DEFAULT '',
  `id_pays` char(2) NOT NULL DEFAULT '',
  `telephone_fixe` varchar(20) DEFAULT NULL,
  `telephone_portable` varchar(20) DEFAULT NULL,
  `etat` tinyint(3) NOT NULL DEFAULT '-1',
  `date_relance` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pays` (`id_pays`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Personnes morales' AUTO_INCREMENT=226 ;

--
-- Contenu de la table `afup_personnes_morales`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_personnes_physiquesysiques`
--

CREATE TABLE IF NOT EXISTS `afup_personnes_physiques` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_personne_morale` smallint(5) unsigned NOT NULL DEFAULT '0',
  `login` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `mot_de_passe` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `niveau` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `niveau_modules` char(10) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `civilite` varchar(4) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nom` varchar(40) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `prenom` varchar(40) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `adresse` text COLLATE latin1_general_ci NOT NULL,
  `code_postal` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ville` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `id_pays` char(2) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `telephone_fixe` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `telephone_portable` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `etat` tinyint(3) NOT NULL DEFAULT '-1',
  `date_relance` int(11) unsigned DEFAULT NULL,
  `compte_svn` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_email_unique` (`email`),
  KEY `pays` (`id_pays`),
  KEY `personne_morale` (`id_personne_morale`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Personnes physiques' AUTO_INCREMENT=1092 ;

-- --------------------------------------------------------

--
-- Structure de la table `afup_planete_billet`
--

CREATE TABLE IF NOT EXISTS `afup_planete_billet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `afup_planete_flux_id` int(11) DEFAULT NULL,
  `clef` varchar(255) DEFAULT NULL,
  `titre` mediumtext,
  `url` varchar(255) DEFAULT NULL,
  `maj` int(11) DEFAULT NULL,
  `auteur` mediumtext,
  `resume` mediumtext,
  `contenu` mediumtext,
  `etat` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11872 ;

--
-- Contenu de la table `afup_planete_billet`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_planete_flux`
--

CREATE TABLE IF NOT EXISTS `afup_planete_flux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `feed` varchar(255) DEFAULT NULL,
  `etat` tinyint(4) DEFAULT NULL,
  `id_personne_physique` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=137 ;

--
-- Contenu de la table `afup_planete_flux`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_presences_assemblee_generale`
--

CREATE TABLE IF NOT EXISTS `afup_presences_assemblee_generale` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_personne_physique` smallint(5) unsigned DEFAULT NULL,
  `date` int(11) unsigned NOT NULL DEFAULT '0',
  `presence` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `id_personne_avec_pouvoir` smallint(5) unsigned NOT NULL DEFAULT '0',
  `date_consultation` int(11) unsigned DEFAULT '0',
  `date_modification` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2874 ;

--
-- Contenu de la table `afup_presences_assemblee_generale`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_rendezvous`
--

CREATE TABLE IF NOT EXISTS `afup_rendezvous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `accroche` mediumtext,
  `theme` mediumtext,
  `debut` int(11) DEFAULT NULL,
  `fin` int(11) DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `plan` varchar(255) NOT NULL DEFAULT '',
  `adresse` mediumtext NOT NULL,
  `capacite` mediumint(9) DEFAULT NULL,
  `id_antenne` int(11) NOT NULL,
  `inscription` tinyint(1) NOT NULL DEFAULT '1',
  `url_externe` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `afup_rendezvous`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_rendezvous_inscrits`
--

CREATE TABLE IF NOT EXISTS `afup_rendezvous_inscrits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rendezvous` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(100) NOT NULL,
  `entreprise` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `presence` tinyint(4) DEFAULT NULL,
  `confirme` tinyint(4) DEFAULT '0',
  `creation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1423 ;

--
-- Contenu de la table `afup_rendezvous_inscrits`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_rendezvous_slides`
--

CREATE TABLE IF NOT EXISTS `afup_rendezvous_slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rendezvous` int(11) NOT NULL,
  `fichier` int(255) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `afup_rendezvous_slides`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_sessions`
--

CREATE TABLE IF NOT EXISTS `afup_sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` smallint(6) NOT NULL DEFAULT '0',
  `date_soumission` date NOT NULL DEFAULT '0000-00-00',
  `titre` varchar(255) NOT NULL DEFAULT '',
  `abstract` text NOT NULL,
  `journee` tinyint(1) NOT NULL DEFAULT '0',
  `genre` tinyint(1) NOT NULL DEFAULT '1',
  `plannifie` tinyint(1) DEFAULT NULL,
  `joindin` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1054 ;

--
-- Contenu de la table `afup_sessions`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_sessions_note`
--

CREATE TABLE IF NOT EXISTS `afup_sessions_note` (
  `session_id` int(11) NOT NULL DEFAULT '0',
  `note` tinyint(4) NOT NULL DEFAULT '0',
  `salt` char(32) NOT NULL DEFAULT '',
  `date_soumission` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`note`,`session_id`,`salt`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `afup_sessions_note`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_sessions_vote`
--

CREATE TABLE IF NOT EXISTS `afup_sessions_vote` (
  `id_personne_physique` int(11) NOT NULL DEFAULT '0',
  `id_session` int(11) NOT NULL DEFAULT '0',
  `a_vote` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_session`,`id_personne_physique`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `afup_sessions_vote`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_site_article`
--

CREATE TABLE IF NOT EXISTS `afup_site_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_site_rubrique` int(11) DEFAULT NULL,
  `surtitre` tinytext,
  `titre` tinytext,
  `raccourci` varchar(255) DEFAULT NULL,
  `descriptif` mediumtext,
  `chapeau` mediumtext,
  `contenu` mediumtext,
  `position` mediumint(9) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `etat` tinyint(4) DEFAULT NULL,
  `id_personne_physique` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=747 ;

-- --------------------------------------------------------

--
-- Structure de la table `afup_site_feuille`
--

CREATE TABLE IF NOT EXISTS `afup_site_feuille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `position` mediumint(9) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `etat` tinyint(4) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Structure de la table `afup_site_rubrique`
--

CREATE TABLE IF NOT EXISTS `afup_site_rubrique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `nom` tinytext,
  `raccourci` varchar(255) DEFAULT NULL,
  `contenu` mediumtext,
  `descriptif` tinytext,
  `position` mediumint(9) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `etat` tinyint(4) DEFAULT NULL,
  `id_personne_physique` smallint(5) unsigned DEFAULT NULL,
  `icone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Structure de la table `afup_tags`
--

CREATE TABLE IF NOT EXISTS `afup_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) DEFAULT NULL,
  `id_source` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `id_personne_physique` int(11) DEFAULT NULL,
  `date` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `source` (`source`,`id_source`,`tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1900 ;

--
-- Contenu de la table `afup_tags`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_votes`
--

CREATE TABLE IF NOT EXISTS `afup_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` mediumtext,
  `lancement` int(11) DEFAULT '0',
  `cloture` int(11) DEFAULT '0',
  `date` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `afup_votes`
--

-- --------------------------------------------------------

--
-- Structure de la table `afup_votes_poids`
--

CREATE TABLE IF NOT EXISTS `afup_votes_poids` (
  `id_vote` int(11) NOT NULL DEFAULT '0',
  `id_personne_physique` int(11) NOT NULL DEFAULT '0',
  `commentaire` mediumtext,
  `poids` tinyint(4) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  UNIQUE KEY `id_vote` (`id_vote`,`id_personne_physique`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `afup_votes_poids`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuairepro_Activite`
--

CREATE TABLE IF NOT EXISTS `annuairepro_Activite` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `Nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `annuairepro_ActiviteMembre`
--

CREATE TABLE IF NOT EXISTS `annuairepro_ActiviteMembre` (
  `Membre` int(11) NOT NULL DEFAULT '0',
  `Activite` int(11) NOT NULL DEFAULT '0',
  `EstPrincipale` enum('True','False') DEFAULT NULL,
  UNIQUE KEY `Membre` (`Membre`,`Activite`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annuairepro_ActiviteMembre`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuairepro_FormeJuridique`
--

CREATE TABLE IF NOT EXISTS `annuairepro_FormeJuridique` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `Nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `annuairepro_MembreAnnuaire`
--

CREATE TABLE IF NOT EXISTS `annuairepro_MembreAnnuaire` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FormeJuridique` int(11) NOT NULL DEFAULT '0',
  `RaisonSociale` varchar(255) DEFAULT NULL,
  `SIREN` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SiteWeb` varchar(255) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `Adresse` text,
  `CodePostal` varchar(5) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Zone` int(11) NOT NULL DEFAULT '0',
  `id_pays` varchar(2) NOT NULL,
  `NumeroFormateur` varchar(255) DEFAULT NULL,
  `MembreAFUP` tinyint(1) DEFAULT NULL,
  `Valide` tinyint(1) DEFAULT NULL,
  `DateCreation` datetime DEFAULT NULL,
  `TailleSociete` int(11) NOT NULL DEFAULT '0',
  `Password` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `RaisonSociale` (`RaisonSociale`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=880 ;

--
-- Contenu de la table `annuairepro_MembreAnnuaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuairepro_MembreAnnuaire_iso`
--

CREATE TABLE IF NOT EXISTS `annuairepro_MembreAnnuaire_iso` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FormeJuridique` int(11) NOT NULL DEFAULT '0',
  `RaisonSociale` varchar(255) DEFAULT NULL,
  `SIREN` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SiteWeb` varchar(255) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `Adresse` text,
  `CodePostal` varchar(5) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Zone` int(11) NOT NULL DEFAULT '0',
  `NumeroFormateur` varchar(255) DEFAULT NULL,
  `MembreAFUP` tinyint(1) DEFAULT NULL,
  `Valide` tinyint(1) DEFAULT NULL,
  `DateCreation` datetime DEFAULT NULL,
  `TailleSociete` int(11) NOT NULL DEFAULT '0',
  `Password` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `RaisonSociale` (`RaisonSociale`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=701 ;

--
-- Contenu de la table `annuairepro_MembreAnnuaire_iso`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuairepro_MembreAnnuaire_seq`
--

CREATE TABLE IF NOT EXISTS `annuairepro_MembreAnnuaire_seq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=773 ;

--
-- Contenu de la table `annuairepro_MembreAnnuaire_seq`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuairepro_TailleSociete`
--

CREATE TABLE IF NOT EXISTS `annuairepro_TailleSociete` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `Nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `annuairepro_Zone`
--

CREATE TABLE IF NOT EXISTS `annuairepro_Zone` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `Nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compta`
--

CREATE TABLE IF NOT EXISTS `compta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idclef` varchar(20) NOT NULL,
  `idoperation` tinyint(5) NOT NULL,
  `idcategorie` int(11) NOT NULL,
  `date_ecriture` date NOT NULL,
  `numero_operation` varchar(100) DEFAULT NULL,
  `nom_frs` varchar(50) NOT NULL,
  `montant` double(11,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `idmode_regl` tinyint(5) NOT NULL,
  `date_regl` date NOT NULL,
  `obs_regl` varchar(255) NOT NULL,
  `idevenement` tinyint(5) NOT NULL,
  `idcompte` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2546 ;

--
-- Contenu de la table `compta`
--

-- --------------------------------------------------------

--
-- Structure de la table `compta_categorie`
--

CREATE TABLE IF NOT EXISTS `compta_categorie` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `idevenement` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `compta_categorie`
--

-- --------------------------------------------------------

--
-- Structure de la table `compta_compte`
--

CREATE TABLE IF NOT EXISTS `compta_compte` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nom_compte` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `compta_compte`
--

-- --------------------------------------------------------

--
-- Structure de la table `compta_evenement`
--

CREATE TABLE IF NOT EXISTS `compta_evenement` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `evenement` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `compta_evenement`
--

-- --------------------------------------------------------

--
-- Structure de la table `compta_operation`
--

CREATE TABLE IF NOT EXISTS `compta_operation` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `operation` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Structure de la table `compta_periode`
--

CREATE TABLE IF NOT EXISTS `compta_periode` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `verouiller` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `compta_periode`
--

-- --------------------------------------------------------

--
-- Structure de la table `compta_reglement`
--

CREATE TABLE IF NOT EXISTS `compta_reglement` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `reglement` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Structure de la table `compta_simulation`
--

CREATE TABLE IF NOT EXISTS `compta_simulation` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `idclef` varchar(20) NOT NULL,
  `idcategorie` int(11) NOT NULL,
  `montant_theo` double(11,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idevenement` tinyint(5) NOT NULL,
  `idoperation` tinyint(5) NOT NULL,
  `periode` date NOT NULL,
  `verouiller` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `compta_simulation`
--

-- --------------------------------------------------------

--
-- Structure de la table `rdv_afup`
--

CREATE TABLE IF NOT EXISTS `rdv_afup` (
  `session` varchar(40) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nom` varchar(120) NOT NULL DEFAULT '',
  `prenom` varchar(120) NOT NULL DEFAULT '',
  `societe` varchar(120) NOT NULL DEFAULT '',
  `email` varchar(120) NOT NULL DEFAULT '',
  `telephone` varchar(20) NOT NULL DEFAULT '',
  `valide` tinyint(4) NOT NULL DEFAULT '0',
  `transmission` tinyint(2) NOT NULL DEFAULT '0',
  KEY `session` (`session`),
  KEY `valide` (`valide`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rdv_afup`
--

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
