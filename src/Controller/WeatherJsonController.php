<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Repository\WeatherRepository;

class WeatherJsonController extends AbstractController
{
    /**
     * @Route("/weather/json", name="weather_json")
     */
    public function showWeather(WeatherRepository $weatherRepository): Response
    {
        

        function getWeather(WeatherRepository $weatherRepository, string $city){
            $cities = $weatherRepository->findBy(['city' => $city]);
            if (count($cities) > 0) {
                $weather = $cities[count($cities)-1];
                echo('<h3>'.$city.'</h3>');
                $str = json_encode((array)$weather, JSON_PRETTY_PRINT);
                $str = str_replace("\\", "", $str);
                $str = str_replace("u0000AppEntityWeatheru0000", "", $str);
                //$str = str_replace(",", ",<br>", $str);
                echo($str);
                //var_dump($weather);
            }
            else
                echo('<h3>Weather for '.$city.' not founded</h3>');
        }


        $response = new StreamedResponse();
        $response->setCallback(function ()use ($weatherRepository)  {
            $cities = array (
            0 => 'London',
            1 => 'Moscow',
            2 => 'Vladivostok',
            3 => 'New York',
            4 => 'Los Angeles'
            //5 => 'Brest'
            );

            for ($i = 0; $i < count($cities); $i++)
                getWeather($weatherRepository, $cities[$i]);
        });
        $response->send();

        return $response;
        
    }
}
?>