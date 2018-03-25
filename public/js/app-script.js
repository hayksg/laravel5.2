$(function(){
    
    var pathname = window.location.pathname;	

    if (pathname !== '/') {
        var result = pathname.match(/([a-z]+)/);
        $('.navbar-nav > li > a[href="/'+result[0]+'"]').parent().addClass('active');
    }
    
});