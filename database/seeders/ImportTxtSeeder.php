<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NationalPark;
use App\Models\Settlement;
use App\Models\Trail;

class ImportTxtSeeder extends Seeder
{
    public function run(): void
    {
        //(np.txt)
        $npFile = database_path('data/np.txt');
        $rows = file($npFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // első sor a fejléc: id\tnev
        foreach (array_slice($rows, 1) as $line) {
            [$id, $nev] = explode("\t", $line);

            NationalPark::updateOrCreate(
                ['id' => (int)$id],
                ['nev' => $nev]
            );
        }

        // (telepules.txt)
        $telepFile = database_path('data/telepules.txt');
        $rows = file($telepFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // első sor: id\tnev\tnpid
        foreach (array_slice($rows, 1) as $line) {
            [$id, $nev, $npid] = explode("\t", $line);

            Settlement::updateOrCreate(
                ['id' => (int)$id],
                [
                    'nev'  => $nev,
                    'npid' => (int)$npid,
                ]
            );
        }

        // (ut.txt)
        $utFile = database_path('data/ut.txt');
        $rows = file($utFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // első sor: nev\thossz\tallomas\tido\tvezetes\ttelepulesid
        $azon = 1;
        foreach (array_slice($rows, 1) as $line) {
            [$nev, $hossz, $allomas, $ido, $vezetes, $telepulesid] = explode("\t", $line);

            Trail::updateOrCreate(
                ['azon' => $azon],
                [
                    'nev'         => trim($nev),
                    'hossz'       => (float) str_replace(',', '.', $hossz),
                    'allomas'     => (int) $allomas,
                    'ido'         => (float) str_replace(',', '.', $ido),
                    // txt-ben -1 = nincs adat → most úgy vesszük, hogy nincs vezetés
                    'vezetes'     => ((int)$vezetes) > 0,
                    'telepulesid' => (int) $telepulesid,
                ]
            );

            $azon++;
        }
    }
}