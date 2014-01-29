#!/usr/bin/env php

<?php

require 'config/bootstrap.php';

use Crawler\WebMotors;
use Crawler\data\layer\storage\maria\MariaDBBrandDataAccess as BrandDataAccess;

try {
  $wb = new WebMotors();

  $instance = new BrandDataAccess(
    new \PDO(
      sprintf(
        'mysql:host=%s;dbname=%s', 
        'localhost', 
        'boaproposta'), 
        'root', 
        ''
        ));


  foreach ($wb->getBrands() as $brand) {
    echo $brand->count();
    $instance->insert($brand);
  }

  echo 'Finished!';  
} catch (Exception $e) {
  echo $e->getMessage();
}