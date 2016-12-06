<?php 

header('Content-type: text/html; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');





function scan_Dir($directory=NULL)
{
$temp = "";
if ($directory==NULL)
{
        $directory = getcwd();
}
$handle = opendir($directory);
while (false !== ($filename = readdir($handle)))
{
        if (($filename!=".") AND ($filename!=".."))
        {
                if (is_dir($directory."/".$filename))
                {
                        $old_directory = $directory;
                        $directory .= "/".$filename;
                        $temp = scan_Dir($directory);

                        $cpt = 0;
                        while ($cpt<count($temp["filename"]))
                        {
                                $t["path"]     = $directory."/".$temp["filename"][$cpt];
                                $t["directory"] = $directory;
                                $t["filename"]  = $temp["filename"][$cpt];
                                $t["filesize"]  = filesize($directory."/".$temp["filename"][$cpt]);
                                $t["filedata"]  = date ("F d Y H:i:s.",filemtime($directory."/".$temp["filename"][$cpt]));
                                $arrfiles[] = $t;
                                $cpt++;

                        }
                        $directory = $old_directory;
                }
                else
                {
                        $t["path"]      = $directory."/".$filename;
                        $t["directory"] = $directory;
                        $t["filename"]  = $filename;
                        $t["filesize"]  = filesize($directory."/".$filename);                        
                        $t["filedata"]  = date ("F d Y H:i:s.",filemtime($directory."/".$filename));

                                $arrfiles[] = $t;
                }
        }
}
return $arrfiles;
}


$dir2scan = "img";
$yourvar = scan_Dir($dir2scan);


$output = fopen('php://output', 'w');
fputcsv($output, array('path','directory','filename','filesize','filedata'));

foreach ($yourvar as $fields) {
    fputcsv($output, $fields,';');
}

fclose($fp);

 ?>