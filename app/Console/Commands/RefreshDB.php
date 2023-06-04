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
    protected $signature = 'refreshDb {max_pages}';

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
        //parametro de entrada que marca el numero maximo de paginas (OJO error en la 3 pagina por una imagen)
        $maxPages = $this->argument('max_pages');
        for ($page = 1; $page <= $maxPages; $page++) {
            $response = Http::get('https://perenual.com/api/species-list', [
                'page' => $page,
                'key' => env('API_KEY')
            ]);
            if ($response->ok()) {
                $data = $response->json();
                foreach ($data['data'] as $plant) {
                    if (!Plant::where('api_id', $plant['id'])->exists()) {
                        $sunlights = $plant['sunlight']; 
                        foreach($sunlights as $i=>$val) {
                            $sunlights [$i] = trim(strtolower($val));
                        }


                        //excepciones encontradas hasta pag100 (max 300/dia)
                        $watering = $plant['watering'];
                        $watering = strtolower($watering);
                        if (strpos($watering, 'min') !== false) {
                            $watering = 'minium';
                        }
                        $cycle = $plant['cycle'];
                        $cycle = strtolower($cycle);
                        if (strpos($cycle, 'perennial') !== false) {
                            $cycle = 'perennial';
                        }
                        foreach ($sunlights as &$sunlight) {
                            if (str_contains($sunlight, 'full sun')) {
                                $sunlight = 'full sun';
                            }elseif (str_contains($sunlight, 'deciduous shade')) {
                                $sunlight = 'full sun';
                            }elseif ($sunlight === 'sun') {
                                $sunlight = 'full sun';
                            }elseif ($sunlight === 'partial shade') {
                                $sunlight = 'part shade';
                            }elseif ($sunlight === 'shade') {
                                $sunlight = 'full shade';
                            }elseif ($sunlight === 'deep shade') {
                                $sunlight = 'full shade';
                            }elseif ($sunlight === 'partial sun shade') {
                                $sunlight = 'part sun/part shade';
                            }elseif ($sunlight === 'sun shade') {
                                $sunlight = 'part sun/part shade';
                            }
                            
                        } unset($sunlight); //lliberem la variable 
                        
                        //Error wt the images of the api, default one is assigned 
                        $idPlant = Plant::insertGetId([
                            'api_id' => $plant['id'],
                            'name' => $plant['common_name'],
                            'image' => isset($plant['default_image']['thumbnail']) ? $plant['default_image']['thumbnail'] : 'https://knowi.es/wp-content/uploads/2014/09/shutterstock_120646195-1000x640.jpg',
                            'watering' => $watering,
                            'cycle' => $cycle,
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
                exit();
            }
        }
    }
}
