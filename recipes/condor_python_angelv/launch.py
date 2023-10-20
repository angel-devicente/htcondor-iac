import htcondor

# Define the parameters for the jobs
job_parameters = [
    {"keyword": "initial_gas_density", "value": "0.400E+06"},
    {"keyword": "initial_gas_density", "value": "1.460E+06"},
    {"keyword": "initial_gas_density", "value": "3.200E+06"},
]

# Create an HTCondor submit object
submit_description = htcondor.Submit({
   "requirements": 'OpSysAndVer == "Ubuntu22"',
    "executable": "/opt/python/python3.10/bin/python3",
    "environment": "PYTHONPATH=/opt/python/python3.10/lib/python3.10/site-packages",
    "transfer_executable": "false",
    "arguments": "job.py $(ProcID) $(parameter) $(value)",
    "output": "outs/hostname.$(ProcID).out",       
    "error": "errors/hostname.$(ProcID).err",        
    "log": "hostname.log",
    "transfer_input_files": "job.py, parameters.ini",
    "transfer_output_files": "results",    
})

# Create itemdata (based on the job_parameters)
itemdata = []
for i, params in enumerate(job_parameters):
    itemdata.append({'parameter': params['keyword'], 'value': params['value']})

# Submit the jobs using the itemdata    
schedd = htcondor.Schedd()                       
submit_result = schedd.submit(submit_description, itemdata = iter(itemdata))

# Notify of the HTCondor job
print(f"Jobs submitted with Cluster ID: {submit_result.cluster()}")
