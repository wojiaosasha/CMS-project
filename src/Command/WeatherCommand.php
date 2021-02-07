<?php

namespace App\Command;

//use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use App\Entity\Weather;
use Doctrine\ORM\EntityManagerInterface;

class WeatherCommand extends ContainerAwareCommand
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'weather';

    protected function configure()
    {
        // ...
    }

    private function getWeather(string $city) {
        //$url = "api.weatherapi.com/v1/current.json?key=ede7bfa6aa8e4dc7abd115529210302&q=Vladivostok";
        $url = "api.weatherapi.com/v1/current.json?key=ede7bfa6aa8e4dc7abd115529210302&q=".$city;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        if ($output != NULL) {
            $str = json_decode($output, true);
            $weather = new Weather();
            $weather->setCity($str['location']['name']);
            $weather->setTemp($str['current']['temp_c']);
            $weather->setTime($str['current']['last_updated']);
            $weather->setText($str['current']['condition']['text']);
            $weather->setIcon($str['current']['condition']['icon']);
            $weather->setWindKph($str['current']['wind_kph']);
            $weather->setWindDegree($str['current']['wind_degree']);
            $weather->setWindDir($str['current']['wind_dir']);
            $weather->setPressureMb($str['current']['pressure_mb']);
            $weather->setPrecipMm($str['current']['precip_mm']);
            $weather->setHumidity($str['current']['humidity']);
            $weather->setCloud($str['current']['cloud']);
            $weather->setFeelslike($str['current']['feelslike_c']);
            $weather->setVis($str['current']['vis_km']);
            $weather->setUv($str['current']['uv']);
            $weather->setGust($str['current']['gust_kph']);
            
            $entityManager = $this->getContainer()->get('doctrine')->getManager();
            $entityManager->persist($weather);
            $entityManager->flush();
            
            
            return $output;
        }
        else {
            echo('Can not get weather for '.$city."\n");
            return;
        }
        
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        //echo(getWeather());
        //for (int $i = 0;)   

        $cities = array (
            0 => 'London',
            1 => 'Moscow',
            2 => 'Vladivostok',
            3 => 'New-York',
            4 => 'Los-Angeles',
        );

        for ($i = 0; $i < count($cities); $i++)
            $this->getWeather($cities[$i]);
        echo('DONE');
    }
}

?>