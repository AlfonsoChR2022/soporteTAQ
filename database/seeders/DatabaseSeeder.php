<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\categorias;
use App\Models\tickets;
use App\Models\datempre;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        $this -> call(RoleSeeder::class);

        // User::factory()->count(4)->create();
        
        User::factory()->create([
            'name' => 'Alfonso CH R',
            'email' => 'alfonso.chavez.rgz@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');
        User::factory()->create([
            'name' => 'Juan Admin',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');
        
        User::factory()->create([
            'name' => 'José contraloria',
            'email' => 'contraloria@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Contraloria');

        User::factory()->create([
            'name' => 'Pedro S Hardware',
            'email' => 'Soporte_hardware@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Soporte_hardware');
        User::factory()->create([
            'name' => 'Moises S Software',
            'email' => 'Soporte_software@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Soporte_software');
        User::factory()->create([
            'name' => 'Moises S BD',
            'email' => 'Soporte_BD@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Soporte_BD');

        User::factory()->create([
            'name' => 'María Cliente',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Cliente');

        User::factory()->count(9)->create();

        categorias::create(['categoria' => 'Ciberseguridad (correo y antivirus)']);
        categorias::create(['categoria' => 'Copias de seguridad']);
        categorias::create(['categoria' => 'Gestión de cuentas de usuario']);
        categorias::create(['categoria' => 'Hosting y computación en la nube']);
        categorias::create(['categoria' => 'Mantenimiento de aplicaciones']);
        categorias::create(['categoria' => 'Mantenimiento de bases de datos']);
        categorias::create(['categoria' => 'Mantenimiento de servidores']);
        categorias::create(['categoria' => 'Mantenimiento y reparación de Impresoras']);
        categorias::create(['categoria' => 'Mantenimiento y reparación de PCs']);
        categorias::create(['categoria' => 'Redes, Telefonía y cableado ']);


    datempre::create([
            'cla_empre' => '016',
            'descrip' => 'TERMINAL DE AUTOBUSES DE QUERETARO',
    ]);


    // tickets::factory()->count(100)->create();

    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Permisos para acceder al sistema principal',
        'id_categoria' => 1,
        'descrip' => 'Me acaban de asignar la actividad de revisar los productos en almacén principal y requiero permisos para mi usuario',
        'solucion' => '1.-Verificar que el usuario se le asigno la actividad.  2.-Entrar al sistema y asignarle permisos 3.-Notificar por correo electrónico',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16),
        'atiende' => rand(4,6),
        'fecha_cierre' => now()]
    );
    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Recuperación de contraseña de usuario',
        'id_categoria' => 1,
        'descrip' => 'Olvide mi contraseña del sistema principal, requiero que me la recuperen o me den otra',
        'solucion' => '',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16)]
    );
    // 'user' => User::all()->random()->id]

    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'El ventilador de mi laptop ya no enfría',
        'id_categoria' => 2,
        'descrip' => 'El día de ayer estuvo haciendo ruido el ventilador de la laptop, pero hoy ya no se mueve nada',
        'solucion' => '1.-Solicitar el equipo de computo 2.-Verificar que no funciona el ventilador 3.-Solicitar la pieza a compras 4. Hacer el cambio y entregar al cliente ',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16),
        'atiende' => rand(4,6),
        'fecha_cierre' => now()]
    );
    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'El CPU ya no quiere encender',
        'id_categoria' => 2,
        'descrip' => 'Hoy al intentar encender el CPU ya no arranca, no enciende ninguna luz y tampoco hace algún ruido',
        'solucion' => '',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16)]
    );

    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'La pagina web de facturación no esta cargando',
        'id_categoria' => 3,
        'descrip' => 'Al intentar acceder a la pagina web de facturación, manda un error que la pagina no existe',
        'solucion' => '1.-Verificar que error indica la pagina web 2.-Contactat con el desarrollado y/o proveedor para solucionar 3.-Verificar que el error esta resuelto',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16),
        'atiende' => rand(4,6),
        'fecha_cierre' => now()]
    );
    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Las carpetas públicas de los empleados no se ven',
        'id_categoria' => 3,
        'descrip' => 'Al intentar acceder a las carpetas públicas del departamento de CONTROLES, indica que no existe la ruta',
        'solucion' => '',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16)]
    );

    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Se tarda demasiado en entrar al modulo de facturas',
        'id_categoria' => 4,
        'descrip' => 'Desde el lunes al acceder al modulo de facturas esta tardando 30 minutos en acceder',
        'solucion' => '1.-Verificar el tiempo en acceder a facturas 2.-Depurar la base de datos, tablas y campos para verificar y corregir el tiempo de respuesta 3.-Verificar el tiempo de carga',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16),
        'atiende' => rand(4,6),
        'fecha_cierre' => now()]
    );
    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Se esta emitiendo una fecha y hora incorrecta en los reportes',
        'id_categoria' => 4,
        'descrip' => 'En cada uno de los reportes de Compra de Tarjetas, esta indicando fecha y hora incorrecta',
        'solucion' => '',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16)]
    );

    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'No se puede ver el reporte de inventarios',
        'id_categoria' => 5,
        'descrip' => 'Manda error el sistema al intentar acceder al modulo de reporte de inventarios',
        'solucion' => '1.-El departamento de desarrollo de sistemas verificara el error 2.-Se corregirá el error 3.-Se subirá a producción la actualización',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16),
        'atiende' => rand(4,6),
        'fecha_cierre' => now()]
    );
    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Un modulo del sistema no muestra todos los artículos',
        'id_categoria' => 5,
        'descrip' => 'El catalogo de productos no esta mostrando artículos deshabilitados',
        'solucion' => '',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16)]
    );

    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Demasiado SPAM en mi bandeja de entrada',
        'id_categoria' => 6,
        'descrip' => 'En mi correo electrónico me esta llegando demasiado SPAM de publicidad',
        'solucion' => '1.-Acudir a la maquina del usuario 2.-Aplicar reglas para bloqueo de determinados remitentes ',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16),
        'atiende' => rand(4,6),
        'fecha_cierre' => now()]
    );
    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Mis archivos tienen virus',
        'id_categoria' => 6,
        'descrip' => 'Todos mis documentos de la computadora marcan error de virus cuando intento abrirlos',
        'solucion' => '',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16)]
    );

    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Cambio de extensión en teléfono fijo',
        'id_categoria' => 7,
        'descrip' => 'Me acaban de cambiar de departamento por lo cual se requiere un cambio de extensión de telefono',
        'solucion' => '1.-Verificar con soporte técnico un número de extensión libre 2.-Realizar los cambios de extensión en el panel de conexiones telefónicos',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16),
        'atiende' => rand(4,6),
        'fecha_cierre' => now()]
    );
    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'El cable de internet se rompió',
        'id_categoria' => 7,
        'descrip' => 'El cable de internet se rompió cuando le dejaron caer una caja de metal',
        'solucion' => '',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16)]
    );

    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Respaldo de información de mi disco duro',
        'id_categoria' => 8,
        'descrip' => 'Me cambiaron de CPU y necesito toda mi información',
        'solucion' => '1.-Solicitar el equipo de computo al usuario 2.-Realizar una copia completa de información 3.-Pasar la información al nuevo CPU',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16),
        'atiende' => rand(4,6),
        'fecha_cierre' => now()]
    );
    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Copiar correos electrónicos a otra cuenta',
        'id_categoria' => 8,
        'descrip' => 'Me trasladaran a otra sucursal y requiero que todos mis correos estén en la nueva cuenta',
        'solucion' => '',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16)]
    );

    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Se atasco el papel de la impresora',
        'id_categoria' => 9,
        'descrip' => 'Al intentar imprimir me manda mensaje de atasco de papel en bandeja principal',
        'solucion' => '1.-Acudir a la impresora 2.-Abrirla y retirar la hora 3.-Comprobar que se corrigió el problema',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16),
        'atiende' => rand(4,6),
        'fecha_cierre' => now()]
    );
    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'La impresora marca error de tóner',
        'id_categoria' => 9,
        'descrip' => 'Al intentar imprimir me manda mensaje de tóner vacío',
        'solucion' => '',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16)]
    );

    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'Licencia de Office 360 para nuevo empleado',
        'id_categoria' => 10,
        'descrip' => 'Las actividades del nuevo empleado de RRHH requiere licencia para toda la paquetería de Office 360',
        'solucion' => '1.-Solicitar al departamento de licencias, una cuenta para el nuevo empleado 2.-Instalar y asignar la licencia a su cuenta de Windows',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16),
        'atiende' => rand(4,6),
        'fecha_cierre' => now()]
    );
    tickets::create(['terminal' => datempre::all()->random()->cla_empre,
        'evento' => 'La pagina web de Soporte Técnico requiere SSL para modo seguro',
        'id_categoria' => 10,
        'descrip' => 'El departamento de seguridad solicita SSL para la pagina web de Soporte Técnico',
        'solucion' => '',
        'prioridad' => rand(1,3),
        'fecha_crea' => now(),
        'status' => rand(1,4),
        'user' => rand(7,16)]
    );

    }
}
