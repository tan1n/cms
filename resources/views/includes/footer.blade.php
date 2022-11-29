<!--==========================
    Footer
  ============================-->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright &nbsp;<strong>Agile1Tech.com</strong>.&nbsp; All Rights Reserved
        </div>
    </div>
</footer><!-- #footer -->

<a href="#"
   class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<script src="{{asset('dist/bundle.js')}}"></script>
<script>
    function onSubmit(token) {
        const url = "{{route('contact')}}";
        const data = Object.fromEntries(new FormData($('form')[0]));
        $.ajax({
            method : "POST",
            data : data,
            url : url,
            success : function (res) {
                $('#sendmessage').show();
                $("#contact-form").find("input[type=text],input[type=email],textarea").val("")
            },
            fail : function (res){
                $('#sendmessage').show();
            }
         })
    };
</script>
</body>

</html>