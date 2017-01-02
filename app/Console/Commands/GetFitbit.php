<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use djchen\OAuth2\Client\Provider\Fitbit;
use App\Lookup;
class GetFitbit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fitbit:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pulls all relevant Fitbit data. Refreshes access token when necessary.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $provider = new Fitbit([
        'clientId'          => env('FITBIT_CLIENT'),
        'clientSecret'      => env('FITBIT_SECRET'),
        'redirectUri'       => 'http://kcunanan.com/fitbit'
      ]);
      $fitbit = Lookup::where('category', 'fitbit_access_refresh')->first();
      $newAccessToken = $provider->getAccessToken('refresh_token', ['refresh_token' => $fitbit->other_2]);
      // other_1 = accessToken
      // other_2 = refreshToken
      $fitbit->other_1 = $newAccessToken->getToken();
      echo "Access: ".$fitbit->other_1;
      $fitbit->other_2 = $newAccessToken->getRefreshToken();
      echo "Refresh: ".$fitbit->other_2;
      $fitbit->save();
      $accessToken = $newAccessToken->getToken();
      $request = $provider->getAuthenticatedRequest(
          Fitbit::METHOD_GET,
          Fitbit::BASE_FITBIT_API_URL . '/1/user/-/sleep/date/today.json',
          $accessToken,
          ['headers' => [Fitbit::HEADER_ACCEPT_LANG => 'en_US'], [Fitbit::HEADER_ACCEPT_LOCALE => 'en_US']]
          // Fitbit uses the Accept-Language for setting the unit system used
          // and setting Accept-Locale will return a translated response if available.
          // https://dev.fitbit.com/docs/basics/#localization
      );
      $response = $provider->getResponse($request)['sleep'];
      var_dump($response);
      $request = $provider->getAuthenticatedRequest(
          Fitbit::METHOD_GET,
          Fitbit::BASE_FITBIT_API_URL . '/1/user/-/activities/date/today.json',
          $accessToken,
          ['headers' => [Fitbit::HEADER_ACCEPT_LANG => 'en_US'], [Fitbit::HEADER_ACCEPT_LOCALE => 'en_US']]
          // Fitbit uses the Accept-Language for setting the unit system used
          // and setting Accept-Locale will return a translated response if available.
          // https://dev.fitbit.com/docs/basics/#localization
      );
      $response2 = $provider->getResponse($request);
      $data = $response2['summary'];
      $entry = new Lookup;
      //views = steps
      $entry->category = 'fitbit_data';
      $entry->blog_views = $data['steps'];
      // shares = floors
      $entry->blog_shares = $data['floors'];
      $entry->other_1 = $response[0]['minutesAsleep'];
      $entry->date_posted = $response[0]['dateOfSleep'];
      $entry->save();
      echo "Saved";

    }
}
