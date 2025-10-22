<?php
namespace App\Providers;

use Illuminate\Support\Facades\DB;

class Seeder extends Seeder {

public function seeder ()
{
    $sqlPath = database_path('sql/tickora_db.sql'); // Ruta del archivo SQL
    $sql = file_get_contents($sqlPath);
    DB::unprepared($sql);
}

}