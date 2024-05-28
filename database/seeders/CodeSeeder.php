<?php

namespace Database\Seeders;

use App\Models\Codes;
use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 100; $i++)
        {
          $random = mt_rand(33, 126000);
          $result = $this->createHash($random);
          $checkIfExist = Codes::where('name', $result)->first();

          if(!is_null($checkIfExist))
          {
            continue;
          }
          var_dump("Code: ". $result);
          Codes::updateOrCreate([
            'name' => $result,
          ]);
        }
    }

    private function createHash($input)
    {
      $hash_base64 = base64_encode( hash( 'sha256', $input, true ) );
      // Replace non-urlsafe chars to make the string urlsafe.
      $hash_urlsafe = strtr( $hash_base64, '+/', '-_' );
      // Trim base64 padding characters from the end.
      $hash_urlsafe = rtrim( $hash_urlsafe, '=' );
      // Shorten the string before returning.
      return substr( $hash_urlsafe, 0, 10 );
    }
}