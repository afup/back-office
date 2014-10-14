<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140928165530 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $createTableQueries = file_get_contents(dirname(__FILE__) . '/sql/create_table_queries.sql');
        $this->addSql($createTableQueries);

        $insertQueries = file_get_contents(dirname(__FILE__) . '/sql/insert_queries.sql');
        $this->addSql($insertQueries);
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        
        $this->addSql('DROP TABLE IF EXISTS afup_accreditation_presse;
            DROP TABLE IF EXISTS afup_antenne;
            DROP TABLE IF EXISTS afup_blacklist;
            DROP TABLE IF EXISTS afup_compta_facture;
            DROP TABLE IF EXISTS afup_compta_facture_details;
            DROP TABLE IF EXISTS afup_conferenciers;
            DROP TABLE IF EXISTS afup_conferenciers_sessions;
            DROP TABLE IF EXISTS afup_contacts;
            DROP TABLE IF EXISTS afup_cotisations;
            DROP TABLE IF EXISTS afup_email;
            DROP TABLE IF EXISTS afup_facturation_forum;
            DROP TABLE IF EXISTS afup_forum;
            DROP TABLE IF EXISTS afup_forum_coupon;
            DROP TABLE IF EXISTS afup_forum_partenaires;
            DROP TABLE IF EXISTS afup_forum_planning;
            DROP TABLE IF EXISTS afup_forum_salle;
            DROP TABLE IF EXISTS afup_forum_sessions_commentaires;
            DROP TABLE IF EXISTS afup_inscriptions_rappels;
            DROP TABLE IF EXISTS afup_inscription_forum;
            DROP TABLE IF EXISTS afup_logs;
            DROP TABLE IF EXISTS afup_niveau_partenariat;
            DROP TABLE IF EXISTS afup_oeuvres;
            DROP TABLE IF EXISTS afup_pays;
            DROP TABLE IF EXISTS afup_personnes_morales;
            DROP TABLE IF EXISTS afup_personnes_physiques;
            DROP TABLE IF EXISTS afup_planete_billet;
            DROP TABLE IF EXISTS afup_planete_flux;
            DROP TABLE IF EXISTS afup_presences_assemblee_generale;
            DROP TABLE IF EXISTS afup_rendezvous;
            DROP TABLE IF EXISTS afup_rendezvous_inscrits;
            DROP TABLE IF EXISTS afup_rendezvous_slides;
            DROP TABLE IF EXISTS afup_sessions;
            DROP TABLE IF EXISTS afup_sessions_note;
            DROP TABLE IF EXISTS afup_sessions_vote;
            DROP TABLE IF EXISTS afup_site_article;
                  DROP TABLE IF EXISTS afup_site_feuille;
            DROP TABLE IF EXISTS afup_site_rubrique;
            DROP TABLE IF EXISTS afup_tags;
            DROP TABLE IF EXISTS afup_votes;
            DROP TABLE IF EXISTS afup_votes_poids;
            DROP TABLE IF EXISTS annuairepro_Activite;
            DROP TABLE IF EXISTS annuairepro_ActiviteMembre;
            DROP TABLE IF EXISTS annuairepro_FormeJuridique;
            DROP TABLE IF EXISTS annuairepro_MembreAnnuaire;
            DROP TABLE IF EXISTS annuairepro_MembreAnnuaire_iso;
            DROP TABLE IF EXISTS annuairepro_MembreAnnuaire_seq;
            DROP TABLE IF EXISTS annuairepro_TailleSociete;
            DROP TABLE IF EXISTS annuairepro_Zone;
            DROP TABLE IF EXISTS compta;
            DROP TABLE IF EXISTS compta_categorie;
            DROP TABLE IF EXISTS compta_compte;
            DROP TABLE IF EXISTS compta_evenement;
            DROP TABLE IF EXISTS compta_operation;
            DROP TABLE IF EXISTS compta_periode;
            DROP TABLE IF EXISTS compta_reglement;
            DROP TABLE IF EXISTS compta_simulation;
            DROP TABLE IF EXISTS rdv_afup;');
    }
}
