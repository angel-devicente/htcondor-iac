#!/usr/bin/env bash

######### DO NOT EDIT - get Kerberos Tickets
uname=`whoami`
temp=$(mktemp -q)
kinit ${uname}@IAC.ES -k -t krb_keytab -c $temp
cp $temp $KRB5CCNAME

# Create a new ticket every 14400s == 4 hours
(while true; do sleep 14400 ; kinit ${uname}@IAC.ES -k -t krb_keytab -c $temp ; cp $temp $KRB5CCNAME ; done) &
ticket_PID=$!
######### END

./simple $1 $2
ls -lt /home/${uname}/


######### DO NOT EDIT - clean up after job is finished
kill $ticket_PID
wait $ticket_PID 2>/dev/null

exit 0
######### END
