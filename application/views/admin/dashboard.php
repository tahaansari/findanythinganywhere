<?php include "includes/header.php"; ?>
<div class="content-wrapper" style="min-height: 1000px;height: 100%;">
   <section class="content-header">
      <h1>
         Dashboard
         <small></small>
      </h1>
   </section>
   <section class="content">
      <?php
         if(isset($output)){
         
             echo $output;
         }
         
         ?>
   </section>
</div>
<?php include "includes/footer.php"; ?>