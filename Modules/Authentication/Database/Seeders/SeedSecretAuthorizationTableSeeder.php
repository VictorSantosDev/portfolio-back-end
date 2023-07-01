<?php

namespace Modules\Authentication\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Authentication\Entities\SecretAuthorization;

class SeedSecretAuthorizationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $model = new SecretAuthorization();
        $model::create([
            'secret' =>$this->generatePassword(),
        ]);
    }

    private function generatePassword(): string
    {
        return password_hash(
            md5(env('HASH_CRYPT')) . env('KEY_AUTHORIZATION'),
            PASSWORD_DEFAULT
        );
    }
}
