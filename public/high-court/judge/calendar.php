<?php

require_once('../../../private/initialize.php');

if (isset($_POST['calendar'])) {
  $events = CourtCase::find_by_judge_event($loggedInAdmin->id);

  // foreach ($events as $event) {
    exit(json_encode(
      [
        'event' => $events[0],
        // 'title' => $event->court_case_name,
        // 'start' => $event->assigned_to_judge_on,
        // 'end' => '',
      ]
    ));
  // }
}
