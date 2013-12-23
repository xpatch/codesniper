#!/bin/bash

# http://www.iana.org/numbers/
# wget http://www.iana.org/assignments/ipv4-address-space/ipv4-address-space.txt

# play around with -m recent
# need to drop inbound syn packets that are not syn+ack
# DROP all non related ip traffic
# set DROP as policy
#create a UI to create iptables rules


echo 1 > /proc/sys/net/ipv4/ip_forward

iptables --flush
iptables --table nat --flush
iptables --table nat --delete-chain



# iptables -F SCAN
# iptables -Z SCAN
# 
# 
# iptables -N SCAN
# iptables -A SCAN -p tcp ! --syn -m state --state NEW -j DROP
# iptables -A SCAN -p tcp --tcp-flags ALL SYN -m limit --limit 1/s --limit-burst 2 -j RETURN
# iptables -A SCAN -p tcp --tcp-flags ALL SYN -m limit --limit 1/m --limit-burst 2 -j LOG --log-prefix "### SYN FLOOD ### "
# iptables -A SCAN -p tcp --tcp-flags ALL SYN -j DROP
# iptables -A SCAN -p tcp --tcp-flags ALL FIN,URG,PSH -m limit --limit 2/m --limit-burst 2 -j LOG --log-prefix "### Xmas PortScan ### "
# iptables -A SCAN -p tcp --tcp-flags ALL FIN,URG,PSH -j DROP
# iptables -A SCAN -p tcp --tcp-flags ALL SYN,FIN -m limit --limit 2/m --limit-burst 2 -j LOG --log-prefix "### SYN FIN PortScan ### "
# iptables -A SCAN -p tcp --tcp-flags ALL SYN,FIN -j DROP
# iptables -A SCAN -p tcp --tcp-flags SYN,RST SYN,RST -m limit --limit 2/m --limit-burst 2 -j LOG --log-prefix "### SYN RST PortScan ### "
# iptables -A SCAN -p tcp --tcp-flags SYN,RST SYN,RST -j DROP
# iptables -A SCAN -p tcp --tcp-flags ALL FIN -m limit --limit 2/m --limit-burst 2 -m state --state ! ESTABLISHED -j LOG --log-prefix "### FYN PortScan ### "
# iptables -A SCAN -p tcp --tcp-flags ALL FIN -m state --state ! ESTABLISHED -j DROP
# iptables -A SCAN -p tcp --tcp-flags ALL ALL -m limit --limit 2/m --limit-burst 2 -j LOG --log-prefix "### ALL PortScan ### "
# iptables -A SCAN -p tcp --tcp-flags ALL ALL -j DROP
# iptables -A SCAN -p tcp --tcp-flags ALL NONE -m limit --limit 2/m --limit-burst 2 -j LOG --log-prefix "### NONE PortScan ### "
# iptables -A SCAN -p tcp --tcp-flags ALL NONE -j DROP
# iptables -A SCAN -p icmp --icmp-type echo-request -m limit --limit 5/minute -j LOG --log-prefix "### Ping Scan ### "
# iptables -A SCAN -p icmp --icmp-type echo-request -m limit --limit 5/minute -j DROP
# iptables -A SCAN -p tcp --tcp-flags SYN,ACK,FIN,RST RST -m limit --limit 1/s --limit-burst 5 -j LOG --log-level info --log-prefix "### Stealth Scan ### "
# iptables -A SCAN -p tcp --tcp-flags SYN,ACK,FIN,RST RST -m limit --limit 1/s --limit-burst 5 -j DROP
# iptables -A SCAN -p tcp --tcp-flags SYN,FIN SYN,FIN -m limit --limit 5/m -j LOG --log-level info --log-prefix "### SYN/FIN Scan ### "
# iptables -A SCAN -p tcp --tcp-flags SYN,FIN SYN,FIN -m limit --limit 5/m -j DROP
# 









for kw in `cat block-list.txt`; do 
	for i in `grep $kw ipv4-address-space.txt | awk '{print $1}'`; do

		#NORMALLY TO CHECK STUFF
		#iptables -t nat -o eth0 -A POSTROUTING -d $i -m conntrack --ctstate NEW -j LOG --log-prefix "POSTROUTING $kw $i " --log-tcp-options

		echo $i


		#iptables -o eth0 -A OUTPUT -d $i -m conntrack --ctstate NEW -j LOG --log-prefix "OUT $kw $i " --log-tcp-options
		# LOG THEN DROP ALL INBOUND CONNECTIONS FROM THIS RANGE
		#iptables -i eth0 -A INPUT -s $i -m conntrack --ctstate NEW  -j LOG --log-prefix "IN $kw $i " --log-tcp-options
		#iptables -i eth0 -A INPUT -s $i -m conntrack --ctstate NEW  -j DROP
	done
done

./interlog.php

#DROP OUTBOUND to APNIC
for i in `grep APNIC ipv4-address-space.txt | awk '{print $1}'`; do
	iptables -o eth0 -A OUTPUT -d $i -j DROP 
	iptables -o eth0 -A FORWARD -d $i -j DROP 
	#iptables -i eth0 -A INPUT -s $i -j DROP 
done

#MASQ all internal traffic to the WAN
iptables --table nat --append POSTROUTING -s 10.0.0.0/8 --out-interface eth0 -j MASQUERADE #WAN

#iptables --table nat --append PREROUTING -p tcp --dport 3074 -j DNAT --to 10.0.0.14:3074
#iptables --table nat --append PREROUTING -p udp --dport 3074 -j DNAT --to 10.0.0.14:3074
#iptables --table nat --append PREROUTING -p udp --dport 88 -j DNAT --to 10.0.0.14:88



#DO NOT FORWARD TRAFFIC COMMING FROM THE INTERNET
#iptables -A FORWARD -i eth0 -j DROP
#iptables -A FORWARD -i eth0 ! -d 10.0.0.0/8 -j DROP


iptables -i eth1 -I INPUT -p tcp -s 10.0.0.0/8 -m conntrack --ctstate NEW,INVALID -j LOG --log-prefix "Tracking new and invalid" --log-tcp-options 


# DO NOT FORWARD TRAFFIC IF THE DEST IS FOR INTERNAL NETWORK
#iptables -A FORWARD -o eth0 -d 10.0.1.0/8 -j ACCEPT
iptables -A FORWARD -o eth0 -d 10.0.0.0/8 -m conntrack --ctstate NEW -j LOG --log-prefix "Internal SYN Packet" --log-tcp-options
iptables -A FORWARD -o eth0 -d 10.0.1.0/8 -j ACCEPT
iptables -A FORWARD -o eth0 -d 10.0.0.0/8 -j DROP

# FORWARD TRAFFIC FROM the LAN
iptables -A FORWARD -i eth1 -j ACCEPT #LAN


# ALWAYS ALLOW CONNECTIONS to eth1 from LAN
iptables -A INPUT -i eth1 -s 10.0.0.0 -j ACCEPT


# ALLOW CONNECTIONS TO SSH FROM ARIN
for i in `grep ARIN ipv4-address-space.txt | awk '{print $1}'`; do
	#echo "iptables -i eth0 -A INPUT -p tcp -s $i --dport 6672 -m conntrack --ctstate NEW,ESTABLISHED,RELATED -j ACCEPT"
	iptables -i eth0 -A INPUT -p tcp -s $i --dport 6672 -m conntrack --ctstate NEW,ESTABLISHED,RELATED -j ACCEPT 
	iptables -i eth0 -A INPUT -p tcp -s $i --dport 6672 -m conntrack --ctstate NEW,INVALID -j LOG --log-prefix "SSH ACCEPT NEW,INVALID in eth0 " --log-tcp-options 
	iptables -i eth0 -A INPUT -p tcp -s $i --dport 80 -m conntrack --ctstate NEW,ESTABLISHED,RELATED -j ACCEPT 
	iptables -i eth0 -A INPUT -p tcp -s $i --dport 23 -m conntrack --ctstate NEW,ESTABLISHED,RELATED -j ACCEPT 
	#iptables -i eth0 -A INPUT -p tcp -s $i --dport 8140 -m conntrack --ctstate NEW,ESTABLISHED,RELATED -j ACCEPT 
done

#iptables -i eth0 -A INPUT -p tcp --dport 6672 -m conntrack --ctstate NEW,ESTABLISHED,RELATED -j ACCEPT 
#iptables -i eth0 -A INPUT -p tcp --dport 8140 -m conntrack --ctstate NEW,ESTABLISHED,RELATED -j ACCEPT 

# ALLOW ESTABLISHED CONNECTIONS FROM THE WAN
iptables -i eth0 -A INPUT -m conntrack --ctstate ESTABLISHED -j ACCEPT

# DROP NEW,INVALID CONNECTIONS COMMING FROM THE WAN
#iptables -i eth0 -A INPUT ! -s 24/8 -m conntrack --ctstate NEW,INVALID -j LOG --log-prefix "DROP NEW,INVALID in eth0 " --log-tcp-options 
iptables -i eth0 -A INPUT -m conntrack --ctstate NEW,INVALID -j DROP 



#iptables -L -n -v 
#iptables -L -n -v -t nat



#for i in `grep ARIN ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -j ACCEPT ;done



#for i in `grep APNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -m conntrack --ctstate NEW  -j LOG --log-prefix 'FUCK APNIC ' --log-tcp-options ;done
# log syn input from everything but ARIN

#for kw in `cat block-list.txt`; do 
#	for i in `grep $kw ipv4-address-space.txt | awk '{print $1}'`; do
		#iptables -i eth0 -A INPUT -s $i -m conntrack --ctstate NEW  -j LOG --log-prefix 'FUCK $kw ' --log-tcp-options
		#iptables -i eth0 -A INPUT -d $i -m conntrack --ctstate ESTABLISHED -j LOG --log-prefix "EST $i = $kw" --log-tcp-options 
		#iptables -i eth0 -A INPUT -d $i -m conntrack --ctstate ESTABLISHED -j ACCEPT 
		#iptables -o eth0 -A OUTPUT -d $i -m conntrack --ctstate NEW -j ACCEPT 
		#iptables -i eth0 -A INPUT -s $i -m conntrack --ctstate NEW -j DROP 
		#iptables -o eth0 -A OUTPUT -s $i -m conntrack --ctstate NEW -j DROP 
		#iptables -o eth0 -A OUTPUT -d $i -m conntrack --ctstate NEW  -j LOG --log-prefix "OUT $kw $i " --log-tcp-options
#	done
#done
 


#for i in `grep APNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -j DROP ;done
#for i in `grep APNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -o eth0 -A OUTPUT -d $i -j DROP ;done

#for i in `grep RIPE ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -j LOG --log-prefix 'FUCK RIPE ' --log-tcp-options ;done
#for i in `grep RIPE ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -j DROP ;done
#for i in `grep RIPE ipv4-address-space.txt | awk '{print $1}'`; do iptables -o eth0 -A OUTPUT -d $i -j DROP ;done

#for i in `grep LACNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -j LOG --log-prefix 'FUCK LACNIC ' --log-tcp-options ;done
#for i in `grep LACNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -j DROP ;done
#for i in `grep LACNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -o eth0 -A OUTPUT -d $i -j DROP ;done

#for i in `grep AfriNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -j LOG --log-prefix 'FUCK AfriNIC ' --log-tcp-options ;done
#for i in `grep AfriNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -j DROP ;done
#for i in `grep AfriNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -o eth0 -A OUTPUT -d $i -j DROP ;done



# for i in `grep APNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -j LOG;done
# for i in `grep APNIC ipv4-address-space.txt | awk '{print $1}'`; do iptables -i eth0 -A INPUT -s $i -j LOG --log-prefix 'FUCK APNIC' --log-tcp-options ;done

