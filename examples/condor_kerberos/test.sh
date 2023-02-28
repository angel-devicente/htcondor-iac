#!/usr/bin/env bash

uname=`whoami`

echo running in `uname -a`
echo cache: $KRB5CCNAME
#export KRB5CCNAME=/tmp/krb5cc_${UID}_$3
rm /scratch/.krb5cc_2071_*
kinit -V ${uname}@IAC.ES -k -t krb_keytab -c $KRB5CCNAME

# Create a new ticket every 28800s == 8 hours
(while true; do sleep 28800 ; kinit ${uname}@IAC.ES -k -t krb_keytab -c $KRB5CCNAME ; done) &
ticket_PID=$!

#sleep 10
#kinit -V ${uname}@IAC.ES -R -c $KRB5CCNAME

sleep 10

# 24 hour job
for i in `seq 1 2`
do
    echo "============== Loop $i =============="
    echo ""

    #    ls -ltr krb_keytab
    ls -ltr /scratch/.krb5cc_2071*
    klist 

    ls -ltr /home/angelv/words*
#    ls -ltr /net/cacao/scratch/angelv/
    ls -ltr /net/dejar/scratch/angelv/words*
    
    ./simple $1 $2

#    echo "connecting by ssh to diablos"
#    ssh diablos date
    
    # 3600 == 1 hour
    sleep 1
done

kill $ticket_PID
wait $ticket_PID # 2>/dev/null
# rm -f /scratch/krb5cc_${UID}

