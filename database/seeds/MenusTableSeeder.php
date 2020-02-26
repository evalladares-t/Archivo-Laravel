<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Gestión de sistemas
        Menu::create([
            'padre' => null,
            'name' => 'Opciones del Sistema',
            ]);

        Menu::create([
            'padre' => 1,
            'name' => 'Gestionar perfiles',
            ]);

        Menu::create([
            'padre' => 1,
            'name' => 'Gestionar Usuarios',
            ]);
            
        //Fondo documental
        Menu::create([
            'padre' => null,
            'name' => 'Fondo Documental',
            ]);

        Menu::create([
            'padre' => 4,
            'name' => 'Archivo',
            ]);

        Menu::create([
            'padre' => 4,
            'name' => 'Audio',
            ]);

        Menu::create([
            'padre' => 4,
            'name' => 'Tomo',
            ]);

        Menu::create([
            'padre' => 4,
            'name' => 'Plano',
            ]);


        //Servicios
        Menu::create([
            'padre' => null,
            'name' => 'Servicios',
            ]);

        Menu::create([
            'padre' => 9,
            'name' => 'Mantenimiento de Instrucciones Archivísticas',
            ]);

        Menu::create([
            'padre' => 9,
            'name' => 'Mantenimiento de Servicios Archivísticos',
            ]);

        Menu::create([
            'padre' => 9,
            'name' => 'Generador de Servicios',
            ]);


        //Mantenimientos
        Menu::create([
            'padre' => null,
            'name' => 'Mantenimientos',
            ]);

        Menu::create([
            'padre' => 13,
            'name' => 'Mantenimiento de Ubicación Topográfico',
            ]);

        Menu::create([
            'padre' => 13,
            'name' => 'Mantenimiento de Secciones Documentales',
            ]);

        Menu::create([
            'padre' => 13,
            'name' => 'Mantenimiento de Series Documentales',
            ]);
        Menu::create([
            'padre' => 13,
            'name' => 'MMantenimiento de Administración de Archivos',
            ]);

        Menu::create([
            'padre' => 13,
            'name' => 'Mantenimiento de Documentos de Archivo',
            ]);

        //Reportes
        Menu::create([
            'padre' => null,
            'name' => 'Reportes',
            ]);

        Menu::create([
            'padre' => 19,
            'name' => 'Reporte de Archivos',
            ]);

        Menu::create([
            'padre' => 19,
            'name' => 'Reporte de Servicios',
            ]);

        Menu::create([
            'padre' => 19,
            'name' => 'Reporte Registro de Archivos',
            ]);
        Menu::create([
            'padre' => 19,
            'name' => 'Reporte Registro de Prestamos',
            ]);
            
    }
}
