<?php
$file_size_allowed = 80000000000;  
$min_size_compress = 30000000; 
$ticket_pic = "../../saas/doc_file/";

function compressImage($source, $destination, $quality)
{
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg' || $info['mime'] == 'image/jpg')
        $image = imagecreatefromjpeg($source);
    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

    imagejpeg($image, $destination, $quality);
}

function upload_img($file1, $file_size_allowed, $min_size_compress, $ticket_pic)
{
    $name = $_FILES[$file1]['name'];
    $tmpnm = $_FILES[$file1]['tmp_name'];
    $size = $_FILES[$file1]['size'];

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $type = finfo_file($finfo, $tmpnm);
    finfo_close($finfo);

    $allowed_types = [
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png',
        'application/pdf',
        'application/msword',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/zip',
        'application/x-zip-compressed',
        'inode/directory',
        'text/x-python',
        'application/x-python-code',
        'application/javascript',
        'text/javascript',
        'application/x-javascript',
        'application/x-php',
        'application/x-httpd-php',
        'application/x-httpd-php-source',
        'text/x-java-source',
        'application/java-archive',
        'text/x-c',
        'text/x-c++',
        'application/x-sh',
        'text/x-perl',
        'application/x-perl',
        'text/x-ruby',
        'application/x-ruby',
        'text/x-go',
        'application/x-go',
        'text/html',
        'text/css',
        'audio/mpeg',
        'audio/wav',
        'audio/ogg',
        'audio/webm',
        'audio/aac',
        'video/mp4',
        'video/webm',
        'video/ogg',
        'video/x-msvideo',
    ];

    if (!in_array($type, $allowed_types)) {
        return "Invalid file type: $type";
    } else {
        if ($size > $file_size_allowed) {
            return "File too large";
        } else {
            $tuname = base64_decode($_POST["$file1"]);
            $newname = str_shuffle('01234567891234567890');
            @$dir = "$ticket_pic" . $tuname . $newname . $name;
            @$dir1 = "" . $tuname . $newname . $name;

            if (strpos($type, 'image') !== false && $size > $min_size_compress) {
                $ui = compressImage($tmpnm, $dir, 40);
                if ($ui) {
                    move_uploaded_file($tmpnm, $dir);
                }
            } else {
                move_uploaded_file($tmpnm, $dir);
            }

            return $dir1;
        }
    }
}



