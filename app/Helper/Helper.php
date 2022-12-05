<?php

use Ramsey\Uuid\Uuid;

function generate_uuid() {
	$uuid = Uuid::uuid1();
	return $uuid->toString();
}

function page_per_view() {
	return array('10' => '10', '25' => '25', '50' => '50', '100' => '100');
}