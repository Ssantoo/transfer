<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Translation;

class ImportKey extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import translations from JSON files to the database';


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $languages = ['KOR', 'ENG'];

        foreach ($languages as $language) {

            try {
                $jsonPath = resource_path("lang/{$language}.json");

                if (file_exists($jsonPath)) {

                    $translations = json_decode(file_get_contents($jsonPath), true);

                    foreach ($translations as $key => $value) {
                        Translation::updateOrCreate([
                            'language' => $language,
                            'key' => $key,
                            'value' => $value,
                        ]);
                    }
                }
            } catch (Exception $e){
                echo " DB 저장 실패 `{$language}` " . $e->getMessage();
            }
        }

    }
}

