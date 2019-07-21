window.onload=function(){
    var banner = document.getElementById('first-banner');
    var panel = document.getElementById('panel');
    banner.onmouseover = function(){
        panel.style.display = 'block';  
    };
    banner.onmouseout = function(){
        panel.style.display = 'none';
    };
    panel.onmouseover = function(){
        panel.style.display = 'block';
    }
    panel.onmouseout = function(){
        panel.style.display = 'none';
    };
     if (screen.width < 1364){
         window.onload=function(){
            var secondBanner = document.getElementsByClassName('second-banner');
            var img = secondBanner.firstChild.getElementsByClassName('image');
            img.setAttribute('style', 'max-width: 67%; height: auto;');
            img.style.maxWidth = "67%";  
         }
     } 
};