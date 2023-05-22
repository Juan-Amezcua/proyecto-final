<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Inmueble;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Juan Amezcua',
            'email' => 'juan@test.com'
        ]);

        Inmueble::factory(6)->create([
            'user_id' => $user->id
        ]);

        User::factory(4)->create();

        $roles = ['creador', 'contribuidor', 'administrador'];
        foreach ($roles as $role) {
            Role::create(['nombre' => $role]);
        }

        foreach (User::all() as $user) {
            foreach (Role::all() as $role) {
                $user->roles()->attach($role->id);
            }
        }


        /* Inmueble::create([
            'titulo' => 'Departamento en renta',
            'etiquetas' => '2 rec, 2 baños, 1 estac',
            'descripcion' => 'EN RENTA Moderno departamento Tipo ESTUIDIO totalmente amueblado, en una de las zonas mas privilegiadas de la ciudad LA ZONA CHAPULTEPEC en Guadalajara',
            'precio' => '15,000.00',
            'ubicacion' => 'Calle Vidrio, Americana, Guadalajara',
            'contacto' => 'email1@email.com'
        ]); */

        /* Inmueble::create([
            'titulo' => 'Departamento amueblado',
            'etiquetas' => '1 rec, 1 baño, 1 estac',
            'descripcion' => 'Ubicado en el corazón financiero de la ciudad. Stratto Americas es un concepto único en la ciudad que ofrece todo lo que necesitas, seguridad 24hrs, excelente ubicación, amenidades de lujo, las mejores vistas a la ciudad y atención personalizada.',
            'precio' => '15,000.00',
            'ubicacion' => 'Mar Mediterráneo 1254, 44610 Guadalajara, Jal.
            ',
            'contacto' => 'email2@email.com'
        ]); */

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
