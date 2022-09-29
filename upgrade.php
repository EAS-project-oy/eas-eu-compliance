<?php

function eascompliance_upgrade_init()
{
	global $wpdb;

	$wpdb->query("
        CREATE TABLE {$wpdb->prefix}eascompliance_product_locations 
        (
              product_id int NOT NULL
            , location_id int NOT NULL
        )
    ");

	if ($wpdb->last_error) {
		throw new Exception($wpdb->last_error);
	}

	$wpdb->query("
        CREATE TABLE {$wpdb->prefix}eascompliance_locations (
              location_id int NOT NULL AUTO_INCREMENT
            , location_name varchar(100)
            , location_country varchar(2) NOT NULL
            , location_full_address varchar(1000)                                                 
            , location_delivery_countries varchar(100)                                    
            , PRIMARY KEY (location_id)
        )
    ");

	if ($wpdb->last_error) {
		throw new Exception($wpdb->last_error);
	}

}
