<?php $lahir    =new DateTime($_SESSION['tgl_lahir']);
                        $today        =new DateTime();
                        $umur = $today->diff($lahir);
                        echo $umur->y; echo " Tahun ";
                    ?>