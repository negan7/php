<?php
define("TITLE", "Menu | Fine Dining");

include('includes/header.php');
?>

<div>
    <h1>Our delicious Menu !</h1>
    <p>Like our team, our menu is small &mdash; but dang, blow your head off!</p>
    <p><em>Click any menu item to know more about it</em></p>
    
    <hr>
    
    <ul>
        <?php       
        foreach ($menuItems as $dish => $item) { ?>
        <li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item[title]; 
        ?></a> <sup>$</sup><?php echo $item[price]; ?></li>
        
        <?php } ?>
                          
              
    </ul>
</div><!--- Menu items

<?php include('includes/footer.php');
?> 
      

