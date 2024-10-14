<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Schema::create('roles', function (Blueprint $table) {
    $table->id();
    $table->string('role', 50);
});

// migrations/create_users_table.php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('username', 50);
    $table->string('password', 50);
    $table->string('role', 20);
});
