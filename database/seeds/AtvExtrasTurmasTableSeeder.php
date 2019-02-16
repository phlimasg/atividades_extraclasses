<?php

use Illuminate\Database\Seeder;

class AtvExtrasTurmasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atv_extra_turmas')->truncate();
        DB::table('atv_extra_turmas')->insert([
            [
                //1
                'descricao_turma'=>'Terça Feira',
                'hora_ini'=>'18:30:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor' => '230',
                'dia' => 'Terça Feira',
                'user' => 'sistema',
                'atv_extra_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //2
                'descricao_turma'=>'Quinta Feira',
                'hora_ini'=>'18:30:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor'=>'230',
                'dia' => 'Quinta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //3
                'descricao_turma'=>'Turma 1 - Inicio dia 15/03',
                'hora_ini'=>'13:00:00',
                'hora_fim'=>'14:30:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Sexta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //4
                'descricao_turma'=>'Turma 2 - Inicio dia 15/03',
                'hora_ini'=>'14:30:00',
                'hora_fim'=>'16:00:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Sexta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //5
                'descricao_turma'=>'Turma 3 - Inicio dia 22/03',
                'hora_ini'=>'13:00:00',
                'hora_fim'=>'14:30:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Sexta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //6
                'descricao_turma'=>'Turma 4 - Inicio dia 22/03',
                'hora_ini'=>'14:30:00',
                'hora_fim'=>'16:00:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Sexta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //7
                'descricao_turma'=>'Turma 1 - Inicio dia 15/03',
                'hora_ini'=>'13:30:00',
                'hora_fim'=>'14:30:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Terça Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //8
                'descricao_turma'=>'Turma 2 - Inicio dia 15/03',
                'hora_ini'=>'18:45:00',
                'hora_fim'=>'19:45:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Terça Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //9
                'descricao_turma'=>'Turma 3 - Inicio dia 22/03',
                'hora_ini'=>'13:30:00',
                'hora_fim'=>'14:30:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Terça Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //10
                'descricao_turma'=>'Turma 4 - Inicio dia 22/03',
                'hora_ini'=>'18:45:00',
                'hora_fim'=>'19:45:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Terça Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //11
                'descricao_turma'=>'Turma 5 - Inicio dia 15/03',
                'hora_ini'=>'13:30:00',
                'hora_fim'=>'14:30:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Quinta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //12
                'descricao_turma'=>'Turma 6 - Inicio dia 15/03',
                'hora_ini'=>'18:45:00',
                'hora_fim'=>'19:45:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Quinta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //13
                'descricao_turma'=>'Turma 7 - Inicio dia 22/03',
                'hora_ini'=>'13:30:00',
                'hora_fim'=>'14:30:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Quinta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //14
                'descricao_turma'=>'Turma 8 - Inicio dia 22/03',
                'hora_ini'=>'18:45:00',
                'hora_fim'=>'19:45:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Quinta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //15
                'descricao_turma'=>'Turma 9 - Inicio dia 15/03',
                'hora_ini'=>'13:30:00',
                'hora_fim'=>'14:30:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Quarta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //16
                'descricao_turma'=>'Turma 10 - Inicio dia 15/03',
                'hora_ini'=>'18:45:00',
                'hora_fim'=>'19:45:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Quarta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //17
                'descricao_turma'=>'Turma 11 - Inicio dia 22/03',
                'hora_ini'=>'13:30:00',
                'hora_fim'=>'14:30:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Quarta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //18
                'descricao_turma'=>'Turma 12 - Inicio dia 22/03',
                'hora_ini'=>'18:45:00',
                'hora_fim'=>'19:45:00',                
                'vagas' => '20',
                'valor'=>'490',
                'dia' => 'Quarta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //19
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'14:00:00',
                'hora_fim'=>'16:00:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Terça Feira',
                'user' => 'sistema',
                'atv_extra_id' => '4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //20
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'16:00:00',
                'hora_fim'=>'17:30:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Quinta Feira',
                'user' => 'sistema',
                'atv_extra_id' => '5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //21
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'13:30:00',
                'hora_fim'=>'15:00:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Quarta-Feira 13:30 às 15h| Sexta-Feira 10h às 11:30h',
                'user' => 'sistema',
                'atv_extra_id' => '6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //22
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:00:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '7',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //23
                'descricao_turma'=>'Nível 1',
                'hora_ini'=>'18:30:00',
                'hora_fim'=>'20:00:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Segunda-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //24
                'descricao_turma'=>'Nível II',
                'hora_ini'=>'18:30:00',
                'hora_fim'=>'20:00:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //25
                'descricao_turma'=>'Nível III',
                'hora_ini'=>'18:30:00',
                'hora_fim'=>'20:00:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //26
                'descricao_turma'=>'Nível IV',
                'hora_ini'=>'18:30:00',
                'hora_fim'=>'20:00:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //27
                'descricao_turma'=>'Turma 1 - 6 e 7 anos',
                'hora_ini'=>'18:00:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Segunda-Feira | Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '9',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //28
                'descricao_turma'=>'Turma 2 - 8 e 9 anos',
                'hora_ini'=>'18:00:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '9',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //29
                'descricao_turma'=>'Turma 3 - 10 e 11 anos',
                'hora_ini'=>'18:00:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '9',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //30
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'14:00:00',
                'hora_fim'=>'15:45:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '10',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //31
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'17:00:00',
                'hora_fim'=>'18:30:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '11',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //32
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'14:00:00',
                'hora_fim'=>'15:00:00',                
                'vagas' => '20',
                'valor'=>'208',
                'dia' => 'Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '12',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //33
                'descricao_turma'=>'T2N',
                'hora_ini'=>'18:15:00',
                'hora_fim'=>'20:15:00',                
                'vagas' => '20',
                'valor'=>'240',
                'dia' => 'Segunda-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '13',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //34
                'descricao_turma'=>'T3',
                'hora_ini'=>'14:00:00',
                'hora_fim'=>'16:00:00',                
                'vagas' => '20',
                'valor'=>'240',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '13',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //35
                'descricao_turma'=>'T3N',
                'hora_ini'=>'18:30:00',
                'hora_fim'=>'20:30:00',                
                'vagas' => '20',
                'valor'=>'240',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '13',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //36
                'descricao_turma'=>'T4',
                'hora_ini'=>'14:00:00',
                'hora_fim'=>'16:00:00',                
                'vagas' => '20',
                'valor'=>'240',
                'dia' => 'Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '13',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //37
                'descricao_turma'=>'T4N',
                'hora_ini'=>'18:30:00',
                'hora_fim'=>'20:30:00',                
                'vagas' => '20',
                'valor'=>'240',
                'dia' => 'Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '13',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //38
                'descricao_turma'=>'T5A',
                'hora_ini'=>'18:30:00',
                'hora_fim'=>'20:30:00',                
                'vagas' => '20',
                'valor'=>'240',
                'dia' => 'Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '13',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //39
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'12:20:00',
                'hora_fim'=>'20:30:00',                
                'vagas' => '20',
                'valor'=>'00',
                'dia' => 'Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '14',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //40
                'descricao_turma'=>'Turma 2',
                'hora_ini'=>'12:20:00',
                'hora_fim'=>'12:30:00',                
                'vagas' => '20',
                'valor'=>'00',
                'dia' => 'Sexta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '14',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //41
                'descricao_turma'=>'Turma 3',
                'hora_ini'=>'18:00:00',
                'hora_fim'=>'19:00:00',                
                'vagas' => '20',
                'valor'=>'00',
                'dia' => 'Sexta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '14',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //42
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:00:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor'=>'00',
                'dia' => 'Sexta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '15',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //43
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:10:00',
                'hora_fim'=>'19:10:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Terça-Feira | Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '16',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //44
                'descricao_turma'=>'Turma 2',
                'hora_ini'=>'19:10:00',
                'hora_fim'=>'20:10:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Terça-Feira | Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '16',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //45
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:10:00',
                'hora_fim'=>'19:00:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Terça-Feira | Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '17',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //46
                'descricao_turma'=>'Turma 2',
                'hora_ini'=>'19:00:00',
                'hora_fim'=>'19:50:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Terça-Feira | Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '17',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //47
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:10:00',
                'hora_fim'=>'19:00:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Segunda-Feira | Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '18',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //48
                'descricao_turma'=>'Turma 2',
                'hora_ini'=>'19:00:00',
                'hora_fim'=>'19:50:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Segunda-Feira | Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '18',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //49
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:10:00',
                'hora_fim'=>'19:00:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Segunda-Feira | Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '19',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //50
                'descricao_turma'=>'Turma 2',
                'hora_ini'=>'19:00:00',
                'hora_fim'=>'19:50:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Segunda-Feira | Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '19',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //51
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:10:00',
                'hora_fim'=>'19:00:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Terça-Feira | Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '20',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //52
                'descricao_turma'=>'Turma 2',
                'hora_ini'=>'19:00:00',
                'hora_fim'=>'19:50:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Terça-Feira | Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '20',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //53
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:10:00',
                'hora_fim'=>'19:00:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Quinta-Feira | Sexta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '21',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //54
                'descricao_turma'=>'Turma 2',
                'hora_ini'=>'18:00:00',
                'hora_fim'=>'19:50:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Quinta-Feira | Sexta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '21',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //55
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:10:00',
                'hora_fim'=>'19:00:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Quinta-Feira | Sexta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '22',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //56
                'descricao_turma'=>'Turma 2',
                'hora_ini'=>'18:00:00',
                'hora_fim'=>'19:50:00',                
                'vagas' => '20',
                'valor'=>'95',
                'dia' => 'Quinta-Feira | Sexta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '22',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //57
                'descricao_turma'=>'Fraldinha I',
                'hora_ini'=>'18:05:00',
                'hora_fim'=>'18:55:00',                
                'vagas' => '20',
                'valor'=>'150',
                'dia' => 'Terça-Feira | Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '23',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //58
                'descricao_turma'=>'Fraldinha II',
                'hora_ini'=>'18:05:00',
                'hora_fim'=>'18:55:00',                
                'vagas' => '20',
                'valor'=>'150',
                'dia' => 'Segunda-Feira | Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '23',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //59
                'descricao_turma'=>'Pré Mirim I',
                'hora_ini'=>'18:05:00',
                'hora_fim'=>'18:55:00',                
                'vagas' => '20',
                'valor'=>'150',
                'dia' => 'Segunda-Feira | Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '23',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //60
                'descricao_turma'=>'Pré Mirim II',
                'hora_ini'=>'18:55:00',
                'hora_fim'=>'19:45:00',                
                'vagas' => '20',
                'valor'=>'150',
                'dia' => 'Segunda-Feira | Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '23',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //61
                'descricao_turma'=>'Mirim I',
                'hora_ini'=>'18:05:00',
                'hora_fim'=>'18:55:00',                
                'vagas' => '20',
                'valor'=>'150',
                'dia' => 'Terça-Feira | Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '23',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //62
                'descricao_turma'=>'Mirim II',
                'hora_ini'=>'18:55:00',
                'hora_fim'=>'19:45:00',                
                'vagas' => '20',
                'valor'=>'150',
                'dia' => 'Segunda-Feira | Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '23',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //63
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'07:30:00',
                'hora_fim'=>'12:00:00',                
                'vagas' => '20',
                'valor'=>'215',
                'dia' => 'Sábado',
                'user' => 'sistema',
                'atv_extra_id' => '24',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //64
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:15:00',
                'hora_fim'=>'21:00:00',                
                'vagas' => '20',
                'valor'=>'185',
                'dia' => 'Sexta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '25',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //65
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'18:20:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor'=>'340',
                'dia' => 'Segunda-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '26',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //66
                'descricao_turma'=>'Turma 2 - Exclusivo para Manhã',
                'hora_ini'=>'12:40:00',
                'hora_fim'=>'14:00:00',                
                'vagas' => '20',
                'valor'=>'340',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '26',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //67
                'descricao_turma'=>'Turma 3',
                'hora_ini'=>'18:20:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor'=>'340',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '26',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //68
                'descricao_turma'=>'Turma 4',
                'hora_ini'=>'12:10:00',
                'hora_fim'=>'13:30:00',                
                'vagas' => '20',
                'valor'=>'340',
                'dia' => 'Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '26',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //69
                'descricao_turma'=>'Turma 5',
                'hora_ini'=>'18:20:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor'=>'340',
                'dia' => 'Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '26',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //70
                'descricao_turma'=>'Turma 6',
                'hora_ini'=>'18:20:00',
                'hora_fim'=>'19:30:00',                
                'vagas' => '20',
                'valor'=>'340',
                'dia' => 'Sexta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '26',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //71
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'12:40:00',
                'hora_fim'=>'13:40:00',                
                'vagas' => '35',
                'valor'=>'30',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '27',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //72
                'descricao_turma'=>'Turma 2',
                'hora_ini'=>'11:30:00',
                'hora_fim'=>'12:30:00',                
                'vagas' => '35',
                'valor'=>'30',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '27',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //73
                'descricao_turma'=>'Turma 3',
                'hora_ini'=>'12:40:00',
                'hora_fim'=>'13:40:00',                
                'vagas' => '35',
                'valor'=>'30',
                'dia' => 'Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '27',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //74
                'descricao_turma'=>'Turma 4',
                'hora_ini'=>'12:40:00',
                'hora_fim'=>'13:40:00',                
                'vagas' => '35',
                'valor'=>'30',
                'dia' => 'Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '27',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //75
                'descricao_turma'=>'Turma 5',
                'hora_ini'=>'12:40:00',
                'hora_fim'=>'13:40:00',                
                'vagas' => '35',
                'valor'=>'30',
                'dia' => 'Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '27',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //76
                'descricao_turma'=>'Turma 6',
                'hora_ini'=>'12:40:00',
                'hora_fim'=>'13:40:00',                
                'vagas' => '35',
                'valor'=>'30',
                'dia' => 'Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '27',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //77
                'descricao_turma'=>'Turma 7',
                'hora_ini'=>'13:30:00',
                'hora_fim'=>'15:00:00',                
                'vagas' => '35',
                'valor'=>'30',
                'dia' => 'Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '27',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //78
                'descricao_turma'=>'Turma 8',
                'hora_ini'=>'12:40:00',
                'hora_fim'=>'13:40:00',                
                'vagas' => '35',
                'valor'=>'30',
                'dia' => 'Quinta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '27',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //79
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'14:00:00',
                'hora_fim'=>'15:00:00',                
                'vagas' => '35',
                'valor'=>'30',
                'dia' => 'Terça-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '28',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                //80
                'descricao_turma'=>'Turma 1',
                'hora_ini'=>'12:00:00',
                'hora_fim'=>'13:30:00',                
                'vagas' => '20',
                'valor'=>'340',
                'dia' => 'Quarta-Feira',
                'user' => 'sistema',
                'atv_extra_id' => '26',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],


        ]);
    }
}
