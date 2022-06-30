<?php

declare(strict_types=1);

namespace SwagFristPlugin\Migration;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1656564189 extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1656564189;
    }

    /**
     * @throws Exception
     */
    public function update(Connection $connection): void
    {
        $connection->executeStatement(
            <<<'SQL'
            CREATE TABLE IF NOT EXISTS `swag_frist_plugin` (
                `id`            BINARY(16)  NOT NULL,
                `activate`      TINYINT(1) NOT NULL DEFAULT '0',
                `name`          VARCHAR(50) NOT NULL,
                `firstname`     VARCHAR(50) NOT NULL,
                `role`          VARCHAR(50) NOT NULL,
                `images`        VARCHAR(50) NOT NULL,
                `website`       VARCHAR(100) NULL,
                `created_at`    DATETIME(3) NOT NULL,
                `updated_at`    DATETIME(3) NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL
        );
    }



    public function updateDestructive(Connection $connection): void
    {
        // implement update destructive
    }
}
