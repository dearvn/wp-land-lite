<?php

namespace Dearvn\LandLite\Databases\Migrations;

use Dearvn\LandLite\Abstracts\DBMigrator;

/**
 * Products migration.
 */
class ProductsMigration extends DBMigrator {

    /**
     * Migrate the products table.
     *
     * @since 0.3.0
     *
     * @return void
     */
    public static function migrate() {
        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $schema_products = "CREATE TABLE IF NOT EXISTS `{$wpdb->landlite_products}` (
            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `slug` varchar(255) NOT NULL,
            `city_id` bigint(20) unsigned NOT NULL,
            `product_type_id` int(10) unsigned NOT NULL,
            `description` mediumtext NOT NULL,
            `is_active` tinyint(1) NOT NULL DEFAULT 1,
            `created_by` bigint(20) unsigned NOT NULL,
            `updated_by` bigint(20) unsigned NULL,
            `deleted_by` bigint(20) unsigned NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime NOT NULL,
            `deleted_at` datetime NULL,
            PRIMARY KEY (`id`),
            KEY `city_id` (`city_id`),
            UNIQUE KEY `slug` (`slug`),
            KEY `is_active` (`is_active`),
            KEY `product_type_id` (`product_type_id`),
            KEY `created_by` (`created_by`),
            KEY `updated_by` (`updated_by`)
        ) $charset_collate";

        // Create the tables.
        dbDelta( $schema_products );
    }
}
