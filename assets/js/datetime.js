function display_c(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
    var x = new Date()
    var day;
        if(x.getDay() == 1){
            day = "Senin";
        }else if(x.getDay() == 2){
            day = "Selasa";
        }else if(x.getDay() == 3){
            day = "Rabu";
        }else if(x.getDay() == 4){
            day = "Kamis";
        }else if(x.getDay() == 5){
            day = "Jumat";
        }else if(x.getDay() == 6){
            day = "Sabtu";
        }else if(x.getDay() == 0){
            day = "Minggu";
        }
    var month;
        if(x.getMonth() +1  == 1){
            month = "Januari";
        }else if(x.getMonth() +1 == 2){
            month = "Februari";
        }else if(x.getMonth() +1 == 3){
            month = "Maret";
        } else if(x.getMonth() +1 == 4){
            month = "April";
        } else if(x.getMonth() +1 == 5){
            month = "Mei";
        } else if(x.getMonth() +1 == 6){
            month = "Juni";
        } else if(x.getMonth() +1 == 7){
            month = "Juli";
        } else if(x.getMonth() +1 == 8){
            month = "Agustus";
        } else if(x.getMonth() +1 == 9){
            month = "September";
        } else if(x.getMonth() +1 == 10){
            month = "Oktober";
        } else if(x.getMonth() +1 == 11){
            month = "November";
        } else if(x.getMonth() +1 == 12){
            month = "Desember";
        }
    var x1= day+", " + x.getDate() + " " + month +  ", " + x.getFullYear(); 
    document.getElementById('ct').innerHTML = x1;

    var hour=x.getHours();
    var minute=x.getMinutes();
        if(hour <10 ){hour='0'+hour;}
        if(minute <10 ) {minute='0' + minute; }
    var x2 =hour+':'+minute;

    document.getElementById('ct1').innerHTML = x2;


    if(x.getHours()>=0 && x.getHours()<5){
        document.getElementById('gret').innerHTML ="Good Early Morning ";
    }   
    else if(x.getHours()<12 && x.getHours()>=5){
        document.getElementById('gret').innerHTML ="Good Morning ";
    }
    else if(x.getHours()<15 && x.getHours()>=12){
        document.getElementById('gret').innerHTML ="Good Afternoon ";
    }
    else if(x.getHours()<18 && x.getHours()>=15){
        document.getElementById('gret').innerHTML ="Good Evening ";
    }
    else {
        document.getElementById('gret').innerHTML ="Good Night ";
    }

    
    display_c();


}

