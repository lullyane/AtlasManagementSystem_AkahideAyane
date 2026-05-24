<?php
namespace App\Searchs;

interface DisplayUsers{
    public function resultUsers($keyword, $category, $updown, $gender, $role, $subjects);
}
