<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/image1.jpg')}}">
    <title>Nueva Terminal</title>
    <link href=" {{asset('ample/css/style.css')}}" rel="stylesheet">
    <link href=" {{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('ample/bootstrap/bootstrap.min.css')}}" crossorigin="anonymous">
    
</head>
<body>
    <div class="input-group mb-3 col-sm-8 col-md-7 col-lg-5 col-xl-4">
        <div class="input-group-prepend ">
            <label class="input-group-text input-red" for="departamento">DESTINO</label>
        </div>
            <select class="custom-select borde-red text-uppercase" name="departamento" id="departamento" onchange="search(this.value)" required>
                @foreach($departamentos as $id => $destino)
                    <option value="{{$destino}}" {{ old('departamento')=='$destino' ? 'selected' : ''  }}>{{$destino}}</option>
                @endforeach
            </select>
    </div>
    <div id="nacional">
        @include('tablero.terminal.transporte')
    </div>

    <script>
        function search(val){
            fetch('{{route('terminal.destino')}}?tipo=Nacional&destino='+val,{ method:'get' })
            .then(response  =>  response.text() )
            .then(html      =>  {   document.getElementById("nacional").innerHTML = html  });
        }
    </script>
    <script type="text/javascript">
function getDocHeight(doc) {
    doc = doc || document;
    // stackoverflow.com/questions/1145850/
    var body = doc.body, html = doc.documentElement;
    var height = Math.max( body.scrollHeight, body.offsetHeight, 
        html.clientHeight, html.scrollHeight, html.offsetHeight );
    return height;
}

function setIframeHeight(id) {
    var ifrm = document.getElementById(id);
    var doc = ifrm.contentDocument? ifrm.contentDocument: 
        ifrm.contentWindow.document;
    ifrm.style.visibility = 'hidden';
    ifrm.style.height = "10px"; // reset to minimal height ...
    // IE opt. for bing/msn needs a bit added or scrollbar appears
    ifrm.style.height = getDocHeight( doc ) + 4 + "px";
    ifrm.style.visibility = 'visible';
}

document.getElementById('ifrm').onload = function() { // Adjust the Id accordingly
    setIframeHeight(this.id);
}
</script>
</body>
</html>