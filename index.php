<?php 

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

$option_select = $_GET['option'];

$hotel_filter_parking = [];

foreach($hotels as $filter){
  if($filter['parking'] == $option_select){
    $hotel_filter_parking [] = $filter;
  }elseif($option_select === 'all') {
    $hotel_filter_parking [] = $filter;
  }
}  


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.css' integrity='sha512-bR79Bg78Wmn33N5nvkEyg66hNg+xF/Q8NA8YABbj+4sBngYhv9P8eum19hdjYcY7vXk/vRkhM3v/ZndtgEXRWw==' crossorigin='anonymous'/>
  <title>PHP Hotel</title>
</head>
<body>

<div class="container mt-5 ">
  <!-- FORM GET -->
  <div class="row justify-content-center ">
    <div class="col-3">
      <form action="index.php" method="GET" >
        <h3 class="mb-3">Filter for Parking</h3>  
        <select name="option" class="form-select mb-3" aria-label="Default select example">
          <option value="all">All</option>
          <option value="1">Parking</option>
          <option value="0">No Parking</option>
        </select>
        <button type="submit" class="btn btn-primary">Invio</button>
      </form>
    </div>
  </div>

  <!-- TABLE -->
  <table class="table table-bordered mt-3">
    <thead>
      <tr>
        <?php foreach($hotels[0] as $key => $value): ?>
          <th scope="col"><?php echo strtoupper($key)?></th>
        <?php endforeach; ?>
    </thead>
    <tbody>
      <?php foreach($hotel_filter_parking as $hotel): ?>
      <tr>
          <td><?php echo $hotel['name']?></td>
          <td><?php echo $hotel['description']?></td>  
          <td><?php echo $hotel['parking'] ? 'YES' : 'NO' ?></td>   
          <td><?php echo $hotel['vote']?></td> 
          <td><?php echo $hotel['distance_to_center']?></td>        
      </tr>
      <?php endforeach; ?>
     
    </tbody>
  </table>

</div>

</body>
</html>