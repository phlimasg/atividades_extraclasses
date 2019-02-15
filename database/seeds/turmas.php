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
        [//1
          'descricao' => '1º ano EF',
        'cod' => 'EFER01A'],
        [//2
          'descricao' => '2º ano EF',
        'cod' => 'EFER02A'],        
        [//3
          'descricao' => '3º ano EF',
        'cod' => 'EFER03A'],
        [//4
          'descricao' => '4º ano EF',
        'cod' => 'EFER04A'],
        [//5
          'descricao' => '5º ano EF',
        'cod' => 'EFER05A'],
        [//6
          'descricao' => '6º ano EF',
        'cod' => 'EFER06A'],
        [//7
          'descricao' => '7º ano EF',
        'cod' => 'EFER07A'],
        [//8
          'descricao' => '8º ano EF',
        'cod' => 'EFER08A'],
        [//9
          'descricao' => '9º ano EF',
        'cod' => 'EFER09A'],
        [//10
          'descricao' => '1º ano EM',
        'cod' => 'EMER01A'],
        [//11
          'descricao' => '2º ano EM',
        'cod' => 'EMER02A'],
        [//12
          'descricao' => '3º ano EM',
        'cod' => 'EMER03A'],
        [//13
          'descricao' => 'Creche III',
        'cod' => 'EIERCR3'],
        [//14
          'descricao' => 'Pré I',
        'cod' => 'EIERP1'],
        [//15
          'descricao' => 'Pré II',
        'cod' => 'EIERP2'],
      ]);
    }
}
