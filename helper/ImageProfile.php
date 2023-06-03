<?php
# @samuel andrey

class ImageProfile
{
    public static function imagetStudent($nim): string
    {
        $parts = explode(".", $nim);
        $faculty = substr($parts[0], 0, 1);
        $folder = $parts[0];
        $subfolder = $parts[1];
        $filename = $nim;
        return "http://mahasiswa.dinus.ac.id/images/foto/$faculty/$folder/$subfolder/$filename.jpg";
    }

    public static function imageStaf($npp): string
    {
        return "http://simpeg.dinus.ac.id/updir/small_med_$npp.jpg";
    }
}
