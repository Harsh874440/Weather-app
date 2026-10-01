<!DOCTYPE html>
<html>

<head>

    <title>Weather App</title>

</head>

<body>

    <h1>Weather App</h1>

    <form action="{{ route('weather.search') }}" method="GET">

        <input
            type="text"
            name="city"
            placeholder="Enter city"
            required
        >

        <button type="submit">
            Search
        </button>

    </form>


    @if(isset($weather))

        <h2>
            {{ $weather['name'] }}
        </h2>

        <p>
            Temperature:
            {{ $weather['main']['temp'] }} °C
        </p>

        <p>
            Feels like:
            {{ $weather['main']['feels_like'] }} °C
        </p>

        <p>
            Humidity:
            {{ $weather['main']['humidity'] }}%
        </p>

        <p>
            Weather:
            {{ $weather['weather'][0]['description'] }}
        </p>

        <p>
            Wind:
            {{ $weather['wind']['speed'] }} m/s
        </p>

    @endif

</body>

</html>