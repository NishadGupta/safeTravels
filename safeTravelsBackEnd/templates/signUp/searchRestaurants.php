<html>

<head>
    <meta charset="utf-8" />
    <meta name="'viewpoint">
    <link rel="stylesheet" href="{{ url_for('static', filename='CSS/normalize.css') }}">
    <link rel="stylesheet" href="{{ url_for('static', filename='CSS/safetravels.css') }}">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurants</title>
</head>

<script src="/../static/JS/safetravels.js"></script>

<body onload="setUser()">

    <header>
        <a href="/"><img class="logo" src="{{ url_for('static', filename='Images/SafeTravelsLogo.png') }}"> </a>

        <a href="/searchAttractions" class="head">Attractions</a>
        <a href="/flight" class="head">Flights</a>
        <a href="/searchHotels" class="head">Hotels</a>
        <a href="/searchRestaurants" class="head">Restaurants</a>
            <!-- maybe flights, hotels, and restaurants could be a drop down menu -->
        <a class="head" onclick="getUserItinerary()" >Itinerary</a>
         <!-- <a href="/wishlist" class="head">Wishlist</a> -->
            <!-- cant access the itinerary page till logged in -->
            <a class="head login nav-item nav-link" id="loginCustomer" href="/loginCustomer" onclick="loggingUser()">Login/Sign Up</a>
    </header>

    <!-- <h1>Restaurants</h1> -->

    <div class="search-bar restaurant-search-bar">

        <form autocomplete="off" id="myForm" action="/showRestaurants">
            <div class="autocomplete">
                <input id="city" type="text" name="myCity" placeholder="What city are you dining in?"
                    class="form-control" value="{{city}}">
                <input id="user" name="user" style="display:None" value=""/>
                <input class="submitB" type="submit" onclick="saveCity()" />
            </div>
        </form>
    </div>
    <div class="loader"></div>
<div id="response" class="restaurant-main">
        <div class="filters-restaurant">
            <!-- rating, price, open, hot_and_new, liked_by_vegetarians, outdoor_seating, parking_lot, parking_valet, delivery, takeout -->
            <h3>Filters</h3>
            <div class="filters">
                <!-- price -->
                <p>Price</p>
                <input type="checkbox" id="$" name="price" value="$">
                <label for="$">$</label>
                <input type="checkbox" id="$$" name="price" value="$$">
                <label for="$$">$$</label>
                <br>
                <input type="checkbox" id="$$$" name="price" value="$$$">
                <label for="$$$">$$$</label>
                <input type="checkbox" id="$$$$" name="price" value="$$$$">
                <label for="$$$$">$$$$</label>
                <!-- rating -->
                <p>Rating</p>
                <input type="checkbox" id="1" name="price" value="1">
                <label for="1">1.0</label>
                <input type="checkbox" id="1.5" name="price" value="1.5">
                <label for="1.5">1.5</label>
                <br>
                <input type="checkbox" id="2" name="price" value="2">
                <label for="2">2.0</label>
                <input type="checkbox" id="2.5" name="price" value="2.5">
                <label for="2.5">2.5</label>
                <br>
                <input type="checkbox" id="3" name="price" value="3">
                <label for="3">3.0</label>
                <input type="checkbox" id="3.5" name="price" value="3.5">
                <label for="3.5">3.5</label>
                <br>
                <input type="checkbox" id="4" name="price" value="4">
                <label for="4">4.0</label>
                <input type="checkbox" id="4.5" name="price" value="4.5">
                <label for="4.5">4.5</label>
                <br>
                <input type="checkbox" id="5" name="price" value="5">
                <label for="5">5.0</label>
                <!-- Hot_and_new -->
                <p>Hot and New</p>
                <input type="checkbox" id="1" name="hot_and_new" value="1">
                <label for="1">Yes</label>
                <input type="checkbox" id="1" name="hot_and_new" value="0">
                <label for="1">No</label>
                <!-- liked_by_vegetarians -->
                <p>Liked by Vegetarians?</p>
                <input type="checkbox" id="1" name="liked_by_vegetarians" value="1">
                <label for="1">Yes</label>
                <input type="checkbox" id="1" name="liked_by_vegetarians" value="0">
                <label for="1">No</label>
                <!-- outdoor_seating -->
                <p>Outdoor Seating?</p>
                <input type="checkbox" id="1" name="outdoor_seating" value="1">
                <label for="1">Yes</label>
                <input type="checkbox" id="1" name="outdoor_seating" value="0">
                <label for="1">No</label>
                <!-- parking_lot -->
                <p>Parking Lot?</p>
                <input type="checkbox" id="1" name="parking_lot" value="1">
                <label for="1">Yes</label>
                <input type="checkbox" id="1" name="parking_lot" value="0">
                <label for="1">No</label>
                <!-- parking_valet -->
                <p>Valet?</p>
                <input type="checkbox" id="1" name="parking_valet" value="1">
                <label for="1">Yes</label>
                <input type="checkbox" id="1" name="parking_valet" value="0">
                <label for="1">No</label>
                <!-- delivery -->
                <p>Delivery?</p>
                <input type="checkbox" id="1" name="delivery" value="1">
                <label for="1">Yes</label>
                <input type="checkbox" id="1" name="delivery" value="0">
                <label for="1">No</label>
                <!-- takeout -->
                <p>Takeout?</p>
                <input type="checkbox" id="1" name="takeout" value="1">
                <label for="1">Yes</label>
                <input type="checkbox" id="1" name="takeout" value="0">
                <label for="1">No</label>
            </div>



            <a href="" class="more-link apply">Apply</a>
        </div>
     <div class="cards cards-rest">
            {% for restaurant in restaurants %}

            <div class="card rest rest-page">
                <h2>{{ restaurant.name }}</h2>
                <img src="{{ restaurant.image_url }}" alt="{{ restaurant.name }}">
                <div style="padding-top: 5px">
                 <div>
                    <span class="inline">Ratings:</span>
                    {% for i in range(1,restaurant.rating | int + 1) %}
                        <span class="fa fa-star checked inline"></span>
                    {% endfor %}

                    </div>
                    <p>Contact Number: {{ restaurant.display_phone }}</p>
                </div>
                <span class="material-symbols-outlined" onclick="addToFavouriteRestaurants('{{restaurant.location.city}}','{{restaurant.name}}','{{restaurant.image_url}}','{{restaurant.rating}}','{{restaurant.display_phone}}')"> add</span>
            </div>
            {% endfor %}
        </div>
    </div>
      <dialog id="myDialog">
        <button class="close-button" style="float:right" onclick="document.getElementById('myDialog').close()">&#x2716;</button>
        <h2>Saved Successfully!!</h2>
    </dialog>
    <div class="chatbot">
      <div class="chatbot-messages">
        <!-- Add chatbot messages here using JavaScript -->
      </div>
      <div class="chatbot-input" style="float:right">
        <input type="text" placeholder="Type your message here">
        <button>Send</button>
      </div>
    </div>
</body>

</html>