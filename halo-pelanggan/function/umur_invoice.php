<?php $lahir    =new DateTime($pesan['tgl_lahir']);
                        $today        =new DateTime();
                        $umur = $today->diff($lahir);
                        echo $umur->y; echo " Tahun ";
                    ?>