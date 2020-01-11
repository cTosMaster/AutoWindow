<?php
    shell_exec("/usr/bin/gpio -g mode 17 out");
    shell_exec("/usr/bin/gpio -g write 17 1");
?>
