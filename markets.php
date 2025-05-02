<!doctype html>
<html>
<head>
    <title>Markets</title>
    <link rel="stylesheet" href="style.css"/>
    <head>

<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="main.css" />
<link rel="stylesheet" href="style.css"/>
<head>
<header>
<nav>
    <ul>
    <li><a href = "home.php">Home</a>&nbsp;&nbsp;</li>
        <li><a href = "markets.php">Markets</a>&nbsp;&nbsp;</li>
        <li><a href = "sellProduct.php">Sell Products</a>&nbsp;&nbsp;</li>
        <li><a href = "view_reviews.php">Reviews</a>&nbsp;&nbsp;</li>
        <li><a href = "profile.php">Profile</a>&nbsp;&nbsp;</li>
        <li><a href = "logout.php">Logout</a>&nbsp;&nbsp;</li>
    </ul>
</nav>
</div>
</header>

<div class="report-container">
    <?php
    if (isset($_POST['city'])) {
        require_once('vendor/autoload.php');
        $apiKey = "fsq3vejfe3MLgRX7xMDwSm53oty78Q5ICCwQSH30vAWrqic=";
        $city = stripslashes($_POST['city']);
        $client = new \GuzzleHttp\Client();
        
        // API call to Foursquare
        $restaurantApiUrl = "https://api.foursquare.com/v3/places/search?categories=4bf58dd8d48988d118951735&near=" . $city . "&limit=10&v=20190425";
        
        $response = $client->request('GET', $restaurantApiUrl, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $apiKey,
            ],
        ]);

        $res = $response->getBody();
        $data = json_decode($res);
        
        if (isset($data->results) && count($data->results) > 0) {
            echo "<table border='1'> 
            <tr>
                <th>Store Name</th>
                <th>Address</th>
                <th>Category</th>
                <th>Map Link</th>
            </tr>";

            foreach ($data->results as $restaurant) {
                echo "<tr>";
                echo "<td>" . $restaurant->name . "</td>";
                echo "<td>" . $restaurant->location->formatted_address . "</td>";
                echo "<td>" . $restaurant->categories[0]->name . "</td>";
                echo "<td><a href='https://maps.google.com/?q=" . urlencode($restaurant->location->formatted_address) . "' target='_blank'>Open in Maps</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No restaurants found in this city.</p>";
        }
    }
    ?>
</div>

<div>
    <h1 style="font-size:50px;text-align:center;color:#000000">Organic Food Finder</h1>
    <form class="form" action="" method="post" name="search">
        <h1 class="login-title">Markets</h1>
        <input type="text" class="login-input" name="city" placeholder="Enter city name" autofocus="true" required/>
        <input type="submit" value="Search" name="search" class="login-button"/>
    </form>
</div>

</body>
</html>
