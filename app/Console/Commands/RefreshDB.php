<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Plant;
use App\Models\Sunlight;
use App\Models\PlantSunlight;

class RefreshDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refreshDb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh the database with data from API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://perenual.com/api/species-list?page=1&key=sk-FvqP646270c933f56817');
        if ($response->ok()) {
            $data = $response->json();
            foreach ($data['data'] as $plant) {
                if (!Plant::where('api_id', $plant['id'])->exists()) {
                    $sunlights = $plant['sunlight']; 
                    foreach($sunlights as $i=>$val) {
                        $sunlights [$i] = trim(strtolower($val));
                    }
                    
                    
                    $idPlant = Plant::insertGetId([
                        'api_id' => $plant['id'],
                        'name' => $plant['common_name'],
                        'image' => $plant['default_image']['thumbnail'],
                        'watering' => $plant['watering'],
                        'cycle' => $plant['cycle'],
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                    
                    
                    foreach($sunlights as $sunlight) {
                        $idSunlight = Sunlight::whereName($sunlight);
                        if($idSunlight->count()) {
                            $idSunlight = $idSunlight->first()->id;
                        }
                        else {
                            $idSunlight = Sunlight::insertGetId([
                                'name' => $sunlight, 
                                'created_at' => now(),
                                'updated_at' => now()
                            ]);
                        } 
                        PlantSunlight::create([
                            'plant_id' => $idPlant,
                            'sunlight_id' => $idSunlight 
                        ]);
                    }
                }
            }
            $this->info('Database refreshed successfully.');
            
        } else {
            $this->error('Failed to refresh the database.');
        }
        exit();
    }
}
