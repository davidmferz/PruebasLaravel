<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UsuariosTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->withoutExceptionHandling();//muestra mas claro los mensajes
        $response = $this->get('/usuarios');//pagina que queremos hacer las pruebas
        $response->assertStatus(200);//valida que exista comunicacion cliente <-> servidor

        $res = User::all();//realiza la consulta SELECT * FROM users
        $response->assertViewIs('usuarios.index');//validar que se pueda acceder a la vista
        $response->assertViewHas('usuarios', $res);//validar que la vista reciba los datos
    }
}
