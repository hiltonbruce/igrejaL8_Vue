<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('record_types')->delete();
        DB::insert(
            'insert into record_types (id,name,description,user_id )
            values (?, ?, ?, ?)',
            [1, "Carta de Mudança", "Carta de Transferência para outra Igreja ou congreção", 1]
        );
        DB::insert(
            'insert into record_types (id,name,description,user_id )
            values (?, ?, ?, ?)',
            [2, "Disciplina", "Regsitro de Disciplina", 1]
        );
        DB::insert(
            'insert into record_types (id,name,description,user_id )
            values (?, ?, ?, ?)',
            [3, "Reconciliação", "Registro de Reconciliação", 1]
        );
    }
}
