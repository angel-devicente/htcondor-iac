Description
-----------

This example illustrates a basic way to perform checkpointing with HTCondor.

A similar technique could be performed in any programming language, but this
particular example is written in Python. Since we want to use the IAC-wide
provided Python module, we follow the information at
https://vesta.ll.iac.es/SIE/hpc/htcondor/index.html#htcondor-and-environment-modules
and our submit file (pickle.submit) defines the executable to be "job.sh" and
its arguments the actual Python code "pkl_checkp.py".

"pkl_checkp.py" is a simple Python script that uses the pickle module to save
the state of Python variables to a file. In this particular example, a
checkpoint of the "counter" variable is created every 10 iterations, and if the
code is run when such a checkpoint exists, the iterations will start from the
last saved one.

In order to be able to use those checkpoints with HTCondor, we have to make sure
that they are available when a job is restarted after an eviction. This is
accomplished by using "when_to_transfer_output = ON_EXIT_OR_EVICT" (see
https://htcondor.readthedocs.io/en/23.0/users-manual/file-transfer.html#specifying-if-and-when-to-transfer-files). Without
this, when a job is evicted, the generated output files so far would be
discarded, and a restart of the job would start afresh.

When submitting this example job to HTCondor, one can check if the checkpointing
mechanism is working correctly by forcing the eviction of the job on demand with
the command "condor_vacate_job" (see
https://htcondor.readthedocs.io/en/latest/man-pages/condor_vacate_job.html).
