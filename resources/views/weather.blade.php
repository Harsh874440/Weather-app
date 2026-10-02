<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Weather App</title>

    <link rel="stylesheet" href="{{ asset('css/weather.css') }}">
</head>

<body>

    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="logo">
            ☁ WeatherApp
        </div>

        <div class="nav-links">
            <a href="/">Home</a>
            <a href="#">Forecast</a>
            <a href="#">Favorites</a>
        </div>

    </nav>


    <main class="container">

        <!-- HERO -->

        <section class="hero">

            <h1>What's the weather like?</h1>

            <p>
                Search for a city and get the latest weather information.
            </p>


            <!-- SEARCH -->

            <form action="/weather" method="GET" class="search-box">

                <input
                    type="text"
                    name="city"
                    placeholder="Enter city name..."
                    value="{{ request('city') }}"
                    required
                >

                <button type="submit">
                    Search
                </button>

            </form>

        </section>


        <!-- ERROR MESSAGE -->

        @if(session('error'))

            <div class="error">
                {{ session('error') }}
            </div>

        @endif


        <!-- WEATHER -->

        @if(isset($weather))

            <section class="weather-card">

                <!-- LOCATION -->

                <div class="location">

                    <h2>
                        {{ $weather['name'] }},
                        {{ $weather['sys']['country'] }}
                    </h2>

                    <p>
                        Current Weather
                    </p>

                </div>


                <!-- MAIN WEATHER -->

                <div class="main-weather">

                    <div class="weather-icon">

                        @if(strtolower($weather['weather'][0]['main']) == 'clear')
                            ☀️
                        @elseif(strtolower($weather['weather'][0]['main']) == 'clouds')
                            ☁️
                        @elseif(strtolower($weather['weather'][0]['main']) == 'rain')
                            🌧️
                        @elseif(strtolower($weather['weather'][0]['main']) == 'snow')
                            ❄️
                        @else
                            🌤️
                        @endif

                    </div>


                    <div>

                        <div class="temperature">
                            {{ round($weather['main']['temp']) }}°C
                        </div>

                        <div class="condition">
                            {{ $weather['weather'][0]['description'] }}
                        </div>

                    </div>

                </div>


                <!-- DETAILS -->

                <div class="details">

                    <div class="detail-card">

                        <div class="icon">
                            💧
                        </div>

                        <h3>Humidity</h3>

                        <p>
                            {{ $weather['main']['humidity'] }}%
                        </p>

                    </div>


                    <div class="detail-card">

                        <div class="icon">
                            🌡️
                        </div>

                        <h3>Feels Like</h3>

                        <p>
                            {{ round($weather['main']['feels_like']) }}°C
                        </p>

                    </div>


                    <div class="detail-card">

                        <div class="icon">
                            💨
                        </div>

                        <h3>Wind Speed</h3>

                        <p>
                            {{ $weather['wind']['speed'] }} m/s
                        </p>

                    </div>


                    <div class="detail-card">

                        <div class="icon">
                            👁️
                        </div>

                        <h3>Visibility</h3>

                        <p>
                            {{ round($weather['visibility'] / 1000, 1) }} km
                        </p>

                    </div>

                </div>


                <!-- SUN -->

                <h2 class="section-title">
                    ☀️ Sun Information
                </h2>

                <div class="sun-info">

                    <div class="sun-card">

                        <h3>🌅 Sunrise</h3>

                        <p>
                            {{ date('h:i A', $weather['sys']['sunrise']) }}
                        </p>

                    </div>


                    <div class="sun-card">

                        <h3>🌇 Sunset</h3>

                        <p>
                            {{ date('h:i A', $weather['sys']['sunset']) }}
                        </p>

                    </div>

                </div>


                <!-- FORECAST PLACEHOLDER -->

                <h2 class="section-title">
                    📅 Forecast
                </h2>

                <div class="forecast">

                    <div class="forecast-card">
                        <strong>Today</strong>
                        <div class="forecast-icon">☀️</div>
                        <div class="forecast-temp">
                            {{ round($weather['main']['temp']) }}°C
                        </div>
                    </div>

                    <div class="forecast-card">
                        <strong>Tomorrow</strong>
                        <div class="forecast-icon">🌤️</div>
                        <div class="forecast-temp">--°C</div>
                    </div>

                    <div class="forecast-card">
                        <strong>Day 3</strong>
                        <div class="forecast-icon">☁️</div>
                        <div class="forecast-temp">--°C</div>
                    </div>

                    <div class="forecast-card">
                        <strong>Day 4</strong>
                        <div class="forecast-icon">🌧️</div>
                        <div class="forecast-temp">--°C</div>
                    </div>

                    <div class="forecast-card">
                        <strong>Day 5</strong>
                        <div class="forecast-icon">☀️</div>
                        <div class="forecast-temp">--°C</div>
                    </div>

                </div>

            </section>

        @endif


        <!-- RECENT SEARCHES -->

        <h2 class="section-title">
            🕘 Popular Cities
        </h2>

        <div class="recent">

            <span class="recent-city">Pune</span>

            <span class="recent-city">Mumbai</span>

            <span class="recent-city">Delhi</span>

            <span class="recent-city">Bangalore</span>

            <span class="recent-city">Tokyo</span>

            <span class="recent-city">London</span>

        </div>


    </main>


    <footer>

        WeatherApp • Built with Laravel

    </footer>


</body>

</html>