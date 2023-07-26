<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TranslationLang;

class ImportJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:json';

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
                    $translationsJson = file_get_contents($jsonPath);

                    TranslationLang::updateOrCreate([
                        'language' => $language,
                    ], [
                        'content' => $translationsJson,
                    ]);
                }
            } catch (Exception $e){
                echo " DB 저장 실패 `{$language}` " . $e->getMessage();
                return 0;
            }
        }
        return 1;
    }
}

