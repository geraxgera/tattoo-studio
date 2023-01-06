<?php

?>
<section class="text-gray-600 body-font bg-gradient-to-b from-gray-600  to-black absolute w-full h-full overflow-hidden">
<h1>Alle Bewertungen</h1>

<div class="container flex h-96 flex items-center absolute w-[600px] top-[130px] right-[450px]">
    
    <?php
        foreach($rezensionen as $rezension):
    ?>
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white m-2 ">
  <img class="w-full p-5 flex-wrap  " src="./photo_uploads/<?php echo $rezension["image"] ?>" alt="Sunset in the mountains">
  <div class="px-6 py-4">
    <p class="text-black text-base">
        <?php echo $rezension["description"] ?>
    </p>
  </div>
  
</div>
<?php
    endforeach;
?>

</div>

