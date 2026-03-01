<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view("frontend/_partials/head.php") ?>

    <?php 
        foreach($css ?? [] as $css_link) {
            echo "<link rel='stylesheet' href='$css_link'> \r\n";
        } 
    ?>

</head>

<body>
    <!-- Content -->
        <?php $this->load->view("{$page}") ?>
    <!-- End Content -->

    <!-- Footer Section Begin -->
        <!-- footer -->
        <?php $this->load->view("frontend/_partials/footer.php", []) ?>
    <!-- Footer Section End -->
    
    <!-- Js Plugins -->
    <?php $this->load->view("frontend/_partials/js.php") ?>

    <?php 
        foreach($js ?? [] as $key => $js_link) {
            echo "<script src='$js_link' $key></script> \r\n";
        } 
    ?>
</body>

</html>