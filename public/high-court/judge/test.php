<?php

$data = array(


  [
    "title" => "All Day Event",
    "start" => "2020-02-01"
  ],
  [
    "title" => "Long Event",
    "start" => "2020-02-07",
    "end" => "2020-02-10"
  ],
  [
    "id" => "999",
    "title" => "Repeating Event",
    "start" => "2020-02-09T16:00:00-05:00"
  ],
  [
    "id" => "999",
    "title" => "Repeating Event",
    "start" => "2020-02-16T16:00:00-05:00"
  ],
  [
    "title" => "Conference",
    "start" => "2020-02-11",
    "end" => "2020-02-13"
  ],
  [
    "title" => "Meeting",
    "start" => "2020-02-12T10:30:00-05:00",
    "end" => "2020-02-12T12:30:00-05:00"
  ],
  [
    "id"    => "999",
    "title" => "Lunch",
    "start" => "2020-02-12T12:00:00-05:00"
  ],
  [
    "title" => "Meeting",
    "start" => "2020-02-12T14:30:00-05:00"
  ],
  [
    "title" => "Happy Hour",
    "start" => "2020-02-12T17:30:00-05:00"
  ],
  [
    "title" => "Dinner",
    "start" => "2020-02-12T20:00:00"
  ],
  [
    "title" => "Birthday Party",
    "start" => "2020-02-13T07:00:00-05:00"
  ]
);
// echo json_encode($data[0]['title']);
echo '<pre>'; 
print_r(json_encode($data)); 
// print_r($data); 
echo '</pre>';