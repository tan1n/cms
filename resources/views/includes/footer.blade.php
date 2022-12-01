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
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    $(function(){
    $('#apply-form').on('submit', function(event){
        event.preventDefault();
        const data = Object.fromEntries(new FormData($('form')[0]));
        const hasNumber = /\d/.test(data.name);
        if(hasNumber){
            $("#invalid-name").removeClass('d-none')
            return;
        }
        $("#invalid-name").addClass('d-none')
        $('#apply-form')[0].submit();
    });
});
</script>
<script>
    $('#contact-form').on('submit', function(event){
        event.preventDefault();
        const url = "{{route('contact')}}";
        const data = Object.fromEntries(new FormData($('form')[0]));
        const hasNumber = /\d/.test(data.name);
        if(hasNumber){
            $("#invalid-name").removeClass('d-none')
            return;
        }
        $("#invalid-name").addClass('d-none')
        $.ajax({
            method : "POST",
            data : data,
            url : url,
            success : function (res) {
                $('#sendmessage').show();
                $('#errormessage').hide();
                $("#contact-form").find("input[type=text],input[type=email],textarea").val("")
            },
            error : function (res){
                $('#sendmessage').hide();
                $('#errormessage').show();
            }
         })
    })
</script>
</body>

</html>