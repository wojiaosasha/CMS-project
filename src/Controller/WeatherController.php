<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\WeatherRepository;

use Symfony\Component\HttpFoundation\StreamedResponse;

class WeatherController extends AbstractController
{
    /**
     * @Route("/weather", name="weather_list")
     */
    public function showWeather(WeatherRepository $weatherRepository): Response
    {
    
        function getWeather(WeatherRepository $weatherRepository, string $city){
            $cities = $weatherRepository->findBy(['city' => $city]);
            if (count($cities) > 0) {
                $weather = $cities[count($cities)-1];
                echo('<h3>'.$city.'</h3>');
                echo('<img src="'.$weather->getIcon().'" width="50" height="50"/><br>');
                echo('temp:'.$weather->getTemp().'<br>');
                echo('text:'.$weather->getText().'<br>');
                echo('wind_kph:'.$weather->getWindKph().'<br>');
                echo('wind_degree:'.$weather->getWindDegree().'<br>');
                echo('wind_dir:'.$weather->getWindDir().'<br>');
                echo('pressure_mb:'.$weather->getPressureMb().'<br>');
                echo('precip_mm:'.$weather->getPrecipMm().'<br>');
                echo('humidity:'.$weather->getHumidity().'<br>');
                echo('cloud:'.$weather->getCloud().'<br>');
                echo('feelslike:'.$weather->getFeelslike().'<br>');
                echo('vis:'.$weather->getVis().'<br>');
                echo('uv:'.$weather->getUv().'<br>');
                echo('gust:'.$weather->getGust().'<br>');
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