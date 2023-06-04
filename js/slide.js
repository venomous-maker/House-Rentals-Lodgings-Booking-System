        var i=0;// start point
        var images=[];
        var time=4000;
        //images
        images[0]='images/daily2.jpg';
        images[1]='images/seku8.jpg';
        images[2]='images/seku9.jpg';
        

        //function to slide the photos
        function changeImg(){
        document.slide.src=images[i];
        if(i<images.length-1){
            i++;
        }else{
            i=0;
        }
        setTimeout("changeImg()",time);
        }
        window.onload=changeImg;