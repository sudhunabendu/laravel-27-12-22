<?php

namespace App\Http\Controllers;

use GuzzleHttp\Promise\Promise;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AsyncController extends Controller
{
    // public function index(Request $request)
    // {
    //     $url = "https://beta.talixo.com/en/mapi/v3/vehicles/booking_query/";
    //     /* ONE WAY */
    //     $data = array(
    //         "start_place_id" => "ChIJ85mulxjRzRIRtMEjyRwrU4A",
    //         "start_point_instructions" => "Nice Côte d'Azur Airport, Rue Costes et Bellonte, 06206 Nice, France",
    //         "end_place_id" => "ChIJZykAMpaBzhIRJkI13XQDqHw",
    //         "end_point_instructions" => "InterContinental Carlton Cannes, Boulevard de la Croisette, Cannes, France",
    //         "start_time_date" => "2022-10-01",
    //         "start_time_time" => "10:00",
    //         "passengers" => 2,
    //         "sport_luggage" => 0,
    //         "animals" => 0,
    //         "luggage" => 2,
    //     );
    //     //echo json_encode($data);exit;
    //     $headers = array(
    //         "content-type: application/json",
    //         "partner: e2ed4d75a8d9408ba5de88515d8a9a67",
    //     );
    //     $data_json = json_encode($data);
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $response = curl_exec($ch);
    //     $err = curl_error($ch);
    //     curl_close($ch);
    //     echo $response;
    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //     } else {
    //         $result = json_decode($response);
    //         echo '================LIST==========================';
    //         echo "<pre>";
    //         print_r($result);
    //         echo "</pre>";
    //     }
    // }


    // public function index(Request $request)
    // {

    //     $responses = Http::pool(fn (Pool $pool) => [

    //         $pool->as('transfer')->withHeaders([
    //             "content-type: application/json",
    //             "partner: e2ed4d75a8d9408ba5de88515d8a9a67",
    //         ])->post('https://beta.talixo.com/en/mapi/v3/vehicles/booking_query/', [
    //             "start_place_id" => "ChIJ85mulxjRzRIRtMEjyRwrU4A",
    //             "start_point_instructions" => "Nice Côte d'Azur Airport, Rue Costes et Bellonte, 06206 Nice, France",
    //             "end_place_id" => "ChIJZykAMpaBzhIRJkI13XQDqHw",
    //             "end_point_instructions" => "InterContinental Carlton Cannes, Boulevard de la Croisette, Cannes, France",
    //             "start_time_date" => "2023-06-01",
    //             "start_time_time" => "10:00",
    //             "passengers" => 2,
    //             "sport_luggage" => 0,
    //             "animals" => 0,
    //             "luggage" => 2,
    //         ]),
    //         $pool->as('ferries')->withHeaders([
    //             "accept: application/json",
    //         ])->withToken('eyJraWQiOiJOMFlWOWlYT2Q3cXR0VWVKZ09VXC9aY3lRcVU1ZThIaW1CbzI0eTNOWUZOaz0iLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiI0aGhuNTVjcGhqdGU1dGk3bGdmdWx0dTFncSIsInRva2VuX3VzZSI6ImFjY2VzcyIsInNjb3BlIjoiaHR0cDpcL1wvZGlyZWN0LWZlcnJpZXNcL2FwaVwvcmVzb3VyY2VzXC9hZmZpbGlhdGVhcGlcL2FmZmlsaWF0ZV93cml0ZSBodHRwOlwvXC9kaXJlY3QtZmVycmllc1wvYXBpXC9yZXNvdXJjZXNcL2FmZmlsaWF0ZWFwaVwvYWZmaWxpYXRlX3JlYWQiLCJhdXRoX3RpbWUiOjE2NjIwMDQ1NDksImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC5ldS13ZXN0LTEuYW1hem9uYXdzLmNvbVwvZXUtd2VzdC0xXzVEdFdmNGJ6NSIsImV4cCI6MTY2MjAwODE0OSwiaWF0IjoxNjYyMDA0NTQ5LCJ2ZXJzaW9uIjoyLCJqdGkiOiI1YTMwNDFlZC0wOTc3LTQ2MDQtYmNiYy1mM2U1ZjZkMmYyNjQiLCJjbGllbnRfaWQiOiI0aGhuNTVjcGhqdGU1dGk3bGdmdWx0dTFncSJ9.SGWr8gbdgPgjyUj6RUpri_ca5Off1_PZRdB_jkjaWiTJl1CIaviQ9iZZAlXjRfdAls9c2fl5CTGp4SVzRc63VLt9kSQSkEWeZz06JqWoJWIM5vlAfTtHGinh5YhNZ4WgkUBMZb6lV53Jb1aSYmtqtSq4fq-mZCATf_jc9-9FVWwLwD3Bd6tr_xrY8ECO8S6KIdBYF-YEUzq6ADSPt-hWR_MVikWEE6_OCONRGXPKy0xQ0ZqSd0fr3xC6HRSFZWOHXiOeHBPUKJqjPHBbV6gctLxPQfUP_VGw3o2XbdqlutIOryIRU2ncafN6FlsHDy4v5lHRDaFcvZyz95deehs9Aw')->get('https://sandbox-api.test.directferriesconnect.com/api/v1.0/countries/GB/routes?Culture=en-GB'),
    //         $pool->as('hotel')->withHeaders([
    //             "accept: application/json",
    //         ])->withToken('o5dMBc9xzz084orMB3Wu2ctpYhd6')->get('https://test.api.amadeus.com/v1/reference-data/locations/hotels/by-city?cityCode=LON&radius=30&radiusUnit=KM&hotelSource=ALL'),


    //         $pool->as('transfer2')->withHeaders([
    //             "content-type: application/json",
    //             "partner: e2ed4d75a8d9408ba5de88515d8a9a67",
    //         ])->post('https://beta.talixo.com/en/mapi/v3/vehicles/booking_query/', [
    //             "start_place_id" => "ChIJ85mulxjRzRIRtMEjyRwrU4A",
    //             "start_point_instructions" => "Nice Côte d'Azur Airport, Rue Costes et Bellonte, 06206 Nice, France",
    //             "end_place_id" => "ChIJZykAMpaBzhIRJkI13XQDqHw",
    //             "end_point_instructions" => "InterContinental Carlton Cannes, Boulevard de la Croisette, Cannes, France",
    //             "start_time_date" => "2023-06-01",
    //             "start_time_time" => "10:00",
    //             "passengers" => 2,
    //             "sport_luggage" => 0,
    //             "animals" => 0,
    //             "luggage" => 2,
    //         ]),
    //         $pool->as('ferries2')->withHeaders([
    //             "accept: application/json",
    //         ])->withToken('eyJraWQiOiJOMFlWOWlYT2Q3cXR0VWVKZ09VXC9aY3lRcVU1ZThIaW1CbzI0eTNOWUZOaz0iLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiI0aGhuNTVjcGhqdGU1dGk3bGdmdWx0dTFncSIsInRva2VuX3VzZSI6ImFjY2VzcyIsInNjb3BlIjoiaHR0cDpcL1wvZGlyZWN0LWZlcnJpZXNcL2FwaVwvcmVzb3VyY2VzXC9hZmZpbGlhdGVhcGlcL2FmZmlsaWF0ZV93cml0ZSBodHRwOlwvXC9kaXJlY3QtZmVycmllc1wvYXBpXC9yZXNvdXJjZXNcL2FmZmlsaWF0ZWFwaVwvYWZmaWxpYXRlX3JlYWQiLCJhdXRoX3RpbWUiOjE2NjIwMDQ1NDksImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC5ldS13ZXN0LTEuYW1hem9uYXdzLmNvbVwvZXUtd2VzdC0xXzVEdFdmNGJ6NSIsImV4cCI6MTY2MjAwODE0OSwiaWF0IjoxNjYyMDA0NTQ5LCJ2ZXJzaW9uIjoyLCJqdGkiOiI1YTMwNDFlZC0wOTc3LTQ2MDQtYmNiYy1mM2U1ZjZkMmYyNjQiLCJjbGllbnRfaWQiOiI0aGhuNTVjcGhqdGU1dGk3bGdmdWx0dTFncSJ9.SGWr8gbdgPgjyUj6RUpri_ca5Off1_PZRdB_jkjaWiTJl1CIaviQ9iZZAlXjRfdAls9c2fl5CTGp4SVzRc63VLt9kSQSkEWeZz06JqWoJWIM5vlAfTtHGinh5YhNZ4WgkUBMZb6lV53Jb1aSYmtqtSq4fq-mZCATf_jc9-9FVWwLwD3Bd6tr_xrY8ECO8S6KIdBYF-YEUzq6ADSPt-hWR_MVikWEE6_OCONRGXPKy0xQ0ZqSd0fr3xC6HRSFZWOHXiOeHBPUKJqjPHBbV6gctLxPQfUP_VGw3o2XbdqlutIOryIRU2ncafN6FlsHDy4v5lHRDaFcvZyz95deehs9Aw')->get('https://sandbox-api.test.directferriesconnect.com/api/v1.0/countries/GB/routes?Culture=en-GB'),
    //         $pool->as('hotel2')->withHeaders([
    //             "accept: application/json",
    //         ])->withToken('o5dMBc9xzz084orMB3Wu2ctpYhd6')->get('https://test.api.amadeus.com/v1/reference-data/locations/hotels/by-city?cityCode=LON&radius=30&radiusUnit=KM&hotelSource=ALL'),


    //         $pool->as('transfer3')->withHeaders([
    //             "content-type: application/json",
    //             "partner: e2ed4d75a8d9408ba5de88515d8a9a67",
    //         ])->post('https://beta.talixo.com/en/mapi/v3/vehicles/booking_query/', [
    //             "start_place_id" => "ChIJ85mulxjRzRIRtMEjyRwrU4A",
    //             "start_point_instructions" => "Nice Côte d'Azur Airport, Rue Costes et Bellonte, 06206 Nice, France",
    //             "end_place_id" => "ChIJZykAMpaBzhIRJkI13XQDqHw",
    //             "end_point_instructions" => "InterContinental Carlton Cannes, Boulevard de la Croisette, Cannes, France",
    //             "start_time_date" => "2023-06-01",
    //             "start_time_time" => "10:00",
    //             "passengers" => 2,
    //             "sport_luggage" => 0,
    //             "animals" => 0,
    //             "luggage" => 2,
    //         ]),

    //         $pool->as('ferries3')->withHeaders([
    //             "accept: application/json",
    //         ])->withToken('eyJraWQiOiJOMFlWOWlYT2Q3cXR0VWVKZ09VXC9aY3lRcVU1ZThIaW1CbzI0eTNOWUZOaz0iLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiI0aGhuNTVjcGhqdGU1dGk3bGdmdWx0dTFncSIsInRva2VuX3VzZSI6ImFjY2VzcyIsInNjb3BlIjoiaHR0cDpcL1wvZGlyZWN0LWZlcnJpZXNcL2FwaVwvcmVzb3VyY2VzXC9hZmZpbGlhdGVhcGlcL2FmZmlsaWF0ZV93cml0ZSBodHRwOlwvXC9kaXJlY3QtZmVycmllc1wvYXBpXC9yZXNvdXJjZXNcL2FmZmlsaWF0ZWFwaVwvYWZmaWxpYXRlX3JlYWQiLCJhdXRoX3RpbWUiOjE2NjIwMDQ1NDksImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC5ldS13ZXN0LTEuYW1hem9uYXdzLmNvbVwvZXUtd2VzdC0xXzVEdFdmNGJ6NSIsImV4cCI6MTY2MjAwODE0OSwiaWF0IjoxNjYyMDA0NTQ5LCJ2ZXJzaW9uIjoyLCJqdGkiOiI1YTMwNDFlZC0wOTc3LTQ2MDQtYmNiYy1mM2U1ZjZkMmYyNjQiLCJjbGllbnRfaWQiOiI0aGhuNTVjcGhqdGU1dGk3bGdmdWx0dTFncSJ9.SGWr8gbdgPgjyUj6RUpri_ca5Off1_PZRdB_jkjaWiTJl1CIaviQ9iZZAlXjRfdAls9c2fl5CTGp4SVzRc63VLt9kSQSkEWeZz06JqWoJWIM5vlAfTtHGinh5YhNZ4WgkUBMZb6lV53Jb1aSYmtqtSq4fq-mZCATf_jc9-9FVWwLwD3Bd6tr_xrY8ECO8S6KIdBYF-YEUzq6ADSPt-hWR_MVikWEE6_OCONRGXPKy0xQ0ZqSd0fr3xC6HRSFZWOHXiOeHBPUKJqjPHBbV6gctLxPQfUP_VGw3o2XbdqlutIOryIRU2ncafN6FlsHDy4v5lHRDaFcvZyz95deehs9Aw')->get('https://sandbox-api.test.directferriesconnect.com/api/v1.0/countries/GB/routes?Culture=en-GB'),
    //         $pool->as('hotel3')->withHeaders([
    //             "accept: application/json",
    //         ])->withToken('o5dMBc9xzz084orMB3Wu2ctpYhd6')->get('https://test.api.amadeus.com/v1/reference-data/locations/hotels/by-city?cityCode=LON&radius=30&radiusUnit=KM&hotelSource=ALL'),
    //     ]);
    //     return $responses['transfer']."###########".$responses['ferries']."################".$responses['hotel'];
    //     // return $responses['transfer'];
    //     // return $responses['ferries'] ;
    //     // return response()->json(['transfer'=>$responses['transfer'],'ferries'=>$responses['ferries']]) ;
    // }


}
