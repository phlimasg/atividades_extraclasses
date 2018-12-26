<?php

use Illuminate\Database\Seeder;


class turmas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('turmas')->insert([
        ['descricao' => '1º ano EF',
        'cod' => 'EFER01A'],
        ['descricao' => '2º ano EF',
        'cod' => 'EFER02A'],        
        ['descricao' => '3º ano EF',
        'cod' => 'EFER03A'],
        ['descricao' => '4º ano EF',
        'cod' => 'EFER04A'],
        ['descricao' => '5º ano EF',
        'cod' => 'EFER05A'],
        ['descricao' => '6º ano EF',
        'cod' => 'EFER06A'],
        ['descricao' => '7º ano EF',
        'cod' => 'EFER07A'],
        ['descricao' => '8º ano EF',
        'cod' => 'EFER08A'],
        ['descricao' => '9º ano EF',
        'cod' => 'EFER09A'],
        ['descricao' => '1º ano EM',
        'cod' => 'EMER01A'],
        ['descricao' => '2º ano EM',
        'cod' => 'EMER02A'],
        ['descricao' => '3º ano EM',
        'cod' => 'EMER03A'],
        ['descricao' => 'Creche III',
        'cod' => 'EIERCR3'],
        ['descricao' => 'Pré I',
        'cod' => 'EIERP1'],
        ['descricao' => 'Pré II',
        'cod' => 'EIERP2'],
      ]);
    }
}
