<?php if ($alpha != 0){?>
    <td><?php echo abs(($ramal_fix - $ramal->jumlah_masuk)/$ramal->jumlah_masuk); ?></td>
    <?php } ?>



    <?php if ($alpha != 0){?>
                <td><?php if ($ramal->jumlah_masuk != 0) {
                    echo abs(($ramal_fix - $ramal->jumlah_masuk)/$ramal->jumlah_masuk); 
                } else{
                    echo '';
                }
                ?></td>
                <?php } ?>