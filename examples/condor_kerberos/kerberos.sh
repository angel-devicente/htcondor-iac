#!/usr/bin/env bash

######### DO NOT EDIT - get Kerberos Tickets
kinit ${uname}@IAC.ES -k -t krb_keytab -c $KRB5CCNAME

# Create a new ticket every 14400s == 4 hours
(while true; do sleep 14400 ; kinit ${uname}@IAC.ES -k -t krb_keytab -c $KRB5CCNAME ; done) &
ticket_PID=$!
######### 


./simple $1 $2


######### DO NOT EDIT - clean up after job is finished
kill $ticket_PID
wait $ticket_PID 2>/dev/null

exit 0
######### 
