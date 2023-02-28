#!/usr/bin/env bash

uname=`whoami`
echo running in `uname -a`

kinit ${uname}@IAC.ES -k -t krb_keytab -c $KRB5CCNAME

# Create a new ticket every 14400s == 4 hours
(while true; do sleep 14400 ; kinit ${uname}@IAC.ES -k -t krb_keytab -c $KRB5CCNAME ; done) &
ticket_PID=$!

# 8 hour job
for i in `seq 1 8`
do
    echo "============== Loop $i =============="

    echo ""
    echo "cache"
    echo "----------"    
    ls -ltr /scratch/.krb5cc_2071*

    echo ""
    echo "ticket"
    echo "----------"    
    klist 

    echo ""
    echo "files"
    echo "----------"    
    ls -ltr /home/angelv/words*
    ls -ltr /net/dejar/scratch/angelv/words*

    echo ""
    echo "executable"
    echo "----------"
    ./simple $1 $2
    echo ""
    
    # 3600 == 1 hour
    sleep 3600
done

kill $ticket_PID
wait $ticket_PID 2>/dev/null


