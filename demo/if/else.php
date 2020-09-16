<?php  

<?php if(array_values($value)==0):  ?>
    <?php  $value[3]="女" ?>
      <?php else: ?>

<?php $value[3]="男"?>
<?php   endif   ?>

<?php print_r($value[3]) ?>
?>