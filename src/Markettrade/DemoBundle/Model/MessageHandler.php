<?php

namespace Markettrade\DemoBundle\Model;

use Symfony\Component\HttpFoundation\Request;

interface MessageHandler
{
    public function get($id);
    public function post(Request $request);
} 