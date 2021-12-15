<?php
// 97,122   /a-z/
// 48, 57   /0-9/
// 65,90    /A-Z/
//chr($int);  =>str
//ord($str);  =>int


/**
 * 1.英文大小寫及數字的組合
 * 2.每次產生的字串在4-8之間
 * 3.每次產生的排序順序不固定
 */
$len = rand(4, 5);
$font_arr = array();
for ($i = 0; $i < $len; $i++) {
    $type = rand(1, 3);
    switch ($type) {
        case 1:
            $font_arr[] = chr(rand(48, 57));
            break;
        case 2:
            $font_arr[] = chr(rand(65, 90));
            break;
        case 3:
            $font_arr[] = chr(rand(97, 122));
            break;
    }
}
$str =implode("",$font_arr);
foreach($font_arr as $key => $font){
    $font_size = rand(20,30);
    $deg = rand(-30,30);
    fonttoimg($font,$font_size,$deg ,$key);
    echo "<img src='./captcha/captcha".$key.".png'>";
}
echo "<div id ='a' style='display:none;'>".$str."</div>";


function fonttoimg($font,$font_size, $deg , $key)
{
    // $dir= dirname(realpath(__DIR__));
    // $sep=DIRECTORY_SEPARATOR;   
    // $fontname =$dir.$sep.'arial.ttf';


    // $fontBox = imagettfbbox($font_size, $deg, $fontname, $font);
    $fontBox = imagettfbbox($font_size, $deg, 'E:\web\file\font\arial.ttf', $font);
    // $fontBox = imagettfbbox($font_size, $deg, '/home/s1100404/survey/include/arial.ttf', $font);
    // $fontBox = imagettfbbox($font_size, $deg, 'D:\web\Survey\font\arial.ttf', $font);
    //                    (  ,  ,            絕對路徑          , string )
    $small_x = min($fontBox[0],$fontBox[2],$fontBox[4],$fontBox[6]);
    $small_y = min($fontBox[1],$fontBox[3],$fontBox[5],$fontBox[7]);
    $big_x =max($fontBox[0],$fontBox[2],$fontBox[4],$fontBox[6]);
    $big_y =max($fontBox[1],$fontBox[3],$fontBox[5],$fontBox[7]);
    
    $dstimg = imagecreatetruecolor(($big_x - $small_x), ($big_y - $small_y));
    $white =  imagecolorallocate($dstimg, 255, 255, 255);
    $black =  imagecolorallocate($dstimg, 0, 0, 0);
    imagefill($dstimg, 0, 0, $white);

    // $res = imagettftext($dstimg, $font_size, $deg, (0 - $small_x), (0 - $small_y), $black, '/home/s1100404/survey/include/arial.ttf', $font);
    // $res = imagettftext($dstimg, $font_size, $deg, (0 - $small_x), (0 - $small_y), $black, 'arial.ttf', $font);
    // $res = imagettftext($dstimg, $font_size, $deg, (0 - $small_x), (0 - $small_y), $black, $fontname, $font);
    $res = imagettftext($dstimg, $font_size, $deg, (0 - $small_x), (0 - $small_y), $black, 'E:\web\file\font\arial.ttf', $font);
    // // $res = imagettftext($dstimg, $font_size, $deg, (0 - $small_x), (0 - $small_y), $black, $font_src, $font);
    // // $res = imagettftext($dstimg, $font_size, $deg, (0 - $small_x), (0 - $small_y), $black, 'D:\web\Survey\font\arial.ttf', $font);

    imagepng($dstimg, './captcha/captcha'.$key.'.png');
}

?>