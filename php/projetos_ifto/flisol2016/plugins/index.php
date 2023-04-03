<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head id="Head1">
        <title>Grupo Quap</title>
        <script type="text/javascript">
            var YY = 2013;
            var MM = 04;
            var DD = 27;
            var HH = 08;
            var MI = 00;
            var SS = 00;
            function atualizaContador()
                {var hoje = new Date();
                    var futuro = new Date(YY,MM-1,DD,HH,MI,SS);
                    var ss = parseInt((futuro - hoje) / 1000);
                    var mm = parseInt(ss / 60);
                    var hh = parseInt(mm / 60);
                    var dd = parseInt(hh / 24);ss = ss - (mm * 60);mm = mm - (hh * 60);hh = hh - (dd * 24);
                    var faltam = '';faltam += (dd && dd > 1) ?'<b>Faltam '+dd+' dias, </br> ' : (dd==1 ? '1 dia, ' : '');
                    faltam += (toString(hh).length) ? hh+' hr, ' : '';faltam += (toString(mm).length) ? mm+' min e ' : '';faltam += ss+' seg';
                    if (dd+hh+mm+ss > 0) {document.getElementById('contador').innerHTML = faltam;
                        setTimeout(atualizaContador,1000);} 
                    else {document.getElementById('contador').innerHTML = 'CHEGOU!!!!';setTimeout(atualizaContador,1000);}}
    </script> 
    </head>
    <body >
        <p onload="atualizaContador()">

                    <div id="relogio" style="font-family: Arial Unicode MS; font-size:29px; text-align:center; color:#804000; padding-top:400px;"><span id="contador"></span>
                    </div>
               
        </p>
    </body>
</html>