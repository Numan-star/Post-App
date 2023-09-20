<footer class="main-footer position-sticky">
    <strong>Copyright &copy; 2000-<?= date('Y') ?> Numan|Star</strong>
    All rights reserved.
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script>
    function myFunction() {
        var x = document.getElementById("input");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function myFun() {
        var x = document.getElementById("input1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script src="<?php echo base_url(); ?>assest/plugins/jquery/jquery.min.js"></script>
<script src="assest/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo base_url(); ?>assest/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/sparklines/sparkline.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url(); ?>assest/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url(); ?>assest/dist/js/adminlte.js"></script>
<script src="<?php echo base_url(); ?>assest/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assest/dist/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assest/javaScript/js.js"></script>

</body>

</html>