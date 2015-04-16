<?php
namespace App\Model;

class Category extends \PHPixie\ORM\Model {
    protected $has_many = array(
        'photos' => array(
            'model' => 'photogalery',
            'key'   => 'id_categories'
        )
    );
}