<div class="footer">
    <p class="copyright">
        &copy; 2018, Tomáš Prošek
    </p>
</div>

<!--Basic JQuery library from CDN-->
<script type="text/javascript" src="js/jquery-latest.min.js"></script>
<!--JQuery UI support for datepicker component from CDN-->
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<!--JQuery date mask script-->
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(function () {
        // Set mask for date input
        // Set datapicker support with date format for date input
        $('.deadline')
            .mask('00.00.0000', {placeholder: "Zadejte termín splnění ve formátu dd.mm.yyyy..."})
            .datepicker({dateFormat: "dd.mm.yy"});
        $(".form").validate();
    });
</script>

</body>
</html>