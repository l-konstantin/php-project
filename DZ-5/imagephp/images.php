<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work with photo</title>
</head>
<body>
    <div class="php_text">
        <h2>Photo standard</h2>
    </div>
    <div class="php_image">
        <img class="php_photo" src="../icons/photo-1.jpg" style="width: 500px;" alt="standard" />
    </div>
    <?php
        function changePhoto()
        {
            $image = './icons/photo-1.jpg';
            $new_image = './icons/new/new_photo.jpg';

            $img = imagecreatefromjpeg($image);
            $degress = 45;
            $imgRotated = imagerotate($img, $degress, 0);
            imagejpeg($imgRotated, $new_image, 45);
        }
        changePhoto();
    ?>
    <div class="php_text-45">
        <h2>Photo 45deg</h2>
    </div>
    <div class="php_image">
        <img class="php_45" src="../icons/new/new_photo.jpg" style="width:500px; height: 300px;" alt="45" />
    </div>
    <hr>
    <div class="php_image">
        <h2>Photo watermarker</h2>
    </div>
    <div class="php_image">
        <img class="php_image_watermarker" src="../icons/watermark.png" style="width: 80px; height: 40px;" alt="water" />
    </div>
    <div class="php_image">
        <h2>Photo not watermarker</h2>
    </div>
    <div class="php_image">
        <img class="php_image_watermarker" src="../icons/photo-1.jpg" style="width: 500px; height: 300px; alt="water" />
    </div>

    <?php
        function image_create($image_path) {
            $ext = pathinfo($image_path, PATHINFO_EXTENSION);
            switch ($ext) {
                case 'gif':
                    $icon = imagecreatefromgif($image_path);
                    break;
                case 'jpg':
                    $icon = imagecreatefromjpeg($image_path);
                    break;
                case 'png':
                    $icon = imagecreatefrompng($image_path);
                    break;
                default:
                    throw new Exception('Неверный формат файла');
            }
            unset($ext);
            return $icon;
        }

        function watermark($image_source, $watermark_source) {
            if (!file_exists($image_source)) { throw new Exception('Изображение '.$image_source.' не найдено'); }
            if (!file_exists($watermark_source)) { throw new Exception('Изображение '.$watermark_source.' не найдено'); }

            $image = image_create($image_source);
            $watermark = image_create($watermark_source);

            $size_image = getimagesize($image_source);
            $size_water = getimagesize($watermark_source);

            $img['width'] = $size_image['0'];
            $img['height'] = $size_image['1'];

            $water['width'] = $size_water['0'];
            $water['height'] = $size_water['1'];
            $water['padding'] = 10;

            $final_x = $img['width'] - $water['width'] - $water['padding'];
            $final_y = $img['height'] - $water['width'] - $water['padding'];

            imagecopy($image, $watermark, $final_x, $final_y, 0, 0, $water['width'], $water['height']);
            imagejpeg($image, './icons/new/photo_watermarker.jpg', 90);

            imagedestroy($image);
            imagedestroy($watermark);
        }
        watermark('./icons/photo-1.jpg', './icons/watermark.png');
    ?>

    <div class="photo_watermarker">
        <h2>Photo with watermarker</h2>
    </div>
    <div class="php_image">
        <img class="php_photo_water" src="../icons/new/photo_watermarker.jpg" alt="p_watermarker" />
    </div>
    <hr>
    <div class="photo_with_text">
        <h2>Photo not with</h2>
    </div>
    <div class="php_image">
        <img class="php_photo_water" src="../icons/photo-1.jpg" alt="photo_width" />
    </div>
    <?php
        $standard = getimagesize("./icons/photo-1.jpg");
        $new_width = imagecreatefromjpeg("./icons/photo-1.jpg");

        $iwidth = $standard[0];
        $iheight = $standard[1];
        $k_width = $iwidth/200;
        $new_height = ceil($iheight / $k_width);

        $direct = imagecreatetruecolor(200, $new_height);

        imagecopyresampled($direct, $new_width, 0, 0, 0, 0, 200, $new_height, ImageSX($new_width), ImageSY($new_width));

        imagejpeg($direct, "./icons/new/new_width_photo.jpg");
    ?>
    <div class="photo_with_text">
        <h2>Photo width=200px</h2>
    </div>
    <div class="php_image">
        <img class="php_photo_water" src="../icons/new/new_width_photo.jpg" alt="photo_width" />
    </div>
</body>
</html>