<?php

namespace Utils\Random;

class ImageGenerator {

    public static function generateLogo($label) {
        $width = $height = 50;
        $im = imagecreatetruecolor($width, $height);
        $text_color = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
        $bg_color = imagecolorallocate($im, 240, 240, 240);

        imagefill($im, 0, 0, $bg_color);
        $stepX = $width / 3;
        $stepY = $height / 3;
        for ($x = 0; $x < $width; $x+=$stepX)
            for ($y = 0; $y < $height; $y+=$stepX)
                imagefilledrectangle($im, $x, $y, $x + $stepX, $y + $stepY, rand(0,1) % 2 == 0 ? $text_color : $bg_color);

        imagepng($im, "assets/img/logo-$label.png");
        return "assets/img/logo-$label.png";
    }
    public static function generateScreenshot($label) {
        $width = 320; $height = 180;
        $im = imagecreatetruecolor($width, $height);
        $text_color = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
        $bg_color = imagecolorallocate($im, 240, 240, 240);

        imagefill($im, 0, 0, $bg_color);
        $stepX = $width / 3;
        $stepY = $height / 3;
        for ($x = 0; $x < $width; $x+=$stepX)
            for ($y = 0; $y < $height; $y+=$stepX)
                imagefilledrectangle($im, $x, $y, $x + $stepX, $y + $stepY, rand(0,1) % 2 == 0 ? $text_color : $bg_color);

        imagepng($im, "assets/img/screenshot-$label.png");
        return "assets/img/screenshot-$label.png";
    }
}


