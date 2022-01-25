<div class = "clock"></div>
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type = "text/javascript"> 
    $(document).ready(
        $.getJSON("/Main/clock", function(data) {
            $("div.clock").html(data.date);
        })
    );
</script>