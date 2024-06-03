Description
-----------

This example illustrates how to submit jobs with Python, where each job is
itself a Python code, to be run with a particular Python version (not the system
default one).

Each of the three jobs to be submitted (given by the list job_parameters in
submit.py) will simply generate a "parameters.out" output file, by concatenating
the contents of the "parameters.ini" input file and a line of the form
"initial_gas_density = 0.400E+06".

Besides the "hostname.log", all the output/error files and the resulting
"parameters.out" files will be stored in the "results" directory, sorted by the
job number ID.

Running
-------

Substitute "<username>" in the file "job.sh" with your username and just run as:
"python3 submit.py" 

