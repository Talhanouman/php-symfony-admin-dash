<?php


namespace App\Entity\Account;

use Doctrine\ORM\Mapping as ORM;
use Pd\UserBundle\Model\Group as BaseGroup;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

class Group extends BaseGroup
{
}
