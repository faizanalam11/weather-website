<?php
if (isset($_POST['city'])) {
    $apiKey = "d1ccc44cfb069ecccbb31dcdbc037bef";
    $city = $_POST['city'];
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

    $weatherData = file_get_contents($apiUrl);
    $weatherArray = json_decode($weatherData, true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Weather Information</h1>
        <form method="POST" action="">
            <input type="text" name="city" placeholder="Enter city name" required>
            <button type="submit">Get Weather</button>
        </form>
        <?php if (isset($weatherArray)) { ?>
            <div class="weather-info">
                <h2><?php echo $weatherArray['name']; ?>, <?php echo $weatherArray['sys']['country']; ?></h2>
                <p>Temperature: <?php echo $weatherArray['main']['temp']; ?>°C</p>
                <p>Weather: <?php echo $weatherArray['weather'][0]['description']; ?></p>
                <p>Humidity: <?php echo $weatherArray['main']['humidity']; ?>%</p>
                <p>Wind Speed: <?php echo $weatherArray['wind']['speed']; ?> m/s</p>
            </div>
        <?php } ?>
    </div>
</body>
</html>
