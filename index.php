<!DOCTYPE html>
<!--
GPLv3
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Welcome to the RPIWatcher!</h1>
        <?php
            //Main System
            echo "Main System: <br>";
            //Show uptime
            echo "<b>Uptime: </b>" . shell_exec("uptime") . "<br>" ;
            //Show kernel
            echo "<b>Kernel: </b>" . shell_exec("uname -a") . "<br>" ;
            //Show Systemtime
            echo "<b>Systemtime: </b>" . shell_exec("date") . "<br><br>" ;
            
            //Services
            echo "Services: <br>";
            //Show nginx status
            echo "<b>nginx: </b>" . shell_exec("systemctl status nginx") . "<br>" ;
            //Show hostapd status
            echo "<b>hostapd: </b>" . shell_exec("systemctl status hostapd") . "<br>" ;
            //Show dnsmasq status
            echo "<b>dnsmasq: </b>" . shell_exec("systemctl status dnsmasq") . "<br><br>" ;
            
            //Ports and network
            echo "Ports and network <br>";
            //Show ip
            echo "<b>eth0: </b>" . shell_exec("ip addr |grep eth0") . "<br>" ;
            echo "<b>eth1: </b>" . shell_exec("ip addr |grep eth1") . "<br><br>" ;
            
            //Reboot
            if (isset($_GET["reboot"])) {
                if ($_GET["reboot"] == true) {
                    shell_exec("reboot");
                }
            }
            
            //Restart hostapd
            if (isset($_GET["rsthostapd"])) {
                if ($_GET["rsthostapd"] == true) {
                    shell_exec("systemctl restart hostapd.service");
                }
            }
            
            //Restart dnsmasq
            if (isset($_GET["rstdnsmasq"])) {
                if ($_GET["rstdnsmasq"] == true) {
                    shell_exec("systemctl restart dnsmasq.service");
                }
            }
        ?>
       
        <a href="index.php?reboot=true"><p>Reboot the Pi</p></a>
        <a href="index.php?rsthostapd=true"><p>Restart hostapd</p></a>
        <a href="index.php?rstdnsmasq=true"><p>Restart dnsmasq</p></a>
    </body>
</html>
