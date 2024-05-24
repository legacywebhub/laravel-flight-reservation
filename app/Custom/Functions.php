<?php

namespace App\Custom;

use DateTime;
use DateTimeZone;

/*
    Class to offer and populate miscellanous functions in our application
*/
class Functions {

    // 
    static public function generateDateTimeID() {
        // Get the current date and time components
        $year = date('Y'); // 4-digit year
        $month = date('m'); // 2-digit month
        $day = date('d'); // 2-digit day
        $hour = date('H'); // 2-digit hour in 24-hour format
        $minute = date('i'); // 2-digit minute
        $second = date('s'); // 2-digit second
        $millisecond = round(microtime(true) * 1000); // Milliseconds
    
        // Concatenate the components to form the ID
        $dateTimeID = $year . $month . $day . $hour . $minute . $second . $millisecond;
    
        return $dateTimeID;
    }

    // Function to generate flight ID
    static public function generateFlightID($length = 5)
    {
        $characters = '0123456789'; // Characters to choose from
        $id = 'FLI-';
    
        for ($i = 0; $i < $length; $i++) {
            $id .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $id;
    }

    // Function to generate booking ID
    static public function generateBookingID()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Characters to choose from
        $numbers = '0123456789'; // Numbers to choose from
        $id = null;
    
        // Generating 3 letters to id
        for ($i = 0; $i < 3; $i++) {
            $id .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Generating 4 numbers to id
        for ($i = 0; $i < 4; $i++) {
            $id .= $numbers[rand(0, strlen($numbers) - 1)];
        }
    
        return $id;
    }

    // Function to generate reference ID
    static public function generateReferenceID()
    {
        return self::generateDateTimeID();
    }

    // Function to convert date to user timezone
    static public function formatDatetimeTimezone($datetime, $timezone) {
        // Create a DateTime object with the transaction timestamp
        $datetime = new DateTime($datetime);

        // Set the timezone to the user's timezone
        $datetime->setTimezone(new DateTimeZone($timezone));

        // Format the datetime as per your requirements
        $datetime = $datetime->format('d M, Y  H:i A'); // 'Y-m-d H:i A'

        return $datetime;
    }
}