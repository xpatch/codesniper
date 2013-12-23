#!/usr/bin/php
<?php
	/*

	$ipv4_inter = explode("\n",file_get_contents("ipv4_dod.txt"));
	foreach( $ipv4_inter as $line ) {
		if( strlen(trim($line)) > 0 ) {
			$info = explode("|",$line);
			if( $line[0] == "#" ) continue;
			$in =  "iptables -A INPUT -i eth0 -s {$info[0]} -m conntrack --ctstate NEW -j LOG --log-prefix 'D0D {$info[1]} '";
			$out = "iptables -t nat -A POSTROUTING -o eth0 -d {$info[0]} -m conntrack --ctstate NEW -j LOG --log-prefix 'D0D {$info[1]} '";
			$out = "iptables -A FORWARD -o eth0 -d {$info[0]} -m conntrack --ctstate NEW -j LOG --log-prefix 'D0D {$info[1]} '";

			exec($in);
			exec($out);
		}

	}



	$ipv4_inter = explode("\n",file_get_contents("ipv4_corp.txt"));
	foreach( $ipv4_inter as $line ) {
		if( strlen(trim($line)) > 0 ) {
			$info = explode("|",$line);
			if( $line[0] == "#" ) continue;
			$in =  "iptables -A INPUT -i eth0 -s {$info[0]} -m conntrack --ctstate NEW -j LOG --log-prefix 'C0RP {$info[1]} '";
			$out = "iptables -t nat -A POSTROUTING -o eth0 -d {$info[0]} -m conntrack --ctstate NEW -j LOG --log-prefix 'C0RP {$info[1]} '";
			$out = "iptables -A FORWARD -o eth0 -d {$info[0]} -m conntrack --ctstate NEW -j LOG --log-prefix 'C0RP {$info[1]} '";

			exec($in);
			exec($out);
		}

	}
	*/



?>
