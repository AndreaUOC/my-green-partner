<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\DB; 
use App\Models\Plant;
use App\Models\Sunlight;
use App\Models\PlantSunlight;

class ExcelDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert data into the database';

    /**
     * Execute the console command.
     */

    
    public function handle()
    { 
        $records = [
            [
                'name' => 'Beta vulgaris var. Cicla (Bleda)',
                'image' => 'https://www.frutas-hortalizas.com/img/fruites_verdures/presentacio/35.jpg',
                'watering' => 'Minium',
                'sunlight'=> [
                    "full sun",
                    "part shade"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Beta vulgaris L.(Remolatxa)',
                'image' => 'https://elarbol.org/wp-content/uploads/2018/10/word-image-254.jpeg',
                'watering' => 'Minium',
                'sunlight'=> [
                    "full sun",
                    "part shade"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Spinacea oleracea L.(Espinac)',
                'image' => 'https://cdn.wikifarmer.com/wp-content/uploads/2019/07/Como-Cultivar-Espinacas-%E2%80%93-Desde-la-Siembra-hasta-la-Cosecha.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun",
                    "part shade"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Lactuca sativa L.(Enciam)',
                'image' => 'https://cdn.wikifarmer.com/wp-content/uploads/2019/07/12-Increibles-Beneficios-para-la-Salud-de-Comer-Lechuga-408x270.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun",
                    "part shade"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Cichorium endivia(Escarola)',
                'image' => 'https://farmaciaquintalegregranada.es/farmacia/wp-content/uploads/2015/02/Escarola2.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun",
                    "part shade"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Cichorium intybus L.(Endívia)',
                'image' => 'https://todohuertoyjardin.es/blog/wp-content/uploads/2014/02/cultivo-endibia.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun",
                    "part shade"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Allium cepa L.(Ceba)',
                'image' => 'https://www.agroptima.com/wp-content/uploads/2021/05/1-1536x1024.jpg',
                'watering' => 'Minium',
                'sunlight'=> [
                    "filtered shade",
                    "full shade"
                ],
                'cycle' => 'biannual',
            ],
            [
                'name' => 'Allium sativum.(Alls)',
                'image' => 'https://www.traxco.es/blog/wp-content/uploads/2013/10/cultivar-ajos.jpg',
                'watering' => 'Minium',
                'sunlight'=> [
                    "filtered shade",
                    "full shade"
                ],
                'cycle' => 'biannual',
            ],
            [
                'name' => 'Allium porrum.(Porros)',
                'image' => 'https://cdn.portalfruticola.com/2022/03/puerrosagtips.png',
                'watering' => 'Minium',
                'sunlight'=> [
                    "filtered shade",
                    "full shade"
                ],
                'cycle' => 'biannual',
            ],
            [
                'name' => 'Asparagus officinalis L.(Espàrrecs)',
                'image' => 'https://www.traxco.es/blog/wp-content/uploads/2013/01/esparrago-verde.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun", 
                    "part shade"
                ],
                'cycle' => 'perennial',
            ],
            [
                'name' => 'Solanum tuberosum.(Patata)',
                'image' => 'https://petitfitbycris.com/wp-content/uploads/2019/01/patatas-foto-768x514.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'perennial',
            ],
            [
                'name' => 'Solanum Lycopersicon. (Tomaquet)',
                'image' => 'https://www.hola.com/imagenes/decoracion/20200813173533/plantas-tomate-cultivo-cuidados-huerto-mc/0-855-565/cultivar-plantas-tomateras-e.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'perennial',
            ],
            [
                'name' => 'Capsicum annuum.(Pebrot)',
                'image' => 'https://www.floresyplantas.net/wp-content/uploads/planta-de-patata.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'perennial',
            ],
            [
                'name' => 'Solanum melongena. (Albergínia)',
                'image' => 'https://cdn.wikifarmer.com/wp-content/uploads/2019/07/8-cosas-a-Considerar-al-Cultivar-Berenjenas-en-su-Jardin.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Brassica oleracea (Coliflor)',
                'image' => 'https://como-plantar.com/wp-content/uploads/2016/04/Como-sembrar-coliflor.jpg.webp',
                'watering' => 'frequent',
                'sunlight'=> [
                    "full sun", 
                    "part shade"
                ],
                'cycle' => 'biannual',
            ],
            [
                'name' => 'Brassica oleracea L. (Bròcoli)',
                'image' => 'https://agrogojarviveros.com/entradavivero/uploads/2018/09/brocoli.png',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun", 
                    "part shade"
                ],
                'cycle' => 'biannual',
            ],
            [
                'name' => 'Brassica oleracea var. capitata (Cabdell)',
                'image' => 'http://herbarivirtual.uib.es/imagen/4164/e9343e66/300/0/imatge.jpg',
                'watering' => 'frequent',
                'sunlight'=> [
                    "full sun", 
                    "part shade"
                ],
                'cycle' => 'biannual',
            ],
            [
                'name' => 'Brassica oleracea var. rubra(Col llombarda)',
                'image' => 'https://plantasyflores.online/wp-content/uploads/2017/08/cabbage-1078163_1920.jpg',
                'watering' => 'frequent',
                'sunlight'=> [
                    "full sun", 
                    "part shade"
                ],
                'cycle' => 'biannual',
            ],
            [
                'name' => 'Raphanus sativus L. (Rave)',
                'image' => 'https://www.lamansiondelasideas.com/wp-content/uploads/2022/04/como-consumir-rabano.jpg',
                'watering' => 'frequent',
                'sunlight'=> [
                    "full sun", 
                    "part shade"
                ],
                'cycle' => 'biannual',
            ],
            [
                'name' => 'Brassica rapa rapa (Nap)',
                'image' => 'https://www.agroes.es/fotos-videos/fotos/image?view=image&format=raw&id=5712&type=img',
                'watering' => 'frequent',
                'sunlight'=> [
                    "full sun", 
                    "part shade"
                ],
                'cycle' => 'biannual',
            ],
            [
                'name' => 'Cicer arietinum (Cigró)',
                'image' => 'https://cdn2.cocinadelirante.com/sites/default/files/styles/gallerie/public/images/2020/07/planta-de-garbanzo-en-maceta-grigorenko-akusptsova.jpg',
                'watering' => 'minium',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Pisum sativum L. (Pèsol)',
                'image' => 'https://previews.123rf.com/images/taden/taden1503/taden150300187/37662876-planta-de-guisante-creciendo-en-el-jard%C3%ADn-vainas-de-guisantes.jpg',
                'watering' => 'average',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Vicia faba L. (Fava)',
                'image' => 'https://2.bp.blogspot.com/-Bsn9EFi8uK0/WgNRyvwaeYI/AAAAAAAABD8/3AC1j86_E_82bH4iJTzN9GegWCEExijIQCLcBGAs/s200/Planta-de-haba.-Por-Spain-Center.jpg',
                'watering' => 'average',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Phaseolus vulgaris L. (Mongeta)',
                'image' => 'http://www.espairuralgallecs.cat/img/galeria/1562935299-0-0.jpg',
                'watering' => 'minium',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Daucus carota L.(Pastanaga)',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Carotts_%28Daucus_Carotta%29.jpg/330px-Carotts_%28Daucus_Carotta%29.jpg',
                'watering' => 'Frequent',
                'sunlight'=> [
                    "full sun",
                    "part shade"
                ],
                'cycle' => 'biannual',
            ],
            [
                'name' => 'Ipomea batatas Lam.(Moniato)',
                'image' => 'https://cdn0.ecologiaverde.com/es/posts/7/9/5/como_plantar_boniatos_3597_600.webp',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'perennial',
            ],
            [
                'name' => 'Cucúrbita pepo (Carabassó)',
                'image' => 'https://healthy-food-near-me.com/wp-content/uploads/2022/09/zucchini-pharaoh-920x425.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun",
                    "part shade"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Cucurbita maxima (Carabassa)',
                'image' => 'https://agrogojarviveros.com/entradavivero/uploads/2018/09/calabaza.png',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Cucumis melo (Meló)',
                'image' => 'https://t2.uc.ltmcdn.com/es/posts/1/1/8/como_plantar_y_cultivar_melones_49811_600.webp',
                'watering' => 'Average',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Citrullus lanatus (Síndria)',
                'image' => 'https://elpoderdelconsumidor.org/wp-content/uploads/2021/08/sandia.jpg',
                'watering' => 'Frequent',
                'sunlight'=> [
                    "full sun",
                    "part shade"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Cucumis sativus (Cogombre)',
                'image' => 'https://healthy-food-near-me.com/wp-content/uploads/2022/09/growing-cucumbers-in-a-heated-greenhouse-in-winter-920x425.png',
                'watering' => 'Frequent',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'annual',
            ],
            [
                'name' => 'Cynara scolymus, L. (Carxofa)',
                'image' => 'https://www.clara.es/medio/2023/03/09/dieta-de-la-alcachofa_32cc23fb_230309153810_1280x886.jpg',
                'watering' => 'Minium',
                'sunlight'=> [
                    "full sun",
                    "part shade"
                ],
                'cycle' => 'perennial',
            ],
            [
                'name' => 'Vitis vinifera (Vinya)',
                'image' => 'https://www.cultifort.com/wp-content/uploads/2020/06/vid-2.jpg',
                'watering' => 'None',
                'sunlight'=> [
                    "full sun"
                ],
                'cycle' => 'perennial',
            ],
            [
                'name' => 'Fragaria moschata (Maduixes)',
                'image' => 'https://www.matabi.com/media/magefan_blog/2122453998_49fcc0f0c5_z-e1523867959324.jpg',
                'watering' => 'Average',
                'sunlight'=> [
                    "full shade"
                ],
                'cycle' => 'perennial',
            ],
            [
                'name' => 'Rubus idaeus (Gerd)',
                'image' => 'https://healthy-food-near-me.com/wp-content/uploads/2022/09/growing-raspberries-all-the-details-of-the-process-2.jpg',
                'watering' => 'frequent',
                'sunlight'=> [
                    "full shade"
                ],
                'cycle' => 'perennial',
            ],

        
        ];

        foreach ($records as $record) {
            $sunlightName = $record['sunlight'];
            unset($record['sunlight']);
            
            if (!Plant::where($record)->exists()){
                $plant = Plant::create($record);
    
                foreach($sunlightName as $sunlight) {
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
                    'plant_id' => $plant->id,
                    'sunlight_id' => $idSunlight,
                ]);
            }
               // $this->info('Record insert: ' . $plant->name);
            } else {
                $this->info('Record already exist: ' . $record['name']);
            }
            
        }
        
        $this->info('All records insert successfully.');
    }
}