$(function() {
    $('#colorpickerholder input:radio').each(function() {
        $(this).hide();
        $('<a class="radio-fx" href="#"><div class="radio"></div></a>').insertAfter(this);
    });
    $('#colorpickerholder .radio-fx').live('click',function(e) {
        e.preventDefault();
          var $check = $(this).prev('input');
          $('.radio-fx div').attr('class','radio');
          $(this).find('div').attr('class','radio-checked');          
          $check.attr('checked', true);
    });
    $('#colorpickerholder div.radio').each(function(){
        var $this = $(this);
        var $thelink = $this.parent();
        var $theradio = $thelink.prev('input');
        var $thecolor = $theradio.attr('value');
        var $thebgcolor = 'background-color: #' + $thecolor;
        $this.attr('style', $thebgcolor);
    });
    
});