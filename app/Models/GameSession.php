<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameSession extends Model
{
// таблица бд, ассоциированная с моделью

    protected $table = 'game_session';
    // первичный ключ таблицы бд
    protected $primaryKey = 'game_session_id';

    // соединение с бд которое должна использовать модель
    protected $connection = "pgsql";

}

