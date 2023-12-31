<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231102123947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
            CREATE TABLE IF NOT EXISTS `ipm_cpu_usage_details` (
              `server_name` varchar(64) DEFAULT NULL,
              `hostname` varchar(32) DEFAULT NULL,
              `script_name` varchar(128) DEFAULT NULL,
              `cpu_peak_usage` float DEFAULT NULL,
              `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");

        $this->addSql("ALTER TABLE  `ipm_report_2_by_hostname_and_server` ADD  `cpu_peak_usage_90` FLOAT NULL;");
        $this->addSql("ALTER TABLE  `ipm_report_2_by_hostname_and_server` ADD  `cpu_peak_usage_95` FLOAT NULL;");
        $this->addSql("ALTER TABLE  `ipm_report_2_by_hostname_and_server` ADD  `cpu_peak_usage_99` FLOAT NULL;");
        $this->addSql("ALTER TABLE  `ipm_report_2_by_hostname_and_server` ADD  `cpu_peak_usage_100` FLOAT NULL;");

        $this->addSql("ALTER TABLE `ipm_cpu_usage_details` ADD INDEX `impu_sn_ca` (`server_name`, `created_at`);");
        $this->addSql("ALTER TABLE `ipm_cpu_usage_details` ADD INDEX `impu_ca_cpu` (`created_at`, `cpu_peak_usage`);");
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DROP TABLE `ipm_cpu_usage_details`;");
        $this->addSql("ALTER TABLE `ipm_report_2_by_hostname_and_server` DROP `cpu_peak_usage_90`;");
        $this->addSql("ALTER TABLE `ipm_report_2_by_hostname_and_server` DROP `cpu_peak_usage_90`;");
        $this->addSql("ALTER TABLE `ipm_report_2_by_hostname_and_server` DROP `cpu_peak_usage_99`;");
        $this->addSql("ALTER TABLE `ipm_report_2_by_hostname_and_server` DROP `cpu_peak_usage_100`;");

        $this->addSql("ALTER TABLE `ipm_cpu_usage_details` DROP INDEX `impu_sn_ca`");
        $this->addSql("ALTER TABLE `ipm_cpu_usage_details` DROP INDEX `impu_ca_cpu`");
    }
}
