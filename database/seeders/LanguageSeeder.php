<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            "English",
            "Afar",
            "Abkhazian",
            "Afrikaans",
            "Amharic",
            "Arabic",
            "Assamese",
            "Aymara",
            "Azerbaijani",
            "Bashkir",
            "Belarusian",
            "Bulgarian",
            "Bihari",
            "Bislama",
            "Bengali/Bangla",
            "Tibetan",
            "Breton",
            "Catalan",
            "Corsican",
            "Czech",
            "Welsh",
            "German",
            "Bhutani",
            "Greek",
            "Esperanto",
            "Spanish",
            "Estonian",
            "Basque",
            "Persian",
            "Finnish",
            "Fiji",
            "Faeroese",
            "French",
            "Frisian",
            "Irish",
            "Scots/Gaelic",
            "Galician",
            "Guarani",
            "Gujarati",
            "Hausa",
            "Hindi",
            "Croatian",
            "Hungarian",
            "Armenian",
            "Interlingua",
            "Interlingue",
            "Inupiak",
            "Indonesian",
            "Italian",
            "Hebrew",
            "Japanese",
            "Yiddish",
            "Javanese",
            "Georgian",
            "Kazakh",
            "Greenlandic",
            "Cambodian",
            "Kannada",
            "Korean",
            "Kashmiri",
            "Kurdish",
            "Kirghiz",
            "Latin",
            "Lingala",
            "Laothian",
            "Lithuanian",
            "Marathi",
            "Malay",
            "Nepali",
            "Punjabi",
            "Polish",
            "Romanian",
            "Russian",
            "Sanskrit",
            "Sindhi",
            "Tamil",
            "Telugu",
            "Thai",
            "Turkmen",
            "Turkish",
            "Urdu",
            "Chinese",
        ];

        foreach ($languages as $language) {
            $data = new Language();
            $data->name = $language;
            $data->save();
        }
    }
}
