<?php
    function getFileName($name,$file)
    {
       return str_replace(" ","_",$name).'.' .strtolower($file->extension());
    }
