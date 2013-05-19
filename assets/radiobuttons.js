$(function() {
    $('input:radio').each(function() {
        $(this).hide();
        $('<a class="radio-fx" href="#"><div class="radio"></div></a>').insertAfter(this);
    });
    $('.radio-fx').live('click',function(e) {
        e.preventDefault();
          var $check = $(this).prev('input');
          $('.radio-fx div').attr('class','radio');
          $(this).find('div').attr('class','radio-checked');          
          $check.attr('checked', true);
    });
    $('div.radio').each(function(){
        var $this = $(this);
        var $thelink = $this.parent();
        var $theradio = $thelink.prev('input');
        var $thecolor = $theradio.attr('value');
        var $thebgcolor = 'background-color: #' + $thecolor;
        $this.attr('style', $thebgcolor);
    });
    $("a.radio-fx").click(function () {
      var thediv = $(this).children();
      var color = thediv.attr("style");
      $("div#previewbox").attr("style", color);
    })
});