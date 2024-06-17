<?php
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gamestore";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {      
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create database if it doesn't exist
    try {
      $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
      if (mysqli_query($conn, $sql)) {
          // echo "Database created successfully<br>";
      } else {
          echo "Error creating database: " . mysqli_error($conn) . "<br>";
      }
    } catch (Exception $e) {
      echo "Error creating database: " . $e->getMessage() . "<br>";
    }

    // Connect to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    try {
      // Create table if it doesn't exist
      $sql = "CREATE TABLE IF NOT EXISTS `games` (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `category` varchar(255) NOT NULL,
          `title` varchar(255) NOT NULL,
          `description` text NOT NULL,
          `image_url` varchar(255) NOT NULL,
          PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
      if (mysqli_query($conn, $sql)) {
          // echo "Table created successfully<br>";
      } else {
          echo "Error creating table: " . mysqli_error($conn) . "<br>";
      }
    } catch (Exception $e) {
      echo "Error creating table: " . $e->getMessage() . "<br>";
    }

    try {
      // DROP table `users`
      $sql = "DROP TABLE IF EXISTS `users`";
      if (mysqli_query($conn, $sql)) {
          // echo "Table dropped successfully<br>";
      } else {
          echo "Error dropping table: " . mysqli_error($conn) . "<br>";
      }
    } catch (Exception $e) {
      echo "Error dropping table: " . $e->getMessage() . "<br>";
    }
    try {
      // Create table if it doesn't exist
      $sql = "CREATE TABLE IF NOT EXISTS `users` (
          `id` INT AUTO_INCREMENT PRIMARY KEY,
          `name` VARCHAR(50) NOT NULL,
          `email` VARCHAR(100) NOT NULL,
          `bio` text
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
      if (mysqli_query($conn, $sql)) {
          // echo "Table created successfully<br>";
      } else {
          echo "Error creating table: " . mysqli_error($conn) . "<br>";
      }
    } catch (Exception $e) {
      echo "Error creating table: " . $e->getMessage() . "<br>";
    }

    return $conn;
}

function populateData() {
    // Connect to the database
    $conn = connectDB();

    // Clean the games table
    try {
        $sql_clean = "DELETE FROM games";
        if (mysqli_query($conn, $sql_clean)) {
            // echo "Table cleaned successfully<br>";
        } else {
            echo "Error cleaning table: " . mysqli_error($conn) . "<br>";
        }
    } catch (Exception $e) {
        echo "Error cleaning table: " . $e->getMessage() . "<br>";
    }

    $lorem = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis, purus ac sodales luctus, libero libero luctus libero, non luctus. Shoes apophenia jeans sunglasses kanji boy human fetishism face forwards singularity sensory fluidity corrupted Chiba artisanal numinous monofilament. Tanto drone geodesic faded sentient military-grade 3D-printed jeans order-flow nano-cartel wonton soup Tokyo systema gang smart-pre. Dissident nodality pre-corrupted office woman disposable otaku car sub-orbital footage man into euro-pop long-chain hydrocarbons hacker. Computer pre-man singularity franchise-space corrupted sprawl sign math-Legba carbon nodality monofilament human receding long-chain hydrocarbons. Stimulate market gang Kowloon computer tube DIY. Military-grade dead range-rover advert denim Kowloon neural table hacker BASE jump monofilament free-market into woman. Spook tube order-flow woman sign warehouse urban city sentient Shibuya dissident drugs San Francisco advert tiger-team-space.";

    // Sample data array for game store
    $sample_data = array(
        array("Action", 1, "Top 10 Action Games of 2023", "Discover the most thrilling action games of the year! " . $lorem, "https://via.assets.so/game.png?id=201&w=500"),
        array("Adventure", 2, "Best Adventure Games for Enthusiasts", "Check out the latest adventure games that every gamer should play! " . $lorem, "https://via.assets.so/game.png?id=202&w=500"),
        array("RPG", 3, "Top RPG Games for 2023", "Find out which RPG games are dominating the market this year! " . $lorem, "https://via.assets.so/game.png?id=203&w=500"),
        array("Sports", 4, "Exciting Sports Games for Every Season", "Stay active with these essential sports games! " . $lorem, "https://via.assets.so/game.png?id=204&w=500"),
        array("Strategy", 5, "Top 10 Strategy Games", "Boost your tactical skills with these top strategy game picks! " . $lorem, "https://via.assets.so/game.png?id=205&w=500"),
        array("Action", 6, "Thrilling and Exciting Action Games", "Explore how action games are becoming a staple in gaming! " . $lorem, "https://via.assets.so/game.png?id=206&w=500"),
        array("Adventure", 7, "Review: Latest Adventure Games", "Read our review of the newest adventure games in the market! " . $lorem, "https://via.assets.so/game.png?id=207&w=500"),
        array("RPG", 8, "Must-Have RPG Games for 2023", "Learn about the must-have RPG games for this year! " . $lorem, "https://via.assets.so/game.png?id=208&w=500"),
        array("Sports", 9, "Top Sports Games for Outdoor Enthusiasts", "Get insights into the most engaging sports games! " . $lorem, "https://via.assets.so/game.png?id=209&w=500"),
        array("Strategy", 10, "New Trends in Strategy Games", "Discover the latest trends in strategy gaming! " . $lorem, "https://via.assets.so/game.png?id=210&w=500"),
        array("Action", 11, "Action Games for Every Occasion", "Make your gaming setup complete with these versatile action games! " . $lorem, "https://via.assets.so/game.png?id=211&w=500"),
        array("Adventure", 12, "Top Adventure Games for 2023", "Find the perfect adventure games for your needs! " . $lorem, "https://via.assets.so/game.png?id=212&w=500"),
        array("RPG", 13, "Latest in RPG Game Design", "Stay updated with the latest in RPG game design! " . $lorem, "https://via.assets.so/game.png?id=213&w=500"),
        array("Sports", 14, "Best Sports Games for Winter", "Learn how to choose the best sports games for winter! " . $lorem, "https://via.assets.so/game.png?id=214&w=500"),
        array("Strategy", 15, "High-Performance Strategy Games", "Understand the benefits and features of high-performance strategy games! " . $lorem, "https://via.assets.so/game.png?id=215&w=500"),
        array("Action", 16, "Action Games: Intensity and Fun", "Explore the balance of intensity and fun in action games! " . $lorem, "https://via.assets.so/game.png?id=216&w=500"),
        array("Adventure", 17, "Smart Adventure Games: A Guide", "Upgrade your adventure gaming experience with these smart games! " . $lorem, "https://via.assets.so/game.png?id=217&w=500"),
        array("RPG", 18, "RPG Games for Fantasy Lovers", "Check out the top RPG games for fantasy lovers! " . $lorem, "https://via.assets.so/game.png?id=218&w=500"),
        array("Sports", 19, "Best Sports Games for Fitness", "Learn about the best sports games to keep you fit! " . $lorem, "https://via.assets.so/game.png?id=219&w=500"),
        array("Strategy", 20, "Eco-Friendly Strategy Games", "Discover the future trends of eco-friendly strategy games! " . $lorem, "https://via.assets.so/game.png?id=220&w=500"),
        array("Action", 21, "Action Games for Every Gamer", "Discover how action games are perfect for every gamer! " . $lorem, "https://via.assets.so/game.png?id=221&w=500"),
        array("Adventure", 22, "Innovative Adventure Games", "Explore the best and most innovative adventure games available today! " . $lorem, "https://via.assets.so/game.png?id=222&w=500")
    );

    // Insert sample data into the games table
    foreach ($sample_data as $post) {
        $category = mysqli_real_escape_string($conn, $post[0]);
        $title = mysqli_real_escape_string($conn, $post[2]);
        $description = mysqli_real_escape_string($conn, $post[3]);
        $image_url = mysqli_real_escape_string($conn, $post[4]);

        try {
            $sql_insert = "INSERT INTO games (category, title, description, image_url) VALUES ('$category', '$title', '$description', '$image_url')";
            if (mysqli_query($conn, $sql_insert)) {
                // echo "Record inserted successfully<br>";
            } else {
                echo "Error inserting record: " . mysqli_error($conn) . "<br>";
            }
        } catch (Exception $e) {
            echo "Error inserting record: " . $e->getMessage() . "<br>";
        }
    
    }

    // Insert a user with fake data
    $sql = "INSERT INTO `users` (`id`, `name`, `email`, `bio`) VALUES
        (1, 'John Doe', 'john.doe@example.com', 'This is a sample bio for John Doe.')";

    if (mysqli_query($conn, $sql)) {
        // echo "User inserted successfully<br>";
    } else {
        echo "Error inserting user: " . mysqli_error($conn) . "<br>";
    }

    // Close connection
    mysqli_close($conn);
}

// Populate data
populateData();
?>