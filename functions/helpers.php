<?php

// Config

define('BASE_URL' , 'http://localhost/php-blog/');

function redirect($url)
{
    header("location: ". trim(BASE_URL , "/ ") . "/" . trim($url , "/ "));
    exit();
}

function asset($file)
{
    return trim(BASE_URL , "/ ") . "/" . trim($file , "/ ");
}

function url($url)
{
    return trim(BASE_URL , "/ ") . "/" . trim($url , "/ ");
}


function dd($value){
    echo "<pre>";
    var_dump($value);
    exit();
}


function bye()
{
    die();
}

function lorem($number = 1){
        if ($number == 1){
            echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum neque egestas congue quisque egestas diam in arcu cursus. Sit amet nisl purus in. At tellus at urna condimentum mattis pellentesque. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Sit amet porttitor eget dolor morbi non arcu. Consectetur adipiscing elit duis tristique sollicitudin. Arcu risus quis varius quam quisque. Facilisis sed odio morbi quis commodo odio aenean sed. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget egestas.";
        }

        if ($number == 2){
            echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum neque egestas congue quisque egestas diam in arcu cursus. Sit amet nisl purus in. At tellus at urna condimentum mattis pellentesque. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Sit amet porttitor eget dolor morbi non arcu. Consectetur adipiscing elit duis tristique sollicitudin. Arcu risus quis varius quam quisque. Facilisis sed odio morbi quis commodo odio aenean sed. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum neque egestas congue quisque egestas diam in arcu cursus. Sit amet nisl purus in. At tellus at urna condimentum mattis pellentesque. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Sit amet porttitor eget dolor morbi non arcu. Consectetur adipiscing elit duis tristique sollicitudin. Arcu risus quis varius quam quisque. Facilisis sed odio morbi quis commodo odio aenean sed. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget egestas.";
        }

        if ($number == 3){
            echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum neque egestas congue quisque egestas diam in arcu cursus. Sit amet nisl purus in. At tellus at urna condimentum mattis pellentesque. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Sit amet porttitor eget dolor morbi non arcu. Consectetur adipiscing elit duis tristique sollicitudin. Arcu risus quis varius quam quisque. Facilisis sed odio morbi quis commodo odio aenean sed. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum neque egestas congue quisque egestas diam in arcu cursus. Sit amet nisl purus in. At tellus at urna condimentum mattis pellentesque. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Sit amet porttitor eget dolor morbi non arcu. Consectetur adipiscing elit duis tristique sollicitudin. Arcu risus quis varius quam quisque. Facilisis sed odio morbi quis commodo odio aenean sed. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum neque egestas congue quisque egestas diam in arcu cursus. Sit amet nisl purus in. At tellus at urna condimentum mattis pellentesque. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Sit amet porttitor eget dolor morbi non arcu. Consectetur adipiscing elit duis tristique sollicitudin. Arcu risus quis varius quam quisque. Facilisis sed odio morbi quis commodo odio aenean sed. Ullamcorper velit sed ullamcorper morbi tincidunt ornare massa eget egestas.";
        }

        if ($number == 4){
            echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Adipiscing at in tellus integer feugiat scelerisque varius morbi. Lacus luctus accumsan tortor posuere. Aenean euismod elementum nisi quis eleifend quam adipiscing. Orci nulla pellentesque dignissim enim sit. Tortor at risus viverra adipiscing at. Porta lorem mollis aliquam ut. Iaculis eu non diam phasellus vestibulum lorem sed. A diam maecenas sed enim ut. Habitant morbi tristique senectus et netus et malesuada. Aliquet porttitor lacus luctus accumsan tortor. Sit amet facilisis magna etiam tempor orci. Imperdiet dui accumsan sit amet nulla facilisi morbi tempus. Elementum tempus egestas sed sed risus pretium quam vulputate dignissim. Adipiscing enim eu turpis egestas pretium aenean pharetra magna. Nibh venenatis cras sed felis eget velit aliquet. Lacus sed turpis tincidunt id aliquet risus feugiat.

            Ac turpis egestas integer eget aliquet nibh praesent tristique magna. Lacus sed turpis tincidunt id aliquet. Nullam ac tortor vitae purus faucibus ornare suspendisse sed nisi. Ut venenatis tellus in metus vulputate eu scelerisque. Aliquet bibendum enim facilisis gravida neque convallis. Quis lectus nulla at volutpat diam ut. Aliquet eget sit amet tellus cras adipiscing enim eu. A condimentum vitae sapien pellentesque habitant morbi tristique. Massa sed elementum tempus egestas sed sed risus pretium. Ut ornare lectus sit amet est. Luctus venenatis lectus magna fringilla urna porttitor.
            
            Commodo viverra maecenas accumsan lacus vel facilisis volutpat est. Vitae et leo duis ut diam quam nulla porttitor. Fames ac turpis egestas integer eget aliquet nibh praesent tristique. Nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet. Tincidunt vitae semper quis lectus nulla at. Luctus accumsan tortor posuere ac ut consequat semper viverra nam. Etiam sit amet nisl purus. Consectetur adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Diam quam nulla porttitor massa id neque. Pretium quam vulputate dignissim suspendisse in est ante. Praesent semper feugiat nibh sed pulvinar proin gravida hendrerit lectus.
            
            Lectus magna fringilla urna porttitor rhoncus dolor purus non. Elit ullamcorper dignissim cras tincidunt. Senectus et netus et malesuada fames ac turpis. Faucibus nisl tincidunt eget nullam non. Arcu bibendum at varius vel pharetra. Maecenas accumsan lacus vel facilisis volutpat est. A cras semper auctor neque vitae tempus. Viverra accumsan in nisl nisi scelerisque eu ultrices vitae. Mattis enim ut tellus elementum sagittis. Ornare quam viverra orci sagittis eu. Dis parturient montes nascetur ridiculus mus mauris. In hendrerit gravida rutrum quisque. Enim eu turpis egestas pretium aenean pharetra magna ac. Neque viverra justo nec ultrices. Sit amet est placerat in egestas. Euismod in pellentesque massa placerat duis ultricies lacus.";
        }

        if ($number == 5){
            echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Molestie at elementum eu facilisis. Nibh sed pulvinar proin gravida hendrerit lectus a. Ac tincidunt vitae semper quis lectus nulla at volutpat. Faucibus a pellentesque sit amet porttitor eget dolor morbi. Nisl rhoncus mattis rhoncus urna neque viverra justo. Neque ornare aenean euismod elementum nisi quis eleifend quam adipiscing. Duis at tellus at urna condimentum mattis pellentesque id nibh. Aliquam nulla facilisi cras fermentum odio eu feugiat pretium. Diam vulputate ut pharetra sit amet aliquam id diam. Laoreet sit amet cursus sit amet dictum sit amet. Massa tempor nec feugiat nisl pretium. Posuere ac ut consequat semper viverra nam libero justo. Enim eu turpis egestas pretium aenean pharetra magna. Habitant morbi tristique senectus et netus et malesuada fames ac. Est sit amet facilisis magna etiam tempor orci eu. Mauris pellentesque pulvinar pellentesque habitant. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu.

            Quisque egestas diam in arcu cursus euismod quis. Quis blandit turpis cursus in hac habitasse. Mattis enim ut tellus elementum sagittis vitae et leo. Senectus et netus et malesuada fames ac turpis egestas. Risus sed vulputate odio ut enim. Ac turpis egestas integer eget aliquet nibh praesent. Platea dictumst quisque sagittis purus sit amet volutpat consequat mauris. Vel facilisis volutpat est velit egestas. Eu mi bibendum neque egestas congue. Quis viverra nibh cras pulvinar mattis nunc. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Viverra justo nec ultrices dui sapien eget. Eget aliquet nibh praesent tristique magna sit. Dui sapien eget mi proin. Mattis rhoncus urna neque viverra justo nec ultrices. Sagittis eu volutpat odio facilisis mauris sit amet massa.
            
            Arcu non sodales neque sodales ut etiam sit amet nisl. Nam aliquam sem et tortor consequat id porta nibh venenatis. Mi in nulla posuere sollicitudin aliquam ultrices sagittis. In ornare quam viverra orci sagittis. Lectus proin nibh nisl condimentum id. Turpis in eu mi bibendum. Sed sed risus pretium quam vulputate dignissim suspendisse in. Porta nibh venenatis cras sed felis eget velit. Risus ultricies tristique nulla aliquet enim. Nunc mattis enim ut tellus elementum. Nibh ipsum consequat nisl vel pretium lectus quam id. Porttitor rhoncus dolor purus non enim. Sed velit dignissim sodales ut. Nibh nisl condimentum id venenatis a.
            
            Elementum nibh tellus molestie nunc non blandit massa. Pulvinar neque laoreet suspendisse interdum consectetur libero id faucibus. Pellentesque pulvinar pellentesque habitant morbi tristique senectus et. Ultrices sagittis orci a scelerisque purus semper. Nibh mauris cursus mattis molestie a iaculis at. Vitae semper quis lectus nulla at volutpat diam ut venenatis. Neque aliquam vestibulum morbi blandit cursus risus at ultrices mi. Non curabitur gravida arcu ac tortor dignissim. Tempor orci eu lobortis elementum nibh tellus molestie nunc. Commodo viverra maecenas accumsan lacus. Quis vel eros donec ac odio tempor orci dapibus.
            
            Sit amet purus gravida quis blandit turpis cursus in. Felis bibendum ut tristique et egestas quis. Lacus vestibulum sed arcu non. Nulla facilisi nullam vehicula ipsum a. Elit at imperdiet dui accumsan sit. Ultrices tincidunt arcu non sodales neque sodales ut etiam. Quis varius quam quisque id diam. Vitae congue mauris rhoncus aenean vel. Vel facilisis volutpat est velit egestas. Sem nulla pharetra diam sit amet nisl suscipit.";
        }

        

}


?>