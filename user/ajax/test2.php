<?php
$file_size_allowed = 30000000;
$min_size_compress = 10000000;
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
    $type = $_FILES[$file1]['type'];
    $size = $_FILES[$file1]['size'];

    if (
        $type != 'image/jpeg'
        && $type != 'image/jpg'
        && $type != 'image/gif'
        && $type != 'image/png'
        && $type != 'application/pdf'
        && $type != 'application/msword'
        && $type != 'application/vnd.ms-excel'
        && $type != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        && $type != 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        && $type != 'application/zip'
        && $type != 'application/x-zip-compressed'
        && $type != 'inode/directory'
        && $type != 'text/x-python'              // Python
        && $type != 'application/x-python-code'   // Python compiled bytecode
        && $type != 'application/javascript'      // JavaScript
        && $type != 'text/javascript'             // JavaScript
        && $type != 'application/x-javascript'    // JavaScript
        && $type != 'application/x-php'           // PHP
        // && $type != 'text/x-php'           // PHP
        && $type != 'application/x-httpd-php'     // PHP
        && $type != 'application/x-httpd-php-source'  // PHP source
        && $type != 'text/x-java-source'          // Java
        && $type != 'application/java-archive'    // Java Archive (JAR)
        && $type != 'text/x-c'                    // C
        && $type != 'text/x-c++'                  // C++
        && $type != 'application/x-sh'            // Shell script
        && $type != 'text/x-perl'                 // Perl
        && $type != 'application/x-perl'          // Perl
        && $type != 'text/x-ruby'                 // Ruby
        && $type != 'application/x-ruby'          // Ruby
        && $type != 'text/x-go'                   // Go
        && $type != 'application/x-go'            // Go
        && $type != 'text/html'                   // HTML
        && $type != 'text/css'                    // CSS    
    ) {
    } else {
        if ($size > $file_size_allowed) {
            return "file to large";
        } else {
            $tuname = base64_decode($_POST["$file1"]);
            $newname = str_shuffle('01234567891234567890');
            @$dir = "$ticket_pic" . $tuname . $newname . $name;
            @$dir1 = "" . $tuname . $newname . $name;
            if ($size > $min_size_compress) {
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
