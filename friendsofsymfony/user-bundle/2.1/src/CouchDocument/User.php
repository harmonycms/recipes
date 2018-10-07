<?php

namespace App\CouchDocument;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ODM\CouchDB\Mapping\Annotations as CouchDB;

/**
 * @CouchDB\Document
 */
class User extends BaseUser
{

    /**
     * @CouchDB\Id
     */
    protected $id;
}