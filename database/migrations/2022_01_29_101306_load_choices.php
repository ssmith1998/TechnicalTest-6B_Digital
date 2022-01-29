<?php

use App\Models\SelectChoice;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoadChoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            [
                'label' => '+/- 1 day',
                'value' => '1',
                'type' => 'flexibility',
            ],
            [
                'label' => '+/- 2 day',
                'value' => '2',
                'type' => 'flexibility',
            ],
            [
                'label' => '+/- 3 day',
                'value' => '3',
                'type' => 'flexibility',
            ],
            [
                'label' => 'Small',
                'value' => 'small',
                'type' => 'vehicle_size',
            ],
            [
                'label' => 'Medium',
                'value' => 'medium',
                'type' => 'vehicle_size',
            ],
            [
                'label' => 'Large',
                'value' => 'large',
                'type' => 'vehicle_size',
            ]
        ];

        foreach ($data as $choice) {
            SelectChoice::create([
                'label' => $choice['label'],
                'value' => $choice['value'],
                'type' => $choice['type'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        SelectChoice::all()->delete();
    }
}
