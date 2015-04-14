<?php
function cd($path = '/web/') {
        $dirs = [];
        $keys = '0123456789abcdefghijklmnopqrstuvwxyz';
        $fe = fopen('php://stderr', 'w');
        if ($handle = opendir($path)) {
                $index = 0;
                while (false !== ($entry = readdir($handle))) {
                        if (is_dir($path.$entry) && $entry != "." && $entry != "..") {
                                $i = substr($keys, $index, 1);
                                $dirs["$i"] = $entry;
                                $index++;
                        }
                }
                closedir($handle);
        }
        fwrite($fe, "Go to folder $path: \n");
        foreach ($dirs as $i => $d) {
                fwrite($fe, "$i: $d\n");
        }
        $stdin = fopen("php://stdin", "r");
        fwrite($fe, "Choose a folder: ");
        $choice = trim(fgets($stdin));
        fwrite($fe, "\n");
        fclose($stdin);
        $selected = '.';
        if (strlen($choice) == 1) {
                $selected = (!empty($dirs["$choice"]) ? $path.$dirs["$choice"] : '.');
        } else if (strlen($choice) > 1) {
                foreach ($dirs as $i => $d) {
                        if (strpos($d, $choice) === 0) {
                                $selected = $path.$dirs[$i];
                                break;
                        }
                }
        }
        $selected.= '/';
        fwrite($fe, "Going to ".$selected."\n");
        if (is_file($selected.'.folder')) $selected = cd($selected);
        return $selected;
}

echo cd();
