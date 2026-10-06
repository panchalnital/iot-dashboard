<?php
// Backend: returns dashboard data as JSON. Replace the mock arrays with DB queries (PDO) when ready.
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

$engineDays = ['20 Mar','21 Mar','22 Mar','23 Mar','24 Mar','25 Mar','26 Mar','27 Mar','28 Mar','29 Mar','30 Mar','31 Mar','1 Apr','2 Apr','3 Apr'];
$days       = array_slice($engineDays, 2);

$distanceCurrent  = [48, 44, 42, 42, 38, 30, 0, 0, 12, 42, 40, 36, 33];
$distancePrevious = [13, 13, 6, 14, 12, 22, 17, 12, 15, 17, 40, 44, 38];

$data = [
  'distance' => [
    'labels'   => $days,
    'current'  => $distanceCurrent,
    'previous' => $distancePrevious,
    'total'    => 431,
    'change'   => 45,
  ],
  'engineHours' => [
    'labels'   => $engineDays,
    'ignition' => [1,18,17,15,11,22,15,20,17,4,0,4,14,16,16],
    'idling'   => [11,14,10,7,10,10,10,9,9,16,0,0,11,22,19],
  ],
  'activity' => [
    'total'  => 1246,
    'labels' => ['Ignition Off','Ignition','Idling'],
    'values' => [880, 210, 156],
  ],
  'messages' => [
    'labels' => $days,
    'values' => [2900,3600,3750,3800,4300,3400,3550,3450,3250,100,80,1000,4250],
  ],
  // start/end are decimal hours; status: idle(orange) | moving(teal) | alert(olive)
  'dayOverview' => [
    ['id'=>'BL-08', 'stats'=>['off'=>52.2,'idle'=>29.4,'moving'=>51.1,'alert'=>0.1], 'segments'=>[
      [10.5,11.3,'idle'],[11.3,11.55,'moving'],[11.55,11.8,'idle'],
      [12.3,12.33,'idle'],[12.33,15.4,'moving'],
      [15.5,15.8,'moving'],[15.8,16.05,'idle'],[16.05,16.5,'moving'],[16.85,17.05,'moving']]],
    ['id'=>'Q-47898', 'stats'=>['off'=>29.8,'moving'=>23.9,'alert'=>0.2], 'segments'=>[
      [10.5,12.28,'moving'],[12.28,12.38,'alert'],
      [13.5,15.3,'moving'],[15.3,15.4,'alert'],[15.4,16.3,'moving'],[16.3,16.4,'alert'],
      [17.5,17.75,'moving']]],
    ['id'=>'D-26653', 'stats'=>['off'=>36.7,'idle'=>19.4,'moving'=>30.6], 'segments'=>[
      [10.5,10.6,'idle'],[10.6,10.9,'moving'],[10.9,12.3,'idle'],[12.3,12.35,'moving'],[12.35,13.0,'idle'],[13.0,13.1,'moving'],
      [13.4,13.7,'moving'],[13.7,14.2,'idle'],[14.2,14.75,'moving'],[14.75,14.9,'idle'],[14.9,16.0,'moving'],[16.0,16.25,'idle'],[16.25,16.35,'moving'],
      [16.6,16.9,'moving'],[16.9,17.3,'idle'],[17.3,17.75,'moving']]],
  ],
];

echo json_encode($data);
