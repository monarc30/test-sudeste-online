<?php

use App\Models\ProdutosModel;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProdutosModel::class,10)->create();
    }
}
