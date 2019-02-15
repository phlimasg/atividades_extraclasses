<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurmasAutorizadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('atv_extra_turmas_autorizadas')->insert([
            [
                'user'=>'sistema',
                'turmas_id'=>'6',
                'atv_extra_turma_id'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user'=>'sistema',
                'turmas_id'=>'7',
                'atv_extra_turma_id'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user'=>'sistema',
                'turmas_id'=>'8',
                'atv_extra_turma_id'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user'=>'sistema',
                'turmas_id'=>'9',
                'atv_extra_turmas_id'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user'=>'sistema',
                'turmas_id'=>'10',
                'atv_extra_turma_id'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'user'=>'sistema',
                'turmas_id'=>'12',
                'atv_extra_turma_id'=>'1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],            
        ]);
    }
}
